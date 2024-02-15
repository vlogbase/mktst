<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTickerTapeCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('ticker_tape_categories')){
            Schema::create('ticker_tape_categories', function (Blueprint $table) {
                $table->increments('id');
                $table->string('head');
                $table->timestamps();
            });
        }   
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticker_tape_categories');
    }
}
