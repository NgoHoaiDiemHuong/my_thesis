<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHanghoaForeignkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('HANGHOA', function (Blueprint $table) {
            $table->foreign('ma_dm')->references('ma_dm')->on('DANHMUC');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('HANGHOA', function (Blueprint $table) {
            $table->dropForeign(['ma_dm']);
        });
    }
}
