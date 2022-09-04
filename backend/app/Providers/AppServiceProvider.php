<?php

namespace App\Providers;

use App\Services\OpenWeatherService;
use App\Services\WeatherSearchService;
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
        $this->app->singleton(OpenWeatherService::class);
        $this->app->singleton(WeatherSearchService::class);
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
