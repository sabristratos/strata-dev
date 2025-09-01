# Sidebar Component

A comprehensive sidebar component system for navigation and content panels with multiple variants, responsive behavior, and full accessibility support.

## Features

- **Multiple Variants**: Overlay, push, fixed, and hybrid modes
- **Responsive Design**: Automatic mobile/desktop behavior
- **State Persistence**: Optional localStorage persistence
- **Collapsible Groups**: Organize navigation with expandable sections
- **Keyboard Navigation**: Full keyboard accessibility
- **Alpine.js Integration**: Magic methods and global API
- **Touch-Friendly**: Native swipe gestures on mobile

## Components

The sidebar system consists of three main components:

1. **`<x-strata::sidebar>`** - Main container
2. **`<x-strata::sidebar-group>`** - Navigation groups
3. **`<x-strata::sidebar-toggle>`** - Toggle buttons

## Basic Usage

### Simple Sidebar

```blade
<x-strata::sidebar name="main">
    <x-strata::nav-item href="/dashboard" icon="heroicon-o-home" active>
        Dashboard
    </x-strata::nav-item>
    <x-strata::nav-item href="/users" icon="heroicon-o-users">
        Users
    </x-strata::nav-item>
    <x-strata::nav-item href="/settings" icon="heroicon-o-cog-6-tooth">
        Settings
    </x-strata::nav-item>
</x-strata::sidebar>

<x-strata::sidebar-toggle target="main">
    Toggle Sidebar
</x-strata::sidebar-toggle>
```

### Sidebar with Groups

```blade
<x-strata::sidebar name="navigation" width="w-72" persistent>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <img src="/logo.svg" alt="Logo" class="w-8 h-8">
            <div>
                <div class="font-semibold">My App</div>
                <div class="text-sm text-muted-foreground">v2.0</div>
            </div>
        </div>
    </x-slot>
    
    <x-strata::sidebar-group label="Main Navigation">
        <x-strata::nav-item href="/dashboard" icon="heroicon-o-home">Dashboard</x-strata::nav-item>
        <x-strata::nav-item href="/analytics" icon="heroicon-o-chart-bar">Analytics</x-strata::nav-item>
        <x-strata::nav-item href="/reports" icon="heroicon-o-document-chart-bar">Reports</x-strata::nav-item>
    </x-strata::sidebar-group>
    
    <x-strata::sidebar-group label="Administration" collapsible>
        <x-strata::nav-item href="/users" icon="heroicon-o-users">Users</x-strata::nav-item>
        <x-strata::nav-item href="/roles" icon="heroicon-o-shield-check">Roles</x-strata::nav-item>
        <x-strata::nav-item href="/permissions" icon="heroicon-o-key">Permissions</x-strata::nav-item>
    </x-strata::sidebar-group>
    
    <x-slot name="footer">
        <x-strata::button variant="ghost" size="sm" class="w-full justify-start">
            <x-strata::icon name="heroicon-o-arrow-right-start-on-rectangle" class="w-4 h-4 mr-2" />
            Sign Out
        </x-strata::button>
    </x-slot>
</x-strata::sidebar>
```

## Sidebar Component

### Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | `string` | `null` | Unique identifier for the sidebar |
| `variant` | `string` | `'overlay'` | Sidebar behavior: `overlay`, `push`, `fixed`, `hybrid` |
| `width` | `string` | `'w-64'` | Tailwind width class |
| `position` | `string` | `'left'` | Position: `left` or `right` |
| `persistent` | `boolean` | `false` | Save state to localStorage |
| `backdrop` | `boolean` | `true` | Show backdrop for overlay variants |
| `collapsible` | `boolean` | `false` | Enable collapse functionality |

### Variants

#### Overlay (Default)
Slides over content with optional backdrop. Hidden by default on mobile.

```blade
<x-strata::sidebar name="overlay" variant="overlay">
    <!-- Navigation items -->
</x-strata::sidebar>
```

#### Push
Pushes main content aside when open. Great for desktop layouts.

```blade
<x-strata::sidebar name="push" variant="push" width="w-80">
    <!-- Navigation items -->
</x-strata::sidebar>
```

#### Fixed
Always visible on desktop, overlay on mobile. Perfect for admin panels.

```blade
<x-strata::sidebar name="fixed" variant="fixed" persistent>
    <!-- Navigation items -->
</x-strata::sidebar>
```

#### Hybrid
Combines fixed and overlay behavior based on screen size.

```blade
<x-strata::sidebar name="hybrid" variant="hybrid" collapsible>
    <!-- Navigation items -->
</x-strata::sidebar>
```

### Slots

#### Header Slot
Optional header content with branding or user info.

```blade
<x-strata::sidebar name="main">
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <x-strata::avatar size="sm" initials="JD" />
            <div>
                <div class="font-semibold">John Doe</div>
                <div class="text-sm text-muted-foreground">Administrator</div>
            </div>
        </div>
    </x-slot>
    
    <!-- Navigation content -->
</x-strata::sidebar>
```

