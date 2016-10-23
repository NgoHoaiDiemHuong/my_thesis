<?php

use Illuminate\Database\Seeder;

class DataNhomQuyenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('NHOMQUYEN')->insert([
            ['ma_nq'=>'NQ0001','ten_nq' => 'Quản lý bán hàng','code_nq'=>'Bán hàng','icon'=>'fa fa-shopping-cart'],
            ['ma_nq'=>'NQ0002','ten_nq' => 'Quản lý kho hàng','code_nq'=>'Kho hàng','icon'=>'fa fa-desktop'],
            ['ma_nq'=>'NQ0003','ten_nq' => 'Quản lý hàng hóa','code_nq'=>'Hàng hóa','icon'=>'fa fa-desktop'],

            ['ma_nq'=>'NQ0004','ten_nq' => 'Quản lý nhân viên','code_nq'=>'Nhân viên','icon'=>'fa fa-user'],
            ['ma_nq'=>'NQ0005','ten_nq' => 'Quản lý khách hàng', 'code_nq'=>'Khách hàng','icon'=>'fa fa-user'],
            ['ma_nq'=>'NQ0006','ten_nq' => 'Quản lý NCC','code_nq'=>'Nhà cung cấp','icon'=>'fa fa-user'],
            ['ma_nq'=>'NQ0007','ten_nq' => 'Báo cáo','code_nq'=>'Báo cáo','icon'=>'fa fa-bar-chart'],

        ]);
   }
}
