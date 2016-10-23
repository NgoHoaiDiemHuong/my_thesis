<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietkhuyenmaiForeignkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('CHITIETKHUYENMAI', function (Blueprint $table) {
            $table->foreign('ma_km')->references('ma_km')->on('KHUYENMAI');
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
        Schema::table('CHITIETKHUYENMAI', function (Blueprint $table) {
            $table->dropForeign(['ma_km']);
            $table->dropForeign(['ma_hh']);
        });
    }
}
