# Strata UI Components Documentation

This document provides comprehensive documentation for all components in the Strata UI package, including all props, usage examples, and considerations.

## Table of Contents

- [Core UI Components](#core-ui-components)
  - [Alert](#alert)
  - [Avatar](#avatar)
  - [Badge](#badge)
  - [Button](#button)
  - [Card](#card)
  - [Icon](#icon)
  - [Section](#section)
- [Form Components](#form-components)
  - [Input](#input)
  - [Textarea](#textarea)
  - [Checkbox](#checkbox)
  - [Radio](#radio)
  - [Toggle](#toggle)
  - [Rating](#rating)
  - [Select](#select)
  - [File Upload](#file-upload)
  - [Editor](#editor)
  - [Form Group](#form-group)
  - [Choice Group](#choice-group)
  - [Form Utility Components](#form-utility-components)
- [Advanced Components](#advanced-components)
  - [Calendar](#calendar)
  - [Modal](#modal)
  - [Table](#table)
  - [Tabs](#tabs)
  - [Dropdown](#dropdown)
  - [Popover](#popover)
  - [Tooltip](#tooltip)
  - [Toast Container](#toast-container)
  - [NavItem](#navitem)
  - [NotificationContent](#notificationcontent)

---

## Core UI Components

### Alert

Displays contextual feedback messages with icons and optional dismiss functionality.

**Props:**
- `variant` (string, default: `'solid'`): Visual style - `'solid'`, `'outline'`, `'soft'`
- `color` (string, default: `'info'`): Color theme - `'accent'`, `'destructive'`, `'success'`, `'warning'`, `'primary'`, `'info'`
- `size` (string, default: `'md'`): Size - `'sm'`, `'md'`, `'lg'`
- `icon` (string|null, default: `null`): Custom icon name (auto-detected by color if null)
- `dismissible` (bool, default: `false`): Show dismiss button
- `title` (string|null, default: `null`): Alert title

**Slots:**
- `default`: Alert content/message
- `actions`: Action buttons (optional)

**Basic Usage:**
```blade
<x-strata::alert color="success" title="Success!" dismissible>
    Your changes have been saved successfully.
</x-strata::alert>

<x-strata::alert color="destructive" icon="heroicon-o-exclamation-triangle">
    There was an error processing your request.
</x-strata::alert>

<x-strata::alert variant="outline" color="info">
    This is an informational message.
    <x-slot name="actions">
        <x-strata::button variant="ghost" size="sm">Learn More</x-strata::button>
        <x-strata::button variant="outline" size="sm">Dismiss</x-strata::button>
    </x-slot>
</x-strata::alert>
```

**Helper Methods:**
- `getVariantClasses()`: Returns background, text, and border classes for variant/color combinations
- `getSizeClasses()`: Returns padding and text size classes
- `getIconSizeClasses()`: Returns icon size classes based on alert size
- `getContextualIcon()`: Returns appropriate icon based on color (auto-detection)
- `getTitleClasses()`: Returns title text size and weight classes

**Considerations:**
- Icons are automatically selected based on color (destructive=exclamation-triangle, success=check-circle, etc.)
- Dismissible alerts use Alpine.js for smooth hide animations
- Actions slot appears below the main content
- ARIA attributes are automatically applied for accessibility

---

### Avatar

Displays user profile images with fallback options and status indicators.

**Props:**
- `src` (string|null, default: `null`): Image URL
- `alt` (string|null, default: `null`): Alt text for image
- `initials` (string|null, default: `null`): Fallback initials text
- `size` (string, default: `'md'`): Size - `'xs'`, `'sm'`, `'md'`, `'lg'`, `'xl'`, `'2xl'`, `'3xl'`
- `shape` (string, default: `'circle'`): Shape - `'circle'`, `'square'`, `'rounded'`
- `status` (string, default: `'none'`): Status indicator - `'online'`, `'away'`, `'busy'`, `'offline'`, `'none'`
- `statusPosition` (string, default: `'bottom-right'`): Status position - `'top-left'`, `'top-right'`, `'bottom-left'`, `'bottom-right'`
- `border` (bool, default: `false`): Add border ring

**Slots:**
- `default`: Additional content (overlays, badges, etc.)

**Basic Usage:**
```blade
{{-- Image with status --}}
<x-strata::avatar 
    src="/path/to/image.jpg" 
    alt="John Doe" 
    status="online"
    size="lg"
/>

{{-- Initials fallback --}}
<x-strata::avatar 
    initials="JD" 
    size="md" 
    status="away"
/>

{{-- Default icon fallback --}}
<x-strata::avatar size="sm" border />

{{-- Square avatar with overlay --}}
<x-strata::avatar 
    src="/image.jpg" 
    shape="square" 
    size="xl"
>
    <div class="absolute inset-0 bg-black/20 avatar-radius flex items-end p-2">
        <span class="text-white text-xs">Badge</span>
    </div>
</x-strata::avatar>
```

**Helper Methods:**
- `getSizeClasses()`: Returns size classes (w-6 h-6 through w-24 h-24)
- `getShapeClasses()`: Returns border radius classes for shape
- `getBorderClasses()`: Returns ring classes when border is enabled
- `getStatusClasses()`: Returns status indicator positioning and colors
- `getInitialsTextClasses()`: Returns text size classes for initials

**Considerations:**
- Automatic fallback chain: image → initials → user icon
- Alpine.js handles image load errors gracefully
- Status colors use CSS custom properties for theming
- Supports all size options with proper scaling

---

### Badge

Small status and labeling component with multiple visual styles.

**Props:**
- `variant` (string, default: `'solid'`): Visual style - `'solid'`, `'outline'`, `'soft'`
- `color` (string, default: `'primary'`): Color - `'primary'`, `'accent'`, `'destructive'`, `'success'`, `'warning'`, `'info'`
- `size` (string, default: `'md'`): Size variations
- `shape` (string, default: `'pill'`): Shape variations
- `icon` (string|null, default: `null`): Optional icon name
- `dismissible` (bool, default: `false`): Show dismiss button

**Basic Usage:**
```blade
{{-- Basic badges --}}
<x-strata::badge>Default</x-strata::badge>
<x-strata::badge color="success">Success</x-strata::badge>
<x-strata::badge color="destructive" variant="outline">Error</x-strata::badge>

{{-- With icon --}}
<x-strata::badge color="info" icon="heroicon-o-information-circle">
    Info Badge
</x-strata::badge>

{{-- Dismissible --}}
<x-strata::badge color="warning" dismissible>
    Dismissible Badge
</x-strata::badge>

{{-- Different sizes and shapes --}}
<x-strata::badge size="sm" shape="rounded">Small</x-strata::badge>
<x-strata::badge size="lg" shape="square">Large Square</x-strata::badge>
```

**Helper Methods:**
- `getVariantClasses()`: Returns background, text, and border classes for variant/color combinations

**Considerations:**
- Dismissible badges use Alpine.js for removal animation
- Icon appears before text content
- Color variants provide consistent theming across the design system

---

### Button

Interactive button component with multiple variants and states.

**Props:**
- `variant` (string, default: `'primary'`): Style variant - `'primary'`, `'accent'`, `'destructive'`, `'outline'`, `'secondary'`, `'ghost'`
- `size` (string, default: `'md'`): Size - `'sm'`, `'md'`, `'lg'`
- `type` (string, default: `'button'`): HTML type attribute
- `disabled` (bool, default: `false`): Disabled state
- `loading` (bool, default: `false`): Loading state with spinner
- `icon` (string|null, default: `null`): Icon name
- `iconPosition` (string, default: `'left'`): Icon position - `'left'`, `'right'`
- `badge` (mixed, default: `null`): Badge content to display

**Basic Usage:**
```blade
{{-- Basic buttons --}}
<x-strata::button>Default Button</x-strata::button>
<x-strata::button variant="accent">Accent Button</x-strata::button>
<x-strata::button variant="destructive">Delete</x-strata::button>

{{-- With icons --}}
<x-strata::button icon="heroicon-o-plus">Add Item</x-strata::button>
<x-strata::button icon="heroicon-o-arrow-right" iconPosition="right">
    Next Step
</x-strata::button>

{{-- States --}}
<x-strata::button disabled>Disabled</x-strata::button>
<x-strata::button loading>Loading...</x-strata::button>

{{-- Sizes --}}
<x-strata::button size="sm">Small</x-strata::button>
<x-strata::button size="lg">Large</x-strata::button>

{{-- With badge --}}
<x-strata::button badge="3">Messages</x-strata::button>

{{-- As link --}}
<x-strata::button href="/dashboard" variant="outline">
    Go to Dashboard
</x-strata::button>
```

**Considerations:**
- Automatically becomes `<a>` tag when `href` attribute is present
- Loading state shows spinner and maintains button dimensions
- Disabled state prevents all interactions
- Icon-only buttons should include `aria-label` for accessibility
- Badge content appears as small indicator on the button

---

### Card

Container component for grouping related content.

**Props:**
- `size` (string, default: `'md'`): Padding and spacing size - `'sm'`, `'md'`, `'lg'`
- `border` (string, default: `'default'`): Border style - `'none'`, `'default'`, `'primary'`, `'accent'`

**Slots:**
- `default`: Main card content
- `header`: Card header content
- `footer`: Card footer content

**Basic Usage:**
```blade
{{-- Basic card --}}
<x-strata::card>
    <h3>Card Title</h3>
    <p>Card content goes here...</p>
</x-strata::card>

{{-- With header and footer --}}
<x-strata::card>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h3>Settings</h3>
            <x-strata::button size="sm" variant="ghost">Edit</x-strata::button>
        </div>
    </x-slot>
    
    <p>Configure your application settings here.</p>
    
    <x-slot name="footer">
        <div class="flex justify-end gap-2">
            <x-strata::button variant="outline">Cancel</x-strata::button>
            <x-strata::button>Save Changes</x-strata::button>
        </div>
    </x-slot>
</x-strata::card>

{{-- Size and border variants --}}
<x-strata::card size="lg" border="primary">Large Card with Primary Border</x-strata::card>
```

**Helper Methods:**
- `getSizeClasses()`: Returns padding classes based on card size
- `getBorderClasses()`: Returns border classes for different border styles

---

### Icon

SVG icon component with support for multiple icon libraries.

**Props:**
- `name` (string, required): Icon name
- `library` (string|null, default: `null`): Icon library prefix

**Basic Usage:**
```blade
{{-- Heroicons (default) --}}
<x-strata::icon name="heroicon-o-star" class="w-5 h-5" />
<x-strata::icon name="heroicon-s-heart" class="w-4 h-4 text-red-500" />

{{-- Custom library --}}
<x-strata::icon name="custom-icon" library="custom" />
```

**Considerations:**
- Supports Heroicons by default
- Auto-detects heroicon prefixes
- Can be extended to support other icon libraries
- CSS classes are passed through for sizing and styling

---

### Section

Layout component for consistent page sections with width constraints.

**Props:**
- `width` (string, default: `'standard'`): Width constraint - `'full'`, `'wide'`, `'standard'`, `'narrow'`, `'compact'`
- `padding` (string, default: `'md'`): Vertical padding - `'none'`, `'sm'`, `'md'`, `'lg'`, `'xl'`

**Basic Usage:**
```blade
<x-strata::section width="narrow" padding="lg">
    <h1>Page Title</h1>
    <p>Content within a narrow, well-padded section.</p>
</x-strata::section>

<x-strata::section width="full" padding="none">
    <div class="bg-gray-100 h-32">Full-width content with no padding</div>
</x-strata::section>
```

---

## Form Components

### Input

Text input component with icons, validation, and special features.

**Props:**
- `type` (string, default: `'text'`): Input type - `'text'`, `'email'`, `'password'`, `'number'`, `'url'`, etc.
- `name` (string|null, default: `null`): Form field name
- `id` (string|null, default: `null`): Input ID (auto-generated if not provided)
- `label` (string|null, default: `null`): Label text
- `description` (string|null, default: `null`): Help text
- `error` (string|null, default: `null`): Error message
- `icon` (string|null, default: `null`): Icon name for decoration
- `clearable` (bool, default: `false`): Show clear button
- `showPasswordToggle` (bool, default: `false`): Show password visibility toggle (auto-enabled for password type)
- `placeholder` (string|null, default: `null`): Placeholder text
- `value` (mixed, default: `null`): Input value
- `required` (bool, default: `false`): Required field
- `disabled` (bool, default: `false`): Disabled state
- `readonly` (bool, default: `false`): Read-only state

**Slots:**
- `leading`: Content before input (left side)
- `trailing`: Content after input (right side)

**Basic Usage:**
```blade
{{-- Basic inputs --}}
<x-strata::form.input 
    name="email" 
    type="email" 
    label="Email Address"
    placeholder="Enter your email"
    required
    wire:model="email"
/>

<x-strata::form.input 
    name="search" 
    icon="heroicon-o-magnifying-glass" 
    placeholder="Search..."
    clearable
/>

{{-- Password with toggle --}}
<x-strata::form.input 
    name="password" 
    type="password" 
    label="Password"
    placeholder="Enter password"
/>

{{-- With leading/trailing slots --}}
<x-strata::form.input 
    name="website" 
    type="url" 
    label="Website"
    placeholder="example.com"
>
    <x-slot name="leading">https://</x-slot>
    <x-slot name="trailing">.com</x-slot>
</x-strata::form.input>

{{-- Number input --}}
<x-strata::form.input 
    name="price" 
    type="number" 
    label="Price"
    min="0" 
    step="0.01"
    placeholder="0.00"
>
    <x-slot name="leading">$</x-slot>
</x-strata::form.input>

{{-- With validation error --}}
<x-strata::form.input 
    name="email" 
    type="email" 
    label="Email Address"
    value="invalid-email"
    error="Please enter a valid email address"
/>
```

**Considerations:**
- Password inputs automatically get password toggle functionality
- Icons, clear button, and prefix/suffix slots are positioned properly
- Full Livewire `wire:model` support
- Error state styling automatically applied
- Auto-generates unique ID if not provided
- Uses semantic form utility components (Label, Error, Helper)

---

### Textarea

Multi-line text input component with auto-resize capability.

**Props:**
- `name` (string|null, default: `null`): Form field name
- `id` (string|null, default: `null`): Input ID (auto-generated if not provided)
- `label` (string|null, default: `null`): Label text
- `description` (string|null, default: `null`): Help text
- `error` (string|null, default: `null`): Error message
- `rows` (int, default: `3`): Number of visible rows
- `autoResize` (bool, default: `false`): Enable automatic height adjustment
- `placeholder` (string|null, default: `null`): Placeholder text
- `value` (mixed, default: `null`): Textarea value
- `required` (bool, default: `false`): Required field
- `disabled` (bool, default: `false`): Disabled state
- `readonly` (bool, default: `false`): Read-only state

**Basic Usage:**
```blade
{{-- Basic textarea --}}
<x-strata::form.textarea 
    name="description" 
    label="Description"
    rows="5"
    placeholder="Enter description..."
    wire:model="description"
/>

{{-- Auto-resize textarea --}}
<x-strata::form.textarea 
    name="notes" 
    label="Notes"
    autoResize
    placeholder="Your notes will expand as you type..."
/>

{{-- With validation --}}
<x-strata::form.textarea 
    name="content" 
    label="Content"
    rows="8"
    required
    error="Content is required"
    description="Provide detailed content for this section"
/>
```

**Considerations:**
- Auto-resize feature uses Alpine.js to adjust height dynamically
- Error state styling automatically applied
- Supports both regular form submission and Livewire
- Uses semantic form utility components

---

### Checkbox

Checkbox input component with label and description support.

**Props:**
- `name` (string, required): Form field name
- `id` (string, required): Input ID
- `value` (mixed, required): Checkbox value
- `label` (string|null, default: `null`): Label text
- `description` (string|null, default: `null`): Help text
- `error` (string|null, default: `null`): Error message
- `checked` (bool, default: `false`): Initial checked state

**Basic Usage:**
```blade
<x-strata::form.checkbox 
    name="terms" 
    id="terms" 
    value="1"
    label="I agree to the Terms of Service"
    description="Please read our terms before proceeding"
    wire:model="agreedToTerms"
/>

<x-strata::form.checkbox 
    name="newsletter" 
    id="newsletter" 
    value="subscribe"
    label="Subscribe to Newsletter"
    :checked="true"
/>

{{-- With error state --}}
<x-strata::form.checkbox 
    name="required_checkbox" 
    id="required_checkbox" 
    value="1"
    label="This field is required"
    error="You must check this box to continue"
/>
```

**Considerations:**
- Requires explicit `name`, `id`, and `value` props
- Supports both form submission and Livewire binding
- Uses semantic form utility components for consistent styling

---

### Radio

Radio button input component for mutually exclusive choices.

**Props:**
- `name` (string, required): Form field name (same for grouped radios)
- `id` (string, required): Input ID (unique for each radio)
- `value` (mixed, required): Radio button value
- `label` (string|null, default: `null`): Label text
- `description` (string|null, default: `null`): Help text
- `error` (string|null, default: `null`): Error message
- `checked` (bool, default: `false`): Initial checked state

**Basic Usage:**
```blade
{{-- Radio group --}}
<x-strata::form.radio 
    name="plan" 
    id="plan_basic" 
    value="basic"
    label="Basic Plan"
    description="$9/month - Basic features"
    wire:model="selectedPlan"
/>

<x-strata::form.radio 
    name="plan" 
    id="plan_premium" 
    value="premium"
    label="Premium Plan"
    description="$19/month - All features included"
    :checked="true"
    wire:model="selectedPlan"
/>

{{-- With error (typically on the group) --}}
<x-strata::form.radio 
    name="required_choice" 
    id="choice_a" 
    value="a"
    label="Option A"
    error="Please select an option"
/>
```

**Considerations:**
- All radio buttons in a group must share the same `name` attribute
- Each radio button needs a unique `id`
- Error messages typically shown once per group
- Works with Livewire binding and form submission

---

### Toggle

Switch-style toggle component for boolean values.

**Props:**
- `name` (string|null, default: `null`): Form field name
- `label` (string|null, default: `null`): Label text
- `description` (string|null, default: `null`): Help text
- `error` (string|null, default: `null`): Error message
- `value` (mixed, default: `null`): Toggle value
- `checked` (bool, default: `false`): Initial checked state
- `id` (string|null, default: `null`): Input ID (auto-generated if not provided)

**Basic Usage:**
```blade
<x-strata::form.toggle 
    name="notifications" 
    label="Email Notifications"
    description="Receive email notifications for updates"
    wire:model="emailNotifications"
/>

<x-strata::form.toggle 
    name="dark_mode" 
    label="Dark Mode"
    value="enabled"
    :checked="true"
/>

{{-- With error state --}}
<x-strata::form.toggle 
    name="required_toggle" 
    label="Required Setting"
    description="This setting must be enabled"
    error="This toggle is required"
/>
```

**Considerations:**
- Alpine.js provides smooth toggle animations
- Supports both Livewire and traditional form submission
- Auto-generates ID for accessibility if not provided
- Uses semantic colors from design system

---

### Rating

Interactive star rating component with customizable icons and clear functionality.

**Props:**
- `name` (string|null, default: `null`): Form field name
- `label` (string|null, default: `null`): Label text
- `description` (string|null, default: `null`): Help text
- `value` (int|float|null, default: `null`): Current rating value
- `max` (int, default: `5`): Maximum rating value (number of stars)
- `readonly` (bool, default: `false`): Read-only mode
- `clearable` (bool, default: `true`): Show clear button
- `size` (string, default: `'md'`): Size - `'sm'`, `'md'`, `'lg'`
- `icon` (string, default: `'heroicon-o-star'`): Icon for rating items
- `id` (string|null, default: `null`): Component ID (auto-generated if null)

**Basic Usage:**
```blade
{{-- Basic rating --}}
<x-strata::form.rating 
    name="rating" 
    label="Rate this product"
    wire:model="rating"
/>

{{-- Custom max and value --}}
<x-strata::form.rating 
    name="satisfaction" 
    label="Satisfaction Level"
    :max="10"
    :value="7"
    description="Rate from 1-10"
/>

{{-- Readonly display --}}
<x-strata::form.rating 
    :value="4.5" 
    :readonly="true"
    label="Average Rating"
    description="Based on 142 reviews"
/>

{{-- Different icon --}}
<x-strata::form.rating 
    name="recommendation" 
    icon="heroicon-o-heart"
    label="Would you recommend?"
    :max="5"
/>

{{-- Sizes --}}
<x-strata::form.rating name="rating_sm" size="sm" label="Small" />
<x-strata::form.rating name="rating_lg" size="lg" label="Large" />
```

**Helper Methods:**
- `getSizeClasses()`: Returns icon size classes based on rating size
- `getGapClasses()`: Returns gap spacing classes for rating size  
- `getClearButtonSizeClasses()`: Returns clear button icon size classes
- `getId()`: Returns the component's unique ID

**Considerations:**
- Uses dedicated `--rating-star` color variable for theming
- Alpine.js provides interactive hover and click functionality
- Supports decimal ratings for display
- Automatic form integration with hidden inputs
- Full Livewire compatibility with `x-modelable`
- Clear button allows resetting to null value

---

### Select

Dropdown selection component with search, multiple selection, and custom options.

**Props:**
- `label` (string|null, default: `null`): Label text
- `items` (array, default: `[]`): Select options array
- `selected` (mixed, default: `null`): Selected value(s)
- `placeholder` (string, default: `'Choose...'`): Placeholder text
- `name` (string|null, default: `null`): Form field name
- `id` (string|null, default: `null`): Input ID (auto-generated if not provided)
- `error` (string|null, default: `null`): Error message
- `description` (string|null, default: `null`): Help text
- `helpText` (string|null, default: `null`): Backward compatibility alias for description
- `disabled` (bool, default: `false`): Disabled state
- `required` (bool, default: `false`): Required field
- `clearable` (bool, default: `false`): Show clear button
- `multiple` (bool, default: `false`): Allow multiple selections
- `maxSelections` (int, default: `0`): Maximum selections (0 = unlimited)
- `searchable` (bool, default: `false`): Enable search functionality
- `searchThreshold` (int, default: `10`): Minimum items to show search
- `searchPlaceholder` (string, default: `'Search...'`): Search input placeholder

**Basic Usage:**
```blade
{{-- Simple select --}}
<x-strata::form.select 
    name="country" 
    label="Country"
    :items="[
        ['value' => 'us', 'label' => 'United States'],
        ['value' => 'ca', 'label' => 'Canada'],
        ['value' => 'uk', 'label' => 'United Kingdom']
    ]"
    wire:model="selectedCountry"
/>

{{-- Multiple selection --}}
<x-strata::form.select 
    name="skills" 
    label="Skills"
    multiple
    searchable
    :maxSelections="5"
    :items="$skillsOptions"
    wire:model="selectedSkills"
/>

{{-- With groups --}}
<x-strata::form.select 
    name="category" 
    label="Category"
    searchable
    :items="[
        [
            'label' => 'Fruits',
            'options' => [
                ['value' => 'apple', 'label' => 'Apple'],
                ['value' => 'banana', 'label' => 'Banana']
            ]
        ],
        [
            'label' => 'Vegetables',
            'options' => [
                ['value' => 'carrot', 'label' => 'Carrot'],
                ['value' => 'lettuce', 'label' => 'Lettuce']
            ]
        ]
    ]"
/>
```

**Considerations:**
- Complex Alpine.js component with full keyboard navigation
- Supports grouped options and custom option templates
- Search functionality with highlighting
- Multiple selection with badges
- Accessibility compliant with ARIA attributes
- Works with both array values and object structures

---

### File Upload

Advanced file upload component with drag-and-drop, previews, and multiple file support.

**Props:**
- `name` (string|null): Form field name
- `multiple` (bool, default: `false`): Allow multiple files
- `accept` (string|null): File type restrictions (auto: 'image/*,application/pdf,.doc,.docx,.txt')
- `maxSize` (int|null): Maximum file size in KB (auto: 12288 KB / 12MB)
- `collection` (string|null): Spatie Media Library collection
- `mediaLibrary` (bool, default: `false`): Use Media Library integration
- `enableReordering` (bool, default: `false`): Allow file reordering
- `showPreview` (bool, default: `true`): Show file previews
- `showProgress` (bool, default: `true`): Show upload progress
- `placeholder` (string|null): Custom placeholder text (auto-generated)
- `helpText` (string|null): Help text
- `customProperties` (array|null): Media Library custom properties
- `manipulations` (array|null): Image manipulations
- `conversion` (string|null): Media conversion
- `responsiveImages` (bool, default: `false`): Generate responsive images
- `conversionsDisk` (string|null): Disk for conversions
- `variant` (string, default: `'default'`): Style variant - `'default'`, `'compact'`, `'gallery'`
- `value` (mixed, default: `null`): Initial files

**Basic Usage:**
```blade
{{-- Simple file upload --}}
<x-strata::form.file-upload 
    name="avatar" 
    accept="image/*" 
    placeholder="Drop your profile picture here"
/>

{{-- Multiple files with preview --}}
<x-strata::form.file-upload 
    name="documents" 
    multiple 
    accept=".pdf,.doc,.docx"
    :maxSize="5000"
    helpText="Maximum 5MB per file"
/>

{{-- With Media Library --}}
<x-strata::form.file-upload 
    name="gallery" 
    multiple
    mediaLibrary
    collection="gallery"
    enableReordering
    responsiveImages
    wire:model="galleryFiles"
/>

{{-- Compact variant --}}
<x-strata::form.file-upload 
    name="attachment" 
    variant="compact"
    accept=".pdf"
    placeholder="Upload PDF"
/>
```

**Helper Methods:**
- `getMaxSizeFormatted()`: Returns human-readable file size limit (e.g., "12 MB")

**Considerations:**
- Full drag-and-drop functionality with Alpine.js
- Image preview generation and file type icons
- Progress bars during upload
- Integration with Spatie Media Library
- File validation and error handling
- Reordering functionality for multiple files
- Responsive image generation for media library
- Auto-sets default accept types and max size if not specified

---

### Editor

Rich text editor component for formatted content input.

**Props:**
- `name` (string, default: `''`): Form field name
- `value` (string, default: `''`): Initial content
- `placeholder` (string|null): Placeholder text
- `id` (string|null): Input ID
- `required` (bool, default: `false`): Required field
- `disabled` (bool, default: `false`): Disabled state
- `minHeight` (int, default: `200`): Minimum height in pixels
- `maxHeight` (int|null): Maximum height in pixels

**Basic Usage:**
```blade
<x-strata::form.editor 
    name="content" 
    placeholder="Start writing..."
    :minHeight="300"
    wire:model="articleContent"
/>

<x-strata::form.editor 
    name="description" 
    value="<p>Initial content</p>"
    :maxHeight="500"
    required
/>
```

**Considerations:**
- Rich text editing with formatting toolbar
- HTML content output
- Customizable height constraints
- Supports Livewire binding
- May require additional JavaScript libraries

---

### Form Group

Container component for grouping form fields with shared labels and help text.

**Props:**
- `label` (string, required): Group label
- `for` (string, required): Associated field ID
- `helpText` (string|null): Help text
- `error` (string|null): Error message

**Basic Usage:**
```blade
<x-strata::form.group 
    label="Personal Information" 
    for="personal_info"
    helpText="Please provide your personal details"
>
    <x-strata::form.input name="first_name" placeholder="First Name" />
    <x-strata::form.input name="last_name" placeholder="Last Name" />
</x-strata::form.group>
```

---

### Choice Group

Container for grouping radio buttons or checkboxes.

**Props:**
- `label` (string, required): Group label
- `inline` (bool, default: `false`): Inline layout

**Basic Usage:**
```blade
<x-strata::form.choice-group label="Preferred Contact Method" inline>
    <x-strata::form.radio name="contact" id="contact_email" value="email" label="Email" />
    <x-strata::form.radio name="contact" id="contact_phone" value="phone" label="Phone" />
    <x-strata::form.radio name="contact" id="contact_sms" value="sms" label="SMS" />
</x-strata::form.choice-group>
```

---

### Form Utility Components

#### Label (`x-strata::form.label`)
**Props:**
- `for` (string|null): Associated input ID
- `required` (bool, default: `false`): Show required indicator
- `id` (string|null): Auto-generated if not provided
- `size` (string, default: `'sm'`): Size - `'xs'`, `'sm'`, `'md'`, `'lg'`

#### Error (`x-strata::form.error`)
**Props:**
- `message` (string|null): Error message
- `field` (string|null): Associated field name
- `id` (string|null): Auto-generated if not provided
- `size` (string, default: `'sm'`): Size - `'xs'`, `'sm'`, `'md'`

#### Helper (`x-strata::form.helper`)
**Props:**
- `text` (string|null): Helper text
- `field` (string|null): Associated field name
- `id` (string|null): Auto-generated if not provided
- `size` (string, default: `'xs'`): Size - `'xs'`, `'sm'`, `'md'`
- `showIcon` (bool, default: `false`): Show info icon

---

## Advanced Components

### Calendar

Comprehensive date picker with range selection and presets.

**Props:**
- `value` (mixed): Current value - can be DateRange object, array, or null
- `initialDate` (string|null): Starting display date
- `startDate` (string|null): Legacy parameter
- `endDate` (string|null): Legacy parameter
- `weekStart` (string, default: `'sunday'`): Week start day - `'sunday'`, `'monday'`
- `range` (bool, default: `true`): Enable range selection
- `multiple` (bool, default: `true`): Enable multi-month view
- `visibleMonths` (int, default: `2`): Number of visible months
- `presets` (bool, default: `true`): Show preset buttons
- `locale` (string|null): Locale for translations
- `selecting` (bool, default: `false`): Current selecting state
- `updating` (bool, default: `false`): Current updating state
- `minDate` (string|null): Minimum selectable date
- `maxDate` (string|null): Maximum selectable date
- `disabledDates` (array, default: `[]`): Array of disabled dates
- `showClearButton` (bool, default: `false`): Show clear button
- `closeOnSelect` (bool, default: `false`): Close on date selection

**Slots:**
- `day`: Custom day cell template
- `footer`: Calendar footer content

**Basic Usage:**
```blade
{{-- Basic date range picker --}}
<x-strata::calendar wire:model="dateRange" />

{{-- Single date picker --}}
<x-strata::calendar 
    :range="false" 
    :multiple="false"
    wire:model="selectedDate"
/>

{{-- With constraints --}}
<x-strata::calendar 
    minDate="2024-01-01"
    maxDate="2024-12-31"
    :disabledDates="['2024-12-25', '2024-12-26']"
    wire:model="availableDates"
/>

{{-- Custom locale --}}
<x-strata::calendar 
    locale="fr"
    weekStart="monday"
    wire:model="dateRange"
/>
```

**Considerations:**
- Uses Carbon for date manipulation
- Supports DateRange value objects for Livewire
- Multi-language support with localization
- Preset date ranges (Today, Yesterday, Last 7 days, etc.)
- Complex Alpine.js component with keyboard navigation
- Can handle both single dates and date ranges

---

### Modal

Overlay dialog component with multiple variants and positioning options.

**Props:**
- `name` (string|null): Unique modal identifier
- `variant` (string, default: `'default'`): Style - `'default'`, `'flyout'`, `'bare'`
- `size` (string, default: `'md'`): Size - `'sm'`, `'md'`, `'lg'`, `'xl'`, `'2xl'`, `'full'`
- `position` (string, default: `'center'`): Position - `'center'`, `'left'`, `'right'`, `'bottom'` (for flyout)
- `dismissible` (bool, default: `true`): Allow closing modal

**Slots:**
- `default`: Modal content
- `header`: Modal header
- `footer`: Modal footer

**Subcomponents:**
- `x-strata::modal.trigger` - `name` (required), `shortcut` (nullable)
- `x-strata::modal.close` - No props (simple close button)

**Basic Usage:**
```blade
{{-- Modal trigger --}}
<x-strata::modal.trigger target="example-modal">
    <x-strata::button>Open Modal</x-strata::button>
</x-strata::modal.trigger>

{{-- Modal definition --}}
<x-strata::modal name="example-modal" size="lg">
    <x-slot name="header">
        <h2>Modal Title</h2>
    </x-slot>
    
    <p>Modal content goes here...</p>
    
    <x-slot name="footer">
        <div class="flex justify-end gap-2">
            <x-strata::modal.close>
                <x-strata::button variant="outline">Cancel</x-strata::button>
            </x-strata::modal.close>
            <x-strata::button>Confirm</x-strata::button>
        </div>
    </x-slot>
</x-strata::modal>

{{-- Flyout modal --}}
<x-strata::modal name="settings" variant="flyout" position="right">
    <h2>Settings Panel</h2>
    <!-- Settings content -->
</x-strata::modal>

{{-- Bare modal --}}
<x-strata::modal name="gallery" variant="bare" size="full">
    <div class="p-8">
        <!-- Custom styled content -->
    </div>
</x-strata::modal>
```

**Considerations:**
- Uses Alpine.js for show/hide functionality
- Named modals prevent conflicts
- Flyout variant slides in from edges
- Automatic focus management and backdrop clicks
- Body scroll locking when modal is open
- Keyboard shortcuts support with trigger component
- Bare variant provides unstyled container

---

### Table

Structured data display with sorting, loading states, and responsive design.

**Props:**
- `striped` (bool, default: `false`): Alternate row styling
- `loading` (bool, default: `false`): Show loading state
- `size` (string, default: `'md'`): Table size - `'sm'`, `'md'`, `'lg'`
- `sticky` (bool, default: `false`): Sticky header

**Subcomponents:**
- `table.header` - Table header row
- `table.body` - Table body container
- `table.footer` - Table footer
- `table.row` - Table row with `selected`, `clickable` props
- `table.cell` - Table cell with `header`, `sortable`, `sortDirection`, `align` props
- `table.vertical` - Vertical layout for mobile with `striped`, `size` props
- `table.vertical-row` - Vertical row component with `label`, `labelBold` props

**Basic Usage:**
```blade
<x-strata::table striped size="lg">
    <x-strata::table.header>
        <x-strata::table.cell header sortable wire:click="sort('name')">
            Name
        </x-strata::table.cell>
        <x-strata::table.cell header sortable wire:click="sort('email')">
            Email
        </x-strata::table.cell>
        <x-strata::table.cell header>Role</x-strata::table.cell>
        <x-strata::table.cell header align="right">Actions</x-strata::table.cell>
    </x-strata::table.header>
    
    <x-strata::table.body>
        @foreach($users as $user)
            <x-strata::table.row 
                clickable 
                wire:click="viewUser({{ $user->id }})"
                :selected="$selectedUser === $user->id"
            >
                <x-strata::table.cell>{{ $user->name }}</x-strata::table.cell>
                <x-strata::table.cell>{{ $user->email }}</x-strata::table.cell>
                <x-strata::table.cell>
                    <x-strata::badge>{{ $user->role }}</x-strata::badge>
                </x-strata::table.cell>
                <x-strata::table.cell align="right">
                    <x-strata::button size="sm" variant="ghost">Edit</x-strata::button>
                </x-strata::table.cell>
            </x-strata::table.row>
        @endforeach
    </x-strata::table.body>
</x-strata::table>

{{-- Vertical layout for mobile --}}
<x-strata::table.vertical>
    @foreach($users as $user)
        <x-strata::table.vertical-row label="Name">{{ $user->name }}</x-strata::table.vertical-row>
        <x-strata::table.vertical-row label="Email">{{ $user->email }}</x-strata::table.vertical-row>
        <x-strata::table.vertical-row label="Role" labelBold>
            <x-strata::badge>{{ $user->role }}</x-strata::badge>
        </x-strata::table.vertical-row>
    @endforeach
</x-strata::table.vertical>
```

**Considerations:**
- Sortable headers show sort direction indicators
- Clickable rows show hover effects and pointer cursor
- Loading state overlays the entire table
- Selected state highlights rows
- Sticky headers remain visible during scroll
- Responsive design with vertical layout option
- Proper ARIA attributes for accessibility

---

### Tabs

Tab navigation component with horizontal and vertical orientations.

**Props:**
- `defaultValue` (string|null): Default active tab
- `orientation` (string, default: `'horizontal'`): Layout - `'horizontal'`, `'vertical'`
- `activationMode` (string, default: `'automatic'`): Activation mode
- `variant` (string, default: `'default'`): Style - `'default'`, `'pills'`, `'underline'`

**Subcomponents:**
- `tabs.list` - Container for tab triggers
- `tabs.trigger` - Tab button with `value` (required), `disabled` props
- `tabs.content` - Tab content panel with `value` (required), `forceMount` props

**Basic Usage:**
```blade
<x-strata::tabs defaultValue="overview" variant="underline">
    <x-strata::tabs.list>
        <x-strata::tabs.trigger value="overview">Overview</x-strata::tabs.trigger>
        <x-strata::tabs.trigger value="details">Details</x-strata::tabs.trigger>
        <x-strata::tabs.trigger value="settings" disabled>Settings</x-strata::tabs.trigger>
    </x-strata::tabs.list>

    <x-strata::tabs.content value="overview">
        <h3>Overview</h3>
        <p>Overview content goes here...</p>
    </x-strata::tabs.content>

    <x-strata::tabs.content value="details">
        <h3>Details</h3>
        <p>Detailed information...</p>
    </x-strata::tabs.content>

    <x-strata::tabs.content value="settings">
        <h3>Settings</h3>
        <p>Settings panel...</p>
    </x-strata::tabs.content>
</x-strata::tabs>

{{-- Vertical tabs --}}
<x-strata::tabs orientation="vertical" variant="pills">
    <x-strata::tabs.list>
        <x-strata::tabs.trigger value="tab1">Tab 1</x-strata::tabs.trigger>
        <x-strata::tabs.trigger value="tab2">Tab 2</x-strata::tabs.trigger>
    </x-strata::tabs.list>
    
    <!-- Tab content -->
</x-strata::tabs>
```

**Considerations:**
- Complex Alpine.js component with keyboard navigation
- Support for disabled tabs
- Multiple visual variants (default, pills, underline)
- Automatic and manual activation modes
- Accessibility compliant with proper ARIA attributes
- Can force-mount hidden content for SEO

---

### Dropdown

Dropdown menu component with positioning and width options.

**Props:**
- `position` (string, default: `'bottom-end'`): Positioning
- `width` (string, default: `'w-56'`): Width CSS class

**Slots:**
- `trigger`: Element that triggers the dropdown
- `default`: Dropdown menu content

**Subcomponents:**
- `dropdown.checkbox` - `name`, `value`, `label`, `checked`, `description` props
- `dropdown.radio` - `name`, `value`, `label`, `checked`, `description` props
- `dropdown.separator` - `label` (optional) prop for labeled separators

**Basic Usage:**
```blade
<x-strata::dropdown position="bottom-start" width="w-64">
    <x-slot name="trigger">
        <x-strata::button variant="outline">Menu</x-strata::button>
    </x-slot>

    <div class="py-1">
        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Settings</a>
        <x-strata::dropdown.separator />
        <x-strata::dropdown.separator label="Preferences" />
        <x-strata::dropdown.checkbox name="notifications" value="1" label="Notifications" />
        <x-strata::dropdown.radio name="theme" value="dark" label="Dark Mode" />
    </div>
</x-strata::dropdown>
```

---

### Popover

Popover component for additional information or actions.

**Props:**
- `position` (string, default: `'bottom-start'`): Positioning
- `offset` (int, default: `8`): Offset distance in pixels
- `width` (string, default: `'w-56'`): Width CSS class

**Slots:**
- `trigger`: Element that triggers the popover
- `default`: Popover content

**Basic Usage:**
```blade
<x-strata::popover position="top" width="w-72">
    <x-slot name="trigger">
        <x-strata::button variant="ghost">More Info</x-strata::button>
    </x-slot>

    <div class="p-4">
        <h4 class="font-semibold">Additional Information</h4>
        <p class="text-sm text-gray-600">
            This provides more context about the feature.
        </p>
    </div>
</x-strata::popover>
```

---

### Tooltip

Simple tooltip component for hover information.

**Props:**
- `text` (string, required): Tooltip content
- `position` (string, default: `'top'`): Positioning - `'top'`, `'bottom'`, `'left'`, `'right'`
- `offset` (int, default: `8`): Offset distance in pixels

**Basic Usage:**
```blade
<x-strata::tooltip text="This is helpful information" position="right">
    <x-strata::button variant="ghost">
        <x-strata::icon name="heroicon-o-information-circle" />
    </x-strata::button>
</x-strata::tooltip>

<x-strata::tooltip text="Click to save your changes">
    <x-strata::button>Save</x-strata::button>
</x-strata::tooltip>
```

---

### Toast Container

Container for displaying toast notifications.

**Props:**
- `position` (string, default: `'bottom-end'`): Toast positioning
- `expanded` (bool, default: `false`): Default expansion state

**Basic Usage:**
```blade
{{-- Place once in your layout --}}
<x-strata::toast-container position="top-end" />

{{-- Toasts will be dynamically added here --}}
```

---

### NavItem

Navigation item component for consistent navigation styling.

**Props:**
- `href` (string|null): Link URL
- `icon` (string|null): Icon name
- `active` (bool, default: `false`): Active state

**Basic Usage:**
```blade
<nav>
    <x-strata::nav-item href="/dashboard" icon="heroicon-o-home" :active="request()->is('dashboard')">
        Dashboard
    </x-strata::nav-item>
    <x-strata::nav-item href="/users" icon="heroicon-o-users" :active="request()->is('users*')">
        Users
    </x-strata::nav-item>
</nav>
```

---

### NotificationContent

Structured content component for notifications.

**Props:**
- `image` (string|null): Image URL
- `title` (string|null): Title text
- `description` (string|null): Description text

**Slots:**
- `default`: Main notification content
- `actions`: Action buttons (optional)

**Basic Usage:**
```blade
<x-strata::notification-content 
    image="/path/to/avatar.jpg"
    title="New Message"
    description="You have received a new message from John Doe"
>
    <div class="flex gap-2 mt-2">
        <x-strata::button size="sm">Reply</x-strata::button>
        <x-strata::button size="sm" variant="outline">Mark Read</x-strata::button>
    </div>
</x-strata::notification-content>
```

---

## Usage Patterns

### Form Integration

All form components support both traditional form submission and Livewire:

```blade
{{-- Traditional Form --}}
<form method="POST" action="/submit">
    @csrf
    <x-strata::form.input name="email" type="email" label="Email" />
    <x-strata::form.rating name="rating" label="Rating" />
    <x-strata::button type="submit">Submit</x-strata::button>
</form>

{{-- Livewire Integration --}}
<div>
    <x-strata::form.input wire:model="email" label="Email" />
    <x-strata::form.rating wire:model="rating" label="Rating" />
    <x-strata::button wire:click="save">Save</x-strata::button>
</div>
```

### Theming and Customization

Components use CSS custom properties for consistent theming:

```css
:root {
    --primary: oklch(0.6104 0.0767 299.7335);
    --rating-star: oklch(0.7540 0.0982 76.8292);
    --radius-button: 0.375rem;
    --radius-input: 0.375rem;
    /* Customize other variables */
}
```

### Alpine.js Integration

Components use Alpine.js for interactivity and follow consistent patterns:

```blade
{{-- Components expose their Alpine data --}}
<x-strata::form.rating 
    x-data="strataRating({...})"
    x-on:change="handleRatingChange"
/>
```

### Accessibility Features

- Automatic ARIA attributes and labeling
- Keyboard navigation support
- Screen reader compatibility
- Focus management
- Semantic HTML structure

### Error Handling

Form components automatically handle validation errors:

```blade
<x-strata::form.input 
    name="email" 
    label="Email Address"
    error="{{ $errors->first('email') }}"
/>
```

This documentation covers all available components with their complete prop APIs, usage examples, and important considerations for implementation.