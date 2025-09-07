# Strata UI Data Attributes for Component Customization

Strata UI components now include systematic data attributes that allow developers to precisely target and customize specific parts of each component without relying on CSS class names that might change between versions.

## Overview

Each component includes `data-strata-{component}-{part}` attributes on key elements to enable targeted styling and customization.

**Benefits:**
- ✅ Version-safe styling that won't break with updates
- ✅ Precise targeting of component parts
- ✅ Clear, discoverable attribute names
- ✅ Flexible customization without affecting core functionality

## Data Attribute Naming Convention

```
data-strata-{component}="{part}"
```

- **`strata`**: Consistent namespace prefix
- **`{component}`**: The component name (button, input, modal, etc.)
- **`{part}`**: The specific part of the component (root, icon, text, etc.)

## Component Reference

### Button Component

```html
<x-strata::button icon="plus" variant="primary">
  Add Item
</x-strata::button>
```

**Available data attributes:**
- `data-strata-button="root"` - The main button element
- `data-strata-button="icon"` - Icon element (when present)  
- `data-strata-button="text"` - Text content wrapper
- `data-strata-button="badge-container"` - Badge wrapper (when badge exists)
- `data-strata-button="badge"` - Badge element

**Example customizations:**
```css
/* Style all button icons */
[data-strata-button="icon"] {
    color: var(--accent-color);
}

/* Style button text */
[data-strata-button="text"] {
    font-weight: 600;
}

/* Style badges on buttons */
[data-strata-button="badge"] {
    background: var(--success-color);
}
```

### Form Input Component

```html
<x-strata::form.input 
    label="Email" 
    name="email" 
    type="email" 
/>
```

**Available data attributes:**
- `data-strata-input="wrapper"` - Outer wrapper div
- `data-strata-input="container"` - Input container div
- `data-strata-input="field"` - The actual input element

**Related form components:**
- `data-strata-form="label"` - Form label element
- `data-strata-form="label-required"` - Required asterisk
- `data-strata-form="helper"` - Helper text container
- `data-strata-form="helper-icon"` - Helper text icon
- `data-strata-form="helper-text"` - Helper text content
- `data-strata-form="error"` - Error message container
- `data-strata-form="error-icon"` - Error icon
- `data-strata-form="error-message"` - Error message text

**Example customizations:**
```css
/* Style all input fields */
[data-strata-input="field"] {
    border: 2px solid var(--primary-color);
}

/* Style form labels */
[data-strata-form="label"] {
    font-weight: 700;
    text-transform: uppercase;
}

/* Style error messages */
[data-strata-form="error"] {
    background: var(--error-bg);
    padding: 0.5rem;
    border-radius: 4px;
}
```

### Modal Component

```html
<x-strata::modal name="example">
    Modal content here
</x-strata::modal>
```

**Available data attributes:**
- `data-strata-modal="root"` - Root modal container
- `data-strata-modal="overlay"` - Background overlay
- `data-strata-modal="content"` - Main content container
- `data-strata-modal="close-container"` - Close button container
- `data-strata-modal="close"` - Close button
- `data-strata-modal="body"` - Modal body content

**Example customizations:**
```css
/* Custom overlay styling */
[data-strata-modal="overlay"] {
    backdrop-filter: blur(10px);
    background: rgba(0, 0, 0, 0.8);
}

/* Custom modal content styling */
[data-strata-modal="content"] {
    border: 2px solid var(--accent-color);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
}
```

### Alert Component

```html
<x-strata::alert color="success" title="Success!">
    Your changes have been saved.
</x-strata::alert>
```

**Available data attributes:**
- `data-strata-alert="root"` - Root alert container
- `data-strata-alert="icon-container"` - Icon wrapper
- `data-strata-alert="icon"` - Alert icon
- `data-strata-alert="content"` - Content wrapper
- `data-strata-alert="title"` - Alert title
- `data-strata-alert="message"` - Alert message
- `data-strata-alert="actions"` - Actions container
- `data-strata-alert="dismiss"` - Dismiss button

