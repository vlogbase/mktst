<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description')->nullable();
            $table->decimal('unit_weight', 10, 2)->default(0);
            $table->string('meta_title', 200)->nullable();
            $table->string('meta_description', 200)->nullable();
            $table->boolean('featured')->default(0);
            $table->boolean('best_seller')->default(0);
            $table->boolean('new_arrival')->default(0);
            $table->boolean('special_offer')->default(0);
            $table->string('pack', 200)->nullable();
            $table->integer('product_id')->unsigned();
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_details');
    }
}
