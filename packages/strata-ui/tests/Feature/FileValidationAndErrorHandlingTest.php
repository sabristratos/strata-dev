<?php

declare(strict_types=1);

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Strata\UI\Services\StrataFileUploadService;
use Strata\UI\View\Components\Form\FileUpload;

describe('File Validation and Error Handling', function () {
    beforeEach(function () {
        Storage::fake('local');
        Cache::flush();
        $this->service = app(StrataFileUploadService::class);
    });

    describe('File Size Validation', function () {
        it('validates maximum file size correctly', function () {
            $smallFile = UploadedFile::fake()->image('small.jpg', 50, 50)->size(512); // 512KB
            $mediumFile = UploadedFile::fake()->image('medium.jpg', 100, 100)->size(1536); // 1.5MB
            $largeFile = UploadedFile::fake()->image('large.jpg', 200, 200)->size(5120); // 5MB
            
            $rules1MB = ['max_size' => '1MB'];
            $rules2MB = ['max_size' => '2MB'];
            $rules10MB = ['max_size' => '10MB'];
            
            // Test 1MB limit
            expect($this->service->validateFile($smallFile, $rules1MB))->toBe([]);
            expect($this->service->validateFile($mediumFile, $rules1MB))->not->toBe([]);
            expect($this->service->validateFile($largeFile, $rules1MB))->not->toBe([]);
            
            // Test 2MB limit
            expect($this->service->validateFile($smallFile, $rules2MB))->toBe([]);
            expect($this->service->validateFile($mediumFile, $rules2MB))->toBe([]);
            expect($this->service->validateFile($largeFile, $rules2MB))->not->toBe([]);
            
            // Test 10MB limit
            expect($this->service->validateFile($smallFile, $rules10MB))->toBe([]);
            expect($this->service->validateFile($mediumFile, $rules10MB))->toBe([]);
            expect($this->service->validateFile($largeFile, $rules10MB))->toBe([]);
        });

        it('provides clear error messages for size violations', function () {
            $largeFile = UploadedFile::fake()->image('large.jpg')->size(3072); // 3MB
            $rules = ['max_size' => '2MB'];
            
            $errors = $this->service->validateFile($largeFile, $rules);
            
            expect($errors)->toHaveCount(1);
            expect($errors[0])->toContain('File size exceeds maximum allowed size of 2MB');
        });

        it('handles various size format inputs', function () {
            $file = UploadedFile::fake()->image('test.jpg')->size(1536); // 1.5MB
            
            $formatsToTest = [
                '1MB' => false, // Should fail
                '2MB' => true,  // Should pass
                '1500KB' => false, // Should fail
                '1600KB' => true,  // Should pass
                '1.5MB' => false, // Should fail (exactly at limit)
                '1.6MB' => true,  // Should pass
            ];
            
            foreach ($formatsToTest as $format => $shouldPass) {
                $errors = $this->service->validateFile($file, ['max_size' => $format]);
                if ($shouldPass) {
                    expect($errors)->toBe([]);
                } else {
                    expect($errors)->not->toBe([]);
                }
            }
        });
    });

    describe('File Type Validation', function () {
        it('validates MIME types correctly', function () {
            $imageJpeg = UploadedFile::fake()->image('image.jpg');  // image/jpeg
            $imagePng = UploadedFile::fake()->image('image.png');   // image/png
            $textFile = UploadedFile::fake()->create('text.txt', 100, 'text/plain');
            $pdfFile = UploadedFile::fake()->create('document.pdf', 100, 'application/pdf');
            
            // Test specific MIME type validation
            $imageRules = ['allowed_types' => ['image/jpeg', 'image/png']];
            $textRules = ['allowed_types' => ['text/plain']];
            $pdfRules = ['allowed_types' => ['application/pdf']];
            
            // Image validation
            expect($this->service->validateFile($imageJpeg, $imageRules))->toBe([]);
            expect($this->service->validateFile($imagePng, $imageRules))->toBe([]);
            expect($this->service->validateFile($textFile, $imageRules))->not->toBe([]);
            expect($this->service->validateFile($pdfFile, $imageRules))->not->toBe([]);
            
            // Text validation
            expect($this->service->validateFile($textFile, $textRules))->toBe([]);
            expect($this->service->validateFile($imageJpeg, $textRules))->not->toBe([]);
            
            // PDF validation
            expect($this->service->validateFile($pdfFile, $pdfRules))->toBe([]);
            expect($this->service->validateFile($textFile, $pdfRules))->not->toBe([]);
        });

        it('validates wildcard MIME types correctly', function () {
            $imageJpeg = UploadedFile::fake()->image('image.jpg');
            $imagePng = UploadedFile::fake()->image('image.png');
            $textFile = UploadedFile::fake()->create('text.txt', 100, 'text/plain');
            $csvFile = UploadedFile::fake()->create('data.csv', 100, 'text/csv');
            
            // Test wildcard validation
            $imageWildcard = ['allowed_types' => ['image/*']];
            $textWildcard = ['allowed_types' => ['text/*']];
            
            // Image wildcard
            expect($this->service->validateFile($imageJpeg, $imageWildcard))->toBe([]);
            expect($this->service->validateFile($imagePng, $imageWildcard))->toBe([]);
            expect($this->service->validateFile($textFile, $imageWildcard))->not->toBe([]);
            
            // Text wildcard
            expect($this->service->validateFile($textFile, $textWildcard))->toBe([]);
            expect($this->service->validateFile($csvFile, $textWildcard))->toBe([]);
            expect($this->service->validateFile($imageJpeg, $textWildcard))->not->toBe([]);
        });

        it('validates file extensions correctly', function () {
            $jpegFile = UploadedFile::fake()->create('image.jpeg', 100, 'image/jpeg');
            $pdfFile = UploadedFile::fake()->create('document.pdf', 100, 'application/pdf');
            $docFile = UploadedFile::fake()->create('document.doc', 100, 'application/msword');
            $txtFile = UploadedFile::fake()->create('text.txt', 100, 'text/plain');
            
            // Test extension validation
            $imageExtensions = ['allowed_types' => ['.jpg', '.jpeg', '.png']];
            $docExtensions = ['allowed_types' => ['.pdf', '.doc', '.docx']];
            
            expect($this->service->validateFile($jpegFile, $imageExtensions))->toBe([]);
            expect($this->service->validateFile($pdfFile, $imageExtensions))->not->toBe([]);
            
            expect($this->service->validateFile($pdfFile, $docExtensions))->toBe([]);
            expect($this->service->validateFile($docFile, $docExtensions))->toBe([]);
            expect($this->service->validateFile($txtFile, $docExtensions))->not->toBe([]);
        });

        it('handles case insensitive extension validation', function () {
            $upperCaseFile = UploadedFile::fake()->create('DOCUMENT.PDF', 100, 'application/pdf');
            $lowerCaseFile = UploadedFile::fake()->create('document.pdf', 100, 'application/pdf');
            $mixedCaseFile = UploadedFile::fake()->create('Document.Pdf', 100, 'application/pdf');
            
            $rules = ['allowed_types' => ['.pdf']];
            
            expect($this->service->validateFile($upperCaseFile, $rules))->toBe([]);
            expect($this->service->validateFile($lowerCaseFile, $rules))->toBe([]);
            expect($this->service->validateFile($mixedCaseFile, $rules))->toBe([]);
        });

        it('provides clear error messages for type violations', function () {
            $textFile = UploadedFile::fake()->create('document.txt', 100, 'text/plain');
            $rules = ['allowed_types' => ['image/jpeg', 'image/png', '.pdf']];
            
            $errors = $this->service->validateFile($textFile, $rules);
            
            expect($errors)->toHaveCount(1);
            expect($errors[0])->toContain('File type not allowed');
            expect($errors[0])->toContain('image/jpeg, image/png, .pdf');
        });

        it('validates mixed MIME types and extensions', function () {
            $imageFile = UploadedFile::fake()->image('image.jpg');
            $pdfFile = UploadedFile::fake()->create('document.pdf', 100, 'application/pdf');
            $textFile = UploadedFile::fake()->create('text.txt', 100, 'text/plain');
            
            $mixedRules = ['allowed_types' => ['image/*', '.pdf', 'text/plain']];
            
            expect($this->service->validateFile($imageFile, $mixedRules))->toBe([]);
            expect($this->service->validateFile($pdfFile, $mixedRules))->toBe([]);
            expect($this->service->validateFile($textFile, $mixedRules))->toBe([]);
            
            // Test file that doesn't match any rule
            $csvFile = UploadedFile::fake()->create('data.csv', 100, 'text/csv');
            expect($this->service->validateFile($csvFile, $mixedRules))->not->toBe([]);
        });
    });

    describe('Combined Validation Rules', function () {
        it('validates multiple rules simultaneously', function () {
            $validFile = UploadedFile::fake()->image('valid.jpg', 100, 100)->size(512); // 512KB, JPEG
            $invalidSizeFile = UploadedFile::fake()->image('invalid-size.jpg', 200, 200)->size(2048); // 2MB, JPEG
            $invalidTypeFile = UploadedFile::fake()->create('invalid-type.txt', 100, 'text/plain'); // 100KB, TXT
            $invalidBothFile = UploadedFile::fake()->create('invalid-both.txt', 100, 'text/plain')->size(2048); // 2MB, TXT
            
            $rules = [
                'max_size' => '1MB',
                'allowed_types' => ['image/jpeg', 'image/png']
            ];
            
            // Valid file should pass
            expect($this->service->validateFile($validFile, $rules))->toBe([]);
            
            // Invalid size should fail with 1 error
            $sizeErrors = $this->service->validateFile($invalidSizeFile, $rules);
            expect($sizeErrors)->toHaveCount(1);
            expect($sizeErrors[0])->toContain('File size exceeds maximum allowed size');
            
            // Invalid type should fail with 1 error
            $typeErrors = $this->service->validateFile($invalidTypeFile, $rules);
            expect($typeErrors)->toHaveCount(1);
            expect($typeErrors[0])->toContain('File type not allowed');
            
            // Invalid both should fail with 2 errors
            $bothErrors = $this->service->validateFile($invalidBothFile, $rules);
            expect($bothErrors)->toHaveCount(2);
        });

        it('prioritizes error messages appropriately', function () {
            $invalidFile = UploadedFile::fake()->create('large.txt', 100, 'text/plain')->size(5120); // 5MB TXT
            
            $rules = [
                'max_size' => '1MB',
                'allowed_types' => ['image/*']
            ];
            
            $errors = $this->service->validateFile($invalidFile, $rules);
            
            expect($errors)->toHaveCount(2);
            // Size error should come first
            expect($errors[0])->toContain('File size exceeds maximum allowed size');
            expect($errors[1])->toContain('File type not allowed');
        });
    });

    describe('Component Integration Validation', function () {
        it('validates FileUpload component props correctly', function () {
            // Test valid props
            $validComponent = new FileUpload(
                name: 'test-upload',
                mode: 'temporary',
                layout: 'grid',
                maxSize: '5MB'
            );
            
            expect($validComponent->mode)->toBe('temporary');
            expect($validComponent->layout)->toBe('grid');
            expect($validComponent->maxSize)->toBe('5MB');
            
            // Test invalid props with fallbacks
            $invalidComponent = new FileUpload(
                mode: 'invalid-mode',
                layout: 'invalid-layout'
            );
            
            expect($invalidComponent->mode)->toBe('temporary'); // Should fallback
            expect($invalidComponent->layout)->toBe('grid'); // Should fallback
        });

        it('validates component size format correctly', function () {
            $component = new FileUpload();
            
            // Valid formats
            expect($component->isValidSizeFormat('1MB'))->toBeTrue();
            expect($component->isValidSizeFormat('500KB'))->toBeTrue();
            expect($component->isValidSizeFormat('2GB'))->toBeTrue();
            expect($component->isValidSizeFormat('1.5MB'))->toBeTrue();
            expect($component->isValidSizeFormat('100'))->toBeTrue();
            
            // Invalid formats
            expect($component->isValidSizeFormat('invalid'))->toBeFalse();
            expect($component->isValidSizeFormat(''))->toBeFalse();
            expect($component->isValidSizeFormat('MB'))->toBeFalse();
            expect($component->isValidSizeFormat('1 MB'))->toBeFalse(); // Space not allowed
        });

        it('validates max files constraint', function () {
            $component = new FileUpload(maxFiles: 3);
            
            expect($component->isMaxFilesValid(0))->toBeTrue();
            expect($component->isMaxFilesValid(1))->toBeTrue();
            expect($component->isMaxFilesValid(3))->toBeTrue();
            expect($component->isMaxFilesValid(4))->toBeFalse();
            expect($component->isMaxFilesValid(10))->toBeFalse();
        });

        it('merges validation rules correctly', function () {
            $component = new FileUpload(
                maxSize: '2MB',
                accept: 'image/*',
                validationRules: [
                    'allowed_types' => ['image/jpeg', 'image/png'], // Override accept
                    'custom_rule' => 'custom_value'
                ]
            );
            
            $mergedRules = $component->getMergedValidationRules();
            
            expect($mergedRules['max_size'])->toBe('2MB');
            expect($mergedRules['allowed_types'])->toBe(['image/jpeg', 'image/png']);
            expect($mergedRules['custom_rule'])->toBe('custom_value');
        });
    });

    describe('Error Recovery and Edge Cases', function () {
        it('handles corrupted file uploads gracefully', function () {
            // Create a mock corrupted file
            $corruptedFile = UploadedFile::fake()->create('corrupted.jpg', 0); // 0 byte file
            
            $result = $this->service->handleTemporaryUpload($corruptedFile);
            
            // Should still handle the upload but with 0 size
            expect($result)->toHaveKey('id');
            expect($result['size'])->toBe(0);
        });

        it('handles storage failures gracefully', function () {
            // Mock storage failure by using read-only disk
            Storage::shouldReceive('disk->storeAs')
                ->once()
                ->andThrow(new \Exception('Storage failure'));
            
            $file = UploadedFile::fake()->image('test.jpg');
            
            expect(function () use ($file) {
                $this->service->handleTemporaryUpload($file);
            })->toThrow(\Exception::class);
        });

        it('handles cache failures gracefully during metadata storage', function () {
            Cache::shouldReceive('put')
                ->once()
                ->andThrow(new \Exception('Cache failure'));
            
            $file = UploadedFile::fake()->image('test.jpg');
            
            expect(function () use ($file) {
                $this->service->handleTemporaryUpload($file);
            })->toThrow(\Exception::class);
        });

        it('handles missing file during validation', function () {
            // Create a file reference without actual file
            $missingFile = UploadedFile::fake()->create('missing.jpg', 100);
            
            // Move the file to simulate missing scenario
            $tempPath = $missingFile->path();
            if (file_exists($tempPath)) {
                unlink($tempPath);
            }
            
            $errors = $this->service->validateFile($missingFile, ['max_size' => '1MB']);
            
            // Should handle gracefully - validation might pass or provide appropriate error
            expect($errors)->toBeArray();
        });

        it('validates empty file uploads', function () {
            $emptyFile = UploadedFile::fake()->create('empty.txt', 0);
            
            $rules = ['max_size' => '1MB'];
            $errors = $this->service->validateFile($emptyFile, $rules);
            
            // Empty files should pass size validation
            expect($errors)->toBe([]);
        });

        it('handles very large file names gracefully', function () {
            $longFileName = str_repeat('a', 255) . '.jpg'; // Very long filename
            $file = UploadedFile::fake()->image($longFileName);
            
            $result = $this->service->handleTemporaryUpload($file);
            
            expect($result)->toHaveKey('id');
            expect($result['name'])->toBe($longFileName);
        });

        it('handles special characters in file names', function () {
            $specialFileName = 'test file (1) [copy] & more!@#$%^.jpg';
            $file = UploadedFile::fake()->image($specialFileName);
            
            $result = $this->service->handleTemporaryUpload($file);
            
            expect($result)->toHaveKey('id');
            expect($result['name'])->toBe($specialFileName);
        });

        it('validates files without extensions', function () {
            $noExtensionFile = UploadedFile::fake()->create('filename_without_extension', 100, 'text/plain');
            
            $extensionRules = ['allowed_types' => ['.txt', '.pdf']];
            $mimeRules = ['allowed_types' => ['text/plain']];
            
            // Should fail extension validation
            expect($this->service->validateFile($noExtensionFile, $extensionRules))->not->toBe([]);
            
            // Should pass MIME type validation
            expect($this->service->validateFile($noExtensionFile, $mimeRules))->toBe([]);
        });
    });

    describe('Performance and Limits', function () {
        it('handles multiple file validation efficiently', function () {
            $files = [];
            for ($i = 0; $i < 10; $i++) {
                $files[] = UploadedFile::fake()->image("file{$i}.jpg")->size(100);
            }
            
            $rules = ['max_size' => '1MB', 'allowed_types' => ['image/*']];
            
            $start = microtime(true);
            
            foreach ($files as $file) {
                $errors = $this->service->validateFile($file, $rules);
                expect($errors)->toBe([]);
            }
            
            $duration = microtime(true) - $start;
            
            // Should complete validation in reasonable time (less than 1 second for 10 files)
            expect($duration)->toBeLessThan(1.0);
        });

        it('handles large file metadata correctly', function () {
            $largeFile = UploadedFile::fake()->create('large.zip', 1024 * 1024); // 1GB (simulated)
            
            $result = $this->service->handleTemporaryUpload($largeFile);
            
            expect($result)->toHaveKey('size');
            expect($result['size'])->toBeInt();
            expect($result['metadata']['size'])->toBe($result['size']);
        });
    });
});

