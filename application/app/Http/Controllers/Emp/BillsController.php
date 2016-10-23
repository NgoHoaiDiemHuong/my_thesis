<?php

namespace App\Http\Controllers\Emp;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Bill;
use App\BillDetail;
use App\Http\Requests;
use App\hanghoa;

class BillsController extends BaseController
{
    public function __construct()
    {
        $this->middleware('authNhanVien');
        // $this->middleware('auth', ['only' => 'update'])
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Bill::all();
        return view('bill.list')->with('data',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bill.add');
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
            $ma_hd =  Bill::auto_code();

            // // /*Luu phieu nhap hang*/
            $data = new Bill;
            $data->ma_hd = $ma_hd;
            $data->ma_nv = $request->ma_nv;
            $data->ma_ddh = $request->ma_ddh;
            $data->ma_kh = $request->ma_kh;
            $data->thanh_tien = $dt['tong_tien'];
            // $data->ghi_chu = $request->ghi_chu;
            $status= $data ->save();

            /*Ket thuc chi tiet phieu nhap hang*/
            /*Luu chi tiet phieu nhap hang*/

            if($status){
                foreach($dt['hanghoas'] as $hh)
                {
                     $d = new BillDetail;
                     $d->ma_hd = $ma_hd;
                     $d->ma_hh = $hh['ma_hh'];
                     $d->so_luong = $hh['so_luong'];
                     $d->don_gia = $hh['don_gia'];
                     $d->save();
                     $hh = hanghoa::where('ma_hh',$d->ma_hh)->first();
                     $hh->so_luong = (int)$hh->so_luong - (int)$d->so_luong;
                     $hh->save();
                }
            }
            /*End luu chi tiet phieu nhap hang */
            $view = view('flashMs.success')->with('msg','Thêm hóa đơn mới thành công');
            return response()->json(['view'=>(String)$view,'ma_hd'=>$ma_hd]);
            // return return response()->json($data[, 200][, $headers]);
        }
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
        //
    }
}
