@if(isset($d))
<div class="modal fade" id="modal-edit-{{$d->id}}" tabIndex="-1"  role="dialog">
<form action="{{route('emp.cate.update',$d->id)}}" method="post" accept-charset="utf-8"class="w3-container">
<input type="hidden" name="_token" value="{!!csrf_token()!!}">
<input type="hidden" name="_method" value="PUT">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                ×
                </button>
                <h4 class="modal-title">Chỉnh sửa danh mục</h4>
            </div>
            <div class="modal-body">
                <!-- <input type="text" name="ma_dm" >
                <input type="text" name="ten_dm" placeholder=""> -->


                <label>Thay đổi tên danh mục</label>
                <input class="w3-input" type="text" value="{{$d->ten_dm}}" required="true" minlength="3" name="ten_dm">
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
@if(isset($dt))
<div class="modal fade" id="modal-edit-{{$dt->id}}" tabIndex="-1"  role="dialog">
<form class="w3-container" action="{{route('emp.cate.update',$dt->id)}}" method="post" accept-charset="utf-8">
<input type="hidden" name="_token" value="{!!csrf_token()!!}">
<input type="hidden" name="_method" value="PUT">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        ×
                      </button>
                    <h4 class="modal-title">Chỉnh sửa danh mục</h4>
                </div>
                <div class="modal-body">


                <label>Thay đổi tên danh mục</label>
                <input class="w3-input" type="text" value="{{$dt->ten_dm}}" required="true" minlength="3" name="ten_dm">
                </div>
                <div class="modal-footer">

                    <button type="submit" class="w3-btn w3-blue">
                        Lưu
                    </button>

                    <button type="button" class="btn btn-default"
                        data-dismiss="modal">Đóng</button>

                </div>
      </div>
  </form>
</div>
@endif