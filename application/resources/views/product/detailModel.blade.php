<div class="modal fade" role="dialog" id="modal-info-{{$d->id}}" tabIndex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    ×
                </button>
                <h4 class="modal-title">Thông tin hàng hóa</h4>
            </div>
                <div class="modal-body">
                    <div class="row">

    <div class="jumbotron">
      <div class="col-lg-4 col-md-4 col-sm-12">
         <p class="centered">
            <a href="profile.html">

                <object data="{{asset('product-imgs/'.$d->hinh_anh)}}" type="image/png">
                                    <img src="{{asset('product-imgs/product.png')}}"  class="img-responsive " alt='' >
                </object>
            </a>
        </p>
        <h3 class="centered">{{$d->ten_hang_hoa}}</h3>
        <h5 class="centered">{{$d->danhmuc->ten_dm}}</h5>
    </div>
    <div class="col-lg-8 col-md-8 col-sm-12">

         <div class="list-group">
              <a href="" class="list-group-item ">
              Tên hàng hóa: {{$d->ten_hang_hoa}}
              </a>
              <a href="#" class="list-group-item">
                Danh mục: {{$d->danhmuc->ten_dm}}
              </a>
              <a href="#" class="list-group-item">
               Đơn vị tính: {{$d->don_vi_tinh}}
              </a>
              <a  class="list-group-item">
                Xuất xứ:  {{$d->xuat_xu}}
              </a>
              <a  class="list-group-item">
                  Mô tả:  {{$d->mo_ta}}
              </a>
        </div>
    </div>


    </div>
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