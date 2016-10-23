<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuyenNhanVien extends Model
{
    protected $table ='QUYENNHANVIEN';
    public function nhanvien(){
        return $this->belongsTo('App\nhanvien','ma_nv','ma_nv');
    }
    public function nhomquyen(){
        return $this->belongsTo('App\Quyen','ma_quyen','ma_quyen');
    }
    //  public function nhomquyen(){
    //     $this->belongsTo('App\Quyen','ma_quyen','ma_quyen');
    // }

}
