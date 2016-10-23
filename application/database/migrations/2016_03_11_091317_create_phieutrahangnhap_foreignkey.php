<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhieutrahangnhapForeignkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('PHIEUTRAHANGNHAP', function (Blueprint $table) {
            $table->foreign('ma_nv')->references('ma_nv')->on('NHANVIEN');
            $table->foreign('ma_ncc')->references('ma_ncc')->on('NHACUNGCAP');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('PHIEUTRAHANGNHAP', function (Blueprint $table) {
            $table->dropForeign(['ma_nv']);
        });
    }
}
