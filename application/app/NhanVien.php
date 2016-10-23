<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    protected $table = 'NHANVIEN';
    // public  function nhomnguoidung1($ma_nnd){
    //     $ten_nnd = DB('NHOMNGUOIDUNG')::where($ma_nnd,'=','ma_nnd')->select('ten_nnd')->get();
    //     return $ten_nnd;
    // }
    //Ham lay ma tu tang
     static  public function auto_code()
    {
        $id='';
        if(is_null(NhanVien::first()))
        {
           return $id = '0001';
        }else{
            $id = NhanVien::select('id')
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
        return "NV".$id;
    }
    // Relationship 1 nhan vien thuoc 1 nhom nguoi dung
    public function nhomnguoidung()
    {
        return $this->belongsTo('App\NhomNguoiDung','ma_nnd','ma_nnd');
        // How to use:
        // $ten_nnd= App\NhanVien::find(3)->nhomnguoidung->ten_nnd;
    }

    public function QuyenNhanVien(){
        $this->hasMany('App\QuyenNhanVien','ma_nv');
    }

    public function phan_quyen(){
        $data = [];
        $qnvs = $this->quyen();
        if(isNull($qnvs)){
            foreach($qnvs as $d){
                array_push($data,$d->ma_quyen);
            }
        }
        return $data;
    }

    public function quyens()
    {
        // return $this->hasManyThrough('App\NhomQuyen', 'App\Quyen', 'ma_quyen', 'ma_nq');
        return $this->hasMany('App\QuyenNhanVien','ma_nv','ma_nv');
    }
    public function nhomquyens()
    {
        // return $this->hasManyThrough('App\NhomQuyen', 'App\Quyen', 'ma_quyen', 'ma_nq');
        return $this->hasManyThrough('App\NhomQuyen','App\QuyenNhanVien','ma_nv','ma_nq');

    }
}
