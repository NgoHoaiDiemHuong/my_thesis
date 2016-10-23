<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhomQuyen extends Model
{
    protected $table ="NHOMQUYEN";
    public function quyens(){
        return $this->hasMany('App\Quyen','ma_nq','ma_nq');
    }
}
