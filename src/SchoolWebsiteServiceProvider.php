<?php

namespace Tmss\School_website;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class SchoolWebsiteServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/Database/migrations');

        $this->loadViewsFrom(__DIR__.'/views', 'school_website');
        $this->publishes([
            __DIR__.'/views' => resource_path('views/vendor/school_website'),
        ]);

        $this->mergeConfigFrom(
            __DIR__.'/config/school_website.php',
            'school_website'
        );
        $this->mergeConfigFrom(
            __DIR__.'/config/fontawesome_icon.php',
            'school_website'
        );
        $this->publishes([
            __DIR__.'/config/school_website.php' => config_path('school_website.php')
        ]);
        $this->publishes([
            __DIR__.'/config/fontawesome_icon.php' => config_path('fontawesome_icon.php')
        ]);

        $this->publishes([
            __DIR__.'/public/front_assets' => public_path('vendor/front_assets'),
        ], 'public');
    }

    public function register()
    {
        //
    }
}