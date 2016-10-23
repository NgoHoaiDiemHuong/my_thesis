<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuyennhanvienForeignkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('QUYENNHANVIEN', function (Blueprint $table) {
            $table->foreign('ma_quyen')->references('ma_quyen')->on('QUYEN');
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
        Schema::table('QUYENNHANVIEN', function (Blueprint $table) {
             $table->dropForeign(['ma_nv']);
             $table->dropForeign(['ma_quyen']);
        });
    }
}
