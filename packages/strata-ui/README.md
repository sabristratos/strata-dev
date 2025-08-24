# Strata UI

A zero-config UI component library for Laravel with CSS variables and Tailwind CSS v4.

## Features

- **Zero Configuration** - Components work immediately after package installation
- **Semantic Typography** - Natural HTML elements with automatic styling
- **Tailwind-Integrated Colors** - All colors reference Tailwind CSS v4's built-in palette
- **Simplified Color System** - Primary (slate), accent (blue), and semantic colors (red, green, yellow, sky)
- **Global Design Tokens** - CSS variables for consistent theming across all components
- **Tailwind CSS v4** - Built on the latest Tailwind CSS with native CSS variable support
- **Livewire Ready** - Full compatibility with Livewire directives and Alpine.js
- **Icon Integration** - Seamless integration with Blade Icons (Heroicons included)
- **Smart Interactive Components** - Intelligent hover states and fallback handling
- **Automatic Image Fallbacks** - Avatars gracefully handle broken images with icon fallbacks
- **UX-Focused Design** - Hover effects only on truly interactive elements
- **Dark Mode Support** - Automatic dark mode through CSS variable overrides
- **Flexible Theming** - Global radius, color, spacing, and typography control

## Key Improvements

### Smart Interactive Behavior
Only interactive elements show hover effects, preventing user confusion:

```blade
{{-- Non-clickable row: no hover effects --}}
<x-strata::table.row>
    <x-strata::table.cell>Static content</x-strata::table.cell>
</x-strata::table.row>

{{-- Clickable row: hover effects and pointer cursor --}}
<x-strata::table.row clickable>
    <x-strata::table.cell>Interactive content</x-strata::table.cell>
</x-strata::table.row>
```

### Automatic Image Fallbacks
Avatars gracefully handle broken images with Hero Icons fallbacks:

```blade
{{-- Automatically falls back to user icon if image fails --}}
<x-strata::avatar src="/potentially-broken-image.jpg" />
{{-- Always shows consistent user icon for default state --}}
<x-strata::avatar />
```

### Advanced Table Features
Professional table functionality with footers, sticky headers, and size-aware padding for complex data presentation.

### Consistent Visual Design
Unified border radius and styling across all table elements and properly rounded avatar images.

## Installation

Install the package via Composer:

```bash
composer require strata/ui
```

The package uses Laravel auto-discovery, so no manual registration is required.

### Publish Assets (Optional)

To customize the CSS theme variables:

```bash
php artisan vendor:publish --tag=strata-theme
```

This publishes the CSS theme file to `resources/css/strata-theme.css` where you can customize colors, radius, and other design tokens.

## Color System

### Core Colors

Strata UI uses Tailwind CSS v4's built-in color palette:

- **Primary**: Slate colors (`--color-slate-*`) for main UI elements
- **Accent**: Blue colors (`--color-blue-*`) for interactive elements
- **Semantic Colors**:
  - **Success**: Green (`--color-green-*`)
  - **Warning**: Yellow (`--color-yellow-*`)
  - **Destructive**: Red (`--color-red-*`)
  - **Info**: Sky (`--color-sky-*`)

### Utility Colors

- **Muted**: `var(--color-slate-400)` - Used for borders, disabled states, and subtle text
- **Surface**: `var(--color-white)` - Background for cards and panels
- **Body**: `var(--color-slate-50)` - Default background color
- **Light**: `var(--color-white)` - Text on dark backgrounds
- **Dark**: `var(--color-slate-900)` - Text on light backgrounds

### Border System

All form inputs and cards use `border-muted` by default for a subtle, consistent appearance. Additional border utilities:
- `border-primary`, `border-accent`, `border-destructive`, `border-success`, `border-warning`, `border-info`

## Usage

### Typography System

Strata includes a comprehensive typography system that styles standard HTML elements automatically.

#### Semantic HTML Approach

Write natural, semantic HTML instead of utility classes:

```html
<h1>Page Title</h1>
<h2>Section Heading</h2>
<p>Body paragraph with <strong>bold text</strong> and <a href="#">links</a>.</p>
<small>Auxiliary information</small>
<code>inline code</code>
<blockquote>Quoted text with accent border</blockquote>
```

#### Typography Hierarchy

- **h1** - Display heading (48px, bold, tight line-height)
- **h2** - Section heading (36px, bold)
- **h3** - Subsection heading (30px, semibold)
- **h4** - Component heading (24px, semibold)
- **h5** - Minor heading (20px, medium)
- **h6** - Label heading (18px, medium)
- **p** - Body text (16px, secondary color, relaxed line-height)
- **small** - Auxiliary text (14px, muted color)

#### Dark Mode Support

All typography elements automatically support dark mode through CSS variables:

```html
<!-- Automatically adapts to dark mode -->
<h1>Dark Mode Ready Heading</h1>
<p>Body text that changes color based on theme</p>
<a href="#">Links adjust to dark backgrounds</a>
<code>Code blocks have proper contrast</code>
<small>Muted text maintains readability</small>
```

**Typography Colors:**
- **Light Mode**: Dark text on light backgrounds for optimal readability
- **Dark Mode**: Light text on dark backgrounds with proper contrast ratios
- **Semantic Colors**: Links, accents, and muted text adjust automatically
- **Code Elements**: Background and text colors optimize for both themes

#### Ultimate Flexibility

You can override any element with Tailwind classes when needed:

```html
<h1 class="text-sm font-normal">Small quiet heading</h1>
<p class="text-2xl font-bold">Large bold paragraph</p>
```

### Badge Component

#### Basic Usage

```blade
<x-strata::badge>Default Badge</x-strata::badge>
<x-strata::badge variant="outline">Outline Badge</x-strata::badge>
<x-strata::badge variant="soft">Soft Badge</x-strata::badge>
```

#### Colors

```blade
<x-strata::badge color="primary">Primary</x-strata::badge>
<x-strata::badge color="accent">Accent</x-strata::badge>
<x-strata::badge color="destructive">Destructive</x-strata::badge>
<x-strata::badge color="success">Success</x-strata::badge>
<x-strata::badge color="warning">Warning</x-strata::badge>
<x-strata::badge color="info">Info</x-strata::badge>
```

#### Variants

```blade
<x-strata::badge variant="solid" color="success">Completed</x-strata::badge>
<x-strata::badge variant="outline" color="warning">Pending</x-strata::badge>
<x-strata::badge variant="soft" color="info">Info</x-strata::badge>
```

#### Sizes

```blade
<x-strata::badge size="sm">Small</x-strata::badge>
<x-strata::badge size="md">Medium</x-strata::badge>
<x-strata::badge size="lg">Large</x-strata::badge>
```

#### Shapes

```blade
<!-- Pill shape (default) -->
<x-strata::badge>Pill Badge</x-strata::badge>

<!-- Square shape -->
<x-strata::badge shape="square">5</x-strata::badge>
<x-strata::badge shape="square" color="destructive">99+</x-strata::badge>
```

#### Icons

```blade
<x-strata::badge icon="heroicon-o-check-circle" color="success">Completed</x-strata::badge>
<x-strata::badge icon="heroicon-o-clock" color="warning">Pending</x-strata::badge>
<x-strata::badge icon="heroicon-o-x-circle" color="destructive">Failed</x-strata::badge>
```

#### Dismissible Badges

```blade
<x-strata::badge dismissible>Removable</x-strata::badge>
<x-strata::badge dismissible variant="outline" color="warning">Warning</x-strata::badge>
```

Dismissible badges use Alpine.js for smooth removal functionality. Clicking the dismiss button triggers a fade-out animation before hiding the badge. No additional JavaScript required.

#### Number Formatting (99+ Feature)

Numeric content over 99 automatically displays as "99+":

```blade
<x-strata::badge shape="square">5</x-strata::badge>   <!-- Shows "5" -->
<x-strata::badge shape="square">99</x-strata::badge>  <!-- Shows "99" -->
<x-strata::badge shape="square">150</x-strata::badge> <!-- Shows "99+" -->
<x-strata::badge shape="square">999</x-strata::badge> <!-- Shows "99+" -->
```

### Button Component

#### Basic Usage

```blade
<x-strata::button>Primary Button</x-strata::button>
<x-strata::button variant="accent">Accent Button</x-strata::button>
<x-strata::button variant="destructive">Delete</x-strata::button>
<x-strata::button variant="outline">Outline Button</x-strata::button>
<x-strata::button variant="ghost">Ghost Button</x-strata::button>
```

