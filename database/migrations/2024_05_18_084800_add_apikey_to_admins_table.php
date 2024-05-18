<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddApikeyToAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            //add api_key
            $table->string('api_key')->nullable()->after('remember_token');
            //add valid_till
            $table->timestamp('valid_till')->nullable()->after('api_key');
            //add is_autoextended
            $table->boolean('is_autoextended')->default(1)->after('valid_till');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn('api_key');
            $table->dropColumn('valid_till');
            $table->dropColumn('is_autoextended');
        });
    }
}
