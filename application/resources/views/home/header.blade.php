<?php
/*Tim kiem cac danh muc goc, các danh muc khong co danh muc cha*/
    use App\DanhMuc;
        $dm_goc=App\DanhMuc::select('ma_dm','ten_dm')
         ->whereNull('ma_dm_cha')
         ->distinct()
         ->get();
/*End-Tim kiem cac danh muc goc, các danh muc khong co danh muc cha*/
?>
<ul class="megamenu skyblue ">
    <li class="active grid"><a class="color1" href="{{url('/')}}">Trang chủ</a>
    </li>
    @foreach($dm_goc as $d)
        <li class="grid"><a class="color2 catalog"  href="{{route('home.product',['ma_dm'=>$d->ma_dm])}}">{{$d->ten_dm}}</a>
        <?php
            $dmc = App\DanhMuc::where('ma_dm_cha',"=",$d->ma_dm)->get();
         ?>
        @foreach($dmc as $dc)
            <div class="megapanel">
                <div class="row">
                    <div class="col1">
                        <div class="h_nav">
                            <h4>{{$d->ten_dm}}</h4>
                            <ul>
                                <li><a class=" catalog"  href="{{route('home.product',['ma_dm'=>$dc->ma_dm])}}">{{$dc->ten_dm}}</a>
                                <!-- route('home.product',['ma_dm'=>$d->ma_dm]) -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach
</ul>
<script type="text/javascript" charset="utf-8" async defer>

</script>