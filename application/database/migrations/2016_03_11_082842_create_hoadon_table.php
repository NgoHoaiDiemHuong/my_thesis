<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoadonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HOADON', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma_hd',6)->unique();
            $table->string('ma_nv',6);
            $table->string('ma_ddh',6)->nullable();
            $table->string('ma_kh',6);
            $table->string('thanh_tien');
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
        Schema::drop('HOADON');
    }
}
