# Accordion Component

A flexible accordion component for creating collapsible content sections with multiple variants and smooth animations.

## Features

- **Progressive Enhancement**: Built on semantic HTML `<details>/<summary>` elements
- **Single & Multiple Selection**: Support for single or multiple open items
- **Smooth Animations**: CSS transitions with Alpine.js collapse integration
- **Accessibility**: Full keyboard navigation and screen reader support
- **Multiple Variants**: Default, bordered, flush, and filled styles
- **Responsive**: Works seamlessly across all device sizes
- **Alpine.js Integration**: Enhanced functionality without breaking native behavior
- **Livewire Compatibility**: Full support for wire:model binding

## Basic Usage

### Simple Accordion

```blade
<x-strata::accordion>
    <x-strata::accordion.item value="item-1" title="What is Strata UI?">
        Strata UI is a comprehensive design system built for Laravel applications.
    </x-strata::accordion.item>
    
    <x-strata::accordion.item value="item-2" title="How do I install it?">
        You can install Strata UI via Composer and follow our installation guide.
    </x-strata::accordion.item>
</x-strata::accordion>
```

### Pre-opened Item

```blade
<x-strata::accordion type="single" defaultValue="faq-1">
    <x-strata::accordion.item value="faq-1" title="Frequently Asked Question">
        This item will be open by default.
    </x-strata::accordion.item>
    
    <x-strata::accordion.item value="faq-2" title="Another Question">
        This item will be closed by default.
    </x-strata::accordion.item>
</x-strata::accordion>
```

## Configuration Options

### Accordion Container Properties

| Property | Type | Default | Description |
|----------|------|---------|-------------|
| `type` | string | `single` | Selection mode: `single` or `multiple` |
| `variant` | string | `default` | Visual style: `default`, `bordered`, `flush`, `filled` |
| `size` | string | `md` | Size variant: `sm`, `md`, `lg` |
| `defaultValue` | string\|array | `null` | Initially opened item(s) |
| `animated` | boolean | `true` | Enable smooth animations |
| `iconPosition` | string | `end` | Toggle icon position: `start` or `end` |
| `disabled` | boolean | `false` | Disable entire accordion |

### Accordion Item Properties

| Property | Type | Default | Description |
|----------|------|---------|-------------|
| `value` | string | required | Unique identifier for the item |
| `title` | string | `''` | The accordion header text |
| `disabled` | boolean | `false` | Disable this specific item |
| `icon` | string | `null` | Optional icon name |

## Variants

### Default Variant
Clean, minimal design with bottom borders.

```blade
<x-strata::accordion variant="default">
    <x-strata::accordion.item value="item-1" title="Default Style">
        Content with clean, minimal borders.
    </x-strata::accordion.item>
</x-strata::accordion>
```

### Bordered Variant
Enclosed in a rounded border container.

```blade
<x-strata::accordion variant="bordered">
    <x-strata::accordion.item value="item-1" title="Bordered Style">
        Content within a bordered container.
    </x-strata::accordion.item>
</x-strata::accordion>
```

### Flush Variant
No borders, completely minimal appearance.

```blade
<x-strata::accordion variant="flush">
    <x-strata::accordion.item value="item-1" title="Flush Style">
        Content with no visible borders.
    </x-strata::accordion.item>
</x-strata::accordion>
```

### Filled Variant
Background-filled design with rounded corners.

```blade
<x-strata::accordion variant="filled">
    <x-strata::accordion.item value="item-1" title="Filled Style">
        Content with background fill styling.
    </x-strata::accordion.item>
</x-strata::accordion>
```

## Selection Types

### Single Selection (Default)
Only one item can be open at a time.

```blade
<x-strata::accordion type="single" defaultValue="section-1">
    <x-strata::accordion.item value="section-1" title="Section 1">
        Only one section can be open at a time.
    </x-strata::accordion.item>
    
    <x-strata::accordion.item value="section-2" title="Section 2">
        Opening this will close the previous section.
    </x-strata::accordion.item>
</x-strata::accordion>
```

### Multiple Selection
Multiple items can be open simultaneously.

```blade
<x-strata::accordion type="multiple" :defaultValue="['faq-1', 'faq-3']">
    <x-strata::accordion.item value="faq-1" title="FAQ 1">
        Multiple items can be open at the same time.
    </x-strata::accordion.item>
    
    <x-strata::accordion.item value="faq-2" title="FAQ 2">
        This provides more flexibility for users.
    </x-strata::accordion.item>
    
    <x-strata::accordion.item value="faq-3" title="FAQ 3">
        Great for FAQ sections or feature lists.
    </x-strata::accordion.item>
</x-strata::accordion>
```

