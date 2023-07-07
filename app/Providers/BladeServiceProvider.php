<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use App\Models\Admin;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //lỗi ko nhận model
        Blade::if('hasrole', function ($expression) {
            if (Auth::user()) {
                if (Auth::user()->hasRole($expression)) {
                    return true;
                }
            }
            return false;
        });
    }
}
