# Carousel Component - Comprehensive Usage Guide

The Strata UI Carousel Component provides a modern, accessible, and responsive image/content slider built with CSS scroll-snap and Alpine.js. This guide covers all features, configuration options, troubleshooting, and best practices.

## Table of Contents

1. [Quick Start](#quick-start)
2. [Configuration Options](#configuration-options)
3. [Usage Examples](#usage-examples)
4. [Responsive Behavior](#responsive-behavior)
5. [Advanced Features](#advanced-features)
6. [CSS Container Query System](#css-container-query-system)
7. [Best Practices](#best-practices)
8. [Troubleshooting](#troubleshooting)
9. [Technical Architecture](#technical-architecture)

## Quick Start

### Basic Usage

```blade
<x-strata::carousel>
    <div class="p-8 bg-blue-100 rounded-lg">
        <h3 class="text-xl font-bold">Slide 1</h3>
        <p>Content for the first slide.</p>
    </div>
    <div class="p-8 bg-green-100 rounded-lg">
        <h3 class="text-xl font-bold">Slide 2</h3>
        <p>Content for the second slide.</p>
    </div>
    <div class="p-8 bg-yellow-100 rounded-lg">
        <h3 class="text-xl font-bold">Slide 3</h3>
        <p>Content for the third slide.</p>
    </div>
</x-strata::carousel>
```

### Multi-Item Carousel

```blade
<x-strata::carousel 
    :items-per-view="['default' => 1, 'md' => 2, 'lg' => 4]"
    gap="sm"
>
    @foreach($products as $product)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="font-bold">{{ $product->name }}</h3>
                <p class="text-gray-600">${{ $product->price }}</p>
            </div>
        </div>
    @endforeach
</x-strata::carousel>
```

## Configuration Options

### Complete Parameter Reference

| Parameter | Type | Default | Description |
|-----------|------|---------|-------------|
| `variant` | string | `'default'` | Visual style: `default`, `gallery`, `cards` |
| `size` | string | `'md'` | Carousel height: `sm`, `md`, `lg` |
| `autoplay` | bool | `false` | Enable automatic slide progression |
| `interval` | int | `3000` | Autoplay interval in milliseconds (1000-30000) |
| `loop` | bool | `true` | Enable infinite looping |
| `showArrows` | bool | `true` | Show navigation arrows |
| `showDots` | bool | `true` | Show dot navigation (auto-hidden for multi-item) |
| `itemsPerView` | array/int | `1` | Items visible per viewport (responsive) |
| `gap` | string | `'md'` | Gap between items: `sm`, `md`, `lg` |
| `snapAlign` | string | `'center'` | Snap alignment: `start`, `center`, `end` |
| `hideScrollbar` | bool | `true` | Hide the horizontal scrollbar |

### Items Per View Configuration

The `itemsPerView` parameter supports both simple and responsive configurations:

```blade
{{-- Simple: Show 3 items always --}}
<x-strata::carousel :items-per-view="3">

{{-- Responsive: Different breakpoints --}}
<x-strata::carousel :items-per-view="[
    'default' => 1,  // Mobile
    'sm' => 2,       // 640px+
    'md' => 3,       // 768px+
    'lg' => 4,       // 1024px+
    'xl' => 5        // 1280px+
]">
```

## Usage Examples

### Gallery Carousel

Perfect for image galleries with full-width display:

```blade
<x-strata::carousel 
    variant="gallery" 
    size="lg"
    :autoplay="true" 
    :interval="4000"
    snap-align="center"
>
    @foreach($gallery as $image)
        <div class="relative">
            <img 
                src="{{ $image->url }}" 
                alt="{{ $image->caption }}"
                class="w-full h-full object-cover rounded-lg"
            >
            @if($image->caption)
                <div class="absolute bottom-4 left-4 right-4 bg-black/50 text-white p-3 rounded">
                    {{ $image->caption }}
                </div>
            @endif
        </div>
    @endforeach
</x-strata::carousel>
```

### Product Cards Carousel

Ideal for showcasing products with responsive grid behavior:

```blade
<x-strata::carousel 
    variant="cards"
    :items-per-view="['default' => 1, 'md' => 2, 'lg' => 4]"
    gap="sm"
    :show-dots="false"
>
    @foreach($products as $product)
        <div class="group cursor-pointer">
            <div class="aspect-square overflow-hidden rounded-lg bg-gray-100">
                <img 
                    src="{{ $product->image }}" 
                    alt="{{ $product->name }}"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                >
            </div>
            <div class="mt-3">
                <h3 class="font-semibold text-sm">{{ $product->name }}</h3>
                <p class="text-gray-600 text-sm">${{ $product->price }}</p>
            </div>
        </div>
    @endforeach
</x-strata::carousel>
```

### Testimonials Carousel

Single-item display with autoplay and custom styling:

```blade
<x-strata::carousel 
    :autoplay="true" 
    :interval="6000"
    :show-arrows="false"
    size="lg"
>
    @foreach($testimonials as $testimonial)
        <div class="text-center px-8 py-12">
            <div class="max-w-2xl mx-auto">
                <blockquote class="text-xl italic text-gray-700 mb-6">
                    "{{ $testimonial->quote }}"
                </blockquote>
                <div class="flex items-center justify-center gap-4">
                    <img 
                        src="{{ $testimonial->author->avatar }}" 
                        alt="{{ $testimonial->author->name }}"
                        class="w-12 h-12 rounded-full object-cover"
                    >
                    <div>
                        <div class="font-semibold">{{ $testimonial->author->name }}</div>
                        <div class="text-gray-600 text-sm">{{ $testimonial->author->title }}</div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-strata::carousel>
```

### Custom Navigation

Using custom arrow and dot slots:

```blade
<x-strata::carousel :items-per-view="3" gap="lg">
    {{-- Slides --}}
    @foreach($items as $item)
        <div class="bg-white p-6 rounded-lg shadow">
            {{ $item->content }}
        </div>
    @endforeach
    
    {{-- Custom Arrows --}}
    <x-slot name="arrows">
        <div class="flex gap-2">
            <button 
                type="button"
                @click="previousSlide"
                class="px-4 py-2 bg-primary text-white rounded-md hover:bg-primary/90"
            >
                ← Previous
            </button>
            <button 
                type="button"
                @click="nextSlide" 
                class="px-4 py-2 bg-primary text-white rounded-md hover:bg-primary/90"
            >
                Next →
            </button>
        </div>
    </x-slot>
    
    {{-- Custom Dots --}}
    <x-slot name="dots">
        <div class="flex gap-2" x-data>
            <template x-for="(slide, index) in Array(totalSlides)" :key="index">
                <button
                    type="button"
                    @click="goToSlide(index)"
                    :class="currentSlide === index ? 'bg-primary' : 'bg-gray-300'"
                    class="w-3 h-3 rounded-full transition-colors"
                ></button>
            </template>
        </div>
    </x-slot>
</x-strata::carousel>
```

## Responsive Behavior

The carousel uses CSS container queries for precise responsive control:

### Breakpoint System

| Breakpoint | Min Width | Typical Use |
|------------|-----------|-------------|
| `default` | 0px | Mobile phones |
| `sm` | 640px | Large phones, small tablets |
| `md` | 768px | Tablets, small laptops |
| `lg` | 1024px | Laptops, desktops |
| `xl` | 1280px | Large desktops |

### Width Calculation

For multi-item carousels, widths are calculated using container queries:

```css
/* Example: 4 items with medium gap */
width: calc(100cqw / 4 - 1rem * 3 / 4);
```

This formula ensures:
- Each item takes 1/4 of the container width
- Gap space (1rem × 3 gaps) is distributed evenly
- Items never overflow or get clipped

## Advanced Features

### Autoplay Control

Autoplay automatically pauses on hover/focus and resumes on mouse leave:

```blade
<x-strata::carousel 
    :autoplay="true" 
    :interval="5000"
    wire:model="currentSlide"
>
    {{-- Slides --}}
</x-strata::carousel>
```

### Livewire Integration

Bind the current slide to a Livewire property:

```php
class CarouselDemo extends Component
{
    public int $currentSlide = 0;
    
    public function updatedCurrentSlide($value)
    {
        // React to slide changes
        $this->dispatch('slide-changed', slide: $value);
    }
}
```

```blade
<x-strata::carousel wire:model="currentSlide">
    {{-- Slides --}}
</x-strata::carousel>

<div wire:loading wire:target="currentSlide">
    Updating...
</div>
```

### Keyboard Navigation

Built-in keyboard support:
- `←` / `→` - Previous/Next slide  
- `Home` - First slide
- `End` - Last slide
- `Enter` / `Space` - Activate focused control

### Accessibility Features

- ARIA labels and roles
- Screen reader announcements
- Keyboard navigation
- Focus management
- Reduced motion support

## CSS Container Query System

The carousel uses modern CSS container queries for responsive behavior:

### How It Works

1. **Container Setup**: The scroll container has `container-type: inline-size`
2. **Width Variables**: CSS custom properties define item widths per breakpoint
3. **Query Rules**: `@container` rules apply widths based on container size
4. **Gap Handling**: Formula accounts for gap distribution between items

### CSS Architecture

```css
/* Container query support */
[data-carousel-id] [x-ref="scrollContainer"] {
    container-type: inline-size;
}

/* Base width */
[data-carousel-id] [x-ref="scrollContainer"] > * {
    width: var(--carousel-item-width, 100cqw) !important;
}

/* Responsive breakpoints */
@container (min-width: 1024px) {
    [data-carousel-id] [x-ref="scrollContainer"] > * {
        width: var(--carousel-item-width-lg, var(--carousel-item-width, 100cqw)) !important;
    }
}
```

### Why Container Queries?

- **Precise control**: Based on carousel width, not viewport
- **Component isolation**: Each carousel is independent
- **Reliable calculation**: No JavaScript width manipulation needed
- **Performance**: Pure CSS solution with minimal overhead

## Best Practices

### Content Guidelines

1. **Consistent aspect ratios** - Use uniform image/content dimensions
2. **Meaningful alt text** - Essential for screen readers
3. **Avoid text-only slides** - Consider visual elements for engagement
4. **Optimize images** - Use appropriate formats and sizes

### Performance Optimization

1. **Lazy loading** - Use `loading="lazy"` for images
2. **Image optimization** - WebP/AVIF formats when possible
3. **Limit slide count** - Consider pagination for large datasets
4. **Autoplay consideration** - May impact Core Web Vitals

### UX Considerations

1. **Provide clear navigation** - Users should understand how to interact
2. **Autoplay timing** - 5-7 seconds allows comfortable reading
3. **Pause on interaction** - Let users control their experience
4. **Mobile touch** - Scroll behavior works naturally on mobile

### CSS Specificity

**⚠️ Important**: The carousel uses `!important` in CSS to override utility classes. Be aware when styling carousel items:

```blade
{{-- ❌ This width will be overridden --}}
<div class="w-1/2">Content</div>

{{-- ✅ Use container-aware styling --}}
<div class="relative">
    <img class="w-full h-full object-cover">
</div>
```

## Troubleshooting

### Common Issues

**Items are partially clipped/cut off:**
- Verify container queries are supported (modern browsers)
- Check for CSS conflicts with utility classes
- Ensure gap values match your Tailwind configuration

**Navigation arrows always disabled:**
- Check Alpine.js is properly loaded
- Verify slides are being detected (check browser console)
- Ensure component initialization completed

**Autoplay not working:**
- Confirm `autoplay="true"` (boolean, not string)
- Check interval value is within 1000-30000ms range
- Verify no JavaScript errors in console

**Responsive behavior not working:**
- Container queries require modern browser support
- Check CSS custom properties are being set
- Verify breakpoint configuration syntax

**Items have wrong width:**
- Container query selectors must match HTML structure
- Check CSS specificity and `!important` rules
- Verify gap calculations in `calculateItemWidth()`

### Debug Information

Add this to your Blade template for debugging:

```blade
<div x-data x-init="
    console.log('Carousel Debug:', {
        totalSlides: totalSlides,
        currentSlide: currentSlide,
        itemsPerView: @js($carouselConfig['itemsPerView']),
        containerWidth: $refs.scrollContainer?.clientWidth
    })
"></div>
```

### Browser Support

**Container Queries**: Chrome 105+, Firefox 110+, Safari 16+
**Fallback**: Items will display at full width in older browsers
**Progressive Enhancement**: Basic carousel functionality works everywhere

### CSS Inspection

Use browser dev tools to inspect:
1. Container query status in Elements panel
2. CSS custom property values
3. Computed styles for carousel items
4. Container size and breakpoint matches

## Technical Architecture

### Component Structure

```
Carousel Component
├── PHP Class (Carousel.php)
│   ├── Configuration validation
│   ├── CSS class generation  
│   ├── Width calculation logic
│   └── Public API methods
├── Blade Template (carousel.blade.php)
│   ├── HTML structure
│   ├── Alpine.js integration
│   ├── Event handlers
│   └── CSS styles (@once)
└── JavaScript Component (BaseCarousel.js)
    ├── State management
    ├── Navigation logic
    ├── Autoplay functionality
    └── Event dispatching
```

### Key Technologies

- **CSS Scroll Snap**: Native smooth scrolling
- **CSS Container Queries**: Responsive item sizing
- **Alpine.js**: Reactive state and interactions  
- **CSS Custom Properties**: Dynamic width calculation
- **Flexbox**: Layout and gap management

### Event System

The carousel dispatches these events:
- `carousel-change` - Slide changed
- `carousel-autoplay-start/stop/pause/resume` - Autoplay state
- `strata-component-ready` - Initialization complete

Listen for events in your Alpine.js components:

```blade
<div x-data @carousel-change="handleSlideChange($event.detail)">
    <!-- Your content -->
</div>
```

---

## Advanced Integration Examples

### E-commerce Product Showcase

```blade
<x-strata::carousel 
    variant="cards"
    :items-per-view="['default' => 1, 'sm' => 2, 'lg' => 4]"
    gap="sm"
>
    @foreach($products as $product)
        <div class="group relative bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
            <div class="aspect-square overflow-hidden rounded-t-lg bg-gray-100">
                <img 
                    src="{{ $product->image }}" 
                    alt="{{ $product->name }}"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                    loading="lazy"
                >
            </div>
            <div class="p-4">
                <h3 class="font-semibold text-gray-900 mb-1">{{ $product->name }}</h3>
                <p class="text-gray-600 text-sm mb-2">{{ Str::limit($product->description, 60) }}</p>
                <div class="flex items-center justify-between">
                    <span class="text-lg font-bold text-gray-900">${{ $product->price }}</span>
                    <button class="px-3 py-1 bg-primary text-white text-sm rounded hover:bg-primary/90">
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>
    @endforeach
</x-strata::carousel>
```

This documentation provides complete coverage of the carousel component's capabilities, from basic usage to advanced customization. For additional help or specific use cases not covered here, consult the component source code or create an issue in the project repository.