<?php

use Illuminate\Database\Seeder;
use App\HANGHOA;


class DataHangHoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        function ma_hh()
        {
                $ma = 'HH'.HANGHOA::max_id_var();
                return $ma;
        }
        $faker = Faker\Factory::create();

        DB::table('HANGHOA')->insert(
            [
            'ma_hh'   =>ma_hh(),
            'ten_hang_hoa'=>'Kẹo extra',
            'ma_vach'   => $faker->ean13(),
            'hinh_anh'   => ma_hh().'.png',
            'don_vi_tinh' => 'hộp',
            'xuat_xu'       => 'Việt Nam',
            'mo_ta'     => '',
            'ma_dm'   =>'DM0001',
            ]);
        DB::table('HANGHOA')->insert(
            [
            'ma_hh'   =>ma_hh(),
            'ten_hang_hoa'=>'Bánh chocolate PN',
            'ma_vach'   => $faker->ean13(),
            'hinh_anh'   => ma_hh().'.png',
            'don_vi_tinh' => '',
            'xuat_xu'       => '',
            'mo_ta'     => '',
            'ma_dm'   =>'DM0001',
            ]);
          DB::table('HANGHOA')->insert(
            [
            'ma_hh'   =>ma_hh(),
            'ten_hang_hoa'=>'Bánh Bông Lan Soline',
            'ma_vach'   => $faker->ean13(),
            'hinh_anh'   => ma_hh().'.png',
            'don_vi_tinh' => '',
            'xuat_xu'       => '0',
            'mo_ta'     => '',
            'ma_dm'   =>'DM0001',
            ]);
            DB::table('HANGHOA')->insert(
            [
            'ma_hh'   =>ma_hh(),
            'ten_hang_hoa'=>'Bánh Bích Quy Pipico',
            'ma_vach'   => $faker->ean13(),
            'hinh_anh'   => ma_hh().'.png',
            'don_vi_tinh' => '',
            'xuat_xu'       => '0',
            'mo_ta'     => '',
            'ma_dm'   =>'DM0001',
            ]);
              DB::table('HANGHOA')->insert(
            [
            'ma_hh'   =>ma_hh(),
            'ten_hang_hoa'=>'Bánh Chocolate Orial',
            'ma_vach'   => $faker->ean13(),
            'hinh_anh'   => ma_hh().'.png',
            'don_vi_tinh' => '',
            'xuat_xu'       => '0',
            'mo_ta'     => '',
            'ma_dm'   =>'DM0001',
            ]);
              DB::table('HANGHOA')->insert(
            [
            'ma_hh'   =>ma_hh(),
            'ten_hang_hoa'=>'Kẹo Doublemin',
            'ma_vach'   => $faker->ean13(),
            'hinh_anh'   => ma_hh().'.png',
            'don_vi_tinh' => '',
            'xuat_xu'       => '0',
            'mo_ta'     => '',
            'ma_dm'   =>'DM0001',
            ]);
                DB::table('HANGHOA')->insert(
            [
            'ma_hh'   =>ma_hh(),
            'ten_hang_hoa'=>'Bánh AFC',
            'ma_vach'   => $faker->ean13(),
            'hinh_anh'   => ma_hh().'.png',
            'don_vi_tinh' => '',
            'xuat_xu'       => '0',
            'mo_ta'     => '',
            'ma_dm'   =>'DM0001',
            ]);
              DB::table('HANGHOA')->insert(
            [
            'ma_hh'   =>ma_hh(),
            'ten_hang_hoa'=>'Kẹo Coolair',
            'ma_vach'   => $faker->ean13(),
            'hinh_anh'   => ma_hh().'.png',
            'don_vi_tinh' => '',
            'xuat_xu'       => '0',
            'mo_ta'     => '',
            'ma_dm'   =>'DM0001',
            ]);
              DB::table('HANGHOA')->insert(
            [
            'ma_hh'   =>ma_hh(),
            'ten_hang_hoa'=>'Mứt nho',
            'ma_vach'   => $faker->ean13(),
            'hinh_anh'   => ma_hh().'.png',
            'don_vi_tinh' => 'bịch',
            'xuat_xu'       => '0',
            'mo_ta'     => '',
            'ma_dm'   =>'DM0001',
            ]);
              //MA danh muc DM0002
            DB::table('HANGHOA')->insert(
            [
            'ma_hh'   =>ma_hh(),
            'ten_hang_hoa'=>'coca cola',
            'ma_vach'   => $faker->ean13(),
            'hinh_anh'   => ma_hh().'.png',
            'don_vi_tinh' => '',
            'xuat_xu'       => '0',
            'mo_ta'     => '',
            'ma_dm'   =>'DM0002',
            ]);
            DB::table('HANGHOA')->insert(
            [
            'ma_hh'   =>ma_hh(),
            'ten_hang_hoa'=>'Pepsi',
            'ma_vach'   => $faker->ean13(),
            'hinh_anh'   => ma_hh().'.png',
            'don_vi_tinh' => '',
            'xuat_xu'       => '0',
            'mo_ta'     => '',
            'ma_dm'   =>'DM0002',
            ]);
            DB::table('HANGHOA')->insert(
            [
            'ma_hh'   =>ma_hh(),
            'ten_hang_hoa'=>'Mirinda',
            'ma_vach'   => $faker->ean13(),
            'hinh_anh'   => ma_hh().'.png',
            'don_vi_tinh' => '',
            'xuat_xu'       => '0',
            'mo_ta'     => '',
            'ma_dm'   =>'DM0002',
            ]);
            DB::table('HANGHOA')->insert(
            [
            'ma_hh'   =>ma_hh(),
            'ten_hang_hoa'=>'Seven 7',
            'ma_vach'   => $faker->ean13(),
            'hinh_anh'   => ma_hh().'.png',
            'don_vi_tinh' => '',
            'xuat_xu'       => '0',
            'mo_ta'     => '',
            'ma_dm'   =>'DM0002',
            ]);
            DB::table('HANGHOA')->insert(
            [
            'ma_hh'   =>ma_hh(),
            'ten_hang_hoa'=>'Trà xanh Ô long',
            'ma_vach'   => $faker->ean13(),
            'hinh_anh'   => ma_hh().'.png',
            'don_vi_tinh' => '',
            'xuat_xu'       => '0',
            'mo_ta'     => '',
            'ma_dm'   =>'DM0002',
            ]);
            //Ma danh muc DM0003- VAn Phong Pham
            DB::table('HANGHOA')->insert(
            [
            'ma_hh'   =>ma_hh(),
            'ten_hang_hoa'=>'Bút mực Thiên Long',
            'ma_vach'   => $faker->ean13(),
            'hinh_anh'   => ma_hh().'.png',
            'don_vi_tinh' => '',
            'xuat_xu'       => '0',
            'mo_ta'     => '',
            'ma_dm'   =>'DM0003',
            ]);
            DB::table('HANGHOA')->insert(
            [
            'ma_hh'   =>ma_hh(),
            'ten_hang_hoa'=>'Bút chì',
            'ma_vach'   => $faker->ean13(),
            'hinh_anh'   => ma_hh().'.png',
            'don_vi_tinh' => '',
            'xuat_xu'       => '0',
            'mo_ta'     => '',
            'ma_dm'   =>'DM0003',
            ]);

            DB::table('HANGHOA')->insert(
            [
            'ma_hh'   =>ma_hh(),
            'ten_hang_hoa'=>'Thước kẻ',
            'ma_vach'   => $faker->ean13(),
            'hinh_anh'   => ma_hh().'.png',
            'don_vi_tinh' => '',
            'xuat_xu'       => '0',
            'mo_ta'     => '',
            'ma_dm'   =>'DM0003',
            ]);
            DB::table('HANGHOA')->insert(
            [
            'ma_hh'   =>ma_hh(),
            'ten_hang_hoa'=>'Đồ gọt bút chì',
            'ma_vach'   => $faker->ean13(),
            'hinh_anh'   => ma_hh().'.png',
            'don_vi_tinh' => '',
            'xuat_xu'       => '0',
            'mo_ta'     => '',
            'ma_dm'   =>'DM0003',
            ]);
            //Danh muc DM0004--Sữa
            DB::table('HANGHOA')->insert(
            [
            'ma_hh'   =>ma_hh(),
            'ten_hang_hoa'=>'Sữa bịch Vinamilk không đường',
            'ma_vach'   => $faker->ean13(),
            'hinh_anh'   => ma_hh().'.png',
            'don_vi_tinh' => '',
            'xuat_xu'       => '0',
            'mo_ta'     => '',
            'ma_dm'   =>'DM0004',
            ]);
            DB::table('HANGHOA')->insert(
            [
            'ma_hh'   =>ma_hh(),
            'ten_hang_hoa'=>'Sữa bịch Vinamilk có đường',
            'ma_vach'   => $faker->ean13(),
            'hinh_anh'   => ma_hh().'.png',
            'don_vi_tinh' => '',
            'xuat_xu'       => '0',
            'mo_ta'     => '',
            'ma_dm'   =>'DM0004',
            ]);
            DB::table('HANGHOA')->insert(
            [
            'ma_hh'   =>ma_hh(),
            'ten_hang_hoa'=>'Sữa hộp Ông Thọ',
            'ma_vach'   => $faker->ean13(),
            'hinh_anh'   => ma_hh().'.png',
            'don_vi_tinh' => '',
            'xuat_xu'       => '0',
            'mo_ta'     => '',
            'ma_dm'   =>'DM0004',
            ]);
            DB::table('HANGHOA')->insert(
            [
            'ma_hh'   =>ma_hh(),
            'ten_hang_hoa'=>'Sữa hộp Milo',
            'ma_vach'   => $faker->ean13(),
            'hinh_anh'   => ma_hh().'.png',
            'don_vi_tinh' => '',
            'xuat_xu'       => '0',
            'mo_ta'     => '',
            'ma_dm'   =>'DM0004',
            ]);
            //Ma danh muc DM0005 Mỹ Phẩm
            DB::table('HANGHOA')->insert(
            [
            'ma_hh'   =>ma_hh(),
            'ten_hang_hoa'=>'Dầu gội Dove 250ml',
            'ma_vach'   => $faker->ean13(),
            'hinh_anh'   => ma_hh().'.png',
            'don_vi_tinh' => '',
            'xuat_xu'       => '0',
            'mo_ta'     => '',
            'ma_dm'   =>'DM0005',
            ]);
            DB::table('HANGHOA')->insert(
            [
            'ma_hh'   =>ma_hh(),
            'ten_hang_hoa'=>'Mặt nạ Coco',
            'ma_vach'   => $faker->ean13(),
            'hinh_anh'   => ma_hh().'.png',
            'don_vi_tinh' => '',
            'xuat_xu'       => '0',
            'mo_ta'     => '',
            'ma_dm'   =>'DM0005',
            ]);
            DB::table('HANGHOA')->insert(
            [
            'ma_hh'   =>ma_hh(),
            'ten_hang_hoa'=>'Dầu xả Sunsilk Đen óng mượt 250ml',
            'ma_vach'   => $faker->ean13(),
            'hinh_anh'   => ma_hh().'.png',
            'don_vi_tinh' => '',
            'xuat_xu'       => '0',
            'mo_ta'     => '',
            'ma_dm'   =>'DM0005',
            ]);
    }
}
