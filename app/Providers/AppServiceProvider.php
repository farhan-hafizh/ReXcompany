<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;    
use Illuminate\Support\Facades\Blade;   


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Paginator::useBootstrap();

        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->role == "admin";
        });
        Blade::if('member', function () {
            return auth()->check() && auth()->user()->role == "member";
        });
    }
}
