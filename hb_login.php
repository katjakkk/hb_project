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
$username = mysqli_real_escape_string($yourconnection,$_POST['username']); /* prevents a bit of SQL injection */

/*$qry=mysqli_query($yourconnection,"SELECT * FROM admininfo WHERE username='$username' AND password='$password' AND status='customer'");

if(mysqli_num_rows($qry)==1){
header("LOCATION:CustomerPage.php");
}

else {
echo "Error! No user found.";
}*/
//$_SESSION['username'] = $username;
//header("location:redirectafterlogin.php"); 
    if($_POST["clicked"]) {
        header("location:hb_palvelut.php");
        
    }
        ?>
    </pre>
    </body>
</html>
