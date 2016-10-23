<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietphieukiemkeForeignkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('CHITIETPHIEUKIEMKE', function (Blueprint $table) {
             $table->foreign('ma_pkk')->references('ma_pkk')->on('PHIEUKIEMKE');
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
        Schema::table('CHITIETPHIEUKIEMKE', function (Blueprint $table) {
            $table->dropForeign(['ma_pkk']);
            $table->dropForeign(['ma_hh']);
                  });
    }
}
