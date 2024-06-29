<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Ticket;
use App\Traits\PaymentStripeHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    use PaymentStripeHelper;
    public function profile()
    {
        $user = Auth::user();
        return view('customer.user.profile', compact('user'));
    }

    public function detail()
    {
        return view('customer.user.detail');
    }

    public function addresses()
    {
        return view('customer.user.addresses');
    }

    public function orders()
    {
        return view('customer.user.orders');
    }

    public function payments()
    {
        return view('customer.user.payments');
    }

    public function payments_add()
    {
        $user = Auth::user();
        return redirect($this->addNewMethodSession($user));
    }

    public function orders_detail($id)
    {
        $order = Order::findOrFail($id);
        if ($order->user_id == Auth::id()) {
            //Find Next Order
            $nextOrder = Order::where('id', '>', $order->id)->where('user_id', Auth::id())->orderBy('id', 'asc')->first();
            //Find Previous Order
            $previousOrder = Order::where('id', '<', $order->id)->where('user_id', Auth::id())->orderBy('id', 'desc')->first();

            return view('customer.user.order-detail', compact('order', 'nextOrder', 'previousOrder'));
        } else {
            return redirect()->back();
        }
    }

    public function download_invoice($id){
        $order = Order::findOrFail($id);
        if ($order->user_id == Auth::id()) {
            //Find Next Order

            //return redirect()->back();
            $pdf = Pdf::loadView('customer.user.invoice-detail', compact('order'));
            //change the name of the pdf file
            //$pdf->setPaper('a4', 'portrait');
            //name of the file
            //$pdf->setOption('filename', 'invoice-'.$order->order_code.'.pdf');

            return $pdf->download('Invoice-' . $order->ordercode . '.pdf');
            //return view('customer.user.invoice-detail', compact('order'));
        } else {
            return redirect()->back();
        }
    }

    public function favorites()
    {
        return view('customer.user.favorites');
    }

    public function tickets()
    {
        return view('customer.user.tickets');
    }

    public function tickets_detail($id)
    {
        $item = Ticket::findOrFail($id);
        return view('customer.user.tickets_detail', compact('item'));
    }

    public function tickets_new()
    {
        return view('customer.user.tickets_new');
    }

    public function stock_purchase(Request $request)
    {
        if ($request->ajax()) {
           $buyer_id = Auth::id();

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
            $raw_sql .= " AND orders.user_id = $buyer_id";

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
        return view('customer.user.stock_purchase');
    }
}
