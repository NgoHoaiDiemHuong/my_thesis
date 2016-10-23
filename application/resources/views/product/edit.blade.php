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

<h3><i class="fa fa-angle-right"></i> Cập nhật hàng hóa</h3>
<div class="row mt">
    <div class="col-lg-12 content-panel">
        <div class="">
           <!--  <h4 class="mb"><i class="fa fa-angle-right"></i> Thông tin hàng hóa mới</h4> -->
            <form class="horizontal style-form" action="{{route('emp.product.update',$data->id)}}" method="post" accept-charset="utf-8"  enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PATCH">
                <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 @if($errors->has('ma_dm')){{'has-error'}}@endif">
                    <div class="form-group col-sm-12">
                        <label class=" control-label">Danh mục</label>
                        <?php $dm=DB::select("SELECT * FROM DANHMUC WHERE ma_dm NOT IN ( SELECT ma_dm FROM DANHMUC as f WHERE f.ma_dm = DANHMUC.ma_dm_cha)");  ?>
                        <div>
                            <select name = "ma_dm" class="selectpicker form-control" data-live-search="true" title="Chọn danh mục cha..." value="">
                            <option>Chọn danh mục</option>
                            @foreach($dm as $d)
                                <option value="{{$d->ma_dm}}" <?php if($d->ma_dm == $data->ma_dm) echo "selected"; ?>>{{$d->ten_dm}}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>


                    <div  class="form-group col-sm-12 @if($errors->has('ten_hang_hoa')){{'has-error'}}@endif">
                         <label class=" control-label">Tên hàng hóa</label>
                         <div >
                            <input  class="form-control" type="text" name="ten_hang_hoa" value="{{$data->ten_hang_hoa}}" placeholder="Tên hàng hóa...">
                            @if($errors->has('ten_hang_hoa'))
                            <span class="help-block">{{$errors->first('ten_hang_hoa')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group col-sm-12 @if($errors->has('hinh_anh')){{'has-error'}}@endif">
                         <label class=" control-label">Hình ảnh</label>
                         <div >
                                <!-- <img src="" alt="preview"> -->
                                @if(!is_null($data->hinh_anh))
                                   <span> <img style="max-width: 200px; max-height: 300px" src="{{url('product-imgs/'.$data->hinh_anh)}}" alt=""></span>
                                @endif
                                <input  class="" type="file" name="hinh_anh" value="">
                                @if($errors->has('hinh_anh'))
                                <span class="help-block">{{$errors->first('hinh_anh')}}</span>
                                @endif
                         </div>
                    </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                    <div   class="form-group col-sm-12 @if($errors->has('don_vi_tinh')){{'has-error'}}@endif">
                         <label class=" control-label">Đơn vị tính</label>
                         <div >
                             <input  class = "form-control" type="text" name="don_vi_tinh" value="{{$data->don_vi_tinh}}" placeholder="Đơn vị tính...">
                            @if($errors->has('don_vi_tinh'))
                            <span class="help-block">{{$errors->first('don_vi_tinh')}}</span>
                            @endif
                        </div>
                    </div>
                    <div style="border-bottom: 0.5px solid #F2F2F2; padding-bottom: 15px; padding-top: 15px;"  class="form-group col-sm-12 @if($errors->has('xuat_xu')){{'has-error'}}@endif">
                         <label class=" control-label">Xuất xứ</label>
                         <div>
                                <input class = "form-control" type="tel" name="xuat_xu" value="{{$data->xuat_xu}}" placeholder="Xuất xứ...">
                                @if($errors->has('xuat_xu'))
                                <span class="help-block">{{$errors->first('xuat_xu')}}</span>
                                @endif
                        </div>
                    </div>
                    <div  class="form-group col-sm-12">
                        <label class=" control-label">Mô tả</label>
                        <div >
                            <textarea  class="form-control" name="mo_ta">{{$data->mo_ta}}</textarea>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">


                     <div class="form-group col-sm-12">
                    <label class="control-label">Trạng thái kinh doanh </label>
                    <div class="radio radio-info radio-inline">
                            <input type="radio" name="trang_thai_kinh_doanh" value="1"checkbox class="w3-radio" id="on" {{($data->trang_thai_kinh_doanh==1)?'checked':''}}>
                            <label for="on"> Đang kinh doanh</label>
                    </div>
                    <div class="radio radio-danger radio-inline">
                           <input type="radio" name="trang_thai_kinh_doanh" value="0"  class="w3-radio" id="off" {{($data->trang_thai_kinh_doanh==0)?'checked':''}} >
                            <label for="off"> Ngưng kinh doanh</label>
                    </div>
                </div>
                 <div class="form-group col-sm-12">
                    <label class="control-label">Trạng thái bán online </label>
                    <div class="radio radio-info radio-inline">
                            <input type="radio" name="trang_thai_ban_online" value="1"checkbox class="w3-radio" id="onB" {{($data->trang_thai_ban_online==1)?'checked':''}}>
                            <label for="onB"> Bán</label>
                    </div>
                    <div class="radio radio-danger radio-inline">
                           <input type="radio" name="trang_thai_ban_online" value="0"  class="w3-radio" id="offB" {{($data->trang_thai_ban_online==0)?'checked':''}}>
                            <label for="offB"> Không</label>
                    </div>
                </div>
                 </div>
                 </div>
                 </div>

                    <div class="row">
                        <hr>
                        <center>
                        <a href="{{route('emp.product.index')}}" title="">
                        <input type="button"  class="w3-btn" value="Quay lại" name="Quay lại"></a>
                        <input class="w3-btn w3-blue" type="submit" name="submit" value="Lưu">
                        </center>
                    </div>

            </form>

        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript" charset="utf-8">
$(document).ready(function(){
    $("#off").change(function () {
        // $("input:checkbox.nq").prop('checked', $(this).prop("checked"));
        if( $(this).attr('checked')){
             $("input:radio#offB").prop('checked',true);
        }

    });


});
</script>
@endsection
