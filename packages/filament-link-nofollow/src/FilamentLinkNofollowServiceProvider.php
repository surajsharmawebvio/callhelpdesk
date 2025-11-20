<?php

namespace Webvio\FilamentLinkNofollow;

use Illuminate\Support\ServiceProvider;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Webvio\FilamentLinkNofollow\Console\Commands\BuildAssetsCommand;

class FilamentLinkNofollowServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/filament-link-nofollow.php',
            'filament-link-nofollow'
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                BuildAssetsCommand::class,
            ]);

            // Publish configuration
            $this->publishes([
                __DIR__.'/../config/filament-link-nofollow.php' => config_path('filament-link-nofollow.php'),
            ], 'filament-link-nofollow-config');

            // Publish assets
            $this->publishes([
                __DIR__.'/../resources/dist/custom-link.js' => public_path('js/filament-link-nofollow/custom-link.js'),
            ], 'filament-link-nofollow-assets');
        }

        // Register the custom link JavaScript extension
        FilamentAsset::register([
            Js::make(
                'filament-link-nofollow',
                __DIR__.'/../resources/dist/custom-link.js'
            )->loadedOnRequest(),
        ], 'webvio/filament-link-nofollow');
    }
}
