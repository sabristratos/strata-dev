# Strata UI Developer Documentation

## Overview

Strata UI is a comprehensive Laravel Blade component library built with Tailwind CSS v4. It provides a complete set of UI components designed for modern Laravel applications with full dark mode support, accessibility features, and Livewire integration.

## Architecture

### Component Structure
```
packages/strata-ui/
├── resources/
│   ├── css/
│   │   └── strata-theme.css          # Theme configuration and CSS variables
│   └── views/
│       └── components/
│           ├── form/                 # Form components
│           ├── navigation/           # Navigation components
│           └── *.blade.php          # Core UI components
├── src/
│   ├── Components/                   # PHP component classes
│   └── StrataServiceProvider.php    # Service provider
└── composer.json
```

### Design System

#### Color System
The design system uses Tailwind CSS v4 color variables with semantic naming:

**Primary Colors**: Neutral slate colors from Tailwind
- `--color-primary-*`: References `var(--color-slate-*)` 
- Used for main UI elements, text, and borders

**Accent Colors**: Blue colors for highlights
- `--color-accent-*`: References `var(--color-blue-*)`
- Used for interactive elements and emphasis

**Semantic Colors**: Intent-based colors
- `--color-success-*`: Green variants (`var(--color-green-*)`)
- `--color-destructive-*`: Red variants (`var(--color-red-*)`)
- `--color-warning-*`: Yellow variants (`var(--color-yellow-*)`)
- `--color-info-*`: Sky blue variants (`var(--color-sky-*)`)

**Utility Colors**: Common UI colors
- `--color-muted`: References `var(--color-slate-500)`
- `--color-surface`: References `var(--color-white)`
- `--color-body`: References `var(--color-slate-50)`
- `--color-light`: References `var(--color-white)` for text on dark backgrounds
- `--color-dark`: References `var(--color-slate-900)` for text on light backgrounds

#### Typography
Fluid typography system using `clamp()` for responsive sizing:
- `--font-size-xs` to `--font-size-display`
- Font families: `--font-family-sans`, `--font-family-serif`, `--font-family-mono`
- Font weights: `--font-weight-normal` to `--font-weight-bold`

#### Spacing & Layout
- `--radius-component`: Main border radius for components
- `--radius-component-sm/lg`: Smaller/larger radius variants
- `--max-width-container-*`: Container width tokens
- `--size-avatar-*`: Avatar sizing system

### Tailwind CSS v4 Integration

The system leverages Tailwind v4's automatic utility generation:

```css
@theme {
  /* Color tokens reference Tailwind's built-in colors */
  --color-primary-500: var(--color-slate-500);
  /* Generates: bg-primary-500, text-primary-500, border-primary-500, etc. */
  
  /* Semantic tokens */
  --color-primary: var(--color-primary-500);
  --color-accent: var(--color-accent-500);
  /* Generates: bg-primary, text-primary, bg-accent, text-accent, etc. */
}
```

#### Dark Mode
Dark mode is handled through CSS class-based switching:
- Light mode: Default styles
- Dark mode: `.dark` class overrides

## Breaking Changes (v2.0)

### Color System Migration

#### Renamed Variables
- `secondary` → `accent` (all components and variants)
- `--color-default` → `--color-body`
- `--color-on-*` → Replaced with `--color-light` and `--color-dark`

#### Component Changes

**Button Component**
- `variant="secondary"` → `variant="accent"`
- Text colors now use `text-light` or `text-dark` instead of `text-on-*`

**Badge Component**
- `color="secondary"` → `color="accent"`
- Solid badges use `text-light` for all colors except warning (uses `text-dark`)

**Alert Component**
- Similar color mapping changes
- Warning alerts use `text-dark` for better contrast on yellow backgrounds

**Card Component**
- `border="secondary"` → `border="accent"`
- Default border now uses `border-muted`

#### Border System Changes
- All form inputs now use `border-muted` by default
- Cards use `border-muted` for default borders
- Added explicit `--border-muted` variable
- `--border-default` now references `--color-muted` for backward compatibility

#### Form Components
- All form inputs (input, textarea, checkbox, radio) use `border-muted`
- Toggle component off state uses `bg-muted`
- Required parameters are now enforced:
  - Checkbox: `name`, `id`, `value`, `label`
  - Form.Group: `label`, `for`