describe('Size Parsing Edge Cases', function () {
    beforeEach(function () {
        $this->service = app(StrataFileUploadService::class);
    });

    it('handles decimal values correctly', function () {
        expect($this->service->parseSize('1.5MB'))->toBe((int)(1.5 * 1024 * 1024));
        expect($this->service->parseSize('0.5KB'))->toBe((int)(0.5 * 1024));
        expect($this->service->parseSize('2.75GB'))->toBe((int)(2.75 * 1024 * 1024 * 1024));
    });

    it('handles edge case size values', function () {
        expect($this->service->parseSize('0'))->toBe(0);
        expect($this->service->parseSize('0MB'))->toBe(0);
        expect($this->service->parseSize('1'))->toBe(1);
    });

    it('handles malformed size strings gracefully', function () {
        expect($this->service->parseSize(''))->toBe(0);
        expect($this->service->parseSize('invalid'))->toBe(0);
        expect($this->service->parseSize('MB'))->toBe(0);
        expect($this->service->parseSize('1 MB'))->toBe(1); // Strips spaces
    });

    it('handles very large size values', function () {
        $twoGB = 2 * 1024 * 1024 * 1024;
        expect($this->service->parseSize('2GB'))->toBe($twoGB);
        
        $halfTB = (int)(0.5 * 1024 * 1024 * 1024 * 1024);
        expect($this->service->parseSize('512GB'))->toBe(512 * 1024 * 1024 * 1024);
    });
});