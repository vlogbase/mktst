<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SellerApiKeyLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create and add api_key, seller_id, ip_address, request_url, request_method, request_headers, request_body, response_code, response_headers, response_body, created_at, updated_at
        Schema::create('seller_api_key_logs', function (Blueprint $table) {
            $table->id();
            $table->string('api_key')->nullable();
            $table->integer('seller_id')->nullable();
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
        Schema::dropIfExists('seller_api_key_logs');

    }
}
