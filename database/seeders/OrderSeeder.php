<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderBilling;
use App\Models\OrderDetail;
use App\Models\OrderProduct;
use App\Models\OrderRule;
use App\Models\OrderShipping;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Order::truncate();
        OrderProduct::truncate();
        OrderShipping::truncate();
        OrderBilling::truncate();
        OrderRule::truncate();


        OrderRule::create([
            'name' => 'min_order_cost',
            'price' => 100,

        ]);

        for ($x = 0; $x < 3; $x++) {
            $users = User::all()->random(5);
            foreach ($users as $user) {
                $products = Product::all()->random(3);
                $order = Order::create([
                    'ordercode' => Str::random(12),
                    'cart_price' => $products->sum('unit_price'),
                    'shipment_price' => 0,
                    'discount_price' => 0,
                    'total_price' => $products->sum('unit_price'),
                    'pay_type' => 'Online Payment',
                    'pay_status' => 'PAID',
                    'user_id' => $user->id,
                    'notes' => $faker->text(1000),

                ]);

                OrderShipping::create([
                    'order_id' =>  $order->id,
                    'address_id' => $user->useroffices->first()->address->id,
                    'name' => $user->useroffices->first()->name,
                    'surname' => $user->useroffices->first()->surname,
                    'email' => $user->useroffices->first()->email,
                    'phone' => $user->useroffices->first()->phone,
                    'mobile' => $user->useroffices->first()->mobile,
                ]);

                OrderBilling::create([
                    'order_id' =>  $order->id,
                    'address_id' => $user->useroffices->first()->address->id,
                    'company_name' => $user->name,
                    'vat' => $user->vat,
                    'registeration' => $user->registeration,
                ]);

                foreach ($products as $item) {
                    OrderProduct::create([
                        'order_id' => $order->id,
                        'product_id' => $item->id,
                        'quantity' => 1,
                        'sold_price' => $item->unit_price * 1,
                    ]);
                }
            }
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
