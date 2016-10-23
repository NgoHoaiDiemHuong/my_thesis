<div class="modal fade" id="modal-info-{{$d->id}}" tabIndex="-1"  role="dialog">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">
                                        ×
                                      </button>
                                      <h4 class="modal-title">Thông tin phiếu nhập hàng</h4>
                                        </div>
                                        <div class="modal-body">
<center><h3>PHIẾU NHẬP HÀNG</h3></center>
Mã phiếu:{{$d->ma_pnh}} &nbsp; Ngày lập:{{$d->updated_at}}<br>
Nhà cung cấp: {{$d->NCC->ten_ncc}} &nbsp;
@if(!is_null($d->nguoi_giao_hang))
Người giao hàng:{{$d->nguoi_giao_hang}}
@endif
<?php
$hh = $d->ChiTietPhieuNhapHangs;
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
        @foreach($hh as $h)
         <tr>
             <td data-title="# Mã ncc">{{$h->ma_hh}}</td>
             <td class="numeric"  data-title="Tên hàng hóa">{{$h->HangHoa->ten_hang_hoa}}</td>
             <td class="numeric"  data-title="Số lượng">{{$h->so_luong}}</td>
             <td class="numeric"  data-title="Đơn giá">{{number_format($h->don_gia)}}</td>
             <td class="numeric"  data-title="Số lượng">{{number_format($h->don_gia*$h->so_luong)}}</td>
         </tr>
         @endforeach
     </tbody>
 </table>
 </section>
 <div class="left" style="float: right;">
Tổng tiền:{{$d->thanh_tien}}
 </div>
                                        </div>
                                        <div class="modal-footer">
                                                <form action="{{route('emp.pthn.create')}}" method="GET">
                                                    <input type="hidden" name="idPNH" value="{{$d->id}}">
                                                    <input type="hidden" name="_token" value="{!!csrf_token()!!}">
                                                <button type="submit" class="w3-btn w3-blue"><i class="fa fa-plus"></i>Trả hàng nhập</button>


                                                <a href="{{route('print.pnh',$d->id)}}">
                                                <button class="w3-btn w3-blue">
                                                    <i class="fa fa-print"></i> In hóa đơn
                                                </button>
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Đóng</button>
                                                </a>
                                             </form>
                                        </div>
                              </div>
                                </div>
                            </div>