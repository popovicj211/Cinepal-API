<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CategoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Contracts\CategoriesContract' , 'App\Services\CategoriesService'
        );
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
