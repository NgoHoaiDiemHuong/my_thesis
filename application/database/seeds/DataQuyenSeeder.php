<?php

use Illuminate\Database\Seeder;
use App\Quyen;

class DataQuyenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        1. admin
        2. Quan ly cua hàng
        3. Quản lý kho hàng
        4. Ql bán hàng

         */

        // Quản lý bán hàng
              $data = new Quyen;
            $data->ma_quyen=Quyen::auto_code();
            $data->code_quyen="add";
            $data->ten_quyen="Thêm hóa đơn";
            $data->route='emp.bill.create';
            $data->ma_nq='NQ0001';
            $data->save();

            $data = new Quyen;
            $data->ma_quyen=Quyen::auto_code();
            $data->code_quyen="index";
            $data->ten_quyen="Danh sách hóa đơn";
            // $data->nnds="2"
            $data->route='emp.bill.index';
            $data->ma_nq='NQ0001';
             $data->save();
            $data = new Quyen;
            $data->ma_quyen=Quyen::auto_code();
            $data->code_quyen="index-order";
            $data->ten_quyen="Đơn đặt hàng";
            $data->route='emp.order.index';
            $data->ma_nq='NQ0001';
 $data->save();
        // Quản lý kho hàng
            $data = new Quyen;
            $data->ma_quyen=Quyen::auto_code();
            $data->code_quyen="add";
            $data->ten_quyen="Thêm phiếu nhập";
            $data->route='emp.pnh.create';
            $data->ma_nq='NQ0002';
 $data->save();
            $data = new Quyen;
            $data->ma_quyen=Quyen::auto_code();
            $data->code_quyen="index";
            $data->ten_quyen="Danh sách PNH";
            $data->route='emp.pnh.create';
            $data->ma_nq='NQ0002';
 $data->save();
            $data = new Quyen;
             $data->ma_quyen=Quyen::auto_code();
            $data->code_quyen="add-pthn";
            $data->ten_quyen="Thêm phiếu trả hàng nhập";
            $data->route='emp.pthn.create';
            $data->ma_nq='NQ0002';
 $data->save();
            $data = new Quyen;
            $data->ma_quyen=Quyen::auto_code();
            $data->code_quyen="index-pthn";
            $data->ten_quyen="Danh sách PTHN";
            $data->route='emp.pthn.index';
            $data->ma_nq='NQ0002';
 $data->save();
            $data = new Quyen;
            $data->ma_quyen=Quyen::auto_code();
            $data->code_quyen="add-pkk";
            $data->ten_quyen="Danh sách PKK";
            $data->route='emp.pkk.create';
            $data->ma_nq='NQ0002';
 $data->save();
            $data = new Quyen;
            $data->ma_quyen=Quyen::auto_code();
            $data->code_quyen="add-pkk";
            $data->ten_quyen="Thêm PKK";
            $data->route='emp.pkk.index';
            $data->ma_nq='NQ0002';
 $data->save();
            $data = new Quyen;
            $data->ma_quyen=Quyen::auto_code();
            $data->code_quyen="add-pkk";
            $data->ten_quyen="Thêm PKK";
            $data->route='rep.hangton';
            $data->ma_nq='NQ0002';
             $data->save();
            // quan lý hàng hóa
            $data = new Quyen;
            $data->ma_quyen=Quyen::auto_code();
            $data->code_quyen="add";
            $data->ten_quyen="Thêm hàng hóa";
            $data->route='emp.product.create';
            $data->ma_nq='NQ0003';

 $data->save();
            $data = new Quyen;
             $data->ma_quyen=Quyen::auto_code();
            $data->code_quyen="index";
            $data->ten_quyen="Danh sách hàng hóa";
            $data->route='emp.product.index';
            $data->ma_nq='NQ0003';
 $data->save();
            $data = new Quyen;
            $data->code_quyen="add-dm";
            $data->ten_quyen="Danh mục";
            $data->route='emp.cate.index';
            $data->ma_nq='NQ0003';
 $data->save();
            $data = new Quyen;
             $data->ma_quyen=Quyen::auto_code();
            $data->code_quyen="index-price";
            $data->ten_quyen="Chính sách giá";
            $data->route='emp.price.index';
            $data->ma_nq='NQ0003';

 $data->save();
            //QL nhân viên
            $data = new Quyen;
             $data->ma_quyen=Quyen::auto_code();
            $data->code_quyen="index";
            $data->ten_quyen="Danh sách";
            $data->route='emp.emloyees.index';
            $data->ma_nq='NQ0004';
            $data->save();
            $data = new Quyen;
             $data->ma_quyen=Quyen::auto_code();
            $data->code_quyen="add";
            $data->ten_quyen="Thêm";
            $data->route='emp.emloyees.create';
            $data->ma_nq='NQ0004';
            $data->save();
            $data = new Quyen;
             $data->ma_quyen=Quyen::auto_code();
            $data->code_quyen="edit";
            $data->ten_quyen="Thêm";
            // $data->route='emp.emloyees.edit';
            $data->ma_nq='NQ0004';
            // QL khách hàng
             $data->save();
            $data = new Quyen;
             $data->ma_quyen=Quyen::auto_code();
            $data->code_quyen="index";
            $data->ten_quyen="Danh sách";
            $data->route='emp.cus.index';
            $data->ma_nq='NQ0005';
             $data->save();
            // Quan ly ncc
            $data = new Quyen;
             $data->ma_quyen=Quyen::auto_code();
            $data->code_quyen="index";
            $data->ten_quyen="Danh sách";
            $data->route='emp.ncc.index';
            $data->ma_nq='NQ0006';
            $data->save();
            $data = new Quyen;
             $data->ma_quyen=Quyen::auto_code();
            $data->code_quyen="add";
            $data->ten_quyen="Danh sách";
            $data->route='emp.ncc.create';
            $data->ma_nq='NQ0006';
             $data->save();
            $data = new Quyen;
             $data->ma_quyen=Quyen::auto_code();
            $data->code_quyen="edit";
            $data->ten_quyen="Danh sách";
            // $data->route='emp.ncc.ed';
            $data->ma_nq='NQ0006';
             $data->save();

            // Bao cao doanh thu
            $data = new Quyen;
             $data->ma_quyen=Quyen::auto_code();
            $data->code_quyen="index";
            $data->ten_quyen="Danh sách";
            $data->route='rep.doanhthu';
            $data->ma_nq='NQ0007';
                 $data->save();


     }
}
