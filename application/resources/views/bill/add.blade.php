<?php
$cus = App\KhachHang::select('MSSV','ten_kh')->get();

 ?>
@extends('layouts.masterEmp')
@section('title','Thêm hóa đơn')
@section('css')
<style type="text/css">
    div .form-group{
        /*text-align: left;*/
    }
.td-dis{
border:none;
background-color: #f5f5f5;
}

</style>
@endsection
@section('content')
<div class="rx"></div>
<h3><i class="fa fa-angle-right"></i> Hóa đơn mới</h3>
<hr>
<div class="row mt ">
<!-- strat form -->
 <form class= id="form-hh " method="post" action="" class="w3-container">
    <!-- Cot thu nhat -->
    <div class="col-sm-12 col-md-4 col-lg-3 " style="align-items: left;">
        <div class="{{ $errors->has('ten_ncc') ? ' has-error' : '' }}">
            <label for="ten_ncc" class="col-sm-12 ">Mã Hóa đơn</label>
            <div class="col-sm-12">

              <input value="{{ old('ten_ncc') }}" type="text" class="w3-input w3-border-0" id="ten_ncc" name="ten_ncc"  readonly="true" placeholder="Mã tự động...">
              <br>

            </div>
        </div>
        <div class="{{ $errors->has('ten_nv') ? ' has-error' : '' }}">
            <label for="ten_nv" class="col-sm-12 w3-label">Nhân viên tạo</label>
            <div class="col-sm-12">
            <input type="hidden" name="ma_nv" value="{{ Session::get('users')->ma_nv}}" id="ma_nv">
                <input value="{{ Session::get('users')->ten_nv}}" type="text"  class="w3-input w3-border-0" id="ten_nv" name="ten_nv" readonly="true" placeholder="Tên ncc...">
                @if($errors->has('ten_nv'))
                    <span class="help-block">{{$errors->first('ten_nv')}}</span>
                @endif
                <br>
            </div>
        </div>
        <div class="{{ $errors->has('ma_kh') ? ' has-error' : '' }}">
            <label class="col-sm-12 w3-label" for="ncc">Khách hàng</label>

            <div class="col-sm-12 ">
              <select id="ma_kh" name = "ma_kh" class="selectpicker " data-live-search="true" title="Khách hàng ..." value="">
                <option value="KH9999">Khách vãng lai</option>
                @foreach($cus as $d)
                    <option value="{{$d->ma_kh}}">{{$d->MSSV}}-{{$d->ten_kh}}</option>
                @endforeach
              </select>
              <br>
            </div>
        </div>
        <div class="{{ $errors->has('tien_kh_dua') ? ' has-error' : '' }}">
        <br>
            <label for="ten_ncc" class="col-sm-12 w3-label">Tiền khách hàng đưa</label>
            <div class="col-sm-12">
            <input type="hidden" id="tien_kh_dua_hidden" data-bind='value: tong_tien'>
              <input data-bind='value: tong_tien' type="number" class=" w3-input" id="tien_kh_dua" name="tien_kh_dua" >

            </div>

        </div>
        <div class=" {{ $errors->has('tien_thoi') ? ' has-error' : '' }}">
        <br>
            <label for="tien_thoi" class="col-sm-12 w3-label">Tiền thồi</label>
            <div class="col-sm-12">

              <input value="{{ old('tien_thoi') }}" type="number" class="w3-input" id="tien_thoi" readonly="" name="tien_thoi"  >

            </div>
        </div>
    </div>
    <!-- end cot thu nhat -->
    <!-- cot thu hai -->
    <div class="col-sm-12 col-md-8 col-lg-9 content-panel" style="align-items: left;">
        <div class="row">
            <div class="col-sm-12 col-md-5 col-lg-5">
                <h3>Thêm hàng hóa</h3>
            </div>
            <div class="col-sm-12 col-md-7 col-lg-7">
                <div class="input-group">
                    <input type="text" style="float: right;" class="form-control" placeholder="Nhập tên hàng hóa" aria-describedby="basic-addon2" id='search' onkeydown="down()" onkeyup="up()" onfocusout="out()">
                    <!-- <span  aria-hidden="true"></span> -->
                    <!-- <span id="iconSpan"  ></span> -->
                    <span class="input-group-addon" id="basic-addon2" style="background-color: transparent; cursor:pointer;" onclick="clearInputField()">
                        <!-- <i class="fa icon-remove-sign" aria-hidden="true" ></i> -->
                        <i class="fa fa-times-circle" aria-hidden="true" style="color:#F4645F"></i>
                    </span>
                </div>
                <div id="search-results" style="position:absolute;
        z-index:99999;">
                </div>
            </div>
            <hr>
            <div class="col-sm-12 col-md-12 col-lg-12  " id="col-2">
                <section id="no-more-tables" style="background-color: #f5f5f5">
                    <table class="table table-bordered table-striped table-condensed cf" id="table-add">
                        <thead class="cf">
                          <tr>
                            <th ># Mã hàng hóa</th>
                            <th >Tên hàng hóa</th>
                            <th >Đơn giá(đ)</th>
                            <th >Số lượng</th>
                            <th >Thành tiền</th>
                            <th ></th>
                          </tr>
                        </thead>
                        <tbody data-bind="foreach:hanghoas">
                        <tr>
                            <td data-title="# Mã hàng hóa">
                                <input type="text" data-bind="value: ma_hh" name="ma_hh[]" disabled="disabled" class="w3-input w3-no-border td-dis">
                            </td>
                            <td data-title="Tên hàng hóa">

                            <input type="text" data-bind="value: ten_hang_hoa" name="" readonly="true"  class="w3-input w3-border-0">
                            </td>
                            <td class="numeric" data-title="Đơn giá(đ)">
                                <span><input data-bind="value: don_gia ,valueUpdate: 'input'" type="text" name="don_gia[]" placeholder=""  min="1000" step="1000" class="w3-input td-dis" readonly></span>

                            </div>
                            </td>
                            <td class="numeric" data-title="Số lượng">
                                <!-- <input data-bind="value: so_luong" type="number" name="so_luong[]" min="0" class="w3-input w3-border" max= data-bind="value: ten_hang_hoa" > -->
                                <select class="w3-select" data-bind="options: sl_ban, value:so_luong"></select>

                            </td>
                            <td class="numeric" data-title="Thành tiền">
                                <input type="text" data-bind="value: thanh_tien" name="thanh_tien[]" disabled="disabled" class="form-control td-dis">
                            </td>
                            <td class="numeric" data-title="tool">
                                    <button data-bind="click:$parent.removeHangHoa" class="w3-btn w3-red btn-xs" class="form-control">
                                        x</i>
                                    </button>
                            </td>
                        </tr>
                        </tbody>
                      </table>
                      <!-- <p>Tổng số hàng hóa: <span data-bind:"value: tong_so_hh"></span></p> -->

                       <p>Tổng số hàng hóa:  <span data-bind='text: hanghoas().length'>&nbsp;</span> hàng hóa</p>
                       <p onclick="tong_tien()">Tổng tiền: <span data-bind='text: tong_tien'>&nbsp;</span> đồng </p></p>

                </section>
            </div>
        </div>

    </div>
    <!-- end cot thu 2 -->
    </form>
    <div class="col-sm-12 col-md-12 col-lg-12">

    <hr>
    <div style="float: left;">
        <button class="w3-btn "><i class="fa fa-chevron-left" aria-hidden="true"></i></i> &nbsp;Quay lại </button>
    </div>
    <div style="float: right;" data-bind="visible: hanghoas().length > 0" id="btn" >

    <!-- <button  class="w3-btn w3-blue" type="submit" id= "submit">Lưu lại &nbsp;<i class="fa fa-floppy-o" aria-hidden="true"></i></button> -->

    <!-- <a href="" title=""> -->
    <!-- <input class="w3-btn w3-blue" type="button" name="" id="submit" value="Lưu"> -->
       <button class="w3-btn w3-blue" type="button" id ='submit'>Lưu</button>
    <!-- </a> -->


    <a href="{{route('emp.bill.create')}}" id ="cancel" title=""><button class="w3-btn w3-red" >Hủy bỏ &nbsp;<i class="fa fa-ban" aria-hidden="true"></i></button></a>
    </div>
    </div>

