<?php

namespace App\Http\Controllers\Emp;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use App\NhanVien;
use App\QuyenNhanVien;


class EmloyeesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('authNhanVien');
        // $this->middleware('auth', ['only' => 'update'])
    }
    public function index()
    {
        $data = NhanVien::all();
        return view('emloyee.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('emloyee.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation=Validator::make($request->all(),array(
            'ten_nv'=>'required|min:4',
            'ngay_sinh'=>'required',
            'dia_chi'=>'required',
            'sdt'=>'required|unique:NhanVien|regex:/[0-9]{9,11}/i',
            'mat_khau'=>'required|min:5',
            ),array(
            'ten_nv.required'=>'Vui lòng nhập họ tên!',
            'ten_nv.min'=>'Tên quá ngắn vui lòng kiểm tra lại!',
            'ngay_sinh.required'=>'Vui lòng nhập vào ngày sinh!',
            'dia_chi.required'=>'Địa chỉ là bắt buộc',
            'sdt.required'=>'Vui lòng nhập vào sđt!',
            'sdt.unique'=>'Đã tồn tại sđt này trong dữ liệu',
            'sdt.regex'=>'sđt chưa đúng! ',
            'mat_khau.required'=>'Vui lòng nhập vào mật khẩu',
            'mat_khau.min'=>'Mật khẩu quá ngắn',

            ));
        if($validation->fails()){
            return Redirect::to('emp/emloyees/create')->withErrors($validation)->withInput()->with('error','Data has errors!');
        }else{
            $data = new NhanVien;
            $code = NhanVien::auto_code();
            $data->ma_nv= $code;
            $data->ten_nv = $request->ten_nv;
            $data->ma_nnd = $request->ma_nnd;
            $data->ngay_sinh = $request->ngay_sinh;
            $data->dia_chi = $request->dia_chi;
            $data->sdt = $request->sdt;
            $data->mat_khau = Hash::make($request->mat_khau);
            $data->trang_thai = $request->trang_thai;
            $data->save();
            // $data = App\NhanVien::firstOrCreate($request]);

            //luu phan quyen
            foreach ($request->ma_quyen as $q) {
                $d = new QuyenNhanVien;
                $d->ma_nv=$code;
                $d->ma_quyen=$q;
                $d->save();
            }
            return Redirect::to('emp/emloyees/create')->with('success','Data submited!');
        }
        // return var_dump($request->ma_quyen);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = NhanVien::find($id);
        return view('emloyee.detail')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = NhanVien::find($id);
        return view('emloyee.edit')->with('data',$data);
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
        $data = NhanVien::find($id);
        // $q_cu= QuyenNhanVien::where('ma_nv',"=",$data->ma_nv);
        $validation=Validator::make($request->all(),array(
            'ten_nv'=>'required|min:4',
            'ngay_sinh'=>'required',
            'dia_chi'=>'required',
            'sdt'=>'required|regex:/[0-9]{9,11}/i||unique:NhanVien,sdt,'.$data->id,
            'mat_khau'=>'min:5',
            ),array(
            'ten_nv.required'=>'Vui lòng nhập họ tên!',
            'ten_nv.min'=>'Tên quá ngắn vui lòng kiểm tra lại!',
            'ngay_sinh.required'=>'Vui lòng nhập vào ngày sinh!',
            'dia_chi.required'=>'Địa chỉ là bắt buộc',
            'sdt.required'=>'Vui lòng nhập vào sđt!',
            'sdt.unique'=>'Đã tồn tại sđt này trong dữ liệu',
            'sdt.regex'=>'sđt chưa đúng! ',
            // 'mat_khau.required'=>'Vui lòng nhập vào mật khẩu',
            'mat_khau.min'=>'Mật khẩu quá ngắn',

            ));
        if($validation->fails()){
            return Redirect::back()->withErrors($validation)->withInput()->with('error','Data has errors!');
        }else{
            // $data = NhanVien::find($id);
            // $code = NhanVien::auto_code();
            // $data->ma_nv= $code;
            $data->ten_nv = $request->ten_nv;
            $data->ma_nnd = $request->ma_nnd;
            $data->ngay_sinh = $request->ngay_sinh;
            $data->dia_chi = $request->dia_chi;
            $data->sdt = $request->sdt;
            if(!empty($request->mat_khau)){
                $data->mat_khau = Hash::make($request->mat_khau);
            }
            $data->trang_thai = $request->trang_thai;
            $data->save();
            // $data = App\NhanVien::firstOrCreate($request]);

            //***********************luu phan quyen
            $d = $q_cu = QuyenNhanVien::where('ma_nv',"=",$data->ma_nv)->get();

            // Xoa ca quyen bi huy
            foreach ($q_cu as $qc) {
                $status=0;
                foreach($request->ma_quyen as $q ){
                    if($q==$qc) $status=1;// Da ton tai trong bang phan quyen.
                    //else chua ton tai trong bang phan quyen
                }
                if($status==0){
                    //quyen da bi huy
                       $qc->delete();
                }

                }
            // them cac quyen moi
            foreach($request->ma_quyen as $q){
                $status=0;
                foreach($q_cu as $qc){
                    if($q==$qc) $status=1;
                }
                if($status==0){
                    //Luu vao CSDL
                    $d = new QuyenNhanVien;
                    $d->ma_nv=$data->ma_nv;
                    $d->ma_quyen=$q;
                    $d->save();
                }
            }
        }
        // var_dump($d);
        return Redirect::to('emp/emloyees')->with('success','Cập nhật nhân viên thành công!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = NhanVien::find($id);
        $data->delete();
        return redirect()->back()->with('success','Xóa thành công!');
    }

}
