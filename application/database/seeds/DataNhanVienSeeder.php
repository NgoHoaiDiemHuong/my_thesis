<?php

use Illuminate\Database\Seeder;


class DataNhanVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
    //     DB::table('NHANVIEN')->insert([
    //         ['ma_nv'=>'NV0002',
    //         'ten_nv'=>'root',
    //         'ma_nnd'=>'NND001',
    //         'ngay_sinh'=>date_create("1992-03-15"),
    //         'dia_chi'=>'30, Lý Thường Kiệt, TP Cần Thơ',
    //         'sdt'=>'0901475581',
    //         'mat_khau' =>  Hash::make('12345'),
    //         'trang_thai'=>1
    //         ],
    //     ]);
    //     DB::table('NHANVIEN')->insert([
    //         ['ma_nv'=>'NV0003',
    //         'ten_nv'=>'root',
    //         'ma_nnd'=>'NND001',
    //         'ngay_sinh'=>date_create("1992-03-15"),
    //         'dia_chi'=>'30, Lý Thường Kiệt, TP Cần Thơ',
    //         'sdt'=>'0901475582',
    //         'mat_khau' =>  Hash::make('12345'),
    //         'trang_thai'=>1
    //         ],
    //     ]);
        DB::table('NHANVIEN')->insert([
            ['ma_nv'=>'NV0005',
            'ten_nv'=>'Ngô Thị Quản Lý A',
            'ma_nnd'=>'NND001',
            'ngay_sinh'=>date_create("1992-03-15"),
            'dia_chi'=>'30, Lý Thường Kiệt, TP Cần Thơ',
            'sdt'=>'0901475590',
            'mat_khau' =>  Hash::make('12345'),
            'trang_thai'=>1
            ],
        ]);
    }
}
