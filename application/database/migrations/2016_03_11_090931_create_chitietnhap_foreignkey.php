<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietnhapForeignkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('CHITIETNHAP', function (Blueprint $table) {
            $table->foreign('ma_hh')->references('ma_hh')->on('HANGHOA');
            $table->foreign('ma_pnh')->references('ma_pnh')->on('PHIEUNHAPHANG');        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('CHITIETNHAP', function (Blueprint $table) {
            $table->dropForeign(['ma_hh']);
            $table->dropForeign(['ma_pnh']);
        });
    }
}
