<?php

namespace App\Providers;

use App\Models\GeneralSetting;
use App\Models\SocialSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\CentralLogics\CartLogics;
use App\CentralLogics\Helpers;

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
        view()->composer('*', function($settings) {
            $settings->with('gs', GeneralSetting::find(1));
            $settings->with('sociallinks', SocialSetting::find(1));
        });

        // Share Cart and Helper classes with all views
        View::composer('*', function ($view) {
            $view->with('CartLogics', CartLogics::class);
            $view->with('Helpers', Helpers::class);
        });
    }
}
