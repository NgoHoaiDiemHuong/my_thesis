@extends('layouts.master')
@section('css')
<style>
    label {float:left;}
</style>
@section('title',"Đăng kí")
@endsection
@section('content')
<div class="container">
<div class="clearfix"></div>
<br>
<div class="row">
    <div class="col-sm-12 col-md6 col-lg-6" style="align-items: left">
        <h3>Đăng kí? Tạo tài khoản mới</h3>
        <hr>

        <br>
        <form class="form-horizontal" method="post" action="{{route('cus.postRegis')}}">
          <div class="form-group {{ $errors->has('MSSV') ? ' has-error' : '' }}">
            <label for="MSSV" style="float: left; align:left;" class="col-sm-2 control-label">MSSV</label>
            <div class="col-sm-10">
              <input value="{{ old('MSSV') }}" type="text" name= "MSSV" class="form-control" id="MSSV" placeholder="MSSV...">
              @if($errors->has('MSSV'))
                        <span class="help-block">{{$errors->first('MSSV')}}</span>
                        @endif
            </div>
          </div>
          <div class="form-group {{ $errors->has('ten_kh') ? ' has-error' : '' }}">
            <label for="ten_kh" class="col-sm-2 control-label">Họ tên</label>
            <div class="col-sm-10">
              <input value="{{ old('ten_kh') }}" type="text" class="form-control" id="ten_kh" name="ten_kh" placeholder="Họ tên...">
              @if($errors->has('ten_kh'))
                        <span class="help-block">{{$errors->first('ten_kh')}}</span>
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
          <div class="form-group {{ $errors->has('khoa_hoc') ? ' has-error' : '' }}">
            <label for="khoa_hoc" class="col-sm-2 control-label">Khóa học</label>
            <div class="col-sm-10">
              <input value="{{ old('khoa_hoc') }}" type="number" class="form-control" id="khoa_hoc" name="khoa_hoc" placeholder="Khóa học...">
              @if($errors->has('khoa_hoc'))
                        <span class="help-block">{{$errors->first('khoa_hoc')}}</span>
                        @endif
            </div>
          </div>
          <div class="form-group {{ $errors->has('mat_khau') ? ' has-error' : '' }}">
            <label for="mat_khau" class="col-sm-2 control-label">Mật khẩu</label>
            <div class="col-sm-10">
              <input value="{{ old('mat_khau') }}" type="password" class="form-control" id="mat_khau" name="mat_khau" placeholder="Mật khẩu...">
              @if($errors->has('mat_khau'))
                        <span class="help-block">{{$errors->first('mat_khau')}}</span>
                @endif
            </div>
          </div>
          <div class="form-group {{ $errors->has('re_pwd') ? ' has-error' : '' }}">
            <label for="re_pwd" class="col-sm-2 control-label">Nhập lại mật khẩu</label>
            <div class="col-sm-10">
              <input value="{{ old('re_pwd') }}" type="password" class="form-control" id="re_pwd" name="re_pwd" placeholder="Nhập lại mật khẩu...">
              @if($errors->has('re_pwd'))
                        <span class="help-block">{{$errors->first('re_pwd')}}</span>
                        @endif
            </div>
          </div>

          <div class="form-group ">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">Đăng kí</button>
            </div>
          </div>
        </form>
    </div>
    <div class="col-sm-12 col-md6 col-lg-6">
        <div class="col-sm-12 col-lg-offset-3 col-lg-9 col-md-offset-2 col-md-10">
        <h3>Đã có tài khỏan? Đăng nhập</h3>
        <hr>
        <br>
            <form class="form-horizontal" method="post" action="{{route('cus.postLogIn')}}">
                <div class="form-group {{ $errors->has('MSSV_O') ? ' has-error' : '' }}">
                    <label for="MSSV_O" class="col-sm-3 control-label">MSSV</label>
                    <div class="col-sm-9">
                      <input value="{{ old('MSSV_O') }}" type="text" name= "MSSV_O" class="form-control" id="MSSV_O" placeholder="MSSV...">
                      @if($errors->has('MSSV_O'))mat_khau_O
                        <span class="help-block">{{$errors->first('MSSV_O')}}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('mat_khau_O') ? ' has-error' : '' }}">
                    <label for="mat_khau_O" class="col-sm-3 control-label">Mật khẩu</label>
                    <div class="col-sm-9">
                      <input value="{{ old('mat_khau_O') }}" type="password" class="form-control" id="mat_khau_O" name="mat_khau_O" placeholder="Mật khẩu...">
                      @if($errors->has('mat_khau_O'))
                        <span class="help-block">{{$errors->first('mat_khau_O')}}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group ">
                <div class="col-sm-offset-3 col-sm-10">
                   <a href="#">Quên mật khẩu</a>
                </div>
              </div>
              <div class="form-group ">
                <div class="col-sm-offset-3 col-sm-10">
                  <button type="submit" class="btn btn-primary">Đăng nhập</button>
                </div>
              </div>
        </form>
        </div>
    </div>
</div>




    <!-- end registration -->
</div>
</div>
@endsection
@section('js')
        <script>
            (function() {

            // Create input element for testing
            var inputs = document.createElement('input');

            // Create the supports object
            var supports = {};

            supports.autofocus   = 'autofocus' in inputs;
            supports.required    = 'required' in inputs;
            supports.placeholder = 'placeholder' in inputs;

            // Fallback for autofocus attribute
            if(!supports.autofocus) {

            }

            // Fallback for required attribute
            if(!supports.required) {

            }

            // Fallback for placeholder attribute
            if(!supports.placeholder) {

            }

            // Change text inside send button on submit
            var send = document.getElementById('register-submit');
            if(send) {
                send.onclick = function () {
                    this.innerHTML = '...Sending';
                }
            }

        })();
        </script>
@endsection