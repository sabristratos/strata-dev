---
name: make-component
description: "Create Strata UI component: ComponentName --type=form|interactive|basic --variants=primary,secondary --interactive --theme-colors --accessibility --responsive"
---

# Create Strata UI Component

I'll create a comprehensive Strata UI component following your sophisticated patterns including Alpine.js integration, theme system, and advanced CSS.

**Component Name:** `$1`

**Arguments:**
- `$1` - Component name (PascalCase, e.g., `Button`, `FileUpload`, `TableCell`)
- `--type=TYPE` - Component type (`form`, `interactive`, `compound`, `basic`)
- `--variants=LIST` - Variants (`primary,secondary,outline,destructive`)
- `--sub-of=PARENT` - Parent component for sub-components
- `--props=LIST` - Properties (`variant:string,size:string,disabled:bool`)
- `--interactive` - Generate Alpine.js JavaScript component
- `--theme-colors` - Include full theme color system integration
- `--accessibility` - Add comprehensive ARIA and keyboard support
- `--responsive` - Generate responsive configurations
- `--bundle` - Update strata.js bundle registration

## Component Analysis

Let me analyze the component name and determine the comprehensive structure:

```javascript
const componentName = '$1';
const args = '$ARGUMENTS';

// Component type detection
const isFormComponent = /--type=form|form/i.test(args) || 
    ['input', 'select', 'textarea', 'checkbox', 'radio', 'toggle', 'datepicker', 'editor', 'fileupload', 'colorpicker', 'rating'].includes(componentName.toLowerCase());

const isInteractive = /--type=interactive|--interactive/i.test(args) ||
    ['modal', 'carousel', 'dropdown', 'accordion', 'tabs', 'sidebar', 'calendar', 'editor', 'colorpicker'].includes(componentName.toLowerCase());

const isSubComponent = /--sub-of=/i.test(args);
const parentComponent = isSubComponent ? 
    args.match(/--sub-of=([\w]+)/i)?.[1] : '';

// Feature flags
const hasVariants = /--variants=/i.test(args);
const variants = hasVariants ? 
    args.match(/--variants=([\w,]+)/i)?.[1]?.split(',') : ['primary'];

const needsThemeColors = /--theme-colors/i.test(args) || hasVariants;
const needsAccessibility = /--accessibility/i.test(args) || isInteractive;
const needsResponsive = /--responsive/i.test(args);
const needsBundle = /--bundle/i.test(args) || isInteractive;

const customProps = args.match(/--props=([\w:,]+)/i)?.[1];
```

Based on the component name **`$1`** and arguments **`$ARGUMENTS`**:

- **Component Type:** {{ isFormComponent ? 'Form Component' : (isInteractive ? 'Interactive Component' : (isSubComponent ? 'Sub-component' : 'Basic Component')) }}
- **Namespace:** `Strata\UI\View\Components{{ isFormComponent ? '\Form' : '' }}`
- **Parent:** {{ isSubComponent ? parentComponent : 'None' }}
- **Variants:** {{ variants.join(', ') }}
- **Interactive:** {{ isInteractive ? 'Yes (Alpine.js + JavaScript)' : 'No (Static)' }}
- **Theme Integration:** {{ needsThemeColors ? 'Full OKLCH system' : 'Basic colors' }}
- **Accessibility:** {{ needsAccessibility ? 'ARIA + Keyboard navigation' : 'Basic' }}
- **Responsive:** {{ needsResponsive ? 'Container queries + breakpoints' : 'Single size' }}

## Creating Comprehensive Component Files

I'll create a complete component system following your sophisticated Strata UI architecture:

### 1. PHP Component Class
**Location:** `packages/strata-ui/src/View/Components/{{ isFormComponent ? 'Form/' : '' }}$1.php`
- Comprehensive constructor with all variant options
- Theme color integration methods
- Alpine.js state management methods
- Accessibility helper methods
- Responsive configuration methods

### 2. Blade Template with Advanced Integration
**Location:** `packages/strata-ui/resources/views/components/{{ isFormComponent ? 'form/' : '' }}{{ componentName.toLowerCase().replace(/([A-Z])/g, '-$1').substring(1) }}.blade.php`
- Complex `@php` blocks for responsive class calculations
- Full Alpine.js integration with `x-data`, `x-init`, event handling
- OKLCH theme color system integration
- Accessibility attributes and ARIA support
- Container queries and responsive design
- Performance-optimized CSS with `@once` directive
- **Data attributes for customization** - `data-strata-{component}="{part}"` attributes for precise CSS targeting

### 3. Alpine.js JavaScript Component (if interactive)
**Location:** `packages/strata-ui/resources/js/components/Base$1.js`
- Complete Alpine.js component with lifecycle management
- Event system integration and cleanup patterns
- ResizeObserver and performance optimizations
- Accessibility features and keyboard navigation
- State management and reactive properties

