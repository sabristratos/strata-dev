# Toast System - Comprehensive Usage Guide

The Strata UI Toast System provides multiple ways to trigger and display notifications across your application. This guide covers all available methods with detailed examples and best practices.

## Table of Contents

1. [Quick Start](#quick-start)
2. [Backend Trigger Methods](#backend-trigger-methods)
3. [Frontend Trigger Methods](#frontend-trigger-methods)
4. [Configuration Options](#configuration-options)
5. [Toast Variants](#toast-variants)
6. [Advanced Features](#advanced-features)
7. [Best Practices](#best-practices)
8. [Complete Examples](#complete-examples)

## Quick Start

### 1. Setup (Required)

Include the toast container in your layout:

```blade
<x-strata::toast-container />
```

### 2. Basic Usage

From any controller:
```php
use Strata\UI\Facades\Strata;

Strata::toast('Hello World!');
```

## Backend Trigger Methods

### 1. Facade Method (Recommended)

The easiest way to trigger toasts from controllers, middleware, or services:

```php
use Strata\UI\Facades\Strata;

// Basic toast
Strata::toast('Operation completed successfully!');

// With title and variant
Strata::toast(
    message: 'Your profile has been updated.',
    title: 'Success!',
    variant: 'success',
    duration: 3000
);

// With action buttons
Strata::toast(
    message: 'New message received from John Doe.',
    title: 'Notification',
    variant: 'info',
    actions: [
        ['label' => 'View', 'action' => 'showMessage()'],
        ['label' => 'Dismiss', 'action' => 'dismissNotification()']
    ]
);
```

### 2. Service Method

Direct access to the service class:

```php
use Strata\UI\StrataUIService;

$toastService = app(StrataUIService::class);

$toastService->toast(
    message: 'File uploaded successfully',
    title: 'Upload Complete',
    variant: 'success'
);
```

### 3. Session Flash Method

Manual session flashing (useful for redirects):

```php
session()->flash('strata_toast', [
    'message' => 'Login successful! Welcome back.',
    'title' => 'Welcome',
    'variant' => 'success',
    'duration' => 4000
]);

return redirect('/dashboard');
```

### 4. Livewire Integration

#### Method A: JavaScript Dispatch (Real-time)

```php
use Livewire\Component;

class MyComponent extends Component
{
    public function saveData()
    {
        // Your save logic here...
        
        $this->js("
            window.dispatchEvent(new CustomEvent('strata-toast-show', {
                detail: {
                    title: 'Saved!',
                    message: 'Your changes have been saved.',
                    variant: 'success'
                }
            }));
        ");
    }
}
```

#### Method B: Session Flash (After Page Navigation)

```php
use Livewire\Component;
use Strata\UI\Facades\Strata;

class MyComponent extends Component
{
    public function deleteItem($id)
    {
        // Delete logic...
        
        Strata::toast('Item deleted successfully', 'Success', 'success');
        
        return redirect()->route('items.index');
    }
}
```

#### Method C: Event Dispatch (Alternative)

```php
public function performAction()
{
    // Your logic...
    
    $this->dispatch('show-toast', [
        'title' => 'Action Complete',
        'message' => 'The action was performed successfully.',
        'variant' => 'success'
    ]);
}
```

Then listen for the event in your view:
```blade
<div wire:on="show-toast" x-data x-on:show-toast="
    $strata.toast($event.detail)
">
    {{-- Your component content --}}
</div>
```

## Frontend Trigger Methods

### 1. Alpine.js Magic Helper (Recommended)

The simplest way from Alpine.js components:

```blade
<button 
    x-data 
    @click="$strata.toast({
        title: 'Button Clicked!',
        message: 'You clicked the magic button.',
        variant: 'info'
    })"
>
    Click Me
</button>
```

### 2. JavaScript Function

For vanilla JavaScript or mixed contexts:

```javascript
// Basic usage
window.Strata.toast({
    message: 'This is a JavaScript toast!',
    variant: 'info'
});

// Complete example
window.Strata.toast({
    title: 'File Processing',
    message: 'Your file is being processed in the background.',
    variant: 'info',
    duration: 0, // Persistent toast
    actions: [
        { label: 'View Progress', action: 'showProgress()' }
    ]
});
```

### 3. Direct Event Dispatch

Low-level event system (useful for custom integrations):

```javascript
// Custom event dispatch
window.dispatchEvent(new CustomEvent('strata-toast-show', {
    detail: {
        title: 'Custom Event',
        message: 'Triggered via direct event dispatch.',
        variant: 'warning'
    }
}));
```

### 4. Form Integration

Common pattern for form submissions:

```blade
<form 
    x-data 
    @submit.prevent="
        // Simulate API call
        setTimeout(() => {
            $strata.toast({
                title: 'Form Submitted',
                message: 'Your form has been successfully submitted.',
                variant: 'success'
            });
        }, 1000);
    "
>
    <button type="submit">Submit Form</button>
</form>
```

## Configuration Options

### Complete Parameter Reference

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `message` | string | `null` | The main toast message content |
| `title` | string | `null` | Optional toast title |
| `variant` | string | `'info'` | Toast type: `success`, `warning`, `destructive`, `info`, `primary`, `accent` |
| `duration` | integer | `5000` | Auto-dismiss time in milliseconds (0 = persistent) |
| `icon` | string | `null` | Custom icon name (auto-detected from variant if not provided) |
| `actions` | array | `null` | Action buttons configuration |

### Action Buttons Configuration

```php
'actions' => [
    [
        'label' => 'Primary Action',
        'action' => 'functionName()' // JavaScript function to execute
    ],
    [
        'label' => 'Secondary Action', 
        'action' => 'anotherFunction()'
    ]
]
```

## Toast Variants

### Available Variants

| Variant | Color | Auto Icon | Use Case |
|---------|-------|-----------|----------|
| `success` | Green | ✓ Check Circle | Successful operations |
| `warning` | Yellow | ⚠ Exclamation Triangle | Warnings and cautions |
| `destructive` | Red | ✗ X Circle | Errors and failures |
| `info` | Blue | ⓘ Information Circle | Information and updates |
| `primary` | Primary theme | ⓘ Information Circle | Brand-related messages |
| `accent` | Accent theme | ⓘ Information Circle | Special highlights |

### Variant Examples

```php
// Success - for completed actions
Strata::toast('Profile updated successfully!', 'Success', 'success');

// Warning - for important notices
Strata::toast('Your session expires in 5 minutes.', 'Warning', 'warning');

// Error - for failures
Strata::toast('Unable to save changes. Please try again.', 'Error', 'destructive');

// Info - for general information
Strata::toast('New features are now available.', 'Info', 'info');

// Primary - for brand messages
Strata::toast('Welcome to our platform!', 'Welcome', 'primary');
```

## Advanced Features

### Persistent Toasts

For important messages that shouldn't auto-dismiss:

```php
Strata::toast(
    message: 'System maintenance scheduled for tonight.',
    title: 'Maintenance Notice',
    variant: 'warning',
    duration: 0 // Will not auto-dismiss
);
```

### Action Buttons

Create interactive toasts with action buttons:

```php
Strata::toast(
    message: 'John Doe sent you a message.',
    title: 'New Message',
    variant: 'info',
    actions: [
        ['label' => 'Reply', 'action' => 'openReplyModal()'],
        ['label' => 'Mark Read', 'action' => 'markAsRead()']
    ]
);
```

Then implement the JavaScript functions:

```javascript
function openReplyModal() {
    // Open reply modal
    window.Strata.modal('reply-modal').show();
}

function markAsRead() {
    // Mark message as read
    fetch('/messages/mark-read', { method: 'POST' });
}
```

### Custom Icons

Override the auto-detected variant icon:

```php
Strata::toast(
    message: 'File uploaded to cloud storage.',
    title: 'Upload Complete',
    variant: 'success',
    icon: 'heroicon-o-cloud-arrow-up'
);
```

### Progress Notifications

For long-running operations:

```javascript
// Start progress toast
let progressToast = window.Strata.toast({
    title: 'Processing...',
    message: 'Your file is being processed.',
    variant: 'info',
    duration: 0
});

// Update progress (you'd implement actual progress tracking)
setTimeout(() => {
    window.Strata.toast({
        title: 'Processing Complete!',
        message: 'Your file has been successfully processed.',
        variant: 'success'
    });
}, 5000);
```

## Best Practices

### When to Use Session vs Immediate

**Use Session-based toasts (Facade/Service methods) when:**
- Following form submissions with redirects
- After authentication actions (login/logout)
- For server-side validation messages
- When navigating between pages

**Use Immediate toasts (JavaScript methods) when:**
- Providing instant feedback for user actions
- In single-page application (SPA) contexts
- For real-time notifications
- Within Livewire components for live updates

### User Experience Guidelines

1. **Keep messages concise** - Users scan quickly
2. **Use appropriate variants** - Match the severity/type of action
3. **Don't overuse persistent toasts** - Reserve for critical information
4. **Provide clear action buttons** - Make the next step obvious
5. **Consider timing** - 3-5 seconds for reading simple messages

### Performance Considerations

1. **Limit concurrent toasts** - Too many can overwhelm users
2. **Clean up event listeners** - Especially in SPA contexts
3. **Use appropriate durations** - Longer messages need more time
4. **Avoid heavy JavaScript in actions** - Keep action functions lightweight

### Accessibility

1. **Use semantic variants** - Screen readers understand the context
2. **Provide meaningful titles** - Help users understand the message type
3. **Ensure keyboard navigation** - Action buttons should be focusable
4. **Don't rely solely on color** - Icons help convey meaning

## Complete Examples

### Form Validation with Toast Feedback

```php
// Controller
public function store(UserRequest $request)
{
    try {
        User::create($request->validated());
        
        Strata::toast(
            message: 'User created successfully and welcome email sent.',
            title: 'User Created',
            variant: 'success'
        );
        
        return redirect()->route('users.index');
        
    } catch (Exception $e) {
        Strata::toast(
            message: 'Unable to create user. Please check the details and try again.',
            title: 'Creation Failed',
            variant: 'destructive'
        );
        
        return back()->withInput();
    }
}
```

### File Upload Progress

```blade
<div 
    x-data="fileUpload()"
    x-init="init()"
>
    <input type="file" @change="uploadFile($event)">
    
    <script>
        function fileUpload() {
            return {
                init() {
                    // Component initialization
                },
                
                async uploadFile(event) {
                    const file = event.target.files[0];
                    if (!file) return;
                    
                    // Show upload start toast
                    this.$strata.toast({
                        title: 'Upload Started',
                        message: `Uploading ${file.name}...`,
                        variant: 'info',
                        duration: 2000
                    });
                    
                    try {
                        // Simulate file upload
                        const formData = new FormData();
                        formData.append('file', file);
                        
                        const response = await fetch('/upload', {
                            method: 'POST',
                            body: formData
                        });
                        
                        if (response.ok) {
                            this.$strata.toast({
                                title: 'Upload Complete',
                                message: `${file.name} uploaded successfully.`,
                                variant: 'success',
                                actions: [
                                    { label: 'View File', action: 'viewFile()' }
                                ]
                            });
                        } else {
                            throw new Error('Upload failed');
                        }
                        
                    } catch (error) {
                        this.$strata.toast({
                            title: 'Upload Failed',
                            message: 'Please try again or contact support.',
                            variant: 'destructive'
                        });
                    }
                }
            };
        }
    </script>
</div>
```

### Real-time Notification System

```php
// Livewire Component
class NotificationCenter extends Component
{
    public function mount()
    {
        // Listen for new notifications
        $this->dispatch('listen-for-notifications');
    }
    
    #[On('new-notification')]
    public function handleNotification($data)
    {
        $this->js("
            window.Strata.toast({
                title: '{$data['title']}',
                message: '{$data['message']}',
                variant: '{$data['type']}',
                actions: [
                    { label: 'View', action: 'viewNotification({$data['id']})' }
                ]
            });
        ");
    }
}
```

### API Integration Pattern

```javascript
// Utility function for API calls with toast feedback
async function apiCall(url, options = {}, toastConfig = {}) {
    try {
        const response = await fetch(url, {
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            ...options
        });
        
        const data = await response.json();
        
        if (response.ok) {
            window.Strata.toast({
                title: toastConfig.successTitle || 'Success',
                message: data.message || toastConfig.successMessage || 'Operation completed successfully.',
                variant: 'success'
            });
            return data;
        } else {
            throw new Error(data.message || 'An error occurred');
        }
        
    } catch (error) {
        window.Strata.toast({
            title: toastConfig.errorTitle || 'Error',
            message: error.message || toastConfig.errorMessage || 'Please try again.',
            variant: 'destructive'
        });
        throw error;
    }
}

// Usage
apiCall('/api/users', {
    method: 'POST',
    body: JSON.stringify(userData)
}, {
    successTitle: 'User Created',
    successMessage: 'New user account has been created.',
    errorTitle: 'Creation Failed',
    errorMessage: 'Unable to create user account.'
});
```

## Troubleshooting

### Common Issues

**Toast not appearing:**
- Check that Alpine.js is loaded and initialized
- Verify the toast container is present in your layout
- Ensure event names match exactly (`strata-toast-show`)

**Styling looks wrong:**
- Confirm Strata UI CSS is loaded and up to date
- Check for CSS conflicts or missing theme variables
- Verify icon component is available for variant icons

**Actions not working:**
- Ensure action functions are defined globally or in appropriate scope
- Check browser console for JavaScript errors
- Verify function names match exactly in action configuration

**Multiple toasts for single action:**
- Check for duplicate event listeners
- Ensure you're not calling multiple toast methods
- Verify Livewire isn't re-rendering and duplicating calls

For more help, see the [Toast Container Component](./toast-container.md) documentation or check the demo page examples.