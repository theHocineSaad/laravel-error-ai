<?php

namespace TheHocineSaad\LaravelErrorAi;

use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Exceptions\Renderer\Listener;
use Illuminate\Foundation\Exceptions\Renderer\Mappers\BladeMapper;
use Illuminate\Foundation\Exceptions\Renderer\Renderer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\ErrorHandler\ErrorRenderer\HtmlErrorRenderer;

class LaravelErrorAiServiceProvider extends ServiceProvider
{
    public function register()
    {
        app()->bind(Renderer::class, fn () => new LaravelErrorAiRenderer(
            $this->app->make(Factory::class),
            $this->app->make(Listener::class),
            $this->app->make(HtmlErrorRenderer::class),
            $this->app->make(BladeMapper::class),
            $this->app->basePath(),
        ));

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