#### Sizes

```blade
<x-strata::button size="sm">Small</x-strata::button>
<x-strata::button size="md">Medium</x-strata::button>
<x-strata::button size="lg">Large</x-strata::button>
```

#### Icons

```blade
<!-- Icon + Text -->
<x-strata::button icon="heroicon-o-user">Profile</x-strata::button>
<x-strata::button icon="heroicon-o-arrow-right" icon-position="right">Continue</x-strata::button>

<!-- Icon Only -->
<x-strata::button icon="heroicon-o-cog-6-tooth" />
```

#### Loading States

```blade
<x-strata::button loading>Saving...</x-strata::button>
<x-strata::button :loading="$isProcessing" wire:click="process">
    Process Data
</x-strata::button>
```

#### Link Buttons

```blade
<x-strata::button href="/dashboard">Dashboard</x-strata::button>
<x-strata::button href="https://example.com" target="_blank">
    External Link
</x-strata::button>
```

#### Livewire Integration

```blade
<x-strata::button wire:click="save">Save</x-strata::button>
<x-strata::button type="submit" form="my-form">Submit</x-strata::button>
```

#### Buttons with Badges

Add badge overlays to buttons using the badge slot. Perfect for notification counts, status indicators, and call-to-action highlights:

```blade
<!-- Notification button with count -->
<x-strata::button icon="heroicon-o-bell">
    Notifications
    <x-slot:badge>
        <x-strata::badge color="destructive" shape="square">5</x-strata::badge>
    </x-slot:badge>
</x-strata::button>

<!-- Comment button with soft badge -->
<x-strata::button icon="heroicon-o-chat-bubble-left" variant="secondary">
    Comments
    <x-slot:badge>
        <x-strata::badge color="info" variant="soft">12</x-strata::badge>
    </x-slot:badge>
</x-strata::button>

<!-- Icon-only inbox with unread count -->
<x-strata::button icon="heroicon-o-inbox" size="lg">
    <x-slot:badge>
        <x-strata::badge color="destructive" shape="square">{{ $unreadCount }}</x-strata::badge>
    </x-slot:badge>
</x-strata::button>

<!-- Feature announcement -->
<x-strata::button variant="primary">
    Try New Feature
    <x-slot:badge>
        <x-strata::badge color="success" variant="soft" shape="pill" size="sm">NEW</x-strata::badge>
    </x-slot:badge>
</x-strata::button>

<!-- Custom badge content -->
<x-strata::button icon="heroicon-o-star">
    Favorites
    <x-slot:badge>
        <div class="bg-yellow-400 text-yellow-900 rounded-full w-3 h-3"></div>
    </x-slot:badge>
</x-strata::button>
```

**Badge Slot Features:**
- **Full Control**: Use any badge configuration or custom HTML content
- **Automatic Positioning**: Badge overlay positioned on top-right corner
- **Responsive**: Works with all button sizes (sm, md, lg) 
- **Z-index Management**: Badge appears above other elements
- **Composable Design**: Leverages existing badge component naturally
- **No Breaking Changes**: Existing buttons work exactly as before

**Common Use Cases:**
- Notification counters on bell icons
- Unread message counts on inbox buttons
- Comment counts on discussion buttons
- Status indicators (NEW, BETA, UPDATED)
- Shopping cart item counts
- Social media engagement metrics

### Alert Component

A flexible alert component for displaying notifications, messages, and status updates with beautiful animations and full accessibility support.

#### Basic Usage

```blade
<x-strata::alert>
    This is a basic info alert with default styling.
</x-strata::alert>

<x-strata::alert color="success">
    Success! Your action was completed.
</x-strata::alert>

<x-strata::alert color="warning">
    Warning: Please review your input.
</x-strata::alert>

<x-strata::alert color="destructive">
    Error: Unable to process your request.
</x-strata::alert>
```

#### Variants

```blade
<x-strata::alert variant="solid" color="info">Solid Alert</x-strata::alert>
<x-strata::alert variant="outline" color="success">Outline Alert</x-strata::alert>
<x-strata::alert variant="soft" color="warning">Soft Alert</x-strata::alert>
```

#### Colors

```blade
<x-strata::alert color="info">Info Alert</x-strata::alert>
<x-strata::alert color="success">Success Alert</x-strata::alert>
<x-strata::alert color="warning">Warning Alert</x-strata::alert>
<x-strata::alert color="destructive">Error Alert</x-strata::alert>
<x-strata::alert color="primary">Primary Alert</x-strata::alert>
<x-strata::alert color="secondary">Secondary Alert</x-strata::alert>
```

#### Sizes

```blade
<x-strata::alert size="sm">Small alert for compact spaces</x-strata::alert>
<x-strata::alert size="md">Medium alert - default size</x-strata::alert>
<x-strata::alert size="lg">Large alert for important messages</x-strata::alert>
```

#### Alerts with Titles

```blade
<x-strata::alert color="success" title="Success!">
    Your changes have been saved successfully.
</x-strata::alert>

<x-strata::alert color="warning" title="Please Review" variant="outline">
    There are items that need your attention.
</x-strata::alert>
```

#### Dismissible Alerts

```blade
<x-strata::alert dismissible>
    This alert can be dismissed by clicking the × button.
</x-strata::alert>

<x-strata::alert color="success" title="Welcome!" dismissible>
    Thanks for joining! Close this when ready.
</x-strata::alert>
```

#### Custom Icons

```blade
<x-strata::alert color="primary" icon="heroicon-o-light-bulb">
    Pro tip: You can specify custom icons for your alerts.
</x-strata::alert>

<x-strata::alert color="info" icon="heroicon-o-rocket-launch" title="New Feature">
    Check out our latest feature update.
</x-strata::alert>
```

#### Alerts with Actions

```blade
<x-strata::alert color="warning" title="Confirmation Required">
    This action cannot be undone. Are you sure you want to proceed?
    <x-slot:actions>
        <x-strata::button size="sm" variant="outline">Cancel</x-strata::button>
        <x-strata::button size="sm" color="warning">Confirm</x-strata::button>
    </x-slot:actions>
</x-strata::alert>
```

**Alert Features:**
- **Contextual Icons**: Automatic icon selection based on alert type
- **Beautiful Animations**: Smooth enter/exit transitions with Alpine.js
- **Full Accessibility**: Proper ARIA attributes, roles, and screen reader support
- **Dismissible Support**: Built-in close functionality using Button component
- **Action Slots**: Support for interactive buttons and custom actions
- **Flexible Content**: Simple text, title+description, or rich HTML content
- **Design Token Integration**: Uses CSS variables for consistent theming

### Card Component

A simple, flexible card component with clean styling and consistent spacing.

#### Basic Usage

```blade
<x-strata::card>
    <h4>Card Title</h4>
    <p>Card content goes here with automatic typography styling.</p>
</x-strata::card>
```

#### Sizes

```blade
<x-strata::card size="sm">
    <h5>Small Card</h5>
    <p>Compact card with reduced padding.</p>
</x-strata::card>

<x-strata::card size="md">
    <h4>Medium Card</h4>
    <p>Default size with standard padding.</p>
</x-strata::card>

<x-strata::card size="lg">
    <h3>Large Card</h3>
    <p>Spacious card with generous padding.</p>
</x-strata::card>
```

#### Border Variants

```blade
<!-- Default subtle border -->
<x-strata::card>Default Card</x-strata::card>

<!-- No border -->
<x-strata::card border="none">Clean Card</x-strata::card>

<!-- Colored borders -->
<x-strata::card border="primary">Primary Accent</x-strata::card>
<x-strata::card border="secondary">Secondary Accent</x-strata::card>
```

#### Combining with Other Components

```blade
<x-strata::card>
    <div class="flex items-center justify-between mb-4">
        <h4>User Profile</h4>
        <x-strata::badge color="success">Online</x-strata::badge>
    </div>
    <p class="mb-4">Cards work seamlessly with other Strata components.</p>
    <div class="flex gap-2">
        <x-strata::button size="sm">View Profile</x-strata::button>
        <x-strata::button variant="outline" size="sm">Message</x-strata::button>
    </div>
</x-strata::card>
```

