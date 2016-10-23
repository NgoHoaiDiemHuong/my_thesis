<?php

use Illuminate\Database\Seeder;


class DataDanhMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('DANHMUC')->truncate();
        // DB::table('DANHMUC')->execute('DELETE FROM DANHMUC');
        DB::table('DANHMUC')->insert(
            [
            'ma_dm' => 'DM0001',
            'ma_dm_cha'=>NULL,
            'ten_dm' => 'Kẹo Bánh',
            ]);
        DB::table('DANHMUC')->insert(
            [
            'ma_dm' => 'DM0002',
            'ma_dm_cha'=>NULL,
            'ten_dm' => 'Nước Ngọt',
            ]);
        DB::table('DANHMUC')->insert(
            [
            'ma_dm' => 'DM0003',
            'ma_dm_cha'=>NULL,
            'ten_dm' => 'Văn Phòng Phẩm',
            ]);
        DB::table('DANHMUC')->insert(
            [
            'ma_dm' => 'DM0004',
            'ma_dm_cha'=>NULL,
            'ten_dm' => 'Sữa',
            ]);
        DB::table('DANHMUC')->insert(
            [
            'ma_dm' => 'DM0005',
            'ma_dm_cha'=>NULL,
            'ten_dm' => 'Mỹ Phẩm',
            ]);
           }
}
