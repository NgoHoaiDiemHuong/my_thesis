<?php

namespace App\Http\Controllers\Emp;

use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Query\Builder;
// use Illuminate\Database\DatabaseManager as DB;
use App\hanghoa;
use App\NhanVien;
use App\KhachHang;

class SearchController extends BaseController
{
    public function __construct(){
        $this->middleware('authNhanVien');
    }
    public function searchEmp(Request $request){
        $key = $request->keywords;

         $search = NhanVien::where('ten_nv', 'LIKE', '%'. $key .'%')
        ->orWhere('ma_nv', 'LIKE', '%'. $key .'%')
        // ->orWhere('email', 'LIKE', '%'. $key .'%')
        ->orWhere('sdt', 'LIKE', '%'. $key .'%')
        ->get();

        return view('partials.search')->with('data',$search);
    }
    public function searchCus(Request $request){

    }
    public function searchPro(Request $request){
         $key = $request->keywords;
         $search = hanghoa::where('ma_hh', 'LIKE', '%'. $key .'%')
        ->orWhere('ten_hang_hoa', 'LIKE', '%'. $key .'%')
        ->paginate(10);
         return view('product.search')->with('data',$search);
    }

    public function search_pnh_hh(Request $request){
        $keyword = $request->keywords;

        $search = DB::select("SELECT hanghoa.id,hanghoa.ma_hh, hanghoa.ten_hang_hoa, hanghoa.so_luong as sl_ton_kho, hanghoa.don_vi_tinh FROM hanghoa LEFT OUTER JOIN ( SELECT ma_hh as ma, don_gia FROM dongia WHERE id IN ( SELECT max(id) FROM dongia as f WHERE f.ma_hh = dongia.ma_hh GROUP BY ma_hh )) AS B ON hanghoa.ma_hh=B.ma WHERE ( ma_hh LIKE '%".$keyword."%' OR ten_hang_hoa LIKE '%".$keyword."%')");

        // return view('partials.search_pnh_hh')->with('data',$search);
        return view('PNH.search_add')->with('data',$search);

    }
    public function search_addhd(Request $request){
        $keyword = $request->keywords;


        $search = DB::select("SELECT hanghoa.id,hanghoa.ma_hh, hanghoa.ten_hang_hoa, hanghoa.so_luong as sl_ton_kho, hanghoa.don_vi_tinh FROM hanghoa LEFT OUTER JOIN ( SELECT ma_hh as ma, don_gia FROM dongia WHERE id IN ( SELECT max(id) FROM dongia as f WHERE f.ma_hh = dongia.ma_hh GROUP BY ma_hh )) AS B ON hanghoa.ma_hh=B.ma WHERE ( ma_hh LIKE '%".$keyword."%' OR ten_hang_hoa LIKE '%".$keyword."%') ORDER BY sl_ton_kho DESC");
        return view('partials.search_pnh_hh')->with('data',$search);

    }
    public function search_addkk(){
        $keyword = $request->keywords;

        $search = DB::select("SELECT hanghoa.id,hanghoa.ma_hh, hanghoa.ten_hang_hoa, hanghoa.so_luong as sl_ton_kho, hanghoa.don_vi_tinh FROM hanghoa LEFT OUTER JOIN ( SELECT ma_hh as ma, don_gia FROM dongia WHERE id IN ( SELECT max(id) FROM dongia as f WHERE f.ma_hh = dongia.ma_hh GROUP BY ma_hh )) AS B ON hanghoa.ma_hh=B.ma WHERE ( ma_hh LIKE '%".$keyword."%' OR ten_hang_hoa LIKE '%".$keyword."%') ORDER BY sl_ton_kho DESC");
        return view('partials.search_pnh_hh')->with('data',$search);

    }

}
