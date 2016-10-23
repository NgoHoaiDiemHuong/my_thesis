<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitiethoadonForeignkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('CHITIETHOADON', function (Blueprint $table) {
            $table->foreign('ma_hd')->references('ma_hd')->on('HOADON');
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
        Schema::table('CHITIETHOADON', function (Blueprint $table) {
             $table->dropForeign(['ma_hd']);
             $table->dropForeign(['ma_hh']);
        });
    }
}