**Card Features:**
- **Zero Shadows**: Clean, minimal design without drop shadows
- **Design Token Integration**: Uses CSS variables for consistent theming
- **Responsive**: Works perfectly on all screen sizes
- **Typography Ready**: Inherits semantic typography styling
- **Dark Mode**: Automatic light/dark theme support
- **Flexible**: Accepts any content through slot system

## Component Reference

### Badge Component Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `variant` | string | `'solid'` | Badge style variant (solid\|outline\|soft) |
| `color` | string | `'primary'` | Badge color (primary\|secondary\|destructive\|success\|warning\|info) |
| `size` | string | `'md'` | Badge size (sm\|md\|lg) |
| `shape` | string | `'pill'` | Badge shape (pill\|square) |
| `icon` | string | `null` | Icon name from Heroicons |
| `dismissible` | boolean | `false` | Show dismiss button |

### Button Component Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `variant` | string | `'primary'` | Button style variant (primary\|secondary\|destructive\|outline\|ghost) |
| `size` | string | `'md'` | Button size (sm\|md\|lg) |
| `type` | string | `'button'` | HTML button type |
| `disabled` | boolean | `false` | Disable the button |
| `loading` | boolean | `false` | Show loading spinner |
| `icon` | string | `null` | Icon name from Heroicons |
| `icon-position` | string | `'left'` | Icon position (left\|right) |
| `href` | string | `null` | If provided, renders as link |

### Button Component Slots

| Slot | Description |
|------|-------------|
| `badge` | Badge overlay positioned on top-right corner of button. Can contain any HTML content, typically used with `<x-strata::badge>` component |

**Badge Slot Example:**
```blade
<x-strata::button icon="heroicon-o-bell">
    Notifications
    <x-slot:badge>
        <x-strata::badge color="destructive" shape="square">5</x-strata::badge>
    </x-slot:badge>
</x-strata::button>
```

### Alert Component Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `variant` | string | `'solid'` | Alert style variant (solid\|outline\|soft) |
| `color` | string | `'info'` | Alert color (info\|success\|warning\|destructive\|primary\|secondary) |
| `size` | string | `'md'` | Alert size (sm\|md\|lg) |
| `icon` | string | `null` | Custom icon name from Heroicons (auto-selected if null) |
| `dismissible` | boolean | `false` | Show dismiss button |
| `title` | string | `null` | Optional alert title |

### Alert Component Slots

| Slot | Description |
|------|-------------|
| `actions` | Action buttons or interactive elements displayed below the alert content |

**Actions Slot Example:**
```blade
<x-strata::alert color="warning" title="Confirmation Required">
    This action cannot be undone.
    <x-slot:actions>
        <x-strata::button size="sm" variant="outline">Cancel</x-strata::button>
        <x-strata::button size="sm" color="warning">Confirm</x-strata::button>
    </x-slot:actions>
</x-strata::alert>
```

### Avatar Component

A flexible avatar component with image support, initials, status indicators, and various sizing options.

#### Basic Usage

```blade
<!-- Image avatars -->
<x-strata::avatar src="/path/to/image.jpg" alt="User Name" />

<!-- Initials avatars -->
<x-strata::avatar initials="JD" />
<x-strata::avatar initials="AB" size="lg" />

<!-- Default user icon -->
<x-strata::avatar />
```

#### Sizes

```blade
<x-strata::avatar src="/image.jpg" size="xs" />
<x-strata::avatar src="/image.jpg" size="sm" />
<x-strata::avatar src="/image.jpg" size="md" />
<x-strata::avatar src="/image.jpg" size="lg" />
<x-strata::avatar src="/image.jpg" size="xl" />
<x-strata::avatar src="/image.jpg" size="2xl" />
<x-strata::avatar src="/image.jpg" size="3xl" />
```

#### Shapes

```blade
<!-- Circle (default) -->
<x-strata::avatar initials="JS" />

<!-- Square -->
<x-strata::avatar initials="AB" shape="square" />

<!-- Rounded square -->
<x-strata::avatar initials="CD" shape="rounded" />
```

#### Status Indicators

```blade
<x-strata::avatar src="/user.jpg" status="online" />
<x-strata::avatar src="/user.jpg" status="away" />
<x-strata::avatar src="/user.jpg" status="busy" />
<x-strata::avatar src="/user.jpg" status="offline" />
```

#### Status Positioning

```blade
<x-strata::avatar 
    src="/user.jpg" 
    status="online" 
    status-position="bottom-right" />
<x-strata::avatar 
    src="/user.jpg" 
    status="away" 
    status-position="top-right" />
<x-strata::avatar 
    src="/user.jpg" 
    status="busy" 
    status-position="bottom-left" />
<x-strata::avatar 
    src="/user.jpg" 
    status="offline" 
    status-position="top-left" />
```

#### Borders and Custom Styling

```blade
<!-- With border -->
<x-strata::avatar src="/user.jpg" border />

<!-- Custom background colors -->
<x-strata::avatar 
    initials="+5" 
    class="bg-primary-100 text-primary-700" />

<!-- Avatar groups -->
<div class="flex -space-x-1">
    <x-strata::avatar src="/user1.jpg" size="sm" border />
    <x-strata::avatar src="/user2.jpg" size="sm" border />
    <x-strata::avatar src="/user3.jpg" size="sm" border />
    <x-strata::avatar initials="+5" size="sm" border 
                     class="bg-secondary-100 text-secondary-700" />
</div>
```

#### Broken Image Fallback

The avatar component automatically handles broken images by falling back to a user icon:

```blade
{{-- These will automatically show a user icon if the image fails to load --}}
<x-strata::avatar src="https://valid-image-url.jpg" />
<x-strata::avatar src="https://broken-image-url.jpg" />

{{-- Fallback behavior demonstration --}}
<div class="flex space-x-4">
    <div class="text-center">
        <x-strata::avatar src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e" />
        <p class="text-xs mt-1">Valid Image</p>
    </div>
    <div class="text-center">
        <x-strata::avatar src="https://invalid-url.jpg" />
        <p class="text-xs mt-1">Broken Image → Icon Fallback</p>
    </div>
    <div class="text-center">
        <x-strata::avatar initials="JS" />
        <p class="text-xs mt-1">Initials</p>
    </div>
    <div class="text-center">
        <x-strata::avatar />
        <p class="text-xs mt-1">Default Icon</p>
    </div>
</div>
```

**Avatar Features:**
- **Flexible Content**: Images, initials, or default user icon
- **Automatic Fallback**: Broken images automatically fall back to Hero Icons user icon
- **Smart Image Handling**: Proper border radius applied to images for all shapes
- **Status Indicators**: Online, away, busy, offline with configurable positioning
- **Shape Variants**: Circle, square, or rounded square
- **Size System**: 7 sizes from xs (24px) to 3xl (96px)
- **Border Support**: Optional ring borders for avatar groups
- **Icon Integration**: Uses Hero Icons for consistent iconography
- **Semantic Colors**: Uses the color system for consistent theming
- **Overflow Handling**: Smart overflow control based on status indicator presence

### Avatar Component Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `src` | string | `null` | Image source URL |
| `alt` | string | `null` | Image alt text |
| `initials` | string | `null` | Text initials to display |
| `size` | string | `'md'` | Avatar size (xs\|sm\|md\|lg\|xl\|2xl\|3xl) |
| `shape` | string | `'circle'` | Avatar shape (circle\|square\|rounded) |
| `status` | string | `'none'` | Status indicator (none\|online\|away\|busy\|offline) |
| `status-position` | string | `'bottom-right'` | Status position (top-left\|top-right\|bottom-left\|bottom-right) |
| `border` | boolean | `false` | Show border ring |

### Calendar Component

A powerful, flexible calendar component for date selection with range support, preset options, and customizable slots. Perfect for date pickers, booking interfaces, and date range selection.

#### Basic Usage

```blade
<!-- Simple date picker -->
<x-strata::calendar />

<!-- Date range picker -->
<x-strata::calendar :range="true" />

<!-- Single date only -->
<x-strata::calendar :range="false" />
```

#### Date Range Selection

```blade
<!-- Multiple months for better range selection -->
<x-strata::calendar :range="true" :multiple="true" :visible-months="2" />

<!-- With wire:model for Livewire -->
<x-strata::calendar wire:model="dateRange" :range="true" />

<!-- Bind to DateRange object -->
<x-strata::calendar :value="$dateRangeObject" :range="true" />
```

#### Preset Date Ranges

