@extends('layouts.master')
@section('cart-search')

<span class="w3-tag w3-xxlarge w3-padding w3-orange w3-center">
Thông tin đặt hàng
</span>
<!-- noi giao hang -->
<!-- hinh thuc thanh toan -->

@endsection
@section('content')
<form action="{{route('cart.postCheckout')}}" method="POST" accept-charset="utf-8" class="w3-container">
    <label class="w3-label">Người nhận hàng</label>
    <input class="w3-input w3-border-0" type="text" disabled value="{{Session::get('khach_hang')->ten_kh}}">
    <input type="hidden" name="ma_kh" value="{{Session::get('khach_hang')->ma_kh}}">
    <label class="w3-label">Địa điểm nhận hàng(Phòng)</label>
    <input class="w3-input w3-border-0" type="text" disabled value="{{Session::get('khach_hang')->dia_chi}}">
    <label class="w3-label">Hình thức thanh toán</label>
    <input class="w3-radio" type="radio" name="gender" value="male" disabled checked>Tiền mặt
    <label class="w3-label">Số tiền cần thanh toán</label>
    {{number_format(Cart::total())}} đ.
    <hr>
    <button class="w3-btn w3-blue-grey" type="submit">Đặt hàng</button>
</form>
<div class="row">
</div>
@endsection
@section('js')

@endsection