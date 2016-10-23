<?php
/*Tim kiem cac danh muc goc, các danh muc khong co danh muc cha*/
    use App\DanhMuc;
        $dm_goc=App\DanhMuc::select('ma_dm','ten_dm')
         ->whereNull('ma_dm_cha')
         ->distinct()
         ->get();
    use App\hanghoa;
/*End-Tim kiem cac danh muc goc, các danh muc khong co danh muc cha*/
?>
@extends('layouts.master')
@section('title','Hàng hóa')
@section('content')
    <div class="container">
    <div class="women_main">
    <!-- start sidebar -->
    <div class="col-sm-12 col-md-3 col-lg-2 s-d">
      <div class="w_sidebar">
        <div class="w_nav1">
            <h4>All</h4>
            <ul>
                 @foreach($dm_goc as $d)

                <li><a class="color2" href="{{route('home.product',['ma_dm'=>$d->ma_dm])}}">{{$d->ten_dm}}</a></li>
                @endforeach
                <li><a href="#">Giảm giá</a></li>
            </ul>
        </div>
        <h3>Lọc</h3>
        <section  class="sky-form">
                    <h4>Danh mục</h4>
                        <div class="row1 scroll-pane">
                            <div class="col col-4">
                                <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>kurtas</label>
                            </div>
                            <div class="col col-4">
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>kutis</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>churidar kurta</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>salwar</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>printed sari</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>shree</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Anouk</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>biba</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>fashion sari</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>fashion sari</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>fashion sari</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>fashion sari</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>fashion sari</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>fashion sari</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>fashion sari</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>fashion sari</label>
                            </div>
                        </div>
        </section>
        <!-- <section  class="sky-form">
                    <h4>brand</h4>
                        <div class="row1 scroll-pane">
                            <div class="col col-4">
                                <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>shree</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Anouk</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>biba</label>
                            </div>
                            <div class="col col-4">
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>vishud</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>amari</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>shree</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Anouk</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>biba</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>shree</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Anouk</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>biba</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>shree</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Anouk</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>biba</label>
                            </div>
                        </div>
        </section> -->
        <!-- <section class="sky-form">
            <h4>colour</h4>
            <ul class="w_nav2">
                <li><a class="color1" href="#"></a></li>
                <li><a class="color2" href="#"></a></li>
                <li><a class="color3" href="#"></a></li>
                <li><a class="color4" href="#"></a></li>
                <li><a class="color5" href="#"></a></li>
                <li><a class="color6" href="#"></a></li>
                <li><a class="color7" href="#"></a></li>
                <li><a class="color8" href="#"></a></li>
                <li><a class="color9" href="#"></a></li>
                <li><a class="color10" href="#"></a></li>
                <li><a class="color12" href="#"></a></li>
                <li><a class="color13" href="#"></a></li>
                <li><a class="color14" href="#"></a></li>
                <li><a class="color15" href="#"></a></li>
                <li><a class="color5" href="#"></a></li>
                <li><a class="color6" href="#"></a></li>
                <li><a class="color7" href="#"></a></li>
                <li><a class="color8" href="#"></a></li>
                <li><a class="color9" href="#"></a></li>
                <li><a class="color10" href="#"></a></li>
            </ul>
        </section> -->
        <!-- <section class="sky-form">
                        <h4>discount</h4>
                        <div class="row1 scroll-pane">
                            <div class="col col-4">
                                <label class="radio"><input type="radio" name="radio" checked=""><i></i>60 % and above</label>
                                <label class="radio"><input type="radio" name="radio"><i></i>50 % and above</label>
                                <label class="radio"><input type="radio" name="radio"><i></i>40 % and above</label>
                            </div>
                            <div class="col col-4">
                                <label class="radio"><input type="radio" name="radio"><i></i>30 % and above</label>
                                <label class="radio"><input type="radio" name="radio"><i></i>20 % and above</label>
                                <label class="radio"><input type="radio" name="radio"><i></i>10 % and above</label>
                            </div>
                        </div>
        </section> -->
    </div>
   </div>
    <!-- start content -->
    <div class="col-sm-12 col-md-9 col-lg-10 w_content">
        @if($data->first())
            <div class="women">
                <a href="#"><h4>{{$data->first()->danhmuc->ten_dm}} - <span><?php echo count($data); ?> sản phẩm</span> </h4></a>
                <ul class="w_nav">
                            <li>Sắp xếp : </li>
                            <!-- <li><a class="active" href="#">phổ biến</a></li> | -->
                            <li><a class="active" href="#">giảm giá</a></li> |
                            <li><a href="#">mới </a></li> |
                            <li><a href="#">tên</a></li> |
                            <li><a href="#">Giá: thấp - Cao </a></li>
                            <div class="clear"></div>
                 </ul>
                 <div class="clearfix"></div>
            </div>

        @endif
        @if($data->first())
                @foreach($data as $d)
                    <div class="col-md-6 col-sm-12 col-lg-4 hero-feature">
                        <div class="thumbnail">
                            @if(!filter_var(url('product-imgs/'.$d->hinh_anh), FILTER_VALIDATE_URL) === false)
                           <img src="{{url('product-imgs/'.$d->hinh_anh)}}"  class="img-responsive" alt="" >
                            @else
                            <img src="{{url('product-imgs/product.png')}}"  class=" img-responsive" alt="imgs" style="max-height: ">
                            @endif
                            <div class="caption">
                                <center><h3>{{$d->ten_hang_hoa}}</h3></center>
                                <center><h4>{{hanghoa::gia_ban_cuoi($id)}}</h4></center>
                                <!-- <p>Giá</p> -->
                                <p>
                                    <a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
                                </p>
                            </div>
                        </div>
                </div>
                 @endforeach
                 @else
                    <h4> Không có hàng hóa thuộc danh mục này</h4>
             @endif
        </div>
    </div>
@endsection