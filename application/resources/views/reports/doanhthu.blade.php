
 <script src="{{asset('assets/js/GGloade.js')}}"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    // var jsonData = $.ajax({
    //       url: "getData.php",
    //       dataType:"json",
    //       async: false
    //       }).responseText;
    function drawChart() {
    var data = new google.visualization.DataTable({!!$data!!});


      var view = new google.visualization.DataView(data);
      // view.setColumns([0, 1,
      //                  { calc: "stringify",
      //                    sourceColumn: 1,
      //                    type: "string",
      //                    role: "annotation" },
      //                  2]);

      var options = {
        title: "Báo cáo tài chính",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
<div id="columnchart_values" style="width: 900px; height: 300px;"></div>
