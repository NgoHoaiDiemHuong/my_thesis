<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhacungcapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('NHACUNGCAP', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma_ncc',6)->unique();
            $table->string('ten_ncc')->unique();
            $table->string('email');
            $table->string('ma_so_thue');
            $table->string('sdt');
            $table->string('ghi_chu');
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
        Schema::drop('NHACUNGCAP');
    }
}
