<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    protected $table = "DANHMUC";
     static  public function auto_code()
    {
        $id='';
        if(is_null(DanhMuc::first()))
        {
           return $id = 'DM0001';
        }else{
            $id = DanhMuc::select('id')
                    ->max('id')+1;
            if($id>=1000){
               return $id = 'DM'.(string)$id;
            }if($id>=100){
               return $id = 'DM0'.(string)$id;
            }
            if($id>=10){
              return $id = 'DM00'.(string)$id;
            }
            if($id>= 0){
               return $id = 'DM000'.(string)$id;
            }
        }
        return $id;
    }

    static public function All_dmcon(){
        $danhmuccha=DanhMuc::where('ma_dm_cha','<>',NULL)
        ->where('ma_dm_cha','<>','""')
        ->get();

        //LA nhung danh muc khong co con
        // $danhmuc= DanhMuc::select('ten_dm','ma_dm')
        // ->whereNotIn('ma_dm',[1, 2, 3])
        // ->get();
        return $danhmuccha;
    }
    public function ma_dm_cha(){
        // $this->hasOne('App\DanhMuc','ma_dm','ma_dm_cha');
    }
    public function hanghoas(){
        return $this->hasMany('App\hanghoa','ma_dm','ma_dm');
    }
}
