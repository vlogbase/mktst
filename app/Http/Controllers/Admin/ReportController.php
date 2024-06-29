<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReportController extends Controller
{
    public function stock_sale(Request $request)
    {

        if ($request->ajax()) {
            $selected_seller = $request->seller_id;
            Log::info($selected_seller);



            $raw_sql = "SELECT
            order_products.id as id,
            orders.created_at as created_at, 
            orders.ordercode as order_number,
            products.name as product_name,
            products.sku as product_sku,
            brands.name as brand_name,
            seller_details.name as supplier_name,
            users.name as buyer_name, 
            order_products.sold_price as unit_price,
            order_products.quantity as quantity,
            ROUND(order_products.sold_price * order_products.quantity, 2) as total_price
            FROM orders 
            JOIN order_products ON orders.id = order_products.order_id
            JOIN products ON order_products.product_id = products.id 
            LEFT JOIN brands ON products.brand_id = brands.id
            LEFT JOIN seller_details ON brands.seller_detail_id = seller_details.id
            LEFT JOIN users ON orders.user_id = users.id
            WHERE orders.status != 'Waiting'";

            if ($request->filled('from_date') && $request->filled('to_date')) {
                $from_date = $request->from_date;
                $to_date = $request->to_date;
                $raw_sql .= " AND orders.created_at BETWEEN '$from_date' AND '$to_date'";
            }
            if($selected_seller != ''){
                $raw_sql .= " AND seller_details.id = $selected_seller";
            }



            $raw_sql .= " ORDER BY orders.created_at DESC";
            
            $data = DB::select($raw_sql);
            
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('supplier_name', function ($row) {
                    return ($row->supplier_name)? $row->supplier_name : 'Admin';
                })
                //filter by supplier_name
                ->make(true);
                
            

        }
        $sellers = DB::table('seller_details')->get();
        return view('admin.reports.stock_sale', compact('sellers'));
    }


    public function bulk_api_logs(Request $request)
    {

        if ($request->ajax()) {
            $admin_id = Auth::guard('admin')->user()->id;
            //admin_api_key_logs.created_at, admin_api_key_logs.api_key, admins.name, admins.email
            $raw_sql = "SELECT
            admin_api_key_logs.id as id,
            admin_api_key_logs.created_at as created_at, 
            admin_api_key_logs.api_key as api_key,
            admins.name as admin_name,
            admins.email as admin_email
            FROM admin_api_key_logs 
            JOIN admins ON admin_api_key_logs.admin_id = admins.id ORDER BY admin_api_key_logs.created_at DESC";
            $data = DB::select($raw_sql);

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->format('Y-m-d H:i:s');
                })
                ->make(true);
        }
        return view('admin.reports.bulk_api_logs');
    }
    
    
}
