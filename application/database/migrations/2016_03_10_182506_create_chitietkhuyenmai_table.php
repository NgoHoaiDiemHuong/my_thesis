<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietkhuyenmaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CHITIETKHUYENMAI', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma_km',6);
            $table->string('ma_hh',6);
            $table->integer('phan_tram');
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
        Schema::drop('CHITIETKHUYENMAI');
    }
}
