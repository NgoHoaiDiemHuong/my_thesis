<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhieukiemkeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PHIEUKIEMKE', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma_pkk',6)->unique();
            $table->date('ngay_kk');
            $table->string('ma_nv',6);

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
        Schema::drop('PHIEUKIEMKE');
    }
}
