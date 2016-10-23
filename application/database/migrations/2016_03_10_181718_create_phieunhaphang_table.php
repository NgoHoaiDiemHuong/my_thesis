<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhieunhaphangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PHIEUNHAPHANG', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma_pnh')->unique();
            $table->string('ma_nv',6);
            $table->string('ma_ncc',6);
            $table->date('ngay_nhap');
            $table->double('thanh_tien');
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
        Schema::drop('PHIEUNHAPHANG');
    }
}
