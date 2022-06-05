<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Categories;

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
        view()->composer(
            'partials.header',
            function ($view) {
                $view->with('categories', Categories::where('status', '=', '1')->get());
            }
        );
    }
}
