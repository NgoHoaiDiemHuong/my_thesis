<?php

namespace App\Http\Controllers\Emp;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\DanhMuc;

class CategoriesController extends BaseController
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
        $data= DanhMuc::whereNull('ma_dm_cha')->get();
        return view('categories.list')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Categrories.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= new DanhMuc();
        $data->ma_dm= DanhMuc::auto_code();
        $data->ten_dm= $request->ten_dm;
        if(!is_null( $request->ma_dm_cha)){
        $data->ma_dm_cha= $request->ma_dm_cha;
        }
        $data->save();
        return Redirect::back()->with('success','Thêm mới danh mục thành công');
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
        $data= DanhMuc::find($id);
        $data->ten_dm=$request->ten_dm;
        $data->save();
        return Redirect::back()->with('success','Cập nhật danh mục thành công');
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
