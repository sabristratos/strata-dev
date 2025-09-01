@php
    $hasWireModel = $attributes->wire('model');
    $inputId = $attributes->get('id') ?: 'file-upload-' . uniqid();
    $isMultiple = $multiple;
    $isGalleryView = $variant === 'gallery';
@endphp

<div
    x-data="strataFileUpload({
        hasWireModel: @js($hasWireModel),
        maxSize: @js($maxSize),
        accept: @js($accept),
        multiple: @js($multiple),
        mediaLibrary: @js($mediaLibrary),
        enableReordering: @js($enableReordering),
        maxSizeFormatted: @js($getMaxSizeFormatted())
    })"
    class="w-full"
>
    <!-- Hidden file input -->
    <input
        type="file"
        x-ref="fileInput"
        :multiple="multiple"
        :accept="accept"
        @if($name) name="{{ $name }}" @endif
        @if($hasWireModel) {{ $attributes->wire('model') }} @endif
        {{ $attributes->except(['wire:model', 'class', 'id']) }}
        class="sr-only"
        id="{{ $inputId }}"
    />

    @if($variant === 'gallery')
        <!-- Gallery View -->
        <div class="space-y-4">
            <!-- Upload Zone -->
            <div
                @dragover.prevent="handleDragOver"
                @dragleave.prevent="handleDragLeave"
                @drop.prevent="handleDrop"
                @click="openFileBrowser"
                :class="{ 'border-primary bg-primary/5': dragOver }"
                class="{{ $getVariantClasses() }} cursor-pointer hover:border-primary hover:bg-primary/5 transition-colors duration-200 text-center"
            >
                <div class="flex flex-col items-center gap-2">
                    <x-icon name="heroicon-o-cloud-arrow-up" class="w-8 h-8 text-muted-foreground" />
                    <p class="text-sm font-medium text-foreground">{{ $placeholder }}</p>
                    @if($helpText)
                        <p class="text-xs text-muted-foreground">{{ $helpText }}</p>
                    @endif
                    <p class="text-xs text-muted-foreground">Max size: {{ $getMaxSizeFormatted() }}</p>
                </div>
            </div>
            
            <!-- File Grid -->
            <div x-show="(multiple && files && files.length > 0) || (!multiple && files)" x-transition class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <template x-for="file in multiple ? (files || []) : (files ? [files] : [])" :key="file ? getFileId(file) : 'empty'">
                    <div x-show="file" class="relative group">
                        <!-- File Preview Card -->
                        <div class="bg-card border border-border card-radius p-4 hover:shadow-md transition-shadow duration-200">
                            <!-- Image Preview or Icon -->
                            <div class="aspect-square mb-3 bg-muted input-radius flex items-center justify-center overflow-hidden">
                                <template x-if="file && previews[getFileId(file)]">
                                    <img :src="previews[getFileId(file)]" :alt="getFileName(file)" class="w-full h-full object-cover" />
                                </template>
                                <template x-if="file && !previews[getFileId(file)]">
                                    <div x-html="getFileIconHtml(file, 'w-8 h-8 text-muted-foreground')"></div>
                                </template>
                            </div>
                            
                            <!-- File Info -->
                            <div class="space-y-1">
                                <p class="text-sm font-medium text-foreground truncate" x-text="getFileName(file)" :title="getFileName(file)"></p>
                                <p class="text-xs text-muted-foreground" x-text="formatFileSize(getFileSize(file))"></p>
                            </div>
                            
                            <!-- Upload Progress -->
                            <div x-show="progress[getFileId(file)] !== undefined && progress[getFileId(file)] < 100" class="mt-2">
                                <div class="w-full bg-neutral-200 rounded-full h-2 dark:bg-neutral-700">
                                    <div class="bg-primary h-2 rounded-full transition-all duration-300" 
                                         :style="'width: ' + (progress[getFileId(file)] || 0) + '%'"></div>
                                </div>
                            </div>
                            
                            <!-- Error Message -->
                            <div x-show="errors[getFileId(file)]" class="mt-2">
                                <p class="text-xs text-destructive" x-text="errors[getFileId(file)]"></p>
                            </div>
                        </div>
                        
                        <!-- Remove Button -->
                        <button
                            type="button"
                            @click.stop="removeFile(getFileId(file))"
                            class="absolute -top-2 -right-2 w-6 h-6 bg-destructive text-destructive-foreground rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-200 hover:bg-destructive/90"
                        >
                            <span class="text-sm">×</span>
                        </button>
                    </div>
                </template>
            </div>
        </div>
    @else
        <!-- Default/Compact View -->
        <div class="space-y-4">
            <!-- Upload Zone -->
            <div
                @dragover.prevent="handleDragOver"
                @dragleave.prevent="handleDragLeave"
                @drop.prevent="handleDrop"
                @click="openFileBrowser"
                :class="{ 'border-primary bg-primary/5': dragOver }"
                class="{{ $getVariantClasses() }} cursor-pointer hover:border-primary hover:bg-primary/5 transition-colors duration-200"
            >
                <div class="text-center">
                    <x-icon name="heroicon-o-cloud-arrow-up" class="w-16 h-16 text-muted-foreground mb-4 mx-auto" />
                    <p class="text-base font-medium text-foreground mb-2">{{ $placeholder }}</p>
                    @if($helpText)
                        <p class="text-sm text-muted-foreground mb-2">{{ $helpText }}</p>
                    @endif
                    <p class="text-sm text-muted-foreground">
                        Accepted formats: {{ str_replace(',', ', ', $accept) }}
                    </p>
                    <p class="text-sm text-muted-foreground">Max size: {{ $getMaxSizeFormatted() }}</p>
                </div>
            </div>
            
            <!-- File List -->
            <div x-show="(multiple && files && files.length > 0) || (!multiple && files)" x-transition class="space-y-2">
                <template x-for="file in multiple ? (files || []) : (files ? [files] : [])" :key="file ? getFileId(file) : 'empty'">
                    <div x-show="file" class="flex items-center gap-3 p-3 bg-card border border-border input-radius">
                        <!-- File Icon/Preview -->
                        <div class="flex-shrink-0">
                            <template x-if="file && previews[getFileId(file)]">
                                <img :src="previews[getFileId(file)]" :alt="file.name" class="w-10 h-10 object-cover rounded" />
                            </template>
                            <template x-if="file && !previews[getFileId(file)]">
                                <div class="w-10 h-10 bg-muted rounded flex items-center justify-center">
                                    <div x-html="getFileIconHtml(file, 'w-5 h-5 text-muted-foreground')"></div>
                                </div>
                            </template>
                        </div>
                        
                        <!-- File Details -->
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-foreground truncate" x-text="getFileName(file)"></p>
                            <p class="text-xs text-muted-foreground" x-text="formatFileSize(getFileSize(file))"></p>
                            
                            <!-- Upload Progress -->
                            <div x-show="progress[getFileId(file)] !== undefined && progress[getFileId(file)] < 100" class="mt-1">
                                <div class="flex justify-between text-xs text-muted-foreground mb-1">
                                    <span>Uploading...</span>
                                    <span x-text="Math.round(progress[getFileId(file)] || 0) + '%'"></span>
                                </div>
                                <div class="w-full bg-neutral-200 rounded-full h-2 dark:bg-neutral-700">
                                    <div class="bg-primary h-2 rounded-full transition-all duration-300" 
                                         :style="'width: ' + (progress[getFileId(file)] || 0) + '%'"></div>
                                </div>
                            </div>
                            
                            <!-- Error Message -->
                            <div x-show="errors[getFileId(file)]" class="mt-1">
                                <p class="text-xs text-destructive" x-text="errors[getFileId(file)]"></p>
                            </div>
                        </div>
                        
                        <!-- Status & Actions -->
                        <div class="flex items-center gap-2">
                            <!-- Upload Complete -->
                            <div x-show="progress[getFileId(file)] === 100" class="text-primary">
                                <span class="text-lg text-accent">✓</span>
                            </div>
                            
                            <!-- Remove Button -->
                            <x-strata::button
                                type="button"
                                @click="removeFile(getFileId(file))"
                                variant="ghost"
                                size="sm"
                                icon="heroicon-o-trash"
                                class="!p-1.5 text-muted-foreground hover:text-destructive"
                            />
                        </div>
                    </div>
                </template>
            </div>
        </div>
    @endif
</div>

