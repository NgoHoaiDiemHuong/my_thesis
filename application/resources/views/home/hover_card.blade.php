<div style="overflow: auto; position:absolute;background-color:#F5F5F5;
        z-index:99999;">


@if(Session::has('cart'))
    <table style="width: 100%;">
        <thead style="text-align: center;">
            <th>Tên</th>
            <th>SL</th>
            <th>Đ.giá</th>
            <th>T.tiền</th>
        </thead>
        <tbody>
            @foreach(Session::get('cart.pro') as $k => $v)
            <tr>
                 <td style="text-align: left;">{{$v['ten_hang_hoa']}}</td>
                 <td style="text-align: center; margin-right: 5px;">{{$v['so_luong']}}</td>
                 <td style="text-align: center;">{{number_format($v['don_gia'])}}</td>
                 <td style="text-align: center;">{{number_format($v['thanh_tien'])}}</td>
            </tr>
            @endforeach
            <tr>
                <td>Tổng tiền</td>
                <td></td>
                <td></td>
                <td style="text-align: right;">{{number_format(Session::get('cart.tong_tien'))}} đ.</td>
            </tr>
            <tr style="border-top: 2px;">
                <td>Số lượng</td>
                <td></td>
                <td></td>
                <td style="text-align: right;">{{Session::get('cart.so_luong')}} sp.</td>
            </tr>
        </tbody>
    </table>
    <hr>

@else

@endif
</div>