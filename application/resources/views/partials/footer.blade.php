<?php
use App\DanhMuc;
$dm=App\DanhMuc::all();
$d=array();
foreach($dm as $da){
            $tmp=$da->hanghoas;
            if(!is_null($tmp)){
                array_push($d,$da->ten_dm);
            }
        }
// printf($d);

 ?>
<div class="footer">
    <div class="footer-inner">
    <div class="container">
        <div class="col-md-3 cust">
            <h4>DANH MỤC
            <hr></h4>
            <!-- <hr style="color: #f8f8f8;"> -->
                @foreach($d as $x)
                <li><a href="#">{{$x}}</a></li>
                @endforeach
        </div>
        <div class="col-md-2 abt">
            <h4>THÔNG TIN <hr></h4>
                <li><a href="#">Bán chạy</a></li>
                <li><a href="#">Sản phẩm mới</a></li>
                <!-- <li><a href="#">Career</a></li> -->
                <li><a href="#">Liên hệ</a></li>
        </div>
        <div class="col-md-2 myac">
            <h4>TÀI KHOẢN <hr></h4>
                @if(!Session::has('khach_hang'))
                <li><a href="#">Đăng kí</a></li>
                <li><a href="#">Đăng nhập</a></li>
                @endif
                <li><a href="buy.html">Thanh toán</a></li>
                <li><a href="{{route('his.check')}}">Order History</a></li>
        </div>
        <div class="col-md-5 our-st">
            <div class="our-left myac">
                <h4>CỬA HÀNG <hr></h4>
            </div>
            <!-- <div class="our-left1">
                <div class="cr_btn">
                    <a href="#">SOLO</a>
                </div>
            </div>
            <div class="our-left1">
                <div class="cr_btn1">
                    <a href="#">BOGOR</a>
                </div>
            </div> -->
            <div class="clearfix"> </div>

                <li><i class="add"> </i>KTX-B ĐHCT 3/2 Ninh Kiều, Cần Thơ</li>
                <li><i class="phone"> </i>025-2839341</li>
                <li><a style="color: #F8f8f8;" href="mailto:info@example.com">
                <i class="mail"></i>info@gmail.com </a></li>

                <li> <a href="{{route('emp.getLogIn')}}" title=""><i style="color: #010101;" class="fa fa-home" aria-hidden="true"></i> &nbsp;Trang quản lý hệ thống</a></li>



        </div>
        <div class="clearfix"> </div>
            <p>Copyrights © 2016 by <a style="color: #f8f8f8;" href="#">Ngô Hoài Diễm Hương</a></p>
        </div>
    </div>
</div>
</footer>