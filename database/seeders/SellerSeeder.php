<?php

namespace Database\Seeders;

use App\Models\Seller;
use App\Models\SellerDetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Seller::truncate();
        SellerDetail::truncate();
        Seller::factory()->count(5)->has(SellerDetail::factory()->count(1))->create();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

   
}
