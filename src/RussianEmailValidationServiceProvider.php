<?php

namespace Kolyayurev\RussianEmailValidation;

use Illuminate\Support\ServiceProvider;

class RussianEmailValidationServiceProvider extends ServiceProvider
{
    protected string $vendor  = 'kolyayurev';

    protected string $name  = 'russian-email-validation';

    /**
     * Register
     *
     * @return void
     */
    public function register(): void
    {

        if ($this->app->runningInConsole()) {
            $this->registerPublishableResources();
        }

        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', $this->name
        );

    }

    /**
     * Bootstrap
     *
     * @return void
     */
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/../lang', $this->name);
    }

    /**
     * Register the publishable files.
     *
     * @return void
     */
    private function registerPublishableResources(): void
    {
        $publishable = [
            'config' => [
                __DIR__.'/../config/config.php' => config_path($this->name.'.php')
            ],
            'lang' => [
                __DIR__.'/../lang' => $this->app->langPath('vendor'.DIRECTORY_SEPARATOR.$this->name),
            ],
        ];

        foreach ($publishable as $group => $paths) {
            $this->publishes($paths,"{$this->name}-{$group}");
        }

    }
}
