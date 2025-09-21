<?php

namespace TheHocineSaad\LaravelErrorAi;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class LaravelErrorAiServiceProvider extends ServiceProvider
{
    public function register()
    {
        View::prependNamespace(
            'laravel-exceptions-renderer',
            [
                __DIR__.'/../resources/views',
            ]
        );
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/dist/styles.css' => public_path('vendor/laravel-error-ai/styles.css'),
            ], 'laravel-assets');
        }
    }
}
