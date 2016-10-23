<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhuyenmaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('KHUYENMAI', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma_km',6)->unique();
            $table->string('ten_khuyen_mai');
            $table->string('mo_ta');
            $table->date('ngay_bat_dau');
            $table->date('ngay_ket_thuc');
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
        Schema::drop('KHUYENMAI');
    }
}