## Sizes

### Small Size
Compact spacing for dense layouts.

```blade
<x-strata::accordion size="sm">
    <x-strata::accordion.item value="small-1" title="Small Accordion">
        Compact size for dense layouts.
    </x-strata::accordion.item>
</x-strata::accordion>
```

### Medium Size (Default)
Standard spacing for most use cases.

```blade
<x-strata::accordion size="md">
    <x-strata::accordion.item value="medium-1" title="Medium Accordion">
        Default size for most applications.
    </x-strata::accordion.item>
</x-strata::accordion>
```

### Large Size
Generous spacing for prominent sections.

```blade
<x-strata::accordion size="lg">
    <x-strata::accordion.item value="large-1" title="Large Accordion">
        Large size for prominent sections.
    </x-strata::accordion.item>
</x-strata::accordion>
```

## Advanced Features

### Custom Trigger Slot
Override the default trigger layout.

```blade
<x-strata::accordion>
    <x-strata::accordion.item value="custom-1">
        <x-slot name="trigger">
            <div class="flex items-center space-x-3">
                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                <span class="font-semibold">Custom Trigger Design</span>
                <span class="text-sm text-muted-foreground ml-auto">Click to expand</span>
            </div>
        </x-slot>
        
        Content with a completely custom trigger design.
    </x-strata::accordion.item>
</x-strata::accordion>
```

### Icon Positioning
Control where the toggle icon appears.

```blade
<!-- Icon at the end (default) -->
<x-strata::accordion iconPosition="end">
    <x-strata::accordion.item value="end-icon" title="Icon at End">
        Toggle icon appears on the right side.
    </x-strata::accordion.item>
</x-strata::accordion>

<!-- Icon at the start -->
<x-strata::accordion iconPosition="start">
    <x-strata::accordion.item value="start-icon" title="Icon at Start">
        Toggle icon appears on the left side.
    </x-strata::accordion.item>
</x-strata::accordion>
```

### Disabled States

```blade
<x-strata::accordion>
    <x-strata::accordion.item value="normal" title="Normal Item">
        This item functions normally.
    </x-strata::accordion.item>
    
    <x-strata::accordion.item value="disabled" title="Disabled Item" disabled>
        This item cannot be interacted with.
    </x-strata::accordion.item>
</x-strata::accordion>

<!-- Disable entire accordion -->
<x-strata::accordion disabled>
    <x-strata::accordion.item value="all-disabled" title="All Disabled">
        Entire accordion is disabled.
    </x-strata::accordion.item>
</x-strata::accordion>
```

### Animation Control

```blade
<!-- Disable animations -->
<x-strata::accordion :animated="false">
    <x-strata::accordion.item value="no-animation" title="No Animation">
        Changes happen instantly without transitions.
    </x-strata::accordion.item>
</x-strata::accordion>

<!-- Enable animations (default) -->
<x-strata::accordion :animated="true">
    <x-strata::accordion.item value="with-animation" title="With Animation">
        Smooth transitions for a polished experience.
    </x-strata::accordion.item>
</x-strata::accordion>
```

## Livewire Integration

### Wire Model Binding
Sync accordion state with Livewire properties.

```blade
<!-- In your Livewire component -->
<x-strata::accordion 
    type="multiple" 
    wire:model="openAccordionItems"
>
    <x-strata::accordion.item value="sync-1" title="Synced Item 1">
        This accordion state is synced with Livewire.
    </x-strata::accordion.item>
    
    <x-strata::accordion.item value="sync-2" title="Synced Item 2">
        Changes are automatically reflected in your component.
    </x-strata::accordion.item>
</x-strata::accordion>
```

```php
// In your Livewire component class
class AccordionExample extends Component
{
    public array $openAccordionItems = ['sync-1'];
    
    public function render()
    {
        return view('livewire.accordion-example');
    }
}
```

## Styling and Customization

### CSS Classes
The accordion uses these CSS classes for styling:

- `.accordion` - Main container
- `.accordion-item` - Individual accordion item
- `.accordion-item-content` - Content wrapper
- `.accordion-content-inner` - Inner content container
- `.accordion-toggle-icon` - Toggle chevron icon

### Custom Styling
Override default styles using Tailwind classes:

```blade
<x-strata::accordion class="max-w-4xl mx-auto bg-white shadow-lg rounded-xl">
    <x-strata::accordion.item 
        value="custom-style" 
        title="Custom Styled Item"
        class="border-l-4 border-blue-500"
    >
        <div class="bg-blue-50 p-4 rounded">
            Content with custom background styling.
        </div>
    </x-strata::accordion.item>
</x-strata::accordion>
```

