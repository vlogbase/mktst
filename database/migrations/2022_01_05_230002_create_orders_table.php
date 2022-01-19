<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ordercode', 100)->unique();
            $table->decimal('cart_price', 10, 2);
            $table->decimal('vat_price', 10, 2)->default(0);
            $table->decimal('shipment_price', 10, 2);
            $table->decimal('discount_price', 10, 2);
            $table->decimal('total_price', 10, 2);
            $table->string('status', 100)->default('New Order');
            $table->string('pay_status', 100)->default('wait');
            $table->string('pay_type', 170);
            $table->decimal('weight')->nullable();
            $table->integer('user_id')->unsigned();
            $table->string('notes', 2000)->nullable();
            $table->string('platform', 50)->default('web');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
