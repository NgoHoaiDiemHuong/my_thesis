@extends('layouts.masterEmp')
@section('title', 'Chính sách giá')
@section('content')
<div class="row">
    <div class="col-sm-9">
        <h3><i class="fa fa-angle-right"></i> Chính sách giá</h3>
    </div>
    <div class="" style="margin-top: 20px; margin-right: 15px;">
        <!-- <div class="form-group">
            <input style="float: right;"type="text" class="form-control" placeholder="Search">
        </div> -->

            <a href="{{route('product.exp')}}" title="" style="float: right;"><button  style="margin-bottom: 10px" type="" class="w3-btn w3-blue"><i class="fa fa-plus" ></i> Export</button>
            </a>
    </div>


    </div>
    <div class="row mt">

    <div class="col-lg-12">
        <div class="content-panel">
            <!-- <h4><i class="fa fa-angle-right"></i> cac nut</h4> -->


            <section id="no-more-tables">
                <table id='DBtableJQuery'class="table table-bordered table-striped table-condensed cf">
                    <thead class="cf">
                      <tr>
                        <th ># Mã hàng hóa</th>
                        <th >Tên hàng hóa</th>
                        <th >Giá nhập cuối (đồng)</th>
                        <th >Giá bán (đồng)</th>
                        <th ></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $d)
                      <tr>
                        <td data-title="# Mã hàng hóa">{{$d->ma_hh}}</td>
                        <td data-title="Tên hàng hóa">
                            <a href="" title="" data-toggle="modal" data-target="#modal-info-{{$d->id}}">{{$d->ten_hang_hoa}}</a>
                            @include('models.detailNCC')
                        </td>
                        <td class="numeric" data-title="Giá nhập cuối (đồng)">{{App\hanghoa::gia_nhap_cuoi($d->ma_hh)}}</td>
                        <td class="numeric" data-title="Giá bán (đồng)">{{App\hanghoa::gia_ban_cuoi($d->ma_hh)}}</td>
                        <!-- <td class="numeric" data-title="Bán online">
                            <span class="label label-info label-mini">Có</span>
                        </td> -->

                        <td class="numeric" data-title="tool">
                            <!-- Thay doi gia ban -->
                            <button class="w3-btn w3-blue btn-xs" data-toggle="modal" data-target="#modal-edit-{{$d->id}}">
                                <i class="fa fa-pencil"></i>
                            </button>
                            <!-- model cap nhat gia -->
                            @include('prices.editModel')
                            <!-- END MODEL CAP NHAT GIA -->
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>

              </section>
          </div><!-- /content-panel -->
      </div><!-- /col-lg-12 -->
</div><!-- /row -->
@endsection
@section('js')
<!-- ajax js for add price  -->
<script type="text/javascript" >
// // $(document).ready(function(){
// //     $("#update-form").submit(function(event){
// //         event.preventDefault();
// //         var data =$('#update-form').serialize();
// //         console.log(data);
// //         $.ajax({
// //             type: "POST",
// //             url: "{{route('emp.price.store')}}",
// //             data: data,
// //             dataType: 'json',
// //             success: function(data){
// //                 console.log('ss'+ data);
// //                 alert('ss'+ data);
// //             },
// //             error: function (data) {
// //                 console.log('Error:'+ data);
// //                  alert('Error'+data);
// //             }
// //         });
// //     });

// });
</script>
@include('partials.DBtableJQuery')

@endsection
