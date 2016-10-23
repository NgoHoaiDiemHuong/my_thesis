<div class="modal fade" id="modal-info-{{$d->id}}" tabIndex="-1"  role="dialog">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">
                                        ×
                                      </button>
                                      <h4 class="modal-title">Thông tin phiếu trả hàng nhập</h4>
                                        </div>
                                        <div class="modal-body">
<center><h3>PHIẾU TRẢ HÀNG NHẬP</h3></center>
Mã phiếu trả hàng nhập:{{$d->ma_pthn}} &nbsp; Ngày lập:{{$d->updated_at}}<br>
Mã phiếu nhập hàng:{{$d->ma_pnh}}&nbsp;
Nhà cung cấp: {{$d->PhieuNhapHang->NCC->ten_ncc}} &nbsp;
@if(!is_null($d->nguoi_giao_hang))
Người giao hàng:{{$d->nguoi_giao_hang}}
@endif

 <section id="no-more-tables">
 <table class="table table-bordered table-striped table-condensed cf">
     <thead class="cf">
         <tr>
             <th># Mã hàng hóa</th>
             <th>Tên hàng hóa</th>
             <th>Số lượng </th>
             <th>Đơn giá trả hàng</th>
             <th>Thành tiền trả hàng</th>
         </tr>
     </thead>
     <tbody>
     <?php
    $hh = $d->ChiTietPhieuTraHangNhaps;
     ?>
        @foreach($hh as $h)
         <tr>
             <td data-title="# Mã ncc">{{$h->ma_hh}}</td>
             <td class="numeric"  data-title="Tên hàng hóa">{{$h->HangHoa->ten_hang_hoa}}</td>
             <td class="numeric"  data-title="Số lượng ">{{$h->so_luong}}</td>
             <td class="numeric"  data-title="Đơn giá">{{number_format($h->don_gia)}}</td>
             <td class="numeric"  data-title="Thành tiền">{{number_format($h->don_gia*$h->so_luong)}}</td>
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
                                        <a href="{{route('print.pnh',$d->id)}}">
                                                <button type="submit" class="w3-btn w3-blue">
                                                    <i class="fa fa-print"></i> In
                                                </button>
                                                </a>
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Đóng</button>


                                        </div>
                              </div>
                                </div>
                            </div>