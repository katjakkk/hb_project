<?php
$page= "Budjetti";
include_once 'hb_header.php';
// Load configuration as an array. Use the actual location of your configuration file
$config = parse_ini_file('../valmisledi/config.ini'); 

// Try and connect to the database
$connection = mysqli_connect($config['dbbaddr'],$config['usernamecd'],$config['password'],$config['dbname']);

// If connection was not successful, handle the error
if($connection === false) {
    // Handle error - notify administrator, log to a file, show an error screen, etc.
    echo "Connection to database failed :( ";
    exit ("If we have no database connection, this is end");
}else{
mysqli_set_charset($connection, "utf8");
}

/*Select the data base
$db = mysqli_select_db( 'test', $connection );
if ( !$db ) {
  die ( 'Error selecting database ' . test . ' : ' . mysqli_error() );
}*/

// Fetch the data
$query = "
  SELECT *
  FROM hb_chart
  ORDER BY ch_id ASC";
$result = mysqli_query( $connection, $query );

// All good?
if ( !$result ) {
  // Nope
  $message  = 'Invalid query: ' . mysqli_error() . "\n";
  $message .= 'Whole query: ' . $query;
  die( $message );
}

// Print out rows



/*while ( $row = mysqli_fetch_assoc( $result ) ) {
 echo $row['bought'] . ' | ' . $row['bdate'] . "<br>";
}*/

// Close the connection
//mysqli_close($connection);
// Print out rows
$prefix = '';
echo "[ <br>";
while ( $row = mysqli_fetch_assoc( $result ) ) {
  echo $prefix . " { <br>";
  echo '  "date": "' . $row['bdate'] . '",' . "<br>";
  echo '  "value": ' . $row['bought'] .  "<br>";
  echo " }";
  $prefix = ", <br>";
}
echo "<br>]";

?>


<!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 500px;
}																
</style>

<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

<!-- Chart code -->
<script>
    
var myData= [<?php $prefix = '';
while ( $row = mysqli_fetch_assoc( $result ) ) {
  echo $prefix . " { <br>";
  echo '  "date": "' . $row['bdate'] . '",' . "<br>";
  echo '  "value": ' . $row['bought'] .  "<br>";
  echo " }";
  $prefix = ", <br>";
}
echo "<br>";

?>

    ],
</style>

<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

<!-- Chart code -->
<script>
var chart = AmCharts.makeChart("chartdiv", {
    "type": "serial",
    "theme": "light",
    "marginRight":80,
    "autoMarginOffset":20,
    "dataDateFormat": "YYYY-MM-DD HH:NN",
    "dataProvider": [{
        "date": "2012-01-01",
        "value": 8
    }, {
        "date": "2012-01-02",
        "color":"#CC0000",
        "value": 10
    }, {
        "date": "2012-01-03",
        "value": 12
    }, {
        "date": "2012-01-04",
        "value": 14
    }, {
        "date": "2012-01-05",
        "value": 11
    }, {
        "date": "2012-01-06",
        "value": 6
    }, {
        "date": "2012-01-07",
        "value": 7
    }, {
        "date": "2012-01-08",
        "value": 9
    }, {
        "date": "2012-01-09",
        "value": 13
    }, {
        "date": "2012-01-10",
        "value": 15
    }, {
        "date": "2012-01-11",
        "color":"#CC0000",
        "value": 19
    }, {
        "date": "2012-01-12",
        "value": 21
    }, {
        "date": "2012-01-13",
        "value": 22
    }, {
        "date": "2012-01-14",
        "value": 20
    }, {
        "date": "2012-01-15",
        "value": 18
    }, {
        "date": "2012-01-16",
        "value": 14
    }, {
        "date": "2012-01-17",
        "color":"#CC0000",
        "value": 16
    }, {
        "date": "2012-01-18",
        "value": 18
    }, {
        "date": "2012-01-19",
        "value": 17
    }, {
        "date": "2012-01-20",
        "value": 15
    }, {
        "date": "2012-01-21",
        "value": 12
    }, {
        "date": "2012-01-22",
        "color":"#CC0000",
        "value": 10
    }, {
        "date": "2012-01-23",
        "value": 8
    }],
    "valueAxes": [{
        "axisAlpha": 0,
        "guides": [{
            "fillAlpha": 0.1,
            "fillColor": "#888888",
            "lineAlpha": 0,
            "toValue": 16,
            "value": 10
        }],
        "position": "left",
        "tickLength": 0
    }],
    "graphs": [{
        "balloonText": "[[category]]<br><b><span style='font-size:14px;'>value:[[value]]</span></b>",
        "bullet": "round",
        "dashLength": 3,
        "colorField":"color",
        "valueField": "value"
    }],
    "trendLines": [{
        "finalDate": "2012-01-11 12",
        "finalValue": 19,
        "initialDate": "2012-01-02 12",
        "initialValue": 10,
        "lineColor": "#CC0000"
    }, {
        "finalDate": "2012-01-22 12",
        "finalValue": 10,
        "initialDate": "2012-01-17 12",
        "initialValue": 16,
        "lineColor": "#CC0000"
    }],
    "chartScrollbar": {
        "scrollbarHeight":2,
        "offset":-1,
        "backgroundAlpha":0.1,
        "backgroundColor":"#888888",
        "selectedBackgroundColor":"#67b7dc",
        "selectedBackgroundAlpha":1
    },
    "chartCursor": {
        "fullWidth":true,
        "valueLineEabled":true,
        "valueLineBalloonEnabled":true,
        "valueLineAlpha":0.5,
        "cursorAlpha":0
    },
    "categoryField": "date",
    "categoryAxis": {
        "parseDates": true,
        "axisAlpha": 0,
        "gridAlpha": 0.1,
        "minorGridAlpha": 0.1,
        "minorGridEnabled": true
    },
    "export": {
        "enabled": true
     }
});

chart.addListener("dataUpdated", zoomChart);

function zoomChart(){
    chart.zoomToDates(new Date(2012, 0, 2), new Date(2012, 0, 13));
}
</script>

<!-- HTML -->
<div id="chartdiv"></div>				
    
<?php
include_once 'hb_footer.inc';


  