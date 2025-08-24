<?php

declare(strict_types=1);

namespace Strata\UI\Traits;

use Strata\UI\Services\StrataFileUploadService;

/**
 * Trait for models that need to handle deferred file uploads.
 * Solves the Spatie Media Library challenge by allowing file uploads before model creation.
 */
trait HasDeferredUploads
{
    /**
     * Boot the trait.
     */
    protected static function bootHasDeferredUploads(): void
    {
        // Automatically attach deferred uploads after model creation
        static::created(function ($model) {
            if (method_exists($model, 'shouldAutoAttachDeferredUploads') && !$model->shouldAutoAttachDeferredUploads()) {
                return;
            }
            
            $model->attachDeferredUploadsFromSession();
        });
    }

    /**
     * Attach deferred uploads from the current session.
     */
    public function attachDeferredUploadsFromSession(string $collection = 'default'): array
    {
        $sessionKey = session()->getId();
        return $this->attachDeferredUploads($sessionKey, $collection);
    }

    /**
     * Attach deferred uploads using a specific session key.
     */
    public function attachDeferredUploads(string $sessionKey, string $collection = 'default'): array
    {
        $uploadService = app(StrataFileUploadService::class);
        return $uploadService->attachDeferredFiles($this, $sessionKey, $collection);
    }

    /**
     * Attach deferred uploads to multiple collections.
     */
    public function attachDeferredUploadsToCollections(array $collectionsMap, string $sessionKey = null): array
    {
        $sessionKey = $sessionKey ?: session()->getId();
        $results = [];
        
        foreach ($collectionsMap as $sessionSuffix => $collection) {
            $fullSessionKey = $sessionKey . '-' . $sessionSuffix;
            $results[$collection] = $this->attachDeferredUploads($fullSessionKey, $collection);
        }
        
        return $results;
    }

    /**
     * Get deferred uploads for the current session.
     */
    public function getDeferredUploads(string $sessionKey = null): array
    {
        $sessionKey = $sessionKey ?: session()->getId();
        $uploadService = app(StrataFileUploadService::class);
        return $uploadService->getSessionTemporaryFiles($sessionKey);
    }

    /**
     * Clean up deferred uploads for the current session without attaching them.
     */
    public function cleanupDeferredUploads(string $sessionKey = null): void
    {
        $sessionKey = $sessionKey ?: session()->getId();
        $deferredFiles = session("file_uploads.deferred.{$sessionKey}", []);
        $uploadService = app(StrataFileUploadService::class);
        
        foreach ($deferredFiles as $fileId) {
            $uploadService->cleanupTemporaryFile($fileId);
        }
        
        session()->forget("file_uploads.deferred.{$sessionKey}");
    }

    /**
     * Check if there are pending deferred uploads for the current session.
     */
    public function hasDeferredUploads(string $sessionKey = null): bool
    {
        $sessionKey = $sessionKey ?: session()->getId();
        $deferredFiles = session("file_uploads.deferred.{$sessionKey}", []);
        return count($deferredFiles) > 0;
    }

    /**
     * Get the count of deferred uploads for the current session.
     */
    public function getDeferredUploadsCount(string $sessionKey = null): int
    {
        $sessionKey = $sessionKey ?: session()->getId();
        $deferredFiles = session("file_uploads.deferred.{$sessionKey}", []);
        return count($deferredFiles);
    }

    /**
     * Override this method to control automatic attachment of deferred uploads.
     */
    public function shouldAutoAttachDeferredUploads(): bool
    {
        return true;
    }

    /**
     * Get the default collection for deferred uploads.
     */
    public function getDefaultDeferredUploadCollection(): string
    {
        return 'default';
    }

    /**
     * Define collection mappings for different upload contexts.
     * Override this method to define multiple collections.
     */
    public function getDeferredUploadCollectionMappings(): array
    {
        return [
            'default' => $this->getDefaultDeferredUploadCollection()
        ];
    }

    /**
     * Handle deferred uploads with custom logic.
     * Override this method for complex attachment scenarios.
     */
    public function handleDeferredUploadsWithCallback(callable $callback, string $sessionKey = null): array
    {
        $sessionKey = $sessionKey ?: session()->getId();
        $uploadService = app(StrataFileUploadService::class);
        $deferredFiles = session("file_uploads.deferred.{$sessionKey}", []);
        $results = [];
        
        foreach ($deferredFiles as $fileId) {
            $metadata = $uploadService->getTemporaryFileMetadata($fileId);
            
            if ($metadata) {
                $result = $callback($this, $metadata, $uploadService);
                if ($result) {
                    $results[] = $result;
                    $uploadService->cleanupTemporaryFile($fileId);
                }
            }
        }
        
        // Clear session if all files were processed
        if (count($results) === count($deferredFiles)) {
            session()->forget("file_uploads.deferred.{$sessionKey}");
        }
        
        return $results;
    }

    /**
     * Scope query to models that have deferred uploads.
     */
    public function scopeWithDeferredUploads($query, string $sessionKey = null)
    {
        // This is a placeholder for potential future functionality
        // where we might track deferred uploads in the database
        return $query;
    }

    /**
     * Event hook called before attaching deferred uploads.
     */
    protected function beforeAttachingDeferredUploads(array $fileIds): void
    {
        // Override in model if needed
    }

    /**
     * Event hook called after attaching deferred uploads.
     */
    protected function afterAttachingDeferredUploads(array $attachedFiles): void
    {
        // Override in model if needed
    }
}