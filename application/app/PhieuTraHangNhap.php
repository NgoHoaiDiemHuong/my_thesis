<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuTraHangNhap extends Model
{
    protected $table='phieutrahangnhap';

    static public function auto_code(){
        $id='THN000';
        if(is_null(PhieuTraHangNhap::first()))
        {
           return $id = 'THN001';
        }else{
            $id = PhieuTraHangNhap::select('id')
                    ->max('id')+1;

            if($id>=100){
               return $id = 'THN'.(string)$id;
            }
            if($id>=10){
              return $id = 'THN0'.(string)$id;
            }
            if($id>= 0){
               return $id = 'THN00'.(string)$id;
            }
        }
        return $id;
    }
    /*relationship with chitiet phieu nhap 1-* */
    public function ChiTietPhieuTraHangNhaps(){
        // return $this->hasMany('App\ChiTietPhieuNhapHang','ma_pthn','ma_pthn');
        return $this->hasMany('App\ChiTietPhieuTraHangNhap','ma_pthn','ma_pthn');
    }
    /*relationship with NCC* 1-1*/
    public function PhieuNhapHang(){
        return $this->belongsTo('App\PhieuNhapHang','ma_pnh','ma_pnh');
    }
    /*relationship with Nhan vien tao phieu 1-1*/
    public function NhanVien(){
        return $this->belongsTo('App\NhanVien','ma_nv','ma_nv');
    }
}
