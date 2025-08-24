<?php

declare(strict_types=1);

namespace Strata\UI\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

/**
 * File upload component with multi-mode support for Livewire and Spatie Media Library integration.
 */
class FileUpload extends Component
{
    public function __construct(
        public ?string $name = null,
        public bool $multiple = false,
        public ?string $accept = null,
        public ?int $maxFiles = null,
        public ?string $maxSize = '10MB',
        public string $mode = 'temporary', // 'temporary', 'direct', 'deferred'
        public ?Model $model = null,
        public ?string $collection = 'default',
        public ?string $sessionKey = null,
        public bool $dragDrop = true,
        public bool $imagePreview = true,
        public bool $showProgress = true,
        public ?string $validationRules = null,
        public ?string $placeholder = null,
        public mixed $value = null
    ) {
        // Generate unique session key for deferred mode if not provided
        if ($this->mode === 'deferred' && !$this->sessionKey) {
            $this->sessionKey = 'file-upload-' . uniqid();
        }

        // Set default placeholder text
        if (!$this->placeholder) {
            $this->placeholder = $this->multiple 
                ? 'Drop files here or click to browse' 
                : 'Drop file here or click to browse';
        }

        // Validate mode configuration
        if ($this->mode === 'direct' && !$this->model) {
            throw new \InvalidArgumentException('Direct mode requires a model instance.');
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('strata::components.form.file-upload');
    }

    /**
     * Get the maximum file size in bytes.
     */
    public function getMaxSizeBytes(): int
    {
        $size = strtolower($this->maxSize);
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

    /**
     * Get the accepted file types as an array.
     */
    public function getAcceptedTypes(): array
    {
        if (!$this->accept) {
            return [];
        }
        
        return array_map('trim', explode(',', $this->accept));
    }

    /**
     * Check if the accepted types include images.
     */
    public function acceptsImages(): bool
    {
        if (!$this->accept) {
            return true; // No restrictions means all types including images
        }
        
        $types = $this->getAcceptedTypes();
        
        foreach ($types as $type) {
            if (str_starts_with($type, 'image/') || $type === 'image/*') {
                return true;
            }
        }
        
        return false;
    }

    /**
     * Get the configuration array for Alpine.js.
     */
    public function getAlpineConfig(): array
    {
        return [
            'name' => $this->name,
            'multiple' => $this->multiple,
            'accept' => $this->accept,
            'maxFiles' => $this->maxFiles,
            'maxSize' => $this->getMaxSizeBytes(),
            'mode' => $this->mode,
            'modelId' => $this->model?->getKey(),
            'modelType' => $this->model ? get_class($this->model) : null,
            'collection' => $this->collection,
            'sessionKey' => $this->sessionKey,
            'dragDrop' => $this->dragDrop,
            'imagePreview' => $this->imagePreview && $this->acceptsImages(),
            'showProgress' => $this->showProgress,
            'placeholder' => $this->placeholder,
        ];
    }
}