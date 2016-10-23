<?php
setlocale(LC_MONETARY,'vi_VN..UTF-8');

 ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
     <meta charset="UTF-8">
    <style type="text/css" media="screen">
        body{
            font-family: 'Courier'
            width:300px;
        }
    </style>
</head>
<body style="width: 300px;" onload="window.resizeTo(300)">
<!-- header ('logo', ten cua hang )-->
<!-- dia chi, so dt -->
<!-- ****************************** -->
<!-- HOA DON THANH TOAN -->
    <!-- ma_hd -->
    <!-- ngay ban -->
    <!-- ma _ ddh neu co -->
    <!-- nhan vien ban -->
    <!-- khach hang -->
    <!-- ************************************8 -->
<!-- body danh sach hang hoa -->
    <!-- ten -  sl - dgia - thanh tien -->
    <!-- ten -  sl - dgia - thanh tien -->
    <!-- ten -  sl - dgia - thanh tien -->
    <!-- ten -  sl - dgia - thanh tien -->
    <!-- ************************************** -->
    <!-- tong tien -->
    <!-- thanh toan -->
    <!-- tien thoi -->

<!-- Hen gap lai -->

<img src="{{Asset('images/logo.png')}}" class="img-responsive" alt="dfggd" width="300px" height="60px;" />

<center>123 đường 3/2, Ninh Kiều, Cần Thơ</center>
<center>090 147 5580 </center>
<hr>
<center><h3>HÓA ĐƠN THANH TOÁN</h3></center>
Mã hóa đơn: {{$hd->ma_hd}}<br>
<!-- neu co hoa don cua don dat hang -->
@if($hd->ma_dh)
Mã đơn đặt hàng:{{$hd->ma_dh}}<br>
@endif
Ngày bán &nbsp{{date("d/m/Y h:i:sa" ,strtotime($hd->updated_at))}}<br>
<hr>
<table style="width: 300px;">
    <thead style="border-bottom: solid; width: 300px; text-align: left;">
        <th>Tên</th>
        <th>SL</th>
        <th>Đ.giá</th>
        <th>T.tiền</th>
    </thead>
    <tbody>
    @foreach($cthd as $d)
        <tr style="border-left: dashed; border-right: dashed;">
            <td>{{$d->product->ten_hang_hoa}}</td>
            <td>{{$d->so_luong}}</td>
            <td>{{$d->don_gia}}</td>
            <td>{{$d->so_luong * $d->don_gia}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<hr>
TỔNG TIỀN: <span style="float:right;">{{$hd->thanh_tien}} VND </span><br>
@if($hd->thanh_toan)
THANH TOÁN: <span style="float:right;">{{$hd->thanh_toan}} VND </span><br>
@else
THANH TOÁN: <span style="float:right;">{{$hd->thanh_tien}} VND </span><br>
@endif
@if($hd->thanh_toan > $hd->thanh_tien)
TIỀN THỒI: <span style="float:right;">{{$hd->thanh_toan - $hd->thanh_tien}} VND <br></span>
@else
TIỀN THỒI: <span style="float:right;">0 VND <br></span>
@endif
<hr>
<center><strong>Hẹn gặp lại quý khách</strong></center>

</body>
</html>