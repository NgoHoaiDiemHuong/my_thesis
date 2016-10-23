@extends('layouts.masterEmp')
@section('title','QL-Them phiếu trả hàng nhập')
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
<h3><i class="fa fa-angle-right"></i>Trả hàng nhập</h3>
<hr>
<div class="row mt">
<!-- strat form -->
 <form class= id="form-hh""form-horizontal" method="post" action="{{route('emp.pkk.store')}}">
 <input type="hidden" name="ma_pnh" id="ma_pnh" value="{{$data->ma_pnh}}">
    <!-- Cot thu nhat -->
    <div class="col-sm-12 col-md-4 col-lg-3" style="align-items: left;">
        <div class="form-group {{ $errors->has('ten_ncc') ? ' has-error' : '' }}">
            <label for="ten_ncc" class="col-sm-12 control-label">Mã Phiếu trả hàng nhập</label>

            <div class="col-sm-12">

              <input value="{{ old('ten_ncc') }}" type="text" class="form-control" id="ten_ncc" name="ten_ncc"  disabled placeholder="Tự động...">
                @if($errors->has('ten_ncc'))
                    <span class="help-block">{{$errors->first('ten_ncc')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group {{ $errors->has('ten_nv') ? ' has-error' : '' }}">
            <label for="ten_nv" class="col-sm-12 control-label">Nhân viên tạo</label>
            <div class="col-sm-12">
            <input type="hidden" name="ma_nv" value="{{ Session::get('users')->ma_nv}}" id="ma_nv">
                <input value="{{ Session::get('users')->ten_nv}}" type="text" class="form-control" id="ten_nv" name="ten_nv" disabled placeholder="Tên ncc...">
                @if($errors->has('ten_nv'))
                    <span class="help-block">{{$errors->first('ten_nv')}}</span>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('ngay_nhap') ? ' has-error' : '' }}">
            <label for="dtp_input2" class="col-sm-12 control-label">Ngày trả hàng</label>
            <div class="input-group date form_date col-sm-12" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" style="padding-right: 12px; padding-left: 18px;">
                <input class="form-control"  type="text" value="{{ old('ngay_kk')?old('ngay_th'):date("d/m/Y")}}" readonly id="ngay_th" name="ngay_th" placeholder="Ngày kiểm kê.." id="ngày kiểm kê">
                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                @if($errors->has('ngay_th'))
                    <span class="help-block">{{$errors->first('ngay_th')}}</span>
                @endif
            </div>
            <input type="hidden" id="dtp_input2" value="{{date('dd/mm/yyyy')}}" /><br/>
        </div>
        <div class="form-group {{ $errors->has('tien_kh_dua') ? ' has-error' : '' }}">
            <label for="ten_ncc" class="col-sm-12 control-label">Tiền nhận lại từ NCC</label>
            <div class="col-sm-12">

              <input data-bind='value: tong_tien' type="number" class="form-control" id="tien_kh_dua" name="thanh_tien">

            </div>
        </div>
        <div class="form-group">
            <label for="ngay_nhap" class="col-sm-12 control-label">Ghi chú</label>
            <div class="col-sm-12">
                <textarea class="form-control" row="5" name="ghi_chu" id="ghi_chu"></textarea>
            </div>

        </div>
    </div>
    <!-- end cot thu nhat -->
    <!-- cot thu hai -->
    <div class="col-sm-12 col-md-8 col-lg-9" style="align-items: left;">
        <div class="row">
            <div class="col-sm-12 col-md-5 col-lg-5">
                <h3>Trả hàng nhập</h3>
            </div>
            <div class="col-sm-12 col-md-7 col-lg-7">

            </div>

            <div class="col-sm-12 col-md-12 col-lg-12 " id="col-2">
                <section id="no-more-tables" >
                    <table class="table table-bordered table-striped table-condensed cf table content-panel" id="table-add">
                        <thead class="cf">
                          <tr>
                            <th ># Mã hàng hóa</th>
                            <th >Tên hàng hóa</th>
                            <th >Số lượng nhập</th>
                            <th >Số lượng tồn kho</th>
                            <th >Số lượng trả</th>
                            <th >Đơn giá trả hàng</th>
                            <th >Thành tiền</th>
                            <th ></th>
                          </tr>
                        </thead>
                        <tbody data-bind="foreach:hanghoas">
                        <tr>
                            <td data-title="# Mã hàng hóa">
                                <input type="text" data-bind="value: ma_hh" name="ma_hh[]" readonly="true"  class=" td-dis">
                            </td>
                            <td data-title="Tên hàng hóa">

                            <input type="text" data-bind="value: ten_hang_hoa" name="ten_hang_hoa[]" readonly="true"   class="td-dis">
                            </td>
                            <td class="numeric" data-title="Số lượng nhập">
                                <span><input data-bind="value: sl_nhap ,valueUpdate: 'input'" type="number" class="w3-input td-dis" align="" readonly="true"></span>

                            </div>
                            </td>
                            <td class="numeric" data-title="Số lượng tồn kho">
                              <!--   <input data-bind="value: so_luong" type="hidden" name="c" min="0" class="w3-input w3-border" min='1'> -->
                                <input data-bind="value: sl_ton_kho ,valueUpdate: 'input'" type="number" class="td-dis w3-input " align="" readonly="true">
                            </td>
                            <td class="numeric" data-title="Số lượng trả">
                              <!--   <input data-bind="value: so_luong" type="hidden" name="c" min="0" class="w3-input w3-border" min='1'> -->
                                <select data-bind="options: sl_tra, value:so_luong"></select>
                            </td>
                            <td data-title="Đơn giá trả hàng">

                            <input  type="text" data-bind="value: don_gia,valueUpdate: 'input'" class="w3-input w3-border">
                            </td>
                            <td data-title="Thành tiền">

                            <input type="nuber" data-bind="value: thanh_tien" class="w3-input w3-border">
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

                       <p>Tổng số mặt hàng trả lại:  <span data-bind='text: hanghoas().length'>&nbsp;</span> hàng hóa</p>
                       <!-- <p>Số lượng <span data-bind='text: tong_tien'>&nbsp;</span> đồng </p></p> -->

                </section>
            </div>
        </div>

    </div>
    <!-- end cot thu 2 -->
    <div class="col-sm-12 col-md-12 col-lg-12">

    <hr>
    <div style="float: left;">
        <a href="{{redirect()->back()}}" title="">
        <button class="w3-btn "><i class="fa fa-chevron-left" aria-hidden="true"></i></i> &nbsp;Quay lại </button></a>
    </div>
    <div style="float: right;" data-bind="visible: hanghoas().length > 0">

    <!-- <button  class="w3-btn w3-blue" type="submit" id= "submit">Lưu lại &nbsp;<i class="fa fa-floppy-o" aria-hidden="true"></i></button> -->
    <!-- <input class="w3-btn w3-blue"  id='submit' name="luu_tam"  value="Lưu tạm thời"> -->
    <input class="w3-btn w3-blue"  type="" name="luu" id='submit' value="Lưu lại">

    <button class="w3-btn w3-red" id= 'cancel'>Hủy bỏ &nbsp;<i class="fa fa-ban" aria-hidden="true"></i></button>
    </div>
    </div>
