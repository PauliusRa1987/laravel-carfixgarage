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
        Schema::create('mechanics', function (Blueprint $table) {
            $table->id();
            $table->string('mechanic_name');
            $table->string('mechanic_surname');
            $table->string('mechanic_rating')->default(rand(1, 5));
            $table->string('rate_count')->default(1);
            $table->string('rate')->default(1);
            $table->string('mechanic_image')->nullable();
            $table->unsignedBigInteger('shop_id');
            $table->foreign('shop_id')->references('id')->on('work_shops');
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
        Schema::dropIfExists('mechanics');
    }
};
