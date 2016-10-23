@extends('layouts.masterEmp')
@section('title',"Dashboard-G7Mart")
@section('content')
<div class="col-lg-9 main-chart">
</div><!-- /col-lg-9 END SECTION MIDDLE -->
<div class="col-lg-3 ds">
    <!--COMPLETED ACTIONS DONUTS CHART-->
    <h3>Nhật ký hệ thống</h3>
  <!-- First Action -->
  <div class="desc">
    <div class="thumb">
        <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
    </div>
    <div class="details">
        <p><muted>2 Phút</muted><br/>
           <a href="#">Roote</a> mới thêm phiếu nhập hàng.<br/>
        </p>
    </div>
  </div>

   <!-- USERS ONLINE SECTION -->
    <h3>Top Nhân viên</h3>
  <!-- First Member -->
  <?php
  $users = App\NhanVien::all();
   ?>
   @foreach($users as $u)
    <div class="desc">
        <div class="thumb">
            <img class="img-circle" src="assets/img/ui-divya.jpg" width="35px" height="35px" align="">
        </div>
        <div class="details">

            <p><a href="#">{{$u->ten_nv}}</a><br/>
               <muted>{{$u->nhomnguoidung->ten_nnd}}</muted>
            </p>
        </div>
    </div>
   @endforeach

<!-- CALENDAR-->
<!-- <div id="calendar" class="mb">
    <div class="panel green-panel no-margin">
        <div class="panel-body">
            <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                <div class="arrow"></div>
                <h3 class="popover-title" style="disadding: none;"></h3>
                <div id="date-popover-content" class="popover-content"></div>
            </div>
            <div id="my-calendar"></div>
        </div>
    </div>
</div> --><!-- / calendar -->

</div><!-- /col-lg-3 -->
@endsection
@section('js')
<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });

            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });


        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
    </script>
@endsection