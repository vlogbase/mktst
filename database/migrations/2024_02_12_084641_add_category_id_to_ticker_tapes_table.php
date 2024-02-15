<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToTickerTapesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('ticker_tapes', 'category_id')) {
            Schema::table('ticker_tapes', function (Blueprint $table) {

                $table->integer('category_id')->unsigned()->nullable();
                $table->foreign('category_id')->references('id')->on('ticker_tapes_categories')->onDelete('cascade');
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
        Schema::table('ticker_tapes', function (Blueprint $table) {

            $table->dropIfExists('category_id');
        });
    }
}
