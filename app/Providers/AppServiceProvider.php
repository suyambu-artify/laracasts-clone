<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('hasstartserie',function($serie){
            return auth()->user()->hasstartserie($serie);
        });

        Blade::if('isAdmin',function (){
            return auth()->user()->isAdmin();
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
