@props([
    'name' => null,
    'multiple' => false,
    'accept' => null,
    'maxFiles' => null,
    'maxSize' => '10MB',
    'mode' => 'temporary',
    'model' => null,
    'collection' => 'default',
    'sessionKey' => null,
    'dragDrop' => true,
    'imagePreview' => true,
    'showProgress' => true,
    'validationRules' => null,
    'placeholder' => null,
    'value' => null
])

@php
    $uploadId = uniqid('file-upload-');
    $isWireModel = $attributes->has('wire:model') || $attributes->has('wire:model.self');
    
    // Calculate max size in bytes
    $maxSizeBytes = (int) strtolower($maxSize ?? '10MB');
    if (str_contains(strtolower($maxSize ?? ''), 'k')) {
        $maxSizeBytes *= 1024;
    } elseif (str_contains(strtolower($maxSize ?? ''), 'm')) {
        $maxSizeBytes *= 1024 * 1024;
    } elseif (str_contains(strtolower($maxSize ?? ''), 'g')) {
        $maxSizeBytes *= 1024 * 1024 * 1024;
    }
    
    // Check if accepts images
    $acceptsImages = true;
    if ($accept) {
        $acceptsImages = false;
        $types = array_map('trim', explode(',', $accept));
        foreach ($types as $type) {
            if (str_starts_with($type, 'image/') || $type === 'image/*') {
                $acceptsImages = true;
                break;
            }
        }
    }
    
    $config = [
        'name' => $name,
        'multiple' => $multiple,
        'accept' => $accept,
        'maxFiles' => $maxFiles,
        'maxSize' => $maxSizeBytes,
        'mode' => $mode,
        'modelId' => $model?->getKey(),
        'modelType' => $model ? get_class($model) : null,
        'collection' => $collection,
        'sessionKey' => $sessionKey,
        'dragDrop' => $dragDrop,
        'imagePreview' => $imagePreview && $acceptsImages,
        'showProgress' => $showProgress,
        'placeholder' => $placeholder,
    ];
    
    $containerClasses = [
        'file-upload-container',
        'space-y-4'
    ];
@endphp

<div
    x-data="strataFileUpload(@js($config))"
    x-init="init()"
    {{ $isWireModel ? 'x-model="files"' : '' }}
    data-file-upload="{{ $uploadId }}"
    {{ $attributes->except(['name', 'multiple', 'accept', 'max-files', 'max-size', 'mode', 'model', 'collection', 'session-key', 'drag-drop', 'image-preview', 'show-progress', 'validation-rules', 'placeholder', 'value', 'wire:model', 'wire:model.self'])->merge([
        'class' => implode(' ', $containerClasses)
    ]) }}
