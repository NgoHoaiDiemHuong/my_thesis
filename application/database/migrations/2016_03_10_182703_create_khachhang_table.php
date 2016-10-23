<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhachhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('KHACHHANG', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma_kh',6)->unique();
            $table->string('ten_kh');
            $table->string('MSSV');
            $table->string('khoa_hoc');
            $table->string('sdt');
            $table->string('dia_chi');
            $table->string('mat_khau');
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
        Schema::drop('KHACHHANG');
    }
}