```blade
<!-- With common presets -->
<x-strata::calendar :presets="true" />

<!-- Custom presets -->
<x-strata::calendar :presets="[
    'Today' => [today(), today()],
    'This Week' => [now()->startOfWeek(), now()->endOfWeek()],
    'Custom Period' => ['2024-01-01', '2024-01-31']
]" />

<!-- No presets -->
<x-strata::calendar :presets="false" />
```

#### Date Validation

```blade
<!-- Restrict date selection -->
<x-strata::calendar 
    min-date="2024-01-01" 
    max-date="2024-12-31" 
/>

<!-- Disable specific dates -->
<x-strata::calendar 
    :disabled-dates="['2024-12-25', '2024-01-01']" 
/>

<!-- Combine restrictions -->
<x-strata::calendar 
    min-date="2024-01-01"
    max-date="2024-12-31" 
    :disabled-dates="['2024-07-04', '2024-11-11']"
/>
```

#### Interactive Features

```blade
<!-- Clear button for resetting -->
<x-strata::calendar :show-clear-button="true" />

<!-- Auto-close on selection (useful in dropdowns) -->
<x-strata::calendar :close-on-select="true" :range="false" />
```

#### Week Configuration

```blade
<!-- Start week on Monday -->
<x-strata::calendar week-start="monday" />

<!-- Start week on Sunday (default) -->
<x-strata::calendar week-start="sunday" />
```

#### Custom Day Content

```blade
<!-- Custom day cells with events -->
<x-strata::calendar>
    <x-slot:day>
        <!-- Day number appears automatically in top-left -->
        <template x-if="day.date % 7 === 0 && day.isCurrentMonth">
            <div class="absolute bottom-1 right-1 w-2 h-2 bg-red-500 rounded-full"></div>
        </template>
    </x-slot:day>
</x-strata::calendar>

<!-- Day cells with pricing -->
<x-strata::calendar>
    <x-slot:day>
        <div class="flex items-end justify-center pb-1">
            <template x-if="day.isCurrentMonth">
                <span class="text-xs font-bold text-green-600">$99</span>
            </template>
        </div>
    </x-slot:day>
</x-strata::calendar>
```

#### Custom Footer Content

```blade
<x-strata::calendar>
    <x-slot:footer>
        <div class="flex items-center justify-between">
            <div class="text-sm text-gray-600">
                <span x-show="startDate || endDate">
                    Selected: <span x-text="formatLocalDate(startDate)"></span>
                    <span x-show="endDate"> - <span x-text="formatLocalDate(endDate)"></span></span>
                </span>
                <span x-show="!startDate && !endDate">Select a date</span>
            </div>
            <div class="space-x-2">
                <x-strata::button size="sm" variant="outline">Cancel</x-strata::button>
                <x-strata::button size="sm">Apply</x-strata::button>
            </div>
        </div>
    </x-slot:footer>
</x-strata::calendar>
```

#### Localization

```blade
<!-- Custom locale -->
<x-strata::calendar locale="fr" />

<!-- Uses app locale by default -->
<x-strata::calendar />
```

**Calendar Features:**
- **Range Selection**: Single dates or date ranges with visual feedback
- **Preset Support**: Common date ranges (Today, This Week, Last 30 Days, etc.)
- **Date Validation**: Min/max dates and specific disabled dates
- **Custom Slots**: Day cells and footer for unlimited customization
- **Livewire Integration**: Full wire:model support with DateRange objects
- **Accessibility**: Keyboard navigation and screen reader support
- **Responsive Design**: Auto-adapts to container width (1-4 columns)
- **Alpine.js Powered**: Smooth interactions without page reloads
- **Timezone Aware**: Handles local dates correctly across timezones

### Calendar Component Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `value` | mixed | `null` | Initial value (DateRange object, array, or null) |
| `range` | boolean | `true` | Enable date range selection |
| `multiple` | boolean | `true` | Show multiple months side by side |
| `visible-months` | integer | `2` | Number of months to display when multiple=true |
| `week-start` | string | `'sunday'` | Week start day (sunday\|monday) |
| `presets` | boolean\|array | `true` | Show preset ranges or custom preset array |
| `locale` | string | `app.locale` | Locale for date formatting |
| `initial-date` | string | `null` | Initial calendar date (YYYY-MM-DD) |
| `min-date` | string | `null` | Minimum selectable date (YYYY-MM-DD) |
| `max-date` | string | `null` | Maximum selectable date (YYYY-MM-DD) |
| `disabled-dates` | array | `[]` | Array of disabled date strings |
| `show-clear-button` | boolean | `false` | Show clear button in footer |
| `close-on-select` | boolean | `false` | Auto-close on date selection |

### Calendar Component Slots

| Slot | Description |
|------|-------------|
| `day` | Custom content for calendar day cells. Day number appears automatically in top-left corner |
| `footer` | Custom footer content below the calendar grid |

### Form Components

A comprehensive form system with `<x-strata::form.*>` syntax, providing flexible input components, validation states, and semantic grouping. All components integrate seamlessly with Livewire and Alpine.js.

#### Form Group Foundation

The foundation component that provides consistent labeling, help text, and error handling for all form fields:

```blade
<!-- Basic form group -->
<x-strata::form.group label="Email Address" for="email">
    <x-strata::form.input id="email" name="email" type="email" />
</x-strata::form.group>

<!-- With help text -->
<x-strata::form.group 
    label="Password" 
    for="password"
    help-text="Must be at least 8 characters"
>
    <x-strata::form.input type="password" id="password" name="password" />
</x-strata::form.group>

<!-- With error state -->
<x-strata::form.group 
    label="Username" 
    for="username"
    error="This username is already taken"
>
    <x-strata::form.input id="username" name="username" />
</x-strata::form.group>
```

#### Toggle Component

A modern toggle switch component with smooth animations and proper accessibility:

```blade
<!-- Basic toggle -->
<x-strata::form.toggle name="notifications" />

<!-- With label -->
<x-strata::form.toggle 
    name="dark_mode" 
    label="Enable Dark Mode"
/>

<!-- With label and description -->
<x-strata::form.toggle 
    name="marketing_emails" 
    label="Marketing Emails"
    description="Receive updates about new features and promotions"
/>

<!-- With Livewire -->
<x-strata::form.toggle 
    name="auto_save" 
    label="Auto Save"
    wire:model="autoSave"
/>

<!-- Pre-checked -->
<x-strata::form.toggle 
    name="feature_flag" 
    label="Enable Feature"
    :checked="true"
    value="1"
/>
```

**Toggle Form Handling:**
When toggles are unchecked, they automatically submit "0" for reliable form processing:

```php
// In your Laravel controller
public function store(Request $request)
{
    // Toggle values are always present:
    // - Checked: "1" (or custom value)
    // - Unchecked: "0"
    $darkMode = $request->input('dark_mode'); // "1" or "0"
    $notifications = (bool) $request->input('notifications'); // true or false
    
    // Convert to boolean if needed
    $settings = [
        'dark_mode' => $darkMode === '1',
        'notifications' => $notifications === '1',
    ];
}
```

**Note:** Hidden field pattern is automatically applied to regular forms. For Livewire, wire:model handles state directly without hidden fields.

#### Input Component

A powerful input component with icons, clearable functionality, password toggles, and flexible slots:

```blade
<!-- Basic inputs -->
<x-strata::form.input name="name" placeholder="Enter your name" />
<x-strata::form.input type="email" name="email" placeholder="you@example.com" />

<!-- With icons -->
<x-strata::form.input 
    name="search" 
    icon="heroicon-o-magnifying-glass"
    placeholder="Search..." 
/>

<!-- Clearable input -->
<x-strata::form.input 
    name="query" 
    icon="heroicon-o-magnifying-glass"
    :clearable="true"
    placeholder="Clearable search..."
/>

<!-- Password with toggle -->
<x-strata::form.input 
    type="password" 
    name="password"
    placeholder="Enter password"
    :show-password-toggle="true"
/>

<!-- Input with leading/trailing slots -->
<x-strata::form.input name="amount" placeholder="0.00">
    <x-slot:leading>
        <span class="text-gray-500 text-sm">$</span>
    </x-slot:leading>
    <x-slot:trailing>
        <span class="text-gray-500 text-sm">USD</span>
    </x-slot:trailing>
</x-strata::form.input>

<!-- Livewire integration -->
<x-strata::form.input wire:model="searchTerm" :clearable="true" />
```

