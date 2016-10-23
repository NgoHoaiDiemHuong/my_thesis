<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhanvienForeignkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('NHANVIEN', function (Blueprint $table) {
            $table->foreign('ma_nnd')->references('ma_nnd')->on('NHOMNGUOIDUNG');
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('NHOMNGUOIDUNG', function (Blueprint $table) {
            $table->dropForeign(['ma_nnd']);
        });
    }
}
