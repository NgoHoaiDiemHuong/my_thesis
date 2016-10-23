<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhanvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('NHANVIEN', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma_nv',6)->unique();
            $table->string('ten_nv');
            $table->string('ma_nnd',6);
            $table->string('ngay_sinh');
            $table->string('dia_chi');
            $table->string('sdt');
            $table->string('mat_khau');
            $table->smallInteger('trang_thai');
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
        Schema::drop('NHANVIEN');
    }
}
