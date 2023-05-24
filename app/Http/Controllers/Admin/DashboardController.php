<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        // Customer::whereMonth('created_at', Carbon::now()->month)->count();

        $all_customer_cnt = User::all()->count();
        $all_customer_month_cnt = User::whereMonth('created_at', Carbon::now()->month)->count();

        $all_orders = Order::where('status', '!=', 'Waiting');
        $all_orders_month = Order::where('status', '!=', 'Waiting')->whereMonth('created_at', Carbon::now()->month);



        $all_orders_cnt = $all_orders->count();
        $all_orders_earning = $all_orders->where('pay_status', 'PAID')->sum('total_price');

        $all_orders_month_cnt = $all_orders_month->count();
        $all_orders_month_earning = $all_orders_month->where('pay_status', 'PAID')->sum('total_price');

        $month_diff = intval(Carbon::now()->startOfYear()->diffInMonths(Carbon::now()->startOfMonth()));
        $months = [];
        for ($i = 0; $i <= $month_diff; $i++) {
            $date3 = Carbon::now()->startOfYear()->addMonths($i)->format('m');
            array_push($months, $date3);
        }

        $order_rec = [];
        $order_cnt = [];
        foreach ($months as $key => $value) {
            $order_rec[] = Order::where('status', '!=', 'Waiting')->where(DB::raw("DATE_FORMAT(created_at, '%m')"), $value)->sum('total_price');
            $order_cnt[] = Order::where('status', '!=', 'Waiting')->where(DB::raw("DATE_FORMAT(created_at, '%m')"), $value)->count();
        }

        $dates_only_graph_date = $months;
        $dates_only_graph_count = $order_cnt;
        $dates_only_graph_earn = $order_rec;

        $web_order = $all_orders->where('platform', 'web')->count();
        $app_order = $all_orders_cnt - $web_order;

        $items =  Product::where('status', 1)->where('stock', '<=', 0)->take(10)->get();



        $data = [
            'all_customer_cnt' => $all_customer_cnt,
            'all_customer_month_cnt' => $all_customer_month_cnt,
            'all_orders_cnt' => $all_orders_cnt,
            'all_orders_earning' => $all_orders_earning,
            'all_orders_month_cnt' => $all_orders_month_cnt,
            'all_orders_month_earning' => $all_orders_month_earning,
            'dates_only_graph_date' => $dates_only_graph_date,
            'dates_only_graph_count' => $dates_only_graph_count,
            'dates_only_graph_earn' => $dates_only_graph_earn,
            'web_order' => $web_order,
            'app_order' => $app_order
        ];
        return view('admin.dashboard', compact('data', 'items'));
    }
}