## Component Categories

### Form Components
Located in `resources/views/components/form/`

#### Form Group (`<x-form.group>`)
**Props:**
- `label`: Label text (required)
- `for`: ID of the form element (required)
- `helpText`: Optional help text
- `error`: Optional error message

#### Input (`<x-form.input>`)
**Props:**
- `type`: Input type (text, email, password, etc.)
- `name`: Form field name
- `value`: Default value
- `placeholder`: Placeholder text
- `required`: Boolean for required validation
- `disabled`: Boolean for disabled state

**Features:**
- Automatic Livewire model binding
- Built-in validation styling
- Dark mode support
- Accessibility attributes

**Usage:**
```blade
<x-form.input 
    type="email" 
    name="email" 
    placeholder="Enter your email"
    wire:model="email" 
/>
```

#### Textarea (`<x-form.textarea>`)
**Props:**
- `rows`: Number of rows (default: 4)
- `autoResize`: Boolean for auto-resizing functionality
- `value`: Default content
- `placeholder`: Placeholder text

**Features:**
- Alpine.js auto-resize functionality
- Livewire model binding
- Consistent styling with other form elements

#### Checkbox (`<x-form.checkbox>`)
**Props (all required except description):**
- `name`: Form field name (required)
- `id`: Unique identifier (required)
- `value`: Checkbox value (required)
- `label`: Checkbox label text (required)
- `description`: Optional description text
- `checked`: Boolean for checked state

**Features:**
- Hidden input for proper form submission
- Semantic label association
- Accessible markup

### Navigation Components
Located in `resources/views/components/navigation/`

#### Dropdown (`<x-navigation.dropdown>`)
**Slots:**
- Default: Dropdown content
- `trigger`: Dropdown trigger element

**Features:**
- Alpine.js powered interactions
- Keyboard navigation support
- Auto-positioning
- Click-outside-to-close

**Usage:**
```blade
<x-navigation.dropdown>
    <x-slot:trigger>
        <button>Menu</button>
    </x-slot:trigger>
    
    <a href="/profile">Profile</a>
    <a href="/settings">Settings</a>
</x-navigation.dropdown>
```

#### Popover (`<x-navigation.popover>`)
Similar to dropdown but with different positioning and styling for contextual content.

### Table Components

#### Table (`<x-table>`)
**Props:**
- `size`: Table size (sm, md, lg)
- `striped`: Boolean for alternating row colors
- `sticky`: Boolean for sticky header
- `loading`: Boolean for loading overlay

**Features:**
- Responsive design
- CSS variable-based cell padding
- Loading state overlay
- Sticky header support

**Usage:**
```blade
<x-table size="md" striped sticky>
    <thead>
        <tr>
            <x-table.header>Name</x-table.header>
            <x-table.header>Email</x-table.header>
        </tr>
    </thead>
    <tbody>
        <tr>
            <x-table.cell>John Doe</x-table.cell>
            <x-table.cell>john@example.com</x-table.cell>
        </tr>
    </tbody>
</x-table>
```

### Calendar Component

#### Calendar (`<x-calendar>`)
**Props:**
- `startDate`/`endDate`: Date range values
- `range`: Boolean for date range selection
- `multiple`: Boolean for multiple month display
- `presets`: Array of preset date ranges
- `locale`: Localization settings
- `minDate`/`maxDate`: Date constraints
- `disabledDates`: Array of disabled dates

**Features:**
- Alpine.js powered date selection
- Livewire integration
- Internationalization support
- Preset date ranges
- Date validation
- Keyboard navigation

**Usage:**
```blade
<x-calendar 
    wire:model="dateRange"
    :range="true"
    :presets="['Last 7 days', 'Last 30 days', 'This month']"
    locale="en"
/>
```

## Development Guidelines

### Creating New Components

1. **PHP Component Class**
```php
<?php

namespace StrataUI\Components;

use Illuminate\View\Component;

class MyComponent extends Component
{
    public function __construct(
        public string $variant = 'default',
        public bool $disabled = false,
    ) {}

    public function render()
    {
        return view('strata-ui::components.my-component');
    }
}
```

