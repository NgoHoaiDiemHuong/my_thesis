<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhieutrahangnhapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PHIEUTRAHANGNHAP', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma_pthn',6)->unique();
            $table->string('ma_nv',6);
            $table->string('ma_ncc',6);
            $table->date('ngay_tra_hang');
            $table->double('thanh_tien');
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
        Schema::drop('PHIEUTRAHANGNHAP');
    }
}
