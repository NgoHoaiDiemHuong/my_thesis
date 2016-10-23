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
<center><h3>PHIẾU KIỂM KÊ HÀNG HÓA{{$d->trang_thai==0?' PHIẾU TẠM':''}}</h3></center>
Mã phiếu:{{$d->ma_pkk}} &nbsp; Ngày lập:{{$d->updated_at}}<br>
Người tạo {{$d->NhanVien->ten_nv}} &nbsp;

<?php
$hh = $d->ChiTietPhieuKiemKe;
 ?>
 <section id="no-more-tables">
 <table class="table table-bordered table-striped table-condensed cf">
     <thead class="cf">
         <tr>
             <th># Mã hàng hóa</th>
             <th>Tên hàng hóa</th>
             <th>Số lượng tồn kho</th>
             <th>Số lượng thực tế</th>

         </tr>
     </thead>
     <tbody>
        @foreach($hh as $h)
         <tr>
             <td data-title="# Mã hàng hóa">{{$h->ma_hh}}</td>
             <td class="numeric"  data-title="Tên hàng hóa">{{$h->HangHoa->ten_hang_hoa}}</td>
             <td class="numeric"  data-title="Số lượng tồn kho">{{$h->so_luong}}</td>
             <td class="numeric"  data-title="Số lượng thực tế">{{$h->don_gia*$h->so_luong}}</td>
         </tr>
         @endforeach
     </tbody>
 </table>
 </section>
 <div class="left" style="float: right;">
Tổng mặt hàng đã kiểm kê:{{count($hh)}} &nbsp; mặt hàng.
 </div>
                                        </div>
                                        <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Đóng</button>
                                                @if($d->trang_thai==0)
                                                <a href="{{route('emp.pkk.edit',$d->id)}}">
                                                <button type="submit" class="w3-btn w3-blue">
                                                    <i class="fa fa-pencil"></i> Mở phiếu tạm
                                                </button>
                                                </a>
                                                @endif
                                                <a href="{{route('print.pnh',$d->id)}}">
                                                <button type="submit" class="w3-btn w3-blue">
                                                    <i class="fa fa-times-circle"></i> In phiếu
                                                </button>
                                                </a>

                                        </div>
                              </div>
                                </div>
                            </div>