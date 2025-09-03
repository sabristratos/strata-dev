<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Theme
    |--------------------------------------------------------------------------
    |
    | This option controls the default theme that will be used by Strata UI
    | components. You can set this to 'light', 'dark', or 'auto' for
    | automatic theme detection based on user preferences.
    |
    */

    'theme' => env('STRATA_UI_THEME', 'auto'),

    /*
    |--------------------------------------------------------------------------
    | Component Prefix
    |--------------------------------------------------------------------------
    |
    | This option allows you to customize the prefix used for Strata UI
    | components. By default, components are accessed via x-strata::
    |
    */

    'prefix' => env('STRATA_UI_PREFIX', 'strata'),

    /*
    |--------------------------------------------------------------------------
    | Component Groups
    |--------------------------------------------------------------------------
    |
    | Control which component groups are registered. Disabling unused groups
    | can improve performance by reducing the number of registered components.
    | Set any group to false to disable registration of those components.
    |
    */

    'components' => [
        'core' => env('STRATA_UI_CORE_COMPONENTS', true),           // Alert, Avatar, Badge, Button, etc.
        'layout' => env('STRATA_UI_LAYOUT_COMPONENTS', true),       // MainContent, Modal, Sidebar, etc.
        'interactive' => env('STRATA_UI_INTERACTIVE_COMPONENTS', true), // Accordion, Calendar, Carousel, etc.
        'form' => env('STRATA_UI_FORM_COMPONENTS', true),           // Input, Select, Checkbox, etc.
        'table' => env('STRATA_UI_TABLE_COMPONENTS', true),         // Table, Body, Cell, Header, etc.
        'subcomponents' => env('STRATA_UI_SUB_COMPONENTS', true),   // AccordionItem, DropdownCheckbox, etc.
    ],

    /*
    |--------------------------------------------------------------------------
    | Asset Serving
    |--------------------------------------------------------------------------
    |
    | Configure how Strata UI serves its compiled JavaScript assets.
    | 'route' serves assets via Laravel route, 'static' expects published assets.
    |
    */

    'assets' => [
        'strategy' => env('STRATA_UI_ASSETS', 'route'), // 'route' or 'static'
        'cache_duration' => 31536000, // 1 year in seconds
    ],

    /*
    |--------------------------------------------------------------------------
    | Icon Set
    |--------------------------------------------------------------------------
    |
    | Configure the default icon set used by Strata UI components.
    | Currently supports 'heroicons' out of the box.
    |
    */

    'icons' => [
        'default_set' => 'heroicons',
        'prefix' => 'heroicon',
    ],

    /*
    |--------------------------------------------------------------------------
    | Animation Settings
    |--------------------------------------------------------------------------
    |
    | Configure animation behavior across all components.
    | 'enabled' can be disabled for reduced motion preferences.
    | 'duration' affects global animation speed: fast, normal, slow.
    |
    */

    'animations' => [
        'enabled' => env('STRATA_UI_ANIMATIONS', true),
        'duration' => env('STRATA_UI_ANIMATION_DURATION', 'normal'),
        'reduce_motion' => env('STRATA_UI_REDUCE_MOTION', 'auto'), // auto, true, false
    ],

    /*
    |--------------------------------------------------------------------------
    | Component Defaults
    |--------------------------------------------------------------------------
    |
    | Default settings for interactive components.
    | These can be overridden on individual component instances.
    |
    */

    'defaults' => [
        'toast_duration' => (int) env('STRATA_UI_TOAST_DURATION', 5000),
        'modal_closable' => env('STRATA_UI_MODAL_CLOSABLE', true),
        'focus_trap' => env('STRATA_UI_FOCUS_TRAP', true),
        'sidebar_persistent' => env('STRATA_UI_SIDEBAR_PERSISTENT', false),
        'accordion_animated' => env('STRATA_UI_ACCORDION_ANIMATED', true),
    ],

    /*
    |--------------------------------------------------------------------------
    | Debug Settings
    |--------------------------------------------------------------------------
    |
    | Development and debugging options. These should typically be disabled
    | in production for performance and security.
    |
    */

    'debug' => [
        'component_logging' => env('STRATA_UI_DEBUG_LOGGING', false),
        'show_performance' => env('STRATA_UI_DEBUG_PERFORMANCE', false),
        'verbose_errors' => env('STRATA_UI_DEBUG_VERBOSE', false),
    ],
];
