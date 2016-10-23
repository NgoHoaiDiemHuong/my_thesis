<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoadonkhuyenmaiForeignkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('HOADONKHUYENMAI', function (Blueprint $table) {
            $table->foreign('ma_km')->references('ma_km')->on('KHUYENMAI');
            $table->foreign('ma_hd')->references('ma_hd')->on('HOADON');
             });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('HOADONKHUYENMAI', function (Blueprint $table) {
            $table->dropForeign(['ma_km']);
            $table->dropForeign(['ma_hd']);
        });
    }
}
