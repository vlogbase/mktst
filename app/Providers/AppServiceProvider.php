<?php

namespace App\Providers;

use App\Http\Middleware\MaintenanceControl;
use App\Models\Category;
use App\Models\Message;
use App\Models\Order;
use Stripe\Stripe;
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

        Stripe::setApiKey(config('services.stripe.secret'));


        $customerpagedata =
            [
                'categories' => Category::whereNull('category_id')
                    ->with('childrenCategories')
                    ->orderBy('created_at', 'asc')
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
