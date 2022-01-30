<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('top_head', 200)->nullable();
            $table->string('mid_head', 200)->nullable();
            $table->boolean('button_status')->default(0);
            $table->string('button_text', 100)->default('Shop Now');
            $table->string('button_action', 100)->default('/products');
            $table->string('image', 350);
            $table->boolean('light')->default(0);
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
        Schema::dropIfExists('web_sliders');
    }
}
