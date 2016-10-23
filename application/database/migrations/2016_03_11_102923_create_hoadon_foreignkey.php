<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoadonForeignkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('HOADON', function (Blueprint $table) {
            $table->foreign('ma_nv')->references('ma_nv')->on('NHANVIEN');
            $table->foreign('ma_ddh')->references('ma_ddh')->on('DONDATHANG');
            $table->foreign('ma_kh')->references('ma_kh')->on('KHACHHANG');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('HOADON', function (Blueprint $table) {
            $table->dropForeign(['ma_nv']);
            $table->dropForeign(['ma_ddh']);
            $table->dropForeign(['ma_kh']);
        });
    }
}
