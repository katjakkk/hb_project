<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> HB LOGIN </title>
    
    <link rel="stylesheet" href="hb_style.css">
</head>
<body>
    
     <h1><br>Henkilökohtainen Budjetointi</h1>

     <img src="http://henkilokohtainenbudjetointi.fi/wp-content/uploads/2017/01/logokuva_oranssi_levea.jpg" alt="HB Logo" width="100%" height="100%">

     <?php
     $config = parse_ini_file('../../config.ini');
     $connection = mysqli_connect($config['dbaddr'],$config['usernamecd'],$config['password'],$config['dbname']);

     //jos menee pieleen, virheilmoitus
     if($connection === false){
         echo "hups, jokin meni pieleen.";
         exit("Yhteyttä kantaan ei voitu muodostaa");
     }

     mysqli_set_charset($connection,"utf-8");
     $username = mysqli_real_escape_string($connection,$_POST['username']); /* prevents a bit of SQL injection */

     $qry=mysqli_query($connection,"SELECT * FROM hb_user WHERE usercode='$username'");
     if(mysqli_num_rows($qry)==1){
         header("LOCATION:hb_palvelut.php");
     }
     else {
         echo "<div id='error'> Virhe, käyttäjää $username ei löydy.</div>";
     }
     ?>

   <form id="mikko2" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
       <h2>Kirjaudu sisään</h2>
    Asiakaskoodi: <input id="mikko1" type="password" name="username">
       <br><br>
       <input id="mikko" type="submit" name="clicked" value="Kirjaudu">
    </form>

<h1>
    <br><br><br><br><br><br>
</h1>
    </body>
</html>
