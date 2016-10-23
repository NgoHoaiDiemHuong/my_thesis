<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table ="dongia";

    public function hanghoa(){
        return $this->belongsTo('App\hanghoa','ma_hh','ma_hh');
    }

}
