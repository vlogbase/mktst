<?php

namespace App\Providers;

use App\Http\Middleware\MaintenanceControl;
use App\Models\Category;
use App\Models\Message;
use App\Models\Order;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Livewire\Livewire;

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

        $notifications =
            [
                'new_orders' => Order::where('status', 'New Order')
                    ->get(),
                'new_messages' => Message::where('status', 0)
                    ->get(),
            ];

        View::share('notifications', $notifications);
    }
}
