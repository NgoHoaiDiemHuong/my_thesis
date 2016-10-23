<div class="modal fade" id="modal-info-{{$d->id}}" tabIndex="-1"  role="dialog">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">
                                        ×
                                      </button>
                                      <h4 class="modal-title">Thông tin chi tiết nhân viên</h4>
                                        </div>
                                        <div class="modal-body">
                                        <p class="centered"><a href="profile.html"><img src="{{url('assets/img/ui-sam.png')}}" class="img-circle" width="60"></a></p>
                                        <h3 class="centered">{{$d->ten_nv}}</h3>
                                        <h5 class="centered">{{$d->nhomnguoidung->ten_nnd}}</h5>
                                         <div class="list-group">
                                              <a href="" class="list-group-item ">
                                              Họ tên: {{$d->ten_nv}}
                                              </a>
                                              <a href="#" class="list-group-item">
                                                Nhóm nhân viên: {{$d->nhomnguoidung->ten_nnd}}
                                              </a>
                                              <a href="#" class="list-group-item">
                                                Ngày sinh: {{$d->ngay_sinh}}
                                              </a>
                                              <a  class="list-group-item">
                                                  Địa chỉ:  {{$d->dia_chi}}
                                              </a>
                                              <a  class="list-group-item">
                                                  Số điện thoại:  {{$d->sdt}}
                                              </a>
                                        </div>


                                        </div>

                                        <div class="modal-footer">

                                                <a href="{{route('emp.emloyees.edit',$d->id)}}">
                                                <button type="submit" class="w3-btn w3-blue">
                                                    <i class="fa fa-pencil"></i>Chỉnh sửa thông tin
                                                </button>
                                                </a>
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Đóng</button>

                                        </div>
                              </div>
                                </div>
                            </div>