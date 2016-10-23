<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietPhieuTraHangNhap extends Model
{
     protected $table = "chitiettrahangnhap";

     public function HangHoa(){
        return $this->belongsTo('App\hanghoa','ma_hh','ma_hh');
     }
     public function PhieuNhapHang(){
        return $this->belongsTo('App\phieutrahangnhap','ma_pthn','ma_pthn');
     }
}