#### Textarea Component

Auto-resizing textarea with smooth interactions:

```blade
<!-- Basic textarea -->
<x-strata::form.textarea 
    name="message" 
    placeholder="Enter your message..."
    :rows="3"
/>

<!-- Auto-resize textarea -->
<x-strata::form.textarea 
    name="description" 
    placeholder="This will grow as you type..."
    :auto-resize="true"
/>

<!-- With Livewire -->
<x-strata::form.textarea 
    wire:model="content"
    :auto-resize="true" 
/>
```

#### Checkbox Component

Individual checkboxes with labels and descriptions:

```blade
<!-- Simple checkbox -->
<x-strata::form.checkbox 
    id="newsletter" 
    name="newsletter" 
    value="yes"
    label="Subscribe to newsletter" 
/>

<!-- Checkbox with description -->
<x-strata::form.checkbox 
    id="terms" 
    name="terms" 
    value="accepted"
    label="I agree to the Terms of Service"
    description="By checking this, you agree to our terms and conditions" 
/>

<!-- Checked by default -->
<x-strata::form.checkbox 
    id="notifications" 
    name="notifications[]" 
    value="email"
    label="Email notifications"
    :checked="true"
/>
```

#### Radio Component

Individual radio buttons with consistent styling:

```blade
<x-strata::form.radio 
    id="plan-basic" 
    name="plan" 
    value="basic"
    label="Basic Plan"
    description="$9/month - Essential features" 
/>

<x-strata::form.radio 
    id="plan-pro" 
    name="plan" 
    value="pro"
    label="Pro Plan"
    description="$19/month - Advanced features"
    :checked="true"
/>
```

#### Choice Groups

Semantic grouping for related checkboxes and radio buttons:

```blade
<!-- Checkbox group -->
<x-strata::form.choice-group label="Notification Preferences">
    <x-strata::form.checkbox 
        id="notify-email" 
        name="notifications[]" 
        value="email"
        label="Email notifications"
        description="Receive updates via email" 
    />
    <x-strata::form.checkbox 
        id="notify-sms" 
        name="notifications[]" 
        value="sms"
        label="SMS notifications"
        description="Receive text message alerts" 
    />
</x-strata::form.choice-group>

<!-- Radio group -->
<x-strata::form.choice-group label="Subscription Plan">
    <x-strata::form.radio 
        id="monthly" 
        name="plan" 
        value="monthly"
        label="Monthly"
        description="$19/month" 
    />
    <x-strata::form.radio 
        id="yearly" 
        name="plan" 
        value="yearly"
        label="Yearly"
        description="$190/year (save 17%)" 
    />
</x-strata::form.choice-group>

<!-- Inline layout for compact groups -->
<x-strata::form.choice-group label="Contact Method" :inline="true">
    <x-strata::form.radio id="email" name="contact" value="email" label="Email" />
    <x-strata::form.radio id="phone" name="contact" value="phone" label="Phone" />
</x-strata::form.choice-group>
```

#### Complete Form Examples

```blade
<!-- Contact form -->
<form class="space-y-6">
    <div class="grid md:grid-cols-2 gap-6">
        <x-strata::form.group label="First Name" for="first-name">
            <x-strata::form.input id="first-name" name="first_name" required />
        </x-strata::form.group>
        
        <x-strata::form.group label="Last Name" for="last-name">
            <x-strata::form.input id="last-name" name="last_name" required />
        </x-strata::form.group>
    </div>

    <x-strata::form.group label="Email" for="email">
        <x-strata::form.input 
            type="email" 
            id="email" 
            name="email"
            icon="heroicon-o-envelope"
            required 
        />
    </x-strata::form.group>

    <x-strata::form.group 
        label="Message" 
        for="message"
        help-text="Tell us how we can help you"
    >
        <x-strata::form.textarea 
            id="message" 
            name="message" 
            :auto-resize="true"
            required 
        />
    </x-strata::form.group>

    <x-strata::form.choice-group label="How can we help?">
        <x-strata::form.checkbox 
            id="support" 
            name="help_with[]" 
            value="support"
            label="Technical Support" 
        />
        <x-strata::form.checkbox 
            id="sales" 
            name="help_with[]" 
            value="sales"
            label="Sales Inquiry" 
        />
    </x-strata::form.choice-group>

    <div class="flex justify-end">
        <x-strata::button type="submit">Send Message</x-strata::button>
    </div>
</form>
```

**Form Component Features:**
- **Consistent Focus**: All inputs use offset focus rings matching button behavior
- **Validation States**: Error and help text support with proper styling
- **Accessibility**: Proper ARIA labels, fieldsets, and semantic markup
- **Livewire Ready**: Full wire:model support with real-time validation
- **Alpine.js Integration**: Auto-resize textareas, clearable inputs, password toggles, toggle animations
- **Icon Support**: Heroicons integration for enhanced UX
- **Flexible Slots**: Leading/trailing slots for custom content
- **Design System**: Uses CSS variables for consistent theming

### Form Component Props

#### Form Group Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `label` | string | *required* | Field label text |
| `for` | string | *required* | Input ID for proper labeling |
| `help-text` | string | `null` | Helpful description text |
| `error` | string | `null` | Error message (overrides help-text) |

#### Form Input Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `type` | string | `'text'` | HTML input type |
| `name` | string | `null` | Input name attribute |
| `icon` | string | `null` | Leading icon from Heroicons |
| `clearable` | boolean | `false` | Show clear button when has value |
| `show-password-toggle` | boolean | `false` | Show password visibility toggle |
| `placeholder` | string | `null` | Input placeholder text |
| `value` | mixed | `null` | Initial input value |

#### Form Textarea Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | string | `null` | Textarea name attribute |
| `rows` | integer | `3` | Initial number of rows |
| `auto-resize` | boolean | `false` | Enable auto-resize functionality |
| `placeholder` | string | `null` | Textarea placeholder text |
| `value` | mixed | `null` | Initial textarea value |

#### Form Checkbox/Radio Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | string | *required* | Input name attribute |
| `id` | string | *required* | Input ID attribute |
| `value` | mixed | *required* | Input value |
| `label` | string | *required* | Label text |
| `description` | string | `null` | Additional description text |
| `checked` | boolean | `false` | Initial checked state |

#### Form Choice Group Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `label` | string | *required* | Fieldset legend text |
| `inline` | boolean | `false` | Horizontal layout on larger screens |

#### Form Toggle Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | string | `null` | Input name attribute |
| `label` | string | `null` | Toggle label text |
| `description` | string | `null` | Additional description text |
| `value` | mixed | `null` | Input value when checked |
| `checked` | boolean | `false` | Initial checked state |
| `id` | string | auto-generated | Input ID attribute |

### Form Component Slots

#### Form Input Slots

| Slot | Description |
|------|-------------|
| `leading` | Content displayed before the input (icons, text, etc.) |
| `trailing` | Content displayed after the input (buttons, text, etc.) |

### Table Components

A composable table system that provides maximum flexibility while maintaining consistent styling and behavior. Tables are designed without built-in borders or containers, allowing you to apply your own styling wrapper when needed.

#### Basic Usage

The table component provides a clean, semantic table structure. Use a wrapper div for borders and styling:

```blade
<div class="border border-[var(--border-default)] rounded-[var(--radius-component-lg)] overflow-hidden">
    <x-strata::table>
        <x-strata::table.header>
            <x-strata::table.row>
                <x-strata::table.cell header>Name</x-strata::table.cell>
                <x-strata::table.cell header>Email</x-strata::table.cell>
                <x-strata::table.cell header>Role</x-strata::table.cell>
            </x-strata::table.row>
        </x-strata::table.header>
        <x-strata::table.body>
            @foreach($users as $user)
                <x-strata::table.row wire:key="{{ $user->id }}">
                    <x-strata::table.cell>{{ $user->name }}</x-strata::table.cell>
                    <x-strata::table.cell>{{ $user->email }}</x-strata::table.cell>
                    <x-strata::table.cell>
                        <x-strata::badge color="primary" variant="soft">
                            {{ $user->role }}
                        </x-strata::badge>
                    </x-strata::table.cell>
                </x-strata::table.row>
            @endforeach
        </x-strata::table.body>
    </x-strata::table>
</div>
```

#### Table with Footer

Tables now support footers for summaries, totals, and pagination:

