<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<center><h3>PHIẾU NHẬP HÀNG</h3></center>
Mã phiếu:&nbsp;{{$d->ma_pnh}} &nbsp; Ngày lập: &nbsp;{{$d->updated_at}}<br>
Nhà cung cấp:&nbsp; {{$d->NCC->ten_ncc}} &nbsp;
@if(!is_null($d->nguoi_giao_hang))
Người giao hàng:&nbsp;{{$d->nguoi_giao_hang}}
@endif
<br>
<hr>
<?php
$hh = $d->ChiTietPhieuNhapHangs;
 ?>
 <table style="width: 100%">
     <thead>
         <tr style="text-align: left;">
             <th>Mã hàng hóa</th>
             <th>Tên hàng hóa</th>
             <th>Số lượng</th>
             <th>Đơn giá</th>
             <th>Thành tiền</th>
         </tr>
     </thead>
     <tbody>
        @foreach($hh as $h)
         <tr style="text-align: left;">
             <td>{{$h->ma_hh}}</td>
             <td>{{$h->hanghoa->ten_hang_hoa}}</td>
             <td>{{$h->so_luong}}</td>
             <td>{{number_format($h->don_gia)}}</td>
             <td>{{number_format($h->don_gia*$h->so_luong)}}</td>
         </tr>
         @endforeach
     </tbody>
 </table>
 <hr>
 <div class="left" style="float: right;">
Tổng tiền:{{$d->thanh_tien}}
 </div>

</body>
</html>