<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuyennhanvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('QUYENNHANVIEN', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma_nv',6);
            $table->string('ma_quyen',6);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('QUYENNHANVIEN');
    }
}
