<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{url('assets/css/bootstrap.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{url('assets/fonts/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/zabuto_calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/js/gritter/css/jquery.gritter.css')}}" />


    <link rel="stylesheet" type="text/css" href="{{url('assets/lineicons/style.css')}}">
    <link href="{{url('css/w3.css')}}" rel="stylesheet" type="text/css" media="all" />
    <!-- Style  -->
    <link href="{{url('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/style-responsive.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/table-responsive.css')}}" rel="stylesheet">
     <link href="{{url('assets/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" media="screen">
      <link rel="stylesheet" href="{{url('assets/css/bootstrap-select.css')}}">
      <link rel="stylesheet" href="{{url('assets/css/dataTables.bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{url('assets/css/dataTables.bootstrap.css')}}">
      <link rel="stylesheet" href="{{url('css/AnimatedCheckboxes.css')}}">


    @yield('css')

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>G7 Mart</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    <li class="dropdown">

                    </li>
                    <!-- settings end -->
                    <!-- inbox dropdown start-->

                    <!-- inbox dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="{{route('emp.getLogOut')}}">Logout</a></li>
                </ul>
            </div>
        </header>
      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

                  <p class="centered"><a href="profile.html"><img src="{{url('assets/img/ui-sam.png')}}" class="img-circle" width="60"></a></p>
                    <h5 class="centered">{{Session::get('user.nnv')[0]}}</h5>

                  <li class="mt">
                      <a class="active" href="{{url('/emp')}}">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <?php $quyen_nv = Session::get('users')->quyens;?>
                <?php $nhomquyen = DB::select('select DISTINCT d.ma_nq ,d.icon, d.code_nq from QUYENNHANVIEN as B, QUYEN as c, NHOMQUYEN as d where B.ma_nv = "'.Session::get('users')->ma_nv.'" AND b.ma_quyen = c.ma_quyen and c.ma_nq = d.ma_nq' );?>
                  @foreach($nhomquyen as $nq)
                    <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="{{$nq->icon}}"></i>
                          <span>{{$nq->code_nq}}</span>
                      </a>
                      <ul class="sub">
                          <?php   $quyens =App\Quyen::where('ma_nq',$nq->ma_nq)->get();?>
                        @foreach($quyens as $q)
                            @foreach($quyen_nv as $qnv)
                                @if($qnv->ma_quyen == $q->ma_quyen)
                                     @if(!empty($q->route) && $q->code_quyen != 'edit')
                                      <li>
                                      <a  href="{{route($q->route)}}">{{$q->ten_quyen}}</a></li>
                                    @endif
                                 @endif

                            @endforeach

                        @endforeach

                      </ul>
                  </li>
                   @endforeach
                 </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            <div class="flashMs" style="position: relative;">
            @include('flashMs.flashMs')
            </div>
            @yield('content')

      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->



          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2016 - Ngo Hoai Diem Huong
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{url('assets/js/jquery.js')}}"></script>
    <script src="{{url('assets/js/jquery-1.8.3.min.js')}}"></script>
    <script src="{{url('assets/js/bootstrap.min.js')}}"></script>
    <script class="include" type="text/javascript" src="{{url('assets/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js" type="text/javascript" charset="utf-8" async defer></script> -->
    <script src="{{url('assets/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{url('assets/js/jquery.nicescroll.js')}}" type="text/javascript"></script>



    <!--common script for all pages-->
    <script src="{{url('assets/js/common-scripts.js')}}"></script>

    <script type="text/javascript" src="{{url('assets/js/gritter/js/jquery.gritter.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/js/gritter-conf.js')}}"></script>

    script for this page
    <script src="{{url('assets/js/sparkline-chart.js')}}"></script>
    <script src="{{url('assets/js/zabuto_calendar.js')}}"></script>
    <script src="{{url('assets/js/chart-master/Chart.js')}}"></script>

    <script src="{{url('assets/js/bootstrap-switch.js')}}"></script>
    <script src="{{url('assets/js/knockout.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/js/bootstrap-datetimepicker.js')}}" charset="UTF-8"></script>
<script type="text/javascript" src="{{url('assets/js/locales/bootstrap-datetimepicker.vn.js')}}" charset="UTF-8"></script>
<script src="{{url('assets/js/bootstrap-select.js')}}"></script>

<!-- scrip fo jquery dattatable -->


<!-- end scrip fo jquery dattatable -->
    <script src="{{url('assets/js/df.js')}}"></script>
    <!-- set time limit for flash mages -->
    <script>
        $('div.flashMs').fadeIn('slow');
        setTimeout(function() {
            $('div.flashMs').fadeOut('slow');
        }, 3000);
    </script>
    @yield('js')
  </body>
</html>
