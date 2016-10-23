<div class="modal fade" ole="dialog" id="modal-info-{{$d->id}}" tabIndex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            ×
          </button>
          <h4 class="modal-title">Thông tin khách hàng</h4>
            </div>
                <div class="modal-body">

        <h3 class="centered">{{$d->ten_kh}}</h3>
         <div class="list-group">
              <a href="" class="list-group-item ">
              Tên khách hàng: {{$d->ten_kh}}
              </a>
              <a href="#" class="list-group-item">
                MSSV: {{$d->MSSV}}
              </a>
              <a href="#" class="list-group-item">
               Khóa học: {{$d->khoa_hoc}}
              </a>
              <a  class="list-group-item">
                SĐT:  {{$d->sdt}}
              </a>
              <a  class="list-group-item">
                  Địa chỉ:  {{$d->dia_chi}}
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