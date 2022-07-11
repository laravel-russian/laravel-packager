<?php

namespace LaravelRussian\Packager;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\ServiceProvider;

/**
 * This is the service provider.
 *
 * Place the line below in the providers array inside app/config/app.php
 * <code>'LaravelRussian\Packager\PackagerServiceProvider',</code>
 *
 * @author LaravelRussian
 **/
class PackagerServiceProvider extends ServiceProvider
{
    /**
     * The console commands.
     *
     * @var bool
     */
    protected $commands = [
        'LaravelRussian\Packager\Commands\NewPackage',
        'LaravelRussian\Packager\Commands\RemovePackage',
        'LaravelRussian\Packager\Commands\GetPackage',
        'LaravelRussian\Packager\Commands\GitPackage',
        'LaravelRussian\Packager\Commands\ListPackages',
        'LaravelRussian\Packager\Commands\MoveTests',
        'LaravelRussian\Packager\Commands\CheckPackage',
        'LaravelRussian\Packager\Commands\PublishPackage',
        'LaravelRussian\Packager\Commands\EnablePackage',
        'LaravelRussian\Packager\Commands\DisablePackage',
    ];

    /**
     * Bootstrap the application events.
     *
     * @throws BindingResolutionException
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/packager.php' => config_path('packager.php'),
        ]);
    }

    /**
     * Register the command.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/packager.php', 'packager');

        $this->commands($this->commands);
    }
}
