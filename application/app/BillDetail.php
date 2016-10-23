<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table ="chitiethoadon";

    public function bill(){
      return  $this->belongsTo('App\Bill','ma_hd','ma_hd');
    }
    public function product(){
        return $this->belongsTo('App\hanghoa','ma_hh','ma_hh');
    }
}
