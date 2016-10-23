<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhieukiemkeForeignkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('PHIEUKIEMKE', function (Blueprint $table) {
            $table->foreign('ma_nv')->references('ma_nv')->on('NHANVIEN');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('PHIEUKIEMKE', function (Blueprint $table) {
            $table->dropForeign(['ma_nv']);
        });
    }
}
