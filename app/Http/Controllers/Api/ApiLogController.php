<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiLogController extends Controller
{
    public function add_api_key_log_admin($api_key, $admin_id)
    {
        DB::table('admin_api_key_logs')->insert([
            'api_key' => $api_key,
            'admin_id' => $admin_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }

    public function add_api_key_log_seller($api_key, $seller_id)
    {
        DB::table('seller_api_key_logs')->insert([
            'api_key' => $api_key,
            'seller_id' => $seller_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }

    

}
