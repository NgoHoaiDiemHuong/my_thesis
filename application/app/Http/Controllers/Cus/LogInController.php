<?php

namespace App\Http\Controllers\Cus;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\KhachHang;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LogInController extends Controller
{
    public function getLogIn(){
        // if(session::has('user')&&session::get('user.nnd')[0]=="khachhang")
        //     return redirect('/');
        // if(session::has('user')&&session::get('user.nnd')[0]=="nhanvien")
        //     return redirect('/emp');
        return view('auth.loginCus');
    }
    public function getRegis(){
        return view('auth.regis');
    }

    public function postRegis(Request $request){
        $validation= Validator::make($request->all(),array(
            'MSSV'=>'required|min:8|unique:khachhang,MSSV',
            'mat_khau'=>'required|min:3',
            're_pwd'=>'required|same:mat_khau',
            'khoa_hoc'=>'required|numeric',
            'sdt'=>'required|alpha_num|min:9|max:15|unique:khachhang,sdt',
            'ten_kh'=>'required',
            'email'=>'required|email|unique:khachhang,email',
            'dia_chi'=>'required',
            ),array(
            'MSSV.required'=>'Vui lòng nhập mã số sinh viên!',
            'MSSV.min'=>'Mã số sinh viên chưa đúng',
            'MSSV.unique'=>'mã số sinh viên đã đăng kí tài khoản',
            'mat_khau.required'=>'Vui lòng nhập mật khẩu!',
            'mat_khau.min'=>'Mật khẩu quá ngắn!',
            're_pwd.required'=>'Vui lòng nhập lại mật khẩu',
            're_pwd.same'=>'Mật khẩu chưa trùng khớp',
            'khoa_hoc.required'=>'Vui lòng nhập vào khóa học',
            'khoa_hoc.numeric'=>'Khóa học nhập chưa đúng',
            'sdt.required'=>'Số điện thoại là bắt buộc',
            'sdt.alpha_num'=>'Số điện thoại chưa đúng',
            'sdt.min'=>'Số điện thoại chưa đúng',
            'sdt.max'=>'Số điện thoại chưa đúng',
            'sdt.unique'=>'Số điện thoại đã đăng kí tài khoản',
            'ten_kh.required'=>'Vui lòng nhập tên khách hàng',
            'email.required'=>'Vui lòng nhập vào email',
            'email.email'=>'Email chưa đúng',
            'email.unique'=>'Email đã đăng kí tài khoản',
            'dia_chi.required'=>'Địa chỉ là bắt buộc',
            ));
        if($validation->fails()){
             return redirect()->back()->withInput()->withErrors($validation);
        }else{
            $data = new KhachHang;
            $data->ma_kh=KhachHang::auto_code();
            $data->ten_kh=request()->ten_kh;
            $data->sdt=request()->sdt;
            $data->MSSV=request()->MSSV;
            $data->email=request()->email;
            $data->dia_chi= request()->dia_chi;
            $data->khoa_hoc=request()->email;
            $data->mat_khau=Hash::make(request()->mat_khau);
            $data->save();
            return redirect()->route('cus.regis.success');
        }
    }
    public function getRegisSuccess(){
        return view('auth.regisSuccess');
    }
    public function postLogIn(Request $request){
        //validator
        $validation= Validator::make($request->all(),array(
            'MSSV_O'=>'required',
            'mat_khau_O'=>'required',
            ),array(
            'MSSV_O.required'=>'Vui lòng nhập mã số sinh viên!',
            'mat_khau_O.required'=>'Vui lòng nhập mật khẩu!'
            ));

        if($validation->fails()){
            return redirect()->back()->withInput()->withErrors();
        }else{
            $data= KhachHang::where('MSSV','=',$request->MSSV_O)->first();
            if(is_null($data)){
                return redirect()->back()->withInput()->withErrors('MSSV.null','MSSV chưa đăng kí tài khoản của cửa hàng');
            }else{
                    if (Hash::check($request->mat_khau_O, $data->mat_khau))
                    {
                            // The passwords match...
                            // create session....
                        session(['user' => $data]);
                        session::push('user.ho_ten',$data->ten_kh);
                        // session::push('user.nnv',$data->nhomnguoidung->ten_nnd);
                        session::push('user.nnd','khachhang');
                        // session::put(['userkh' => $data]);
                        session::put(['khach_hang' => $data]);
                        return redirect('/')->with('LogInsucces','Xin chào '.$data->ho_ten.'!' );
                    }else{
                        return redirect()->back()->withInput()->withErrors('mat_khau.InCorrect','Mật khẩu không đúng');
                    }
            }
        }
        //create secsion

    }

    public function getLogOut(){
        //Huy section
        Session::forget('user');
        Session::forget('khach_hang');
        //redirect login or Homepage
        return redirect('/');
    }
    // public function authCheck(){

    //     return false;
    // }
}
