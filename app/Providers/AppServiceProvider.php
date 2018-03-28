<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $dirs = scandir(public_path('content/'));
        $validDataYears = [];
        foreach($dirs as $dir) {
            if(strlen ($dir) == 4) {
                array_push($validDataYears,$dir);
            }
        }
        arsort($validDataYears);
        View::share('menu', $validDataYears);
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
