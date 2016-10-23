@extends('layouts.masterEmp')
@section('title','QL-hàng hóa')
@section('content')

<h3><i class="fa fa-angle-right"></i> Chi tiết thông tin</h3>
<div class="row mt">

    <div class="jumbotron">
      <div class="col-lg-4 col-md-4 col-sm-12">
         <p class="centered">
            <a href="">
                @if(!is_null($data->hinh_anh))
                    <span> <img style="max-width: 200px; max-height: 300px" src="{{url('product-imgs/'.$data->hinh_anh)}}" alt="">
                    </span>
                @endif
            </a>
        </p>
        <h3 class="centered">{{$data->ten_hang_hoa}}</h3>
        <h5 class="centered">{{$data->danhmuc->ten_dm}}</h5>
    </div>
    <div class="col-lg-8 col-md-8 col-sm-12">

         <div class="list-group">
              <a href="" class="list-group-item ">
              Tên hàng hóa: {{$data->ten_hang_hoa}}
              </a>
              <a href="#" class="list-group-item">
                Danh mục: {{$data->danhmuc->ten_dm}}
              </a>
              <a href="#" class="list-group-item">
               Đơn vị tính: {{$data->don_vi_tinh}}
              </a>
              <a  class="list-group-item">
                Xuất xứ:  {{$data->xuat_xu}}
              </a>
              <a  class="list-group-item">
                  Mô tả:  {{$data->mo_ta}}
              </a>
        </div>
    </div>


    </div>
</div>
@endsection
