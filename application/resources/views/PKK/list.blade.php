@extends('layouts.masterEmp')
@section('title', 'DS Phiếu kiểm kê hàng hóa')
@section('content')
<div class="row">
    <div class="col-sm-9">
        <h3><i class="fa fa-angle-right"></i> Danh sách PKK</h3>
    </div>
    <div class="col-sm-3" >
        <a href="{{route('emp.pkk.create')}}" title=""><button type="" class="w3-btn w3-blue"><i class="fa fa-plus" ></i>Tạo phiếu kiểm kê mới</button>
            </a>

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
                        <th ># Mã phiếu kiểm kê</th>
                        <th >Nhân viên tạo</th>
                        <th >Số lượng mặt hàng</th>
                        <th >Ngày lập</th>
                        <th ></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $d)
                      <tr>
                        <td data-title="# Mã phiếu kiểm kê"><a href="" title="" data-toggle="modal" data-target="#modal-info-{{$d->id}}">{{$d->ma_pkk}}</a>
                         @include('PKK.detail')
                         </td>
                        <td  class="numeric"  data-title="Nhân viên tạo">
                            {{$d->NhanVien->ten_nv}}
                        </td>

                        <td class="numeric" data-title="Số lượng mặt hàng">{{$d->sl_mat_hang}}</td>
                        <!-- <td class="numeric" data-title="Bán online">
                            <span class="label label-info label-mini">Có</span>
                        </td> -->
                        <td class="numeric" data-title="Ngày lập<">{{$d->created_at}}</td>

                        <td class="numeric" data-title="tool">
                            <button type="button" class="w3-btn w3-teal btn-xs" data-toggle="modal" data-target="#modal-info-{{$d->id}}"><i class="fa fa-info" ></i></button>
                            <a href="{{route('emp.pkk.edit',$d->id)}}" >
                                <button class="w3-btn w3-blue btn-xs">
                                    <i class="fa fa-pencil"></i>
                                </button>
                            </a>

                            <button type="button" class="w3-btn w3-red btn-xs" data-toggle="modal" data-target="#modal-delete-{{$d->id}}"><i class="fa fa-trash-o" ></i></button>
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
                                                Bạn có chắc chắn xóa {{$d->ma_pkk}} từ {{$d->NhanVien->ten_nv}}?
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <form method="POST" action="{{route('emp.pkk.destroy',$d->id)}}">
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
@include('partials.DBtableJQuery')
@endsection