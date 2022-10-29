<?php

namespace App\Providers;

use App\Services\Google\GoogleService;
use Illuminate\Support\ServiceProvider;

class MapProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(GoogleService::class,fn()=>new GoogleService());
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
