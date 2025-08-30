<?php

declare(strict_types=1);

namespace Strata\UI;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Strata\UI\Facades\Strata;
use Strata\UI\Synthesizers\DateRangeSynth;
use Strata\UI\View\Components\Carousel;
use Strata\UI\View\Components\Form\ColorPicker;
use Strata\UI\View\Components\Form\Editor;

class StrataServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'strata');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'strata');

        Blade::componentNamespace('Strata\\UI\\View\\Components', 'strata');

        Blade::component('strata::editor', Editor::class);
        Blade::component('strata::form.color-picker', ColorPicker::class);
        Blade::component('strata::carousel', Carousel::class);

        Livewire::propertySynthesizer(DateRangeSynth::class);

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->registerBladeDirectives();

        if ($this->app->runningInConsole()) {
            // Publish CSS theme files
            $this->publishes([
                __DIR__.'/../resources/css' => resource_path('css/vendor/strata-ui'),
            ], 'strata-ui-assets');

            // Publish compiled JavaScript assets
            $this->publishes([
                __DIR__.'/../resources/dist' => public_path('vendor/strata-ui'),
            ], 'strata-ui-assets');

            // Publish views for customization
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/strata-ui'),
            ], 'strata-ui-views');

            // Publish language files
            $this->publishes([
                __DIR__.'/../resources/lang' => $this->app->langPath('vendor/strata-ui'),
            ], 'strata-ui-lang');

            // Publish configuration file
            $this->publishes([
                __DIR__.'/../config/strata-ui.php' => config_path('strata-ui.php'),
            ], 'strata-ui-config');
        }
    }

    public function register(): void
    {
        $this->app->singleton(StrataUIService::class, function () {
            return new StrataUIService;
        });

        $loader = AliasLoader::getInstance();
        $loader->alias('Strata', Strata::class);
    }

    /**
     * Register the custom Blade directive.
     */
    protected function registerBladeDirectives(): void
    {
        Blade::directive('strataScripts', function ($expression) {
            return '<?php
                $publishedPath = public_path("vendor/strata-ui/strata-ui.iife.js");
                if (file_exists($publishedPath)) {
                    $version = filemtime($publishedPath);
                    $assetUrl = asset("vendor/strata-ui/strata-ui.iife.js") . "?v=" . $version;
                    echo "<!-- Strata UI Debug: Loading from " . $assetUrl . " -->";
                    echo "<script src=\"" . $assetUrl . "\" defer></script>";
                    echo "<script>console.log(\"Strata UI: Script loaded from " . $assetUrl . "\");</script>";
                } else {
                    echo "<!-- Strata UI: JavaScript bundle not found at " . $publishedPath . " -->";
                    echo "<script>console.error(\"Strata UI: JavaScript bundle not found. Please run: php artisan vendor:publish --tag=strata-ui-assets\");</script>";
                }
            ?>';
        });
    }
}
