# File Upload Component - Comprehensive Usage Guide

The Strata UI File Upload Component provides drag-and-drop file selection with validation, preview functionality, and optional Livewire integration. Built with Alpine.js for optimal performance and user experience.

## Table of Contents

1. [Quick Start](#quick-start)
2. [Configuration Options](#configuration-options)
3. [Usage Examples](#usage-examples)
4. [Component Variants](#component-variants)
5. [Livewire Integration](#livewire-integration)
6. [Validation & Security](#validation--security)
7. [Alpine.js Integration](#alpinejs-integration)
8. [Accessibility Features](#accessibility-features)
9. [Advanced Features](#advanced-features)
10. [Best Practices](#best-practices)
11. [Troubleshooting](#troubleshooting)

## Quick Start

### Basic File Upload

```blade
{{-- Simple single file upload --}}
<x-strata::form.file-upload
    name="document"
    accept="application/pdf,.doc,.docx"
    max-size="10240"
    placeholder="Drop your document here"
/>

{{-- Multiple files with gallery view --}}
<x-strata::form.file-upload
    name="images"
    variant="gallery"
    :multiple="true"
    accept="image/*"
    max-size="5120"
    placeholder="Drop images here or click to browse"
    help-text="Maximum 5MB per file"
/>
```

### With Form Integration

```blade
<form action="/upload" method="POST" enctype="multipart/form-data">
    @csrf
    
    <x-strata::form.file-upload
        name="attachments[]"
        label="Project Files"
        description="Upload project documents and images"
        :multiple="true"
        accept="image/*,application/pdf,.doc,.docx"
        max-size="10240"
        :required="true"
    />
    
    <button type="submit" class="btn-primary mt-4">
        Upload Files
    </button>
</form>
```

## Configuration Options

### Complete Parameter Reference

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `name` | string | `null` | Input name for form submission |
| `multiple` | bool | `false` | Allow multiple file selection |
| `accept` | string | `image/*,application/pdf,.doc,.docx,.txt` | Accepted file types |
| `max-size` | int | `12288` | Maximum file size in KB (12MB default) |
| `variant` | string | `'default'` | Display variant: `default`, `compact`, `gallery` |
| `placeholder` | string | auto-generated | Drag-drop area text |
| `help-text` | string | `null` | Additional help text below drag area |
| `label` | string | `null` | Field label |
| `description` | string | `null` | Field description |
| `error` | string | `null` | Error message to display |
| `required` | bool | `false` | Mark field as required |
| `disabled` | bool | `false` | Disable the upload component |
| `clearable` | bool | `false` | Show clear button |
| `collection` | string | `null` | Spatie Media Library collection name |
| `media-library` | bool | `false` | Enable Media Library integration |
| `enable-reordering` | bool | `false` | Allow file reordering |
| `show-preview` | bool | `true` | Show image previews |
| `show-progress` | bool | `true` | Show upload progress |

### File Type Configuration

```blade
{{-- Images only --}}
<x-strata::form.file-upload accept="image/*" />

{{-- Documents only --}}
<x-strata::form.file-upload accept="application/pdf,.doc,.docx,.txt" />

{{-- Specific image formats --}}
<x-strata::form.file-upload accept=".jpg,.jpeg,.png,.gif,.webp" />

{{-- Mixed types --}}
<x-strata::form.file-upload accept="image/*,application/pdf,.zip,.rar" />

{{-- All files (not recommended for security) --}}
<x-strata::form.file-upload accept="*/*" />
```

## Usage Examples

### Document Upload Form

```blade
<div class="space-y-6" x-data="documentUpload()">
    <x-strata::form.file-upload
        name="legal_documents"
        label="Legal Documents"
        description="Upload contracts, agreements, and legal papers"
        :multiple="true"
        accept="application/pdf,.doc,.docx"
        max-size="20480"
        placeholder="Drop legal documents here"
        help-text="PDF, DOC, or DOCX files up to 20MB each"
        @file-added="handleFileAdded($event.detail)"
        @file-removed="handleFileRemoved($event.detail)"
    />
    
    <div x-show="uploadedFiles.length > 0" class="bg-green-50 p-4 rounded-md">
        <h4 class="font-medium text-green-800 mb-2">Uploaded Files:</h4>
        <ul class="space-y-1">
            <template x-for="file in uploadedFiles" :key="file.id">
                <li class="text-sm text-green-700" x-text="file.name"></li>
            </template>
        </ul>
    </div>
</div>

<script>
function documentUpload() {
    return {
        uploadedFiles: [],
        
        handleFileAdded(detail) {
            console.log('File added:', detail);
            // Process newly added files
            if (detail.files) {
                const newFiles = Array.isArray(detail.files) ? detail.files : [detail.files];
                this.uploadedFiles.push(...newFiles);
            }
        },
        
        handleFileRemoved(detail) {
            console.log('File removed:', detail);
            this.uploadedFiles = this.uploadedFiles.filter(
                file => file.id !== detail.removedFileId
            );
        }
    };
}
</script>
```

### Image Gallery Upload

```blade
<x-strata::form.file-upload
    name="gallery_images"
    variant="gallery"
    label="Photo Gallery"
    description="Upload photos for your gallery"
    :multiple="true"
    accept="image/jpeg,image/png,image/webp"
    max-size="8192"
    placeholder="Drop photos here"
    help-text="JPEG, PNG, or WebP images up to 8MB each"
/>
```

### Profile Avatar Upload

```blade
<div class="flex items-start gap-6">
    <!-- Current Avatar -->
    <div class="flex-shrink-0">
        <img 
            src="{{ auth()->user()->avatar_url }}" 
            alt="Current avatar"
            class="w-20 h-20 rounded-full object-cover border-2 border-gray-200"
        >
    </div>
    
    <!-- Upload New Avatar -->
    <div class="flex-1">
        <x-strata::form.file-upload
            name="avatar"
            variant="compact"
            label="Profile Photo"
            accept="image/jpeg,image/png"
            max-size="2048"
            placeholder="Drop new avatar or click to select"
            help-text="Square images work best. Max 2MB."
        />
    </div>
</div>
```

### File Upload with Progress Tracking

```blade
<div x-data="fileUploadTracker()">
    <x-strata::form.file-upload
        name="project_files"
        :multiple="true"
        accept="*/*"
        max-size="50000"
        @file-added="trackUpload($event.detail)"
        @upload-progress="updateProgress($event.detail)"
        @upload-complete="completeUpload($event.detail)"
        @upload-error="handleError($event.detail)"
    />
    
    <!-- Upload Status -->
    <div x-show="uploads.length > 0" class="mt-4 space-y-2">
        <h4 class="font-medium">Upload Status:</h4>
        <template x-for="upload in uploads" :key="upload.id">
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                <div class="flex-1">
                    <div class="font-medium text-sm" x-text="upload.name"></div>
                    <div class="text-xs text-gray-500" x-text="upload.status"></div>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-20 bg-gray-200 rounded-full h-2">
                        <div 
                            class="bg-blue-500 h-2 rounded-full transition-all"
                            :style="`width: ${upload.progress}%`"
                        ></div>
                    </div>
                    <span class="text-xs text-gray-500" x-text="`${upload.progress}%`"></span>
                </div>
            </div>
        </template>
    </div>
</div>

<script>
function fileUploadTracker() {
    return {
        uploads: [],
        
        trackUpload(detail) {
            const files = Array.isArray(detail.files) ? detail.files : [detail.files];
            files.forEach(file => {
                this.uploads.push({
                    id: file.id,
                    name: file.name,
                    progress: 0,
                    status: 'Starting...'
                });
            });
        },
        
        updateProgress(detail) {
            const upload = this.uploads.find(u => u.id === detail.fileId);
            if (upload) {
                upload.progress = detail.progress;
                upload.status = detail.progress < 100 ? 'Uploading...' : 'Processing...';
            }
        },
        
        completeUpload(detail) {
            const upload = this.uploads.find(u => u.id === detail.fileId);
            if (upload) {
                upload.progress = 100;
                upload.status = 'Complete';
            }
        },
        
        handleError(detail) {
            const upload = this.uploads.find(u => u.id === detail.fileId);
            if (upload) {
                upload.status = `Error: ${detail.message}`;
            }
        }
    };
}
</script>
```

## Component Variants

### Default Variant

Large drag-and-drop area with detailed file information:

```blade
<x-strata::form.file-upload
    variant="default"
    name="documents"
    placeholder="Drop documents here or click to browse"
    help-text="Supported formats: PDF, DOC, DOCX"
/>
```

### Compact Variant

Smaller drag area for tight layouts:

```blade
<x-strata::form.file-upload
    variant="compact"
    name="attachment"
    placeholder="Add attachment"
/>
```

### Gallery Variant

Grid-based layout for image uploads:

```blade
<x-strata::form.file-upload
    variant="gallery"
    name="photos"
    :multiple="true"
    accept="image/*"
    placeholder="Drop photos here"
/>
```

## Livewire Integration

### Basic Livewire Usage

```blade
{{-- Livewire Component View --}}
<div>
    <x-strata::form.file-upload
        wire:model="uploadedFiles"
        name="files"
        :multiple="true"
        accept="image/*,application/pdf"
        max-size="10240"
    />
    
    @if($uploadedFiles)
        <div class="mt-4">
            <h4 class="font-medium mb-2">Selected Files:</h4>
            @foreach($uploadedFiles as $file)
                <div class="flex items-center justify-between p-2 bg-gray-50 rounded">
                    <span class="text-sm">{{ $file->getClientOriginalName() }}</span>
                    <button 
                        wire:click="removeFile({{ $loop->index }})"
                        class="text-red-500 hover:text-red-700"
                    >
                        Remove
                    </button>
                </div>
            @endforeach
        </div>
    @endif
</div>
```

```php
// Livewire Component
class FileUploadComponent extends Component
{
    public $uploadedFiles = [];
    
    protected $rules = [
        'uploadedFiles.*' => 'file|max:10240|mimes:jpeg,png,pdf',
    ];
    
    public function updatedUploadedFiles()
    {
        $this->validate();
    }
    
    public function removeFile($index)
    {
        unset($this->uploadedFiles[$index]);
        $this->uploadedFiles = array_values($this->uploadedFiles);
    }
    
    public function save()
    {
        $this->validate();
        
        foreach ($this->uploadedFiles as $file) {
            $file->store('uploads');
        }
        
        session()->flash('message', 'Files uploaded successfully!');
        $this->uploadedFiles = [];
    }
}
```

### Advanced Livewire with Real-time Validation

```blade
<div>
    <x-strata::form.file-upload
        wire:model.live="files"
        name="validated_files"
        :multiple="true"
        accept="image/*"
        max-size="5120"
        :error="$errors->first('files')"
    />
    
    @if($validationErrors)
        <div class="mt-2 space-y-1">
            @foreach($validationErrors as $error)
                <div class="text-sm text-red-600">{{ $error }}</div>
            @endforeach
        </div>
    @endif
    
    <div wire:loading wire:target="files" class="mt-2">
        <div class="text-sm text-blue-600">Processing files...</div>
    </div>
</div>
```

```php
class ValidatedUploadComponent extends Component
{
    public $files = [];
    public $validationErrors = [];
    
    public function updatedFiles()
    {
        $this->validationErrors = [];
        
        foreach ($this->files as $index => $file) {
            try {
                $this->validateOnly("files.{$index}", [
                    "files.{$index}" => 'file|max:5120|mimes:jpeg,png,gif|dimensions:max_width=4000,max_height=4000'
                ]);
            } catch (ValidationException $e) {
                $this->validationErrors[] = "File '{$file->getClientOriginalName()}': " . $e->validator->errors()->first();
            }
        }
        
        // Remove invalid files
        if (!empty($this->validationErrors)) {
            $this->files = [];
        }
    }
}
```

## Validation & Security

### Client-side Validation

The component automatically validates:
- **File size** against `max-size` parameter
- **File types** against `accept` parameter  
- **File count** for multiple uploads (if configured)

### Server-side Validation

Always validate files on the server:

```php
// Laravel Validation Rules
public function rules()
{
    return [
        'document' => 'required|file|max:10240|mimes:pdf,doc,docx',
        'images.*' => 'image|max:5120|dimensions:max_width=2000,max_height=2000',
        'attachments' => 'array|max:5', // Limit number of files
        'attachments.*' => 'file|max:20480|mimes:pdf,doc,docx,txt,zip',
    ];
}

// Custom Validation Messages
public function messages()
{
    return [
        'images.*.max' => 'Each image must not exceed 5MB.',
        'images.*.dimensions' => 'Images must not exceed 2000x2000 pixels.',
        'attachments.max' => 'You may upload a maximum of 5 files.',
    ];
}
```

### Security Best Practices

```php
// File Upload Handler with Security
class SecureFileUpload
{
    public function handle(UploadedFile $file): string
    {
        // 1. Validate file type by content, not extension
        $mimeType = $file->getMimeType();
        if (!in_array($mimeType, ['image/jpeg', 'image/png', 'application/pdf'])) {
            throw new InvalidFileTypeException();
        }
        
        // 2. Generate safe filename
        $extension = $file->getClientOriginalExtension();
        $filename = Str::uuid() . '.' . $extension;
        
        // 3. Store outside web root
        $path = $file->storeAs('private/uploads', $filename);
        
        // 4. Scan for malware (if available)
        if (class_exists(VirusScanner::class)) {
            VirusScanner::scan(storage_path("app/{$path}"));
        }
        
        // 5. Log upload for audit
        Log::info('File uploaded', [
            'original_name' => $file->getClientOriginalName(),
            'stored_name' => $filename,
            'user_id' => auth()->id(),
            'ip' => request()->ip(),
        ]);
        
        return $path;
    }
}
```

## Alpine.js Integration

### Custom File Processing

```blade
<div x-data="customFileProcessor()">
    <x-strata::form.file-upload
        name="processed_files"
        @file-added="processFiles($event.detail)"
    />
    
    <div x-show="processing" class="mt-4">
        <div class="text-sm text-blue-600">Processing files...</div>
        <div class="w-full bg-gray-200 rounded-full h-2 mt-2">
            <div 
                class="bg-blue-500 h-2 rounded-full transition-all"
                :style="`width: ${processProgress}%`"
            ></div>
        </div>
    </div>
</div>

<script>
function customFileProcessor() {
    return {
        processing: false,
        processProgress: 0,
        
        async processFiles(detail) {
            this.processing = true;
            this.processProgress = 0;
            
            const files = Array.isArray(detail.files) ? detail.files : [detail.files];
            
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                
                // Custom processing (e.g., resize images, validate content)
                if (file.type.startsWith('image/')) {
                    await this.resizeImage(file);
                }
                
                this.processProgress = ((i + 1) / files.length) * 100;
            }
            
            this.processing = false;
            
            // Notify completion
            this.$dispatch('files-processed', { files });
        },
        
        async resizeImage(file) {
            return new Promise((resolve) => {
                const canvas = document.createElement('canvas');
                const ctx = canvas.getContext('2d');
                const img = new Image();
                
                img.onload = () => {
                    // Resize logic
                    const maxWidth = 1200;
                    const maxHeight = 1200;
                    
                    let { width, height } = img;
                    
                    if (width > maxWidth || height > maxHeight) {
                        const ratio = Math.min(maxWidth / width, maxHeight / height);
                        width *= ratio;
                        height *= ratio;
                    }
                    
                    canvas.width = width;
                    canvas.height = height;
                    ctx.drawImage(img, 0, 0, width, height);
                    
                    resolve();
                };
                
                img.src = URL.createObjectURL(file);
            });
        }
    };
}
</script>
```

### File Upload with Custom Validation

```blade
<div x-data="fileValidator()">
    <x-strata::form.file-upload
        name="validated_upload"
        @file-added="validateFiles($event.detail)"
        @file-removed="clearValidation($event.detail)"
    />
    
    <div x-show="validationMessages.length > 0" class="mt-3 space-y-1">
        <template x-for="message in validationMessages" :key="message.id">
            <div :class="message.type === 'error' ? 'text-red-600' : 'text-yellow-600'" 
                 class="text-sm">
                <span x-text="message.text"></span>
            </div>
        </template>
    </div>
</div>

<script>
function fileValidator() {
    return {
        validationMessages: [],
        
        validateFiles(detail) {
            this.validationMessages = [];
            const files = Array.isArray(detail.files) ? detail.files : [detail.files];
            
            files.forEach(file => {
                // Custom validation rules
                if (file.size > 5 * 1024 * 1024) { // 5MB
                    this.addValidationMessage('error', `${file.name} exceeds 5MB limit`);
                }
                
                if (file.type.startsWith('image/') && !['image/jpeg', 'image/png'].includes(file.type)) {
                    this.addValidationMessage('error', `${file.name} must be JPEG or PNG`);
                }
                
                if (file.name.length > 100) {
                    this.addValidationMessage('warning', `${file.name} has a very long filename`);
                }
            });
        },
        
        addValidationMessage(type, text) {
            this.validationMessages.push({
                id: Date.now() + Math.random(),
                type,
                text
            });
        },
        
        clearValidation(detail) {
            // Remove validation messages for specific files if needed
            this.validationMessages = [];
        }
    };
}
</script>
```

## Accessibility Features

### Built-in Accessibility

The component includes:
- **ARIA labels** for drag-drop areas and buttons
- **Keyboard navigation** (Enter/Space to open file browser)
- **Screen reader announcements** for file selection and errors
- **Focus management** for remove buttons and interactions
- **Role attributes** for proper element identification

### Enhanced Accessibility Example

```blade
<div>
    <x-strata::form.file-upload
        name="accessible_upload"
        label="Document Upload"
        description="Upload important documents for your application"
        :required="true"
        accept="application/pdf,.doc,.docx"
        help-text="PDF or Word documents only, maximum 10MB each"
        aria-describedby="upload-requirements"
    />
    
    <div id="upload-requirements" class="sr-only">
        This field is required. You may upload multiple PDF or Word documents. 
        Each file must be smaller than 10 megabytes. 
        Use the drag and drop area or click to select files from your device.
    </div>
</div>
```

## Advanced Features

### Spatie Media Library Integration

```blade
{{-- Enable Media Library integration --}}
<x-strata::form.file-upload
    name="media_collection"
    :media-library="true"
    collection="documents"
    :enable-reordering="true"
    conversion="thumb"
    :responsive-images="true"
    :custom-properties="['alt_text' => '', 'caption' => '']"
/>
```

```php
// Model with Media Library
class Document extends Model implements HasMedia
{
    use HasMediaTrait;
    
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('documents')
            ->acceptsMimeTypes(['application/pdf', 'image/jpeg'])
            ->singleFile();
            
        $this->addMediaCollection('gallery')
            ->acceptsMimeTypes(['image/jpeg', 'image/png']);
    }
    
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(300)
            ->height(300)
            ->performOnCollections('gallery');
    }
}
```

### File Upload with Chunking

```blade
<div x-data="chunkedUpload()">
    <x-strata::form.file-upload
        name="large_files"
        max-size="1048576"
        @file-added="startChunkedUpload($event.detail)"
    />
    
    <div x-show="uploading" class="mt-4">
        <div class="flex items-center justify-between mb-2">
            <span class="text-sm font-medium">Uploading...</span>
            <span class="text-sm text-gray-500" x-text="`${Math.round(progress)}%`"></span>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-2">
            <div 
                class="bg-blue-500 h-2 rounded-full transition-all"
                :style="`width: ${progress}%`"
            ></div>
        </div>
    </div>
</div>

<script>
function chunkedUpload() {
    return {
        uploading: false,
        progress: 0,
        
        async startChunkedUpload(detail) {
            const file = detail.files[0];
            const chunkSize = 1024 * 1024; // 1MB chunks
            const totalChunks = Math.ceil(file.size / chunkSize);
            
            this.uploading = true;
            this.progress = 0;
            
            for (let chunkIndex = 0; chunkIndex < totalChunks; chunkIndex++) {
                const start = chunkIndex * chunkSize;
                const end = Math.min(start + chunkSize, file.size);
                const chunk = file.slice(start, end);
                
                const formData = new FormData();
                formData.append('chunk', chunk);
                formData.append('chunkIndex', chunkIndex);
                formData.append('totalChunks', totalChunks);
                formData.append('filename', file.name);
                
                try {
                    await fetch('/upload-chunk', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    });
                    
                    this.progress = ((chunkIndex + 1) / totalChunks) * 100;
                } catch (error) {
                    console.error('Chunk upload failed:', error);
                    break;
                }
            }
            
            this.uploading = false;
        }
    };
}
</script>
```

## Best Practices

### File Upload Guidelines

1. **Always validate server-side** - Client validation is for UX, not security
2. **Limit file sizes appropriately** - Consider your server and user experience
3. **Use specific MIME types** - Avoid `*/*` for security
4. **Provide clear feedback** - Show progress, errors, and success states
5. **Handle edge cases** - Network failures, large files, browser limitations

### Performance Considerations

```blade
{{-- ✅ Good: Lazy load previews for gallery --}}
<x-strata::form.file-upload
    variant="gallery"
    :show-preview="false"
    @file-added="generatePreview($event.detail)"
/>

{{-- ✅ Good: Reasonable file size limits --}}
<x-strata::form.file-upload
    max-size="10240"
    help-text="Maximum 10MB per file"
/>

{{-- ❌ Poor: No size limit --}}
<x-strata::form.file-upload
    max-size="999999"
/>

{{-- ❌ Poor: Too permissive --}}
<x-strata::form.file-upload
    accept="*/*"
/>
```

### Security Best Practices

```php
// ✅ Good: Comprehensive validation
public function uploadFile(Request $request)
{
    $request->validate([
        'file' => [
            'required',
            'file',
            'max:10240', // 10MB
            'mimes:pdf,doc,docx',
            function ($attribute, $value, $fail) {
                // Custom MIME type validation
                $allowedMimes = ['application/pdf', 'application/msword'];
                if (!in_array($value->getMimeType(), $allowedMimes)) {
                    $fail('Invalid file type detected.');
                }
            },
        ],
    ]);
    
    // Store securely
    $path = $request->file('file')->store('private/documents');
    
    return response()->json(['path' => $path]);
}

// ❌ Poor: No validation
public function unsafeUpload(Request $request)
{
    $file = $request->file('file');
    $file->move(public_path('uploads'), $file->getClientOriginalName());
}
```

## Troubleshooting

### Common Issues

**Files not uploading:**
- Check PHP `upload_max_filesize` and `post_max_size` settings
- Verify `max-size` parameter matches server limits
- Ensure form has `enctype="multipart/form-data"`
- Check network connectivity and server response

```php
// Check PHP upload limits
echo "upload_max_filesize: " . ini_get('upload_max_filesize') . "\n";
echo "post_max_size: " . ini_get('post_max_size') . "\n";
echo "max_file_uploads: " . ini_get('max_file_uploads') . "\n";
```

**Drag and drop not working:**
- Verify browser support for HTML5 File API
- Check for conflicting event handlers
- Ensure Alpine.js is properly loaded
- Test with different file types

**Validation errors not showing:**
- Check console for JavaScript errors
- Verify error message structure matches component expectations
- Ensure validation runs both client and server-side

**Preview images not displaying:**
- Check file type support in browser
- Verify FileReader API is available
- Look for CORS issues with blob URLs
- Check image file corruption

### Debug Helpers

```blade
{{-- Add debug information --}}
<x-strata::form.file-upload
    name="debug-upload"
    x-data="{ debug: true }"
    @file-added="console.log('File added:', $event.detail)"
    @file-removed="console.log('File removed:', $event.detail)"
    @validation-error="console.log('Validation error:', $event.detail)"
/>
```

```javascript
// Debug file upload component state
function debugFileUpload() {
    const uploadComponents = document.querySelectorAll('[x-data*="strataFileUpload"]');
    
    uploadComponents.forEach((component, index) => {
        const alpineData = Alpine.$data(component);
        console.log(`Upload Component ${index + 1}:`, {
            files: alpineData.files,
            errors: alpineData.errors,
            progress: alpineData.progress,
            element: component
        });
    });
}

// Call in console: debugFileUpload()
```

---

This comprehensive file upload documentation covers all aspects of the component, from basic usage to advanced integration patterns with proper security considerations, accessibility features, and troubleshooting guides.