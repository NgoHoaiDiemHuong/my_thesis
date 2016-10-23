<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NCC extends Model
{
    protected $table= "NHACUNGCAP";
     static public function auto_code(){
        $id='NCC000';
        if(is_null(NCC::first()))
        {
           return $id = 'NCC001';
        }else{
            $id = NCC::select('id')
                    ->max('id')+1;
            // if($id>=1000){
            //    return $id = 'NCC'.(string)$id;
            // }
            if($id>=100){
               return $id = 'NCC'.(string)$id;
            }
            if($id>=10){
              return $id = 'NCC0'.(string)$id;
            }
            if($id>= 0){
               return $id = 'NCC00'.(string)$id;
            }
        }
        return "NCC".$id;
    }
    public function hanghoa(){
        return $this->hasManyThrough('App\HangHoa_NCC','ma_ncc','App\hanghoa','ma_hh');
    }
}
