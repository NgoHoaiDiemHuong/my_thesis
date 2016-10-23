<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietdondathangForeignkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('CHITIETDONDATHANG', function (Blueprint $table) {
            $table->foreign('ma_ddh')->references('ma_ddh')->on('DONDATHANG');
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
        Schema::table('CHITIETDONDATHANG', function (Blueprint $table) {
            $table->dropForeign(['ma_ddh']);
            $table->dropForeign(['ma_hh']);
        });
    }
}
