@extends('layouts.masterEmp')
@section('title', 'Danh sách danh mục hàng hóa')
@section('content')

<div class="row">

    <div class="col-sm-9">
        <h3><i class="fa fa-angle-right"></i> Danh sách hàng hóa</h3>
    </div>
    <div class="" style="margin-top: 20px;">
        <!-- <div class="form-group">
            <input style="float: right;"type="text" class="form-control" placeholder="Search">
        </div> -->
        <div class="input-group" >
          <input type="text" style="float: right;" class="form-control" placeholder="Tìm kiếm" aria-describedby="basic-addon2">
          <span class="input-group-addon" id="basic-addon2"><i class="fa fa-search"></i></span>
        </div>
    </div>


    </div>
    <div class="row mt">

    <div class="col-lg-12">
        <div class="content-panel">
            <!-- <h4><i class="fa fa-angle-right"></i> cac nut</h4> -->
            <a href="{{route('emp.ncc.create')}}" title=""><button  style="margin-bottom: 10px;" type="" class="btn btn-primary"><i class="fa fa-plus" ></i> Thêm nhà cung cấp mới</button>
            </a>
            <a href="{{route('product.exp')}}" title=""><button  style="margin-bottom: 10px" type="" class="btn btn-primary"><i class="fa fa-plus" ></i> Export</button>
            </a>

            <section id="no-more-tables">
                <table class="table table-bordered table-striped table-condensed cf">
                    <thead class="cf">
                      <tr>
                        <th ># Mã ncc</th>
                        <th >Tên ncc</th>
                        <th >Số điện thoại</th>
                        <th >Email</th>
                        <th >Địa chỉ</th>
                        <th >Ghi chú</th>
                        <th ></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $d)
                      <tr>
                        <td data-title="# Mã ncc">{{$d->ma_ncc}}</td>
                        <td data-title="Tên ncc">
                            <a href="" title="" data-toggle="modal" data-target="#modal-info-{{$d->id}}">{{$d->ten_ncc}}</a>
                            @include('models.detailNCC')
                        </td>
                        <td class="numeric" data-title="Số điện thoại">{{$d->sdt}}</td>
                        <td class="numeric" data-title="Email">{{$d->email}}</td>
                        <!-- <td class="numeric" data-title="Bán online">
                            <span class="label label-info label-mini">Có</span>
                        </td> -->
                        <td class="numeric" data-title="Địa chỉ<">{{$d->dia_chi}}</td>
                        <td class="numeric" data-title="Ghi chú">{{$d->ghi_chu}}</td>
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
                                                Bạn có chắc chắn xóa {{$d->ma_ncc}} {{$d->ten_ncc}}?
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
                    {!! $data->links() !!}
              </section>
          </div><!-- /content-panel -->
      </div><!-- /col-lg-12 -->
</div><!-- /row -->



@endsection