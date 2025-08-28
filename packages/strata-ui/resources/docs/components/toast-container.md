# Toast Container Component

The Toast Container is a core component that provides a centralized location for displaying toast notifications in your application. It uses Alpine.js for state management and provides a seamless experience for displaying various types of notifications.

## Basic Usage

### 1. Include the Toast Container

Add the toast container to your main layout file (typically in the body or at the end of your layout):

```blade
<x-strata::toast-container />
```

### 2. Position Configuration

The toast container can be positioned in different locations on the screen:

```blade
{{-- Bottom positions --}}
<x-strata::toast-container position="bottom-end" />     {{-- Bottom right (default) --}}
<x-strata::toast-container position="bottom-start" />   {{-- Bottom left --}}
<x-strata::toast-container position="bottom-center" />  {{-- Bottom center --}}

{{-- Top positions --}}
<x-strata::toast-container position="top-end" />        {{-- Top right --}}
<x-strata::toast-container position="top-start" />      {{-- Top left --}}
<x-strata::toast-container position="top-center" />     {{-- Top center --}}
```

## Component Properties

| Property | Type | Default | Description |
|----------|------|---------|-------------|
| `position` | string | `'bottom-end'` | Position of the toast container on screen |
| `expanded` | boolean | `false` | Whether the container should be expanded by default |

## Available Positions

- **`bottom-end`** - Bottom right corner (most common)
- **`bottom-start`** - Bottom left corner
- **`bottom-center`** - Bottom center of screen
- **`top-end`** - Top right corner
- **`top-start`** - Top left corner
- **`top-center`** - Top center of screen

## Features

### Auto-Dismiss Timer
- Toasts automatically dismiss after their duration (default: 5 seconds)
- Hover over a toast to pause the timer
- Move cursor away to resume the timer

### Toast Stacking
- Multiple toasts stack vertically in the container
- Newest toasts appear at the top/bottom depending on position
- Smooth animations for show/hide transitions

### Responsive Design
- Container adapts to screen size
- Maximum width of 384px (sm:max-w-sm)
- Full width on mobile devices

### Accessibility
- Proper ARIA labels and roles
- Keyboard navigation support
- Screen reader friendly content

## Session-Based Toasts

The container automatically displays toasts from session data when the page loads:

```php
// In your controller
session()->flash('strata_toast', [
    'title' => 'Success!',
    'message' => 'Your data has been saved.',
    'variant' => 'success',
    'duration' => 5000
]);
```

## Advanced Configuration

### Multiple Containers

You can have multiple toast containers for different purposes:

```blade
{{-- Main notifications --}}
<x-strata::toast-container position="bottom-end" />

{{-- System alerts --}}
<x-strata::toast-container position="top-center" />
```

### Custom Styling

The container uses CSS variables and can be customized:

```css
.toast-container {
    --toast-max-width: 400px;
    --toast-spacing: 0.75rem;
}
```

## Event Listeners

The container listens for the following events:

- **`strata-toast-show`** - Triggered to display a new toast
- **Window events** - Automatically captures and processes toast events

## Integration Notes

### Required Dependencies
- Alpine.js (included with Livewire)
- Strata UI CSS theme
- Icon component for variant icons

### Browser Support
- Modern browsers with ES6+ support
- Graceful degradation for older browsers
- Works with or without JavaScript (falls back to basic styling)

## Troubleshooting

### Common Issues

**Toasts not appearing:**
- Ensure Alpine.js is loaded
- Check that the container is included in your layout
- Verify event names match exactly (`strata-toast-show`)

**Styling issues:**
- Confirm Strata UI CSS is loaded
- Check for conflicting CSS rules
- Verify icon component is available

**Multiple containers showing same toast:**
- Each container listens to global events
- Use different event names or conditional logic for multiple containers

## Examples

See the [Toast System Guide](./toast-system.md) for comprehensive examples of triggering toasts from various contexts.