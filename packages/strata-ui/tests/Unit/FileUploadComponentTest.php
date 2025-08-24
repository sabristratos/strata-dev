<?php

declare(strict_types=1);

use Illuminate\View\ComponentAttributeBag;
use Strata\UI\View\Components\Form\FileUpload;

describe('FileUpload Component', function () {
    it('can be instantiated with default props', function () {
        $component = new FileUpload();
        
        expect($component->name)->toBeNull()
        ->and($component->accept)->toBeNull()
        ->and($component->multiple)->toBeFalse()
        ->and($component->maxSize)->toBe('10MB')
        ->and($component->maxFiles)->toBeNull()
        ->and($component->mode)->toBe('temporary')
        ->and($component->imagePreview)->toBeTrue()
        ->and($component->showProgress)->toBeTrue()
        ->and($component->collection)->toBe('default')
        ->and($component->sessionKey)->toBeNull()
        ->and($component->validationRules)->toBeNull()
        ->and($component->dragDrop)->toBeTrue();
    });

    it('can be instantiated with custom props', function () {
        $component = new FileUpload(
            name: 'test-upload',
            accept: 'image/*',
            multiple: true,
            maxSize: '5MB',
            maxFiles: 10,
            mode: 'temporary',
            imagePreview: true,
            showProgress: false,
            placeholder: 'Upload files here',
            collection: 'images',
            sessionKey: 'test-session'
        );
        
        expect($component->name)->toBe('test-upload')
        ->and($component->accept)->toBe('image/*')
        ->and($component->multiple)->toBeTrue()
        ->and($component->maxSize)->toBe('5MB')
        ->and($component->maxFiles)->toBe(10)
        ->and($component->mode)->toBe('temporary')
        ->and($component->imagePreview)->toBeTrue()
        ->and($component->showProgress)->toBeFalse()
        ->and($component->placeholder)->toBe('Upload files here')
        ->and($component->collection)->toBe('images')
        ->and($component->sessionKey)->toBe('test-session');
    });

    it('generates correct Alpine.js configuration', function () {
        $component = new FileUpload(
            name: 'test',
            mode: 'deferred',
            maxFiles: 5
        );
        
        $config = $component->getAlpineConfig();
        
        expect($config)->toBeArray()
        ->and($config['name'])->toBe('test')
        ->and($config['mode'])->toBe('deferred')
        ->and($config['maxFiles'])->toBe(5);
    });

    it('parses file size correctly', function () {
        $component = new FileUpload();
        
        $sizeBytes = $component->getMaxSizeBytes();
        expect($sizeBytes)->toBe(10 * 1024 * 1024); // 10MB default
    });

    it('gets accepted types correctly', function () {
        $imageComponent = new FileUpload(accept: 'image/*,.pdf,.doc');
        
        $types = $imageComponent->getAcceptedTypes();
        expect($types)->toBe(['image/*', '.pdf', '.doc']);
    });

    it('checks if accepts images correctly', function () {
        $imageComponent = new FileUpload(accept: 'image/*');
        $documentComponent = new FileUpload(accept: '.pdf');
        $allTypesComponent = new FileUpload();
        
        expect($imageComponent->acceptsImages())->toBeTrue()
        ->and($documentComponent->acceptsImages())->toBeFalse()
        ->and($allTypesComponent->acceptsImages())->toBeTrue(); // No restrictions means all types
    });

    it('sets default placeholder text correctly', function () {
        $singleComponent = new FileUpload(multiple: false);
        $multipleComponent = new FileUpload(multiple: true);
        
        expect($singleComponent->placeholder)->toBe('Drop file here or click to browse')
        ->and($multipleComponent->placeholder)->toBe('Drop files here or click to browse');
    });

    it('generates session key for deferred mode', function () {
        $deferredComponent = new FileUpload(mode: 'deferred');
        
        expect($deferredComponent->sessionKey)->not->toBeNull()
        ->and($deferredComponent->sessionKey)->toStartWith('file-upload-');
    });
});