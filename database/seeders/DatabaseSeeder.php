<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProductSeeder::class);
        $this->call(ContentSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(OtherSeeder::class);
        $this->call(OrderSeeder::class);
    }
}
