<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDondathangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DONDATHANG', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma_ddh',6)->unique();
            $table->string('ma_kh',6);
            $table->double('thanh_tien');
            $table->double('tien_can_thoi');
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
        Schema::drop('DONDATHANG');
    }
}
