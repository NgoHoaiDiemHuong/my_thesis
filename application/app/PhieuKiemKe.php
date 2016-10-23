<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuKiemKe extends Model
{
    protected $table='PHIEUKIEMKE';
    static public function auto_code(){
        $id='PKK000';
        if(is_null(PhieuKiemKe::first()))
        {
           return $id = 'PKK001';
        }else{
            $id = PhieuKiemKe::select('id')
                    ->max('id')+1;

            if($id>=100){
               return $id = 'PKK'.(string)$id;
            }
            if($id>=10){
              return $id = 'PKK0'.(string)$id;
            }
            if($id>= 0){
               return $id = 'PKK00'.(string)$id;
            }
        }
        return $id;
    }
    public function ChiTietPhieuKiemKe(){
         return $this->hasMany('App\ChiTietPhieuKiemKe','ma_pkk','ma_pkk');
    }
    public function NhanVien(){
        return $this->belongsTo('App\NhanVien','ma_nv','ma_nv');
    }
}
