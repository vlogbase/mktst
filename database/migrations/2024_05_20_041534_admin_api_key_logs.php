<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdminApiKeyLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create table and add api_key, admin_id, ip_address, request_url, request_method, request_headers, request_body, response_code, response_headers, response_body, created_at, updated_at
        Schema::create('admin_api_key_logs', function (Blueprint $table) {
            $table->id();
            $table->string('api_key')->nullable();
            $table->integer('admin_id')->nullable();
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
        //
        Schema::dropIfExists('admin_api_key_logs');
    }
}
