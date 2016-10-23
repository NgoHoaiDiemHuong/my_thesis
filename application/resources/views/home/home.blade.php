<?php
use App\hanghoa;
 ?>
@extends('layouts.master')
@section('title', 'Trang chủ')
@section('cart-search')
@include('home.cart-search')
@endsection
@section('menu')
@include('home.header')
@endsection
@section('content')

<div class="row" id= "search-results">

</div>
<div class="row" id="content">
    @if(!empty($data))

    @foreach($data as $da)
        <!-- DANH MUC HANG HOA -->
        <div class="row">
            @if(!empty($da['data'][0]))
                <div class="row">
                <center><h3 style="color: #F4645F;">{{$da['ten_dm']}}</h3></center><hr class= "line"></div>
                    @foreach($da['data'] as $d)
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 hero-feature w3-animate-opacity w3-hover-opacity" style="height: 350px;">
                            <div class="">
                                <!-- <img src=""  class=" img-responsive" alt="imgs"> -->
                                <div class="" style="height: 80%">
                                <center >

                                 <img src="{{url('product-imgs/'.$d->hinh_anh)}}"  class="img-responsive" alt="" >
                                </center>
                                </div>

                                <div class="" style='height: 20%'>
                                    <center>
                                    <hr style="width: 70%; text-align: center; color: 2px solid #5A4181;">
                                    </center>
                                    <center><h3>{{$d->ten_hang_hoa}}</h3></center>
                                    <?php $giabancuoi = hanghoa::gia_ban_cuoi($d->ma_hh); ?>
                                    @if(!is_null($giabancuoi))
                                    <center><h4>{{number_format($giabancuoi)}} đ/1 &nbsp;{{$d->don_vi_tinh}}</h4>

                                    <!-- <p>Giá</p> -->
                                        <?php echo Cart::search(['id' => $d->id]); ?>
                                        @if($d->so_luong > 0 )
                                            @if(Cart::search(['id' =>(String)$d->id]))
                                            <form action="{{route('cart.delete',(String)($d->id) )}}" method="POST" class="side-by-side">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="_method" value="DELETE">

                                            </form>
                                            <center><input style="width: 70%" type="" class="w3-btn w3-teal btn-sm" value="Đã thêm giỏ hàng"></center>

                                            @else
                                                <form action="{{route('cart.store')}}" method="POST" class="side-by-side">
                                                    {!! csrf_field() !!}
                                                    <input type="hidden" name="id" value="{{ $d->id }}">
                                                    <input type="hidden" name="ten_hang_hoa" value="{{ $d->ten_hang_hoa }}">
                                                    <input type="hidden" name="don_gia" value="{{ $giabancuoi }}">
                                                    <center>
                                                    <input style="width: 70%" type="submit" class="w3-btn w3-blue" value="Thêm vào giỏ hàng">
                                                    </center>
                                                </form>

                                            @endif
                                          @else
                                          <h4>Hết hàng</h4>
                                          @endif
                                       <!--  <a href="#" class="w3-btn">More Info</a> -->
                                    </p>
                                    @else
                                    <h4>Giá đang cập nhật</h4>
                                    @endif
                                    </center>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

                </div>
                @endforeach
            @else
            <p>Không có hàng hóa</p>
            @endif
</div>
@endsection
@section('js')
<script type="text/javascript" charset="utf-8" async defer>

</script>
@endsection