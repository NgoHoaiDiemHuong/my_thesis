<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHanghoaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('HANGHOA', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma_hh',6)->unique();
            $table->string('ten_hang_hoa',100);

            $table->string('ma_vach',15)->unique();
            $table->string('hinh_anh',100);
            $table->string('don_vi_tinh',10);
            $table->string('xuat_xu', 20);
            $table->string('mo_ta', 200);

          //Mot so khoa ngoai
            $table->string('ma_dm', 6);

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
        //
    }
}
