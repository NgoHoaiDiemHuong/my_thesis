<div class="row">
    @if(!empty($data))
        <div class="row">
            <div class="col-lg-12">
            <center>Có {{ count($data)}} sản phẩm được tìm thấy</center>
            </div>
                @foreach($data as $d)
                    <div class="col-xs-12 col-sm-4 col-md-3  col-lg-3 hero-feature w3-animate-opacity">
                        <div class="thumbnail " style="width=800px; height=500px;">
                            <!-- <img src=""  class=" img-responsive" alt="imgs"> -->
                            <div class="w3-hover-opacity">
                            <center >
                            <object data="{{url('product-imgs/'.$d->hinh_anh)}}" type="image/png">
                                <img src="{{url('product-imgs/product.png')}}"  class="img-responsive " alt='' >
                            </object>
                            </center>
                            </div>
                            <div class="caption">
                                <center><h3>{{$d->ten_hang_hoa}}</h3></center>
                                <?php  $giabancuoi= App\hanghoa::gia_ban_cuoi($d->ma_hh);?>
                                @if(!is_null($giabancuoi))
                                <center><h4>{{number_format($giabancuoi)}} đ/1 &nbsp;{{$d->don_vi_tinh}}</h4>

                                <!-- <p>Giá</p> -->
                                <p>
                                @if(($d->so_luong > 0))
                                    <form action="{{route('cart.store')}}" method="POST" class="side-by-side">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="id" value="{{ $d->id }}">
                                        <input type="hidden" name="ten_hang_hoa" value="{{ $d->ten_hang_hoa }}">
                                        <input type="hidden" name="don_gia" value="{{ $giabancuoi }}">
                                        <input type="submit" class="w3-btn w3-blue" value="Add to Cart">
                                    </form>
                                @else
                                    <h4>Giá đang cập nhật</h4>
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

            </div>

    @else
    <p>Không tìm thấy hàng hóa nào</p>
    @endif
</div>