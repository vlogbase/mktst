<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        $customerpagedata =
            [
                'categories' => Category::whereNull('category_id')
                    ->with('childrenCategories')
                    ->get(),
            ];


        View::share('customerpagedata', $customerpagedata);
    }
}
