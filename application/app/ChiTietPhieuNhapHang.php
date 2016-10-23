<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietPhieuNhapHang extends Model
{
     protected $table = "CHITIETNHAP";

     public function HangHoa(){
        return $this->belongsTo('App\hanghoa','ma_hh','ma_hh');
     }
     public function PhieuNhapHang(){
        return $this->belongsTo('App\PhieuNhapHang','ma_pnh','ma_pnh');
     }

}
