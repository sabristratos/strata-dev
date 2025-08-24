# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is the **Strata UI package**, a Laravel Blade component library built with Tailwind CSS v4. It provides a comprehensive set of zero-config UI components for modern Laravel applications with full Livewire integration, Alpine.js interactivity, and dark mode support.

## Common Development Commands

### Building & Development
```bash
# Build JavaScript assets
npm run build

# Watch for changes during development
npm run dev

# Preview built assets
npm run preview
```

### Asset Management
The package uses Vite to bundle JavaScript assets:
- **Entry point**: `resources/js/strata.js`
- **Output**: `resources/dist/strata-ui.js`
- **Build config**: `vite.config.js`

### Testing Components
Since this is a component library package, testing typically happens in the parent Laravel application that consumes these components.

## Architecture Overview

### Component System
- **PHP Classes**: Located in `src/View/Components/` with nested namespaces (e.g., `Form/`, `Modal/`, `Table/`)
- **Blade Templates**: Located in `resources/views/components/` with corresponding structure
- **JavaScript**: Alpine.js-based interactivity in `resources/js/`
- **Styling**: CSS variables and Tailwind v4 utilities in `resources/css/strata-theme.css`

### Service Provider Structure
The `StrataServiceProvider` handles:
- Component registration via `Blade::componentNamespace()`
- View and translation loading
- Livewire synthesizer registration (`DateRangeSynth`)
- Custom Blade directive `@strataScripts` 
- Asset publishing for theme customization

### JavaScript Architecture
The `strata.js` file provides:
- Smart Alpine.js plugin loading (detects existing Alpine instances)
- Global `window.Strata` API for modal and toast interactions
- `$strata` magic helper for Alpine.js contexts
- Plugin registration for collapse, anchor, and focus

## Color System

### Available Colors
Based on the actual theme file (`strata-theme.css`), the color system includes:

**Core Colors:**
- `primary` - Purple-tinted primary color
- `accent` - Pink/red accent color for interactive elements  
- `destructive` - Red color for destructive actions
- `secondary` - Neutral slate for secondary elements
- `muted` - Muted slate for subtle elements

**Additional Colors:**
- `teal`, `yellow`, `indigo` - Available for chart colors
- **Note**: There is NO `success` or `warning` color defined in this package

### Semantic Variables
- `background` / `foreground` - Main page colors
- `card` / `card-foreground` - Card container colors
- `border` / `input` - Border and input styling
- `ring` - Focus ring color
- `sidebar` - Sidebar-specific colors

### Dark Mode
The package includes comprehensive dark mode support with automatic color switching via the `.dark` class.

## Component Categories

### Core UI Components
- **Button**: Multiple variants (primary, secondary, destructive, outline, ghost) with icon support
- **Badge**: Solid/outline/soft variants with dismissible functionality  
- **Alert**: Contextual messaging with action slots
- **Card**: Simple container with size variants
- **Avatar**: Image/initials/icon with status indicators and automatic fallbacks

### Form System (`form.*` namespace)
- **Input**: Icons, clearable functionality, password toggles, slots
- **Textarea**: Auto-resize capability
- **Checkbox/Radio**: Required props enforced (name, id, value, label)
- **Toggle**: Animated switch with hidden field handling
- **Group**: Label/help/error text management
- **ChoiceGroup**: Fieldset wrapper for related checkboxes/radios

### Advanced Components
- **Calendar**: Date/range selection with presets, validation, Livewire integration
- **Modal**: Named modal system with trigger/close components
- **Table**: Composable table with header/body/footer, sorting, loading states
- **Toast**: Notification system with action buttons and positioning
- **Tooltip**: Hover-triggered with Alpine anchor positioning

## Key Technical Patterns

