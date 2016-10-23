<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Đăng nhập Hệ thống quản lý siêu thị </title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
    <!--external css-->

    <link href="{{url('assets/fonts/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />

    <!-- Custom styles for this template -->
   <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style-responsive.css')}}" rel="stylesheet">
    <link href="{{asset('css/w3.css')}}" rel="stylesheet" type="text/css" media="all" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <div class="row" style="z-index: 999;">
        <div class="col-sm-12 col-md-6 col-lg-6 ">

            <div style="margin-top:30%;margin-left:20%; background-color: rgba(189, 195, 199,0.5); padding-bottom: 10px;" class=" w3-container w3-text-pink w3-round-large" >
            <!-- <div class="w3-container w3-pale-green w3-bottombar w3-border-green w3-border"> -->

              <h1 style="font-size: 200%;font-weight: 600; color: #333333;text-transform: uppercase;" >Hệ thống quản lý </h1>
              <h2 style="font-size: 150%;font-weight: 600; color: #333333;text-transform: uppercase;" >siêu thị minni KTX-B ĐHCT G7Mart</h2>
              <p style="color: #333333; font-size: 120%;">Đây là trang đăng nhập vào hệ thống dành cho nhân viên!</p>
              <button class="w3-btn w3-xlarge w3-red w3-border w3-border-red w3-round-large" style="">Đăng nhập <i class="fa fa-arrow-right" aria-hidden="true"></i> </button>
              <br>
            </div>
      </div>

        <div class="col-sm-12 col-md-6 col-lg-6 ">
      <div id="">
        <div class="">
              <form class="form-login" action="{{route('emp.postLogin')}}" method="post">
                <h2 class="form-login-heading">Nhân viên đăng nhập</h2>
                <div class="login-wrap">
                    <div  class="{{ $errors->has('sdt') ? ' has-error' : '' }}">
                        <label class="w3-label">Số điện thoại</label>
                        <input type="text"class="w3-input  w3-animate-input" style="width: 90%" name="sdt" placeholder="Nhập số điện thoại..." autofocus  value="{{ old('sdt') }}">
                        <br>
                        @if($errors->has('sdt'))
                            <span class="help-block">
                                <strong>
                                {{ $errors->first('sdt') }}
                                </strong>
                            </span>
                        @endif
                        @if(Session::has('sdt.null'))
                            <span class="help-block errors">
                                <strong>
                                {{ Session::get('sdt.null')}}
                                </strong>
                            </span>
                        @endif
                    </div>
                    <div class="{{ $errors->has('mat_khau') ? ' has-error' : '' }}">
                        <label class="w3-label">Mật khẩu</label>
                        <input type="password" class="w3-input  w3-animate-input" style="width: 90%" name="mat_khau"placeholder="Nhập password..."  value="{{ old('mat_khau') }}">
                        @if($errors->has('mat_khau'))
                            <span class="help-block">
                                <strong>
                                {{ $errors->first('mat_khau') }}
                                </strong>
                            </span>
                        @endif
                        @if(Session::has('mat_khau.incorect'))
                            <span class="help-block errors">
                                <strong>
                                {{Session::get('mat_khau.incorect')}}
                                </strong>
                            </span>
                        @endif
                    </div>
                    <br>
                    <br>
                    <br>
                   <!--  <label class="w3-label">Số điện thoại</label>
                    <input class="w3-input  w3-animate-input" style="width: 90%" type="text">

                    <label class="w3-label">Mật khẩu</label>
                    <input class="w3-input  w3-animate-input" style="width: 90%"type="password" >
                    <br> -->
                    <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> Submit</button>



                </div>

              </form>

        </div>
        </div>

        </div>
        </div>
        <!-- end row -->
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{url('assets/js/jquery.js')}}"></script>
    <script src="{{url('assets/js/bootstrap.min.js')}}"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script src="{{asset('assets/js/jquery.sparkline.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/js/jquery.backstretch.min.js')}}"></script>
    <script>
        $.backstretch("{{asset('assets/img/bg_login2.jpg')}}", {speed: 500});
    </script>


  </body>
</html>
