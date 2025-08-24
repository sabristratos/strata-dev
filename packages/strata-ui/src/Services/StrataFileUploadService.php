<?php

declare(strict_types=1);

namespace Strata\UI\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;

/**
 * Service for handling file uploads in different modes for Strata UI components.
 * Solves the Spatie Media Library challenge by providing flexible upload strategies.
 */
class StrataFileUploadService
{
    protected string $temporaryDisk = 'local';
    protected string $temporaryPath = 'file-uploads/temporary';
    protected string $deferredPath = 'file-uploads/deferred';
    protected int $cleanupAfterHours = 24;

    /**
     * Handle temporary file upload for later processing.
     */
    public function handleTemporaryUpload(UploadedFile $file, ?string $sessionKey = null): array
    {
        $sessionKey = $sessionKey ?: session()->getId();
        $fileId = Str::uuid()->toString();
        $originalName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $storedName = $fileId . '.' . $extension;
        $storagePath = "{$this->temporaryPath}/{$sessionKey}";
        
        // Store the file
        $path = $file->storeAs($storagePath, $storedName, $this->temporaryDisk);
        
        // Store metadata in cache
        $metadata = [
            'id' => $fileId,
            'original_name' => $originalName,
            'stored_name' => $storedName,
            'path' => $path,
            'size' => $file->getSize(),
            'mime_type' => $file->getMimeType(),
            'session_key' => $sessionKey,
            'uploaded_at' => now()->toISOString(),
            'cleanup_after' => now()->addHours($this->cleanupAfterHours)->toISOString(),
        ];
        
        Cache::put("file_upload.{$fileId}", $metadata, now()->addHours($this->cleanupAfterHours));
        
        return [
            'id' => $fileId,
            'name' => $originalName,
            'size' => $file->getSize(),
            'type' => $file->getMimeType(),
            'url' => null, // Temporary files don't have public URLs
            'metadata' => $metadata
        ];
    }

    /**
     * Handle deferred file upload with session storage.
     */
    public function handleDeferredUpload(UploadedFile $file, string $sessionKey): array
    {
        $result = $this->handleTemporaryUpload($file, $sessionKey);
        
        // Add to session-based deferred files list
        $deferredFiles = session("file_uploads.deferred.{$sessionKey}", []);
        $deferredFiles[] = $result['id'];
        session(["file_uploads.deferred.{$sessionKey}" => $deferredFiles]);
        
        return $result;
    }

    /**
     * Handle direct upload to an existing model with Spatie Media Library.
     */
    public function handleDirectUpload(UploadedFile $file, HasMedia $model, string $collection = 'default'): array
    {
        $mediaItem = $model->addMediaFromRequest('file')
            ->usingFileName($file->getClientOriginalName())
            ->toMediaCollection($collection);
        
        return [
            'id' => $mediaItem->id,
            'name' => $mediaItem->name,
            'file_name' => $mediaItem->file_name,
            'size' => $mediaItem->size,
            'type' => $mediaItem->mime_type,
            'url' => $mediaItem->getUrl(),
            'collection' => $collection,
            'model_id' => $model->getKey(),
            'model_type' => get_class($model),
            'media_item' => $mediaItem
        ];
    }

    /**
     * Attach deferred files to a model after it's been created.
     */
    public function attachDeferredFiles(HasMedia $model, string $sessionKey, string $collection = 'default'): array
    {
        $deferredFileIds = session("file_uploads.deferred.{$sessionKey}", []);
        $attachedFiles = [];
        
        foreach ($deferredFileIds as $fileId) {
            $metadata = Cache::get("file_upload.{$fileId}");
            
            if (!$metadata) {
                continue; // File metadata expired or doesn't exist
            }
            
            try {
                // Get the stored file
                $filePath = $metadata['path'];
                
                if (!Storage::disk($this->temporaryDisk)->exists($filePath)) {
                    continue; // File doesn't exist
                }
                
                // Create a new UploadedFile instance from stored file
                $storedFilePath = Storage::disk($this->temporaryDisk)->path($filePath);
                $uploadedFile = new UploadedFile(
                    $storedFilePath,
                    $metadata['original_name'],
                    $metadata['mime_type'],
                    null,
                    true // Mark as test file to skip is_uploaded_file() check
                );
                
                // Add to media library
                $mediaItem = $model->addMedia($storedFilePath)
                    ->usingName(pathinfo($metadata['original_name'], PATHINFO_FILENAME))
                    ->usingFileName($metadata['original_name'])
                    ->toMediaCollection($collection);
                
                $attachedFiles[] = [
                    'id' => $mediaItem->id,
                    'name' => $mediaItem->name,
                    'file_name' => $mediaItem->file_name,
                    'size' => $mediaItem->size,
                    'type' => $mediaItem->mime_type,
                    'url' => $mediaItem->getUrl(),
                    'collection' => $collection,
                    'original_file_id' => $fileId
                ];
                
                // Clean up temporary file
                $this->cleanupTemporaryFile($fileId);
                
            } catch (\Exception $e) {
                // Log error but continue with other files
                logger()->error("Failed to attach deferred file {$fileId}: " . $e->getMessage());
                continue;
            }
        }
        
        // Clear deferred files from session
        session()->forget("file_uploads.deferred.{$sessionKey}");
        
        return $attachedFiles;
    }

    /**
     * Get temporary file metadata.
     */
    public function getTemporaryFileMetadata(string $fileId): ?array
    {
        return Cache::get("file_upload.{$fileId}");
    }

