<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Response;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('cap', function ($str) {
            return Response::make(strtoupper($str));
        });
        Response::macro('contact', function ($ct){
            $contact = '
                <form action="'.$ct.'" method="post">
                    Họ tên: <input type="text" /><br />
                    Tuổi: <input type="number" />
                </form>
            ';
            return Response::make($contact);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
