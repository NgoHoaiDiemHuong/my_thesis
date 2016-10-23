@extends('layouts.masterEmp')
@section('title','Báo cáo doanh thu bán hàng')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/https___www.gstatic.com_charts_44_css_util_util.css is not available.css')}}">
@endsection
@section('content')
<div class="row">
<h2>Báo cáo doanh thu hàng hóa</h2>
<hr>
</div>
<div class="row">
    <div class=" col-sm-12 col-md-4 col-lg-3 "  >
        <!-- section ben phai -->
        <div class="w3-container w3-blue">
            <h5>Báo cáo theo</h5>
        </div>

        <div class="w3-container" style="background-color: #fbfcfc;">
            <p>
            <input id="all" type="radio" checked name="doanhthu" class="w3-radio" type="text" value="all">
            <label class="w3-validate" >Tất cả</label>
            </p>
            <p>
            <input id="doanhthu_homnay"type="radio"  name="doanhthu" class="w3-radio" type="text" value="hom_nay">
            <label class="w3-validate" >Hôm nay</label>
            </p>

            <p>
            <input id="doanhthu_homqua" type="radio" name="doanhthu"  class="w3-radio" type="text" value="hom_qua">
            <label class="w3-validate">Hôm qua</label>
            </p>

            <p>
            <input id="doanh_thangnay" type="radio" name="doanhthu"  class="w3-radio" type="text" value="thang_nay">
            <label class="w3-validate">Tháng này</label>
           </p>
            <p>
            <input id="doanh_thangnay" type="radio" name="doanhthu"  class="w3-radio" type="text" value="nam_nay">
            <label class="w3-validate">Năm này</label>
           </p>
            <p>
            <input id="doanh_quynay" type="radio" name="doanhthu"  class="w3-radio" type="text" value="quy_nay">
            <label class="w3-validate">Quý này</label>
           </p>
           <p>
            <input id="doanh_theothang" type="radio" name="doanhthu"  class="w3-radio" type="text" value="theo_thang">
            <label class="w3-validate">Theo tháng</label>
           </p>
           <p>
            <input id="doanh_theoquy" type="radio" name="doanhthu"  class="w3-radio" type="text" value="theo_quy">
            <label class="w3-validate">Theo quý</label>
           </p>
           <p>
            <input id="doanh_theonam" type="radio" name="doanhthu"  class="w3-radio" type="text" value="theo_nam">
            <label class="w3-validate">Theo năm</label>
           </p>


        </div>
    </div>
    <div class="col-sm-12 col-md-8 col-lg-9">
        <!-- section bieu do -->
        <div id="char1" style="width: 100%; ">

        </div>
        <div id="char2" style="width: 100%; ">

        </div>
        <div id="char3" style="width: 100%; ">

        </div>
        <div id="char4" style="width: 100%; ">

        </div>
        <div id="char5" style="width: 100%; ">

        </div>
        <div id="char6" style="width: 100%; height: 1000px; ">

        </div>
        <div id="char7" style="width: 100%; ">

        </div>
        <div id="char8" style="width: 100%; ">

        </div>
    </div>
</div>
@endsection
@section('js')
 <script type="text/javascript" src="{{url('assets/js/loader.js')}}"></script>


