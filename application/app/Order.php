<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table ='DONDATHANG';
    static public function auto_code(){
        $id='DDH000';
        if(is_null(Order::first()))
        {
           return $id = 'DDH001';
        }else{
            $id = Order::select('id')
                    ->max('id')+1;
            if($id>=1000){
               return $id = 'DDH'.(string)$id;
            }
            if($id>=100){
               return $id = 'DDH0'.(string)$id;
            }
            if($id>=10){
              return $id = 'DDH00'.(string)$id;
            }
            if($id>= 0){
               return $id = 'DDH000'.(string)$id;
            }
        }
        return $id;
    }
    public function khachhang(){
        return $this->belongsTo('App\KhachHang','ma_kh','ma_kh');
    }
    public function bill(){
        return $this->hasOne('App\Bill','ma_ddh','ma_ddh');
    }
    public function billDetails(){
       return $this->hasManyThrough('App\BillDetail','App\Bill','ma_ddh','ma_hd');
    }
}
