<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\AdminAlert;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Admin::truncate();
        AdminAlert::truncate();

        Admin::factory(1)
            ->has(
                AdminAlert::factory()
                    ->count(1)
            )
            ->create();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
