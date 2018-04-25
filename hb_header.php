<!DOCTYPE html>
<html lang= "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
    <link rel="stylesheet" href="css/hb_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="icon" href="http://henkilokohtainenbudjetointi.fi//wp-content/themes/digital-pro/favicon.png" />
    </head>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
.w3-bar-block .w3-bar-item {padding:20px}
    /*h3 {font-size: }*/
</style>

<body>

<!-- Sidebar (hidden by default) -->
    <nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px;background-color:white; color:orange;" id="mySidebar">
          <a href="javascript:void(0)" onclick="w3_close()"
        class="w3-bar-item w3-button">Sulje</a>
        <a href="hb_palvelut.php" <?php echo ($page == "Palvelut") ? 'class="active"' : ''; ?>onclick="w3_close()" class="w3-bar-item w3-button">Palvelut</a>
        <a href="hb_budjetti.php" <?php echo ($page == "Budjetti") ? 'class="active"' : ''; ?> onclick="w3_close()" class="w3-bar-item w3-button">Budjetti</a>
        <a href="hb_historia.php" <?php echo ($page == "Historia") ? 'class="active"' : ''; ?>  onclick="w3_close()" class="w3-bar-item w3-button">Historia</a>
    </nav>

<!-- Top menu -->
<div class="w3-top shadow" style="color:white; background-color:orange;">
  <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto color:orange;">
    <div class="orange w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
    <div class=" orange w3-right w3-padding-16 w3-margin-right w3-button" onclick="w3_open()"> &#9702;&#9702;&#9702;</div><div class="orange w3-center w3-padding-16"><?php echo $page; ?></div>
    
  </div>
</div>
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px " >
      
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
    

