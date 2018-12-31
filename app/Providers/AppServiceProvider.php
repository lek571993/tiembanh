<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['frontend.blocks.header', 'frontend.pages.shopping_cart', 'frontend.pages.checkout'], function ($view) {
            $content = Cart::content();
            $view->with('content', $content);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
