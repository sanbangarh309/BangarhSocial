<?php

namespace sandeep\BangarhSocial;

use Illuminate\Support\ServiceProvider;
use sandeep\BangarhSocial\San_Helpers;

class BangarhSocialServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'sandeep');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'sandeep');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        // include(__DIR__.'/San_Helpers.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {

            // Publishing the configuration file.
            $this->publishes([
                __DIR__.'/../config/bangarhsocial.php' => config_path('bangarhsocial.php'),
            ], 'bangarhsocial.config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/sandeep'),
            ], 'bangarhsocial.views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/sandeep'),
            ], 'bangarhsocial.views');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/sandeep'),
            ], 'bangarhsocial.views');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/bangarhsocial.php', 'bangarhsocial');
        $this->app->make('sandeep\BangarhSocial\Controllers\FbController');
        $this->app->make('sandeep\BangarhSocial\Controllers\LineController');
        $this->app->make('sandeep\BangarhSocial\Controllers\ButtonController');
        // Register the service the package provides.
        $this->app->singleton('bangarhsocial', function ($app) {
            return new BangarhSocial;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['bangarhsocial'];
    }
}