### 4. Bundle Registration (if interactive)
**Updates:** `packages/strata-ui/resources/js/strata.js`
- Import and register Alpine.js component
- Add to global Strata API
- Include magic helper methods

Let me create these files now following your exact patterns from Modal, Carousel, Button, and other sophisticated Strata UI components.

Now I'll generate the complete component system:

### 1. Creating PHP Component Class

```php
<?php

declare(strict_types=1);

namespace Strata\UI\View\Components{{ isFormComponent ? '\Form' : '' }};

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * $1 component for Strata UI.
 * 
 * {{ isInteractive ? 'Interactive component with Alpine.js integration.' : 'Static component with theme integration.' }}
 * {{ needsAccessibility ? 'Includes comprehensive accessibility features.' : '' }}
 */
class $1 extends Component
{
    public function __construct(
        public string $variant = '{{ variants[0] }}',
        {{ needsResponsive ? 'public string $size = "md",' : '' }}
        {{ needsAccessibility ? 'public ?string $ariaLabel = null,' : '' }}
        {{ isInteractive ? 'public ?string $name = null,' : '' }}
        {{ customProps ? customProps.split(',').map(prop => {
            const [name, type] = prop.split(':');
            return `public ${type || 'string'} $${name} = ${type === 'bool' ? 'false' : (type === 'int' ? '0' : '""')},`;
        }).join('\n        ') : '' }}
    ) {
        {{ isInteractive ? '$this->name = $this->name ?? uniqid("' + componentName.toLowerCase() + '-");' : '' }}
    }

    public function render(): View
    {
        return view('strata::components.{{ isFormComponent ? 'form.' : '' }}{{ componentName.toLowerCase().replace(/([A-Z])/g, '-$1').substring(1) }}');
    }

    {{ isInteractive ? `/**
     * Get configuration for Alpine.js component.
     */
    public function getAlpineConfig(): array
    {
        return [
            'name' => $this->name,
            'variant' => $this->variant,
            ${needsResponsive ? "'size' => \$this->size," : ''}
        ];
    }` : '' }}
}
```

### 2. Creating Advanced Blade Template

```blade
@props([])

@php
    {{ isInteractive ? '$config = $getAlpineConfig();' : '' }}
    {{ needsAccessibility ? '$componentId = $name ?? uniqid("' + componentName.toLowerCase() + '-");' : '' }}
    
    // Advanced class calculations with theme integration
    $baseClasses = [
        'inline-flex items-center justify-center',
        'font-medium transition-all duration-200',
        'focus-visible:outline-hidden focus-visible:ring-2 focus-visible:ring-ring',
        'disabled:pointer-events-none disabled:opacity-50'
    ];
    
    {{ needsThemeColors ? '$variantClasses = $getVariantClasses();' : '$variantClasses = "bg-primary text-primary-foreground";' }}
    {{ needsResponsive ? '$sizeClasses = $getSizeClasses();' : '$sizeClasses = "px-4 py-2";' }}
    
    $allClasses = implode(' ', array_filter([$baseClasses, $variantClasses, $sizeClasses]));
@endphp

<{{ isInteractive ? 'div' : 'button' }}
    {{ isInteractive ? 'x-data="strata' + componentName + '(@js($config))"' : '' }}
    {{ isInteractive ? 'x-init="init()"' : '' }}
    {{ needsAccessibility ? ':id="$componentId"' : '' }}
    {{ needsAccessibility ? 'role="' + (componentName.toLowerCase().includes('button') ? 'button' : 'generic') + '"' : '' }}
    {{ needsAccessibility && isInteractive ? ':aria-label="$ariaLabel"' : '' }}
    data-strata-{{ componentName.toLowerCase() }}="root"
    {{ $attributes->merge([
        'class' => $allClasses
    ]) }}
>
    <div data-strata-{{ componentName.toLowerCase() }}="content">
        {{ $slot }}
    </div>
</{{ isInteractive ? 'div' : 'button' }}>

{{ needsThemeColors && isInteractive ? `@once
<style>
/* ${componentName} theme integration */
.${componentName.toLowerCase()}-container {
    --component-radius: var(--radius);
    --component-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
}

/* Dark mode support */
.dark .${componentName.toLowerCase()}-container {
    --component-shadow: 0 1px 2px 0 rgb(255 255 255 / 0.05);
}

${needsResponsive ? `/* Container queries for responsive behavior */
@container (min-width: 640px) {
    .${componentName.toLowerCase()}-responsive {
        /* Responsive adjustments */
    }
}` : ''}
</style>
@endonce` : '' }}
```