```blade
<div class="border border-[var(--border-default)] rounded-[var(--radius-component-lg)] overflow-hidden">
    <x-strata::table striped>
        <x-strata::table.header>
            <x-strata::table.row>
                <x-strata::table.cell header>Product</x-strata::table.cell>
                <x-strata::table.cell header align="right">Price</x-strata::table.cell>
                <x-strata::table.cell header align="right">Total</x-strata::table.cell>
            </x-strata::table.row>
        </x-strata::table.header>
        <x-strata::table.body>
            <x-strata::table.row>
                <x-strata::table.cell>MacBook Pro</x-strata::table.cell>
                <x-strata::table.cell align="right">$1,999.00</x-strata::table.cell>
                <x-strata::table.cell align="right">$1,999.00</x-strata::table.cell>
            </x-strata::table.row>
        </x-strata::table.body>
        <x-strata::table.footer>
            <x-strata::table.row>
                <x-strata::table.cell header>Grand Total</x-strata::table.cell>
                <x-strata::table.cell header align="right" colspan="2">$1,999.00</x-strata::table.cell>
            </x-strata::table.row>
        </x-strata::table.footer>
    </x-strata::table>
</div>
```

#### Sticky Headers

For large datasets, enable sticky headers to keep column context visible:

```blade
<div class="h-64 overflow-y-auto">
    <x-strata::table sticky striped>
        <x-strata::table.header>
            <x-strata::table.row>
                <x-strata::table.cell header>Employee</x-strata::table.cell>
                <x-strata::table.cell header>Department</x-strata::table.cell>
                <x-strata::table.cell header>Status</x-strata::table.cell>
            </x-strata::table.row>
        </x-strata::table.header>
        <x-strata::table.body>
            {{-- Many rows of data --}}
        </x-strata::table.body>
    </x-strata::table>
</div>
```

#### Size Variations with Dynamic Padding

Tables automatically adjust cell padding based on size:

```blade
{{-- Compact table for dense data --}}
<x-strata::table size="sm">
    {{-- Cell padding: px-3 py-2 --}}
</x-strata::table>

{{-- Default balanced spacing --}}
<x-strata::table size="md">
    {{-- Cell padding: px-4 py-3 --}}
</x-strata::table>

{{-- Spacious table for large displays --}}
<x-strata::table size="lg">
    {{-- Cell padding: px-6 py-4 --}}
</x-strata::table>
```

#### Advanced Usage with Sorting and Loading

```blade
<x-strata::table :striped="true" wire:loading.class="opacity-50">
    <x-strata::table.header>
        <x-strata::table.row>
            <x-strata::table.cell header :sortable="true" 
                                  :sort-direction="$sortField === 'name' ? $sortDirection : 'none'"
                                  wire:click="sortBy('name')">
                Name
            </x-strata::table.cell>
            <x-strata::table.cell header :sortable="true"
                                  wire:click="sortBy('created_at')">
                Created
            </x-strata::table.cell>
            <x-strata::table.cell header align="right">Actions</x-strata::table.cell>
        </x-strata::table.row>
    </x-strata::table.header>
    <x-strata::table.body>
        @forelse($users as $user)
            <x-strata::table.row :clickable="true" wire:click="selectUser({{ $user->id }})">
                <x-strata::table.cell>{{ $user->name }}</x-strata::table.cell>
                <x-strata::table.cell>{{ $user->created_at->format('M j, Y') }}</x-strata::table.cell>
                <x-strata::table.cell align="right">
                    <x-strata::button size="sm" variant="outline">Edit</x-strata::button>
                </x-strata::table.cell>
            </x-strata::table.row>
        @empty
            <x-strata::table.row>
                <x-strata::table.cell colspan="3" align="center">
                    <div class="py-8 text-[var(--text-muted)]">
                        No users found.
                    </div>
                </x-strata::table.cell>
            </x-strata::table.row>
        @endforelse
    </x-strata::table.body>
</x-strata::table>
```

#### Interactive vs Non-Interactive Rows

The table component intelligently applies hover effects only to rows that are actually clickable, preventing user confusion:

```blade
<x-strata::table>
    <x-strata::table.header>
        <x-strata::table.row>
            <x-strata::table.cell header>User</x-strata::table.cell>
            <x-strata::table.cell header>Type</x-strata::table.cell>
        </x-strata::table.row>
    </x-strata::table.header>
    <x-strata::table.body>
        {{-- Non-clickable row - no hover effects --}}
        <x-strata::table.row>
            <x-strata::table.cell>Static User</x-strata::table.cell>
            <x-strata::table.cell>
                <x-strata::badge variant="secondary">Non-clickable</x-strata::badge>
            </x-strata::table.cell>
        </x-strata::table.row>
        
        {{-- Clickable row - hover effects and pointer cursor --}}
        <x-strata::table.row clickable>
            <x-strata::table.cell>Interactive User</x-strata::table.cell>
            <x-strata::table.cell>
                <x-strata::badge variant="primary">Clickable</x-strata::badge>
            </x-strata::table.cell>
        </x-strata::table.row>
        
        {{-- Selected clickable row --}}
        <x-strata::table.row clickable selected>
            <x-strata::table.cell>Selected User</x-strata::table.cell>
            <x-strata::table.cell>
                <x-strata::badge variant="primary">Selected</x-strata::badge>
            </x-strata::table.cell>
        </x-strata::table.row>
    </x-strata::table.body>
</x-strata::table>
```

**Table Component Features:**
- **Composable Architecture**: Build tables exactly how you need them
- **Semantic Footer Support**: Proper `<tfoot>` elements for summaries and pagination
- **Sticky Headers**: Keep column context visible during scrolling
- **Dynamic Cell Padding**: Size-appropriate spacing that scales with table size
- **Responsive Design**: Horizontal scroll on mobile devices
- **Loading States**: Built-in loading overlay with spinner
- **Sortable Columns**: Visual sort indicators and click handlers
- **Smart Interactive Rows**: Hover effects only on clickable rows (no misleading UI)
- **Row Selection**: Visual selection states with proper highlighting
- **Cell Alignment**: Left, center, and right text alignment options
- **Flexible Content**: Embed badges, buttons, avatars, and more
- **Livewire Integration**: Perfect for dynamic data and real-time updates
- **Accessibility**: Proper ARIA attributes and semantic markup
- **Consistent Styling**: Unified border radius across all table elements

### Table Component Props

#### Table Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `striped` | boolean | `false` | Alternating row background colors |
| `loading` | boolean | `false` | Show loading overlay with spinner |
| `size` | string | `'md'` | Table size variant (sm\|md\|lg) with dynamic cell padding |
| `sticky` | boolean | `false` | Make headers sticky during vertical scrolling |

#### Table Row Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `selected` | boolean | `false` | Highlight row as selected |
| `clickable` | boolean | `false` | Add hover effects and cursor pointer (only when true) |

**Important**: Hover effects are only applied when `clickable="true"` to prevent misleading users about row interactivity.

#### Table Cell Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `header` | boolean | `false` | Render as `<th>` with header styling |
| `sortable` | boolean | `false` | Add sort button and icons (header only) |
| `sort-direction` | string | `'none'` | Sort direction (asc\|desc\|none) |
| `align` | string | `'left'` | Text alignment (left\|center\|right) |

### Card Component Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `size` | string | `'md'` | Card size (sm\|md\|lg) |
| `border` | string | `'default'` | Border variant (default\|none\|primary\|secondary) |

## Component Variants & Sizes

### Badge Variants
- **solid** - Solid background with contrasting text
- **outline** - Transparent background with colored border
- **soft** - Semi-transparent background with colored text

### Badge Colors
- **primary** - Blue color scheme (consistent across themes)
- **secondary** - Neutral gray color scheme  
- **destructive** - Red color scheme (consistent across themes)
- **success** - Green color scheme (consistent across themes)
- **warning** - Amber/yellow color scheme (consistent across themes)
- **info** - Sky blue color scheme (consistent across themes)

**Note**: All semantic colors maintain consistent appearance in both light and dark modes for brand recognition.

### Button Variants
- **primary** - Blue primary action button
- **secondary** - Gray secondary action button
- **destructive** - Red destructive action button
- **outline** - Transparent with colored border
- **ghost** - Transparent with minimal hover state

### Alert Variants
- **solid** - Solid background with contrasting text (default)
- **outline** - Transparent background with colored border
- **soft** - Semi-transparent background with colored text

