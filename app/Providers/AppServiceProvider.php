<?php

namespace App\Providers;

use App\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Carbon::setLocale('fr');
        setlocale(LC_TIME, 'fr_FR.utf8', 'fr');
        
        view()->composer('*', function ($view) {
            $view->with('categories', Category::select('id', 'name', 'slug')->get());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
