<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietPhieuKiemKe extends Model
{
   protected $table='ChiTietPHIEUKIEMKE';
   public function PhieuKiemKe(){
    return $this->belongsTo('App\PhieuKiemKe','ma_pkk','ma_pkk');
   }
   public function HangHoa(){
    return $this->belongsTo('App\hanghoa','ma_hh','ma_hh');
   }
}
