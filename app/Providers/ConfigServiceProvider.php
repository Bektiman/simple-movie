<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $config= [
            'title' => 'Config Service Provider',
            'year' => '2022',
            'theme' => 'dark'

        ];
        View::share('config', $config);
    }
}