</form>

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
                        "{{route('pnh.search.hh')}}",
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
<script  type="text/javascript" charset="utf-8" async defer>

    $(window).load(function(){

    });
    window.onload= function(){

    };
</script>
<!-- o ngay nhap -->
<script type="text/javascript">
$('.form_date').datetimepicker({
        language:  'vn',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
</script>
<script>


    @foreach($hanghoas as $hh)
    addHangHoa({!!json_encode($hh)!!});
    @endforeach
</script>
<!-- end xu ly o nhap -->
<!-- ajax submit form -->
<script type="text/javascript" >
    $( document ).ready(function() {
            $( "#submit" ).click(function( event ) {
                event.preventDefault();
                var hanghoas = ko.toJSON(HangHoasViewModel);
                var data = {
                    ma_nv: $("#ma_nv").val(),
                    // luu: $(this).attr('name'),
                    ngay_th: $('#ngay_th').val(),
                    ghi_chu: $('#ghi_chu').val(),
                    ma_pnh: $('#ma_pnh').val(),
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
                    url: "{{route('emp.pthn.store')}}",
                    data: data,
                    dataType: 'json',
                    success: function(data,responseText){
                        if(data.success=='true'){
                        $("#submit").fadeOut();
                        $("#cancel").fadeOut();
                        }
                        $(".flashMs").html(data.view).fadeIn("slow");
                        setTimeout(function() {
                        $('div.flashMs').fadeOut('slow');
                    }, 3000);
                    console.log('ss:', data+responseText);
                    },
                    error: function (data) {
                        console.log('Error:', data);

                    }
                });


            });

        });
</script>

@endsection