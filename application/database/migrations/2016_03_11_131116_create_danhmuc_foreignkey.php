<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanhmucForeignkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('DANHMUC', function (Blueprint $table) {
            $table->foreign('ma_dm_cha')->references('ma_dm')->on('DANHMUC');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('DANHMUC', function (Blueprint $table) {
            $table->dropForeign(['ma_dm_cha']);
        });
    }
}
