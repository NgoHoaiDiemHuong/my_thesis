@extends('layouts.masterEmp')
@section('title','QL-hàng hóa - G7_Mart')
@section('css')
<style type="text/css">
    div .form-group{
        /*text-align: left;*/
    }

</style>
@endsection
@section('content')

<h3><i class="fa fa-angle-right"></i> Thêm hàng hóa mới</h3>
<hr>
<div class="row mt">
    <div class="col-sm-12 col-md6 col-lg-6" style="align-items: left;">
        <br>
        <form class="form-horizontal" method="post" action="{{route('emp.ncc.store')}}">
          <div class="form-group {{ $errors->has('MSSV') ? ' has-error' : '' }}">
            <label for="MSSV" class="col-sm-2 control-label">Mã NCC</label>
            <div class="col-sm-10">
              <input disabled class="control-group" placeholder="Tự động...">
            </div>
          </div>
          <div class="form-group {{ $errors->has('ten_ncc') ? ' has-error' : '' }}">
            <label for="ten_ncc" class="col-sm-2 control-label">Tên ncc</label>
            <div class="col-sm-10">
              <input value="{{ old('ten_ncc') }}" type="text" class="form-control" id="ten_ncc" name="ten_ncc" placeholder="Tên ncc...">
              @if($errors->has('ten_ncc'))
                        <span class="help-block">{{$errors->first('ten_ncc')}}</span>
                        @endif
            </div>
          </div>
          <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input value="{{ old('email') }}" type="email" class="form-control" id="email" name="email" placeholder="Email...">
              @if($errors->has('email'))
                        <span class="help-block">{{$errors->first('email')}}</span>
                        @endif
            </div>
          </div>
          <div class="form-group {{ $errors->has('sdt') ? ' has-error' : '' }}">
            <label for="sdt" class="col-sm-2 control-label">SĐT</label>
            <div class="col-sm-10">
              <input value="{{ old('sdt') }}" type="tel" class="form-control" id="sdt" name="sdt" placeholder="Số điện thoại...">
              @if($errors->has('sdt'))
                        <span class="help-block">{{$errors->first('sdt')}}</span>
                        @endif
            </div>
          </div>
          <div class="form-group {{ $errors->has('dia_chi') ? ' has-error' : '' }}">
            <label for="dia_chi" class="col-sm-2 control-label">Địa chỉ</label>
            <div class="col-sm-10">
              <input value="{{ old('dia_chi') }}" type="text" class="form-control" id="dia_chi" name="dia_chi" placeholder="Địa chỉ...">
              @if($errors->has('dia_chi'))
                        <span class="help-block">{{$errors->first('dia_chi')}}</span>
                        @endif
            </div>
          </div>
          <div class="form-group {{ $errors->has('ma_so_thue') ? ' has-error' : '' }}">
            <label for="ma_so_thue" class="col-sm-2 control-label">Mã số thuế</label>
            <div class="col-sm-10">
              <input value="{{ old('ma_so_thue') }}" type="text" class="form-control" id="ma_so_thue" name="ma_so_thue" placeholder="Mã số thuế...">
              @if($errors->has('ma_so_thue'))
                        <span class="help-block">{{$errors->first('ma_so_thue')}}</span>
                        @endif
            </div>
          </div>


          <div class="form-group ">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">Tạo mới</button>
            </div>
          </div>
        </form>
    </div>

</div>
@endsection
