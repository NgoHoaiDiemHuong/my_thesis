<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietphieukiemkeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CHITIETPHIEUKIEMKE', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma_pkk',6);
            $table->string('ma_hh',6);
            $table->integer('so_luong');
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
        Schema::drop('CHITIETPHIEUKIEMKE');
    }
}
