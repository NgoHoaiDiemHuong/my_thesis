<?php

namespace App\Http\Controllers\Emp;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\hanghoa;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Controller as BaseController;
use Intervention\Image\Facades\Image as Image;
class ProductsController extends BaseController
{
      public function __construct()
    {
        $this->middleware('authNhanVien');
        // $this->middleware('authNhanVien', ['only' => 'getLogout']);
    }
    public function index()
    {
        $data = hanghoa::all();

        return view('product.index')->with('data',$data);
    }


    public function create()
    {
        return view('product.add');
    }



    public function store(Request $request)
    {
        $validation= Validator::make($request->all(),array(
            'ten_hang_hoa'=>'required',
            // 'hinh_anh'=>'max:100M',
            'don_vi_tinh'=>'required',
            'xuat_xu'=>'required',
            'ma_dm'=>'required',
            ),array(
            'ten_hang_hoa.required'=>'Bắt buộc!',
            // 'hinh_anh.max'=>'Kích thước lớn nhất cho phép là 10M',
            'don_vi_tinh.required'=>'Đơn vị tính là bắt buộc',
            'xuat_xu.required'=>'Xuất xứ là bắt buộc',
            'ma_dm.required'=>'Danh mục là bắt buộc!',

            ));
        //validation
        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput()->with('danger','Có lỗi');
        }else{
            //Sau khi validator thanh cong
        $data = new hanghoa;
        $file=Input::file('hinh_anh');
        // $file = $request->file('hinh_anh');
        $file_name = time().'.'.$file->getClientOriginalExtension();
        $des='product-imgs\\';
        $file_des='product-imgs\\'. time().'.'.$file->getClientOriginalExtension();

       if ($request->hasFile('hinh_anh')) {
            // $ext = $file->getClientOriginalExtension();
            $file = Image::make($file)->resize(200,200);
            $success = $file->save($file_des);
            if($success){
            $data->ma_hh= hanghoa::auto_code();
                $data->ten_hang_hoa = $request->ten_hang_hoa;
                // $data->ma_vach = $request->ma_vach;
                $data->hinh_anh = $file_name;
                $data->don_vi_tinh = $request->don_vi_tinh;
                $data->xuat_xu = $request->xuat_xu;
                $data->mo_ta = $request->mo_ta;
                $data->ma_dm = $request->ma_dm;
                $data->trang_thai_ban_online = $request->trang_thai_ban_online;
                $data->trang_thai_kinh_doanh = $request->trang_thai_kinh_doanh;
                $data->save();
         }else{
            return $file->getErrorMessage().$des.$request->file('hinh_anh').Input::file('hinh_anh');
         }
        }else return "Khong co file anh";


        // $data = App\NhanVien::firstOrCreate($request]);
        }
        return redirect('emp/product')->with('success','Thêm mới thành công!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=hanghoa::find($id);
        return view('product.detail')->with('data',$data);
    }


    public function edit($id)
    {
        $data=hanghoa::find($id);
        return view('product.edit')->with('data',$data);
    }


    public function update(Request $request, $id)
    {
        $data=hanghoa::find($id);
        //validation
         $validation= Validator::make($request->all(),array(
            'ten_hang_hoa'=>'required',
            'hinh_anh'=>'max:100M',
            'don_vi_tinh'=>'required',
            'xuat_xu'=>'required',
            'mo_ta'=>'',
            'ma_dm'=>'required',
            ),array(
            'ten_hang_hoa.required'=>'Bắt buộc!',
            'hinh_anh.max'=>'Kích thước lớn nhất cho phép là 10M',
            'don_vi_tinh.required'=>'Đơn vị tính là bắt buộc',
            'xuat_xu.required'=>'Xuất xứ là bắt buộc',
            'mo_ta'=>'',
            'ma_dm.required'=>'Danh mục là bắt buộc!',
            ));

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput()->with('danger','Có lỗi!');
            // return "coloi";
        }else{


           if ($request->hasFile('hinh_anh')) {
                $file=Input::file('hinh_anh');
                $file_name = time().'.'.$file->getClientOriginalExtension();
                $des='product-imgs\\';
                $file_des='product-imgs\\'. time().'.'.$file->getClientOriginalExtension();
                // $success = $file->move($des,$file_name);
                $file = Image::make($file)->resize(200,200);
                $success = $file->save($file_des);
                if($success){
                    $data->hinh_anh = $file_name;
                    $data->ten_hang_hoa = $request->ten_hang_hoa;
                    $data->don_vi_tinh = $request->don_vi_tinh;
                    $data->xuat_xu = $request->xuat_xu;
                    $data->mo_ta = $request->mo_ta;
                    $data->ma_dm = $request->ma_dm;
                    $data->trang_thai_ban_online = $request->trang_thai_ban_online;
                    $data->trang_thai_kinh_doanh = $request->trang_thai_kinh_doanh;
                    $data->save();
                }else{
                   return redirect()->back()->with('error',$file->getErrorMessage());
                   // return "coloi tai anh";

                }
            }else {
                    $data->ten_hang_hoa = $request->ten_hang_hoa;
                    $data->don_vi_tinh = $request->don_vi_tinh;
                    $data->xuat_xu = $request->xuat_xu;
                    $data->mo_ta = $request->mo_ta;
                    $data->ma_dm = $request->ma_dm;
                    $data->trang_thai_ban_online = $request->trang_thai_ban_online;
                    $data->trang_thai_kinh_doanh = $request->trang_thai_kinh_doanh;
                    $data->save();
             return redirect()->back()->with('success','Cập nhật thành công!');
            }
    }
    return redirect()->back()->with('success','Cập nhật thành công!');
    }
    public function destroy($id)
    {
        $data = hanghoa::find($id);
        $ok = PDO::exec ($data->delete());
        if(!$ok)
        return redirect('emp/product')->with('success','Đã xóa hàng hóa thành công!');
        else redirect('emp/product')->with('danger','Không thể xóa được vì hàng hóa đã được dùng đến!');
    }
}