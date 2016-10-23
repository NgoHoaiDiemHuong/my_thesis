@extends('layouts.masterEmp')
@section('title','Thống kê hàng tồn')
@section('content')

<?php
$data = $data;
 ?>
<div class="row">
<h2>Báo cáo thống kê hàng tồn</h2>
<hr>
</div>
<div class="row">
    <div class=" col-sm-12 col-md-4 col-lg-3 "  >
        <!-- section ben phai -->
        <div class="w3-container w3-blue">
            <h5>Lọc theo hàng tồn</h5>
        </div>

        <div class="w3-container" style="background-color: #fbfcfc;">
            <p>
            <input class="w3-radio" type="radio" checked="checked" name="hangton" value"all">
            <label class="w3-validate">Tất cả</label>
            </p>
            <p>
            <input class="w3-radio" type="radio" name="hangton" value"yes">
            <label class="w3-validate">Còn hàng tồn</label>
            </p>
            <p>
            <input class="w3-radio" type="radio" name="hangton" value"no">
            <label class="w3-validate">Không còn hàng tồn</label>
            </p>
        </div>
        <div class="w3-container w3-blue">
            <h5>Lọc theo danh mục</h5>
        </div>
         <div class="w3-container" style="background-color: #fbfcfc;">
        <?php
        $dm = App\DanhMuc::select('ten_dm','ma_dm')->get();
         ?>
         <br>
        @foreach($dm as $d)
            <a href="" title="" style="width: 100%; display: block; text-align: left;" class="w3-btn w3-white  w3-hover-blue-grey" >{{$d->ten_dm}}</a>
        @endforeach
        <br>
        </div>
        <div class="w3-container w3-blue">
            <h5>Lọc theo trạng thái kinh doanh</h5>
        </div>
         <div class="w3-container" style="background-color: #fbfcfc;">
            <p>
            <input class="w3-radio" type="radio" checked="checked" name="kinhdoanh" value="all">
            <label class="w3-validate" name="kinhdoanh">Tất cả</label>
            </p>
            <p>
            <input class="w3-radio" type="radio" name="kinhdoanh" value="on">
            <label class="w3-validate">Ngừng kinh doanh</label>
            </p>
            <p>
            <input class="w3-radio" type="radio" name="kinhdoanh" value="off">
            <label class="w3-validate">Đang kinh doanh</label>
            </p>
        </div>
    </div>
    <div class="col-sm-12 col-md-8 col-lg-9">
        <!-- section bieu do -->
        <div id="rep" style="width: 100%; ">
            <section id="no-more-tables">
                <table id="DBtableJQuery" class="table table-bordered table-striped table-condensed cf">
                    <thead class="cf">
                      <tr>
                        <th ># Mã hàng hóa</th>
                        <th >Tên hàng hóa</th>
                        <th >Danh mục</th>

                        <th >Số lượng</th>
                        <th >Đơn vị tính</th>
                        <th >Trạng thái</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $d)
                      <tr class="<?php
                      if($d->so_luong<0||is_null($d->so_luong)===true)echo 'danger';
                      if($d->so_luong>0&&$d->so_luong<50) echo "warning";
                      ?>">
                        <td data-title="# Mã hàng hóa">{{$d->ma_hh}}</td>
                        <td data-title="Tên hàng hóa">
                            <a  data-toggle="modal" data-target="#modal-info-{{$d->id}}" title="">{{$d->ten_hang_hoa}}</a>

                        </td>
                        <td data-title="Danh mục">
                            <a  data-toggle="modal" data-target="#modal-info-{{$d->id}}" title="">{{$d->danhmuc->ten_dm}}</a>

                        </td>


                       <!--  <td class="numeric" data-title="Bán online">
                            <span class="label label-info label-mini">Có</span>
                        </td> -->
                        <td class="numeric" data-title="Số lượng">
                        @if($d->so_luong<0||is_null($d->so_luong)===true)
                        0
                        @else
                        {{$d->so_luong}}
                        @endif
                        </td>
                         <td class="numeric" data-title="Đơn vị tính">{{$d->don_vi_tinh}}</td>

                        <td class="numeric" data-title="Trạng thái">
                         @if($d->so_luong<=0||is_null($d->so_luong)===true)
                        <span class="label label-danger">Hết hàng</span>
                        @elseif($d->so_luong>0&&$d->so_luong<50)
                        <span class="label label-warning">Sắp hết hàng</span>
                        @endif

                      </tr>
                    @endforeach
                    </tbody>
                  </table>
              </section>
              </div> <!-- vung chua du lieu -->
        </div>

    </div>
</div>
@endsection
@section('js')
@include('partials.DBtableJQuery')
@endsection