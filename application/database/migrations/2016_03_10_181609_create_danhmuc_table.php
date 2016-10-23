<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanhmucTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DANHMUC', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma_dm',6)->unique();
            $table->string('ma_dm_cha')->nullable();
            $table->string('ten_dm');
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
        Schema::drop('DANHMUC');
    }
}
