<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietdondathangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CHITIETDONDATHANG', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma_ddh',6);
            $table->string('ma_hh',6);
            $table->integer('so_luong');
            $table->double('don_gia');
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
        Schema::drop('CHITIETDONDATHANG');
    }
}
