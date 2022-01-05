<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Product;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserOffice;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        UserDetail::truncate();
        UserOffice::truncate();

        $addresses = Address::factory(10)->create();
        $select_address = $addresses->random();

        $users = User::factory(10)
            ->has(
                UserDetail::factory()
                    ->count(1)
                    ->for($select_address)
            )
            ->has(
                UserOffice::factory()
                    ->count(1)
                    ->for($select_address)
            )
            ->create();

        $products = Product::all();
        User::all()->each(function ($user) use ($products) {
            $user->products()->attach(
                $products->random(rand(1, 10))->pluck('id')->toArray()
            );
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
