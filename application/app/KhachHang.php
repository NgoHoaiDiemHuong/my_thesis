<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    protected $table= "KHACHHANG";
    // protected $table = "DANHMUC";
    static public function auto_code(){
        $id='KH0000';
        if(is_null(KhachHang::first()))
        {
           return $id = 'KH0001';
        }else{
            $id = KhachHang::select('id')
                    ->max('id')+1;
            if($id>=1000){
               return $id = 'KH'.(string)$id;
            }
            if($id>=100){
               return $id = 'KH0'.(string)$id;
            }
            if($id>=10){
              return $id = 'KH00'.(string)$id;
            }
            if($id>= 0){
               return $id = 'KH000'.(string)$id;
            }
        }
        return "KH".$id;
    }

}
