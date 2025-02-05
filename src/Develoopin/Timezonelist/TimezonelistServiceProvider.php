<?php namespace Develoopin\Timezonelist;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

/**
 * TimezonelistServiceProvider
 *
 * @package Develoopin\Timezonelist
 * @author Jackie Do <anhvudo@gmail.com>
 */
class TimezonelistServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('timezonelist', function ($app) {
            return new Timezonelist;
        });

        $this->app->booting(function () {
            $loader = AliasLoader::getInstance();
            $loader->alias('Timezonelist', 'Develoopin\Timezonelist\Facades\Timezonelist');
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['timezonelist'];
    }
}