#### Footer Slot
Optional footer content for actions or secondary navigation.

```blade
<x-strata::sidebar name="main">
    <!-- Navigation content -->
    
    <x-slot name="footer">
        <div class="space-y-2">
            <x-strata::button variant="ghost" size="sm" class="w-full justify-start">
                <x-strata::icon name="heroicon-o-question-mark-circle" class="w-4 h-4 mr-2" />
                Help & Support
            </x-strata::button>
            <x-strata::button variant="ghost" size="sm" class="w-full justify-start">
                <x-strata::icon name="heroicon-o-arrow-right-start-on-rectangle" class="w-4 h-4 mr-2" />
                Sign Out
            </x-strata::button>
        </div>
    </x-slot>
</x-strata::sidebar>
```

## Sidebar Group Component

Organize navigation items into logical sections with optional collapsible behavior.

### Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `label` | `string` | `null` | Group heading text |
| `collapsible` | `boolean` | `false` | Allow expand/collapse |
| `collapsed` | `boolean` | `false` | Initial collapsed state |

### Examples

```blade
<!-- Basic Group -->
<x-strata::sidebar-group label="Main Navigation">
    <x-strata::nav-item href="/" icon="heroicon-o-home">Home</x-strata::nav-item>
    <x-strata::nav-item href="/about" icon="heroicon-o-information-circle">About</x-strata::nav-item>
</x-strata::sidebar-group>

<!-- Collapsible Group -->
<x-strata::sidebar-group label="Admin Tools" collapsible collapsed>
    <x-strata::nav-item href="/admin/users" icon="heroicon-o-users">User Management</x-strata::nav-item>
    <x-strata::nav-item href="/admin/settings" icon="heroicon-o-cog-6-tooth">System Settings</x-strata::nav-item>
</x-strata::sidebar-group>

<!-- Group without Label -->
<x-strata::sidebar-group>
    <x-strata::nav-item href="/profile" icon="heroicon-o-user">Profile</x-strata::nav-item>
    <x-strata::nav-item href="/logout" icon="heroicon-o-arrow-right-start-on-rectangle">Logout</x-strata::nav-item>
</x-strata::sidebar-group>
```

## Sidebar Toggle Component

Create buttons to control sidebar visibility with various styles.

### Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `target` | `string` | `'main'` | Target sidebar name |
| `variant` | `string` | `'button'` | Style: `button`, `icon`, `hamburger` |
| `size` | `string` | `'md'` | Button size: `sm`, `md`, `lg` |
| `icon` | `string` | `null` | Icon name for icon variant |

### Examples

```blade
<!-- Button Toggle -->
<x-strata::sidebar-toggle target="main" variant="button">
    Open Menu
</x-strata::sidebar-toggle>

<!-- Icon Toggle -->
<x-strata::sidebar-toggle target="main" variant="icon" icon="heroicon-o-bars-3" />

<!-- Animated Hamburger -->
<x-strata::sidebar-toggle target="main" variant="hamburger" />
```

## JavaScript API

Control sidebars programmatically using Alpine.js magic methods or vanilla JavaScript.

### Alpine.js Magic Methods

```html
<!-- Alpine.js Template Usage -->
<button @click="$strata.sidebar('main').toggle()">Toggle Sidebar</button>
<button @click="$strata.sidebar('main').show()">Show Sidebar</button>
<button @click="$strata.sidebar('main').hide()">Hide Sidebar</button>
<button @click="$strata.sidebars().closeAll()">Close All</button>
```

### Vanilla JavaScript API

```javascript
// Individual sidebar control
Strata.sidebar('main').show();
Strata.sidebar('main').hide();
Strata.sidebar('main').toggle();

// Close all sidebars
Strata.sidebars().close();
```

### Event Listeners

Listen for sidebar events in your JavaScript:

```javascript
// Listen for specific sidebar events
window.addEventListener('strata-sidebar-opened', (event) => {
    console.log('Sidebar opened:', event.detail.name);
});

window.addEventListener('strata-sidebar-closed', (event) => {
    console.log('Sidebar closed:', event.detail.name);
});

window.addEventListener('strata-sidebar-collapsed', (event) => {
    console.log('Sidebar collapsed:', event.detail);
});
```

## Responsive Behavior

Sidebars automatically adapt to different screen sizes:

### Mobile (< 768px)
- **Overlay/Push/Hybrid**: Act as overlay sidebars
- **Fixed**: Converts to overlay behavior
- Touch gestures enabled for swipe-to-close

### Desktop (≥ 768px)
- **Overlay**: Slides over content
- **Push**: Pushes content aside
- **Fixed**: Always visible
- **Hybrid**: Fixed by default, collapsible

## Accessibility Features

- **ARIA Labels**: Proper labeling for screen readers
- **Keyboard Navigation**: 
  - `Escape` key closes overlay sidebars
  - `Tab` navigation within sidebar
  - `Enter`/`Space` activate toggle buttons
