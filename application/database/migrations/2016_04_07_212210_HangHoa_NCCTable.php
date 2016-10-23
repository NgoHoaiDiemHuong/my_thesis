<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HangHoaNCCTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HangHoa_NCC', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma_ncc',6);
            $table->string('ma_hh',6);
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
        Schema::drop('HangHoa_NCC');
    }
}
