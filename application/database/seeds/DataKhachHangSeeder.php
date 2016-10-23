<?php

use Illuminate\Database\Seeder;
use App\KhachHang;
// use Faker\Factory as Faker;

class DataKhachHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('vi_VN');

        for ($i=0; $i <9; $i++) {
            $data = new KhachHang;
            $data->ma_kh = KhachHang::auto_code();
            $data->ten_kh = $faker->name;
            $data->MSSV = 'B120402'.$i;
            $data->khoa_hoc = rand(34,42);
            $data->sdt = (String)rand(100,999).(String)rand(100,999).(String)rand(100,9999);
            $data->dia_chi = $faker->address;
            $data->mat_khau = Hash::make('12345');
            $data->save();
        }
    }
}
