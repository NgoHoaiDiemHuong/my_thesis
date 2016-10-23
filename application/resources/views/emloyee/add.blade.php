<?php
use App\NhanVien;
$nnds = App\NhomNguoiDung::all();
?>
@extends('layouts.masterEmp')
@section('title','QL-nhân viên')
@section('css')

@endsection
@section('content')

<!-- h3><i class="fa fa-angle-right"></i> Thêm nhân viên mới</h3> -->
<div class="row mt">
    <div class="">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Thông tin nhân viên mới</h4>
            <form class="horizontal style-form" action="{{route('emp.emloyees.store')}}" method="post" accept-charset="utf-8">
            <div class="col-sm-12 col-md-6 col-lg-6">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group   @if($errors->has('ten_nv')){{'has-error'}}@endif">
                 <label class="control-label">Tên nhân viên</label>
                <input class="form-control" type="text" name="ten_nv" value="" placeholder="Tên nhân viên">
                @if($errors->has('ten_nv'))
                <span class="help-block">{{$errors->first('ten_nv')}}</span>
                @endif
            </div>


            <div class="form-group">
                <label class=" control-label">Ngày sinh</label>
                <div class='input-group date' id='ngay_sinh'>
                    <input type='text' class="form-control" name="ngay_sinh" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="form-group">
                 <label class=" control-label">Địa chỉ</label>
                 <input class = "form-control" type="text" name="dia_chi" value="" placeholder="địa chỉ">
                 @if($errors->has('dia_chi'))
                {{$errors->first('dia_chi')}}
                @endif
            </div>
            <div class="form-group">
                 <label class=" control-label">Số điện thoại</label>
                 <input class = "form-control" type="tel" name="sdt" value="" placeholder="Số điện thoại" autocomplete="off">
                @if($errors->has('sdt'))
                {{$errors->first('sdt')}}
                @endif
            </div>
            <div class="form-group">
                 <label class="control-label">Mật khẩu</label>
                 <input class = "form-control" type="password" name="mat_khau" value="" placeholder="Nhập vào password" autocomplete="off">
                @if($errors->has('mat_khau'))
                {{$errors->first('mat_khau')}}
                @endif

            </div>


            <div class="form-group">
                 <p class="control-label">Trạng thái làm việc </p>
                <div class="radio radio-info radio-inline">
                        <input type="radio" name="trang_thai" value="1"checkbox class="w3-radio" id="on">
                        <label for="on"> Làm việc</label>
                </div>
                <div class="radio radio-danger radio-inline">
                       <input type="radio" name="trang_thai" value="0"  class="w3-radio" id="off">
                        <label for="off"> Nghỉ việc</label>
                </div>

            </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
                 <label class="col-sm-12 col-md-4 col-lg-4 control-label">Nhóm người dùng</label>
                 <div class="col-sm-12 col-md-8 col-lg-8">
                 <select name= 'ma_nnd' class="form-control">
                    @foreach($nnds as $nnd)
                    <option value={{$nnd->ma_nnd}} class="nnd">{{
                        $nnd->ten_nnd
                        }}</option>
                    @endforeach
                </select>
                </div>
            </div>


                <div class="col-sm-12">

                    <h3>Phân quyền</h3>
                    <div class="checkbox checkbox-primary">

                        <input type="checkbox" class= "select_all" name="all" id="select_all"value="">
                        <label for="select_all">All</label>


                    </div>
                <?php
                $nqs=App\NhomQuyen::all();
                 ?>
                @foreach($nqs as $nq)
                <div class="form-group col-sm-4">
                    <div class="checkbox checkbox-circle checkbox-info">

                    <input class="nq" type="checkbox" id="{{$nq->ma_nq}}"  value="{{$nq->ma_nq}}">
                    <label for="{{$nq->ma_nq}}">{{$nq->ten_nq}}</label>
                    </div>



                    <?php $qs = App\Quyen::where("ma_nq","=",$nq->ma_nq)->get() ?>

                    @foreach($qs as $q)
                        <div class="checkbox checkbox-primary">

                            <input class="element {{$nq->ma_nq}}" type="checkbox" name="ma_quyen[]" id="{{$q->ma_quyen}}"  value="{{$q->ma_quyen}}">
                            <label for='{{$q->ma_quyen}}'>{{$q->ten_quyen}}</label>

                        </div>
                    @endforeach
                </div>
                @endforeach
            </div>
            </div>

            <div class="row">
                <hr>
                <div class="col-sm-12">
                    <input type="button"  class="btn btn-defaulf" value="Quay lại" name="Quay lại">
                    <input style="float:right" class="btn btn-primary" type="submit" name="submit" value="Submit">
                </div>
            </div>
            </form>

        </div>

    </div>
</div>

@endsection
@section('js')
<script type="text/javascript" charset="utf-8">
$(document).ready(function(){
    $("#select_all").change(function () {
        $("input:checkbox.nq").prop('checked', $(this).prop("checked"));
        $("input:checkbox.element").prop('checked', $(this).prop("checked"));
        // $(".element").prop('checked', $(this).prop("checked"));
    });
    $('.nq').change(function(){
        // alert('nkfshjgd');
        var val = $(this).attr('value');
        var x= '.'+ val;
        // alert(x);
        $(x).prop('checked',$(this).prop('checked'));
    });
    // $("#ma_nnd").change(function()
    // {
    //     var id=$(this).val();
    //     // var dataString = 'id='+ id;
    //     if(val==)
    //     return false;

    // });
});
</script>
<script>
    $(document).ready(function(){
        var d = new Date();
        var month = d.getMonth();
        var day = d.getDate();
        var minyear = d.getFullYear()- 65;
        var maxyear = d.getFullYear()- 18;
        var mind = new Date('dd/mm/yyyy','"'+month + '/' + day + '/' + minyear+'"');
        // var maxd = moment().subtract(20, 'year');
        console.log(mind);
        $('#ngay_sinh').datetimepicker({
        language:  'vn',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0,
        format: "dd/mm/yyyy",
        });
    });
</script>
<script>
$(document).ready(function(){

});
</script>
@endsection