<!-- model edit or create price hang hoa -->
<div class="modal fade info" id="modal-edit-{{$d->id}}" tabIndex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">
                ×
              </button>
              <h4 class="modal-title">Cập nhật giá</h4>
            </div>
            <form id ="update-form"method="POST" action="{{route('emp.price.store')}}">
                <div class="modal-body">

                    Mã hàng hóa:
                    {{$d->ma_hh}}<br><br>
                    Tên hàng hóa :{{$d->ten_hang_hoa}}<br><br>
                    Giá nhập cuối: {{App\hanghoa::gia_nhap_cuoi($d->id)}}<br><br>

                    @if(!empty(App\hanghoa::gia_ban_cuoi($d->id)))
                     Giá bán: {{App\hanghoa::gia_ban_cuoi($d->id)}}<br><br>
                    @endif
                     Giá bán mới:

                    <input style="width: 80%; float: right;" class= "form-control col-sm-6" id="don_gia" type="number" name="don_gia" ><br><br>

                </div>
                <div class="modal-footer">
                        <input type="hidden" name="ma_hh" id="ma_hh" value="{{$d->ma_hh}}">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}">

                        <button type="button" class="w3-btn w3-white w3-hover-red"
                            data-dismiss="modal"><i class="fa fa-times-circle"></i> Đóng</button>
                        <button type="submit" class="w3-btn w3-blue">
                            Lưu
                        </button>
                </div>
            </form>
  </div>
    </div>
</div>


