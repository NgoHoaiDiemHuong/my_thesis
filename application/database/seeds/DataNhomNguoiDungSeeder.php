<?php

use Illuminate\Database\Seeder;

class DataNhomNguoiDungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('NHOMNGUOIDUNG')->insert([
            ['ma_nnd'=>'NND001','ten_nnd' => 'Admin'],
            ['ma_nnd'=>'NND002','ten_nnd' => 'Nhân viên kho'],
            ['ma_nnd'=>'NND003','ten_nnd' => 'Quản lý cửa hàng'],
            ['ma_nnd'=>'NND004','ten_nnd' => 'Nhân viên bán hàng']

        ]);
    }
}
