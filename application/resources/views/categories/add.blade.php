@if(isset($dt))
<div class="modal fade" id="modal-add-{{$dt->id}}" tabIndex="-1"  role="dialog">
<form action="{{route('emp.cate.store')}}" method="post" accept-charset="utf-8"class="w3-container">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                ×
                </button>
                <h4 class="modal-title">Thêm danh mục mới</h4>
            </div>
            <div class="modal-body">
                <label>Danh mục cha</label>
                <input type="hidden" name="ma_dm_cha" value="{{$dt->ma_dm}}">
                <input class="w3-input" type="text" readonly="true" value="{{$dt->ten_dm}}" >
                <label>Tên danh mục</label>
                <input class="w3-input" type="text" required="true" minlength="3" name='ten_dm'>
            </div>
            <div class="modal-footer">
                <button type="submit" class="w3-btn w3-blue">
                    Lưu
                </button>

                <button type="button" class="btn btn-default"
                    data-dismiss="modal">Đóng</button>

            </div>
        </div>
    </div>
</form>
</div>
@else
<?php $dmcha=App\DanhMuc::whereNull('ma_dm_cha')->get();  ?>
<div class="modal fade" id="modal-add" tabIndex="-1"  role="dialog">
<form action="{{route('emp.cate.store')}}" method="post" accept-charset="utf-8"class="w3-container">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                ×
                </button>
                <h4 class="modal-title">Thêm danh mục mới</h4>
            </div>
            <div class="modal-body">
                <label>Danh mục cha</label>
                <select name = "ma_dm_cha" class="selectpicker form-control" data-live-search="true" title="Chọn danh mục cha..." value="">
                <option>Không có danh mục cha</option>
                @foreach($dmcha as $d)
                    <option value="{{$d->ma_dm}}">{{$d->ten_dm}}</option>
                @endforeach
              </select>


                <label>Tên danh mục</label>
                <input class="w3-input" type="text" required="true" minlength="3" name='ten_dm'>
            </div>
            <div class="modal-footer">
                <button type="submit" class="w3-btn w3-blue">
                    Lưu
                </button>

                <button type="button" class="btn btn-default"
                    data-dismiss="modal">Đóng</button>

            </div>
        </div>
    </div>
</form>
</div>
@endif