<?php

namespace App\Providers;

use View;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function($view)
        {
            $categories = DB::table('categories')->select('cate_name')->get();
            $sizes = DB::table('sizes')->select('size_code')->get();
            $colors = DB::table('colors')->select('color_name')->get();
            $view->with('categories_global', $categories);
            $view->with('sizes_global', $sizes);
            $view->with('colors_global', $colors);
        });
    }
}
