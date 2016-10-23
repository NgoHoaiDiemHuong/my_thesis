<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quyen extends Model
{
    protected $table = "QUYEN";
    static public function auto_code(){
        $id='';
        if(is_null(Quyen::first()))
        {
           return $id = "Q".'00001';
        }else{
            $id = Quyen::select('id')
                    ->max('id')+1;

            if($id>=1000){
               return $id = 'Q0'.(string)$id;
            }
            if($id>=100){
               return $id = "Q".'00'.(string)$id;
            }
            if($id>=10){
              return $id = "Q".'000'.(string)$id;
            }
            if($id>= 1){
               return $id = "Q".'0000'.(string)$id;
            }
        }
        return "Q".$id;
    }
    public function nhomquyen(){
       return $this->belongsTo('App\NhomQuyen','ma_nq','ma_nq');
    }
}