    /**
     * Get all temporary files for a session.
     */
    public function getSessionTemporaryFiles(string $sessionKey): array
    {
        $files = [];
        $sessionPath = "{$this->temporaryPath}/{$sessionKey}";
        
        if (!Storage::disk($this->temporaryDisk)->exists($sessionPath)) {
            return $files;
        }
        
        $storedFiles = Storage::disk($this->temporaryDisk)->files($sessionPath);
        
        foreach ($storedFiles as $filePath) {
            $fileName = basename($filePath);
            $fileId = pathinfo($fileName, PATHINFO_FILENAME);
            $metadata = $this->getTemporaryFileMetadata($fileId);
            
            if ($metadata) {
                $files[] = $metadata;
            }
        }
        
        return $files;
    }

    /**
     * Clean up a specific temporary file.
     */
    public function cleanupTemporaryFile(string $fileId): bool
    {
        $metadata = Cache::get("file_upload.{$fileId}");
        
        if (!$metadata) {
            return false;
        }
        
        // Delete the physical file
        if (Storage::disk($this->temporaryDisk)->exists($metadata['path'])) {
            Storage::disk($this->temporaryDisk)->delete($metadata['path']);
        }
        
        // Remove metadata from cache
        Cache::forget("file_upload.{$fileId}");
        
        return true;
    }

    /**
     * Clean up expired temporary files.
     * Should be called by a scheduled task.
     */
    public function cleanupExpiredFiles(): array
    {
        $cleanedFiles = [];
        $allFiles = Storage::disk($this->temporaryDisk)->allFiles($this->temporaryPath);
        
        foreach ($allFiles as $filePath) {
            $fileName = basename($filePath);
            $fileId = pathinfo($fileName, PATHINFO_FILENAME);
            $metadata = Cache::get("file_upload.{$fileId}");
            
            if (!$metadata) {
                // No metadata = expired, delete file
                Storage::disk($this->temporaryDisk)->delete($filePath);
                $cleanedFiles[] = $filePath;
                continue;
            }
            
            // Check if cleanup time has passed
            $cleanupTime = \Carbon\Carbon::parse($metadata['cleanup_after']);
            if (now()->isAfter($cleanupTime)) {
                $this->cleanupTemporaryFile($fileId);
                $cleanedFiles[] = $filePath;
            }
        }
        
        return $cleanedFiles;
    }

    /**
     * Get a public URL for a temporary file (if possible).
     */
    public function getTemporaryFileUrl(string $fileId): ?string
    {
        $metadata = $this->getTemporaryFileMetadata($fileId);
        
        if (!$metadata) {
            return null;
        }
        
        // For security, temporary files shouldn't be publicly accessible
        // Return a route that serves the file after authentication/authorization
        return route('strata.file-upload.serve', ['fileId' => $fileId]);
    }

    /**
     * Serve a temporary file (for internal routes).
     */
    public function serveTemporaryFile(string $fileId): ?\Illuminate\Http\Response
    {
        $metadata = $this->getTemporaryFileMetadata($fileId);
        
        if (!$metadata || !Storage::disk($this->temporaryDisk)->exists($metadata['path'])) {
            return null;
        }
        
        return response()->file(
            Storage::disk($this->temporaryDisk)->path($metadata['path']),
            [
                'Content-Type' => $metadata['mime_type'],
                'Content-Disposition' => 'inline; filename="' . $metadata['original_name'] . '"'
            ]
        );
    }

    /**
     * Validate file upload constraints.
     */
    public function validateFile(UploadedFile $file, array $rules = []): array
    {
        $errors = [];
        
        // Check max file size
        if (isset($rules['max_size'])) {
            $maxSize = $this->parseSize($rules['max_size']);
            if ($file->getSize() > $maxSize) {
                $errors[] = "File size exceeds maximum allowed size of {$rules['max_size']}";
            }
        }
        
        // Check file type
        if (isset($rules['allowed_types'])) {
            $allowedTypes = is_array($rules['allowed_types']) ? $rules['allowed_types'] : [$rules['allowed_types']];
            $fileType = $file->getMimeType();
            $fileName = $file->getClientOriginalName();
            
            $isAllowed = false;
            foreach ($allowedTypes as $allowedType) {
                if ($allowedType === $fileType) {
                    $isAllowed = true;
                    break;
                }
                
                if (str_ends_with($allowedType, '/*')) {
                    $category = str_replace('/*', '/', $allowedType);
                    if (str_starts_with($fileType, $category)) {
                        $isAllowed = true;
                        break;
                    }
                }
                
                if (str_starts_with($allowedType, '.')) {
                    if (str_ends_with(strtolower($fileName), strtolower($allowedType))) {
                        $isAllowed = true;
                        break;
                    }
                }
            }
            
            if (!$isAllowed) {
                $errors[] = "File type not allowed. Accepted types: " . implode(', ', $allowedTypes);
            }
        }
        
        return $errors;
    }

    /**
     * Parse size string to bytes.
     */
    protected function parseSize(string $size): int
    {
        $size = strtolower(trim($size));
        $bytes = (int) $size;
        
        if (str_contains($size, 'k')) {
            $bytes *= 1024;
        } elseif (str_contains($size, 'm')) {
            $bytes *= 1024 * 1024;
        } elseif (str_contains($size, 'g')) {
            $bytes *= 1024 * 1024 * 1024;
        }
        
        return $bytes;
    }
}