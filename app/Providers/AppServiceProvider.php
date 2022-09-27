<?php

namespace App\Providers;

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
        // MYSQLが767byte以内に制限する(MYSQLにバージョンが5.7以下に場合)
        \Illuminate\Support\Facades\Schema::defaultStringLength(191);

        if(\App::environment(['production'])) {
            \URL::forceScheme('https');
        }
    }
}