- **Focus Management**: Automatic focus handling on open/close
- **Screen Reader Announcements**: State changes announced
- **High Contrast**: Supports high contrast mode

## Advanced Examples

### Dashboard Layout

```blade
<div class="min-h-screen flex">
    <!-- Main Sidebar -->
    <x-strata::sidebar 
        name="main" 
        variant="fixed" 
        width="w-64" 
        collapsible 
        persistent
    >
        <x-slot name="header">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-primary rounded flex items-center justify-center">
                    <span class="text-primary-foreground font-bold text-sm">A</span>
                </div>
                <div x-show="!collapsed" x-transition>
                    <div class="font-semibold">Admin Panel</div>
                    <div class="text-xs text-muted-foreground">v2.1.0</div>
                </div>
            </div>
        </x-slot>
        
        <x-strata::sidebar-group label="Dashboard" x-show="!collapsed">
            <x-strata::nav-item href="/dashboard" icon="heroicon-o-home" active>Overview</x-strata::nav-item>
            <x-strata::nav-item href="/analytics" icon="heroicon-o-chart-bar">Analytics</x-strata::nav-item>
            <x-strata::nav-item href="/reports" icon="heroicon-o-document-chart-bar">Reports</x-strata::nav-item>
        </x-strata::sidebar-group>
        
        <!-- Collapsed state navigation -->
        <div x-show="collapsed" x-transition class="space-y-1">
            <x-strata::nav-item href="/dashboard" icon="heroicon-o-home" tooltip="Overview" />
            <x-strata::nav-item href="/analytics" icon="heroicon-o-chart-bar" tooltip="Analytics" />
            <x-strata::nav-item href="/reports" icon="heroicon-o-document-chart-bar" tooltip="Reports" />
        </div>
    </x-strata::sidebar>
    
    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <header class="border-b bg-background p-4">
            <div class="flex items-center justify-between">
                <h1 class="text-xl font-semibold">Dashboard</h1>
                <x-strata::sidebar-toggle target="notifications" variant="icon" icon="heroicon-o-bell" />
            </div>
        </header>
        
        <main class="flex-1 p-6">
            <!-- Page content -->
        </main>
    </div>
    
    <!-- Notification Sidebar -->
    <x-strata::sidebar 
        name="notifications" 
        variant="overlay" 
        position="right" 
        width="w-80"
    >
        <x-slot name="header">
            <h3 class="font-semibold">Notifications</h3>
        </x-slot>
        
        <!-- Notification content -->
    </x-strata::sidebar>
</div>
```

### Multi-Level Navigation

```blade
<x-strata::sidebar name="navigation" width="w-72">
    <x-strata::sidebar-group label="Main">
        <x-strata::nav-item href="/dashboard" icon="heroicon-o-home">Dashboard</x-strata::nav-item>
    </x-strata::sidebar-group>
    
    <x-strata::sidebar-group label="Content Management" collapsible>
        <x-strata::nav-item href="/posts" icon="heroicon-o-document-text">Posts</x-strata::nav-item>
        <x-strata::nav-item href="/pages" icon="heroicon-o-document">Pages</x-strata::nav-item>
        <x-strata::nav-item href="/media" icon="heroicon-o-photo">Media Library</x-strata::nav-item>
    </x-strata::sidebar-group>
    
    <x-strata::sidebar-group label="E-commerce" collapsible collapsed>
        <x-strata::nav-item href="/products" icon="heroicon-o-cube">Products</x-strata::nav-item>
        <x-strata::nav-item href="/orders" icon="heroicon-o-shopping-bag">Orders</x-strata::nav-item>
        <x-strata::nav-item href="/customers" icon="heroicon-o-users">Customers</x-strata::nav-item>
    </x-strata::sidebar-group>
    
    <x-strata::sidebar-group label="System" collapsible collapsed>
        <x-strata::nav-item href="/users" icon="heroicon-o-user-group">Users</x-strata::nav-item>
        <x-strata::nav-item href="/settings" icon="heroicon-o-cog-6-tooth">Settings</x-strata::nav-item>
        <x-strata::nav-item href="/logs" icon="heroicon-o-document-text">System Logs</x-strata::nav-item>
    </x-strata::sidebar-group>
</x-strata::sidebar>
```

## Best Practices

1. **Use Meaningful Names**: Give each sidebar a descriptive name for the `name` prop
2. **Consistent Width**: Use consistent widths across your application
3. **Navigation Hierarchy**: Use sidebar groups to organize navigation logically
4. **Mobile-First**: Test sidebar behavior on mobile devices
5. **Accessibility**: Always include proper ARIA labels and test with screen readers
6. **State Persistence**: Use `persistent` for sidebars users interact with frequently
7. **Performance**: Avoid too many nested components within sidebars

## Styling

The sidebar components use CSS custom properties for consistent theming:

```css
:root {
    --sidebar-width: 16rem;
    --sidebar-collapsed-width: 4rem;
    --sidebar-transition-duration: 300ms;
}
```

Override these values in your CSS to customize the appearance globally.