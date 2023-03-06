<?php

namespace App\Providers;


use App\Services\Stripe\StripeService;
use Illuminate\Support\ServiceProvider;

class StripeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // many instanation
        /*  $this->app->bind(StripeService::class,function(){
            return new StripeService(env('STRIPE_KEY'));
         });*/
        $this->app->singleton(StripeService::class, function () {
            return new StripeService(env('STRIPE_KEY'));
        });
     
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
