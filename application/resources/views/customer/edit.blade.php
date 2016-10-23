@extends('layouts.masterEmp')
@section('title','Cập nhật khách hàng')
@section('css')
<style type="text/css">
    div .form-group{
       /* margin-top: 30px;*/
    }
</style>
@endsection
@section('content')

<h3><i class="fa fa-angle-right"></i> Cập nhật khách hàng</h3>
<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel">
            <form class="horizontal style-form" action="{{route('emp.cus.update',$data->id)}}" method="post" accept-charset="utf-8"  enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token()}}">
                <input type="hidden" name="_method" value="PATCH">
                <div  style="border-bottom: 0.5px solid #F2F2F2; padding-bottom: 15px;" class="form-group col-sm-12">
                     <label class="col-sm-2 col-sm-2 control-label">Mã khách hàng</label>
                     <div class="col-sm-10">
                        <input  class="form-control" type="text" name="ma_kh" value="{{$data->ma_kh}}" disabled>
                        @if($errors->has('ma_kh'))
                        <span class="help-block">{{$errors->first('ma_kh')}}</span>
                        @endif
                    </div>
                </div>
                <div  style="border-bottom: 0.5px solid #F2F2F2; padding-bottom: 15px;" class="form-group col-sm-12">
                     <label class="col-sm-2 col-sm-2 control-label">Tên khách hàng</label>
                     <div class="col-sm-10">
                        <input  class="form-control" type="text" name="ten_kh" value="{{$data->ten_kh}}" placeholder="Tên hàng hóa...">
                        @if($errors->has('ten_kh'))
                        <span class="help-block">{{$errors->first('ten_kh')}}</span>
                        @endif
                    </div>
                </div>
                <div style="border-bottom: 1px solid #F2F2F2; padding-bottom: 15px; padding-top: 15px;"  class="form-group col-sm-12">
                     <label class="col-sm-2 col-sm-2 control-label">MSSV</label>
                     <div class="col-sm-10">
                         <input  class = "form-control" type="text" name="MSSV" value="{{$data->MSSV}}" placeholder="Đơn vị tính...">
                        @if($errors->has('MSSV'))
                        <span class="help-block">{{$errors->first('MSSV')}}</span>
                        @endif
                    </div>
                </div>
                <div style="border-bottom: 0.5px solid #F2F2F2; padding-bottom: 15px; padding-top: 15px;"  class="form-group col-sm-12">
                     <label class="col-sm-2 col-sm-2 control-label">Khóa học</label>
                     <div class="col-sm-10">
                            <input class = "form-control" type="number" name="khoa_hoc" value="{{$data->khoa_hoc}}" placeholder="Xuất xứ...">
                            @if($errors->has('khoa_hoc'))
                            <span class="help-block">{{$errors->first('khoa_hoc')}}</span>
                            @endif
                    </div>
                </div>
                <div style="border-bottom: 0.5px solid #F2F2F2; padding-bottom: 15px; padding-top: 15px;"  class="form-group col-sm-12">
                     <label class="col-sm-2 col-sm-2 control-label">Khóa học</label>
                     <div class="col-sm-10">
                            <input class = "form-control" type="password" name="mat_khau" value="" placeholder="Nhập vào mật khẩu mới..">
                            @if($errors->has('mat_khau'))
                            <span class="help-block">{{$errors->first('mat_khau')}}</span>
                            @endif
                    </div>
                </div>


            <br>
            <div class="row">

                <div class="col-sm-12">
                    <hr>
                    <input type="button"  class="btn btn-defaulf" value="Quay lại" name="Quay lại">
                    <input style="float:right" class="btn btn-primary" type="submit" name="submit" value="Submit">
                </div>
            </div>
            </form>

        </div>

    </div>
</div>

@endsection

