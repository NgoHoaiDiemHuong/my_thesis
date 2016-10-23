<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\NhanVien;


use App\Http\Requests;

class LogInController extends Controller
{
    public function getLogIn(){
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
            return redirect()->back()->withInput()->withErrors();
        }else{
            $data= NhanVien::where('sdt','=',$request->sdt)->first();
            if(is_null($data)){
                return redirect()->back()->withInput()->withErrors('sdt.null','Số điện thoại không tồn tại');
            }else{
                    if (Hash::check($request->mat_khau, $data->mat_khau))
                    {
                            // The passwords match...
                            // create session....
                        session(['user' => $data]);
                        session::push('user.ho_ten',$data->ho_ten);
                        session::push('user.nnv',$data->nhomnguoidung->ten_nnd);
                        session::push('user.nnd','nhanvien');

                        return redirect('/')->with('LogInsucces','Xin chào '.$data->ho_ten.'!' );
                    }else{
                        return redirect()->back()->withInput()->withErrors('mat_khau.InCorrect','Mật khẩu không đúng');
                    }
            }
        }
        //create secsion

    }

    public function getLogout(){
        //Huy section
        Session::forget('user');
        //redirect login or Homepage
        return redirect('/LogIn');
    }
    public function authCheck(){

        return false;
    }
}
