<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhomquyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('NHOMQUYEN', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma_nq')->unique();
            $table->string('ten_nq');
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
        Schema::drop('NHOMQUYEN');
    }
}
