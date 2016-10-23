<?php

namespace App\Http\Controllers\Emp;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller as BasicController;
use App\Http\Requests;
// use App\Http\Requests\Request;
use App\Http\Controllers\Controller;
use App\PhieuKiemKe;
use App\ChiTietPhieuKiemKe;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;



class PhieuKiemKeController extends BasicController
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
        $data= PhieuKiemKe::all();
        return view('PKK.list')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('PKK.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ma_pkk= PhieuKiemKe::auto_code();
        if($request->ajax()) {

        $dt=json_decode($request->hanghoas,true);
        $validation=Validator::make($request->all(),array(
            'ma_nv'=>'required',
            'ngay_kk'=>'required',
            ),array(
            'ma_nv.required'=>'Vui lòng nhập họ tên!',
            'ngay_kk.required'=>'Vui lòng nhập vào ngày sinh!',
            ));
        if($validation->fails()){
            // return redirect()->back()->withErrors($validation)->withInput()->with('error','Data has errors!');
                return Response::json('co_loi');
        }else{
        //     /*luu phieu phieu kiem ke*/
            if(count($dt['hanghoas'])>0){
                $pkk = new PhieuKiemKe();
                $pkk->ma_pkk = $ma_pkk;
                $pkk->ma_nv = $request->ma_nv;
                $pkk->ngay_kk  = $request->ngay_kk; /*ngay kiem ke*/
                $pkk->trang_thai= $request->luu=='Luu_tam'?0:1;
                $pkk->sl_mat_hang=count($dt['hanghoas']);
                $status=$pkk->save();
                if($status){
                // if(1){
                    foreach($dt['hanghoas'] as $hh)
                    {
                         $d = new ChiTietPhieuKiemKe;
                         $d->ma_pkk = $ma_pkk;
                         $d->ma_hh = $hh['ma_hh'];
                         $d->sl_ton_kho = $hh['sl_ton_kho'];
                         $d->sl_thuc_te = $hh['sl_thuc_te'];

                         $d->save();

                    }
                }else{
                    // return redirect()->back()->withErrors($validation)->withInput()->with('error','Loi khong luu duoc phieu kiem ke!');
                     return Response::json('Loi khong luu duoc phieu kiem ke!');
                }
            }else{
                return Response::json('Khong ton tai hang hoa');
            }
        }
            $view = view('flashMs.success')->with('msg','Thêm mới phiếu phiếu kiểm kê thành công');
            return Response::json((String)$view);
            // return Response::json($request->hanghoas);
        }

        return $request->hanghoas;
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
    public function edit(Request $request,$id)
    {
        $pkk = PhieuKiemKe::find($id);
        if($pkk->trang_thai==0){
             $hanghoas=DB::select("SELECT A.id, A.ma_pkk, A.sl_thuc_te, A.ma_hh, B.ma_hh,B.ten_hang_hoa, B.so_luong AS sl_ton_kho FROM CHITIETPHIEUKIEMKE as A, HANGHOA as B WHERE (A.ma_pkk = '".$pkk->ma_pkk."' AND A.ma_hh = B.ma_hh )");
         }else{
            $hanghoas=DB::select("SELECT A.id, A.ma_pkk, A.sl_thuc_te, A.ma_hh, B.ma_hh,B.ten_hang_hoa, B.so_luong AS sl_ton_kho FROM CHITIETPHIEUKIEMKE as A, HANGHOA as B WHERE (A.ma_pkk = '".$pkk->ma_pkk."' AND A.ma_hh = B.ma_hh )");
         }
         // if($request->ajax()){
         //    $table = array();
         //    foreach ($hanghoas as $hh) {

         //       $table[]= array('id'=>(Int)$hh->id,'ma_hh'=>(String)$hh->ma_hh,'ten_hang_hoa'=>(String)$hh->ten_hang_hoa,'sl_hang_ton'=>(Int)$hh->sl_ton_kho,'sl_thuc_te'=>(Int)$hh->sl_thuc_te);

         //    }
         //    $json = json_encode($table,JSON_UNESCAPED_UNICODE);

         //    echo $table;

         // }

         // $hanghoas = json_encode($hanghoas);
         return view('PKK.edit')->with(['pkk'=>$pkk,'hanghoas'=>$hanghoas]);

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
