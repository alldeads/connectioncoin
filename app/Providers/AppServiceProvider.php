<?php

namespace App\Providers;

use App\Coin;
use App\Story;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        date_default_timezone_set('America/New_York');

        Blade::component('components.alert', 'alert');
        Blade::include('shared.alerts', 'sharedAlerts');

        view()->composer('layouts.report', function ( $view ) {

            $view->with('circulation', Coin::circulation() );
            $view->with('connections', Story::connections() );
        } );
    }
}
