<?php

declare(strict_types=1);

namespace Strata\UI;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Strata\UI\Facades\Strata;
use Strata\UI\Synthesizers\DateRangeSynth;
use Strata\UI\View\Components\Form\Editor;

class StrataServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'strata');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'strata');

        Blade::componentNamespace('Strata\\UI\\View\\Components', 'strata');
        
        Blade::component('strata::editor', Editor::class);
        
        Livewire::propertySynthesizer(DateRangeSynth::class);
        
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->registerBladeDirectives();

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/css/strata-theme.css' => resource_path('css/vendor/strata-theme.css'),
            ], 'strata-assets');

            $this->publishes([
                __DIR__.'/../resources/lang' => $this->app->langPath(),
            ], 'strata-translations');
        }
    }

    public function register(): void
    {
        $this->app->singleton(StrataUIService::class, function () {
            return new StrataUIService();
        });

        $loader = AliasLoader::getInstance();
        $loader->alias('Strata', Strata::class);
    }


    /**
     * Register the custom Blade directive.
     */
    protected function registerBladeDirectives(): void
    {
        Blade::directive('strataScripts', function () {
            $route = route('strata.scripts');
            return "\"<script src='{$route}' defer></script>\"";
        });
    }
}