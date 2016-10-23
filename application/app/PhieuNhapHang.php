<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class PhieuNhapHang extends Model
{
    protected $table = "PHIEUNHAPHANG";
    /*tu tao ma */
    static public function auto_code(){
        $id='PNH000';
        if(is_null(PhieuNhapHang::first()))
        {
           return $id = 'PNH001';
        }else{
            $id = PhieuNhapHang::select('id')
                    ->max('id')+1;

            if($id>=100){
               return $id = 'PNH'.(string)$id;
            }
            if($id>=10){
              return $id = 'PNH0'.(string)$id;
            }
            if($id>= 0){
               return $id = 'PNH00'.(string)$id;
            }
        }
        return $id;
    }
    /*relationship with chitiet phieu nhap 1-* */
    public function ChiTietPhieuNhapHangs(){
        return $this->hasMany('App\ChiTietPhieuNhapHang','ma_pnh','ma_pnh');
    }
    /*relationship with NCC* 1-1*/
    public function NCC(){
        return $this->belongsTo('App\NCC','ma_ncc','ma_ncc');
    }
    /*relationship with Nhan vien tao phieu 1-1*/
    public function NhanVien(){
        return $this->belongsTo('App\NhanVien','ma_nv','ma_nv');
    }
}
