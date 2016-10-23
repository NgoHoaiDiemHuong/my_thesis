<div class="modal fade" id="modal-delete-{{$d->id}}" tabIndex="-1"  role="dialog">
                                <div class="modal-dialog ">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">
                                        ×
                                      </button>
                                      <h4 class="modal-title">Xác nhận xóa</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p class="lead">
                                                <i class="fa fa-question-circle fa-lg"></i>
                                                Bạn có chắc chắn xóa {{$d->ma_kh}} - {{$d->ten_kh}}?
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <form method="POST" action="{{route('emp.cus.destroy',$d->id)}}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Đóng</button>
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-times-circle"></i> Đồng ý
                                                </button>
                                            </form>
                                        </div>
                              </div>
                                </div>
                            </div>