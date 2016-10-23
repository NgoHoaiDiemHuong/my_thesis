@extends('layouts.masterEmp')
@section('title', 'Danh sách danh mục hàng hóa')
@section('content')
<div class="col-lg-8">
<div class="row">
    <div class="col-sm-9">
        <h3><i class="fa fa-angle-right"></i> Danh sách trả hàng nhập</h3>
    </div>
    <div class="col-sm-3" >

           <!--  </a>
            <a href="route('product.exp')" title=""><button   type="" class="w3-btn w3-blue"><i class="fa fa-plus" ></i> Export</button>
            </a> -->

    </div>


    </div>
    <div class="row mt">

    <div class="col-lg-12">
        <div class="content-panel">
            <!-- <h4><i class="fa fa-angle-right"></i> cac nut</h4> -->


            <section id="no-more-tables">
                <table id='DBtableJQuery'class="table table-bordered table-striped table-condensed cf">
                    <thead class="cf">
                      <tr>
                        <th ># Mã phiếu trả hàng nhập</th>
                        <th >Tên ncc</th>
                        <th >Giá trị</th>
                        <th >Ngày lập</th>
                        <th ></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $d)
                      <tr>
                        <td data-title="# Mã ncc"><a href="" title="" data-toggle="modal" data-target="#modal-info-{{$d->id}}">{{$d->ma_pnh}}</a>
                         @include('PNH.THNdetail')
                         </td>
                        <td  class="numeric"  data-title="Tên ncc">
                            {{$d->PhieuNhapHang->NCC->ten_ncc}}
                        </td>

                        <td class="numeric" data-title="Giá trị (đ)">{{number_format($d->thanh_tien)}}</td>
                        <!-- <td class="numeric" data-title="Bán online">
                            <span class="label label-info label-mini">Có</span>
                        </td> -->
                        <td class="numeric" data-title="Ngày lập<">{{$d->created_at}}</td>

                        <td class="numeric" data-title="tool">
                            <a href="{{route('emp.ncc.edit',$d->id)}}" >
                               <!--  <button class="w3-btn w3btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i>
                                </button> -->
                            </a>
                            <button type="button" class="w3-btn w3-teal btn-xs" data-toggle="modal" data-target="#modal-info-{{$d->id}}"><i class="fa fa-info" ></i></button>
                            <!-- <button type="button" class="w3-btn w3-blue btn-xs" data-toggle="modal" data-target="#modal-delete-$d->id}}"><i class="fa fa-trash-o" ></i></button> -->
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
                                                Bạn có chắc chắn xóa {{$d->ma_pthn}} từ {{$d->PHieuNhapHang->NCC->ten_ncc}}?
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <form method="POST" action="{{route('emp.pthn.destroy',$d->id)}}">
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


</div>
@endsection
@section('js')
@include('partials.DBtableJQuery')
@endsection