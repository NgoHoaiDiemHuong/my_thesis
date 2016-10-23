            <section id="no-more-tables">
                <table class="table table-bordered table-striped table-condensed cf">
                    <thead class="cf">
                      <tr>
                        <th ># Mã hàng hóa</th>
                        <th >Tên hàng hóa</th>
                        <th >Danh mục</th>
                        <th >Đơn vị tính</th>
                        <th >Bán online</th>
                        <th >Xuất xứ</th>
                        <th >Mô tả</th>
                        <th ></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $d)
                      <tr>
                        <td data-title="# Mã hàng hóa">{{$d->ma_hh}}</td>
                        <td data-title="Tên hàng hóa">
                            <a  data-toggle="modal" data-target="#modal-info-{{$d->id}}" title="">{{$d->ten_hang_hoa}}</a>
                            @include('product.detailModel')
                        </td>
                        <td class="numeric" data-title="Danh mục">{{$d->danhmuc->ten_dm}}</td>
                        <td class="numeric" data-title="Đơn vị tính">{{$d->don_vi_tinh}}</td>
                        <td class="numeric" data-title="Bán online">
                            <span class="label label-info label-mini">Có</span>
                        </td>
                        <td class="numeric" data-title="Xuất xứ">{{$d->xuat_xu}}</td>
                        <td class="numeric" data-title="Mô tả">{{$d->mo_ta}}</td>
                        <td class="numeric" data-title="tool">
                            <a href="{{route('emp.product.edit',$d->id)}}" >
                                <button class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i>
                                </button>
                            </a>
                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-delete-{{$d->id}}"><i class="fa fa-trash-o" ></i></button>
                            {{-- Confirm Delete --}}
                            <div class="modal fade" id="modal-delete-{{$d->id}}" tabIndex="-1">
                                <div class="modal-dialog">
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
                                                Bạn có chắc chắn xóa {{$d->ma_hh}} {{$d->ten_hang_hoa}}?
                                            </p>
                                        </div>
                                        <div class="modal-footer">

                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Đóng</button>
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-times-circle"></i> Đồng ý
                                                </button>

                                        </div>
                              </div>
                                </div>
                            </div>
                            <!-- <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button> -->

                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                    {!! $data->links() !!}
              </section>