<!DOCTYPE HTML>
<html>
<head>
    <title>@yield('title') - G7Mart</title>
    <link href="{{asset('css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
    <!-- jQuery (necessary JavaScript plugins) -->
    <script type='text/javascript' src="{{url('js/jquery-1.11.1.min.js')}}"></script>

    <!-- Custom Theme files -->
    <link href="{{asset('css/style.css')}}" rel='stylesheet' type='text/css' />
      <link href="{{asset('assets/css/table-responsive.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap.css')}}">
    <!-- Custom Theme files -->
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
    </script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>

     <link href="{{url('/assets/fonts/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- start menu -->
    <link href="{{url('css/megamenu.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{url('css/w3.css')}}" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="{{url('js/megamenu.js')}}"></script>
    <script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
    <script src="{{url('js/menu_jquery.js')}}"></script>
    <script src="{{url('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('assets/js/dataTables.bootstrap.min.js')}}"></script>

    <!-- url('js/simpleCart.min.js') -->
    <script src="{{url('js/df.js')}}"> </script>

</head>
<body>
<!-- header_top -->
<div class="top_bg">
    <div class="container">
        <div class="header_top">
            <div class="top_right">
                <ul>
                    <li><a href="{{url('/')}}">Trang chủ</a></li>|
                    <li><a href="{{route('cart.index')}}">Giỏ hàng({{ Cart::instance('main')->count(false) }})</a></li>|
                    @if(Session::has('khach_hang'))
                    <li><a href="{{route('cus.getRegis')}}">Xin chào {{Session::get('khach_hang')->ten_kh}}!</a></li>|

                    <li><a href="{{route('his.check')}}">Lịch sử mua hàng</a></li>|
                    <li><a href="{{route('cus.getLogOut')}}">Thoát </a></li>
                    @else
                    <li><a href="{{route('cus.getLogIn')}}">Đăng nhập</a></li>|
                    <li><a href="{{route('cus.getRegis')}}">Đăng ký</a></li>
                    @endif
                </ul>
            </div>
            <div class="top_left">
                <h2><span></span> Gọi cho chúng tôi : 032 2352 782</h2>
            </div>
                <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- header -->
<div class="header_bg">
@include('flashMs.flashMs')
<div class="container">
    <div class="header">
    <div class="head-t row">
        <div class=" col-sm-12 col-md-3 col-lg-4">
            <a href="#"><img src="{{asset('images/logo.png')}}" class="img-responsive" alt="" width="200px" /> </a>
        </div>
        <!-- start header_right -->
        <div class="col-sm-12 col-md-9 col-lg-8">
            @yield('cart-search')
        </div>


        <!-- <div class="clearfix"> </div> -->
        </div>
        <!-- <div class="clearfix"> </div> -->
    </div>
        <!-- start header menu -->
        @yield('menu')

    </div>
</div>
</div>
    <div class="container">
        <div class="content">
        @yield('content')
        </div>
    </div>
<script src="{{url('assets/js/knockout.js')}}"></script>
<script src="{{url('assets/js/df.js')}}"></script>
<script type="text/javascript" charset="utf-8" async defer>
    /*search funtion*/
        var timer;
        function up(){
            $("#col-2").css('opacity','0.5');
            timer=setTimeout(function(){
                var keywords=$("#search").val();
                if(keywords.length>0){

                    $.post(
                        "{{route('search.cus.hh')}}",
                        {keywords:keywords},
                        function(markup){
                        $("#content").fadeOut();
                        $("#search-results").html(markup).fadeIn("slow");
                        console.log(markup);
                        }
                    );
                }
                if(keywords.length==0){
                    $("#search-results").fadeOut("fast");
                    $("#content").fadeIn();

                }


            },200);
        };
        function down(){
            clearTimeout(timer);
        };
        function out(){
            $("#search-results").fadeOut("slow");
            $("#content").fadeIn();

        };
        function clearInputField (){
            $("#search").val('');
            $("#search-results").fadeOut("slow");
             $("#content").fadeIn();
        };

    /*end-search function*/
</script>

<script>
$(document).ready(function() {
    $("a#add-cart").click(function(e){
        e.preventDefault();
        $.ajax({url: $(this).attr('href'), success: function(result){
            // $("#content").fadeOut();
            // $("#search-results").html(result).fadeIn("slow");
            // $("div.btn-cart").fadeIn();
            $('#btn-cart').load(document.URL +  ' #btn-cart');
            console.log(result);
        }});
        e.preventDefault();
    });
});
</script>
<script>
    $(document).ready(function() {
        // var click=0;
        var url= "{{route('cart.hover')}}";
        $("#btn-cart").hover(
            function(){
                $.ajax({url: url, success: function(result){
                    // $("#content").fadeOut();
                    // $("#search-results").html(result).fadeIn();
                    // $("div.btn-cart").fadeIn();
                    $('#div-cart').html(result).fadeIn();
                    console.log(result);
                }});

            },
            function(){
                $('#div-cart').fadeOut();
            });
        });
            //
        // $('#btn-cart').click(function(){
        //     $.ajax({
        //         url:url,
        //         success: function(result){
        //             $('#div-cart').html(result).fadeToggle("fast");
        //         }
        //     });
        // });
// });
</script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
@include('partials.footer')

@yield('js')
</body>
</html>