{{ isInteractive ? `### 3. Creating Alpine.js Component

\`\`\`javascript
/**
 * ${componentName} Component for Strata UI
 * 
 * ${needsAccessibility ? 'Includes comprehensive accessibility features.' : 'Interactive component with state management.'}
 */

import { createBaseComponent, extendComponent } from './BaseComponent.js';
${needsAccessibility ? "import { createFocusTrap, storeFocus } from '../utilities/focus.js';" : ''}
import { dispatchGlobalEvent, addEventListener, EVENTS } from '../utilities/events.js';

/**
 * Create ${componentName} component
 */
export function create${componentName}Component(config = {}) {
    const baseComponent = createBaseComponent({
        ...config,
        componentName: 'strata-${componentName.toLowerCase()}'
    });
    
    return extendComponent(baseComponent, {
        // Component state
        name: config.name || null,
        variant: config.variant || '${variants[0]}',
        ${needsResponsive ? 'size: config.size || "md",' : ''}
        
        // Internal state
        _initialized: false,
        ${needsAccessibility ? '_focusTrap: null,' : ''}
        
        /**
         * Initialize component
         */
        init() {
            if (this._initialized) return;
            
            this.setupEventListeners();
            ${needsAccessibility ? 'this.setupAccessibility();' : ''}
            
            this._initialized = true;
            
            this.dispatchComponentEvent(EVENTS.${componentName.toUpperCase()}_READY);
        },
        
        /**
         * Setup event listeners
         */
        setupEventListeners() {
            // Component-specific event handling
            const cleanup = addEventListener(this.\$el, 'click', (e) => {
                this.handleClick(e);
            });
            
            this.addCleanup(cleanup);
        },
        
        ${needsAccessibility ? `/**
         * Setup accessibility features
         */
        setupAccessibility() {
            // Keyboard navigation
            const keyCleanup = addEventListener(this.\$el, 'keydown', (e) => {
                this.handleKeydown(e);
            });
            
            this.addCleanup(keyCleanup);
        },` : ''}
        
        /**
         * Handle click events
         */
        handleClick(event) {
            this.dispatchComponentEvent(EVENTS.${componentName.toUpperCase()}_CLICK, {
                variant: this.variant,
                ${needsResponsive ? 'size: this.size,' : ''}
                originalEvent: event
            });
        },
        
        ${needsAccessibility ? `/**
         * Handle keyboard events
         */
        handleKeydown(event) {
            switch (event.key) {
                case 'Enter':
                case ' ':
                    event.preventDefault();
                    this.handleClick(event);
                    break;
            }
        },` : ''}
        
        /**
         * Component cleanup
         */
        destroy() {
            ${needsAccessibility ? 'if (this._focusTrap) this._focusTrap();' : ''}
            this._initialized = false;
        }
    });
}

export default {
    create${componentName}Component
};
\`\`\`

### 4. Bundle Registration Update

\`\`\`javascript
// Add to packages/strata-ui/resources/js/strata.js
import { create${componentName}Component } from './components/Base${componentName}.js';

// In registerStrataComponents function:
registerAlpineComponent(Alpine, 'strata${componentName}', (config) => {
    return create${componentName}Component(config);
});
\`\`\`` : '' }}

## 🎉 Component Generation Complete!

Your comprehensive **$1** component has been generated with:

✅ **PHP Class** - Full variant and theme integration  
✅ **Blade Template** - Advanced Alpine.js integration and accessibility  
{{ isInteractive ? '✅ **JavaScript Component** - Complete Alpine.js lifecycle management  
✅ **Bundle Registration** - Auto-registered in strata.js' : '' }}  
✅ **Theme Integration** - OKLCH color system and CSS custom properties  
✅ **Data Attributes** - Customization hooks with `data-strata-{component}="{part}"` attributes  
{{ needsAccessibility ? '✅ **Accessibility** - ARIA attributes and keyboard navigation' : '' }}  
{{ needsResponsive ? '✅ **Responsive** - Container queries and breakpoint management' : '' }}

### Next Steps:

1. {{ isInteractive ? '**Update strata.js** - Add the import and registration code' : '**Test the component** - Use it in your Blade templates' }}
2. **Run build process** - Execute `npm run build` to compile assets
3. **Create tests** - Add comprehensive component tests
4. **Add documentation** - Document component usage and API

### Usage Example:

```blade
<x-strata::{{ isFormComponent ? 'form.' : '' }}{{ componentName.toLowerCase().replace(/([A-Z])/g, '-$1').substring(1) }}
    variant="{{ variants[0] }}"
    {{ needsResponsive ? 'size="md"' : '' }}
    {{ needsAccessibility ? 'aria-label="' + componentName + ' component"' : '' }}
    {{ isInteractive ? 'name="my-' + componentName.toLowerCase() + '"' : '' }}
>
    {{ componentName }} Content
</x-strata::{{ isFormComponent ? 'form.' : '' }}{{ componentName.toLowerCase().replace(/([A-Z])/g, '-$1').substring(1) }}>
```

Your component now matches the sophisticated architecture of Modal, Carousel, and other advanced Strata UI components! 🚀