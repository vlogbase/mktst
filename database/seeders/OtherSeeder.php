<?php

namespace Database\Seeders;

use App\Models\JobResume;
use App\Models\Newsletter;
use App\Models\PaymentMethod;
use App\Models\PointSystem;
use App\Models\Setting;
use App\Models\Shipping;
use Illuminate\Database\Seeder;

class OtherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Newsletter::truncate();
        Setting::truncate();
        JobResume::truncate();
        PointSystem::truncate();
        Shipping::truncate();
        PaymentMethod::truncate();

        Newsletter::factory(20)->create();
        Setting::factory(1)->create();
        JobResume::factory(20)->create();
        PointSystem::factory(1)->create();
        Shipping::factory(1)->create();

        PaymentMethod::create([
            'name' => 'Online Payment',
            'status' => 1,
        ]);
        PaymentMethod::create([
            'name' => 'Cash',
        ]);
        PaymentMethod::create([
            'name' => 'Cheque',
        ]);
        PaymentMethod::create([
            'name' => 'Bank Transfer',
        ]);
        PaymentMethod::create([
            'name' => 'Savoy Credit',
        ]);
        PaymentMethod::create([
            'name' => 'Point',
        ]);
    }
}