### Alert Colors
- **info** - Blue scheme for general information (default)
- **success** - Green scheme for positive outcomes
- **warning** - Amber scheme for cautions and notices
- **destructive** - Red scheme for errors and critical issues
- **primary** - Brand color scheme for important messages
- **secondary** - Gray scheme for less prominent information

### Card Border Variants
- **default** - Subtle gray border with dark mode support
- **none** - No border for a clean, minimal look  
- **primary** - Primary color border accent
- **secondary** - Secondary color border accent

### Sizes (All Components)
- **sm** - Small size with reduced padding and smaller text
- **md** - Medium size (default) with standard padding
- **lg** - Large size with increased padding and larger text

## Theming

### Global Design Tokens

Strata uses CSS variables for consistent theming. All tokens are defined in `strata-theme.css` using Tailwind v4's `@theme` system:

```css
@theme {
    /* Comprehensive Color System - Full Scale (50-950) */
    --color-primary-50: oklch(0.971 0.017 262.881);
    --color-primary-100: oklch(0.946 0.035 262.881);
    --color-primary-200: oklch(0.896 0.071 262.881);
    --color-primary-300: oklch(0.821 0.125 262.881);
    --color-primary-400: oklch(0.696 0.196 262.881);
    --color-primary-500: oklch(0.546 0.245 262.881);
    --color-primary-600: oklch(0.446 0.235 262.881);
    --color-primary-700: oklch(0.396 0.210 262.881);
    --color-primary-800: oklch(0.346 0.180 262.881);
    --color-primary-900: oklch(0.296 0.145 262.881);
    --color-primary-950: oklch(0.221 0.100 262.881);

    /* Secondary, Success, Warning, Info, Destructive colors */
    /* ... (full 50-950 scale for each semantic color) */

    /* Default Color References */
    --color-primary: var(--color-primary-500);
    --color-secondary: var(--color-secondary-500);
    --color-destructive: var(--color-destructive-500);
    --color-success: var(--color-success-500);
    --color-warning: var(--color-warning-500);
    --color-info: var(--color-info-500);

    /* Border Radius */
    --radius-component: var(--radius-pill);
    --radius-component-sm: 0.25rem;
    --radius-component-lg: 0.75rem;
    --radius-pill: 9999px;

    /* Typography */
    --font-size-xs: clamp(0.75rem, 0.5vw + 0.65rem, 0.875rem);
    --font-size-sm: clamp(0.875rem, 0.5vw + 0.75rem, 1rem);
    --font-size-base: clamp(1rem, 1vw + 0.75rem, 1.125rem);
    --font-size-lg: clamp(1.125rem, 1vw + 0.875rem, 1.25rem);
    --font-size-xl: clamp(1.25rem, 1.5vw + 0.875rem, 1.5rem);
    --font-size-display: clamp(3rem, 5vw + 1.5rem, 4.5rem);
}
```

### Comprehensive Color System

Strata includes a full color variant system (50-950) for all semantic colors using OKLCH color space for perceptually uniform scaling.

#### Using Color Variants

```blade
<!-- Default colors (500 variants) -->
<x-strata::badge color="primary">Primary</x-strata::badge>
<x-strata::button variant="success">Success</x-strata::button>

<!-- Specific variants -->
<div class="bg-primary-100 text-primary-800">Light primary background</div>
<div class="bg-success-200 border border-success-600">Success with darker border</div>

<!-- Custom overrides -->
<x-strata::alert class="bg-warning-50 border-warning-300">Custom warning styling</x-strata::alert>
```

#### Color Scale Guide

- **50-200**: Light backgrounds, subtle states
- **300-500**: Medium tones, interactive states  
- **600-800**: Primary colors, text colors
- **900-950**: Dark accents, high contrast text

#### Customizing the Color Palette

```css
@theme {
    /* Override specific variants */
    --color-primary-500: oklch(0.6 0.25 280); /* Purple primary */
    --color-success-500: oklch(0.7 0.15 150); /* Custom green */
    
    /* Or override the default reference */
    --color-primary: oklch(0.6 0.25 280);
}
```

#### Dark Mode Color Behavior

Semantic colors (primary, success, warning, etc.) **stay consistent** across light and dark modes for brand recognition. Only neutral elements (text, borders, backgrounds) adapt:

```css
.dark {
    /* Text and neutral elements adapt */
    --text-primary: hsl(210 40% 96%);
    --text-secondary: hsl(215 28% 83%);
    
    /* Semantic colors stay the same */
    /* --color-primary remains unchanged */
}
```

### Customizing Typography

Customize typography by overriding the typography tokens:

```css
@theme {
    /* Custom font sizes */
    --font-size-display: theme(fontSize.6xl);
    --font-size-base: theme(fontSize.lg);
    
    /* Custom text colors */
    --text-primary: theme(colors.gray.950);
    --text-accent: theme(colors.emerald.600);
}
```

### Border Radius Control

Control the roundness of all components globally:

```css
@theme {
    /* Sharp design */
    --radius-component: 0px;
    
    /* Default rounded */
    --radius-component: theme(radius.md);
    
    /* Pill shaped */
    --radius-component: 9999px;
}
```

### Advanced Theming Features

#### Fluid Typography

Strata uses responsive typography that scales smoothly across screen sizes:

```css
@theme {
    /* Fluid scaling with clamp() */
    --font-size-base: clamp(1rem, 1vw + 0.75rem, 1.125rem);
    --font-size-display: clamp(3rem, 5vw + 1.5rem, 4.5rem);
}
```

#### Container Width Tokens

```css
@theme {
    --max-width-container-wide: 87.5rem;    /* 1400px */
    --max-width-container-standard: 75rem;   /* 1200px */
    --max-width-container-narrow: 56.25rem; /* 900px */
    --max-width-container-compact: 42rem;    /* 672px */
}
```

#### Avatar Sizing System

```css
@theme {
    --size-avatar-xs: 1.5rem;   /* 24px */
    --size-avatar-sm: 2rem;     /* 32px */
    --size-avatar-md: 2.5rem;   /* 40px */
    --size-avatar-lg: 3rem;     /* 48px */
    --size-avatar-xl: 4rem;     /* 64px */
}
```

#### OKLCH Color Space Benefits

- **Perceptually Uniform**: Equal numeric changes produce equal visual changes
- **Better Scaling**: Smooth gradients and consistent lightness steps
- **Wide Gamut**: Supports modern display capabilities
- **Accessibility**: Predictable contrast ratios across variants

## Toast Notifications

Strata UI includes a comprehensive toast notification system with interactive action buttons and automatic primary/secondary styling for intuitive user interactions.

### Features

- **Action-Based Interactions**: Interactive buttons with automatic primary/secondary styling
- **Multiple Variants**: Success, error, info, warning, and custom styling  
- **Flexible Positioning**: 6 positioning options (top/bottom + start/center/end)
- **Auto-Dismiss**: Configurable duration with hover-to-pause functionality
- **Component Composition**: Uses existing Strata UI components for consistency
- **Event-Driven**: Works seamlessly from server-side (Livewire) or client-side (Alpine.js)
- **Session Integration**: Automatic handling of server-side flash messages
- **Smooth Animations**: Elegant enter/exit transitions

### Setup

Add the toast container to your main layout file:

```blade
{{-- Place before closing body tag --}}
<x-strata::toast-container position="top-end" />
```

#### Positioning Options

- `top-start` - Top left corner
- `top-center` - Top center
- `top-end` - Top right corner (default)
- `bottom-start` - Bottom left corner
- `bottom-center` - Bottom center
- `bottom-end` - Bottom right corner

### Basic Usage

#### Simple Text Toasts

```blade
{{-- Client-side (Alpine.js) --}}
<button @click="$strata.toast('Simple message')">
    Show Toast
</button>

<button @click="$strata.toast({
    message: 'Changes saved successfully!',
    title: 'Success',
    variant: 'success',
    duration: 3000
})">
    Success Toast
</button>
```

```php
// Server-side (Livewire/Controllers)
use Strata\UI\Facades\Strata;

class MyController extends Controller
{
    public function save()
    {
        // Simple toast
        Strata::toast('Changes saved!');
        
        // Detailed toast
        Strata::toast(
            message: 'Your profile has been updated successfully.',
            title: 'Success',
            variant: 'success',
            duration: 5000
        );
    }
}
```