2. **Blade Template**
```blade
@php
    $baseClasses = 'base component classes';
    $variantClasses = match($variant) {
        'primary' => 'bg-primary text-white',
        'secondary' => 'bg-secondary text-white',
        'default' => 'bg-surface text-primary'
    };
@endphp

<div {{ $attributes->merge(['class' => $baseClasses . ' ' . $variantClasses]) }}>
    {{ $slot }}
</div>
```

3. **Register Component**
```php
// In StrataServiceProvider.php
Blade::component('my-component', MyComponent::class);
```

### Styling Guidelines

#### Color Usage
- Use semantic color tokens: `text-primary`, `bg-success`, `border-destructive`
- Avoid hardcoded colors: ~~`text-blue-500`~~
- Support dark mode: Include `dark:` variants where appropriate

#### Component Classes
```php
@php
    $baseClasses = 'shared styles for all variants';
    $sizeClasses = match($size) {
        'sm' => 'text-xs px-2 py-1',
        'md' => 'text-sm px-3 py-2',
        'lg' => 'text-base px-4 py-3'
    };
    $variantClasses = match($variant) {
        'primary' => 'bg-primary text-white',
        'outline' => 'border border-primary text-primary bg-transparent'
    };
@endphp
```

#### Alpine.js Integration
For interactive components:
```blade
<div 
    x-data="componentName({
        initialValue: @js($value),
        options: @js($options)
    })"
    x-modelable="value"
    {{ $attributes->wire('model') }}
>
    <!-- Component content -->
</div>

<script>
document.addEventListener('alpine:initializing', () => {
    Alpine.data('componentName', (config) => ({
        value: config.initialValue,
        
        init() {
            // Initialize component
        },
        
        // Component methods
    }));
});
</script>
```

### Accessibility Guidelines

1. **Semantic HTML**: Use appropriate HTML elements
2. **ARIA Labels**: Provide `aria-label` or `aria-labelledby`
3. **Focus Management**: Ensure proper tab order and focus indicators
4. **Keyboard Navigation**: Support Enter, Space, Escape, Arrow keys
5. **Screen Reader Support**: Use `aria-describedby` for descriptions

### Testing Components

#### Feature Tests
```php
it('renders component with correct attributes', function () {
    $view = $this->blade('<x-my-component variant="primary">Content</x-my-component>');
    
    $view->assertSee('Content')
         ->assertSeeInOrder(['bg-primary', 'text-white']);
});
```

#### Alpine.js Testing
Test JavaScript functionality using browser testing tools or Alpine.js testing utilities.

## Customization

### Theme Customization
Modify `strata-theme.css` to customize the design system:

```css
@theme {
    /* Override color tokens */
    --color-primary-500: oklch(0.6 0.2 280); /* Custom brand color */
    
    /* Add custom tokens */
    --color-brand: var(--color-primary-500);
    --size-custom: 2.5rem;
}
```

### Component Customization
Extend existing components:

```php
class CustomButton extends Button
{
    protected function getVariantClasses(): string
    {
        return match($this->variant) {
            'custom' => 'bg-brand text-white border-brand',
            default => parent::getVariantClasses()
        };
    }
}
```

## Best Practices

### Performance
- Use CSS variables for dynamic styling
- Leverage Tailwind's utility generation
- Minimize Alpine.js data and watchers

### Maintainability
- Follow consistent naming conventions
- Use TypeScript for complex Alpine.js components
- Document component props and slots

### Accessibility
- Test with screen readers
- Validate with accessibility tools
- Follow WCAG guidelines

## Troubleshooting

### Common Issues

**Colors not working**: Check that color tokens are properly defined in `@theme` block

**Alpine.js not initializing**: Ensure scripts are loaded after Alpine.js

**Tailwind classes not applying**: Verify Tailwind CSS v4 configuration and utility generation

**Dark mode not working**: Check `.dark` class application and CSS variable overrides

### Debug Tools
- Browser dev tools for CSS inspection
- Alpine.js devtools for data inspection
- Tailwind CSS IntelliSense for class validation

## Contributing

1. Follow existing code patterns
2. Test all components thoroughly
3. Update documentation for new features
4. Ensure accessibility compliance
5. Maintain backward compatibility