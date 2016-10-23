<div class="modal fade" id="modal-info-{{$d->id}}" tabIndex="-1"  role="dialog">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">
                                        ×
                                      </button>
                                      <h4 class="modal-title">Thông tin hóa đơn</h4>
                                        </div>
                                        <div class="modal-body">
<center><h3>HÓA ĐƠN</h3></center>
Mã phiếu:{{$d->ma_hd}} &nbsp; Ngày lập:{{$d->updated_at}}<br>
@if(!is_null($d->ma_kh))
Khách hàng: {{$d->khachhang->ten_kh}} &nbsp;
@endif
@if(!is_null($d->nguoi_giao_hang))
Người giao hàng:{{$d->nguoi_giao_hang}}
@endif
@if(!is_null($d->ma_ddh))
Mã đơn đặt hàng:{{$d->ma_ddh}} &nbsp;
Khách hàng: {{$d->order->khachhang->ten_kh}} &nbsp;
@endif
<?php
$hh = $d->billDetails;

 ?>
 <section id="no-more-tables">
 <table class="table table-bordered table-striped table-condensed cf">
     <thead class="cf">
         <tr>
             <th># Mã hàng hóa</th>
             <th>Tên hàng hóa</th>
             <th>Số lượng</th>
             <th>Đơn giá</th>
             <th>Thành tiền</th>
         </tr>
     </thead>
     <tbody>
     @if(!empty($hh))
        @foreach($hh as $h)
         <tr>

             <td data-title="# Mã ncc">{{$h->ma_hh}}</td>
             <td class="numeric"  data-title="Tên hàng hóa">{{$h->product?$h->product->ten_hang_hoa:''}}</td>
             <td class="numeric"  data-title="Số lượng">{{$h->so_luong}}</td>
             <td class="numeric"  data-title="Đơn giá">{{number_format($h->don_gia)}}</td>
             <td class="numeric"  data-title="Số lượng">{{number_format($h->don_gia*$h->so_luong)}}</td>
         </tr>
         @endforeach
     </tbody>
     @endif
 </table>
 </section>
 <div class="left" style="float: right;">
Tổng tiền:{{$d->thanh_tien}}


 </div>
                                        </div>
                                        <div class="modal-footer">

                                                <a href="{{route('print.bill',$d->id)}}">
                                                <button type="submit" class="w3-btn w3-blue">
                                                    <i class="fa fa-print" aria-hidden="true"></i> In hóa đơn
                                                </button>
                                                </a>
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Đóng</button>

                                        </div>
                              </div>
                                </div>
                            </div>