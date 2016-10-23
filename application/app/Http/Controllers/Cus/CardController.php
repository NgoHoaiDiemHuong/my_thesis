<?php

namespace App\Http\Controllers\Cus;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller as BasicController;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Session;
use App\hanghoa;
use App\Order;
use App\Bill;
use App\BillDetail;
use \Cart as Cart;
use Validator;

class CardController extends BasicController
{
      public function __construct()
    {
      $this->middleware('authKhachHang', ['only' => 'checkout']);
        // $this->middleware('authKhachHang');
    }
    public function store(Request $request){

        if (Cart::search(['id' => $request->id])) {
            return redirect()->route('cart.index')->with('info','Hàng hóa đã thêm vào rồi!');
        }

        Cart::associate('hanghoa','App')->add($request->id, $request->ten_hang_hoa, 1, $request->don_gia);
        return redirect()->route('cart.index')->with('success','Thêm mới hàng hóa');
    }

    public function change_soluong(Request $request){
           // $data = hanghoa::find($ma_hh);
            // $carts= Session::get('cart.pro');
            // $tong_tien = Session::get('cart.tong_tien');
            // $sum_so_luong =0;
            // foreach($carts as $k=>$v){
            //     if( $carts[$k]['id'] == $request->id){
            //         $temp =  $carts[$k]['thanh_tien'];
            //         $carts[$k]['so_luong'] = $request->so_luong;
            //         $carts[$k]['thanh_tien'] = $v['don_gia'] * $request->so_luong;
            //         $tong_tien = $tong_tien-  $temp + $carts[$k]['thanh_tien'];
            //     }
            //     $sum_so_luong =$sum_so_luong+$carts[$k]['so_luong'];
            // }
            // Session::set('cart.pro',$carts);
            // Session::set('cart.so_luong',$sum_so_luong);
            // Session::set('cart.tong_tien',$tong_tien);
            // return $request->so_luong;

    }

    public function hover_Card(){
        return view('home.hover_card');
    }
    public function index(){

        return view('home.indexCart');
    }
    public function destroy($id)
    {
        Cart::remove($id);
         return redirect()->route('cart.index')->with('success','Item has been removed!');
    }
    public function emptyCart(Request $request)
    {
        Cart::destroy();
        return redirect()->route('cart.index')->with('success','Your cart his been cleared!');
    }
     public function update(Request $request, $id)
    {
        // Validation on max quantity
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric'
        ]);

         if ($validator->fails()) {
            session()->flash('error_message', 'Quantity must be between 1 and 5.');
            return response()->json(['success' => false]);
         }

        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'Quantity was updated successfully!');
        return response()->json(['success' => true]);

    }
    public function checkout(Request $request)
    {
        if($request->session()->has('khach_hang')){
            return view('home.checkout');
        }else{
            return view('auth.regis')->with('msg_checkout','Bạn chưa đăng nhập! vui lòng đăng nhập hoặc đăng kí để mua hàng');
            // return redirect()->route('cus.getLogin')
        }

    }
    public function postCheckout(Request $request)
    {
        // luu lai don dat hang
        $ma_ddh = Order::auto_code();
        $ddh = new Order();
        $ddh->ma_ddh = $ma_ddh;
        $ddh->ma_kh = $request->ma_kh;
        $ddh->thanh_tien = Cart::total();
        $ddh->trang_thai = 0;/*hang chua giao*/
        $status1 = $ddh->save();
        if($status1){
            $ma_hd = Bill::auto_code();
            $hd = new Bill();
            $hd->ma_hd = $ma_hd;
            $hd->ma_kh = $request->ma_kh;
            $hd->ma_ddh = $ma_ddh;
            $hd->ma_nv = NULL;
            $hd->thanh_tien = Cart::total();
            $status2 = $hd->save();
            if($status2){
                foreach (Cart::content() as $item){
                    $dt = hanghoa::find($item->id);
                    $billDetail = new BillDetail();
                    $billDetail->ma_hd= $ma_hd;
                    $billDetail->ma_hh=$dt->ma_hh;
                    $billDetail->so_luong= $item->qty;
                    $billDetail->don_gia= $item->price;
                    $billDetail->save();
                    $dt ->so_luong = $dt ->so_luong-$item->qty;
                    $dt->save();
                }
            }
        }else{
            return "Loi ket noi du lieu";
        }
        Cart::destroy();
        return redirect('/')->with('success','Đơn hàng đã dặt thành công');

    }
}
