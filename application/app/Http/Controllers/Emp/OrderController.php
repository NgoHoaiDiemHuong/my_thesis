<?php

namespace App\Http\Controllers\Emp;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;
use App\Bill;
use App\BillDetail;
use App\hanghoa;
class OrderController extends Controller
{
      public function __construct()
    {
        $this->middleware('authNhanVien');
        // $this->middleware('authNhanVien', ['only' => 'getLogout']);
    }
    public function index(){
        // xem danh sacj don dat hang
        $data= Order::all();
        return view('order.list')->with('data',$data);
    }
    public function newIndex(){
        // xem danh sach don dat hang chua giao hang
        $data= Order::where('trang_thai','0')->get();
        return view('order.list')->with('data',$data);
    }
    public function show($id){
        // xem chi tiet don dat hang
    }
    public function detroy($id){
        // XOA HANG HOA
    }
    public function send($id){
        // DANH DAU GIAO HANG
        $dt = Order::find($id);
        $dt->trang_thai=1;
        $dt->save();
        return redirect()->back()->with('success','Đơn hàng cập nhật trạng thái thành công');
    }
}
