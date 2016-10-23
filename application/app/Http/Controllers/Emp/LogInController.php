<?php

namespace App\Http\Controllers\Emp;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\NhanVien;
use App\QuyenNhanVien;
use App\NhomQuyen;

use App\Http\Requests;
class LogInController extends BaseController
{
    public function __construct()
    {
        // $this->middleware('authNhanVien');
        $this->middleware('authNhanVien', ['only' => 'getLogout']);
    }
    public function getLogIn(){
        if(Session::has('users'))
            return redirect('/emp');
        return view('auth.loginEmp');
    }
    public function postLogIn(Request $request){
        //validator
        $validation= Validator::make($request->all(),array(
            'sdt'=>'required',
            'mat_khau'=>'required',
            ),array(
            'sdt.required'=>'Vui lòng nhập số điện thoại!',
            'mat_khau.required'=>'Vui lòng nhập mật khẩu!'
            ));

        if($validation->fails()){
            return redirect()->back()->withInput()->withErrors($validation);
        }else{
            $data= NhanVien::where('sdt','=',$request->sdt)->first();
            if(is_null($data)){
                return redirect()->back()->withInput()->with('sdt.null','Số điện thoại không tồn tại');
            }else{
                    if (Hash::check($request->mat_khau,$data->mat_khau))
                    {
                            // The passwords match...
                        //lay phan quyen
                        // $quyenNhanVien = $data->quyen;
                        // $nhomquyen = $data->nhom_quyen;
                            // create session....

                        session(['users' => $data]);
                        session::push('user.ho_ten',$data->ten_nv);
                        session::push('user.nnv',$data->nhomnguoidung->ten_nnd);
                        session::push('user.nnd','nhanvien');
                        // session::push('user.quyenNhanVien',$quyenNhanVien);
                        // session::push('user.nhomquyen',$nhomquyen);

                        return redirect('/emp')->with('success','Xin chào '.$data->ten_nv.'!' );
                    }else{
                        return redirect()->back()->withInput()->with('mat_khau.incorect','Mật khẩu không đúng');
                    }
            }
        }
        //create secsion

    }

    public function getLogout(Request $request){
        //Huy section
        Session::forget('user');
        Session::forget('user.ho_ten');
        Session::forget('user.nnv');
        Session::forget('user.nnd');
        //redirect login or Homepage
        // unset($_SESSION);
        // session_destroy();
        // session_start();
        $request->session()->flush();
        // return "louout";
        return redirect()->route('emp.getLogIn');
    }

}