<!-- end form -->
</div>
@endsection
@section('js')
<!-- o search -->
<script type="text/javascript" charset="utf-8" async defer>
    /*search funtion*/
        var timer;
        function up(){
            $("#col-2").css('opacity','0.5');
            timer=setTimeout(function(){
                var keywords=$("#search").val();
                if(keywords.length>0){

                    $.post(
                        "{{route('hd.search.addhd')}}",
                        {keywords:keywords},
                        function(markup){
                        $("#search-results").html(markup).fadeIn("slow");
                        console.log(markup);
                        }
                    );
                }
                if(keywords.length==0){
                    $("#search-results").fadeOut("fast");
                    $("#col-2").css('opacity','1');
                }


            },200);
        };
        function down(){
            clearTimeout(timer);
        };
        function out(){
            $("#search-results").fadeOut("slow");
            $("#col-2").css('opacity','1');
        };
        function clearInputField (){
            $("#search").val('');
            $("#search-results").fadeOut("slow");
            $("#col-2").css('opacity','1');
        };
    /*end-search function*/
</script>
<!-- end xu ly o search -->
<!-- Xu ly khi dang load trang -->

<!-- ajax submit form -->
<script type="text/javascript" >
    $( document ).ready(function() {
        var ma_hd = "";
        $( "#submit" ).click(function( event ) {
            // event.preventDefault();
            var hanghoas = ko.toJSON(HangHoasViewModel);
            var data = {
                ma_nv: $("#ma_nv").val(),
                ma_kh: $("#ma_kh").val(),

                ghi_chu: $('#ghi_chu').val(),
                hanghoas
            }
            console.log( data);
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
            });
            $.ajax({
                type: "POST",
                url: "{{route('emp.bill.store')}}",
                data: data,
                success: success,
                dataType: 'json',
                error: function (data) {
                    console.log('Error:', data);
                    $('div.rx').html(data);
                }
            });
            function success(data){
                $("#submit").fadeOut();
                $("#cancel").fadeOut();
                $(".flashMs").html(data.view).fadeIn("slow");
                setTimeout(function() {
                    $('div.flashMs').fadeOut('slow');
                }, 3000);
                var url = 'http://localhost/application/public/emp/print/bill/'+data.ma_hd;
                var a=$('<a href='+url+' title=""><button type="button" class="w3-btn w3-blue"><i class="fa fa-print" aria-hidden="true"></i>In hóa đơn</button></a>');
                console.log(a);
                $(a).appendTo("div#btn");

            };
        });

    });
