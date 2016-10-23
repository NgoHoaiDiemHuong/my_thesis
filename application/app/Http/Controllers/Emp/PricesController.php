<?php

namespace App\Http\Controllers\Emp;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

use DB;
use App\Price;
use App\hanghoa;
class PricesController extends BaseController
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
        $data= hanghoa::all();
        return view('prices.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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

            'don_gia'=>'required|min:500|numeric',

            ),array(
            'don_gia.required'=>'Vui lòng nhập vào giá mới!',
            'don_gia.min'=>'Giá thấp nhật là 500 đ!',
            ));
        if($request->ajax()){
            if($validation->fails()){
                return response()->json('co loi');
                // return response()->json($validation->messages());
            }else{
                $data = new Price;
                $data->ma_hh= $request->ma_hh;
                $data->don_gia = $request->don_gia;
                $data->save();
                $ms="Cập nhật giá thành công";
                  return response()->json($data);
                }

        }else{

            if($validation->fails()){
                return $validation->messages().$request->don_gia;
            }else {
                $data = new Price;
                    $data->ma_hh= $request->ma_hh;
                    $data->don_gia = $request->don_gia;
                    $data->save();
                return redirect()->back();
            }
            // return 'ajax khong hoayt dong';
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