### CSS Variable System
Uses Tailwind v4's `@theme` system with semantic naming:
- Color palette: Custom OKLCH colors for consistent appearance
- Typography: Font families (Geist, Lora, Fira Code)
- Radius: Single `--radius` value with calculated variants (sm, md, lg, xl)
- Shadows: Multiple shadow levels from 2xs to 2xl
- Dark mode: Complete color remapping for dark theme

### Alpine.js Integration
- Components use `x-data` with configuration objects
- `x-modelable` for Livewire wire:model compatibility
- Event-driven modal/toast system via `CustomEvent`
- Plugin safety checks to avoid conflicts

### Livewire Integration
- Custom `DateRangeSynth` for DateRange value objects
- All form components support `wire:model`
- Toast notifications work from server-side via `Strata::toast()`

## Development Guidelines

### Creating New Components
1. Create PHP class in `src/View/Components/[Category]/`
2. Create Blade template in `resources/views/components/[category]/`
3. Follow existing patterns for props, slots, and styling
4. Use semantic CSS variables, not hardcoded Tailwind classes
5. Support both Alpine.js and Livewire interactions

### Color Usage
- Use semantic tokens: `text-primary`, `bg-accent`, `border-destructive`
- Available colors: `primary`, `accent`, `destructive`, `secondary`, `muted`
- **Avoid**: References to `success`, `warning`, `info` colors (not defined)
- Support dark mode with the existing semantic color behavior

### Required Props Pattern
Recent components enforce required props (especially forms):
- Checkbox: `name`, `id`, `value`, `label` all required
- Form.Group: `label`, `for` both required
- Follow this pattern for new components

### Alpine.js Best Practices
- Register components via `Alpine.data()` in `document.addEventListener('alpine:init')`
- Use `x-modelable` for two-way binding
- Implement proper cleanup in component destroy hooks
- Test plugin compatibility with existing Alpine instances

## File Organization

```
packages/strata-ui/
├── resources/
│   ├── css/strata-theme.css      # CSS variables & theme tokens
│   ├── js/
│   │   ├── strata.js             # Main JS bundle with Alpine integration
│   │   └── modal.js              # Modal-specific functionality
│   ├── views/components/         # Blade component templates
│   │   ├── form/                 # Form component templates
│   │   ├── modal/                # Modal component templates
│   │   ├── table/                # Table component templates
│   │   └── *.blade.php           # Core UI component templates
│   └── lang/                     # Translations (en/, fr/)
├── src/
│   ├── View/Components/          # PHP component classes
│   │   ├── Form/                 # Form component classes
│   │   ├── Modal/                # Modal component classes
│   │   ├── Table/                # Table component classes
│   │   └── *.php                 # Core UI component classes
│   ├── ValueObjects/             # DateRange, Modal, Toast objects
│   ├── Synthesizers/             # Livewire synthesizers
│   ├── Facades/Strata.php        # Toast/modal facade
│   ├── StrataServiceProvider.php # Package service provider
│   └── StrataUIService.php       # Core service class
├── routes/web.php                # Asset serving routes
└── package.json                  # Node dependencies (Alpine.js + plugins)
```

## Important Notes

### Typography System
The package includes comprehensive semantic typography defaults:
- Headings (h1-h6) with automatic sizing and font weights
- Body text with proper line height
- Links with accent color and hover underlines
- Code elements with monospace font and background
- Blockquotes with accent border

### Asset Serving
The package includes a custom route for serving JavaScript assets via `@strataScripts` directive, making it framework-agnostic for asset delivery.

### Plugin Dependencies
Core Alpine.js plugins are bundled: `@alpinejs/collapse`, `@alpinejs/anchor`, `@alpinejs/focus`. The JavaScript intelligently detects and integrates with existing Alpine instances (e.g., from Livewire).

### Internationalization
Components support localization through Laravel's translation system, with language files in `resources/lang/` for English and French.

### Base Input Utilities
The theme includes a `.input-base` utility class that provides consistent styling for all form inputs, including focus states, disabled states, and proper transitions.