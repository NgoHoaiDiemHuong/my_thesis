<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhomnguoidungQuyenForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('NHOMNGUOIDUNGQUYEN', function (Blueprint $table) {
            $table->foreign('ma_nnd')->references('ma_nnd')->on('NHOMNGUOIDUNG');
            $table->foreign('ma_quyen')->references('ma_quyen')->on('QUYEN');
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('NHOMNGUOIDUNGQUYEN', function (Blueprint $table) {
            $table->dropForeign(['ma_nnd']);
            $table->dropForeign(['ma_quyen']);
        });    }
}
