<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        // $this->call(DataDanhMucSeeder::class);
        // $this->call(DataHangHoaSeeder::class);
        // $this->call(DataNhomQuyenSeeder::class);
        // $this->call(DataQuyenSeeder::class);
        // $this->call(DataNhomNguoiDungSeeder::class);
        // $this->call(DataKhachHangSeeder::class);
        $this->call(DataNhanVienSeeder::class);
        // hang hoa
        // nhan vien
        // khach hang
        // hoa don
        // don hang
        // khuyen mai
        // quyen
        // danh muc
        // nhom quyen
    }
}
