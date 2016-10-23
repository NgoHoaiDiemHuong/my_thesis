<div class="modal fade" role="dialog" id="modal-info-{{$d->id}}" tabIndex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    ×
                </button>
                <h4 class="modal-title">Thông tin NCC</h4>
            </div>
                <div class="modal-body">
                    <h3 class="centered">{{$d->ten_ncc}}</h3>
                    <div class="list-group">
                          <a href="" class="list-group-item ">
                         Mã NCC: {{$d->ma_ncc}}
                          </a>
                          <a href="#" class="list-group-item">
                            Tên NCC: {{$d->ten_ncc}}
                          </a>
                          <a href="#" class="list-group-item">
                          SĐT: {{$d->sdt}}
                          </a>
                          <a  class="list-group-item">
                            Địa chỉ:  {{$d->dia_chi}}
                          </a>
                          <a  class="list-group-item">
                             Email:  {{$d->email}}
                          </a>
                          <a  class="list-group-item">
                             Mã số thuế:  {{$d->ma_so_thue}}
                          </a>
                          <a  class="list-group-item">
                            Ghi chú:  {{$d->ghi_chu}}
                          </a>
                    </div>

    </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default"
                        data-dismiss="modal">Đóng</button>
            </div>


        </div>

    </div>

  </div>
    </div>
</div>