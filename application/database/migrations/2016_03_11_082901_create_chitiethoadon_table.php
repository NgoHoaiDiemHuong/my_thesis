<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitiethoadonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CHITIETHOADON', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma_hd',6);
            $table->string('ma_hh',6);
            $table->string('so_luong');
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
        Schema::drop('CHITIETHOADON');
    }
}
