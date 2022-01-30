<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    public function customer_list(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function (User $user) {

                    $btn = '<a href="/admin/customers/' . $user->id . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                    <span class="svg-icon svg-icon-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" />
                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    </a>
                    ';
                    return $btn;
                })
                ->addColumn('verified', function (User $user) {

                    if ($user->email_verified_at != NULL) {
                        $spn = '<i class="far fa-check-circle text-success"></i>';
                    } else {
                        $spn = '<i class="far fa-times-circle text-danger"></i>';
                    }

                    return $spn;
                })
                ->addColumn('phone', function (User $user) {
                    return $user->userdetail->mobile;
                })
                ->addColumn('type', function (User $user) {
                    return $user->userdetail->business_type;
                })
                ->addColumn('postcode', function (User $user) {
                    return $user->userdetail->address->postcode;
                })
                ->addColumn('price', function (User $user) {
                    return number_format($user->userorders->sum('total_price'), 2);
                })
                ->addColumn('created_at_visual', function (User $user) {
                    return Carbon::parse($user->created_at)->diffForHumans();
                })
                ->rawColumns(['action', 'created_at_visual', 'verified'])
                ->make(true);
        }
        return view('admin.customers.customer_list');
    }

    public function customer_detail($id)
    {
        $customer = User::findorFail($id);
        return view('admin.customers.customer_detail', compact('customer'));
    }
}
