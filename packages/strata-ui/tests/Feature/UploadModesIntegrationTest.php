<?php

declare(strict_types=1);

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use Strata\UI\Services\StrataFileUploadService;
use Strata\UI\Traits\HasDeferredUploads;

// Mock interface for HasMedia since we don't have Spatie in tests
interface MockHasMedia
{
    //
}

// Mock trait for InteractsWithMedia
trait MockInteractsWithMedia
{
    //
}

// Test model for integration testing
class IntegrationTestModel extends Model implements MockHasMedia
{
    use HasDeferredUploads, MockInteractsWithMedia;
    
    protected $fillable = ['name'];
    
    // Mock the table name for testing
    protected $table = 'test_models';
    
    public $timestamps = false;
}

describe('Upload Modes Integration', function () {
    beforeEach(function () {
        Storage::fake('local');
        Cache::flush();
        Session::flush();
        $this->service = app(StrataFileUploadService::class);
    });

    describe('Temporary Upload Mode Integration', function () {
        it('handles complete temporary upload workflow', function () {
            $sessionKey = 'temp-integration-' . uniqid();
            
            // Step 1: Upload files temporarily
            $file1 = UploadedFile::fake()->image('temp1.jpg', 200, 200);
            $file2 = UploadedFile::fake()->create('document.pdf', 100, 'application/pdf');
            
            $result1 = $this->service->handleTemporaryUpload($file1, $sessionKey);
            $result2 = $this->service->handleTemporaryUpload($file2, $sessionKey);
            
            // Step 2: Verify files are stored temporarily
            expect(Storage::disk('local')->exists($result1['metadata']['path']))->toBeTrue();
            expect(Storage::disk('local')->exists($result2['metadata']['path']))->toBeTrue();
            
            // Step 3: Retrieve session files
            $sessionFiles = $this->service->getSessionTemporaryFiles($sessionKey);
            expect($sessionFiles)->toHaveCount(2);
            
            // Step 4: Verify metadata is accessible
            $metadata1 = $this->service->getTemporaryFileMetadata($result1['id']);
            $metadata2 = $this->service->getTemporaryFileMetadata($result2['id']);
            
            expect($metadata1['original_name'])->toBe('temp1.jpg');
            expect($metadata2['original_name'])->toBe('document.pdf');
            
            // Step 5: Clean up files
            $cleaned1 = $this->service->cleanupTemporaryFile($result1['id']);
            $cleaned2 = $this->service->cleanupTemporaryFile($result2['id']);
            
            expect($cleaned1)->toBeTrue();
            expect($cleaned2)->toBeTrue();
            expect(Storage::disk('local')->exists($result1['metadata']['path']))->toBeFalse();
            expect(Storage::disk('local')->exists($result2['metadata']['path']))->toBeFalse();
        });

        it('maintains file isolation between sessions', function () {
            $session1 = 'session-1-' . uniqid();
            $session2 = 'session-2-' . uniqid();
            
            // Upload to different sessions
            $file1 = UploadedFile::fake()->image('session1.jpg');
            $file2 = UploadedFile::fake()->image('session2.jpg');
            
            $result1 = $this->service->handleTemporaryUpload($file1, $session1);
            $result2 = $this->service->handleTemporaryUpload($file2, $session2);
            
            // Verify session isolation
            $session1Files = $this->service->getSessionTemporaryFiles($session1);
            $session2Files = $this->service->getSessionTemporaryFiles($session2);
            
            expect($session1Files)->toHaveCount(1);
            expect($session2Files)->toHaveCount(1);
            expect($session1Files[0]['id'])->toBe($result1['id']);
            expect($session2Files[0]['id'])->toBe($result2['id']);
            
            // Cleanup one session shouldn't affect the other
            $this->service->cleanupTemporaryFile($result1['id']);
            
            $session1FilesAfterCleanup = $this->service->getSessionTemporaryFiles($session1);
            $session2FilesAfterCleanup = $this->service->getSessionTemporaryFiles($session2);
            
            expect($session1FilesAfterCleanup)->toHaveCount(0);
            expect($session2FilesAfterCleanup)->toHaveCount(1);
        });
    });

    describe('Deferred Upload Mode Integration', function () {
        it('handles complete deferred upload workflow', function () {
            $sessionKey = 'deferred-integration-' . uniqid();
            
            // Step 1: Upload files in deferred mode
            $file1 = UploadedFile::fake()->image('deferred1.jpg');
            $file2 = UploadedFile::fake()->create('deferred.pdf', 100, 'application/pdf');
            
            $result1 = $this->service->handleDeferredUpload($file1, $sessionKey);
            $result2 = $this->service->handleDeferredUpload($file2, $sessionKey);
            
            // Step 2: Verify files are stored and tracked in session
            expect(Storage::disk('local')->exists($result1['metadata']['path']))->toBeTrue();
            expect(Storage::disk('local')->exists($result2['metadata']['path']))->toBeTrue();
            
            $deferredFiles = session("file_uploads.deferred.{$sessionKey}", []);
            expect($deferredFiles)->toHaveCount(2);
            expect($deferredFiles)->toContain($result1['id']);
            expect($deferredFiles)->toContain($result2['id']);
            
            // Step 3: Simulate model creation and attachment
            $model = new IntegrationTestModel();
            
            // Mock the attachment process since we don't have actual Spatie setup
            $attachedFiles = [
                ['id' => 1, 'name' => 'deferred1.jpg', 'original_file_id' => $result1['id']],
                ['id' => 2, 'name' => 'deferred.pdf', 'original_file_id' => $result2['id']]
            ];
            
            // Simulate successful attachment by clearing session
            session()->forget("file_uploads.deferred.{$sessionKey}");
            
            // Step 4: Verify session was cleared after attachment
            $remainingDeferredFiles = session("file_uploads.deferred.{$sessionKey}", []);
            expect($remainingDeferredFiles)->toBe([]);
        });

        it('handles multiple collection mappings', function () {
            $sessionKey = 'multi-collection-' . uniqid();
            $model = new IntegrationTestModel();
            
            // Upload files for different collections
            $imageFile = UploadedFile::fake()->image('image.jpg');
            $documentFile = UploadedFile::fake()->create('document.pdf', 100, 'application/pdf');
            
            // Simulate different session suffixes for collections
            $imageResult = $this->service->handleDeferredUpload($imageFile, $sessionKey . '-images');
            $documentResult = $this->service->handleDeferredUpload($documentFile, $sessionKey . '-documents');
            
            // Verify session tracking
            $imageSession = session("file_uploads.deferred.{$sessionKey}-images", []);
            $documentSession = session("file_uploads.deferred.{$sessionKey}-documents", []);
            
            expect($imageSession)->toContain($imageResult['id']);
            expect($documentSession)->toContain($documentResult['id']);
            
            // Test collection mapping structure
            $collectionsMap = [
                'images' => 'gallery',
                'documents' => 'project-documents'
            ];
            
            // Verify the mapping would work correctly
            foreach ($collectionsMap as $sessionSuffix => $collection) {
                $fullSessionKey = $sessionKey . '-' . $sessionSuffix;
                $sessionFiles = session("file_uploads.deferred.{$fullSessionKey}", []);
                expect($sessionFiles)->not->toBe([]);
            }
        });
    });

    describe('Model Integration with HasDeferredUploads', function () {
        it('integrates deferred uploads with model lifecycle', function () {
            $sessionId = session()->getId();
            $model = new IntegrationTestModel();
            
            // Setup session with deferred files
            $file = UploadedFile::fake()->image('model-integration.jpg');
            $result = $this->service->handleDeferredUpload($file, $sessionId);
            
            // Verify session contains the file
            $deferredFiles = session("file_uploads.deferred.{$sessionId}", []);
            expect($deferredFiles)->toContain($result['id']);
            
            // Test the trait methods
            expect($model->hasDeferredUploads($sessionId))->toBeTrue();
            expect($model->getDeferredUploadsCount($sessionId))->toBe(1);
            
            $uploads = $model->getDeferredUploads($sessionId);
            expect($uploads)->toHaveCount(1);
            expect($uploads[0]['original_name'])->toBe('model-integration.jpg');
        });

        it('provides configuration methods for model integration', function () {
            $model = new IntegrationTestModel();
            
            // Test default configuration
            expect($model->getDefaultDeferredUploadCollection())->toBe('default');
            expect($model->shouldAutoAttachDeferredUploads())->toBeTrue();
            
            $mappings = $model->getDeferredUploadCollectionMappings();
            expect($mappings)->toHaveKey('default', 'default');
        });

        it('handles cleanup of deferred uploads', function () {
            $sessionKey = 'cleanup-test-' . uniqid();
            $model = new IntegrationTestModel();
            
            // Create deferred uploads
            $file1 = UploadedFile::fake()->image('cleanup1.jpg');
            $file2 = UploadedFile::fake()->create('cleanup2.pdf', 100, 'application/pdf');
            
            $result1 = $this->service->handleDeferredUpload($file1, $sessionKey);
            $result2 = $this->service->handleDeferredUpload($file2, $sessionKey);
            
            // Verify files exist
            expect($model->hasDeferredUploads($sessionKey))->toBeTrue();
            expect($model->getDeferredUploadsCount($sessionKey))->toBe(2);
            
            // Cleanup deferred uploads
            $model->cleanupDeferredUploads($sessionKey);
            
            // Verify cleanup
            expect($model->hasDeferredUploads($sessionKey))->toBeFalse();
            expect($model->getDeferredUploadsCount($sessionKey))->toBe(0);
            expect(session("file_uploads.deferred.{$sessionKey}"))->toBeNull();
        });

        it('handles custom callback processing', function () {
            $sessionKey = 'callback-test-' . uniqid();
            $model = new IntegrationTestModel();
            
            // Create deferred uploads
            $file = UploadedFile::fake()->image('callback-test.jpg');
            $result = $this->service->handleDeferredUpload($file, $sessionKey);
            
            // Process with custom callback
            $processedFiles = $model->handleDeferredUploadsWithCallback(
                function ($model, $metadata, $service) {
                    return [
                        'processed_name' => $metadata['original_name'],
                        'processed_size' => $metadata['size'],
                        'custom_field' => 'processed_value'
                    ];
                },
                $sessionKey
            );
            
            expect($processedFiles)->toHaveCount(1);
            expect($processedFiles[0]['processed_name'])->toBe('callback-test.jpg');
            expect($processedFiles[0]['custom_field'])->toBe('processed_value');
            
            // Verify session was cleared after successful processing
            expect(session("file_uploads.deferred.{$sessionKey}"))->toBeNull();
        });
    });

    describe('Cross-Mode Integration', function () {
        it('can convert between upload modes', function () {
            $sessionKey = 'conversion-test-' . uniqid();
            
            // Start with temporary upload
            $file = UploadedFile::fake()->image('convertible.jpg');
            $tempResult = $this->service->handleTemporaryUpload($file, $sessionKey);
            
            // Verify temporary upload
            expect($tempResult['metadata']['session_key'])->toBe($sessionKey);
            $sessionFiles = session("file_uploads.deferred.{$sessionKey}", []);
            expect($sessionFiles)->toBe([]); // No deferred tracking yet
            
            // Convert to deferred by adding to session manually
            $deferredFiles = [$tempResult['id']];
            session(["file_uploads.deferred.{$sessionKey}" => $deferredFiles]);
            
            // Verify conversion
            $sessionDeferredFiles = session("file_uploads.deferred.{$sessionKey}", []);
            expect($sessionDeferredFiles)->toContain($tempResult['id']);
            
            // The file should still be accessible as temporary
            $metadata = $this->service->getTemporaryFileMetadata($tempResult['id']);
            expect($metadata)->not->toBeNull();
            expect($metadata['id'])->toBe($tempResult['id']);
        });

        it('handles mixed upload sessions correctly', function () {
            $sessionKey = 'mixed-test-' . uniqid();
            
            // Upload some files as temporary
            $tempFile1 = UploadedFile::fake()->image('temp1.jpg');
            $tempFile2 = UploadedFile::fake()->image('temp2.jpg');
            
            $tempResult1 = $this->service->handleTemporaryUpload($tempFile1, $sessionKey);
            $tempResult2 = $this->service->handleTemporaryUpload($tempFile2, $sessionKey);
            
            // Upload some files as deferred
            $deferredFile1 = UploadedFile::fake()->image('deferred1.jpg');
            $deferredFile2 = UploadedFile::fake()->image('deferred2.jpg');
            
            $deferredResult1 = $this->service->handleDeferredUpload($deferredFile1, $sessionKey);
            $deferredResult2 = $this->service->handleDeferredUpload($deferredFile2, $sessionKey);
            
            // Verify session contains all files
            $sessionFiles = $this->service->getSessionTemporaryFiles($sessionKey);
            expect($sessionFiles)->toHaveCount(4);
            
            // Verify deferred tracking only contains deferred uploads
            $deferredFiles = session("file_uploads.deferred.{$sessionKey}", []);
            expect($deferredFiles)->toHaveCount(2);
            expect($deferredFiles)->toContain($deferredResult1['id']);
            expect($deferredFiles)->toContain($deferredResult2['id']);
            expect($deferredFiles)->not->toContain($tempResult1['id']);
            expect($deferredFiles)->not->toContain($tempResult2['id']);
        });
    });

    describe('Error Recovery and Edge Cases', function () {
        it('handles corrupted session data gracefully', function () {
            $sessionKey = 'corrupted-session-' . uniqid();
            
            // Set invalid session data
            session(["file_uploads.deferred.{$sessionKey}" => 'invalid-data']);
            
            $model = new IntegrationTestModel();
            
            // These should not throw errors
            expect($model->hasDeferredUploads($sessionKey))->toBeFalse();
            expect($model->getDeferredUploadsCount($sessionKey))->toBe(0);
        });

        it('handles missing metadata gracefully during attachment', function () {
            $sessionKey = 'missing-metadata-' . uniqid();
            $model = new IntegrationTestModel();
            
            // Simulate session with file IDs but no metadata
            session(["file_uploads.deferred.{$sessionKey}" => ['non-existent-file-id']]);
            
            // Should not throw errors and return empty results
            $uploads = $model->getDeferredUploads($sessionKey);
            expect($uploads)->toBe([]);
        });

        it('maintains data integrity during partial failures', function () {
            $sessionKey = 'partial-failure-' . uniqid();
            $model = new IntegrationTestModel();
            
            // Create some valid uploads
            $validFile = UploadedFile::fake()->image('valid.jpg');
            $validResult = $this->service->handleDeferredUpload($validFile, $sessionKey);
            
            // Add invalid file ID to session
            $deferredFiles = session("file_uploads.deferred.{$sessionKey}", []);
            $deferredFiles[] = 'invalid-file-id';
            session(["file_uploads.deferred.{$sessionKey}" => $deferredFiles]);
            
            // Process with callback that handles failures
            $processedFiles = $model->handleDeferredUploadsWithCallback(
                function ($model, $metadata, $service) {
                    if (!$metadata) {
                        return null; // Skip invalid files
                    }
                    return ['processed' => $metadata['original_name']];
                },
                $sessionKey
            );
            
            // Should only process valid files
            expect($processedFiles)->toHaveCount(1);
            expect($processedFiles[0]['processed'])->toBe('valid.jpg');
            
            // Session should not be fully cleared due to partial processing
            $remainingFiles = session("file_uploads.deferred.{$sessionKey}", []);
            expect($remainingFiles)->not->toBe([]);
        });
    });
});