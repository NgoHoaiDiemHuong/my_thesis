@foreach($data as $d)
  <tr>
    <td data-title="# Mã hàng hóa">{{$d->ma_nv}}</td>
    <td data-title="Tên hàng hóa">
    <a href="" title="">{{$d->ten_nv}}</a>
    </td>
    <td class="numeric" data-title="Đơn giá">{{$d->nhomnguoidung->ten_nnd}}</td>
    <td class="numeric" data-title="SĐT">{{$d->sdt}}</td>
    <td class="numeric" data-title="Số lượng">
        <input type="number" name="" value="" placeholder=""min="0">
    </td>
    <td class="numeric" data-title="Thành tiền">

    </td>
    <td class="numeric" data-title="tool">
        <a href="" title="" onclick="deleteRow(this)">
            <button class="btn btn-danger btn-xs">
                x</i>
            </button>
        </a>

        <!-- <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button> -->


    </td>
  </tr>
@endforeach