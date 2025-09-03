<?php

declare(strict_types=1);

namespace Strata\UI;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Strata\UI\Facades\Strata;
use Strata\UI\Synthesizers\DateRangeSynth;
use Strata\UI\Synthesizers\SingleDateSynth;
// Core Components
use Strata\UI\View\Components\Alert;
use Strata\UI\View\Components\Avatar;
use Strata\UI\View\Components\Badge;
use Strata\UI\View\Components\Button;
use Strata\UI\View\Components\Card;
use Strata\UI\View\Components\Icon;
use Strata\UI\View\Components\Separator;
use Strata\UI\View\Components\Tooltip;

// Layout Components
use Strata\UI\View\Components\MainContent;
use Strata\UI\View\Components\Modal;
use Strata\UI\View\Components\Popover;
use Strata\UI\View\Components\Section;
use Strata\UI\View\Components\Sidebar;
use Strata\UI\View\Components\SidebarGroup;
use Strata\UI\View\Components\SidebarToggle;

// Interactive Components
use Strata\UI\View\Components\Accordion;
use Strata\UI\View\Components\Calendar;
use Strata\UI\View\Components\Carousel;
use Strata\UI\View\Components\Dropdown;
use Strata\UI\View\Components\NavItem;
use Strata\UI\View\Components\Tabs;
use Strata\UI\View\Components\ToastContainer;

// Form Components
use Strata\UI\View\Components\Form\Checkbox;
use Strata\UI\View\Components\Form\ChoiceGroup;
use Strata\UI\View\Components\Form\ColorPicker;
use Strata\UI\View\Components\Form\Datepicker;
use Strata\UI\View\Components\Form\Editor;
use Strata\UI\View\Components\Form\Error;
use Strata\UI\View\Components\Form\FileUpload;
use Strata\UI\View\Components\Form\Group;
use Strata\UI\View\Components\Form\Helper;
use Strata\UI\View\Components\Form\Input;
use Strata\UI\View\Components\Form\Label;
use Strata\UI\View\Components\Form\Radio;
use Strata\UI\View\Components\Form\Rating;
use Strata\UI\View\Components\Form\Select;
use Strata\UI\View\Components\Form\Textarea;
use Strata\UI\View\Components\Form\Toggle;

// Table Components
use Strata\UI\View\Components\Table;
use Strata\UI\View\Components\Table\Body;
use Strata\UI\View\Components\Table\Cell;
use Strata\UI\View\Components\Table\Footer;
use Strata\UI\View\Components\Table\Header;
use Strata\UI\View\Components\Table\Row;
use Strata\UI\View\Components\Table\Vertical;
use Strata\UI\View\Components\Table\VerticalRow;

// Sub-Components
use Strata\UI\View\Components\Accordion\Item as AccordionItem;
use Strata\UI\View\Components\Dropdown\Checkbox as DropdownCheckbox;
use Strata\UI\View\Components\Dropdown\Radio as DropdownRadio;
use Strata\UI\View\Components\Modal\Close as ModalClose;
use Strata\UI\View\Components\Modal\Trigger as ModalTrigger;
use Strata\UI\View\Components\NotificationContent;
use Strata\UI\View\Components\Tabs\Content as TabsContent;
use Strata\UI\View\Components\Tabs\TabContent;
use Strata\UI\View\Components\Tabs\TabList;
use Strata\UI\View\Components\Tabs\TabTrigger;
use Strata\UI\View\Components\Tabs\Trigger as TabsTrigger;

