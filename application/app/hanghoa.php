<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use DB;
class hanghoa extends Model
{
     protected $table = 'HANGHOA';
     /*Ham lay max id + tiếp theo  đỏi thành chuỗi có số 0 phía trước*/
     static  public function max_id_var()
    {
        $id='';
        if(is_null(hanghoa::first()))
        {
           return $id = '0001';
        }else{
            $id = hanghoa::select('id')
                    ->max('id')+1;
            if($id>=1000){
               return $id = (string)$id;
            }if($id>=100){
               return $id = '0'.(string)$id;
            }
            if($id>=10){
              return $id = '00'.(string)$id;
            }
            if($id>= 0){
               return $id = '000'.(string)$id;
            }
        }
        return $id;
    }
    //Hàm tự sinh mã hàng hóa
    static  public function auto_code()
    {
        $id='';
        if(is_null(hanghoa::first()))
        {
           return $id = 'HH0001';
        }else{
            $id = hanghoa::select('id')
                    ->max('id')+1;
            if($id>=1000){
               return $id = 'HH'.(string)$id;
            }if($id>=100){
               return $id = 'HH0'.(string)$id;
            }
            if($id>=10){
              return $id = 'HH00'.(string)$id;
            }
            if($id>= 0){
               return $id = 'HH000'.(string)$id;
            }
        }
        return "HH".$id;
    }
    //Danh muc hang hoa
    public function danhmuc(){
        return $this->belongsTo('App\DanhMuc','ma_dm','ma_dm');
    }
    // gia ban moi nhat
    static public function prices(){

    // SELECT ma_hh,don_gia, max(created_at) as FirstViewed
    // FROM dongia
    // GROUP BY ma_hh
    // $x = DB::statement('SELECT * FROM hanghoa LEFT OUTER JOIN (SELECT ma_hh as ma,don_gia, max(created_at) FROM dongia GROUP BY ma_hh) AS B ON hanghoa.ma_hh=B.ma');
    // return $x;
    $x = DB::select('SELECT * FROM hanghoa LEFT OUTER JOIN ( SELECT ma_hh as ma, don_gia FROM dongia WHERE id IN ( SELECT max(id) FROM dongia as f WHERE f.ma_hh = dongia.ma_hh GROUP BY ma_hh )) AS B ON hanghoa.ma_hh=B.ma');
    return $x;
    }
    static public function gia_ban_cuoi($d){
        $x = DB::table('dongia')
                ->where('ma_hh','=',$d)
                ->orderBy('created_at', 'asc')
                ->first();
        return $x?(String)$x->don_gia:NULL;
    }
    static

    // 1 hang hoa co n phieu nhap hang
      public  function chitietphieunhaphang(){
        return $this->hasMany('App\ChiTietPhieuNhapHang','ma_hh','ma_hh');
        // return $this->hasMany('App\ChiTietPhieuNhapHang','ma_hh','ma_hh');
    }
    //
     static public function gia_nhap_cuoi($d){
        $x = DB::table('chitietnhap')
                ->where('ma_hh','=',$d)
                ->orderBy('created_at', 'asc')
                ->first();
        return $x?(String)$x->don_gia:NULL;
    }
}