#### Action Buttons with Consistent Primary/Secondary Styling

Toasts support up to 2 interactive action buttons with consistent, predictable styling:

```blade
{{-- Client-side (Alpine.js) --}}
<button @click="$strata.toast({
    message: 'Delete this item?',
    title: 'Confirm',
    variant: 'destructive',
    actions: [
        { label: 'Delete', action: 'confirmDelete' }, // Primary button
        { label: 'Cancel', action: 'cancelAction' }   // Outline button
    ]
})">
    Delete Confirmation
</button>
```

```php
// Server-side action buttons
public function showUpdatePrompt()
{
    Strata::toast(
        message: 'A new version is available',
        title: 'Update Available',
        variant: 'info',
        actions: [
            ['label' => 'Update Now', 'action' => 'startUpdate'], // Primary button
            ['label' => 'Later', 'action' => 'dismissUpdate']     // Outline button
        ]
    );
}
```

**Action Button Styling:**
- **First action**: Always `primary` variant (prominent, main action)
- **Second action**: Always `outline` variant (subtle, secondary action)
- **Maximum actions**: Limited to 2 actions for optimal UX
- **Consistent styling**: No variant customization needed - automatically handled

#### Toast Variants

- `success` - Green theme for successful operations
- `destructive` - Red theme for errors
- `info` - Blue theme for informational messages  
- `warning` - Yellow theme for warnings

### Interactive Examples

#### Confirmation Toast

```blade
{{-- Deletion confirmation with consistent primary/secondary styling --}}
<button @click="$strata.toast({
    message: 'Are you sure you want to delete this item? This action cannot be undone.',
    title: 'Delete Item',
    variant: 'destructive',
    duration: 0, // Permanent until action
    actions: [
        { label: 'Delete', action: 'performDelete' },  // Primary button
        { label: 'Cancel', action: 'cancelDelete' }    // Outline button
    ]
})">Delete Item</button>
```

#### Update Notification

```blade  
{{-- Update prompt with 2-action limit --}}
<button @click="$strata.toast({
    message: 'A new version of the application is available with bug fixes and improvements.',
    title: 'Update Available',
    variant: 'info',
    actions: [
        { label: 'Update Now', action: 'startUpdate' }, // Primary button
        { label: 'Later', action: 'remindLater' }       // Outline button
    ]
})">Show Update</button>
```

#### Friend Request

```php
// Server-side toast with consistent styling
public function sendFriendRequest()
{
    Strata::toast(
        message: 'Jane Doe wants to connect with you',
        title: 'New Friend Request',
        variant: 'info',
        duration: 0,
        actions: [
            ['label' => 'Accept', 'action' => 'acceptFriend'],   // Primary button
            ['label' => 'Decline', 'action' => 'declineFriend']  // Outline button
        ]
    );
}
```

### Duration & Behavior

- **Auto-Dismiss**: Toasts auto-dismiss after the specified duration (default: 5000ms)
- **Hover to Pause**: Timer pauses when hovering over a toast
- **Permanent Toasts**: Set `duration: 0` to require manual dismissal
- **Manual Dismissal**: Standard toasts include dismiss buttons automatically


### API Reference

#### Strata Facade Methods

```php
// Simple toast with optional actions
Strata::toast(
    string $message, 
    ?string $title = null, 
    string $variant = 'info', 
    int $duration = 5000, 
    ?string $icon = null,
    ?array $actions = null
)
```

#### Alpine.js Magic Helper

```javascript
// Simple message
$strata.toast('Message text')

// Detailed toast
$strata.toast({
    message: 'Your message',
    title: 'Optional title', 
    variant: 'success|destructive|info|warning',
    duration: 5000,  // milliseconds, 0 = permanent
    icon: 'heroicon-name',
    actions: [
        { label: 'Primary Action', action: 'functionName' },      // Primary button
        { label: 'Secondary Action', action: 'anotherFunction' }  // Outline button
    ]
})

```

#### Event System

You can also dispatch toast events manually:

```javascript
// Custom event dispatch
window.dispatchEvent(new CustomEvent('strata-toast-show', {
    detail: {
        message: 'Custom event toast',
        variant: 'success'
    }
}));
```

## Tooltip Component

Interactive tooltips that appear on hover, built on the same positioning system as popovers.

### Features

- **Hover-Triggered**: Shows on mouseenter, hides on mouseleave
- **Flexible Positioning**: Supports all Alpine anchor positions (top, bottom, left, right, and variations)  
- **Semantic Theming**: Uses your Strata color system with dark background and light text
- **Smooth Animations**: Elegant fade and scale transitions
- **Accessibility**: Proper ARIA attributes and keyboard handling
- **Non-Interfering**: Pointer-events disabled to prevent interaction conflicts
- **Snug Wrapping**: Tooltip wrapper fits exactly around child component

### Basic Usage

```blade
{{-- Simple tooltip --}}
<x-strata::tooltip text="Click to save your changes">
    <x-strata::button>Save</x-strata::button>
</x-strata::tooltip>

{{-- Positioned tooltip --}}
<x-strata::tooltip text="User profile" position="bottom">
    <x-strata::avatar initials="JD" />
</x-strata::tooltip>

{{-- Custom position and offset --}}
<x-strata::tooltip text="Status: Active" position="right" :offset="12">
    <x-strata::badge color="success">Active</x-strata::badge>
</x-strata::tooltip>
```

### Positioning

Available positions for tooltips:

- `top` - Above the element (default)
- `bottom` - Below the element
- `left` - To the left of the element  
- `right` - To the right of the element
- Plus variations like `top-start`, `bottom-end`, etc.

### Props

- `text` (required) - The tooltip content
- `position` - Positioning relative to trigger (default: 'top')
- `offset` - Distance from trigger in pixels (default: 8)

### Examples

#### Button Tooltips

```blade
<div class="flex gap-4">
    <x-strata::tooltip text="Save your changes">
        <x-strata::button icon="heroicon-o-check-circle">
            Save
        </x-strata::button>
    </x-strata::tooltip>
    
    <x-strata::tooltip text="Delete permanently" position="bottom">
        <x-strata::button variant="destructive" icon="heroicon-o-trash">
            Delete
        </x-strata::button>
    </x-strata::tooltip>
</div>
```

#### Avatar Tooltips

```blade
<div class="flex gap-3">
    <x-strata::tooltip text="John Doe (Online)" position="top">
        <x-strata::avatar initials="JD" status="online" />
    </x-strata::tooltip>
    
    <x-strata::tooltip text="Jane Smith (Away)" position="top">
        <x-strata::avatar initials="JS" status="away" />
    </x-strata::tooltip>
</div>
```

#### Help Text Tooltips

```blade
<div class="flex items-center gap-2">
    <label>API Key</label>
    <x-strata::tooltip text="Your API key is used to authenticate requests" position="right">
        <span class="border-b border-dashed border-muted cursor-help text-muted">
            What's this?
        </span>
    </x-strata::tooltip>
</div>
```

## Icon Sets

Strata includes Heroicons through Blade Icons:

- **Heroicons Outline**: `heroicon-o-{name}` (e.g., `heroicon-o-user`)
- **Heroicons Solid**: `heroicon-s-{name}` (e.g., `heroicon-s-heart`)

Browse available icons at [heroicons.com](https://heroicons.com).

## Requirements

- PHP 8.2 or higher
- Laravel 12.0 or higher
- Tailwind CSS v4

## Dependencies

- `blade-ui-kit/blade-icons` - Icon rendering
- `blade-ui-kit/blade-heroicons` - Heroicons icon set

## Architecture

### Zero Config Design

Strata is designed to work immediately after installation with no configuration required. Components and typography use sensible defaults and global design tokens for consistency.

### Semantic HTML + CSS Variables

Built on semantic HTML elements with automatic styling through CSS variables. Write `<h1>` instead of `<div class="text-4xl font-bold">` while maintaining ultimate flexibility.

### CSS Variables + Tailwind v4

Built on Tailwind CSS v4's native CSS variable system, allowing for dynamic theming without recompiling CSS.

### Semantic Naming

All CSS variables use semantic names (`--color-primary`, `--text-secondary`, `--radius-component`) rather than specific values, making theming intuitive and flexible.

## Contributing

This package is part of a larger Laravel application. For contributions, please follow the existing code style and ensure all changes are backward compatible.

## License

MIT License. See LICENSE file for details.