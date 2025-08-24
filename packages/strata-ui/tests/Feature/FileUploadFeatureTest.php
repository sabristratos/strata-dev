<?php

declare(strict_types=1);

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Strata\UI\Services\StrataFileUploadService;

describe('File Upload Feature', function () {
    beforeEach(function () {
        Storage::fake('local');
        Cache::flush();
        Session::flush();
        $this->service = app(StrataFileUploadService::class);
    });

    describe('Temporary Upload Flow', function () {
        it('allows uploading files temporarily', function () {
            $file = UploadedFile::fake()->image('temp-upload.jpg', 200, 200);
            $sessionKey = 'temp-session-' . uniqid();
            
            $result = $this->service->handleTemporaryUpload($file, $sessionKey);
            
            expect($result)->toHaveKey('id')
            ->and($result)->toHaveKey('name', 'temp-upload.jpg')
            ->and($result)->toHaveKey('size')
            ->and($result)->toHaveKey('type', 'image/jpeg')
            ->and($result)->toHaveKey('url', null)
            ->and($result['metadata'])->toHaveKey('session_key', $sessionKey);
            
            // Verify file is stored
            $metadata = $result['metadata'];
            expect(Storage::disk('local')->exists($metadata['path']))->toBeTrue();
            
            // Verify metadata is cached
            $cachedMetadata = Cache::get("file_upload.{$result['id']}");
            expect($cachedMetadata)->not->toBeNull()
            ->and($cachedMetadata['id'])->toBe($result['id']);
        });

        it('can retrieve uploaded temporary files by session', function () {
            $sessionKey = 'multi-temp-session';
            
            // Upload multiple files
            $file1 = UploadedFile::fake()->image('file1.jpg');
            $file2 = UploadedFile::fake()->image('file2.png');
            $file3 = UploadedFile::fake()->create('document.pdf', 100, 'application/pdf');
            
            $this->service->handleTemporaryUpload($file1, $sessionKey);
            $this->service->handleTemporaryUpload($file2, $sessionKey);
            $this->service->handleTemporaryUpload($file3, $sessionKey);
            
            $sessionFiles = $this->service->getSessionTemporaryFiles($sessionKey);
            
            expect($sessionFiles)->toHaveCount(3);
            
            $fileNames = array_column($sessionFiles, 'original_name');
            expect($fileNames)->toContain('file1.jpg')
            ->and($fileNames)->toContain('file2.png')
            ->and($fileNames)->toContain('document.pdf');
        });

        it('can clean up temporary files', function () {
            $file = UploadedFile::fake()->image('cleanup-test.jpg');
            $sessionKey = 'cleanup-session';
            
            $result = $this->service->handleTemporaryUpload($file, $sessionKey);
            $fileId = $result['id'];
            $filePath = $result['metadata']['path'];
            
            // Verify file exists
            expect(Storage::disk('local')->exists($filePath))->toBeTrue();
            expect(Cache::get("file_upload.{$fileId}"))->not->toBeNull();
            
            // Clean up
            $cleaned = $this->service->cleanupTemporaryFile($fileId);
            
            expect($cleaned)->toBeTrue();
            expect(Storage::disk('local')->exists($filePath))->toBeFalse();
            expect(Cache::get("file_upload.{$fileId}"))->toBeNull();
        });

        it('generates temporary file URLs correctly', function () {
            $file = UploadedFile::fake()->image('url-test.jpg');
            $result = $this->service->handleTemporaryUpload($file);
            
            $url = $this->service->getTemporaryFileUrl($result['id']);
            
            expect($url)->toBeString()
            ->and($url)->toContain('strata.file-upload.serve')
            ->and($url)->toContain($result['id']);
        });
    });

    describe('Deferred Upload Flow', function () {
        it('tracks deferred uploads in session', function () {
            $sessionKey = 'deferred-session';
            $file = UploadedFile::fake()->image('deferred.jpg');
            
            $result = $this->service->handleDeferredUpload($file, $sessionKey);
            
            // Verify file was uploaded temporarily
            expect($result)->toHaveKey('id')
            ->and($result)->toHaveKey('name', 'deferred.jpg');
            
            // Verify file ID was added to session
            $deferredFiles = session("file_uploads.deferred.{$sessionKey}", []);
            expect($deferredFiles)->toContain($result['id']);
        });

        it('handles multiple deferred uploads', function () {
            $sessionKey = 'multi-deferred-session';
            
            $file1 = UploadedFile::fake()->image('deferred1.jpg');
            $file2 = UploadedFile::fake()->create('document.pdf', 100, 'application/pdf');
            
            $result1 = $this->service->handleDeferredUpload($file1, $sessionKey);
            $result2 = $this->service->handleDeferredUpload($file2, $sessionKey);
            
            $deferredFiles = session("file_uploads.deferred.{$sessionKey}", []);
            
            expect($deferredFiles)->toHaveCount(2)
            ->and($deferredFiles)->toContain($result1['id'])
            ->and($deferredFiles)->toContain($result2['id']);
        });

        it('can retrieve metadata for deferred uploads', function () {
            $sessionKey = 'metadata-test-session';
            $file = UploadedFile::fake()->image('metadata-test.jpg', 150, 150);
            
            $result = $this->service->handleDeferredUpload($file, $sessionKey);
            $metadata = $this->service->getTemporaryFileMetadata($result['id']);
            
            expect($metadata)->not->toBeNull()
            ->and($metadata['original_name'])->toBe('metadata-test.jpg')
            ->and($metadata['session_key'])->toBe($sessionKey)
            ->and($metadata['size'])->toBeInt()
            ->and($metadata['mime_type'])->toBe('image/jpeg');
        });
    });

    describe('File Validation', function () {
        it('validates file size constraints', function () {
            $smallFile = UploadedFile::fake()->image('small.jpg', 50, 50)->size(100); // 100KB
            $largeFile = UploadedFile::fake()->image('large.jpg', 500, 500)->size(5120); // 5MB
            
            $rules = ['max_size' => '2MB'];
            
            $smallFileErrors = $this->service->validateFile($smallFile, $rules);
            $largeFileErrors = $this->service->validateFile($largeFile, $rules);
            
            expect($smallFileErrors)->toBe([]);
            expect($largeFileErrors)->toHaveCount(1);
            expect($largeFileErrors[0])->toContain('File size exceeds maximum allowed size of 2MB');
        });

        it('validates file type constraints', function () {
            $imageFile = UploadedFile::fake()->image('image.jpg');
            $textFile = UploadedFile::fake()->create('text.txt', 100, 'text/plain');
            $pdfFile = UploadedFile::fake()->create('document.pdf', 100, 'application/pdf');
            
            $imageRules = ['allowed_types' => ['image/jpeg', 'image/png']];
            $pdfRules = ['allowed_types' => ['.pdf']];
            $mixedRules = ['allowed_types' => ['image/*', '.pdf']];
            
            // Test image validation
            expect($this->service->validateFile($imageFile, $imageRules))->toBe([]);
            expect($this->service->validateFile($textFile, $imageRules))->not->toBe([]);
            
            // Test PDF validation
            expect($this->service->validateFile($pdfFile, $pdfRules))->toBe([]);
            expect($this->service->validateFile($textFile, $pdfRules))->not->toBe([]);
            
            // Test mixed validation
            expect($this->service->validateFile($imageFile, $mixedRules))->toBe([]);
            expect($this->service->validateFile($pdfFile, $mixedRules))->toBe([]);
            expect($this->service->validateFile($textFile, $mixedRules))->not->toBe([]);
        });

        it('validates wildcard file types', function () {
            $imageJpeg = UploadedFile::fake()->image('image.jpg');
            $imagePng = UploadedFile::fake()->image('image.png'); 
            $textFile = UploadedFile::fake()->create('text.txt', 100, 'text/plain');
            
            $rules = ['allowed_types' => ['image/*']];
            
            expect($this->service->validateFile($imageJpeg, $rules))->toBe([]);
            expect($this->service->validateFile($imagePng, $rules))->toBe([]);
            expect($this->service->validateFile($textFile, $rules))->not->toBe([]);
        });

        it('validates multiple constraints simultaneously', function () {
            // Large text file that violates both size and type constraints
            $invalidFile = UploadedFile::fake()->create('large.txt', 3072, 'text/plain'); // 3MB
            
            $rules = [
                'max_size' => '1MB',
                'allowed_types' => ['image/*']
            ];
            
            $errors = $this->service->validateFile($invalidFile, $rules);
            
            expect($errors)->toHaveCount(2);
            expect($errors[0])->toContain('File size exceeds maximum allowed size');
            expect($errors[1])->toContain('File type not allowed');
        });

        it('handles case insensitive file extensions', function () {
            $upperCaseFile = UploadedFile::fake()->create('DOCUMENT.PDF', 100, 'application/pdf');
            $lowerCaseFile = UploadedFile::fake()->create('document.pdf', 100, 'application/pdf');
            
            $rules = ['allowed_types' => ['.pdf']];
            
            expect($this->service->validateFile($upperCaseFile, $rules))->toBe([]);
            expect($this->service->validateFile($lowerCaseFile, $rules))->toBe([]);
        });
    });

    describe('Size Parsing', function () {
        it('parses various size formats correctly', function () {
            expect($this->service->parseSize('100'))->toBe(100);
            expect($this->service->parseSize('1k'))->toBe(1024);
            expect($this->service->parseSize('1K'))->toBe(1024);
            expect($this->service->parseSize('2KB'))->toBe(2048);
            expect($this->service->parseSize('1m'))->toBe(1024 * 1024);
            expect($this->service->parseSize('1M'))->toBe(1024 * 1024);
            expect($this->service->parseSize('5MB'))->toBe(5 * 1024 * 1024);
            expect($this->service->parseSize('1g'))->toBe(1024 * 1024 * 1024);
            expect($this->service->parseSize('1G'))->toBe(1024 * 1024 * 1024);
            expect($this->service->parseSize('2GB'))->toBe(2 * 1024 * 1024 * 1024);
        });

        it('handles decimal sizes correctly', function () {
            expect($this->service->parseSize('1.5MB'))->toBe((int)(1.5 * 1024 * 1024));
            expect($this->service->parseSize('0.5GB'))->toBe((int)(0.5 * 1024 * 1024 * 1024));
        });

        it('defaults to bytes for plain numbers', function () {
            expect($this->service->parseSize('1024'))->toBe(1024);
            expect($this->service->parseSize('2048'))->toBe(2048);
        });
    });

    describe('Cleanup and Maintenance', function () {
        it('cleans up expired files correctly', function () {
            // Create a file
            $file = UploadedFile::fake()->image('expired.jpg');
            $result = $this->service->handleTemporaryUpload($file);
            $fileId = $result['id'];
            $filePath = $result['metadata']['path'];
            
            // Manually expire the file by updating its cache entry
            $metadata = Cache::get("file_upload.{$fileId}");
            $metadata['cleanup_after'] = now()->subHours(2)->toISOString();
            Cache::put("file_upload.{$fileId}", $metadata, now()->addHours(1));
            
            // Verify file exists before cleanup
            expect(Storage::disk('local')->exists($filePath))->toBeTrue();
            expect(Cache::get("file_upload.{$fileId}"))->not->toBeNull();
            
            // Run cleanup
            $cleanedFiles = $this->service->cleanupExpiredFiles();
            
            // Verify file was cleaned up
            expect($cleanedFiles)->toContain($filePath);
            expect(Storage::disk('local')->exists($filePath))->toBeFalse();
            expect(Cache::get("file_upload.{$fileId}"))->toBeNull();
        });

        it('does not clean up non-expired files', function () {
            // Create a file
            $file = UploadedFile::fake()->image('fresh.jpg');
            $result = $this->service->handleTemporaryUpload($file);
            $fileId = $result['id'];
            $filePath = $result['metadata']['path'];
            
            // Run cleanup
            $cleanedFiles = $this->service->cleanupExpiredFiles();
            
            // Verify file was not cleaned up
            expect($cleanedFiles)->not->toContain($filePath);
            expect(Storage::disk('local')->exists($filePath))->toBeTrue();
            expect(Cache::get("file_upload.{$fileId}"))->not->toBeNull();
        });

        it('cleans up orphaned files without metadata', function () {
            // Create a file manually without proper metadata
            $filePath = 'file-uploads/temporary/orphaned-session/orphaned-file.jpg';
            Storage::disk('local')->put($filePath, 'fake content');
            
            // Verify file exists
            expect(Storage::disk('local')->exists($filePath))->toBeTrue();
            
            // Run cleanup
            $cleanedFiles = $this->service->cleanupExpiredFiles();
            
            // Verify orphaned file was cleaned up
            expect($cleanedFiles)->toContain($filePath);
            expect(Storage::disk('local')->exists($filePath))->toBeFalse();
        });
    });

    describe('Session Management', function () {
        it('handles different session keys independently', function () {
            $session1 = 'session-1';
            $session2 = 'session-2';
            
            $file1 = UploadedFile::fake()->image('session1.jpg');
            $file2 = UploadedFile::fake()->image('session2.jpg');
            
            $result1 = $this->service->handleTemporaryUpload($file1, $session1);
            $result2 = $this->service->handleTemporaryUpload($file2, $session2);
            
            $session1Files = $this->service->getSessionTemporaryFiles($session1);
            $session2Files = $this->service->getSessionTemporaryFiles($session2);
            
            expect($session1Files)->toHaveCount(1);
            expect($session2Files)->toHaveCount(1);
            expect($session1Files[0]['id'])->toBe($result1['id']);
            expect($session2Files[0]['id'])->toBe($result2['id']);
        });

        it('returns empty array for non-existent session', function () {
            $files = $this->service->getSessionTemporaryFiles('non-existent-session');
            
            expect($files)->toBe([]);
        });
    });

    describe('Error Handling', function () {
        it('handles missing file metadata gracefully', function () {
            $metadata = $this->service->getTemporaryFileMetadata('non-existent-id');
            
            expect($metadata)->toBeNull();
        });

        it('handles cleanup of non-existent files gracefully', function () {
            $result = $this->service->cleanupTemporaryFile('non-existent-id');
            
            expect($result)->toBeFalse();
        });

        it('handles serving non-existent files gracefully', function () {
            $response = $this->service->serveTemporaryFile('non-existent-id');
            
            expect($response)->toBeNull();
        });

        it('handles URL generation for non-existent files gracefully', function () {
            $url = $this->service->getTemporaryFileUrl('non-existent-id');
            
            expect($url)->toBeNull();
        });
    });
});