<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('facility_id');
            $table->foreign('facility_id')->references('id')->on('facilities');
            $table->unsignedDecimal('price', $precision = 8, $scale = 2);
            $table->string('finish_time')->default('1');
            $table->unsignedBigInteger('mechanic_id');
            
            $table->foreign('mechanic_id')->references('id')->on('mechanics');
            $table->unsignedBigInteger('shop_id');
            $table->foreign('shop_id')->references('id')->on('work_shops');
            $table->string('status')->default('pending');
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
};
