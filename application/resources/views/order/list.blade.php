@extends('layouts.masterEmp')
@section('title', 'Danh sách danh mục hàng hóa')
@section('content')
<div class="row">
    <div class="col-sm-9">
        <h3><i class="fa fa-angle-right"></i> Danh sách Đơn đặt hàng</h3>
    </div>
    <div class="" style="margin-top: 20px;">
        <!-- <div class="form-group">
            <input style="float: right;"type="text" class="form-control" placeholder="Search">
        </div> -->
        <!-- <div class="input-group" >
          <input type="text" style="float: right;" class="form-control" placeholder="Nhập vào mã phiếu nhập" aria-describedby="basic-addon2">
          <span class="input-group-addon" id="basic-addon2"><i class="fa fa-search"></i></span>
        </div> -->
    </div>


    </div>
    <div class="row mt">

    <div class="col-lg-12">
        <div class="content-panel">
            <section id="no-more-tables">
                <table id="DBtableJQuery" class="table table-bordered table-striped table-condensed cf">
                    <thead class="cf">
                      <tr>
                        <th ># Mã đơn đặt hàng</th>
                        <th >Tên khách hàng</th>
                        <th >Giá trị đơn hàng</th>
                        <th >Ngày lập</th>
                        <th >Trạng thái</th>
                        <th ></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $d)
                      <tr>
                        <td data-title="# Mã đơn đặt hàng"><a href="" title="" data-toggle="modal" data-target="#modal-info-{{$d->id}}">{{$d->ma_ddh}}</a>
                         @include('order.detail')
                         </td>
                        <td  class="numeric"  data-title="Tên khách hàng">
                            {{$d->khachhang->ten_kh}}
                        </td>

                        <td class="numeric" data-title="Giá trị (đ)">{{number_format($d->thanh_tien)}}</td>
                        <!-- <td class="numeric" data-title="Bán online">
                            <span class="label label-info label-mini">Có</span>
                        </td> -->
                        <td class="numeric" data-title="Ngày lập<">{{$d->created_at}}</td>
                        <td class="numeric" data-title="Trạng thái<">
                        @if($d->trang_thai==0)
                        <span class="label label-warning">chưa giao hàng</span>
                        @else
                        <span class="label label-success">Đã giao</span>
                        @endif
                        </td>
                        <td class="numeric" data-title="tool">
                            <a href="{{route('emp.ncc.edit',$d->id)}}" >
                                <button class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i>
                                </button>
                            </a>

                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-delete-{{$d->id}}"><i class="fa fa-trash-o" ></i></button>
                            {{-- Confirm Delete --}}
                            <div class="modal fade" id="modal-delete-{{$d->id}}" tabIndex="-1"  role="dialog">
                                <div class="modal-dialog ">
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
                                                Bạn có chắc chắn xóa {{$d->ma_đh}} từ {{$d->ma_kh}}?
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <form method="POST" action="{{route('emp.ncc.destroy',$d->id)}}">
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
          </div><!-- /content-panel -->
      </div><!-- /col-lg-12 -->
</div><!-- /row -->
@endsection
@section('js')
<script type="text/javascript" charset="utf-8" async defer>
// $(document).ready(function(){

//     $("a#send").on('click',function(event){

//         event.preventDefault();
//         $.ajaxSetup({
//                 headers: {
//                     'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//                 }
//         });
//         $.ajax({
//             type: "GET",
//             url: $(this).attr('href'),
//             success: function(data){
//                $('#chua_giaohang').hiden();
//                $('#da_giaohang').fadeIn();
//             },
//             dataType: 'json',
//             error: function (data) {
//                 console.log('Error:', data);

//             }
//         });
//          event.preventDefault();
//     });
// });
</script>
@include('partials.DBtableJQuery')
@endsection