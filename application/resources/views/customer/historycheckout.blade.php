@extends('layouts.master')
@section('title','Lịch sử mua hàng')
@section('content')
<div class="col-lg-12">
        <div class="content-panel">
        <h2>Đơn hàng mua tại cửa hàng </h2>
        @if(count($hoadon)>0)
            <section id="no-more-tables">
                <table id=""class="table table-bordered table-striped table-condensed cf display">
                    <thead class="cf">
                      <tr>
                        <th ># Mã hóa đơn</th>
                        <th >Tên khách hàng</th>
                        <th >Giá trị đơn hàng</th>
                        <th >Ngày lập</th>
                        <th ></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($hoadon as $d)
                      <tr>
                        <td data-title="# Mã"><a href="" title="" data-toggle="modal" data-target="#modal-info-{{$d->id}}">{{$d->ma_hd}}</a>
                         @include('bill.detail')
                         </td>
                        <td  class="numeric"  data-title="Tên khách hàng">
                            {{$d->khachhang->ten_kh}}
                        </td>

                        <td class="numeric" data-title="Giá trị (đ)">{{number_format($d->thanh_tien)}}</td>
                        <td class="numeric" data-title="Ngày mua">{{$d->created_at}}</td>

                        <td class="numeric" data-title="tool">


                            <button  class="w3-btn w3-teal btn-xs" data-toggle="modal" data-target="#modal-info-{{$d->id}}"><i class="fa fa-info" aria-hidden="true"></i></button>


                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
              </section>
            @else
        'Bạn chưa mua hàng tại cửa hàng '
        @endif
          </div><!-- /content-panel -->
        </div><!-- /col-lg-12 -->

       <div class="col-lg-12">
        <div class="content-panel">
       <h2>Đơn hàng online</h2>
        @if(count($ddh)>0)
            <section id="no-more-tables">
                <table id="" class="table table-bordered table-striped table-condensed cf display">
                    <thead class="cf">
                      <tr>
                        <th ># Mã đơn đặt hàng</th>
                       <!--  <th >Tên khách hàng</th> -->
                        <th >Giá trị đơn hàng</th>
                        <th >Ngày lập</th>
                        <th >Trạng thái</th>
                        <th ></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($ddh as $dh)

                      <tr>
                        <td data-title="# Mã"><a href="" title="" data-toggle="modal" data-target="#modal-info-{{$dh->id}}">{{$dh->ma_ddh}}</a>
                         @include('order.detailplus')
                         </td>


                        <td class="numeric" data-title="Giá trị (đ)">{{number_format($dh->thanh_tien)}}</td>
                        <!-- <td class="numeric" data-title="Bán online">
                            <span class="label label-info label-mini">Có</span>
                        </td> -->
                        <td class="numeric" data-title="Ngày lập">{{$dh->created_at}}</td>
                        <td class="numeric" data-title="Trạng thái">
                        @if($dh->trang_thai==0)
                        <span class="label label-warning">chưa giao hàng</span>
                        @else
                        <span class="label label-success">đã giao</span>
                        @endif
                        </td>
                        <td class="numeric" data-title="tool">


                            <button type="button" class="w3-btn w3-teal btn-xs" data-toggle="modal" data-target="#modal-info-{{$dh->id}}"><i class="fa fa-info" ></i></button>


                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
              </section>
          </div><!-- /content-panel -->
      </div><!-- /col-lg-12 -->
      @else
        'Bạn chưa mua hàng online'
      @endif
@endsection
@section('js')
<script>
    $(document).ready(function() {
    $('table.display').DataTable();
} );
</script>
@endsection
