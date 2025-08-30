<?php

namespace TheHocineSaad\LaravelErrorAi;

use Illuminate\Foundation\Exceptions\Renderer\Exception;
use Illuminate\Foundation\Exceptions\Renderer\Renderer;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Throwable;

class LaravelErrorAiRenderer extends Renderer
{
    /**
     * Render the given exception as an HTML string.
     *
     * @return string
     */
    public function render(Request $request, Throwable $throwable)
    {
        $flattenException = $this->bladeMapper->map(
            $this->htmlErrorRenderer->render($throwable),
        );

        $exception = new Exception($flattenException, $request, $this->listener, $this->basePath);

        $exceptionAsMarkdown = $this->viewFactory->make('laravel-exceptions-renderer::markdown', [
            'exception' => $exception,
        ])->render();

        return $this->viewFactory->make('laravel-exceptions-renderer::show', [
            'exception' => $exception,
            'exceptionAsMarkdown' => $exceptionAsMarkdown,
            'uriEncodedExceptionMarkdown' => urlencode($exceptionAsMarkdown),
        ])->render();
    }

    /**
     * Get the renderer's CSS content.
     *
     * @return string
     */
    public static function css()
    {
        return (new Collection([
            ['styles.css', []],
            ['light-mode.css', ['data-theme' => 'light']],
            ['dark-mode.css', ['data-theme' => 'dark']],
        ]))->map(function ($fileAndAttributes) {
            [$filename, $attributes] = $fileAndAttributes;

            $path = public_path('vendor/laravel-error-ai/'.$filename);
            $content = is_file($path) ? file_get_contents($path) : '';

            return '<style '.(new Collection($attributes))->map(function ($value, $attribute) {
                return $attribute.'="'.$value.'"';
            })->implode(' ').'>'
                .$content
                .'</style>';
        })->implode('');
    }
}
