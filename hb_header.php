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
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
.w3-bar-block .w3-bar-item {padding:20px}
</style>

<body>

<!-- Sidebar (hidden by default) -->
    <nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px;background-color:orange;" id="mySidebar">
          <a href="javascript:void(0)" onclick="w3_close()"
        class="w3-bar-item w3-button">Close Menu</a>
        <a href="hb_palvelut.php" <?php echo ($page == "Palvelut") ? 'class="active"' : ''; ?>onclick="w3_close()" class="w3-bar-item w3-button">Palvelut</a>
        <a href="hb_budjetti.php" <?php echo ($page == "Budjetti") ? 'class="active"' : ''; ?> onclick="w3_close()" class="w3-bar-item w3-button">Budjetti</a>
        <a href="hb_historia.php" <?php echo ($page == "Historia") ? 'class="active"' : ''; ?>  onclick="w3_close()" class="w3-bar-item w3-button">Historia</a>
    </nav>

<!-- Top menu -->
<div class="w3-top">
  <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
    <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
    <div class="w3-right w3-padding-16 w3-margin-right">Profile</div>
    
  </div>
</div>
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px " >
        <h2 class="w3-center" ><?php echo $page; ?></h2>
    </div>
<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>
