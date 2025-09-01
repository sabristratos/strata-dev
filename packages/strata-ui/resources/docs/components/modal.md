# Modal Component - Comprehensive Usage Guide

The Strata UI Modal Component provides flexible, accessible overlay dialogs with focus management, body scroll locking, and smooth animations. Built with Alpine.js for optimal performance and user experience.

## Table of Contents

1. [Quick Start](#quick-start)
2. [Configuration Options](#configuration-options)
3. [Usage Examples](#usage-examples)
4. [Modal Variants](#modal-variants)
5. [JavaScript API](#javascript-api)
6. [Alpine.js Integration](#alpinejs-integration)
7. [Focus Management & Accessibility](#focus-management--accessibility)
8. [Advanced Features](#advanced-features)
9. [Best Practices](#best-practices)
10. [Troubleshooting](#troubleshooting)

## Quick Start

### Basic Modal

```blade
{{-- Basic modal --}}
<x-strata::modal name="example">
    <div class="modal-content">
        <h2 id="modal-title-example" class="text-xl font-bold mb-4">Modal Title</h2>
        <p id="modal-description-example" class="text-gray-600 mb-6">
            This is a basic modal with default styling and behavior.
        </p>
        <div class="flex justify-end gap-3">
            <x-strata::button variant="outline" @click="hideModal()">Cancel</x-strata::button>
            <x-strata::button @click="confirm()">Confirm</x-strata::button>
        </div>
    </div>
</x-strata::modal>

{{-- Trigger button --}}
<x-strata::button @click="$strata.modal('example').show()">
    Open Modal
</x-strata::button>
```

### Quick Modal with JavaScript

```blade
{{-- Trigger from JavaScript --}}
<button onclick="showQuickModal()">Show Quick Modal</button>

<script>
function showQuickModal() {
    // Show modal using global API
    window.Strata.modal('example').show({
        title: 'Quick Modal',
        message: 'This modal was triggered from JavaScript!'
    });
}
</script>
```

## Configuration Options

### Complete Parameter Reference

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `name` | string | `null` | Unique identifier for modal (required for JavaScript API) |
| `variant` | string | `'default'` | Visual style: `default`, `flyout`, `bare` |
| `size` | string | `'md'` | Modal width: `sm`, `md`, `lg`, `xl`, `2xl`, `full` |
| `position` | string | `'center'` | Position for flyout variant: `left`, `right`, `bottom`, `center` |
| `dismissible` | bool | `true` | Allow closing via ESC, backdrop click, or X button |

### Size Reference

| Size | Max Width | Best For |
|------|-----------|----------|
| `sm` | 384px (max-w-sm) | Simple confirmations, alerts |
| `md` | 512px (max-w-lg) | Forms, content dialogs |
| `lg` | 672px (max-w-2xl) | Detailed forms, content viewing |
| `xl` | 896px (max-w-4xl) | Complex forms, data tables |
| `2xl` | 1152px (max-w-6xl) | Rich content, dashboards |
| `full` | 95vw (max-w-[95vw]) | Full-screen-like experience |

## Usage Examples

### Confirmation Dialog

```blade
<x-strata::modal name="delete-confirmation" size="sm">
    <div class="text-center">
        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-red-100">
            <x-strata::icon name="heroicon-o-exclamation-triangle" class="h-6 w-6 text-red-600" />
        </div>
        <div class="mt-3">
            <h3 id="modal-title-delete-confirmation" class="text-lg font-medium text-gray-900">
                Delete Item
            </h3>
            <div id="modal-description-delete-confirmation" class="mt-2">
                <p class="text-sm text-gray-500">
                    Are you sure you want to delete this item? This action cannot be undone.
                </p>
            </div>
        </div>
        <div class="mt-5 flex justify-center gap-3">
            <x-strata::button variant="outline" @click="cancel()">Cancel</x-strata::button>
            <x-strata::button variant="destructive" @click="confirm()">Delete</x-strata::button>
        </div>
    </div>
</x-strata::modal>

{{-- Trigger with event handling --}}
<div x-data @modal-confirm="handleDelete($event.detail)">
    <x-strata::button 
        variant="destructive" 
        @click="$strata.modal('delete-confirmation').show()"
    >
        Delete Item
    </x-strata::button>
</div>

<script>
function handleDelete(detail) {
    console.log('Item deleted:', detail);
    // Perform deletion logic
    fetch('/api/delete-item', { method: 'DELETE' });
}
</script>
```

### Form Modal

```blade
<x-strata::modal name="user-form" size="lg">
    <form @submit.prevent="submitForm()" x-data="userFormModal()">
        <div class="modal-header border-b border-border pb-4 mb-6">
            <h2 id="modal-title-user-form" class="text-xl font-semibold">
                <span x-text="editing ? 'Edit User' : 'Create User'"></span>
            </h2>
        </div>
        
        <div class="modal-body space-y-4">
            <div>
                <label class="block text-sm font-medium mb-1">Name</label>
                <input 
                    type="text" 
                    x-model="form.name"
                    class="w-full px-3 py-2 border border-border rounded-md"
                    required
                >
            </div>
            
            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input 
                    type="email" 
                    x-model="form.email"
                    class="w-full px-3 py-2 border border-border rounded-md"
                    required
                >
            </div>
            
            <div>
                <label class="block text-sm font-medium mb-1">Role</label>
                <select x-model="form.role" class="w-full px-3 py-2 border border-border rounded-md">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                    <option value="manager">Manager</option>
                </select>
            </div>
        </div>
        
        <div class="modal-footer border-t border-border pt-4 mt-6 flex justify-end gap-3">
            <x-strata::button variant="outline" type="button" @click="hideModal()">
                Cancel
            </x-strata::button>
            <x-strata::button type="submit" :disabled="submitting">
                <span x-show="!submitting" x-text="editing ? 'Update' : 'Create'"></span>
                <span x-show="submitting">Saving...</span>
            </x-strata::button>
        </div>
    </form>
</x-strata::modal>

<script>
function userFormModal() {
    return {
        editing: false,
        submitting: false,
        form: {
            name: '',
            email: '',
            role: 'user'
        },
        
        async submitForm() {
            this.submitting = true;
            
            try {
                const response = await fetch('/api/users', {
                    method: this.editing ? 'PUT' : 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(this.form)
                });
                
                if (response.ok) {
                    this.$strata.toast({
                        title: 'Success',
                        message: `User ${this.editing ? 'updated' : 'created'} successfully`,
                        variant: 'success'
                    });
                    this.hideModal();
                    // Refresh data or dispatch event
                    this.$dispatch('user-saved', { user: await response.json() });
                }
            } catch (error) {
                this.$strata.toast({
                    title: 'Error',
                    message: 'Failed to save user',
                    variant: 'destructive'
                });
            } finally {
                this.submitting = false;
            }
        },
        
        resetForm() {
            this.form = { name: '', email: '', role: 'user' };
            this.editing = false;
        }
    };
}
</script>
```

### Image Gallery Modal

```blade
<x-strata::modal name="image-gallery" variant="bare" size="full">
    <div x-data="imageGallery()" class="fixed inset-0 bg-black flex items-center justify-center">
        {{-- Navigation --}}
        <button 
            @click="previousImage()"
            class="absolute left-4 top-1/2 -translate-y-1/2 z-10 p-2 text-white hover:bg-white/10 rounded-full"
            :disabled="currentIndex === 0"
        >
            <x-strata::icon name="heroicon-o-chevron-left" class="w-8 h-8" />
        </button>
        
        <button 
            @click="nextImage()"
            class="absolute right-4 top-1/2 -translate-y-1/2 z-10 p-2 text-white hover:bg-white/10 rounded-full"
            :disabled="currentIndex === images.length - 1"
        >
            <x-strata::icon name="heroicon-o-chevron-right" class="w-8 h-8" />
        </button>
        
        {{-- Close button --}}
        <button 
            @click="hideModal()"
            class="absolute top-4 right-4 z-10 p-2 text-white hover:bg-white/10 rounded-full"
        >
            <x-strata::icon name="heroicon-o-x-mark" class="w-6 h-6" />
        </button>
        
        {{-- Main image --}}
        <div class="max-w-7xl max-h-full p-8">
            <img 
                :src="currentImage?.url" 
                :alt="currentImage?.caption"
                class="max-w-full max-h-full object-contain"
            >
        </div>
        
        {{-- Image info --}}
        <div 
            x-show="currentImage?.caption" 
            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-6"
        >
            <p class="text-white text-lg" x-text="currentImage?.caption"></p>
            <p class="text-white/70 text-sm">
                <span x-text="currentIndex + 1"></span> of <span x-text="images.length"></span>
            </p>
        </div>
    </div>
</x-strata::modal>

<script>
function imageGallery() {
    return {
        images: [
            { url: '/images/1.jpg', caption: 'Beautiful landscape' },
            { url: '/images/2.jpg', caption: 'City skyline at sunset' },
            { url: '/images/3.jpg', caption: 'Mountain reflection' }
        ],
        currentIndex: 0,
        
        get currentImage() {
            return this.images[this.currentIndex] || null;
        },
        
        nextImage() {
            if (this.currentIndex < this.images.length - 1) {
                this.currentIndex++;
            }
        },
        
        previousImage() {
            if (this.currentIndex > 0) {
                this.currentIndex--;
            }
        },
        
        showImage(index) {
            this.currentIndex = index;
            this.$strata.modal('image-gallery').show();
        }
    };
}
</script>
```

## Modal Variants

### Default Modal

Standard centered modal with backdrop and padding:

```blade
<x-strata::modal name="default-modal" variant="default" size="md">
    <h2 class="text-xl font-bold mb-4">Default Modal</h2>
    <p>Content with automatic padding and rounded corners.</p>
</x-strata::modal>
```

### Flyout Modal

Slide-in panel from screen edges:

```blade
{{-- Right flyout (default) --}}
<x-strata::modal name="right-flyout" variant="flyout" position="right">
    <div class="p-6 h-full overflow-y-auto">
        <h2 class="text-xl font-bold mb-4">Settings Panel</h2>
        <div class="space-y-4">
            {{-- Settings content --}}
        </div>
    </div>
</x-strata::modal>

{{-- Left flyout --}}
<x-strata::modal name="left-flyout" variant="flyout" position="left">
    <div class="p-6 h-full overflow-y-auto">
        <h2 class="text-xl font-bold mb-4">Navigation Menu</h2>
        {{-- Navigation content --}}
    </div>
</x-strata::modal>

{{-- Bottom flyout --}}
<x-strata::modal name="bottom-flyout" variant="flyout" position="bottom">
    <div class="p-6 max-h-[70vh] overflow-y-auto">
        <h2 class="text-xl font-bold mb-4">Quick Actions</h2>
        {{-- Action buttons --}}
    </div>
</x-strata::modal>
```

### Bare Modal

No default styling - full control over appearance:

```blade
<x-strata::modal name="custom-modal" variant="bare">
    <div class="bg-gradient-to-br from-purple-500 to-pink-500 p-8 rounded-2xl shadow-2xl max-w-md mx-auto mt-20">
        <div class="text-center text-white">
            <h2 class="text-2xl font-bold mb-4">Custom Styled Modal</h2>
            <p class="mb-6">Complete control over styling and layout.</p>
            <button 
                @click="hideModal()"
                class="bg-white text-purple-500 px-6 py-2 rounded-full font-semibold hover:bg-gray-100"
            >
                Close
            </button>
        </div>
    </div>
</x-strata::modal>
```

## JavaScript API

### Global Modal API

```javascript
// Show modal
window.Strata.modal('modal-name').show();
window.Strata.modal('modal-name').show({ data: 'optional' });

// Hide modal
window.Strata.modal('modal-name').hide();

// Toggle modal
window.Strata.modal('modal-name').toggle();
window.Strata.modal('modal-name').toggle({ data: 'optional' });

// Check if modal exists
if (window.Strata.modal('modal-name').exists()) {
    // Modal exists in DOM
}

// Close all modals
window.Strata.closeAllModals();
```

### Event-Based API

```javascript
// Dispatch events to control modals
window.dispatchEvent(new CustomEvent('strata-modal-show-modal-name', {
    detail: { customData: 'value' }
}));

window.dispatchEvent(new CustomEvent('strata-modal-hide-modal-name'));

window.dispatchEvent(new CustomEvent('strata-modal-toggle-modal-name', {
    detail: { customData: 'value' }
}));
```

### Alpine.js Magic Helper

```blade
<div x-data>
    <button @click="$strata.modal('example').show()">Show Modal</button>
    <button @click="$strata.modal('example').hide()">Hide Modal</button>
    <button @click="$strata.modal('example').toggle()">Toggle Modal</button>
</div>
```

## Alpine.js Integration

### Event Handling

**Listen for modal events:**

```blade
<div x-data @modal-opened="handleModalOpen($event.detail)" @modal-closed="handleModalClose($event.detail)">
    {{-- Modal events bubble up --}}
    <x-strata::modal name="example">
        {{-- Content --}}
    </x-strata::modal>
</div>

<script>
function handleModalOpen(detail) {
    console.log('Modal opened:', detail.name, detail.data);
    // Pause background processes, load modal-specific data, etc.
}

function handleModalClose(detail) {
    console.log('Modal closed:', detail.name);
    // Resume processes, clean up data, etc.
}
</script>
```

### State Synchronization

**Sync modal state with Alpine.js component:**

```blade
<div x-data="{
    modalOpen: false,
    selectedUser: null
}" @modal-opened="modalOpen = true" @modal-closed="modalOpen = false">
    
    {{-- UI updates based on modal state --}}
    <div x-show="modalOpen" class="bg-gray-100 p-4 rounded">
        Modal is currently open
    </div>
    
    <x-strata::modal name="user-details" wire:model="modalOpen">
        <div x-show="selectedUser">
            <h2 x-text="selectedUser?.name"></h2>
            <p x-text="selectedUser?.email"></p>
        </div>
    </x-strata::modal>
</div>
```

### Livewire Integration

**Use with Livewire for dynamic content:**

```blade
{{-- Livewire component --}}
<div wire:model="showModal">
    <x-strata::modal name="livewire-modal" wire:model.self="showModal">
        <div wire:loading>
            <div class="animate-pulse">Loading...</div>
        </div>
        
        <div wire:loading.remove>
            <h2 class="text-xl font-bold mb-4">{{ $modalTitle }}</h2>
            <div class="space-y-4">
                @foreach($modalData as $item)
                    <div class="p-3 bg-gray-50 rounded">
                        {{ $item['name'] }}
                    </div>
                @endforeach
            </div>
        </div>
    </x-strata::modal>
</div>
```

```php
// Livewire Component
class MyComponent extends Component
{
    public bool $showModal = false;
    public string $modalTitle = '';
    public array $modalData = [];
    
    public function openModal($id)
    {
        $this->modalData = $this->loadModalData($id);
        $this->modalTitle = "Details for Item #{$id}";
        $this->showModal = true;
    }
    
    public function updatedShowModal($value)
    {
        if (!$value) {
            // Modal was closed, reset data
            $this->reset(['modalTitle', 'modalData']);
        }
    }
}
```

## Focus Management & Accessibility

### Automatic Focus Management

The modal component automatically:
- **Stores focus** before opening
- **Traps focus** within the modal using Alpine.js `x-trap`
- **Restores focus** to the trigger element when closing
- **Manages ARIA attributes** for screen readers

### ARIA Attributes

**Proper labeling for screen readers:**

```blade
<x-strata::modal name="accessible-modal">
    {{-- These IDs are automatically linked via ARIA --}}
    <h2 id="modal-title-accessible-modal" class="text-xl font-bold mb-4">
        Modal Title
    </h2>
    <div id="modal-description-accessible-modal" class="mb-6">
        <p>Detailed description of the modal's purpose and content.</p>
    </div>
    
    {{-- Rest of content --}}
</x-strata::modal>
```

### Keyboard Navigation

**Built-in keyboard support:**

- `ESC` - Close modal (if dismissible)
- `Tab` / `Shift+Tab` - Navigate within modal (focus trap active)
- `Enter` / `Space` - Activate focused elements

### Screen Reader Considerations

```blade
<x-strata::modal name="sr-optimized">
    {{-- Announce modal purpose --}}
    <div class="sr-only" aria-live="polite">
        Dialog opened: User preferences
    </div>
    
    <h2 id="modal-title-sr-optimized" class="text-xl font-bold mb-4">
        User Preferences
    </h2>
    
    {{-- Structured content for screen readers --}}
    <div id="modal-description-sr-optimized">
        <p>Update your account preferences using the form below.</p>
    </div>
    
    <form role="form" aria-labelledby="modal-title-sr-optimized">
        {{-- Form fields with proper labels --}}
        <div class="space-y-4">
            <div>
                <label for="email-pref" class="block font-medium">
                    Email Notifications
                </label>
                <select id="email-pref" aria-describedby="email-pref-help">
                    <option>Daily</option>
                    <option>Weekly</option>
                    <option>Never</option>
                </select>
                <div id="email-pref-help" class="text-sm text-gray-600">
                    Choose how often you receive email notifications
                </div>
            </div>
        </div>
    </form>
</x-strata::modal>
```

## Advanced Features

### Modal Chaining

**Open modals in sequence:**

```blade
<div x-data="modalChain()">
    <x-strata::modal name="step-1" @modal-confirm="showStep2()">
        <h2 class="text-xl font-bold mb-4">Step 1: Basic Info</h2>
        <p class="mb-6">Please provide your basic information.</p>
        <div class="flex justify-end gap-3">
            <x-strata::button variant="outline" @click="hideModal()">Cancel</x-strata::button>
            <x-strata::button @click="confirm()">Next</x-strata::button>
        </div>
    </x-strata::modal>
    
    <x-strata::modal name="step-2" @modal-confirm="showStep3()">
        <h2 class="text-xl font-bold mb-4">Step 2: Preferences</h2>
        <p class="mb-6">Configure your preferences.</p>
        <div class="flex justify-end gap-3">
            <x-strata::button variant="outline" @click="showStep1()">Back</x-strata::button>
            <x-strata::button @click="confirm()">Next</x-strata::button>
        </div>
    </x-strata::modal>
    
    <x-strata::modal name="step-3" @modal-confirm="complete()">
        <h2 class="text-xl font-bold mb-4">Step 3: Review</h2>
        <p class="mb-6">Please review your information.</p>
        <div class="flex justify-end gap-3">
            <x-strata::button variant="outline" @click="showStep2()">Back</x-strata::button>
            <x-strata::button @click="confirm()">Complete</x-strata::button>
        </div>
    </x-strata::modal>
    
    <button @click="startWizard()">Start Wizard</button>
</div>

<script>
function modalChain() {
    return {
        startWizard() {
            this.$strata.modal('step-1').show();
        },
        
        showStep1() {
            this.$strata.modal('step-2').hide();
            this.$strata.modal('step-1').show();
        },
        
        showStep2() {
            this.$strata.modal('step-1').hide();
            this.$strata.modal('step-2').show();
        },
        
        showStep3() {
            this.$strata.modal('step-2').hide();
            this.$strata.modal('step-3').show();
        },
        
        complete() {
            this.$strata.modal('step-3').hide();
            this.$strata.toast({
                title: 'Success',
                message: 'Wizard completed successfully!',
                variant: 'success'
            });
        }
    };
}
</script>
```

### Dynamic Content Loading

**Load content dynamically when modal opens:**

```blade
<x-strata::modal name="dynamic-content" @modal-opened="loadContent($event.detail)">
    <div x-data="{ loading: true, content: null, error: null }">
        {{-- Loading state --}}
        <div x-show="loading" class="text-center py-8">
            <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-primary mx-auto"></div>
            <p class="mt-2 text-gray-600">Loading content...</p>
        </div>
        
        {{-- Error state --}}
        <div x-show="error" class="text-center py-8">
            <div class="text-red-500 mb-2">
                <x-strata::icon name="heroicon-o-exclamation-triangle" class="w-8 h-8 mx-auto" />
            </div>
            <p class="text-gray-600" x-text="error"></p>
            <button @click="loadContent()" class="mt-3 text-primary hover:underline">
                Try Again
            </button>
        </div>
        
        {{-- Content state --}}
        <div x-show="content && !loading && !error">
            <h2 class="text-xl font-bold mb-4" x-text="content?.title"></h2>
            <div x-html="content?.body"></div>
        </div>
    </div>
</x-strata::modal>

<script>
async function loadContent(detail = {}) {
    const contentId = detail.data?.contentId || 'default';
    
    try {
        this.loading = true;
        this.error = null;
        
        const response = await fetch(`/api/modal-content/${contentId}`);
        if (!response.ok) throw new Error('Failed to load content');
        
        this.content = await response.json();
    } catch (error) {
        this.error = error.message;
    } finally {
        this.loading = false;
    }
}
</script>
```

### Session-Based Modal Display

**Show modals from server-side (PHP) using session data:**

```php
// Controller
public function store(Request $request)
{
    // Process form...
    
    // Show success modal
    session()->flash('strata_modal', [
        'id' => 'success-modal',
        'title' => 'Success!',
        'message' => 'Your data has been saved successfully.'
    ]);
    
    return redirect()->back();
}
```

The modal will automatically appear on the next page load using the session data.

## Best Practices

### Modal Usage Guidelines

1. **Use modals sparingly** - Don't overuse modals for simple actions
2. **Provide clear context** - Users should understand why the modal appeared
3. **Make dismissal obvious** - Always provide clear ways to close the modal
4. **Keep content focused** - Modals should have a single, clear purpose
5. **Avoid nested modals** - Use modal chaining instead of opening modals within modals

### Content Guidelines

```blade
{{-- ✅ Good modal structure --}}
<x-strata::modal name="good-example">
    <div class="modal-header mb-4">
        <h2 id="modal-title-good-example" class="text-xl font-bold">Clear Title</h2>
    </div>
    
    <div class="modal-body mb-6">
        <p id="modal-description-good-example">
            Clear, concise description of what this modal does.
        </p>
        {{-- Main content --}}
    </div>
    
    <div class="modal-footer flex justify-end gap-3">
        <x-strata::button variant="outline" @click="hideModal()">Cancel</x-strata::button>
        <x-strata::button @click="confirm()">Primary Action</x-strata::button>
    </div>
</x-strata::modal>

{{-- ❌ Poor modal structure --}}
<x-strata::modal name="poor-example">
    <div class="messy-content">
        <h2>Title</h2>
        <button @click="hideModal()">X</button>
        <p>Unclear purpose...</p>
        <div>Random content...</div>
        <button>Maybe Action?</button>
    </div>
</x-strata::modal>
```

### Performance Considerations

```blade
{{-- ✅ Lazy load heavy content --}}
<x-strata::modal name="optimized-modal" @modal-opened="initializeContent()">
    <div x-data="{ contentLoaded: false }">
        <template x-if="contentLoaded">
            {{-- Heavy content only renders when needed --}}
            <div class="complex-content">
                {{-- Charts, tables, etc. --}}
            </div>
        </template>
    </div>
</x-strata::modal>

{{-- ❌ Always rendering heavy content --}}
<x-strata::modal name="unoptimized-modal">
    <div class="complex-content">
        {{-- This renders even when modal is closed --}}
        <canvas id="heavy-chart"></canvas>
        <table><!-- 1000 rows --></table>
    </div>
</x-strata::modal>
```

### Accessibility Best Practices

1. **Always provide modal titles** using proper heading structure
2. **Use descriptive ARIA labels** for better screen reader support
3. **Ensure keyboard navigation** works throughout the modal
4. **Test with screen readers** to verify the experience
5. **Provide sufficient color contrast** for all text and controls

## Troubleshooting

### Common Issues

**Modal not appearing:**
- Check that Alpine.js is loaded and initialized
- Verify the modal name matches exactly (case-sensitive)
- Ensure the modal element exists in the DOM
- Check browser console for JavaScript errors

```javascript
// Debug modal state
console.log('Modal exists:', window.Strata.modal('modal-name').exists());
console.log('Alpine data:', Alpine.$data(document.querySelector('[data-modal-name="modal-name"]')));
```

**Focus not restoring correctly:**
- Ensure the triggering element still exists when modal closes
- Check if other JavaScript is interfering with focus management
- Verify the modal is using the correct `name` attribute

**Body scroll not locking:**
- Check if there are CSS conflicts with body scroll utilities
- Verify other modals aren't interfering with scroll lock
- Ensure modal cleanup is happening properly

**Animations not working:**
- Verify Alpine.js transition classes are not being overridden
- Check for CSS conflicts with transition properties
- Ensure the modal variant supports the expected animation type

**Modal not closing with ESC:**
- Confirm `dismissible="true"` is set (default)
- Check if other event listeners are preventing the keydown event
- Verify Alpine.js event handling is working correctly

### Debug Helpers

```blade
{{-- Add debug information --}}
<x-strata::modal name="debug-modal" x-data="{ debug: true }">
    <div x-show="debug" class="bg-yellow-100 border border-yellow-300 p-2 mb-4 text-xs">
        <strong>Debug Info:</strong>
        <div>Modal Name: <span x-text="name"></span></div>
        <div>Show State: <span x-text="show"></span></div>
        <div>Dismissible: <span x-text="dismissible"></span></div>
    </div>
    
    {{-- Regular modal content --}}
</x-strata::modal>
```

```javascript
// Global modal debugging
window.debugModals = function() {
    const modals = document.querySelectorAll('[x-data*="strataModal"]');
    console.log('Found modals:', modals.length);
    
    modals.forEach((modal, index) => {
        const alpineData = Alpine.$data(modal);
        console.log(`Modal ${index + 1}:`, {
            name: alpineData.name,
            show: alpineData.show,
            element: modal
        });
    });
};

// Call in console: debugModals()
```

### Performance Debugging

```javascript
// Monitor modal events
['modal-opened', 'modal-closed', 'modal-confirm', 'modal-cancel'].forEach(eventName => {
    document.addEventListener(eventName, (event) => {
        console.log(`Modal Event: ${eventName}`, event.detail);
    });
});

// Track body scroll lock
const originalOverflow = document.body.style.overflow;
const observer = new MutationObserver(() => {
    if (document.body.style.overflow !== originalOverflow) {
        console.log('Body scroll changed:', document.body.style.overflow);
    }
});
observer.observe(document.body, { attributes: true, attributeFilter: ['style'] });
```

---

This comprehensive modal documentation covers all aspects of the component, from basic usage to advanced integration patterns. The modal component is now well-documented with practical examples, troubleshooting guides, and best practices for creating accessible, performant modal dialogs.