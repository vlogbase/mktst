<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function order_list(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::where('status', '!=', 'Waiting')->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function (Order $order) {

                    $btn = '<a href="/admin/orders/' . $order->id . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                    <span class="svg-icon svg-icon-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" />
                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    </a>';
                    return $btn;
                })
                ->addColumn('status', function (Order $order) {

                    if ($order->status == 'New Order') {
                        $spn = '<span class="text-info">New Order</span>';
                    } else if ($order->status == 'Ready Order') {
                        $spn = '<span class="text-dark">Ready Order</span>';
                    } else if ($order->status == 'Shipping Order') {
                        $spn = '<span class="text-primary">Shipping Order</span>';
                    } else if ($order->status == 'Completed Order') {
                        $spn = '<span class="text-success">Completed Order</span>';
                    } else if ($order->status == 'Canceled Order') {
                        $spn = '<span class="text-danger">Canceled Order</span>';
                    }


                    return $spn;
                })
                ->addColumn('pay_status', function (Order $order) {

                    if ($order->pay_status == 'PAID') {
                        $spn = '<span class="text-success"><i class="far fa-check-circle text-success"></i> PAID</span>';
                    } else {
                        $spn = '<span class="text-danger"><i class="far fa-times-circle text-danger"></i> WAIT</span>';
                    }

                    return $spn;
                })
                ->addColumn('created_at_visual', function (Order $order) {
                    return Carbon::parse($order->created_at)->diffForHumans();
                })
                ->addColumn('company', function (Order $order) {
                    $btn = '<a href="/admin/customers/' . $order->user_id . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                    ' . $order->user->name . '
                    </a>';
                    return $btn;
                })
                ->addColumn('items', function (Order $order) {
                    return $order->orderproducts->count();
                })
                ->rawColumns(['action', 'created_at_visual', 'status', 'pay_status', 'company'])
                ->make(true);
        }
        return view('admin.orders.order_list');
    }

    public function order_detail($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.orders.order_detail', compact('order'));
    }
}
