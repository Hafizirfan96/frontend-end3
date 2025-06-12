<?php
// $conn=mysqli_connect('localhost','skilling_irfan','k?8LB?KCXkA^');
//mysqli_select_db("root",$conn);
include "dbconn.php";
//if (isset($_GET["pg"])) {
// Put the two words together with a space in the middle to form "hello world"
//    $get_district = $_GET["pg"];
// Print out some JavaScript with $hello stuck in there which will put "hello world" into the javascript.
// echo $get_district;
//}

//$query = "select * from mapdata where district='Kurramagency'";
//$get=mysqli_query($conn,$query);
//while($row=mysqli_fetch_array($get)){


$result = mysqli_query($conn, "SELECT sum(malegct) FROM mapdata");

while ($row = mysqli_fetch_array($result)) {
  $malegct = $row['sum(malegct)'];
}

$result = mysqli_query($conn, "SELECT sum(femalegct) FROM mapdata");
while ($row = mysqli_fetch_array($result)) {
  $femalegct = $row['sum(femalegct)'];
}

$result = mysqli_query($conn, "SELECT sum(coeducation) FROM mapdata");
while ($row = mysqli_fetch_array($result)) {
  $coeducation = $row['sum(coeducation)'];
}
$sum = $malegct + $femalegct + $coeducation;


?>
<html>

<head>

  <script src="amcharts.js" type="text/javascript"></script>
  <script src="pie.js" type="text/javascript"></script>
  <script src="ammap_amcharts_extension.js" type="text/javascript"></script>
  <script src="serial.js" type="text/javascript"></script>

  <script src="pakistanCustom.js"></script>
  <link rel="shortcut icon" href="img/favicon.png">
  <style>
    body {
      background: #b4cab954;
      /background-image: url(back.png);/
    }

    #chartdiv {
      width: 60%;
      height: 900px;
      margin: top;
      float: left;
    }

    #chartdiv2 {
      width: 40%;
      height: 40px;
      margin: top;
      float: right;
      font-family: Geneva, Arial, Helvetica, sans-serif;
      font-size: 14px;
    }

    #chartdiv3 {
      width: 40%;
      height: 40px;
      margin: top;
      float: right;
      font-family: Geneva, Arial, Helvetica, sans-serif;
      font-size: 14px;
    }

    #chartdiv5 {
      width: 354px;
      height: 150px;
      position: absolute;
      top: 687px;
      right: 62%;
      z-index: 100;
    }

    #chartdiv4 {
      background-color: #F1F1F1;

    }

    tr:hover {
      background-color: #71D8FF;
    }

    #maplink a {
      display: inline-block;
      border: 2px solid #218838;
      padding: 7px 16px;
      background: #28a745;
      text-decoration: none;
      color: #ffffff;
      font-size: 14px;
      font-weight: bold;
      border-radius: 8px;
      text-align: center;
      transition: all 0.3s ease;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    #maplink a:hover {
      background: #1e7e34;
      border-color: #145a24;
      color: #ffffff;
      box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
      transform: translateY(-2px);
      /* Slight lift effect */
    }

    #maplink a:active {
      background: #145a24;
      border-color: #0d421b;
      color: #ffffff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
      transform: translateY(0);
      /* Reset lift effect */
    }

    #maplinkp a {
      display: inline-block;
      border: 1px solid #999;
      padding: 5px;
      background: #FFC000;
      text-decoration: none;
      color: #000;
      border: dotted;
      border-width: thin;
    }

    #maplinkp a:hover {
      display: inline-block;
      border: 1px solid #999;
      padding: 5px;
      background: #94C600;
      text-decoration: none;
      color: #000;
      border: dotted;
      border-width: thin;
    }

    .text {
      font-size: 12px;
      font-family: Arial, Helvetica, sans-serif;
      font-weight: bold;
    }

    .texts {
      font-size: 12px;
      font-family: Arial, Helvetica, sans-serif;
    }

    .sel {
      width: 120px;
      border: thin;
      border-style: dotted;
      border-color: #FF0000;
      background-color: #FFC000;
    }

    .sel {
      background-color: #28a745;
      color: #ffffff;
      font-size: 14px;
      padding: 8px 12px;
      border: none;
      border-radius: 6px;
      box-shadow: 0 3px 5px rgba(0, 0, 0, 0.1);
      cursor: pointer;
      width: 145px;
      text-align: left;
      position: relative;
    }

    .sel::after {
      content: '';
      position: absolute;
      right: 10px;
      top: 50%;
      width: 0;
      height: 0;
      margin-top: -3px;
      border-left: 6px solid transparent;
      border-right: 6px solid transparent;
      border-top: 6px solid #ffffff;
      pointer-events: none;
    }

    .sel:hover {
      background-color: #218838;
      box-shadow: 0 5px 7px rgba(0, 0, 0, 0.15);
    }

    .sel:focus {
      outline: none;
      border: 2px solid #1e7e34;
    }

    .sel option {
      background-color: #ffffff;
      color: #28a745;
      font-size: 14px;
    }

    #mapdiv {
      width: 718px;
      height: 614px;
      position: absolute;
      top: 40px;
      left: -4px;
      overflow: hidden;
      text-align: left;
    }

    .mainb {
      width: 100%;
      height: 700px;
      position: relative;
    }

    #chartdiv22 {
      width: 496px;
      height: 329px;
      position: absolute;
      top: -20px;
      right: -8px;
      z-index: 100;
      overflow: hidden;
      text-align: left;
    }

    @media (min-width: 1800px) {
      #mapdiv {
        text-align: center;
        width: 1135px;
        height: 816px;
      }

      .mainb {
        width: 100%;
        height: 1300px;
        position: relative;
      }

      #chartdiv5 {
        width: 354px;
        height: 150px;
        position: absolute;
        top: 987px;
        right: 62%;
        z-index: 100;
      }

      #chartdiv22 {
        width: 564px;
        height: 345px;
        position: absolute;
        top: -8px;
        right: 60px;
        z-index: 100;
        overflow: hidden;
        text-align: left;
      }
    }
    }
  </style>
  <title>TVET SECTOR</title>