**Example customizations:**
```css
/* Larger alert icons */
[data-strata-alert="icon"] {
    width: 24px;
    height: 24px;
}

/* Bold alert titles */
[data-strata-alert="title"] {
    font-size: 1.1rem;
    letter-spacing: 0.5px;
}
```

### Table Component

```html
<x-strata::table striped>
    <!-- table content -->
</x-strata::table>
```

**Available data attributes:**
- `data-strata-table="container"` - Outer table container
- `data-strata-table="table"` - The actual table element
- `data-strata-table="loading"` - Loading overlay

**Example customizations:**
```css
/* Custom table borders */
[data-strata-table="table"] {
    border: 2px solid var(--border-color);
}

/* Custom loading state */
[data-strata-table="loading"] {
    background: linear-gradient(45deg, rgba(255,255,255,0.8), rgba(0,0,0,0.1));
}
```

### Card Component

```html
<x-strata::card>
    Card content
</x-strata::card>
```

**Available data attributes:**
- `data-strata-card="root"` - Root card element

**Example customizations:**
```css
/* Custom card styling */
[data-strata-card="root"] {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}
```

### Dropdown/Popover Components

```html
<x-strata::dropdown>
    <x-slot:trigger>
        <x-strata::button>Menu</x-strata::button>
    </x-slot:trigger>
    <!-- dropdown content -->
</x-strata::dropdown>
```

**Available data attributes:**
- `data-strata-dropdown="root"` - Root dropdown element
- `data-strata-dropdown="content"` - Dropdown content container
- `data-strata-popover="root"` - Root popover element  
- `data-strata-popover="trigger"` - Popover trigger element
- `data-strata-popover="content"` - Popover content container

### Form Components

#### Textarea
- `data-strata-textarea="wrapper"` - Wrapper container
- `data-strata-textarea="field"` - The textarea element

#### Select
- `data-strata-select="wrapper"` - Outer wrapper
- `data-strata-select="container"` - Select container
- `data-strata-select="trigger"` - Select trigger button

#### Checkbox
- `data-strata-checkbox="wrapper"` - Wrapper container
- `data-strata-checkbox="container"` - Checkbox container
- `data-strata-checkbox="input-container"` - Input container
- `data-strata-checkbox="field"` - Checkbox input

#### Toggle
- `data-strata-toggle="wrapper"` - Wrapper container  
- `data-strata-toggle="container"` - Toggle container

## Advanced Usage Examples

### Theming Multiple Components

```css
/* Dark theme for all modals */
[data-strata-modal="content"] {
    background: #1a1a1a;
    color: #ffffff;
    border: 1px solid #333;
}

/* Consistent button styling */
[data-strata-button="root"] {
    transition: all 0.3s ease;
    transform-origin: center;
}

[data-strata-button="root"]:hover {
    transform: scale(1.02);
}
```

### Component-Specific Customizations

```css
/* Only style primary buttons */
[data-strata-button="root"][class*="bg-primary"] [data-strata-button="icon"] {
    filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));
}

/* Style form inputs in error state */
[data-strata-input="field"][aria-invalid="true"] {
    box-shadow: 0 0 0 2px var(--destructive-color);
}
```

### Responsive Customizations

```css
/* Mobile-specific modal styling */
@media (max-width: 768px) {
    [data-strata-modal="content"] {
        width: 95vw;
        margin: 1rem;
    }
}

/* Desktop-specific table styling */
@media (min-width: 1024px) {
    [data-strata-table="container"] {
        max-height: 600px;
        overflow-y: auto;
    }
}
```

## Best Practices

1. **Use data attributes for structural styling** - They won't change between versions
2. **Combine with existing classes** - Use data attributes alongside Tailwind classes for best results
3. **Test across components** - Some attributes apply to multiple component types
4. **Maintain specificity** - Use attribute selectors with appropriate specificity
5. **Document custom styles** - Keep track of your customizations for maintenance

## Migration from Class-Based Styling

### Before (risky - classes might change):
```css
.button-primary .icon {
    color: white;
}
```

### After (version-safe):
```css
[data-strata-button="icon"] {
    color: white;  
}
```

This data attribute system ensures your customizations remain stable across Strata UI updates while providing the flexibility to style components exactly as needed.