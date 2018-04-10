<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> HB LOGIN </title>
    
    <link rel="stylesheet" href="css/hb_style.css">
</head>
<body>
    
     <h1>Henkilökohtainen budjetointi</h1>
   <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
       <h2>Kirjaudu sisään</h2>
    Käyttäjätunnus: <input type="password" name="pwd"><br>
       <input type="submit" name="clicked">
    </form>
    <pre>
    <?php
//$_SESSION['username'] = $username;
//header("location:redirectafterlogin.php"); 
    if($_POST["clicked"]) {
        header("location:hb_palvelut.php");
        
    }
        ?>
    </pre>
    </body>
</html>