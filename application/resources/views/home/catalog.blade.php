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
                                @if(!is_null(App\hanghoa::gia_ban_cuoi($d->ma_hh)))
                                <center><h4>{{App\hanghoa::gia_ban_cuoi($d->ma_hh)}} đ/1 &nbsp;{{$d->don_vi_tinh}}</h4>
                                @else
                                <h4>Giá đang cập nhật</h4>
                                @endif
                                <!-- <p>Giá</p> -->
                                <p>

                                    <a  href="#">
                                      <button  class="w3-btn w3-red" type="button">
                                      <!-- <i style="color: #f5f5f5;" class="fa fa-shopping-cart fa-2x pull-left" ></i> -->
                                      <i style="color: #f5f5f5;" class="fa fa-cart-plus " aria-hidden="true"></i>
                                       Thêm</button>
                                      </a>
                                   <!--  <a href="#" class="w3-btn">More Info</a> -->
                                </p>
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