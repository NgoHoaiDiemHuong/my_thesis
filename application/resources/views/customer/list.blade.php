@extends('layouts.masterEmp')

@section('title','QL - khách hàng')

@section('content')
 <div class="row">
<div class="col-sm-9">
    <h3><i class="fa fa-angle-right"></i> Danh sách khách hàng</h3>
</div>
<div class="">

        </a>
        <a href="{{route('cus.exp')}}" title=""><button  type="" class="w3-btn w3-blue"><i class="fa fa-plus" ></i> Export</button>
        </a>
</div>


</div>
<div class="row mt">
<div class="col-lg-12">
    <div class="content-panel">

        <section id="no-more-tables">
            <table id= 'DBtableJQuery'class="table table-bordered table-striped table-condensed cf">
                <thead class="cf">
                  <tr>
                    <th ># Mã khách hàng</th>
                    <th >Tên khách hàng</th>
                    <th class="numeric" >MSSV</th>
                    <th class="numeric" >Khóa học</th>
                    <th class="numeric" >Địa chỉ</th>
                    <th class="numeric" >Số điện thoại</th>
                    <th class="numeric" ></th>
                  </tr>
                </thead>
                <tbody>
                @foreach($data as $d)
                  <tr>
                    <td data-title="# Mã khách hàng">{{$d->ma_kh}}</td>
                    <td data-title="Tên khách hàng">
                        <a href="" data-toggle="modal" data-target="#modal-info-{{$d->id}}" title="">{{$d->ten_kh}}</a>
                    </td>
                    <td class="numeric" data-title="MSSV">{{$d->MSSV}}</td>
                    <td class="numeric" data-title="Khóa học">{{$d->khoa_hoc}}</td>
                    <td class="numeric" data-title="Địa chỉ">
                       {{$d->dia_chi}}
                    </td>
                    <td class="numeric" data-title="Số điện thoại">{{$d->sdt}}</td>
                    <td class="numeric" data-title="">
                        <a href="{{route('emp.cus.edit',$d->id)}}" >
                            <button class="btn btn-primary btn-xs">
                                <i class="fa fa-pencil"></i>
                            </button>
                        </a>
                        <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "  data-toggle="modal" data-target="#modal-delete-{{$d->id}}"></i></button>
                        @include('models.detailCus')
                        @include('customer.delete')
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