<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Admin\Category\Category;

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

        view()->composer(
            /* ARRAY PARA SE UTLIZAR EM DIVERSAS VIEW's
            [
                'admin.products.index', // UTILIZADO APENAS PARA A VIEW INDEX'
            ],
            */

            'admin.products.*', // UTLIZADO PARA TODAS AS VIEW's
            function ($view) {
                // $view->with('categories', Category::all());
                $view->with('categories', Category::pluck('title', 'id'));
            }
        );
    }
}
