<?php

namespace App\Http\Controllers\Emp;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use App\Http\Requests;
// use App\Http\Controllers\Controller;
use App\PhieuNhapHang;
use App\ChiTietPhieuNhapHang;
use App\hanghoa;


class PhieuNhapHangController extends BaseController
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
        $data= PhieuNhapHang::all();
        return view('PNH.list')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('PNH.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


       if($request->ajax()) {
            $dt=json_decode($request->hanghoas,true);
            $ma_pn =  PhieuNhapHang::auto_code();

            // /*Luu phieu nhap hang*/
            $data = new PhieuNhapHang;
            $data->ma_pnh = $ma_pn;
            $data->ma_nv = $request->ma_nv;
            $data->ma_ncc = $request->ma_ncc;
            $data->ngay_nhap = strtotime($request->ngay_nhap);
            $data->ngay_nhap = $request->ngay_nhap;
            $data->thanh_tien = $dt['tong_tien'];
            $data->ghi_chu = $request->ghi_chu;
            $data->ten_nguoi_giao = $request->ten_nguoi_giao;
            $status= $data ->save();
            /*Ket thuc chi tiet phieu nhap hang*/
            /*Luu chi tiet phieu nhap hang*/
            // $d = new ChiTietPhieuNhapHang;
            if($status){
                foreach($dt['hanghoas'] as $hh)
                {
                     $d = new ChiTietPhieuNhapHang;
                     $d->ma_pnh = $ma_pn;
                     $d->ma_hh = $hh['ma_hh'];
                     $d->so_luong = $hh['so_luong'];
                     $d->don_gia = $hh['don_gia'];
                     $d->save();
                     $hh = hanghoa::where('ma_hh',$d->ma_hh)->first();
                     $hh->so_luong = $hh->so_luong + $d->so_luong;
                     $hh->save();
                }
            }
            /*End luu chi tiet phieu nhap hang */
            $view = view('flashMs.success')->with('msg','Thêm mới phiếu nhập hàng thành công');
            return Response::json((String)$view);
            // return redirect('emp/pnh')->with('success','Phiếu nhập hàng đã được tạo mới');
            // return Response::json($ma_pn);
        }
        return $ma_pn;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        //
    }
}
