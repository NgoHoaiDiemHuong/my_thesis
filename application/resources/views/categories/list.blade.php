@extends('layouts.masterEmp')

@section('title','QL -hàng hóa- danh mục')

@section('content')
 <div class="row">
<div class="col-sm-9">
    <h3><i class="fa fa-angle-right"></i> Danh sách danh mục</h3>
</div>
<div class="" style="margin-top: 20px;">


        <a href="#" title="" style="float: right;padding-right: 15px;"><button  type="" class="w3-btn w3-blue" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus" ></i> Thêm danh mục</button>
        </a>
        @include('categories.add')
</div>


</div>
<div class="row-mt">
<div class="col-lg-12">
<?php $stt=0; ?>
@foreach($data as $dt)
    <?php $stt=$stt+1; if($stt%4==0)echo "<div class='row'>"; ?>
    <div class="col-md-6 col-lg-4" style="margin-bottom: 20px;">
    <div class="content-panel">
        <section class="task-panel tasks-widget">
            <div class="panel-heading">
                <div class="pull-left"><h5><i class="fa fa-tasks"></i> {{$dt->ma_dm}}-{{$dt->ten_dm}}</h5></div>
                <?php $dmcon=App\DanhMuc::where('ma_dm_cha',$dt->ma_dm)->get(); ?>
                <div class="pull-right"><button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-edit-{{$dt->id}}"><i class="fa fa-pencil"></i></button></div>
                @include('categories.edit')
                <br>

            </div>


            <div class="panel-body">

                <div class="task-content">
                        <ul class="task-list">
                            @if(!empty($dmcon))
                            @foreach($dmcon as $d)
                            <hr style="border-color: #bdc3c7;">
                              <li>
                                  <div class="task-title">
                                      <span class="task-title-sp">{{$d->ma_dm}}-{{$d->ten_dm}}</span>

                                      <div class="pull-right hidden-phone">
                                          <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-edit-{{$d->id}}"><i class="fa fa-pencil"></i></button>

                                      </div>
                                       @include('categories.edit')
                                  </div>
                              </li>
                            @endforeach
                            @endif
                        </ul>
                    </div>

                              <div class=" add-task-row">
                              <hr style="border-color: #bdc3c7;">

                                  <a class="btn btn-success btn-sm pull-left" href="#" data-toggle="modal" data-target="#modal-add-{{$dt->id}}" >Thêm danh mục mới</a>
                                  <!-- <a class="btn btn-default btn-sm pull-right" href="todo_list.html#">See All Tasks</a> -->
                                @include('categories.add')
                              </div>

                </div>
        </section>
        </div>
    </div>
     <?php $stt++; if($stt%3==0)echo "</div>"; ?>
 @endforeach
</div>
</div><!-- /row -->
@endsection
@section('js')
@include('partials.DBtableJQuery')
@endsection