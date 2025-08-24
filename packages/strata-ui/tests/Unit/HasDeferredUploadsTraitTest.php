<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Strata\UI\Traits\HasDeferredUploads;
use Strata\UI\Services\StrataFileUploadService;

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

// Test model that uses the trait
class TestModelWithDeferredUploads extends Model implements MockHasMedia
{
    use HasDeferredUploads, MockInteractsWithMedia;
    
    protected $fillable = ['name'];
    
    // Override for testing
    public function shouldAutoAttachDeferredUploads(): bool
    {
        return true;
    }
}

// Test model that disables auto-attachment
class TestModelWithoutAutoAttach extends Model implements MockHasMedia
{
    use HasDeferredUploads, MockInteractsWithMedia;
    
    protected $fillable = ['name'];
    
    public function shouldAutoAttachDeferredUploads(): bool
    {
        return false;
    }
}

describe('HasDeferredUploads Trait', function () {
    beforeEach(function () {
        $this->model = new TestModelWithDeferredUploads();
        $this->sessionKey = 'test-session-' . uniqid();
        Session::flush();
    });

    it('attaches deferred uploads from session correctly', function () {
        // Mock session data
        session(["file_uploads.deferred.{$this->sessionKey}" => ['file1', 'file2']]);
        
        $uploadService = mock(StrataFileUploadService::class);
        $uploadService->shouldReceive('attachDeferredFiles')
            ->with($this->model, $this->sessionKey, 'default')
            ->once()
            ->andReturn([
                ['id' => 1, 'name' => 'file1.jpg'],
                ['id' => 2, 'name' => 'file2.jpg']
            ]);
        
        app()->instance(StrataFileUploadService::class, $uploadService);
        
        $result = $this->model->attachDeferredUploads($this->sessionKey);
        
        expect($result)->toHaveCount(2)
        ->and($result[0])->toHaveKey('name', 'file1.jpg')
        ->and($result[1])->toHaveKey('name', 'file2.jpg');
    });

    it('attaches deferred uploads from current session by default', function () {
        $currentSessionId = session()->getId();
        session(["file_uploads.deferred.{$currentSessionId}" => ['file1']]);
        
        $uploadService = mock(StrataFileUploadService::class);
        $uploadService->shouldReceive('attachDeferredFiles')
            ->with($this->model, $currentSessionId, 'default')
            ->once()
            ->andReturn([['id' => 1, 'name' => 'file1.jpg']]);
        
        app()->instance(StrataFileUploadService::class, $uploadService);
        
        $result = $this->model->attachDeferredUploadsFromSession();
        
        expect($result)->toHaveCount(1);
    });

    it('attaches deferred uploads to multiple collections', function () {
        $collectionsMap = [
            'documents' => 'project-documents',
            'images' => 'gallery'
        ];
        
        $uploadService = mock(StrataFileUploadService::class);
        
        // Expect calls for each collection
        $uploadService->shouldReceive('attachDeferredFiles')
            ->with($this->model, "{$this->sessionKey}-documents", 'project-documents')
            ->once()
            ->andReturn([['id' => 1, 'name' => 'doc1.pdf']]);
            
        $uploadService->shouldReceive('attachDeferredFiles')
            ->with($this->model, "{$this->sessionKey}-images", 'gallery')
            ->once()
            ->andReturn([['id' => 2, 'name' => 'image1.jpg']]);
        
        app()->instance(StrataFileUploadService::class, $uploadService);
        
        $results = $this->model->attachDeferredUploadsToCollections($collectionsMap, $this->sessionKey);
        
        expect($results)->toHaveKey('project-documents')
        ->and($results)->toHaveKey('gallery')
        ->and($results['project-documents'])->toHaveCount(1)
        ->and($results['gallery'])->toHaveCount(1);
    });

    it('gets deferred uploads for session', function () {
        $uploadService = mock(StrataFileUploadService::class);
        $uploadService->shouldReceive('getSessionTemporaryFiles')
            ->with($this->sessionKey)
            ->once()
            ->andReturn([
                ['id' => 'file1', 'name' => 'document.pdf'],
                ['id' => 'file2', 'name' => 'image.jpg']
            ]);
        
        app()->instance(StrataFileUploadService::class, $uploadService);
        
        $deferredFiles = $this->model->getDeferredUploads($this->sessionKey);
        
        expect($deferredFiles)->toHaveCount(2)
        ->and($deferredFiles[0]['name'])->toBe('document.pdf')
        ->and($deferredFiles[1]['name'])->toBe('image.jpg');
    });

    it('cleans up deferred uploads correctly', function () {
        $fileIds = ['file1', 'file2', 'file3'];
        session(["file_uploads.deferred.{$this->sessionKey}" => $fileIds]);
        
        $uploadService = mock(StrataFileUploadService::class);
        
        // Expect cleanup calls for each file
        foreach ($fileIds as $fileId) {
            $uploadService->shouldReceive('cleanupTemporaryFile')
                ->with($fileId)
                ->once();
        }
        
        app()->instance(StrataFileUploadService::class, $uploadService);
        
        $this->model->cleanupDeferredUploads($this->sessionKey);
        
        // Verify session was cleared
        expect(session("file_uploads.deferred.{$this->sessionKey}"))->toBeNull();
    });

    it('checks if has deferred uploads correctly', function () {
        // No deferred uploads
        expect($this->model->hasDeferredUploads($this->sessionKey))->toBeFalse();
        
        // With deferred uploads
        session(["file_uploads.deferred.{$this->sessionKey}" => ['file1', 'file2']]);
        expect($this->model->hasDeferredUploads($this->sessionKey))->toBeTrue();
        
        // Empty array
        session(["file_uploads.deferred.{$this->sessionKey}" => []]);
        expect($this->model->hasDeferredUploads($this->sessionKey))->toBeFalse();
    });

    it('counts deferred uploads correctly', function () {
        // No deferred uploads
        expect($this->model->getDeferredUploadsCount($this->sessionKey))->toBe(0);
        
        // With deferred uploads
        session(["file_uploads.deferred.{$this->sessionKey}" => ['file1', 'file2', 'file3']]);
        expect($this->model->getDeferredUploadsCount($this->sessionKey))->toBe(3);
    });

    it('returns correct default collection', function () {
        expect($this->model->getDefaultDeferredUploadCollection())->toBe('default');
    });

    it('returns correct collection mappings', function () {
        $mappings = $this->model->getDeferredUploadCollectionMappings();
        
        expect($mappings)->toHaveKey('default', 'default');
    });

    it('handles custom callback for deferred uploads', function () {
        $fileIds = ['file1', 'file2'];
        session(["file_uploads.deferred.{$this->sessionKey}" => $fileIds]);
        
        $uploadService = mock(StrataFileUploadService::class);
        
        // Mock metadata for files
        $uploadService->shouldReceive('getTemporaryFileMetadata')
            ->with('file1')
            ->once()
            ->andReturn(['id' => 'file1', 'name' => 'doc1.pdf']);
            
        $uploadService->shouldReceive('getTemporaryFileMetadata')
            ->with('file2')
            ->once()
            ->andReturn(['id' => 'file2', 'name' => 'doc2.pdf']);
        
        // Expect cleanup calls
        $uploadService->shouldReceive('cleanupTemporaryFile')
            ->with('file1')
            ->once();
        $uploadService->shouldReceive('cleanupTemporaryFile')
            ->with('file2')
            ->once();
        
        app()->instance(StrataFileUploadService::class, $uploadService);
        
        $results = $this->model->handleDeferredUploadsWithCallback(
            function ($model, $metadata, $service) {
                return ['processed' => $metadata['name']];
            },
            $this->sessionKey
        );
        
        expect($results)->toHaveCount(2)
        ->and($results[0]['processed'])->toBe('doc1.pdf')
        ->and($results[1]['processed'])->toBe('doc2.pdf');
        
        // Verify session was cleared
        expect(session("file_uploads.deferred.{$this->sessionKey}"))->toBeNull();
    });

    it('handles callback that returns null', function () {
        $fileIds = ['file1'];
        session(["file_uploads.deferred.{$this->sessionKey}" => $fileIds]);
        
        $uploadService = mock(StrataFileUploadService::class);
        $uploadService->shouldReceive('getTemporaryFileMetadata')
            ->with('file1')
            ->once()
            ->andReturn(['id' => 'file1', 'name' => 'doc1.pdf']);
        
        // No cleanup should be called if callback returns null
        $uploadService->shouldNotReceive('cleanupTemporaryFile');
        
        app()->instance(StrataFileUploadService::class, $uploadService);
        
        $results = $this->model->handleDeferredUploadsWithCallback(
            function ($model, $metadata, $service) {
                return null; // Return null to skip processing
            },
            $this->sessionKey
        );
        
        expect($results)->toBe([]);
        
        // Session should not be cleared if no files were processed
        expect(session("file_uploads.deferred.{$this->sessionKey}"))->toBe($fileIds);
    });

    it('auto-attaches uploads when model is created if enabled', function () {
        $model = new TestModelWithDeferredUploads();
        $sessionId = session()->getId();
        
        session(["file_uploads.deferred.{$sessionId}" => ['file1']]);
        
        $uploadService = mock(StrataFileUploadService::class);
        $uploadService->shouldReceive('attachDeferredFiles')
            ->once()
            ->andReturn([['id' => 1, 'name' => 'file1.jpg']]);
        
        app()->instance(StrataFileUploadService::class, $uploadService);
        
        // Trigger the created event
        $model->fireModelEvent('created');
        
        // The mock expectations will verify the method was called
    });

    it('does not auto-attach uploads when disabled', function () {
        $model = new TestModelWithoutAutoAttach();
        $sessionId = session()->getId();
        
        session(["file_uploads.deferred.{$sessionId}" => ['file1']]);
        
        $uploadService = mock(StrataFileUploadService::class);
        $uploadService->shouldNotReceive('attachDeferredFiles');
        
        app()->instance(StrataFileUploadService::class, $uploadService);
        
        // Trigger the created event
        $model->fireModelEvent('created');
        
        // The mock expectations will verify the method was not called
    });

    it('provides event hooks for before and after attachment', function () {
        $model = new class extends TestModelWithDeferredUploads {
            public $beforeHookCalled = false;
            public $afterHookCalled = false;
            public $beforeHookFileIds = null;
            public $afterHookAttachedFiles = null;
            
            protected function beforeAttachingDeferredUploads(array $fileIds): void
            {
                $this->beforeHookCalled = true;
                $this->beforeHookFileIds = $fileIds;
            }
            
            protected function afterAttachingDeferredUploads(array $attachedFiles): void
            {
                $this->afterHookCalled = true;
                $this->afterHookAttachedFiles = $attachedFiles;
            }
        };
        
        session(["file_uploads.deferred.{$this->sessionKey}" => ['file1', 'file2']]);
        
        $uploadService = mock(StrataFileUploadService::class);
        $uploadService->shouldReceive('attachDeferredFiles')
            ->once()
            ->andReturn([['id' => 1, 'name' => 'file1.jpg']]);
        
        app()->instance(StrataFileUploadService::class, $uploadService);
        
        $model->attachDeferredUploads($this->sessionKey);
        
        expect($model->beforeHookCalled)->toBeTrue()
        ->and($model->afterHookCalled)->toBeTrue()
        ->and($model->beforeHookFileIds)->toBe(['file1', 'file2'])
        ->and($model->afterHookAttachedFiles)->toHaveCount(1);
    });
});