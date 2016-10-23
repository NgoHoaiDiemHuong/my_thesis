<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDongiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DONGIA', function (Blueprint $table) {
            $table->increments('id');
            $table->double('don_gia',8,0);
            //KHoa ngoai
            $table->date('ngay');
            $table->string('ma_hh');
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
        Schema::drop('DONGIA');
    }
}
