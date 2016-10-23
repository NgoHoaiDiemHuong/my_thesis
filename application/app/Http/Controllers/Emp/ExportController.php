<?php

namespace App\Http\Controllers\Emp;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Maatwebsite\Excel\Facades\Excel;
use App\NhanVien;
use App\hanghoa;
use App\KhacKHang;

class ExportController extends BaseController
{
    public function __construct()
    {
        $this->middleware('authNhanVien');
        // $this->middleware('auth', ['only' => 'update'])
    }
    public function getExportNhanVien(){
        $data = NhanVien::all();
         Excel::create('DSNV-'.time(), function($excel) {
                $excel->setTitle('Danh sách nhân viên');
                $excel->sheet('First sheet',function($sheet){
                    $sheet->row(2,array(
                            'Mã nhân viên','Họ tên','Nhóm nhân viên','Ngày sinh','Địa chỉ','SĐT'
                        ));
                    $i = 3;
                    foreach(NhanVien::all() as $d){
                        $sheet->row($i,array(
                            $d->ma_nv,
                            $d->ten_nv,
                            $d->nhomnguoidung->ten_nnd,
                            $d->ngay_sinh,
                            $d->dia_chi,
                            $d->sdt,
                        ));
                        $i++;
                    }
                });
         })->export('xls');
        return redirect()->back()->with('success','Export thành công!');
    }

    public function getExportHangHoa(){
        $data = hanghoa::all();
         Excel::create('DSHH-'.time(), function($excel) {
                $excel->setTitle('Danh sách hàng hóa');
                $excel->sheet('First sheet',function($sheet){
                    $sheet->row(2,array(
                            'Mã hàng hóa','Tên hàng hóa','Danh mục','Đơn vị tính','Xuất xứ','Mô tả'
                        ));
                    $i = 3;
                    foreach(hanghoa::all() as $d){
                        $sheet->row($i,array(
                            $d->ma_hh,
                            $d->ten_hang_hoa,
                            $d->danhmuc->ten_dm,
                            $d->don_vi_tinh,
                            $d->xuat_xu,
                            $d->mo_ta,
                        ));
                        $i++;
                    }
                });
         })->export('xls');
        return redirect()->back()->with('success','Export thành công!');

    }
    public function getExportKhachHang(){
        $data = KhacKHang::all();
         Excel::create('DSKH-'.time(), function($excel) {
                $excel->setTitle('Danh sách hàng hóa');
                $excel->sheet('First sheet',function($sheet){
                    $sheet->row(2,array(
                            'Mã hàng hóa','Tên hàng hóa','Danh mục','Đơn vị tính','Xuất xứ','Mô tả'
                        ));
                    $i = 3;
                    foreach(hanghoa::all() as $d){
                        $sheet->row($i,array(
                            $d->ma_hh,
                            $d->ten_hang_hoa,
                            $d->danhmuc->ten_dm,
                            $d->don_vi_tinh,
                            $d->xuat_xu,
                            $d->mo_ta,
                        ));
                        $i++;
                    }
                });
         })->export('xls');
        return redirect()->back()->with('success','Export thành công!');

    }
}
