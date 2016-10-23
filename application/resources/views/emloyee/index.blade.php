@extends('layouts.masterEmp')
@section('title','QL-nhân viên')
@section('content')
    <div class="row">
        <div class="col-sm-9 col-md-5 col-lg-9">
            <h3><i class="fa fa-angle-right"></i> Danh sách nhân viên</h3>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3" style="margin-top: 20px;" style="text-align: right;">
            <!-- <div class="form-group">
                <input style="float: right;"type="text" class="form-control" placeholder="Search">
            </div> -->
            <!-- <div class="input-group">
              <input type="text" style="float: right;" class="form-control" placeholder="Tìm kiếm" aria-describedby="basic-addon2" id='search' onkeydown="down()" onkeyup="up()">
              <span class="input-group-addon" id="basic-addon2"><i class="fa fa-search"></i>
              </span>
            </div>
            <div id="search-results" style="position:absolute;
    z-index:99999;"> -->
    <a href="{{route('emp.emloyees.create')}}" title=""><button  style="margin-bottom: 10px;" type="" class="w3-btn w3-blue"><i class="fa fa-plus" ></i> Thêm nhân viên mới</button>
                </a>
                <a href="{{route('emloyees.exp')}}" title=""><button  style="margin-bottom: 10px" type="" class="w3-btn w3-blue"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export</button>
                </a>

            </div>
        </div>


    </div>
    <div class="row mt">
        <div class="col-lg-12">
            <div class="content-panel">
                <!-- <h4><i class="fa fa-angle-right"></i> cac nut</h4> -->


                <section id="no-more-tables">
                    <table id="DBtableJQuery"class="table table-bordered table-striped table-condensed cf">
                        <thead class="cf">
                          <tr>
                            <th ># Mã nhân viên</th>
                            <th >Họ tên</th>
                            <th >Nhóm nhân viên</th>
                            <th >SĐT</th>
                            <th >Trạng thái</th>
                            <th ></th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $d)
                          <tr>
                            <td data-title="# Mã nhân viên">{{$d->ma_nv}}</td>
                            <td data-title="Họ tên">
                            <a href="" title="" data-toggle="modal" data-target="#modal-info-{{$d->id}}">{{$d->ten_nv}}</a>
                            @include('emloyee.detail')
                            </td>
                            <td class="numeric" data-title="Nhóm nhân viên">{{$d->nhomnguoidung->ten_nnd}}</td>
                            <td class="numeric" data-title="SĐT">{{$d->sdt}}</td>
                            <td class="numeric" data-title="Trạng thái">
                                <span class="label label-info label-mini">Đang làm việc</span>
                            </td>
                            <td class="numeric" data-title="tool">
                                <a href="{{route('emp.emloyees.edit',$d->id)}}" title="">
                                    <button class="w3-btn w3-blue btn-xs">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                </a>

                                    <button type="button" class="w3-btn w3-red btn-xs" data-toggle="modal" data-target="#modal-delete-{{$d->id}}"><i class="fa fa-trash-o" ></i></button>
                                @include('models.confirmDelEmp')

                                <!-- <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button> -->


                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>

                </section>
              </div><!-- /content-panel -->
          </div><!-- /col-lg-12 -->
      </div><!-- /row -->

@endsection
@section('js')
<script type="text/javascript" charset="utf-8" async defer>
    /*search funtion*/
        var timer;
        function up(){
            timer=setTimeout(function(){
                var keywords=$("#search").val();
                if(keywords.length>0){
                    $.post(
                        "{{route('emloyees.search')}}",
                        {keywords:keywords},
                        function(markup){
                        $("#search-results").html(markup);
                        // consonle.log(markup);
                        console.log(markup);
                        }
                    );
                }
            },500);
        }
        function down(){
            clearTimeout(timer)
        }
    /*end-search function*/
</script>
@include('partials.DBtableJQuery')
@endsection