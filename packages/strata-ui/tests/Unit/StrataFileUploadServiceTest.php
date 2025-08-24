<?php

declare(strict_types=1);

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Strata\UI\Services\StrataFileUploadService;

// Mock interface for HasMedia since we don't have Spatie in tests
interface MockHasMedia
{
    //
}

describe('StrataFileUploadService', function () {
    beforeEach(function () {
        $this->service = new StrataFileUploadService();
        Storage::fake('local');
        Cache::flush();
    });

    it('can be instantiated', function () {
        expect($this->service)->toBeInstanceOf(StrataFileUploadService::class);
    });

    it('handles temporary file upload correctly', function () {
        $file = UploadedFile::fake()->image('test.jpg', 100, 100);
        $sessionKey = 'test-session';
        
        $result = $this->service->handleTemporaryUpload($file, $sessionKey);
        
        expect($result)->toHaveKey('id')
        ->and($result)->toHaveKey('name', 'test.jpg')
        ->and($result)->toHaveKey('size')
        ->and($result)->toHaveKey('type')
        ->and($result)->toHaveKey('url', null)
        ->and($result)->toHaveKey('metadata');
        
        // Verify file was stored
        $metadata = $result['metadata'];
        expect(Storage::disk('local')->exists($metadata['path']))->toBeTrue();
        
        // Verify metadata was cached
        expect(Cache::get("file_upload.{$result['id']}"))->not->toBeNull();
    });

    it('handles deferred file upload correctly', function () {
        $file = UploadedFile::fake()->image('deferred.jpg', 150, 150);
        $sessionKey = 'deferred-session';
        
        $result = $this->service->handleDeferredUpload($file, $sessionKey);
        
        expect($result)->toHaveKey('id')
        ->and($result)->toHaveKey('name', 'deferred.jpg');
        
        // Verify file was added to session
        $deferredFiles = session("file_uploads.deferred.{$sessionKey}", []);
        expect($deferredFiles)->toContain($result['id']);
    });

    it('retrieves temporary file metadata correctly', function () {
        $file = UploadedFile::fake()->image('metadata.jpg', 200, 200);
        $sessionKey = 'metadata-session';
        
        $result = $this->service->handleTemporaryUpload($file, $sessionKey);
        $metadata = $this->service->getTemporaryFileMetadata($result['id']);
        
        expect($metadata)->not->toBeNull()
        ->and($metadata['id'])->toBe($result['id'])
        ->and($metadata['original_name'])->toBe('metadata.jpg')
        ->and($metadata['session_key'])->toBe($sessionKey);
    });

    it('returns null for non-existent file metadata', function () {
        $metadata = $this->service->getTemporaryFileMetadata('non-existent-id');
        
        expect($metadata)->toBeNull();
    });

    it('gets session temporary files correctly', function () {
        $sessionKey = 'session-files-test';
        
        // Upload multiple files
        $file1 = UploadedFile::fake()->image('file1.jpg', 100, 100);
        $file2 = UploadedFile::fake()->image('file2.jpg', 150, 150);
        
        $result1 = $this->service->handleTemporaryUpload($file1, $sessionKey);
        $result2 = $this->service->handleTemporaryUpload($file2, $sessionKey);
        
        $sessionFiles = $this->service->getSessionTemporaryFiles($sessionKey);
        
        expect($sessionFiles)->toHaveCount(2)
        ->and($sessionFiles[0]['id'])->toBe($result1['id'])
        ->and($sessionFiles[1]['id'])->toBe($result2['id']);
    });

    it('returns empty array for non-existent session', function () {
        $sessionFiles = $this->service->getSessionTemporaryFiles('non-existent-session');
        
        expect($sessionFiles)->toBe([]);
    });

    it('cleans up temporary file correctly', function () {
        $file = UploadedFile::fake()->image('cleanup.jpg', 100, 100);
        $sessionKey = 'cleanup-session';
        
        $result = $this->service->handleTemporaryUpload($file, $sessionKey);
        $fileId = $result['id'];
        $metadata = $result['metadata'];
        
        // Verify file exists before cleanup
        expect(Storage::disk('local')->exists($metadata['path']))->toBeTrue();
        expect(Cache::get("file_upload.{$fileId}"))->not->toBeNull();
        
        // Clean up file
        $cleaned = $this->service->cleanupTemporaryFile($fileId);
        
        expect($cleaned)->toBeTrue();
        expect(Storage::disk('local')->exists($metadata['path']))->toBeFalse();
        expect(Cache::get("file_upload.{$fileId}"))->toBeNull();
    });

    it('returns false when cleaning up non-existent file', function () {
        $cleaned = $this->service->cleanupTemporaryFile('non-existent-id');
        
        expect($cleaned)->toBeFalse();
    });

    it('validates file correctly with size constraint', function () {
        $smallFile = UploadedFile::fake()->image('small.jpg', 50, 50)->size(100); // 100KB
        $largeFile = UploadedFile::fake()->image('large.jpg', 500, 500)->size(2048); // 2MB
        
        $rules = ['max_size' => '1MB'];
        
        $smallFileErrors = $this->service->validateFile($smallFile, $rules);
        $largeFileErrors = $this->service->validateFile($largeFile, $rules);
        
        expect($smallFileErrors)->toBe([]);
        expect($largeFileErrors)->toHaveCount(1);
        expect($largeFileErrors[0])->toContain('exceeds maximum allowed size');
    });

    it('validates file correctly with type constraint', function () {
        $imageFile = UploadedFile::fake()->image('image.jpg');
        $textFile = UploadedFile::fake()->create('document.txt', 100, 'text/plain');
        
        $rules = ['allowed_types' => ['image/jpeg', 'image/png']];
        
        $imageErrors = $this->service->validateFile($imageFile, $rules);
        $textErrors = $this->service->validateFile($textFile, $rules);
        
        expect($imageErrors)->toBe([]);
        expect($textErrors)->toHaveCount(1);
        expect($textErrors[0])->toContain('File type not allowed');
    });

    it('validates file with wildcard type constraint', function () {
        $imageFile = UploadedFile::fake()->image('image.jpg');
        $rules = ['allowed_types' => ['image/*']];
        
        $errors = $this->service->validateFile($imageFile, $rules);
        
        expect($errors)->toBe([]);
    });

    it('validates file with extension constraint', function () {
        $pdfFile = UploadedFile::fake()->create('document.pdf', 100, 'application/pdf');
        $rules = ['allowed_types' => ['.pdf', '.doc']];
        
        $errors = $this->service->validateFile($pdfFile, $rules);
        
        expect($errors)->toBe([]);
    });

    it('parses size strings correctly', function () {
        expect($this->service->parseSize('100'))->toBe(100);
        expect($this->service->parseSize('1k'))->toBe(1024);
        expect($this->service->parseSize('2KB'))->toBe(2048);
        expect($this->service->parseSize('1m'))->toBe(1024 * 1024);
        expect($this->service->parseSize('5MB'))->toBe(5 * 1024 * 1024);
        expect($this->service->parseSize('1g'))->toBe(1024 * 1024 * 1024);
        expect($this->service->parseSize('2GB'))->toBe(2 * 1024 * 1024 * 1024);
    });

    it('generates temporary file URL correctly', function () {
        $file = UploadedFile::fake()->image('url-test.jpg');
        $result = $this->service->handleTemporaryUpload($file);
        
        $url = $this->service->getTemporaryFileUrl($result['id']);
        
        expect($url)->toContain('strata.file-upload.serve');
        expect($url)->toContain($result['id']);
    });

    it('returns null for non-existent file URL', function () {
        $url = $this->service->getTemporaryFileUrl('non-existent-id');
        
        expect($url)->toBeNull();
    });

    it('cleans up expired files correctly', function () {
        // Create a file and manually set expired metadata
        $file = UploadedFile::fake()->image('expired.jpg');
        $result = $this->service->handleTemporaryUpload($file);
        $fileId = $result['id'];
        
        // Manually set expired metadata
        $metadata = Cache::get("file_upload.{$fileId}");
        $metadata['cleanup_after'] = now()->subHours(2)->toISOString();
        Cache::put("file_upload.{$fileId}", $metadata, now()->addHours(24));
        
        $cleanedFiles = $this->service->cleanupExpiredFiles();
        
        expect($cleanedFiles)->toContain($metadata['path']);
        expect(Cache::get("file_upload.{$fileId}"))->toBeNull();
    });

    it('validates multiple rules simultaneously', function () {
        $largeTextFile = UploadedFile::fake()->create('large.txt', 5120, 'text/plain'); // 5MB
        
        $rules = [
            'max_size' => '2MB',
            'allowed_types' => ['image/*']
        ];
        
        $errors = $this->service->validateFile($largeTextFile, $rules);
        
        expect($errors)->toHaveCount(2);
        expect($errors[0])->toContain('exceeds maximum allowed size');
        expect($errors[1])->toContain('File type not allowed');
    });

    it('handles case insensitive extensions correctly', function () {
        $upperCaseFile = UploadedFile::fake()->create('document.PDF', 100, 'application/pdf');
        $rules = ['allowed_types' => ['.pdf']];
        
        $errors = $this->service->validateFile($upperCaseFile, $rules);
        
        expect($errors)->toBe([]);
    });
});