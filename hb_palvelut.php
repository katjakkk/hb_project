
<?php
$page= "Palvelut";
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
    
    $result_a = mysqli_query($connection, "SELECT name FROM hb_mainclass where  m_id=1");
    $result_b = mysqli_query($connection, "SELECT name FROM hb_mainclass where  m_id=2");
    $result_c = mysqli_query($connection, "SELECT name FROM hb_mainclass where  m_id=3");
    $result_d = mysqli_query($connection, "SELECT name FROM hb_mainclass where  m_id=4");
    $result_e = mysqli_query($connection, "SELECT name FROM hb_mainclass where  m_id=5");
    $result_f = mysqli_query($connection, "SELECT name FROM hb_mainclass where  m_id=6");
    $result_g = mysqli_query($connection, "SELECT name FROM hb_mainclass where  m_id=7");
    $result_h = mysqli_query($connection, "SELECT name FROM hb_mainclass where  m_id=8");
    $result_i = mysqli_query($connection, "SELECT name FROM hb_mainclass where  m_id=9");
    $result_j = mysqli_query($connection, "SELECT name FROM hb_mainclass where  m_id=10");
    
    $row_a = mysqli_fetch_array($result_a);
    $row_b = mysqli_fetch_array($result_b);
    $row_c = mysqli_fetch_array($result_c);
    $row_d = mysqli_fetch_array($result_d);
    $row_e = mysqli_fetch_array($result_e);
    $row_f = mysqli_fetch_array($result_f);
    $row_g = mysqli_fetch_array($result_g);
    $row_h = mysqli_fetch_array($result_h);
    $row_i = mysqli_fetch_array($result_i);
    $row_j = mysqli_fetch_array($result_j);
}
if(result == false) {
    echo "query failed :(";
}else {

//echo "ID: " .$row['pid'] . " - Name: " . $row['firstname'] . " " . $row['lastname'] . "<br>";
 }
?>
<!DOCTYPE html>
<html lang= "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
    <link rel="stylesheet" href="css/hb_style.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
.w3-bar-block .w3-bar-item {padding:20px}
    h3 {font-size: }
</style>
    <title>Database and responsive fun</title>
<main>
    
    <div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px " >
        <div class="search">
             <input type="text" placeholder="Search..">
        </div>
        <div class="w3-row-padding w3-padding-16 w3-center" id="food">
    <div class="quarter2">
        <img class="img" src="img/kassi.jpg" alt="Kassi" style="width:100%">
        <h3> <?php echo $row_a['name']; ?></h3>
      <p>Just some random text, lorem ipsum text praesent tincidunt ipsum lipsum.</p>
    </div>
            <div class="quarter2">
      <img class="img" src="img/meal2.jpg" alt="Meal" style="width:100%">
      <h3><?php echo $row_b['name']; ?></h3>
      <p>Once again, some random text to lorem lorem lorem lorem ipsum text praesent tincidunt ipsum lipsum.</p>
    </div>
    <div class="quarter2">
      <img src="img/talkkari.jpg" alt="Koti" style="width:100%">
      <h3><?php echo $row_c['name']; ?></h3>
      <p>Lorem ipsum text praesent tincidunt ipsum lipsum.</p>
      <p>What else?</p>
    </div>
    <div class="quarter2">
      <img class="img" src="img/bth.jpg" alt="Bath" style="width:100%">
      <h3><?php echo $row_d['name']; ?></h3>
      <p>Lorem ipsum text praesent tincidunt ipsum lipsum.</p>
    </div>
        </div>
      <!-- Second Photo Grid-->
    <div class="w3-row-padding w3-padding-16 w3-center">

    <div class="quarter2">
        <img class="img"  src="img/koti.jpg" alt="Koti" style="width:100%">
      <h3><?php echo $row_e['name']; ?></h3>
      <p>Lorem ipsum text praesent tincidunt ipsum lipsum.</p>
    </div>
      <div class="quarter2">
        <img class="img"  src="img/taxi.jpg" alt="taksi" style="width:100%">
         <h3><?php echo $row_f['name']; ?></h3>
      <p>Once again, some random text to lorem lorem lorem lorem ipsum text praesent tincidunt ipsum lipsum.</p>
    </div>  
       <div class="quarter2">
        <img class="img"  src="img/siivous.jpg" alt="Siivous" style="width:100%">

        <h3><?php echo $row_g['name']; ?></h3>
      <p>Just some random text, lorem ipsum text praesent tincidunt ipsum lipsum.</p>
    </div>
      <div class="quarter2">
      <img class="img"  src="img/social.jpg" alt="Social" style="width:100%">

      <h3><?php echo $row_h['name']; ?></h3>
      <p>Lorem lorem lorem lorem ipsum text praesent tincidunt ipsum lipsum.</p>
    </div>
  </div>
        
   <!-- Pagination -->
  <div class="w3-center w3-padding-32">
    <div class="w3-bar">
      <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
      <a href="#" class="w3-bar-item w3-black w3-button">1</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>
    </div>
  </div>   
  
    </div>
    </main>

<?php
include_once 'hb_footer.inc';