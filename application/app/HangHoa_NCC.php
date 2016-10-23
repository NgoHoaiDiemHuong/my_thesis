<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HangHoa_NCC extends Model
{
    protected $table="HangHoa_NCC";
    public function ncc(){
        return $this->belongsTo('App\NCC','ma_ncc');
    }
    public function hanghoa(){
        return $this->belongsTo('App\hanghoa','ma_hh');
    }
}
