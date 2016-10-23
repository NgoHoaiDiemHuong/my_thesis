<?php

namespace App\Http\Controllers\Emp;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\NCC;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class NCCController extends BaseController
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
        $data= NCC::paginate(10);
        return view('ncc.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ncc.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation= Validator::make($request->all(),array(
            'ten_ncc'=>'required|min:3',
            'email'=>'required|email',
            'sdt'=>'required|min:9|max:15',
            'dia_chi'=>'required',
            'ghi_chu'=>'',
            'ma_so_thue'=>'required|min:13|max:15',
            ),array(
            'ten_ncc.required'=>'Vui lòng nhập vào tên nhà cung cấp(NCC).',
            'email.required'=>'Vui lòng nhập vào email.',
            'email.email'=>'Email chưa đúng.',
            'sdt.required'=>'Vui lòng nhập vào số điện thoại',
            'sdt.min'=>'Số điện thoại chưa đúng',
            'sdt.max'=>'Số điện thoại chưa đúng',
            'dia_chi.required'=>'Vui lòng nhập vào địa chỉ',
            'ghi_chu'=>'',
            'ma_so_thue.required'=>'Vui lòng nhập vào mã số thuế',
            'ma_so_thue.min'=>'Mã số thuế chưa đúng định dạng',
            'ma_so_thue.max'=>'Mã số thuế chưa đúng định dạng',

            ));
        //validation
        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput()->with('danger','Có lỗi');
        }else{
            //Sau khi validator thanh cong
        $data = new NCC;
        $data->ma_ncc=NCC::auto_code();
        $data->ten_ncc=$request->ten_ncc;
        $data->sdt=$request->sdt;
        $data->email=$request->email;
        $data->dia_chi=$request->dia_chi;
        $data->ghi_chu=$request->ghi_chu;
        $data->ma_so_thue=$request->ma_so_thue;
        $data->save();

        return redirect()->route('emp.ncc.index')->with('success','Tạo nhà cung cấp (NCC) mới thành công');

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
        $data=NCC::find($id);
        return view('ncc.edit')->with('d',$data);
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
        $data=NCC::find($id);
        $validation= Validator::make($request->all(),array(
            'ten_ncc'=>'required|min:3',
            'email'=>'required|email',
            'sdt'=>'required|min:9|max:15',
            'dia_chi'=>'required',
            'ghi_chu'=>'',
            'ma_so_thue'=>'required|min:13|max:15|unique:nhacungcap,ma_so_thue,'.$data->id,
            ),array(
            'ten_ncc.required'=>'Vui lòng nhập vào tên nhà cung cấp(NCC).',
            'email.required'=>'Vui lòng nhập vào email.',
            'email.email'=>'Email chưa đúng.',
            'sdt.required'=>'Vui lòng nhập vào số điện thoại',
            'sdt.min'=>'Số điện thoại chưa đúng',
            'sdt.max'=>'Số điện thoại chưa đúng',
            'dia_chi.required'=>'Vui lòng nhập vào địa chỉ',
            'ghi_chu'=>'',
            'ma_so_thue.required'=>'Vui lòng nhập vào mã số thuế',
            'ma_so_thue.min'=>'Mã số thuế chưa đúng định dạng',
            'ma_so_thue.max'=>'Mã số thuế chưa đúng định dạng',
            'ma_so_thue.unique'=>'Mã số thuế đã tồn tại',

            ));
        //validation
        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput()->with('error','Có lỗi');
        }else{
            //Sau khi validator thanh cong
        $data->ten_ncc=$request->ten_ncc;
        $data->sdt=$request->sdt;
        $data->email=$request->email;
        $data->dia_chi=$request->dia_chi;
        $data->ghi_chu=$request->ghi_chu;
        $data->ma_so_thue=$request->ma_so_thue;
        $data->save();

        return redirect()->route('emp.ncc.index')->with('success','Cập nhật (NCC) thành công');

        }

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
