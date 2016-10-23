<?php
use App\DanhMuc;
 $dmcs=App\DanhMuc::select('ma_dm_cha')
     ->whereNotNull('ma_dm_cha')
     ->distinct()
     ->get();
$dms= App\DanhMuc::select('ma_dm','ten_dm')->get();
?>


@extends('layouts.masterEmp')
@section('title','QL-hàng hóa - G7_Mart')
@section('css')
<style type="text/css">
    div .form-group{
       /* margin-top: 30px;*/
    }
</style>
@endsection
@section('content')

<!-- <h3><i class="fa fa-angle-right"></i> Thêm hàng hóa mới</h3> -->
<div class="row mt">
    <div class="">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Thông tin hàng hóa mới</h4>

            <form class="horizontal style-form" action="{{route('emp.product.store')}}" method="post" accept-charset="utf-8"  enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                <div  class="form-group col-sm-12  @if($errors->has('ma_dm')){{'error'}}@endif">
                    <label class="col-sm-2 col-sm-2 control-label">Danh mục</label>
                        <?php $dm=DB::select("SELECT * FROM DANHMUC WHERE ma_dm NOT IN ( SELECT ma_dm FROM DANHMUC as f WHERE f.ma_dm = DANHMUC.ma_dm_cha)");  ?>
                        <div  class="col-sm-10">
                            <select name = "ma_dm" class="selectpicker form-control" data-live-search="true" title="Chọn danh mục ..." value="">

                            @foreach($dm as $d)
                                <option value="{{$d->ma_dm}}">{{$d->ten_dm}}</option>
                            @endforeach
                          </select>
                        </div>

                </div>


                <div   class="form-group col-sm-12 @if($errors->has('ten_hang_hoa')){{'has-error'}}@endif">
                     <label class="col-sm-2 col-sm-2 control-label">Tên hàng hóa</label>
                     <div class="col-sm-10">
                        <input  class="form-control" type="text" name="ten_hang_hoa" value="" placeholder="Tên hàng hóa...">
                        @if($errors->has('ten_hang_hoa'))
                        <span class="help-block">{{$errors->first('ten_hang_hoa')}}</span>
                        @endif
                    </div>
                </div>

                <div  class="form-group col-sm-12 @if($errors->has('hinh_anh')){{'has-error'}}@endif">
                     <label class="col-lg-2 col-lg-2 control-label">Hình ảnh</label>
                     <div class="col-lg-10">
                            <!-- <img src="" alt="preview"> -->
                            <input  class="" type="file" name="hinh_anh" value="">
                            @if($errors->has('hinh_anh'))
                        <span class="help-block">{{$errors->first('hinh_anh')}}</span>
                        @endif
                     </div>
                </div>

                <div  class="form-group col-sm-12 @if($errors->has('don_vi_tinh')){{'has-error'}}@endif">
                     <label class="col-sm-2 col-sm-2 control-label">Đơn vị tính</label>
                     <div class="col-sm-10">
                         <input  class = "form-control" type="text" name="don_vi_tinh" value="" placeholder="Đơn vị tính...">
                        @if($errors->has('don_vi_tinh'))
                        <span class="help-block">{{$errors->first('don_vi_tinh')}}</span>
                        @endif
                    </div>
                </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                <div  class="form-group col-sm-12 @if($errors->has('xuat_xu')){{'has-error'}}@endif">
                     <label class="col-sm-2 col-sm-2 control-label">Xuất xứ</label>
                     <div class="col-sm-10">
                            <input class = "form-control" type="tel" name="xuat_xu" value="" placeholder="Xuất xứ...">
                            @if($errors->has('xuat_xu'))
                            <span class="help-block">{{$errors->first('xuat_xu')}}</span>
                            @endif
                    </div>
                </div>

                <div  class="form-group col-sm-12 ">
                    <label class="col-sm-2 col-sm-2 control-label">Mô tả</label>
                    <div class="col-sm-10">
                        <textarea  class="form-control" name="mo_ta"></textarea>
                    </div>
                </div>

                <div class="form-group col-sm-12">
                    <label class="control-label">Trạng thái kinh doanh </label>
                    <div class="radio radio-info radio-inline">
                            <input type="radio" name="trang_thai_kinh_doanh" value="1"checkbox class="w3-radio" id="on" >
                            <label for="on"> Đang kinh doanh</label>
                    </div>
                    <div class="radio radio-danger radio-inline">
                           <input type="radio" name="trang_thai_kinh_doanh" value="0"  class="w3-radio" id="off">
                            <label for="off"> Ngưng kinh doanh</label>
                    </div>
                </div>
                 <div class="form-group col-sm-12 @if($errors->has('trang_thai_ban_online')){{'has-error'}}@endif">
                    <label class="control-label">Trạng thái bán online </label>
                    <div class="radio radio-info radio-inline">
                            <input type="radio" name="trang_thai_ban_online" value="1"checkbox class="w3-radio" id="onB">
                            <label for="onB"> Bán</label>
                    </div>
                    <div class="radio radio-danger radio-inline">
                           <input type="radio" name="trang_thai_ban_online" value="0"  class="w3-radio" id="offB">
                            <label for="offB"> Không</label>
                    </div>
                </div>
                </div>
            </div>
            <div class="row">

                <div class="col-sm-12">
                    <hr>
                    <a href="{{route('emp.product.index')}}" title=""><button class="w3-btn">Quay lại</button></a>

                    <input style="float:right" class="w3-btn w3-blue" type="submit" name="submit" value="Submit">
                </div>
            </div>
            </form>

        </div>

    </div>
    <div class="col-sm-12 col-md-6 col-lg-6">
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript" charset="utf-8">
$(document).ready(function(){
    $("#off").change(function () {
        // $("input:checkbox.nq").prop('checked', $(this).prop("checked"));
        if( $(this).attr('checked')){
             $("input:checkbox#offB").prop('checked', $(this).prop("checked"));
        }

    });


});
</script>
@endsection
