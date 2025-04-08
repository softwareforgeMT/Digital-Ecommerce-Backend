<?php

namespace App\Providers;

use App\Models\GeneralSetting;
use App\Models\SocialSetting;
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
        view()->composer('*', function($settings) {
            $settings->with('gs', GeneralSetting::find(1));
            $settings->with('sociallinks', SocialSetting::find(1));
            
            // Add latest 3 active products for navbar
            $settings->with('navbarProducts', \App\Models\Product::active()
                ->select('id', 'name', 'slug', 'image', 'detection_status')
                ->latest()
                ->take(3)
                ->get()
            );
        });
    }
}
