# Strata UI

A comprehensive Laravel component library built with Tailwind CSS v4, featuring a semantic color system and dark mode support.

## Overview

Strata UI provides a complete set of modern UI components for Laravel applications, including:

- **Semantic Color System**: Primary (slate), accent (blue), success, warning, destructive, and info colors
- **Dark Mode Support**: Automatic theme switching with CSS variables
- **Tailwind CSS v4**: Modern utility-first CSS framework
- **Laravel Components**: Blade components with proper PHP class structure
- **Alpine.js Integration**: Interactive components with JavaScript functionality

## Theme System

### Color Palette

Strata UI uses a semantic approach to colors:

- **Primary**: Slate colors for main content and UI elements
- **Accent**: Blue colors for interactive elements and highlights  
- **Success**: Green for positive states and confirmations
- **Warning**: Yellow for cautions and important notices
- **Destructive**: Red for errors and dangerous actions
- **Info**: Sky blue for informational content
- **Muted**: Neutral colors for secondary content

### Dark Mode

Dark mode is implemented using CSS custom properties that automatically switch when a `.dark` class is applied to a parent element (typically `<html>` or `<body>`).

### Theme Override Utilities

Strata UI provides two utility classes for precise theme control:

#### `always-light` Class

Forces elements to use light theme colors regardless of the current theme:

```blade
{{-- Text that stays readable on dark images --}}
<div class="relative">
    <img src="dark-background.jpg" alt="Dark image">
    <div class="absolute top-4 left-4 always-light">
        <h5 class="text-primary">Always Light Text</h5>
        <p class="text-secondary">This text remains light even in dark mode</p>
        <x-strata::badge color="accent">Light Badge</x-strata::badge>
    </div>
</div>
```

#### `always-dark` Class

Forces elements to use dark theme colors regardless of the current theme:

```blade
{{-- Branded section that maintains dark appearance --}}
<div class="always-dark">
    <x-strata::card>
        <h5 class="text-primary">Brand Section</h5>
        <p class="text-secondary">This section stays dark for consistency</p>
        <x-strata::button variant="accent">Dark Button</x-strata::button>
    </x-strata::card>
</div>
```

#### How Theme Utilities Work

The utilities work by overriding CSS custom properties with specific theme values:

- `.dark .always-light` has higher CSS specificity than `.dark`, forcing light theme variables
- `.always-dark` directly applies dark theme variables to any element
- Both classes work seamlessly with all existing Tailwind utilities and Strata components

#### Use Cases

**Text on Images**: Ensure text readability regardless of image darkness and current theme:
```blade
<div class="always-light">
    <h4 class="text-primary">Always visible text</h4>
</div>
```

**Branded Sections**: Maintain consistent brand appearance:
```blade
<div class="always-dark p-6 rounded-lg">
    <h4 class="text-primary">Brand Header</h4>
    <p class="text-secondary">Consistent brand colors</p>
</div>
```

**Mixed Content**: Combine themes in a single layout:
```blade
<x-strata::card>
    <h5>Regular Content</h5>
    
    <div class="always-dark p-4 rounded">
        <h6 class="text-primary">Dark Section</h6>
    </div>
    
    <div class="always-light p-4 rounded border">
        <h6 class="text-primary">Light Section</h6>
    </div>
</x-strata::card>
```

## Available Components

- **Buttons**: Primary, accent, destructive, outline, and ghost variants
- **Badges**: Solid, outline, and soft variants with multiple colors
- **Cards**: Content containers with customizable borders
- **Alerts**: Informational components with icons and dismissible options
- **Forms**: Input, textarea, checkbox, radio, and toggle components
- **Tables**: Structured data display with header, body, and row components
- **Avatars**: User profile images with status indicators
- **Typography**: Semantic heading and text styling

## Development

### Requirements

- PHP 8.2+
- Laravel 12
- Node.js for frontend build process

### Installation

1. Install dependencies:
```bash
composer install
npm install
```

2. Build assets:
```bash
npm run build
# or for development
npm run dev
```

3. View the component demo:
```bash
php artisan serve
```

Visit `/demo` to see all components in action.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