</script>
<!-- scrip in hoa don-->
<script type="text/javascript" charset="utf-8" async defer>
$(document).ready(function(){
$('#tien_kh_dua').on({
    keypress: function() {
        var tien_kh_dua = $("#tien_kh_dua").val();
        var tong_tien = $("#tien_kh_dua_hidden").val();
        var tien_thoi = tien_kh_dua-tong_tien;
        console.log(tien_kh_dua+'-'+tong_tien+'='+tong_tien);
        if(tien_thoi<=0){
            $('#tien_thoi').val(0);
        }else{
             $('#tien_thoi').val(tien_thoi);
        }
    },
    keyup: function() {
        var tien_kh_dua = $("#tien_kh_dua").val();
        var tong_tien = $("#tien_kh_dua_hidden").val();
        var tien_thoi = tien_kh_dua-tong_tien;
        console.log(tien_kh_dua+'-'+tong_tien+'='+tong_tien);
        if(tien_thoi<=0){
            $('#tien_thoi').val(0);
        }else{
             $('#tien_thoi').val(tien_thoi);
        }
    },
    change: function() {
        var tien_kh_dua = $("#tien_kh_dua").val();
        var tong_tien = $("#tien_kh_dua_hidden").val();
        var tien_thoi = tien_kh_dua-tong_tien;
        console.log(tien_kh_dua+'-'+tong_tien+'='+tong_tien);
        if(tien_thoi<=0){
            $('#tien_thoi').val(0);
        }else{
             $('#tien_thoi').val(tien_thoi);
        }
    }
    // click: function() {
    //     // Handle click...
    });
});
// function tien_thoi(){
    // var tien_kh_dua = $("#tien_kh_dua").val();
    // var tong_tien = $("#tien_kh_dua_hidden").val();
    // var tien_thoi = tien_kh_dua-tong_tien;
    // console.log(tien_kh_dua+'-'+tong_tien+'='+tong_tien);
    // if(tien_thoi<=0){
    //     $('#tien_thoi').val(0);
    // }else{
    //      $('#tien_thoi').val(tien_thoi);
    // }

// };



</script>
@endsection