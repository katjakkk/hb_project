<link rel="stylesheet" href="hb_style.css">

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
//TODO order by date!!!
$query = "
  SELECT *
  FROM hb_chart
  ORDER BY bdate";
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
/*echo "[ <br>";
while ( $row = mysqli_fetch_assoc( $result ) ) {
  echo $prefix . " { <br>";
  echo '  "date": "' . $row['bdate'] . '",' . "<br>";
  echo '  "value": ' . $row['bought'] .  "<br>";
  echo " }";
  $prefix = ", <br>";
}
echo "<br>]";*/

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


<!-- Budjet boxes -->
<div class="container">
	<main>
	<div class="txt-box color1">
		<h3>Myönnetty</h3>
		<p>
			$row['given']
		</p>
	</div>
	<div class="txt-box color2">
		<h3>Käytetty</h3>
		<p>
			$row['used']
		</p>
	</div>
	<div class="txt-box color3">
		<h3>Jäljellä</h3>
		<p>
			$row['remaining']
		</p>
	</div>
	</main>
</div>

<!-- Chart code -->
<script>
 // HERE!!!!!!   

</script>

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
    "dataProvider": [      
        

        <?php $prefix = '';
while ( $row = mysqli_fetch_assoc( $result ) ) {
  echo $prefix . " { \n";
  echo '  "date": "' . $row['bdate'] . '",';
  echo '  "value": ' . $row['bought'] ;
  echo " }";
  $prefix = ",\n";
}

?>
    
    ],
     
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
        "finalDate": "2018-31-12",
        "finalValue": 400,
        "initialDate": "2018-01-02",
        "initialValue": 400,
        "lineColor": "#CC0000"
    }/* {
        "finalDate": "2012-01-22 12",
        "finalValue": 10,
        "initialDate": "2012-01-17 12",
        "initialValue": 16,
        "lineColor": "#CC0000"
    }*/],
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
    //TODO inject php
    //Select min date and select max date
    chart.zoomToDates(new Date(2018, 0, 2), new Date(2018, 3, 13));
}
</script>

<!-- HTML -->
<div id="chartdiv"></div>				
    
<?php
include_once 'hb_footer.inc';


  