</head>

<body>


  <div class="mainb">



    <div id="chartdiv3" style="width: 502px; height: 40px; position: absolute; top: 10px;
    left: 66px; z-index: 100;">






      <!-- <select id="mySelect" name="province" class="sel" onChange="myFunction()">
   <option>Select Area</option>
   <option value="Punjab">Punjab</option>
   <option value="Khyber Pakhtun Khawa">Khyber Pakhtun Khawa</option>
   <option value="Sindh">Sindh</option>
   <option value="Balochistan">Blochistan</option>
   <option value="FATA">FATA</option>
   <option value="GB">GB</option>
   <option value="Azad Jamu Kashmir">Azad Jamu Kashmir</option>
   <option value="Islamabad Capital Territory">Islamabad Capital Territory (ICT)</option>
   </select>
-->
      <script>
        function myFunction() {
          var x = document.getElementById("mySelect").value;
          if (x == 'Select District') {} else {
            var districts_array_ = JSON.parse('<?php echo get_district_id(); //district_ids
                                                ?>');
            //link.href = "district.php?pg=" + districtid;
            //	window.location.href = "district.php?pg=" + x;
            ; //"district.php";
            //window.open('district.php?pg=' + x, '_blank');

            window.open("district/map/" + districts_array_[x], '_blank');
          }
          //document.getElementById("demo").innerHTML = "You selected: " + x;
        }
      </script>
      <select name="district" class="sel" id="mySelect" onChange="myFunction()">
        <option>Select District</option>
        <?php
        $districts_table = get_table('districts');
        //Districts
        while ($districts = mysqli_fetch_array($districts_table)) {

        ?>
          <option value="<?= clean($districts['name']) ?>"><?= $districts['name'] ?></option>
        <?php } ?>

      </select>


    </div>
    <?php include 'home_table.php'; //dataincluded width: 580px; height: 329px; position: absolute; bottom: 0; right: 0; z-index: 100;
    ?>





    <div id="chart-container" style="width: 300px; height: 200px; position: absolute; bottom: 0; margin-right: 500px; z-index: 100;">
      <?php
      //    ini_set('display_errors', 1);
      // ini_set('display_startup_errors', 1);
      //  error_reporting(E_ALL);
      //    include 'Ind_Ins.php'; 
      ?>
    </div>
    <div id="maplink" style="width: 200px;
    height: 40px;
    position: absolute;
    top: 10px;
    left: 260px;
    z-index: 101;"><a id="maplink" href="pakistan.php?pg=Pakistan" target="_blank">
        <font face='Arial, Helvetica, sans-serif'>Pakistan Details</font>
      </a></div>

    <div id="maplinkp" style="width:auto; height:40px; position:absolute; bottom: 14px; right: 710px; z-index: 200;"></div>

    <div id="chartdiv22"></div>




    <div id="chartdiv5">
      <h5>Source: National Skill Information System (NSIS) - 2024 </h5>
    </div>
    <div id="mapdiv"></div>
  </div>
  <p id="demo"></p>

  <script>
    var map;

    var chart;
    var chartData = {};
    <?php include 'chart_data_new.php'; ?>

    AmCharts.ready(function() {
      // SERIAL CHART
      var chart = new AmCharts.AmSerialChart();
      chart.dataProvider = chartData.pakistan;
      chart.categoryField = "district";
      chart.rotate = true;
      chart.color = "#000000";
      chart.handDrawn = false;
      chart.handDrawScatter = 4;

      // this line makes the chart to show image in the background
      // chart.backgroundImage = "images/bg.jpg";

      // sometimes we need to set margins manually
      // autoMargins should be set to false in order chart to use custom margin values
      chart.autoMargins = false;
      chart.marginTop = 80;
      chart.marginLeft = 40;
      chart.marginRight = 100;
      chart.startDuration = 2;

      // AXES
      // category
      var categoryAxis = chart.categoryAxis;
      categoryAxis.gridAlpha = 0;
      categoryAxis.axisAlpha = 0;
      categoryAxis.labelsEnabled = false;

      // value
      var valueAxis = new AmCharts.ValueAxis();
      valueAxis.gridAlpha = 0;
      valueAxis.axisAlpha = 0;
      valueAxis.labelsEnabled = false;
      valueAxis.minimum = 0;
      chart.addValueAxis(valueAxis);

      // GRAPH
      var graph = new AmCharts.AmGraph();
      graph.balloonText = "[[category]]: [[value]]";
      graph.valueField = "numbers";
      graph.type = "column";
      graph.lineAlpha = 2;
      graph.fillAlphas = 0.8;
      // you can pass any number of colors in array to create more fancy gradients
      graph.fillColors = ["#FFC000", "#00B0F0"];
      graph.gradientOrientation = "horizontal";
      // graph.labelPosition = "inside";
      graph.labelText = "[[category]]: [[value]]";
      // graph.balloonText = "[[category]]: [[value]]";
      chart.addGraph(graph);

      // LABEL
      chart.addLabel(50, 40, "Pakistan", "left", 15, "#000000", 0, 1, true);

      chart.creditsPosition = "bottom-right";

      // WRITE
      chart.write("chartdiv22");

      // * CREATE MAP *********************

      map = new AmCharts.AmMap();
      map.path = "https://cdn.amcharts.com/lib/3/";;
      // map.panEventsEnabled = true; // this line enables pinch-zooming and dragging on touch devices

      var dataProvider = {
        // mapVar: AmCharts.maps.worldLow	
        mapVar: AmCharts.maps.pakistanCustom
      };


      map.zoomControl = {
        buttonFillColor: "#155724",
        buttonRollOverColor: "#0c3e16",
        buttonFillHoverColor: "#0a2910",
        buttonBorderColor: "#000000",
        gridBackgroundColor: "#e8f5e9",
        gridColor: "#155724",
        gridAlpha: 0.5,
      };
      map.areasSettings = {
        unlistedAreasColor: "#DDDDDD",
        rollOverOutlineColor: "#FFFFFF",
        rollOverColor: "#CC0000"
      };

      dataProvider.areas = [
        <?php include 'dataprovider_area_new.php' ?> {
          title: "disputed",
          id: "disputed",
          color: "#dddddd",
          selectable: true
        },
      ];

      var districts_array = JSON.parse('<?php echo get_district_id(); ?>');
      map.dataProvider = dataProvider;
      map.write("mapdiv");

      map.addListener("clickMapObject", function(event) {
        if (event.mapObject.id != undefined && chartData[event.mapObject.id] != undefined) {
          chart.dataProvider = chartData[event.mapObject.id];
          chart.clearLabels();
          chart.addLabel(50, 40, "District:", "left", 15, "#000000", 0, 1, true);
          chart.addLabel(125, 38, event.mapObject.title, "left", 15, "#000000", 0, 1, true);
          chart.validateData();

          // var link = document.createElement("a");
          //  document.getElementById("maplink").innerHTML = "";
          //  var districtid = event.mapObject.id;
          // link.href = "district.php?pg=" + districtid + "&id=" + districts_array[districtid];
          // link.innerHTML = "<font face='Arial, Helvetica, sans-serif'>District Details</font>";
          //  link.target = "_blank";
          // document.getElementById("maplink").appendChild(link); 
          var link = document.createElement("a");
          document.getElementById("maplink").innerHTML = "";
          var districtid = event.mapObject.id;
          link.href = "district/map/" + districts_array[districtid];
          link.innerHTML = "<font face='Arial, Helvetica, sans-serif'>" + districtid + " Details</font>";
          link.target = "_blank";
          document.getElementById("maplink").appendChild(link);
        }
      });
    });

    function renderChartData(chartData) {
      for (const district in chartData) {
        const data = chartData[district];
        data.forEach(item => {
          if (item.short === 'ind') {
            // Create a clickable link for Industry
            item.numbers = `<a href="${item.url}">${item.numbers}</a>`;
          }
        });
      }
      // Your existing logic to display the chart
    }



    //---------------pakistan graph---------------------------------

    //---------------punjab graph---------------------------------
    function punjab() {
      // SERIAL CHART
      var chart = new AmCharts.AmSerialChart();
      chart.dataProvider = chartData.punjab;
      chart.categoryField = "district";
      chart.rotate = true;
      chart.color = "#000000";
      chart.handDrawn = false;
      chart.handDrawScatter = 4;

      // this line makes the chart to show image in the background
      //chart.backgroundImage = "images/bg.jpg";

      // sometimes we need to set margins manually
      // autoMargins should be set to false in order chart to use custom margin values
      chart.autoMargins = false;
      chart.marginTop = 20;
      chart.marginLeft = 5;
      chart.marginRight = 80;
      chart.startDuration = 2;

      // AXES
      // category
      var categoryAxis = chart.categoryAxis;
      categoryAxis.gridAlpha = 0;
      categoryAxis.axisAlpha = 0;
      categoryAxis.labelsEnabled = false;

      // value
      var valueAxis = new AmCharts.ValueAxis();
      valueAxis.gridAlpha = 0;
      valueAxis.axisAlpha = 0;
      valueAxis.labelsEnabled = false;
      valueAxis.minimum = 0;
      chart.addValueAxis(valueAxis);

      // GRAPH
      var graph = new AmCharts.AmGraph();
      //graph.balloonText = "[[category]]";
      graph.valueField = "numbers";
      graph.type = "column";
      graph.lineAlpha = 2;
      graph.fillAlphas = 0.8;
      // you can pass any number of colors in array to create more fancy gradients
      graph.fillColors = ["#FFC000", "#00B0F0"];
      graph.gradientOrientation = "horizontal";
      // graph.labelPosition = "inside";
      graph.labelText = "[[category]],[[value]]";
      graph.fontSize = 10;
      graph.balloonText = "";
      chart.addGraph(graph);


      // LABEL
      chart.addLabel(10, 5, "Punjab", "left", 10, "#000000", 0, 1, true);

      chart.creditsPosition = "bottom-right";


      // WRITE
      chart.write("chartdiv5");

      var link = document.createElement("a");
      document.getElementById("maplinkp").innerHTML = "";
      //link.href = event.mapObject.id+".html"; 
      var p_id = '<?php echo get_province_id('Punjab') ?>';
      link.href = "provinces.php?pg=Punjab&id=" + p_id; //"district.php";
      //link.href = "punjab.php?pg=Punjab"; //"district.php";
      link.innerHTML = "<font face='Arial, Helvetica, sans-serif'>Province Details</font>";
      link.target = "_blank";
      document.getElementById("maplinkp").appendChild(link);

    }
    //---------------kp graph---------------------------------
    function kp() {
      // SERIAL CHART
      var chart = new AmCharts.AmSerialChart();
      chart.dataProvider = chartData.kp;
      chart.categoryField = "district";
      chart.rotate = true;
      chart.color = "#000000";
      chart.handDrawn = false;
      chart.handDrawScatter = 4;

      // this line makes the chart to show image in the background
      //chart.backgroundImage = "images/bg.jpg";

      // sometimes we need to set margins manually
      // autoMargins should be set to false in order chart to use custom margin values
      chart.autoMargins = false;
      chart.marginTop = 20;
      chart.marginLeft = 5;
      chart.marginRight = 60;
      chart.startDuration = 2;

      // AXES
      // category
      var categoryAxis = chart.categoryAxis;
      categoryAxis.gridAlpha = 0;
      categoryAxis.axisAlpha = 0;
      categoryAxis.labelsEnabled = false;

      // value
      var valueAxis = new AmCharts.ValueAxis();
      valueAxis.gridAlpha = 0;
      valueAxis.axisAlpha = 0;
      valueAxis.labelsEnabled = false;
      valueAxis.minimum = 0;
      chart.addValueAxis(valueAxis);

      // GRAPH
      var graph = new AmCharts.AmGraph();
      //graph.balloonText = "";
      graph.valueField = "numbers";
      graph.type = "column";
      graph.lineAlpha = 2;
      graph.fillAlphas = 0.8;
      // you can pass any number of colors in array to create more fancy gradients
      graph.fillColors = ["#FFC000", "#00B0F0"];
      graph.gradientOrientation = "horizontal";
      // graph.labelPosition = "inside";
      graph.labelText = "[[category]],[[value]]";
      graph.fontSize = 10;
      graph.balloonText = "";
      chart.addGraph(graph);


      // LABEL
      chart.addLabel(10, 5, "Khyber Pakhtunkhwa", "left", 10, "#000000", 0, 1, true);

      chart.creditsPosition = "bottom-right";


      // WRITE
      chart.write("chartdiv5");

      var link = document.createElement("a");
      document.getElementById("maplinkp").innerHTML = "";
      //link.href = event.mapObject.id+".html"; 
      var p_id = '<?php echo 6; //get_province_id('Khyber Pakhtunkhwa') 
                  ?>';
      link.href = "provinces.php?pg=KPK&id=" + p_id; //"district.php";
      //link.href = "kpk.php?pg=KPK"; //"district.php";
      link.innerHTML = "<font face='Arial, Helvetica, sans-serif'>Province Details</font>";
      link.target = "_blank";
      document.getElementById("maplinkp").appendChild(link);

    }
    //---------------sindh graph---------------------------------
    function sindh() {
      // SERIAL CHART
      var chart = new AmCharts.AmSerialChart();
      chart.dataProvider = chartData.sindh;
      chart.categoryField = "district";
      chart.rotate = true;
      chart.color = "#000000";
      chart.handDrawn = false;
      chart.handDrawScatter = 4;

      // this line makes the chart to show image in the background
      //chart.backgroundImage = "images/bg.jpg";

      // sometimes we need to set margins manually
      // autoMargins should be set to false in order chart to use custom margin values
      chart.autoMargins = false;
      chart.marginTop = 20;
      chart.marginLeft = 5;
      chart.marginRight = 60;
      chart.startDuration = 2;

      // AXES
      // category
      var categoryAxis = chart.categoryAxis;
      categoryAxis.gridAlpha = 0;
      categoryAxis.axisAlpha = 0;
      categoryAxis.labelsEnabled = false;

      // value
      var valueAxis = new AmCharts.ValueAxis();
      valueAxis.gridAlpha = 0;
      valueAxis.axisAlpha = 0;
      valueAxis.labelsEnabled = false;
      valueAxis.minimum = 0;
      chart.addValueAxis(valueAxis);

      // GRAPH
      var graph = new AmCharts.AmGraph();
      //graph.balloonText = "[[category]]: [[value]]";
      graph.valueField = "numbers";
      graph.type = "column";
      graph.lineAlpha = 2;
      graph.fillAlphas = 0.8;
      // you can pass any number of colors in array to create more fancy gradients
      graph.fillColors = ["#FFC000", "#00B0F0"];
      graph.gradientOrientation = "horizontal";
      // graph.labelPosition = "inside";
      graph.labelText = "[[category]],[[value]]";
      graph.fontSize = 10;
      graph.balloonText = "";
      chart.addGraph(graph);


      // LABEL
      chart.addLabel(10, 5, "Sindh", "left", 10, "#000000", 0, 1, true);

      chart.creditsPosition = "bottom-right";


      // WRITE
      chart.write("chartdiv5");

      var link = document.createElement("a");
      document.getElementById("maplinkp").innerHTML = "";
      //link.href = event.mapObject.id+".html"; 
      var p_id = '<?php echo get_province_id('Sindh') ?>';
      link.href = "provinces.php?pg=Sindh&id=" + p_id; //"district.php";
      //link.href = "sindh.php?pg=Sindh"; //"district.php";
      link.innerHTML = "<font face='Arial, Helvetica, sans-serif'>Province Details</font>";
      link.target = "_blank";
      document.getElementById("maplinkp").appendChild(link);

    }
    //---------------balochistan graph---------------------------------
    function balochistan() {
      // SERIAL CHART
      var chart = new AmCharts.AmSerialChart();
      chart.dataProvider = chartData.balochistan;
      chart.categoryField = "district";
      chart.rotate = true;
      chart.color = "#000000";
      chart.handDrawn = false;
      chart.handDrawScatter = 4;

      // this line makes the chart to show image in the background
      //chart.backgroundImage = "images/bg.jpg";

      // sometimes we need to set margins manually
      // autoMargins should be set to false in order chart to use custom margin values
      chart.autoMargins = false;
      chart.marginTop = 20;
      chart.marginLeft = 5;
      chart.marginRight = 60;
      chart.startDuration = 2;

      // AXES
      // category
      var categoryAxis = chart.categoryAxis;
      categoryAxis.gridAlpha = 0;
      categoryAxis.axisAlpha = 0;
      categoryAxis.labelsEnabled = false;

      // value
      var valueAxis = new AmCharts.ValueAxis();
      valueAxis.gridAlpha = 0;
      valueAxis.axisAlpha = 0;
      valueAxis.labelsEnabled = false;
      valueAxis.minimum = 0;
      chart.addValueAxis(valueAxis);

      // GRAPH
      var graph = new AmCharts.AmGraph();
      //graph.balloonText = "[[category]]: [[value]]";
      graph.valueField = "numbers";
      graph.type = "column";
      graph.lineAlpha = 2;
      graph.fillAlphas = 0.8;
      // you can pass any number of colors in array to create more fancy gradients
      graph.fillColors = ["#FFC000", "#00B0F0"];
      graph.gradientOrientation = "horizontal";
      // graph.labelPosition = "inside";
      graph.labelText = "[[category]],[[value]]";
      graph.fontSize = 10;
      graph.balloonText = "";
      chart.addGraph(graph);


      // LABEL
      chart.addLabel(10, 5, "Balochistan", "left", 10, "#000000", 0, 1, true);

      chart.creditsPosition = "bottom-right";


      // WRITE
      chart.write("chartdiv5");

      var link = document.createElement("a");
      document.getElementById("maplinkp").innerHTML = "";
      //link.href = event.mapObject.id+".html"; 
      var p_id = '<?php echo get_province_id('Balochistan') ?>';
      link.href = "provinces.php?pg=Balochistan&id=" + p_id; //"district.php";
      //link.href = "balochistan.php?pg=Balochistan"; //"district.php";
      link.innerHTML = "<font face='Arial, Helvetica, sans-serif'>Province Details</font>";
      link.target = "_blank";
      document.getElementById("maplinkp").appendChild(link);

    }
    //---------------ajk graph---------------------------------
    function ajk() {
      // SERIAL CHART
      var chart = new AmCharts.AmSerialChart();
      chart.dataProvider = chartData.ajk;
      chart.categoryField = "district";
      chart.rotate = true;
      chart.color = "#000000";
      chart.handDrawn = false;
      chart.handDrawScatter = 4;

      // this line makes the chart to show image in the background
      //chart.backgroundImage = "images/bg.jpg";

      // sometimes we need to set margins manually
      // autoMargins should be set to false in order chart to use custom margin values
      chart.autoMargins = false;
      chart.marginTop = 20;
      chart.marginLeft = 5;
      chart.marginRight = 60;
      chart.startDuration = 2;

      // AXES
      // category
      var categoryAxis = chart.categoryAxis;
      categoryAxis.gridAlpha = 0;
      categoryAxis.axisAlpha = 0;
      categoryAxis.labelsEnabled = false;

      // value
      var valueAxis = new AmCharts.ValueAxis();
      valueAxis.gridAlpha = 0;
      valueAxis.axisAlpha = 0;
      valueAxis.labelsEnabled = false;
      valueAxis.minimum = 0;
      chart.addValueAxis(valueAxis);

      // GRAPH
      var graph = new AmCharts.AmGraph();
      //graph.balloonText = "[[category]]: [[value]]";
      graph.valueField = "numbers";
      graph.type = "column";
      graph.lineAlpha = 2;
      graph.fillAlphas = 0.8;
      // you can pass any number of colors in array to create more fancy gradients
      graph.fillColors = ["#FFC000", "#00B0F0"];
      graph.gradientOrientation = "horizontal";
      // graph.labelPosition = "inside";
      graph.labelText = "[[category]],[[value]]";
      graph.fontSize = 10;
      graph.balloonText = "";
      chart.addGraph(graph);


      // LABEL
      chart.addLabel(10, 5, "Azad Jamu Kashmir", "left", 10, "#000000", 0, 1, true);

      chart.creditsPosition = "bottom-right";


      // WRITE
      chart.write("chartdiv5");

      var link = document.createElement("a");
      document.getElementById("maplinkp").innerHTML = "";
      //link.href = event.mapObject.id+".html"; 

      link.href = "ajk.php?pg=AJK&id=1"; //"district.php";
      link.innerHTML = "<font face='Arial, Helvetica, sans-serif'>AJK Details</font>";
      link.target = "_blank";
      document.getElementById("maplinkp").appendChild(link);

    }
    //---------------gb graph---------------------------------
    function gb() {
      // SERIAL CHART
      var chart = new AmCharts.AmSerialChart();
      chart.dataProvider = chartData.gb;
      chart.categoryField = "district";
      chart.rotate = true;
      chart.color = "#000000";
      chart.handDrawn = false;
      chart.handDrawScatter = 4;

      // this line makes the chart to show image in the background
      //chart.backgroundImage = "images/bg.jpg";

      // sometimes we need to set margins manually
      // autoMargins should be set to false in order chart to use custom margin values
      chart.autoMargins = false;
      chart.marginTop = 20;
      chart.marginLeft = 5;
      chart.marginRight = 60;
      chart.startDuration = 2;

      // AXES
      // category
      var categoryAxis = chart.categoryAxis;
      categoryAxis.gridAlpha = 0;
      categoryAxis.axisAlpha = 0;
      categoryAxis.labelsEnabled = false;

      // value
      var valueAxis = new AmCharts.ValueAxis();
      valueAxis.gridAlpha = 0;
      valueAxis.axisAlpha = 0;
      valueAxis.labelsEnabled = false;
      valueAxis.minimum = 0;
      chart.addValueAxis(valueAxis);

      // GRAPH
      var graph = new AmCharts.AmGraph();
      // graph.balloonText = "[[category]]: [[value]]";
      graph.valueField = "numbers";
      graph.type = "column";
      graph.lineAlpha = 2;
      graph.fillAlphas = 0.8;
      // you can pass any number of colors in array to create more fancy gradients
      graph.fillColors = ["#FFC000", "#00B0F0"];
      graph.gradientOrientation = "horizontal";
      // graph.labelPosition = "inside";
      graph.labelText = "[[category]],[[value]]";
      graph.fontSize = 10;
      graph.balloonText = "";
      chart.addGraph(graph);


      // LABEL
      chart.addLabel(10, 5, "Gilgit Baltistan", "left", 10, "#000000", 0, 1, true);

      chart.creditsPosition = "bottom-right";


      // WRITE
      chart.write("chartdiv5");

      var link = document.createElement("a");
      document.getElementById("maplinkp").innerHTML = "";
      //link.href = event.mapObject.id+".html"; 

      link.href = "gb.php?pg=GB&id=4"; //"district.php";
      link.innerHTML = "<font face='Arial, Helvetica, sans-serif'>Province Details</font>";
      link.target = "_blank";
      document.getElementById("maplinkp").appendChild(link);

    }
    //---------------fata graph---------------------------------
    function fata() {
      // SERIAL CHART
      var chart = new AmCharts.AmSerialChart();
      chart.dataProvider = chartData.fata;
      chart.categoryField = "district";
      chart.rotate = true;
      chart.color = "#000000";
      chart.handDrawn = false;
      chart.handDrawScatter = 4;

      // this line makes the chart to show image in the background
      //chart.backgroundImage = "images/bg.jpg";

      // sometimes we need to set margins manually
      // autoMargins should be set to false in order chart to use custom margin values
      chart.autoMargins = false;
      chart.marginTop = 20;
      chart.marginLeft = 5;
      chart.marginRight = 60;
      chart.startDuration = 2;

      // AXES
      // category
      var categoryAxis = chart.categoryAxis;
      categoryAxis.gridAlpha = 0;
      categoryAxis.axisAlpha = 0;
      categoryAxis.labelsEnabled = false;

      // value
      var valueAxis = new AmCharts.ValueAxis();
      valueAxis.gridAlpha = 0;
      valueAxis.axisAlpha = 0;
      valueAxis.labelsEnabled = false;
      valueAxis.minimum = 0;
      chart.addValueAxis(valueAxis);

      // GRAPH
      var graph = new AmCharts.AmGraph();
      //graph.balloonText = "[[category]]: [[value]]";
      graph.valueField = "numbers";
      graph.type = "column";
      graph.lineAlpha = 2;
      graph.fillAlphas = 0.8;
      // you can pass any number of colors in array to create more fancy gradients
      graph.fillColors = ["#FFC000", "#00B0F0"];
      graph.gradientOrientation = "horizontal";
      // graph.labelPosition = "inside";
      graph.labelText = "[[category]],[[value]]";
      graph.fontSize = 10;
      graph.balloonText = "";
      chart.addGraph(graph);


      // LABEL
      chart.addLabel(10, 5, "FATA", "left", 10, "#000000", 0, 1, true);

      chart.creditsPosition = "bottom-right";


      // WRITE
      chart.write("chartdiv5");

      var link = document.createElement("a");
      document.getElementById("maplinkp").innerHTML = "";
      //link.href = event.mapObject.id+".html"; 

      link.href = "fata.php?pg=FATA&id=3"; //"district.php";
      link.innerHTML = "<font face='Arial, Helvetica, sans-serif'>FATA Details</font>";
      link.target = "_blank";
      document.getElementById("maplinkp").appendChild(link);

    }
    //---------------ict graph---------------------------------
    function ict() {
      // SERIAL CHART
      var chart = new AmCharts.AmSerialChart();
      chart.dataProvider = chartData.ict;
      chart.categoryField = "district";
      chart.rotate = true;
      chart.color = "#000000";
      chart.handDrawn = false;
      chart.handDrawScatter = 4;

      // this line makes the chart to show image in the background
      //chart.backgroundImage = "images/bg.jpg";

      // sometimes we need to set margins manually
      // autoMargins should be set to false in order chart to use custom margin values
      chart.autoMargins = false;
      chart.marginTop = 20;
      chart.marginLeft = 5;
      chart.marginRight = 60;
      chart.startDuration = 2;

      // AXES
      // category
      var categoryAxis = chart.categoryAxis;
      categoryAxis.gridAlpha = 0;
      categoryAxis.axisAlpha = 0;
      categoryAxis.labelsEnabled = false;

      // value
      var valueAxis = new AmCharts.ValueAxis();
      valueAxis.gridAlpha = 0;
      valueAxis.axisAlpha = 0;
      valueAxis.labelsEnabled = false;
      valueAxis.minimum = 0;
      chart.addValueAxis(valueAxis);

      // GRAPH
      var graph = new AmCharts.AmGraph();
      //graph.balloonText = "[[category]]: [[value]]";
      graph.valueField = "numbers";
      graph.type = "column";
      graph.lineAlpha = 2;
      graph.fillAlphas = 0.8;
      // you can pass any number of colors in array to create more fancy gradients
      graph.fillColors = ["#FFC000", "#00B0F0"];
      graph.gradientOrientation = "horizontal";
      // graph.labelPosition = "inside";
      graph.labelText = "[[category]],[[value]]";
      graph.fontSize = 10;
      graph.balloonText = "";
      chart.addGraph(graph);


      // LABEL
      chart.addLabel(10, 5, "Islamabad", "left", 10, "#000000", 0, 1, true);

      chart.creditsPosition = "bottom-right";


      // WRITE
      chart.write("chartdiv5");

      var link = document.createElement("a");
      document.getElementById("maplinkp").innerHTML = "";
      //link.href = event.mapObject.id+".html"; 

      link.href = "district.php?pg=Islamabad&id=5"; //"district.php";
      link.innerHTML = "<font face='Arial, Helvetica, sans-serif'>ICT Details</font>";
      link.target = "_blank";
      document.getElementById("maplinkp").appendChild(link);

    }

    //-----------------GB-------------------------------
    //var list = ['Lehri'];

    //map.dataProvider = dataProvider;
    function activateAreasGb(list) {
      var list = ["Gilgit", "Ghizer", "Skardu", "Ghanchi", "Astor", "HunzaNagar", "Diamir"];
      // list is an array of area ids to make "enabled"
      for (var i = 0; i < map.dataProvider.areas.length; i++) {
        //alert ("for working!");
        var area = map.dataProvider.areas[i];
        if (list.indexOf(area.id) === -1) {
          // alert ("if working!");
          // area not in the list
          area.color = "#ccc";
          area.selectable = false;

        } else {
          //alert ("if else working!");
          // area in the list
          area.color = "#94C600";
          area.selectable = true;
        }
      }
      map.validateData();

    }
    //----------------------------KPK---------------------------
    function activateAreasKp(list) {
      var list = ["Abbottabad", "Bannu", "Batagram", "Buner", "Charsadda", "Chitral", "DeraIsmailKhan", "Hangu", "Haripur", "Karak", "Kohat", "Kohistan", "LakkiMarwat", "LowerDir", "Malakand", "Mansehra", "Mardan", "Nowshera", "Peshawar", "Shangla", "Swabi", "Swat", "Tank", "UpperDir"];
      // list is an array of area ids to make "enabled"
      for (var i = 0; i < map.dataProvider.areas.length; i++) {
        //alert ("for working!");
        var area = map.dataProvider.areas[i];
        if (list.indexOf(area.id) === -1) {
          // alert ("if working!");
          // area not in the list
          area.color = "#ccc";
          area.selectable = false;

        } else {
          //alert ("if else working!");
          // area in the list
          area.color = "#94C600";
          area.selectable = true;
        }
      }
      map.validateData();
    }
    //-----------------------------------punjab------------------------------------------------------------
    function activateAreasPn(list) {
      var list = ["Rawalpindi", "Attock", "Bahawalnagar", "Bahawalpur", "Bhakkar", "Chakwal", "Chiniot", "DeraGhaziKhan", "Faisalabad", "Gujranwala", "Gujrat", "Hafizabad", "Jhang", "Jhelum", "Kasur", "Khanewal", "Khushab", "Lahore", "Layyah", "Lodhran", "MandiBahauddin", "Mianwali", "Multan", "Muzaffargarh", "NankanaSahib", "Narowal", "Okara", "Pakpattan", "RahimYarKhan", "Rajanpur", "Sahiwal", "Sargodha", "Sheikhupura", "Sialkot", "TobaTekSingh", "Vehari"];
      // list is an array of area ids to make "enabled"
      for (var i = 0; i < map.dataProvider.areas.length; i++) {
        //alert ("for working!");
        var area = map.dataProvider.areas[i];
        if (list.indexOf(area.id) === -1) {
          // alert ("if working!");
          // area not in the list
          area.color = "#ccc";
          area.selectable = false;

        } else {
          //alert ("if else working!");
          // area in the list
          area.color = "#94C600";
          area.selectable = true;
        }
      }
      map.validateData();
    }

    //-----------------------------------Balochistan------------------------------------------------------------
    function activateAreasBl(list) {
      var list = ["Awaran", "Barkhan", "Bolan", "Chaghi", "DeraBugti", "Gwadar", "Harnai", "Jaffarabad", "JhalMagsi", "Kalat", "Kech", "Kharan", "Khuzdar", "Kohlu", "Lasbela", "Loralai", "Mastung", "Musakhail", "Nasirabad", "Nushki", "Panjgur", "Pishin", "KillaAbdullah", "KillaSaifullah", "Quetta", "Sherani", "Sibi", "Washuk", "Zhob", "Ziarat"];

      // list is an array of area ids to make "enabled"
      for (var i = 0; i < map.dataProvider.areas.length; i++) {
        //alert ("for working!");
        var area = map.dataProvider.areas[i];
        if (list.indexOf(area.id) === -1) {
          // alert ("if working!");
          // area not in the list
          area.color = "#ccc";
          area.selectable = false;

        } else {
          //alert ("if else working!");
          // area in the list
          area.color = "#94C600";
          area.selectable = true;
        }
      }
      map.validateData();

    }

    //-----------------------------------Sindh------------------------------------------------------------
    function activateAreasSn(list) {
      var list = ["Badin", "Dadu", "Ghotki", "Hyderabad", "Jacobabad", "Jamshoro", "KarachiCentral", "Kashmore", "Khairpur", "Larkana", "Matiari", "Mirpurkhas", "Sanghar", "ShaheedBenazirabad", "Shikarpur", "Sukkur", "TandoAllahYar", "TandoMuhammadKhan", "Tharparkar", "Thatta", "Umerkot", "KambarShahdadkot", "NaushehroFeroze"];

      // list is an array of area ids to make "enabled"
      for (var i = 0; i < map.dataProvider.areas.length; i++) {
        //alert ("for working!");
        var area = map.dataProvider.areas[i];
        if (list.indexOf(area.id) === -1) {
          // alert ("if working!");
          // area not in the list
          area.color = "#ccc";
          area.selectable = false;

        } else {
          //alert ("if else working!");
          // area in the list
          area.color = "#94C600";
          area.selectable = true;
        }
      }
      map.validateData();
    }

    //-----------------------------------FATA------------------------------------------------------------
    function activateAreasFATA(list) {
      var list = ["Kurramagency", "Khyberagency", "Mohmandagency", "Bajuaragency", "Orakzaiagency", "NorthWaziristanagency", "SouthWaziristanagency"];

      // list is an array of area ids to make "enabled"
      for (var i = 0; i < map.dataProvider.areas.length; i++) {
        //alert ("for working!");
        var area = map.dataProvider.areas[i];
        if (list.indexOf(area.id) === -1) {
          // alert ("if working!");
          // area not in the list
          area.color = "#ccc";
          area.selectable = false;

        } else {
          //alert ("if else working!");
          // area in the list
          area.color = "#94C600";
          area.selectable = true;
        }
      }
      map.validateData();
    }

    //-----------------------------------AJK------------------------------------------------------------
    function activateAreasAJK(list) {
      var list = ["Muzaffarabad", "Bagh", "Mirpur", "Kotli", "Bhimber", "Poonch", "Sudhnutti", "Hattian", "Neelum"];
      // list is an array of area ids to make "enabled"
      for (var i = 0; i < map.dataProvider.areas.length; i++) {
        //alert ("for working!");
        var area = map.dataProvider.areas[i];
        if (list.indexOf(area.id) === -1) {
          // alert ("if working!");
          // area not in the list
          area.color = "#ccc";
          area.selectable = false;

        } else {
          //alert ("if else working!");
          // area in the list
          area.color = "#94C600";
          area.selectable = true;
        }
      }
      map.validateData();




    }
    //-----------------------------------ICT------------------------------------------------------------
    function activateAreasICT(list) {
      var list = ["Islamabad"];

      // list is an array of area ids to make "enabled"
      for (var i = 0; i < map.dataProvider.areas.length; i++) {
        //alert ("for working!");
        var area = map.dataProvider.areas[i];
        if (list.indexOf(area.id) === -1) {
          // alert ("if working!");
          // area not in the list
          area.color = "#ccc";
          area.selectable = false;
        } else {
          //alert ("if else working!");
          // area in the list
          area.color = "#94C600";
          area.selectable = true;
        }
      }
      map.validateData();
    }

    function activateAreasPak() {
      //window.location.href = "http://skillingpakistan.org/dmap/index.php";
      window.location.href = 'http://skilling.todonerd.com/dmap/index.php';
    }
    /*var list = ["disputed","Lehri"];
    function activateAreas(list) {
    alert ("demo text");
    // list is an array of area ids to make "enabled"
    for( var i = 0; i < map.dataProvider.areas; i++) {
    alert ("demo text inside for "); 
    var area = map.dataProvider[i];
    if (list.indexOf(area.id) === -1) {
    // area not in the list
    area.color = "#ddd";
    area.selectable = false;
    }
    else {
    // area in the list
    area.color = "#c55";
    area.selectable = true;
    }
    }
    map.validateData();
    }
    */
  </script>


  <p style="padding-left:5px;"></p>
  <!-- 00000000000000000000000000000000000000000000000 -->

</body>

</html>