## Accessibility

The accordion component follows accessibility best practices:

- **Semantic HTML**: Built on native `<details>/<summary>` elements
- **ARIA Attributes**: Proper `aria-expanded`, `aria-controls`, and `aria-labelledby`
- **Keyboard Navigation**: Full keyboard support with Arrow keys, Home, End, Enter, and Space
- **Screen Reader Support**: Announces state changes and provides context
- **Focus Management**: Visible focus indicators with underline styling
- **Reduced Motion**: Respects `prefers-reduced-motion` setting

### Keyboard Shortcuts

| Key | Action |
|-----|--------|
| `Enter` / `Space` | Toggle current item |
| `↓` | Move to next item |
| `↑` | Move to previous item |
| `Home` | Move to first item |
| `End` | Move to last item |

## Browser Support

The accordion component works in all modern browsers:

- Chrome 60+
- Firefox 55+
- Safari 12+
- Edge 79+

Progressive enhancement ensures basic functionality even without JavaScript.

## Examples in Practice

### FAQ Section

```blade
<div class="max-w-3xl mx-auto">
    <h2 class="text-2xl font-bold mb-6">Frequently Asked Questions</h2>
    
    <x-strata::accordion type="single" variant="bordered">
        <x-strata::accordion.item value="pricing" title="What are your pricing options?">
            <p class="mb-4">We offer flexible pricing plans to suit different needs:</p>
            <ul class="list-disc pl-6 space-y-2">
                <li>Starter Plan: $9/month</li>
                <li>Professional Plan: $29/month</li>
                <li>Enterprise Plan: Custom pricing</li>
            </ul>
        </x-strata::accordion.item>
        
        <x-strata::accordion.item value="support" title="How do I get support?">
            <p>You can reach our support team through:</p>
            <ul class="list-disc pl-6 mt-2 space-y-1">
                <li>Email: support@example.com</li>
                <li>Live Chat: Available 9 AM - 6 PM EST</li>
                <li>Documentation: Comprehensive guides and tutorials</li>
            </ul>
        </x-strata::accordion.item>
        
        <x-strata::accordion.item value="trial" title="Do you offer a free trial?">
            <p>Yes! We offer a 14-day free trial with full access to all features. No credit card required to start.</p>
        </x-strata::accordion.item>
    </x-strata::accordion>
</div>
```

### Feature Showcase

```blade
<div class="grid lg:grid-cols-2 gap-8">
    <div>
        <h3 class="text-xl font-semibold mb-4">Product Features</h3>
        
        <x-strata::accordion 
            type="multiple" 
            variant="filled" 
            size="sm"
            :defaultValue="['security', 'performance']"
        >
            <x-strata::accordion.item value="security" title="🔒 Enterprise Security">
                Advanced encryption, SSO integration, and compliance with industry standards.
            </x-strata::accordion.item>
            
            <x-strata::accordion.item value="performance" title="⚡ High Performance">
                Optimized for speed with global CDN and intelligent caching.
            </x-strata::accordion.item>
            
            <x-strata::accordion.item value="scalability" title="📈 Scalable Architecture">
                Grows with your business from startup to enterprise scale.
            </x-strata::accordion.item>
            
            <x-strata::accordion.item value="integrations" title="🔗 Rich Integrations">
                Connect with 100+ popular tools and services.
            </x-strata::accordion.item>
        </x-strata::accordion>
    </div>
    
    <div>
        <!-- Additional content -->
    </div>
</div>
```

### Settings Panel

```blade
<x-strata::accordion variant="flush" iconPosition="start">
    <x-strata::accordion.item value="account" title="Account Settings">
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium mb-1">Display Name</label>
                <input type="text" class="w-full border rounded px-3 py-2" value="John Doe">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" class="w-full border rounded px-3 py-2" value="john@example.com">
            </div>
        </div>
    </x-strata::accordion.item>
    
    <x-strata::accordion.item value="notifications" title="Notification Preferences">
        <div class="space-y-3">
            <label class="flex items-center">
                <input type="checkbox" class="mr-2" checked>
                Email notifications
            </label>
            <label class="flex items-center">
                <input type="checkbox" class="mr-2">
                Push notifications
            </label>
            <label class="flex items-center">
                <input type="checkbox" class="mr-2" checked>
                SMS notifications
            </label>
        </div>
    </x-strata::accordion.item>
    
    <x-strata::accordion.item value="privacy" title="Privacy Settings">
        <p class="text-sm text-muted-foreground mb-4">
            Control how your information is shared and used.
        </p>
        <!-- Privacy controls would go here -->
    </x-strata::accordion.item>
</x-strata::accordion>
```