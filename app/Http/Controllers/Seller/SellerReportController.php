<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class SellerReportController extends Controller
{
    public function stock_sale(Request $request)
    {
        if ($request->ajax()) {
            $seller = auth('seller')->user();
            $sellerDetail = $seller->sellerDetail;
            $sellerDetail_id = $sellerDetail->id;

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
            $raw_sql .= " AND seller_details.id = $sellerDetail_id";

            $raw_sql .= " ORDER BY orders.created_at DESC";

            $data = DB::select($raw_sql);

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('supplier_name', function ($row) {
                    return ($row->supplier_name) ? $row->supplier_name : 'Admin';
                })
                //filter by supplier_name
                ->make(true);
        }
        return view('seller.reports.stock_sale');
    }

    public function bulk_api_logs(Request $request)
    {

        if ($request->ajax()) {
            $seller_id = auth('seller')->user()->id;
            //seller_api_key_logs.created_at, seller_api_key_logs.api_key, sellers.name, sellers.email
            $raw_sql = "SELECT
            seller_api_key_logs.id as id,
            seller_api_key_logs.created_at as created_at, 
            seller_api_key_logs.api_key as api_key,
            sellers.name as seller_name,
            sellers.email as seller_email
            FROM seller_api_key_logs 
            JOIN sellers ON seller_api_key_logs.seller_id = sellers.id 
            WHERE seller_api_key_logs.seller_id = '".$seller_id."'
            ORDER BY seller_api_key_logs.created_at DESC";
            $data = DB::select($raw_sql);

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)->format('Y-m-d H:i:s');
                })
                ->make(true);
        }
        return view('seller.reports.bulk_api_logs');
    }
}
