<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('QUYEN', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma_quyen',6)->unique();;
            $table->string('ten_quyen');
            $table->string('ma_nnd',6);
            $table->string('ma_nq',6);
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
        Schema::drop('QUYEN');
    }
}
