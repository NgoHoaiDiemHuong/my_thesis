<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDongiaForeignkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('DONGIA', function (Blueprint $table) {
             $table->foreign('ma_hh')->references('ma_hh')->on('HANGHOA');
             $table->foreign('ngay')->references('ngay')->on('NGAY');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('DONGIA', function (Blueprint $table) {
            $table->dropForeign(['ma_hh']);
            $table->dropForeign(['ngay']);
           });
    }
}
