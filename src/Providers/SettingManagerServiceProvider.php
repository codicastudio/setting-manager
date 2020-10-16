<?php

namespace codicastudio\SettingManager\Providers;

use codicastudio\SettingManager\Http\Middleware\Authorize;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Nova;

class SettingManagerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../Resources/views', 'setting-manager');

        $this->registerRoutes();

        if ($this->app->runningInConsole()) {
            // Publish config
            $this->publishes([
                __DIR__.'/../Config/' => config_path(),
            ], 'setting-manager');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../Config/setting-manager.php',
            'setting-manager'
        );
    }

    protected function registerRoutes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova', Authorize::class])
            ->group(__DIR__.'/../Routes/api.php');
    }
}