<script charset="utf-8">
$(document).ready(function() {

            google.charts.load("current", {packages:['corechart']});
            google.charts.setOnLoadCallback(drawChart1);
            google.charts.setOnLoadCallback(drawChart2);
            google.charts.setOnLoadCallback(drawChart3);
            google.charts.setOnLoadCallback(drawChart4);
            google.charts.setOnLoadCallback(drawChart5);
            google.charts.setOnLoadCallback(drawChart6);
            google.charts.setOnLoadCallback(drawChart7);
            google.charts.setOnLoadCallback(drawChart8);


            var jsonData1 = $.ajax({
            url: "{{route('rep.doanhthu.ajax')}}",
            data:{doanhthu:'hom_nay'},
            type:"POST",
            dataType:"json",
            async: false
             }).responseText;
            function drawChart1() {
                var data = new google.visualization.DataTable(jsonData1);
                var view = new google.visualization.DataView(data);
                var options = {
                    title: "Báo cáo tài chính hôm nay",

                    bar: {groupWidth: "100%"},
                    legend: { position: "none" },
                };
                var chart = new google.visualization.ColumnChart(document.getElementById("char1"));
                chart.draw(view, options);
            }

            var jsonData2 = $.ajax({
            url: "{{route('rep.doanhthu.ajax')}}",
            data:{doanhthu:'hom_qua'},
            type:"POST",
            dataType:"json",
            async: false
             }).responseText;

            function drawChart2() {
                var data = new google.visualization.DataTable(jsonData2);
                var view = new google.visualization.DataView(data);
                var options = {
                    title: "Báo cáo tài chính hôm qua",


                    bar: {groupWidth: "100%"},
                    legend: { position: "none" },
                };
                var chart = new google.visualization.ColumnChart(document.getElementById("char2"));
                chart.draw(view, options);
            }


            var jsonData3 = $.ajax({
            url: "{{route('rep.doanhthu.ajax')}}",
            data:{doanhthu:'thang_nay'},
            type:"POST",
            dataType:"json",
            async: false
             }).responseText;
            function drawChart3() {
                var data = new google.visualization.DataTable(jsonData3);
                var view = new google.visualization.DataView(data);
                var options = {
                    title: "Báo cáo tài chính tháng này",


                    bar: {groupWidth: "100%"},
                    legend: { position: "none" },
                };
                var chart = new google.visualization.ColumnChart(document.getElementById("char3"));
                chart.draw(view, options);
            }

            var jsonData4 = $.ajax({
            url: "{{route('rep.doanhthu.ajax')}}",
            data:{doanhthu:'nam_nay'},
            type:"POST",
            dataType:"json",
            async: false
             }).responseText;

            function drawChart4() {
                var data = new google.visualization.DataTable(jsonData4);
                var view = new google.visualization.DataView(data);
                var options = {
                    title: "Báo cáo tài chính năm nay",


                    bar: {groupWidth: "100%"},
                    legend: { position: "none" },
                };
                var chart = new google.visualization.ColumnChart(document.getElementById("char4"));
                chart.draw(view, options);
            }
            /*bao cao tai chinh quy nay*/
            var jsonData5 = $.ajax({
            url: "{{route('rep.doanhthu.ajax')}}",
            data:{doanhthu:'quy_nay'},
            type:"POST",
            dataType:"json",
            async: false
             }).responseText;

            function drawChart5() {
                var data = new google.visualization.DataTable(jsonData5);
                var view = new google.visualization.DataView(data);
                var options = {
                    title: "Báo cáo tài chính Quý này",


                    bar: {groupWidth: "100%"},
                    legend: { position: "none" },
                };
                var chart = new google.visualization.ColumnChart(document.getElementById("char5"));
                chart.draw(view, options);
            }
            /*end bao cao tai chinh quy nay*/
            /*bao cao tai chinh theo thang*/
            var jsonData6 = $.ajax({
            url: "{{route('rep.doanhthu.ajax')}}",
            data:{doanhthu:'theo_thang'},
            type:"POST",
            dataType:"json",
            async: false
             }).responseText;

            function drawChart6() {
                var data = new google.visualization.DataTable(jsonData6);
                var view = new google.visualization.DataView(data);
                var options = {
                    title: "Báo cáo tài chính theo từng tháng",


                    bar: {groupWidth: "100%"},
                    legend: { position: "none" },
                };
                var chart = new google.visualization.BarChart(document.getElementById("char6"));
                chart.draw(view, options);
            }
            /*end bao cao tai chinh theo thang*/
            /*bao cao tai chinh theo quý*/
            var jsonData7 = $.ajax({
            url: "{{route('rep.doanhthu.ajax')}}",
            data:{doanhthu:'theo_quy'},
            type:"POST",
            dataType:"json",
            async: false
             }).responseText;

            function drawChart7() {
                var data = new google.visualization.DataTable(jsonData7);
                var view = new google.visualization.DataView(data);
                var options = {
                    title: "Báo cáo tài chính theo từng quý",
                    width: '100%',
                    height: '100%',

                    bar: {groupWidth: "100%"},
                    legend: { position: "none" },
                };
                var chart = new google.visualization.BarChart(document.getElementById("char7"));
                chart.draw(view, options);
            }
            /*end bao cao tai chinh theo quý*/
            /*bao cao tai chinh theo nam*/
            var jsonData8 = $.ajax({
            url: "{{route('rep.doanhthu.ajax')}}",
            data:{doanhthu:'theo_nam'},
            type:"POST",
            dataType:"json",
            async: false
             }).responseText;
            console.log(jsonData8);
            function drawChart8() {
                var data = new google.visualization.DataTable(jsonData8);
                var view = new google.visualization.DataView(data);
                var options = {
                    title: "Báo cáo tài chính theo từng năm",

                    width: '100%',
                    height: '100%',

                    bar: {groupWidth: "100%"},
                    legend: { position: "none" },
                };
                var chart = new google.visualization.BarChart(document.getElementById("char8"));
                chart.draw(view, options);
            }
            /*end bao cao tai chinh theo nam*/
            $('div#char1').fadeIn();
            // $('div#char2').hide();
            // $('div#char3').hide();
            // $('div#char4').hide();
            // $('div#char5').hide();
            // $('div#char6').hide();
            // $('div#char7').hide();
            // $('div#char8').hide();
    $(window).resize(function(){
      drawChart1();
      drawChart2();
      drawChart3();
      drawChart4();
      drawChart5();
      drawChart6();
      drawChart7();
      drawChart8();
    });

    $('input[type=radio][name=doanhthu]').change(function() {
        if (this.value == 'hom_nay') {
             // drawChart1();
            $('div#char2').hide();
            $('div#char3').hide();
            $('div#char4').hide();
            $('div#char5').hide();
            $('div#char6').hide();
            $('div#char7').hide();
            $('div#char8').hide();
            // drawChart1();
            $('div#char1').hide();
            $('div#char1').fadeToggle();
        }
        else if (this.value == 'hom_qua') {
             // drawChart2();
            $('div#char1').hide();
            $('div#char3').hide();
            $('div#char4').hide();
            $('div#char5').hide();
            $('div#char6').hide();
            $('div#char7').hide();
            $('div#char8').hide();

            $('div#char2').hide();
            $('div#char2').fadeToggle();
        }else if(this.value == 'thang_nay'){
             // drawChart3();
            $('div#char1').hide();
            $('div#char2').hide();
            $('div#char4').hide();
            $('div#char5').hide();
            $('div#char6').hide();
            $('div#char7').hide();
            $('div#char8').hide();

            $('div#char3').hide('slow');
            $('div#char3').fadeToggle('slow');
        }else if(this.value == 'nam_nay'){
             // drawChart3();
            $('div#char1').hide();
            $('div#char2').hide();
            $('div#char3').hide();
            $('div#char5').hide();
            $('div#char6').hide();
            $('div#char7').hide();
            $('div#char8').hide();
            $('div#char4').hide('slow');
            $('div#char4').fadeToggle('slow');
        }else if(this.value == 'quy_nay'){
             // drawChart3();
            $('div#char1').hide();
            $('div#char2').hide();
            $('div#char4').hide();
            $('div#char3').hide();
            $('div#char6').hide();
            $('div#char7').hide();
            $('div#char8').hide();
            $('div#char5').hide('slow');
            $('div#char5').fadeToggle('slow');
        }else if(this.value == 'theo_thang'){
             // drawChart3();
            $('div#char1').hide();
            $('div#char2').hide();
            $('div#char3').hide();
            $('div#char4').hide();
            $('div#char5').hide();
            $('div#char7').hide();
            $('div#char8').hide();
            $('div#char6').hide('slow');
            $('div#char6').fadeToggle('slow');
        }else if(this.value == 'theo_quy'){
             // drawChart3();
            $('div#char1').hide();
            $('div#char2').hide();
            $('div#char3').hide();
            $('div#char4').hide();
            $('div#char5').hide();
            $('div#char6').hide();
            $('div#char8').hide();
            $('div#char7').hide('slow');
            $('div#char7').fadeToggle('slow');
        }else if(this.value == 'theo_nam'){
             // drawChart3();
            $('div#char1').hide();
            $('div#char2').hide();
            $('div#char3').hide();
            $('div#char4').hide();
            $('div#char5').hide();
            $('div#char6').hide();
            $('div#char7').hide();

            $('div#char8').fadeToggle('slow');
        }else if(this.value == 'all'){
             // drawChart3();
            $('div#char1').hide('slow');
            $('div#char2').hide('slow');
            $('div#char3').hide('slow');
            $('div#char4').hide('slow');
            $('div#char5').hide('slow');
            $('div#char6').hide('slow');
            $('div#char7').hide('slow');
            $('div#char8').hide('slow');$
            ('div#char1').fadeToggle('slow');
            $('div#char2').fadeToggle('slow');
            $('div#char3').fadeToggle('slow');
            $('div#char4').fadeToggle('slow');
            $('div#char5').fadeToggle('slow');
            $('div#char6').fadeToggle('slow');
            $('div#char7').fadeToggle('slow');
            $('div#char8').fadeToggle('slow');
        }

    });
});
</script>
@endsection