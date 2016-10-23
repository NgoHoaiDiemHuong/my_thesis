@extends('layouts.master')
@section('cart-search')
<h3>Thông tin đơn hàng</h3>
@endsection
@section('content')
  @if (sizeof(Cart::content()) > 0)
<div class="row">
        <div  id="bill">
        <div id="bill-wraper">

        <div class="table-responsive">
        <section id="no-more-tables">
        <table class="table table-bordered table-striped table-condensed cf" >
            <thead class="cf" style="text-align: center; border-bottom: solid 1px gray;">

                <th class="table-image"></th>
                <th>Tên</th>
                <th>SL</th>
                <th>Đ.giá</th>
                <th style="text-align: right;">T.tiền</th>
                <th class="column-spacer"></th>
            </thead>
            <tbody>
               @foreach (Cart::content() as $item)
                <tr class="table-image">
                    <td data-title="">
                    <object data="{{asset('product-imgs/'.App\hanghoa::find($item->id)->hinh_anh)}}" type="image/png" class="responsive" style="max-width: 100px; max-height: 50px;" >
                    <img class="responsive" style="max-width: 100px; max-height: 50px;"  src="{{asset('product-imgs/product.png')}}"  class="img-responsive " alt='' >
                    </object></td>
                     <td class="numeric" data-title='Tên hàng'>{{$item->name}}</td>
                     <td class="numeric" data-title="Số lượng">


                    <select name="so_luong" data-id="{{ $item->rowid }}" class="quantity">

                        @for($i=1;$i <= App\hanghoa::find($item->id)->so_luong;$i++)
                          <option value="{{$i}}" {{ $item->qty == $i ? 'selected' : '' }}>{{$i}}</option>
                        @endfor
                    </select>

                    </td>
                     <td class="numeric" data-title="Đơn giá">{{number_format($item->price)}}</td>
                     <td class="numeric" data-title="Tổng tiền">{{number_format($item->qty*$item->price)}}</td>
                     <td class="column-spacer numeric" data-title="tool">

                     <form action="{{route('cart.delete', [$item->rowid])}}" method="POST" class="side-by-side">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" class="w3-btn w3-red btn-sm" value="Xóa khỏi giỏ hàng">
                    </form>
                     </td>
                </tr>
                @endforeach


                <tr>
                    <td colspan="5">
                        <span class="pull-right">Tổng tiền</span>
                    </td>
                    <td>{{number_format(Cart::total())}} đ.</td>
                </tr>
            </tbody>
    </table>
      </section>
        <form action="{{route('cart.empty')}}" method="POST">
            {!! csrf_field() !!}
            <input type="hidden" name="_method" value="DELETE">
            <input type="submit" class="w3-btn w3-red" value="Empty Cart">
            <a href="{{url('/')}}" title="" >Tiếp tục mua hàng</a>
        </form>






        <div class="left"style="float: right;">
        <!-- <button type="button" class="w3-btn w3-red"  >Xóa bỏ giỏ hàng</button> -->
        <a href="{{route('cart.checkout')}}" title=""  style="float: left;">
        <button type="button" class="w3-btn w3-blue"  style="float: right;">THANH TOÁN</button>
        </a>
        </div>
    </div>
    <hr>
    </div>

    </div>
</div>

@else
Chưa có hàng hóa trong giỏ hàng
@endif
@endsection
@section('js')
<script type="text/javascript" charset="utf-8" async defer>

 $( document ).ready(function() {
    $( ".so_luong" ).on('change',function() {
        var id= $(this).attr('name');
        var sl= this.value;

        var data ={
            so_luong:sl,
            id:id
        }
        alert(data);
        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
            });
              console.log(data);
        $.ajax({
            type: "POST",
            url: "{{route('cart.change_soluong')}}",
            data: data,
            success: function(data){
                // $('#btn-cart').load(document.URL+' #btn-cart').fadeIn();
                $('#bill-wraper').load(document.URL+' #bill-wraper').fadeIn();
                // $('#bill').load();
                alert(data);
            },
            dataType: 'json',
            error: function (data) {
                console.log('Error:', data);
                // $('div.rx').html(data);
            }
        });
    });
// var n = document.getElementsByClassName("so_luong");
// n.addEventListener("input", function(e) {
//     var id= $(this).attr('name');
//     var sl= this.value;
//     var data ={
//             so_luong:sl,
//             id:id
//         }
//     alert(data);
//     $.ajax({
//             type: "POST",
//             url: "{{route('cart.change_soluong')}}",
//             data: data,
//             success: function(){
//                 // $('#btn-cart').load(document.URL+' #btn-cart').fadeIn();
//                 $('#bill-wraper').load(document.URL+' #bill-wraper').fadeIn();
//                 // $('#bill').load();
//                 alert(data);
//             },
//             dataType: 'json',
//             error: function (data) {
//                 console.log('Error:', data);
//                 // $('div.rx').html(data);
//             }
//         });

//     // r.innerHTML += "input event triggered <br/>";
// }, false);
});


</script>
 <script>
        (function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.quantity').on('change', function() {
                var id = $(this).attr('data-id');
                var purl= "{{url('/')}}";
                $.ajax({
                  type: "PUT",
                  url: purl +'/cart/' + id,
                  data: {
                    'quantity': this.value,
                  },
                  success: function(data) {
                    window.location.href = '{{route('cart.index')}}';
                  }
                });

            });

        })();

    </script>
@endsection