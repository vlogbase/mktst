<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFeedCategoryIdToFeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
            Schema::table('feeds', function (Blueprint $table) {
                $table->integer('feed_category_id')->unsigned()->nullable();
            });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
            Schema::table('feeds', function (Blueprint $table) {
                $table->dropIfExists('feed_category_id');
            });
        
    }
}
