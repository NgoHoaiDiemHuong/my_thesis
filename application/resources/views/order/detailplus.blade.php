<div class="modal fade" id="modal-info-{{$dh->id}}" tabIndex="-1"  role="dialog">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">
                                        ×
                                      </button>
                                      <h4 class="modal-title">Thông tin đơn đặt hàng</h4>
                                        </div>
                                        <div class="modal-body">
<center><h3>ĐƠN ĐẶT HÀNG</h3></center>
Mã phiếu:{{$dh->ma_ddh}} &nbsp; Ngày lập:{{$dh->updated_at}}<br>
Khách hàng: {{$dh->khachhang->ten_kh}} &nbsp;
@if(!is_null($dh->nguoi_giao_hang))
Người giao hàng:{{$dh->nguoi_giao_hang}}
@endif
<?php
$hh = $dh->bill->billDetails;

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
Tổng tiền:{{$dh->thanh_tien}}
Trạng thái {{$dh->trang_thai==0?'chưa giao hàng':'đã giao hàng'}}

 </div>
                                        </div>
                                        <div class="modal-footer">


                                                <a href="{{route('print.bill',$dh->bill->id)}}">
                                                <button type="submit" class="w3-btn w3-blue">
                                                    <i class="fa fa-print"></i> In hóa đơn
                                                </button>
                                                </a>
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Đóng</button>

                                        </div>
                              </div>
                                </div>
                            </div>