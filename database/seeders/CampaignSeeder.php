<?php

namespace Database\Seeders;

use App\Models\Coupon;
use App\Models\UserCoupon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Coupon::truncate();

        Coupon::factory(30)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
