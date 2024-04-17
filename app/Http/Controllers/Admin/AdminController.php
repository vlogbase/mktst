<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Admin::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('created_at_visual', function (Admin $admin) {
                    return Carbon::parse($admin->created_at)->diffForHumans();
                })
                ->rawColumns(['created_at_visual'])
                ->make(true);
        }

        return view('admin.accounts.index');
    }

    public function create()
    {
        return view('admin.accounts.create');
    }

}
