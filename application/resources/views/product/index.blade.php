@extends('layouts.masterEmp')

@section('title','Quản lý nhân viên')

@section('content')
<div class="row">
    <div class="col-sm-9">
        <h3><i class="fa fa-angle-right"></i> Danh sách hàng hóa</h3>
    </div>
    <div class="" style="margin-top: 20px;">
        <!-- <div class="form-group">
            <input style="float: right;"type="text" class="form-control" placeholder="Search">
        </div> -->
        <!-- <div class="input-group" >
          <input type="text" style="float: right;" class="form-control" placeholder="Tìm kiếm" aria-describedby="basic-addon2" id='search' onkeydown="down()" onkeyup="up()" onfocusout="out()">
          <span class="input-group-addon" id="basic-addon2"><i class="fa fa-search"></i></span>
        </div> -->
        <a href="{{route('emp.product.create')}}" title=""><button  style="margin-bottom: 10px;" type="" class="w3-btn w3-blue"><i class="fa fa-plus" ></i> Thêm hàng hóa mới</button>
            </a>
            <a href="{{route('product.exp')}}" title=""><button  style="margin-bottom: 10px" type="" class="w3-btn w3-blue"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export</button>
            </a>
    </div>


    </div>
    <div class="row mt">
    <div class="col-lg-12">
        <div class="content-panel">
            <!-- <h4><i class="fa fa-angle-right"></i> cac nut</h4> -->

            <div id="search-results">

            </div>
            <div id="content">
            <section id="no-more-tables">
                <table id='DBtableJQuery' class="table table-bordered table-striped table-condensed cf">
                    <thead class="cf">
                      <tr>
                        <th ># Mã hàng hóa</th>
                        <th >Tên hàng hóa</th>
                        <th >Danh mục</th>
                        <th >Đơn vị tính</th>
                        <th >Bán online</th>
                        <th >Xuất xứ</th>
                        <th >Mô tả</th>
                        <th ></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $d)
                      <tr>
                        <td data-title="# Mã hàng hóa">{{$d->ma_hh}}</td>
                        <td data-title="Tên hàng hóa">
                            <a  data-toggle="modal" data-target="#modal-info-{{$d->id}}" title="">{{$d->ten_hang_hoa}}</a>
                            @include('product.detailModel')
                        </td>
                        <td class="numeric" data-title="Danh mục">{{$d->danhmuc->ten_dm}}</td>
                        <td class="numeric" data-title="Đơn vị tính">{{$d->don_vi_tinh}}</td>
                        <td class="numeric" data-title="Bán online">
                            <span class="label label-info label-mini">Có</span>
                        </td>
                        <td class="numeric" data-title="Xuất xứ">{{$d->xuat_xu}}</td>
                        <td class="numeric" data-title="Mô tả">{{$d->mo_ta}}</td>
                        <td class="numeric" data-title="tool">
                            <a href="{{route('emp.product.edit',$d->id)}}" >
                                <button class="w3-btn w3-blue btn-xs">
                                    <i class="fa fa-pencil"></i>
                                </button>
                            </a>
                            <button type="button" class="w3-btn w3-red btn-xs" data-toggle="modal" data-target="#modal-delete-{{$d->id}}"><i class="fa fa-trash-o" ></i></button>
                            {{-- Confirm Delete --}}
                            <div class="modal fade" id="modal-delete-{{$d->id}}" tabIndex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">
                                        ×
                                      </button>
                                      <h4 class="modal-title">Xác nhận xóa</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p class="lead">
                                                <i class="fa fa-question-circle fa-lg"></i>
                                                Bạn có chắc chắn xóa {{$d->ma_hh}} {{$d->ten_hang_hoa}}?
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <form method="POST" action="{{route('emp.product.destroy',$d->id)}}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Đóng</button>
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-times-circle"></i> Đồng ý
                                                </button>
                                            </form>
                                        </div>
                              </div>
                                </div>
                            </div>
                            <!-- <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button> -->

                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>

              </section>
              </div> <!-- vung chua du lieu -->

          </div><!-- /content-panel -->
      </div><!-- /col-lg-12 -->
</div><!-- /row -->



@endsection
@section('js')
<script type="text/javascript" charset="utf-8" async defer>
    /*search funtion*/
        var timer;
        function up(){
            // $("#col-2").css('opacity','0.5');
            timer=setTimeout(function(){
                var keywords=$("#search").val();
                if(keywords.length>0){

                    $.post(
                        "{{route('product.search')}}",
                        {keywords:keywords},
                        function(markup){
                        $("#content").fadeOut();
                        $("#search-results").html(markup).fadeIn("slow");
                        // console.log(markup);
                        }
                    );
                }
                if(keywords.length==0){
                    $("#search-results").fadeOut("fast");
                     $("#content").fadeIn();
                }


            },200);
        };
        function down(){
            clearTimeout(timer);
        };
        function out(){
            $("#search-results").fadeOut("slow");
             $("#content").fadeIn();
        };
        function clearInputField (){
            $("#search").val('');
            $("#search-results").fadeOut("slow");
             $("#content").fadeIn();
        };
    /*end-search function*/
</script>
@include('partials.DBtableJQuery')
@endsection