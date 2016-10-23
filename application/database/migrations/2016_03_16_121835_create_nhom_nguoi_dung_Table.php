<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhomNguoiDungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //roles
        Schema::create('NHOMNGUOIDUNG', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma_nnd',6)->unique();;
            $table->string('ten_nnd');
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
        Schema::drop('NHOMNGUOIDUNG');
    }
}
