<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitiettrahangnhapForeignkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('CHITIETTRAHANGNHAP', function (Blueprint $table) {
            $table->foreign('ma_pthn')->references('ma_pthn')->on('PHIEUTRAHANGNHAP');
            $table->foreign('ma_hh')->references('ma_hh')->on('HANGHOA');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('CHITIETTRAHANGNHAP', function (Blueprint $table) {
            $table->dropForeign(['ma_pthn']);
            $table->dropForeign(['ma_hh']);
        });
    }
}
