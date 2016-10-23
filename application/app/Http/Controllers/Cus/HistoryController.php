<?php

namespace App\Http\Controllers\Cus;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\hanghoa;
use App\Bill;
use App\Order;
use App\DanhMuc;
use Illuminate\Support\Facades\Session;

class HistoryController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
      public function __construct()
    {
      $this->middleware('authKhachHang');
        // $this->middleware('authKhachHang');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $cart = app('cart');
        $hoadon = Bill::where('ma_kh',''.Session::get('khach_hang')->ma_kh.'')->whereNull('ma_hd')->get();
        $ddh = Order::where('ma_kh',''.Session::get('khach_hang')->ma_kh.'')->get();
        // return view('home.home')->with('data',$data);
        return view('customer.historycheckout')->with(['hoadon'=>$hoadon,'ddh'=>$ddh]);
    }

    public function getProductFromDMCon(Request $request,$ma_dm)
    {

        $data= hanghoa::where('ma_dm',$ma_dm)->get();
        return view('home.search')->with('data',$data);

    }

}
