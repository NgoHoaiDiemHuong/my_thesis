<?php

namespace App\Http\Controllers\Cus;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\hanghoa;
use App\DanhMuc;

class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = app('cart');
        // $wishlist = app('wishlist');
        $data= array();
        $dm=DanhMuc::all();
        foreach($dm as $d){
            // $tmp = $d->hanghoas;
            $tmp = hanghoa::where('ma_dm',$d->ma_dm)->where('trang_thai_kinh_doanh',1)->where('trang_thai_ban_online',1)->get();
            if(!empty($tmp)){
                if(count($tmp)>=8){
                    $tmp=['data'=>$d->hanghoas->take(8),'ten_dm'=>$d->ten_dm];
                    array_push($data,$tmp);
                }else {
                        $tmp=['data'=>$d->hanghoas,'ten_dm'=>$d->ten_dm];

                        array_push($data,$tmp);
                    }
            }
        }
        // return view('home.home')->with('data',$data);
        return view('home.home', compact('cart', 'data'));
    }

    public function getProductFromDMCon(Request $request,$ma_dm)
    {

        $data= hanghoa::where('ma_dm',$ma_dm)->get();
        return view('home.search')->with('data',$data);

    }

}
