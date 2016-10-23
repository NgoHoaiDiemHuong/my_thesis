<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDondathangForeignkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('DONDATHANG', function (Blueprint $table) {
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
        Schema::table('DONDATHANG', function (Blueprint $table) {
            $table->dropForeign(['ma_kh']);
        });
    }
}
