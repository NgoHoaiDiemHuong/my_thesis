<?php

namespace App\Http\Controllers\Emp;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PhieuTraHangNhap;
use App\PhieuNhapHang;
use App\ChiTietPhieuTraHangNhap;
use App\hanghoa;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;



class PhieuTraHangNhapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function __construct()
    {
        $this->middleware('authNhanVien');
        // $this->middleware('authNhanVien', ['only' => 'getLogout']);
    }
    public function index()
    {
        $data= PhieuTraHangNhap::all();
        return view('PNH.THNIndex')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data= PhieuNhapHang::find($request->idPNH);
        $hanghoas = DB::select("SELECT A.ma_pnh,A.ma_hh, A.so_luong as sl_nhap, A.don_gia, B.ma_hh,B.ten_hang_hoa, B.so_luong as sl_ton_kho FROM CHITIETNHAP as A, HANGHOA as B WHERE (A.ma_pnh = '".$data->ma_pnh."' AND A.ma_hh = B.ma_hh )");
        return view('PNH.THNAdd')->with(['data'=>$data,'hanghoas'=>$hanghoas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ma_pthn= PhieuTraHangNhap::auto_code();
        if($request->ajax()) {

        $dt=json_decode($request->hanghoas,true);
        $validation=Validator::make($request->all(),array(
            'ma_nv'=>'required',
            'ngay_th'=>'required',

            ),array(
            'ma_nv.required'=>'Vui lòng nhập họ tên!',
            'ngay_th.required'=>'Vui lòng nhập vào ngày sinh!',

            ));
        if($validation->fails()){
            // return redirect()->back()->withErrors($validation)->withInput()->with('error','Data has errors!');
               $view = view('flashMs.error')->with('msg','Có lỗi dữ liệu không hợp lệ');
                return Response::json((String)$view);
        }else{
        //     /*luu phieu phieu kiem ke*/
            $ok= 0;
            if(count($dt['hanghoas'])>0){
                 foreach($dt['hanghoas'] as $hh)
                    {
                        if((Int)$hh['so_luong'] > 0) $ok=1;

                    }


            }
            if($ok==1){
                $pkk = new PhieuTraHangNhap();
                $pkk->ma_pnh = $request->ma_pnh;
                $pkk->ma_pthn = $ma_pthn;
                $pkk->ma_nv = $request->ma_nv;
                $pkk->ngay_th  = $request->ngay_th; /*ngay kiem ke*/
                $pkk->thanh_tien  = $dt['tong_tien'];
                $status=$pkk->save();
                // echo $pkk;
                if($status){
                    foreach($dt['hanghoas'] as $hh)
                    {   if( (Int)$hh['so_luong']>0){
                         $d = new ChiTietPhieuTraHangNhap();
                         $d->ma_pthn = $ma_pthn;
                         $d->ma_hh = $hh['ma_hh'];
                         $d->so_luong = $hh['so_luong'];
                         $d->don_gia = $hh['don_gia'];
                         $d->thanh_tien = $hh['thanh_tien'];
                         $d->save();
                         $data= hanghoa::where('ma_hh',$hh['ma_hh'])->first();
                         $data->so_luong =  (Int)$data->so_luong - (Int)$hh['so_luong'];
                         $data->save();
                            }

                    }
                    $view = view('flashMs.success')->with('msg','Thêm mới phiếu trả hàng nhập thành công');
                    return Response::json(['view'=>(String)$view,'success'=>'true']);

                }else{
                //     // return redirect()->back()->withErrors($validation)->withInput()->with('error','Loi khong luu duoc phieu kiem ke!');
                     $view = view('flashMs.error')->with('msg','Có lỗi không lưu được phiếu trả hàng nhập');
                    return Response::json(['view'=>(String)$view,'success'=>'false']);

                }
            }else{
                 $view = view('flashMs.error')->with('msg','Không có trả hàng hóa');
                    return Response::json(['view'=>(String)$view,'success'=>'false']);
            }
        }
            // $view = view('flashMs.success')->with('msg','Thêm mới phiếu trả hàng nhập thành công');
            // return Response::json((String)$view);
            // return $request->hanghoas;
        }

        // return not ajax;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $d = PhieuTraHangNhap::find($id);
        $d->delete();
        return redirect()->back();

    }
}
