<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table ="HOADON";

    static public function auto_code(){
        $id='HD0000';
        if(is_null(Bill::first()))
        {
           return $id = 'HD0001';
        }else{
            $id = Bill::select('id')
                    ->max('id')+1;
            if($id>=1000){
               return $id = 'HD'.(string)$id;
            }
            if($id>=100){
               return $id = 'HD0'.(string)$id;
            }
            if($id>=10){
              return $id = 'HD00'.(string)$id;
            }
            if($id>= 0){
               return $id = 'HD000'.(string)$id;
            }
        }
        return "KH".$id;
    }
    public function billDetails(){
        return $this->hasMany('App\BillDetail','ma_hd','ma_hd');
        // return $this->hasManyThrough('App\BillDetail','App\Bill','ma_hd','ma_hd');
    }
    public function khachhang(){
        return $this->belongsTo('App\KhachHang','ma_kh','ma_kh');
        // return $this->hasManyThrough('App\BillDetail','App\Bill','ma_hd','ma_hd');
    }

    public function emp_create(){
        return $this->belongsTo('App\NhanVien','ma_nv','ma_nv');
    }
    public function order(){
        return $this->belongsTo('App\Order','ma_ddh','ma_ddh');
        // return $this->hasManyThrough('App\BillDetail','App\Bill','ma_hd','ma_hd');
    }
}
