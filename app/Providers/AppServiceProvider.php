<?php

namespace App\Providers;

use App\Contracts\ActorsContract;
use App\Contracts\CategoriesContract;
use App\Contracts\ContactContract;
use App\Contracts\MoviesContract;
use App\Contracts\PricelistContract;
use App\Contracts\SlidesContract;
use App\Contracts\UserContract;
use App\Services\ActorsService;
use App\Services\CategoriesService;
use App\Services\ContactService;
use App\Services\MoviesService;
use App\Services\PricelistService;
use App\Services\SlidesService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CategoriesContract::class , CategoriesService::class);
        $this->app->singleton( MoviesContract::class , MoviesService::class );
        $this->app->singleton(SlidesContract::class , SlidesService::class);
        $this->app->singleton(ActorsContract::class , ActorsService::class);
        $this->app->singleton(ContactContract::class , ContactService::class);
        $this->app->singleton(PricelistContract::class , PricelistService::class);
        $this->app->singleton(UserContract::class, UserService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