>
    {{-- Hidden file input --}}
    <input
        type="file"
        x-ref="fileInput"
        name="{{ $name ?? '' }}"
        accept="{{ $accept ?? '' }}"
        {{ $multiple ? 'multiple' : '' }}
        @change="handleFileSelect($event)"
        class="hidden"
    />

    {{-- Custom dropzone slot or default dropzone --}}
    @isset($dropzone)
        {{ $dropzone }}
    @else
        <div
            class="file-upload-dropzone flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-border rounded-lg bg-muted/30 hover:bg-muted/50 transition-all duration-200 cursor-pointer focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 hover:border-primary/50"
            tabindex="0"
            x-on:click="$refs.fileInput.click()"
            x-on:keydown.enter="$el.click()"
            x-on:keydown.space.prevent="$el.click()"
            x-on:dragover.prevent="dragActive = true"
            x-on:dragleave.prevent="dragActive = false"
            x-on:drop.prevent="handleDrop($event)"
            x-bind:class="{
                'border-primary bg-primary/5': dragActive,
                'border-destructive bg-destructive/5': hasErrors,
                'opacity-50 cursor-not-allowed': uploading
            }"
        >
            <div class="text-center space-y-2">
                {{-- Upload icon --}}
                <div class="flex justify-center">
                    <x-icon name="heroicon-o-cloud-arrow-up" class="w-8 h-8 text-muted-foreground" />
                </div>
                
                {{-- Placeholder text --}}
                <div class="space-y-1">
                    <p class="text-sm font-medium text-foreground">
                        {{ $placeholder ?: ($multiple ? 'Drop files here or click to browse' : 'Drop file here or click to browse') }}
                    </p>
                    
                    {{-- Additional info --}}
                    <p class="text-xs text-muted-foreground">
                        @if($accept)
                            Accepts: <span class="font-mono">{{ $accept }}</span>
                        @else
                            All file types accepted
                        @endif
                    </p>
                </div>
                
                {{-- Browse button --}}
                <x-strata::button
                    type="button"
                    size="sm"
                    variant="outline"
                    class="mt-3"
                    x-on:click.stop
                    :disabled="uploading"
                >
                    <x-icon name="heroicon-o-folder-open" class="w-4 h-4 mr-2" />
                    Browse {{ $multiple ? 'Files' : 'File' }}
                </x-strata::button>
            </div>
            
            {{-- Visual feedback for drag states --}}
            <div
                class="absolute inset-0 rounded-lg border-2 border-dashed border-primary bg-primary/5 opacity-0 transition-opacity duration-200 pointer-events-none"
                x-bind:class="{ 'opacity-100': dragActive }"
            >
                <div class="flex items-center justify-center h-full">
                    <div class="text-center">
                        <x-icon name="heroicon-o-arrow-down-on-square" class="w-8 h-8 text-primary mx-auto mb-2" />
                        <p class="text-sm font-medium text-primary">
                            Release to upload {{ $multiple ? 'files' : 'file' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endisset

    {{-- Upload progress indicator --}}
    <div x-show="uploading && showProgress" x-transition>
        @isset($progress)
            {{ $progress }}
        @else
            <div class="space-y-2">
                {{-- Progress info --}}
                <div class="flex items-center justify-between text-sm">
                    <div class="flex items-center gap-2">
                        {{-- Upload icon --}}
                        <div class="flex items-center">
                            <template x-if="uploading">
                                <x-icon name="heroicon-o-arrow-up-tray" class="w-4 h-4 text-primary animate-bounce" />
                            </template>
                            <template x-if="!uploading && uploadProgress >= 100">
                                <x-icon name="heroicon-s-check-circle" class="w-4 h-4 text-green-500" />
                            </template>
                            <template x-if="!uploading && uploadProgress < 100">
                                <x-icon name="heroicon-o-pause-circle" class="w-4 h-4 text-muted-foreground" />
                            </template>
                        </div>

                        {{-- Status text --}}
                        <span class="font-medium text-foreground">
                            <template x-if="uploading">Uploading files...</template>
                            <template x-if="!uploading && uploadProgress >= 100">Upload complete</template>
                            <template x-if="!uploading && uploadProgress < 100 && uploadProgress > 0">Upload paused</template>
                            <template x-if="uploadProgress === 0">Ready to upload</template>
                        </span>
                    </div>

                    {{-- Percentage --}}
                    <span 
                        class="text-muted-foreground font-mono text-xs"
                        x-text="uploadProgress + '%'"
                    ></span>
                </div>

                {{-- Progress bar --}}
                <div class="file-upload-progress w-full bg-muted rounded-full overflow-hidden h-2">
                    <div 
                        class="h-full bg-primary transition-all duration-300 ease-out relative overflow-hidden"
                        :style="'width: ' + uploadProgress + '%'"
                    >
                        {{-- Animated stripe effect for active uploads --}}
                        <template x-if="uploading">
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent animate-pulse"></div>
                        </template>
                    </div>
                </div>
            </div>
        @endisset
    </div>

    {{-- Error messages --}}
    <div x-show="hasErrors" x-transition class="space-y-2">
        <template x-for="error in errors" :key="error.id">
            <x-strata::alert color="destructive" x-text="error.message" />
        </template>
    </div>

    {{-- File preview area --}}
    <div x-show="files.length > 0" x-transition class="space-y-4">
        {{-- Custom preview slot or default preview --}}
        @isset($preview)
            {{ $preview }}
        @else
            <div class="file-upload-preview grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <template x-for="(file, index) in files" :key="file.id">
                    <div class="file-preview-item relative bg-card border border-border rounded-lg overflow-hidden">
                        {{-- Image preview --}}
                        <template x-if="imagePreview && file.preview && file.type.startsWith('image/')">
                            <div class="aspect-square bg-muted flex items-center justify-center overflow-hidden">
                                <img 
                                    :src="file.preview" 
                                    :alt="file.name"
                                    class="w-full h-full object-cover"
                                    loading="lazy"
                                />
                            </div>
                        </template>

                        {{-- File icon for non-images --}}
                        <template x-if="!imagePreview || !file.preview || !file.type.startsWith('image/')">
                            <div class="aspect-square bg-muted flex flex-col items-center justify-center p-4">
                                {{-- File type icon --}}
                                <div class="w-8 h-8 mb-2 text-muted-foreground">
                                    <template x-if="file.type.startsWith('image/')">
                                        <x-icon name="heroicon-o-photo" class="w-8 h-8" />
                                    </template>
                                    <template x-if="file.type.startsWith('video/')">
                                        <x-icon name="heroicon-o-video-camera" class="w-8 h-8" />
                                    </template>
                                    <template x-if="file.type.includes('pdf')">
                                        <x-icon name="heroicon-o-document-text" class="w-8 h-8" />
                                    </template>
                                    <template x-if="!file.type.startsWith('image/') && !file.type.startsWith('video/') && !file.type.includes('pdf')">
                                        <x-icon name="heroicon-o-document" class="w-8 h-8" />
                                    </template>
                                </div>
                                
                                {{-- File extension --}}
                                <span 
                                    class="text-xs font-mono text-muted-foreground uppercase"
                                    x-text="file.name.split('.').pop()"
                                ></span>
                            </div>
                        </template>

                        {{-- File info overlay --}}
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/60 to-transparent p-3">
                            {{-- File name --}}
                            <p 
                                class="text-xs font-medium text-white truncate"
                                x-text="file.name"
                                :title="file.name"
                            ></p>
                            
                            {{-- File size --}}
                            <p class="text-xs text-white/80" x-text="formatFileSize(file.size)"></p>
                        </div>

                        {{-- Upload progress --}}
                        <template x-if="showProgress && (!file.uploaded || file.progress < 100)">
                            <div class="absolute inset-x-0 bottom-0 h-1 bg-black/20">
                                <div 
                                    class="h-full bg-primary transition-all duration-300"
                                    :style="'width: ' + file.progress + '%'"
                                ></div>
                            </div>
                        </template>

                        {{-- Success indicator --}}
                        <template x-if="file.uploaded && file.progress >= 100">
                            <div class="absolute top-2 left-2 w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                                <x-icon name="heroicon-s-check" class="w-4 h-4 text-white" />
                            </div>
                        </template>

                        {{-- Error indicator --}}
                        <template x-if="file.error">
                            <div class="absolute inset-0 bg-destructive/10 flex items-center justify-center">
                                <div class="text-center p-4">
                                    <x-icon name="heroicon-o-exclamation-triangle" class="w-8 h-8 text-destructive mx-auto mb-2" />
                                    <p class="text-xs text-destructive" x-text="file.error"></p>
                                </div>
                            </div>
                        </template>

                        {{-- Remove button --}}
                        <button
                            type="button"
                            @click="removeFile(file.id)"
                            class="absolute top-2 right-2 w-6 h-6 bg-black/50 hover:bg-black/70 rounded-full flex items-center justify-center transition-colors"
                            :disabled="uploading"
                        >
                            <x-icon name="heroicon-s-x-mark" class="w-4 h-4 text-white" />
                        </button>

                        {{-- Upload status badge --}}
                        <div class="absolute top-2 left-2 flex gap-1">
                            {{-- Uploading spinner --}}
                            <template x-if="!file.uploaded && file.progress > 0 && file.progress < 100">
                                <div class="w-5 h-5 bg-primary rounded-full flex items-center justify-center">
                                    <div class="w-3 h-3 border-2 border-white border-t-transparent rounded-full animate-spin"></div>
                                </div>
                            </template>

                            {{-- Queue indicator --}}
                            <template x-if="!file.uploaded && file.progress === 0">
                                <div class="w-5 h-5 bg-muted-foreground/50 rounded-full flex items-center justify-center">
                                    <x-icon name="heroicon-s-clock" class="w-3 h-3 text-white" />
                                </div>
                            </template>
                        </div>
                    </div>
                </template>

                {{-- Empty state (when no files) --}}
                <template x-if="files.length === 0">
                    <div class="col-span-full text-center py-8 text-muted-foreground">
                        <x-icon name="heroicon-o-photo" class="w-12 h-12 mx-auto mb-2 opacity-50" />
                        <p class="text-sm">No files selected</p>
                    </div>
                </template>
            </div>

            {{-- Bulk actions --}}
            <template x-if="files.length > 1">
                <div class="flex items-center justify-between mt-4 pt-4 border-t border-border">
                    <div class="text-sm text-muted-foreground">
                        <span x-text="files.filter(f => f.uploaded).length"></span> of 
                        <span x-text="files.length"></span> files uploaded
                    </div>
                    
                    <div class="flex gap-2">
                        <x-strata::button
                            size="sm"
                            variant="outline"
                            @click="clearFiles()"
                            :disabled="uploading"
                        >
                            <x-icon name="heroicon-o-trash" class="w-4 h-4 mr-1" />
                            Clear All
                        </x-strata::button>
                    </div>
                </div>
            </template>
        @endisset
        
        {{-- File count indicator --}}
        <div class="text-sm text-muted-foreground">
            <span x-text="files.length"></span>
            <span x-text="multiple ? (files.length === 1 ? ' file selected' : ' files selected') : ' file selected'"></span>
            @if($maxFiles)
                <span class="text-muted-foreground/70">
                    (max {{ $maxFiles }})
                </span>
            @endif
        </div>
    </div>

    {{-- Validation info --}}
    @if($accept || $maxSize || $maxFiles)
        <div class="text-xs text-muted-foreground space-y-1">
            @if($accept)
                <div>Accepted types: <span class="font-mono">{{ $accept }}</span></div>
            @endif
            @if($maxSize)
                <div>Maximum file size: <span class="font-mono">{{ $maxSize }}</span></div>
            @endif
            @if($maxFiles)
                <div>Maximum files: <span class="font-mono">{{ $maxFiles }}</span></div>
            @endif
        </div>
    @endif

    {{-- Debug info (only in development) --}}
    @if(config('app.debug'))
        <details class="text-xs text-muted-foreground">
            <summary class="cursor-pointer">Debug Info</summary>
            <div class="mt-2 p-2 bg-muted/50 rounded text-xs font-mono">
                <div>Mode: <span x-text="mode"></span></div>
                <div>Files: <span x-text="files.length"></span></div>
                <div>Uploading: <span x-text="uploading"></span></div>
                <div>Progress: <span x-text="uploadProgress + '%'"></span></div>
                <div>Errors: <span x-text="errors.length"></span></div>
            </div>
        </details>
    @endif
</div>

@once
<script>
document.addEventListener('alpine:init', () => {
    /**
     * Strata File Upload Component
     * @param {Object} config - Configuration object
     * @returns {Object} Alpine component object
     */
    Alpine.data('strataFileUpload', (config) => ({
        // Configuration
        name: config.name || null,
        multiple: config.multiple || false,
        accept: config.accept || null,
        maxFiles: config.maxFiles || null,
        maxSize: config.maxSize || 10 * 1024 * 1024, // 10MB default
        mode: config.mode || 'temporary',
        modelId: config.modelId || null,
        modelType: config.modelType || null,
        collection: config.collection || 'default',
        sessionKey: config.sessionKey || null,
        dragDrop: config.dragDrop !== false,
        imagePreview: config.imagePreview !== false,
        showProgress: config.showProgress !== false,
        placeholder: config.placeholder || 'Drop files here or click to browse',

        // State
        files: [],
        uploading: false,
        uploadProgress: 0,
        dragActive: false,
        errors: [],

        // Computed
        get hasErrors() {
            return this.errors.length > 0;
        },

        get canAddMore() {
            if (!this.maxFiles) return true;
            return this.files.length < this.maxFiles;
        },

        /**
         * Initialize the component
         */
        init() {
            // Set up Livewire integration
            if (this.$wire && this.$el.hasAttribute('x-model')) {
                this.$watch('files', value => {
                    this.$wire.set(this.$el.getAttribute('x-model'), value);
                });
            }

            // Load existing files if provided
            if (config.value && Array.isArray(config.value)) {
                this.files = config.value;
            }

            // Dispatch initialization event
            this.$dispatch('file-upload-initialized', {
                id: this.$el.getAttribute('data-file-upload'),
                config: config
            });
        },

        /**
         * Handle file selection from input
         */
        handleFileSelect(event) {
            const files = Array.from(event.target.files);
            this.processFiles(files);
        },

        /**
         * Handle drag and drop
         */
        handleDrop(event) {
            this.dragActive = false;
            
            if (!this.dragDrop) return;
            
            const files = Array.from(event.dataTransfer.files);
            this.processFiles(files);
        },

        /**
         * Process selected files
         */
        processFiles(newFiles) {
            this.clearErrors();

            // Filter out files that would exceed max files limit
            let filesToAdd = newFiles;
            if (this.maxFiles) {
                const availableSlots = this.maxFiles - this.files.length;
                if (availableSlots <= 0) {
                    this.addError('Maximum number of files reached');
                    return;
                }
                filesToAdd = newFiles.slice(0, availableSlots);
                if (newFiles.length > availableSlots) {
                    this.addError(`Only ${availableSlots} files can be added (${newFiles.length - availableSlots} files ignored)`);
                }
            }

            // Validate and add files
            filesToAdd.forEach(file => this.validateAndAddFile(file));

            // Start upload process
            if (this.files.length > 0) {
                this.startUpload();
            }
        },

        /**
         * Validate and add a single file
         */
        validateAndAddFile(file) {
            const errors = this.validateFile(file);
            
            if (errors.length > 0) {
                errors.forEach(error => this.addError(`${file.name}: ${error}`));
                return;
            }

            // Create file object with metadata
            const fileData = {
                id: this.generateId(),
                file: file,
                name: file.name,
                size: file.size,
                type: file.type,
                preview: null,
                progress: 0,
                uploaded: false,
                error: null,
                url: null
            };

            // Generate preview for images
            if (this.imagePreview && file.type.startsWith('image/')) {
                this.generateImagePreview(fileData);
            }

            this.files.push(fileData);
        },

        /**
         * Validate a single file
         */
        validateFile(file) {
            const errors = [];

            // Check file size
            if (file.size > this.maxSize) {
                errors.push(`File size (${this.formatFileSize(file.size)}) exceeds maximum allowed size (${this.formatFileSize(this.maxSize)})`);
            }

            // Check file type
            if (this.accept && !this.isAcceptedType(file)) {
                errors.push(`File type not allowed. Accepted types: ${this.accept}`);
            }

            return errors;
        },

        /**
         * Check if file type is accepted
         */
        isAcceptedType(file) {
            if (!this.accept) return true;

            const acceptedTypes = this.accept.split(',').map(type => type.trim());
            
            return acceptedTypes.some(acceptedType => {
                if (acceptedType === file.type) return true;
                if (acceptedType.endsWith('/*')) {
                    const category = acceptedType.split('/')[0];
                    return file.type.startsWith(category + '/');
                }
                if (acceptedType.startsWith('.')) {
                    return file.name.toLowerCase().endsWith(acceptedType.toLowerCase());
                }
                return false;
            });
        },

        /**
         * Generate image preview
         */
        generateImagePreview(fileData) {
            const reader = new FileReader();
            reader.onload = (e) => {
                fileData.preview = e.target.result;
            };
            reader.readAsDataURL(fileData.file);
        },

        /**
         * Start upload process
         */
        async startUpload() {
            this.uploading = true;
            this.uploadProgress = 0;

            try {
                switch (this.mode) {
                    case 'direct':
                        await this.uploadDirect();
                        break;
                    case 'deferred':
                        await this.uploadDeferred();
                        break;
                    case 'temporary':
                    default:
                        await this.uploadTemporary();
                        break;
                }
            } catch (error) {
                this.addError('Upload failed: ' + error.message);
            } finally {
                this.uploading = false;
            }
        },

        /**
         * Upload files in temporary mode (Livewire temporary uploads)
         */
        async uploadTemporary() {
            // This will be handled by Livewire when wire:model is present
            // For now, simulate upload progress
            for (let i = 0; i < this.files.length; i++) {
                const file = this.files[i];
                await this.simulateUpload(file);
            }
        },

        /**
         * Upload files in direct mode (immediate Spatie Media Library attachment)
         */
        async uploadDirect() {
            // Implementation for direct upload to existing model
            for (let i = 0; i < this.files.length; i++) {
                const file = this.files[i];
                await this.uploadFileToModel(file);
            }
        },

        /**
         * Upload files in deferred mode (session-based storage)
         */
        async uploadDeferred() {
            // Implementation for deferred upload with session storage
            for (let i = 0; i < this.files.length; i++) {
                const file = this.files[i];
                await this.uploadFileDeferred(file);
            }
        },

        /**
         * Simulate upload progress (for development/testing)
         */
        async simulateUpload(fileData) {
            return new Promise(resolve => {
                const interval = setInterval(() => {
                    fileData.progress += Math.random() * 30;
                    if (fileData.progress >= 100) {
                        fileData.progress = 100;
                        fileData.uploaded = true;
                        clearInterval(interval);
                        resolve();
                    }
                    this.updateOverallProgress();
                }, 100);
            });
        },

        /**
         * Update overall progress
         */
        updateOverallProgress() {
            if (this.files.length === 0) {
                this.uploadProgress = 0;
                return;
            }

            const totalProgress = this.files.reduce((sum, file) => sum + file.progress, 0);
            this.uploadProgress = Math.round(totalProgress / this.files.length);
        },

        /**
         * Remove a file
         */
        removeFile(fileId) {
            const index = this.files.findIndex(f => f.id === fileId);
            if (index > -1) {
                this.files.splice(index, 1);
                this.$dispatch('file-removed', { fileId, remaining: this.files.length });
            }
        },

        /**
         * Clear all files
         */
        clearFiles() {
            this.files = [];
            this.clearErrors();
            this.$dispatch('files-cleared');
        },

        /**
         * Add error message
         */
        addError(message) {
            this.errors.push({
                id: this.generateId(),
                message: message,
                timestamp: Date.now()
            });
        },

        /**
         * Clear errors
         */
        clearErrors() {
            this.errors = [];
        },

        /**
         * Generate unique ID
         */
        generateId() {
            return Math.random().toString(36).substr(2, 9);
        },

        /**
         * Format file size
         */
        formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }
    }));
});
</script>
@endonce