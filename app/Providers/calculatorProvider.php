<?php

namespace App\Providers;

use App\services\Mathhelper;
use Illuminate\Support\ServiceProvider;

class calculatorProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        //calling the service of math helper

        app()->bind("mathhelper",function()
        {

            return "this is math helper service";

        });

    }
}