class StrataServiceProvider extends ServiceProvider
{
    public function boot(): void
    {

        if (! app()->environment('production')) {
            $this->app['config']->set('view.compiled', storage_path('framework/views'));
            $this->app['config']->set('blade.cache', false);
        }

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'strata');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'strata');

        $prefix = config('strata-ui.prefix', 'strata');
        $this->registerStrataComponents($prefix);

        Livewire::propertySynthesizer(DateRangeSynth::class);
        Livewire::propertySynthesizer(SingleDateSynth::class);

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->registerBladeDirectives();

        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__.'/../resources/css' => resource_path('css/vendor/strata-ui'),
            ], 'strata-ui-assets');


            $this->publishes([
                __DIR__.'/../resources/dist' => public_path('vendor/strata-ui'),
            ], 'strata-ui-assets');


            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/strata-ui'),
            ], 'strata-ui-views');


            $this->publishes([
                __DIR__.'/../resources/lang' => $this->app->langPath('vendor/strata-ui'),
            ], 'strata-ui-lang');


            $this->publishes([
                __DIR__.'/../config/strata-ui.php' => config_path('strata-ui.php'),
            ], 'strata-ui-config');
        }
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/strata-ui.php', 'strata-ui');
        
        $this->app->singleton(StrataUIService::class, function () {
            return new StrataUIService;
        });

        $loader = AliasLoader::getInstance();
        $loader->alias('Strata', Strata::class);
    }

    /**
     * Register all Strata UI components with explicit registration.
     */
    protected function registerStrataComponents(string $prefix): void
    {
        // Core UI Components
        if (config('strata-ui.components.core', true)) {
            Blade::component("{$prefix}::alert", Alert::class);
            Blade::component("{$prefix}::avatar", Avatar::class);
            Blade::component("{$prefix}::badge", Badge::class);
            Blade::component("{$prefix}::button", Button::class);
            Blade::component("{$prefix}::card", Card::class);
            Blade::component("{$prefix}::icon", Icon::class);
            Blade::component("{$prefix}::separator", Separator::class);
            Blade::component("{$prefix}::tooltip", Tooltip::class);
        }

        // Layout Components
        if (config('strata-ui.components.layout', true)) {
            Blade::component("{$prefix}::main-content", MainContent::class);
            Blade::component("{$prefix}::modal", Modal::class);
            Blade::component("{$prefix}::popover", Popover::class);
            Blade::component("{$prefix}::section", Section::class);
            Blade::component("{$prefix}::sidebar", Sidebar::class);
            Blade::component("{$prefix}::sidebar-group", SidebarGroup::class);
            Blade::component("{$prefix}::sidebar-toggle", SidebarToggle::class);
        }

        // Interactive Components
        if (config('strata-ui.components.interactive', true)) {
            Blade::component("{$prefix}::accordion", Accordion::class);
            Blade::component("{$prefix}::calendar", Calendar::class);
            Blade::component("{$prefix}::carousel", Carousel::class);
            Blade::component("{$prefix}::dropdown", Dropdown::class);
            Blade::component("{$prefix}::nav-item", NavItem::class);
            Blade::component("{$prefix}::tabs", Tabs::class);
            Blade::component("{$prefix}::toast-container", ToastContainer::class);
        }

        // Form Components
        if (config('strata-ui.components.form', true)) {
            Blade::component("{$prefix}::form.checkbox", Checkbox::class);
            Blade::component("{$prefix}::form.choice-group", ChoiceGroup::class);
            Blade::component("{$prefix}::form.color-picker", ColorPicker::class);
            Blade::component("{$prefix}::form.datepicker", Datepicker::class);
            Blade::component("{$prefix}::form.editor", Editor::class);
            Blade::component("{$prefix}::form.error", Error::class);
            Blade::component("{$prefix}::form.file-upload", FileUpload::class);
            Blade::component("{$prefix}::form.group", Group::class);
            Blade::component("{$prefix}::form.helper", Helper::class);
            Blade::component("{$prefix}::form.input", Input::class);
            Blade::component("{$prefix}::form.label", Label::class);
            Blade::component("{$prefix}::form.radio", Radio::class);
            Blade::component("{$prefix}::form.rating", Rating::class);
            Blade::component("{$prefix}::form.select", Select::class);
            Blade::component("{$prefix}::form.textarea", Textarea::class);
            Blade::component("{$prefix}::form.toggle", Toggle::class);
        }

        // Table Components
        if (config('strata-ui.components.table', true)) {
            Blade::component("{$prefix}::table", Table::class);
            Blade::component("{$prefix}::table.body", Body::class);
            Blade::component("{$prefix}::table.cell", Cell::class);
            Blade::component("{$prefix}::table.footer", Footer::class);
            Blade::component("{$prefix}::table.header", Header::class);
            Blade::component("{$prefix}::table.row", Row::class);
            Blade::component("{$prefix}::table.vertical", Vertical::class);
            Blade::component("{$prefix}::table.vertical-row", VerticalRow::class);
        }

        // Sub-Components
        if (config('strata-ui.components.subcomponents', true)) {
            Blade::component("{$prefix}::accordion.item", AccordionItem::class);
            Blade::component("{$prefix}::dropdown.checkbox", DropdownCheckbox::class);
            Blade::component("{$prefix}::dropdown.radio", DropdownRadio::class);
            Blade::component("{$prefix}::modal.close", ModalClose::class);
            Blade::component("{$prefix}::modal.trigger", ModalTrigger::class);
            Blade::component("{$prefix}::notification-content", NotificationContent::class);
            Blade::component("{$prefix}::tabs.content", TabsContent::class);
            Blade::component("{$prefix}::tabs.tab-content", TabContent::class);
            Blade::component("{$prefix}::tabs.tab-list", TabList::class);
            Blade::component("{$prefix}::tabs.tab-trigger", TabTrigger::class);
            Blade::component("{$prefix}::tabs.trigger", TabsTrigger::class);
        }
    }

    /**
     * Register the custom Blade directive.
     */
    protected function registerBladeDirectives(): void
    {
        Blade::directive('strataScripts', function ($expression) {
            return '<?php
                $config = [
                    "theme" => config("strata-ui.theme", "auto"),
                    "animations" => [
                        "enabled" => config("strata-ui.animations.enabled", true),
                        "duration" => config("strata-ui.animations.duration", "normal"),
                        "reduce_motion" => config("strata-ui.animations.reduce_motion", "auto")
                    ],
                    "defaults" => [
                        "toast_duration" => config("strata-ui.defaults.toast_duration", 5000),
                        "modal_closable" => config("strata-ui.defaults.modal_closable", true),
                        "focus_trap" => config("strata-ui.defaults.focus_trap", true)
                    ],
                    "debug" => [
                        "component_logging" => config("strata-ui.debug.component_logging", false),
                        "show_performance" => config("strata-ui.debug.show_performance", false)
                    ]
                ];
                
                $developmentPath = base_path("packages/strata-ui/resources/dist/strata-ui.iife.js");
                $publishedPath = public_path("vendor/strata-ui/strata-ui.iife.js");
                
                if (file_exists($developmentPath)) {
                    $version = time(); // Always fresh for development
                    $assetUrl = asset("vendor/strata-ui/strata-ui.iife.js") . "?v=" . $version;
                    echo "<!-- Strata UI Debug: Loading from development path -->";
                    echo "<script>window.strataUIConfig = " . json_encode($config) . ";</script>";
                    echo "<script src=\"" . $assetUrl . "\" defer></script>";
                    if ($config["debug"]["component_logging"]) {
                        echo "<script>console.log(\"Strata UI: Script loaded (dev mode) from " . $assetUrl . "\");</script>";
                    }
                } elseif (file_exists($publishedPath)) {
                    $version = filemtime($publishedPath);
                    $assetUrl = asset("vendor/strata-ui/strata-ui.iife.js") . "?v=" . $version;
                    echo "<!-- Strata UI Debug: Loading from published path -->";
                    echo "<script>window.strataUIConfig = " . json_encode($config) . ";</script>";
                    echo "<script src=\"" . $assetUrl . "\" defer></script>";
                    if ($config["debug"]["component_logging"]) {
                        echo "<script>console.log(\"Strata UI: Script loaded from " . $assetUrl . "\");</script>";
                    }
                } else {
                    echo "<!-- Strata UI: JavaScript bundle not found -->";
                    echo "<script>console.error(\"Strata UI: JavaScript bundle not found. Please run: php artisan vendor:publish --tag=strata-ui-assets\");</script>";
                }
            ?>';
        });
    }
}
