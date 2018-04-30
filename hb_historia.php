<?php
session_start();
$page= "Historia";
include_once 'hb_header.php';
$config = parse_ini_file('../valmisledi/config.ini'); 

// Try and connect to the database
$connection = mysqli_connect($config['dbbaddr'],$config['usernamecd'],$config['password'],$config['dbname']);

// If connection was not successful, handle the error
if($connection === false) {
    // Handle error - notify administrator, log to a file, show an error screen, etc.
    echo "Connection to database failed :( ";
    exit ("If we have no database connection, this is end");
}else {
    mysqli_set_charset($connection, "utf8");
    $fetch= mysqli_query($connection,"SELECT * FROM hb_uses WHERE usercode=123456");
    //$fetch = mysqli_fetch_array($result);
   
}
$num=0;
 while ($row = mysqli_fetch_assoc($fetch)){
     $kk = $row['p_id'];
     $fetch1 = mysqli_query($connection, "SELECT c_id, s_id FROM hb_provide WHERE p_id = '$kk'");
     $row1 = mysqli_fetch_assoc($fetch1);
     $tt = $row1['c_id'];
     $fetch2 = mysqli_query($connection, "SELECT * FROM hb_company WHERE c_id = '$tt'");
     $row2 = mysqli_fetch_assoc($fetch2);
     $ss= $row1['s_id'];
    $fetch3 = mysqli_query($connection, "SELECT * FROM hb_service WHERE s_id = '$ss'");
     $row3 = mysqli_fetch_assoc($fetch3);
    echo "<div class='mm quarter2 kborder' style='background-color:white;'>";
     echo "Palvelu: " . $row3['s_name'] . "<br>Yritys: " . $row2['c_name'] . "<br>Kesto: " . $row['duration'] . "h<br>Käyttö pv: " . date('d.m.Y', strtotime($row['dateofuse'])); ;
     echo "<br>";
     echo "<p>Ostopv: " . date('d.m.Y', strtotime($row['bdate'])) . "</p>";
     echo "<p>Maksettu: " . $row['bought'] . "€</p>";
     echo "<form  method='post' action= '" . $_SERVER["PHP_SELF"] . "'>";
     echo "<button id='myBtnp$num name='arvioi'>Arvioi</button>";
     
     echo "</form></div>";
     
     ?>

    <div id="myModalp<?php echo $num;?>" class="modalp" data-modal=
                 "myModalp<?php echo $num;?>">
            <div class="modal-contentp">
            <span class="closep" data-modal=
                 "myModalp<?php echo $num;?>">&times;</span>
                <form id="modalFormp" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                   <p>Tähtien määrä (1-5): </p> <br><input type="number" min="1" max="5" name="stars"><br>
                    <p>Vapaa arviointi: </p><br><input type="text" maxlength="500" name="freetext">
                    <input id="button" type="submit" name="save" class= "btn btn-primary" value="Tallenna"><br><br>
                <input type="hidden" name="1" value="check">
                <input type="hidden" name="clicked" value="whatevs">
                <input type="hidden" name="selected_service" value="<?=$kk?>">
                <input type="hidden" name="modalOpen2" value="myModalp<?php echo $num;?>">
                </form>
 
<?php
     
     
     if(!empty($_POST['save']) && $_POST["selected_service"] == $kk){
      
         if(!empty($_POST['modalOpen2'])){
                   //suorita scripti
                 ?>
                <script>
                    document.getElementById('<?php echo $_POST['modalOpen2'];?>').style.display = 'block';
                </script>
            <?php
              }
         if(calcdate($row['dateofuse'])==false){
             echo "Et voi vielä arvioida palvelua.";
         }
     $num++;
 }
 }
     
   function calcdate($date) {
        $from = date('Y', strtotime($date));
        $to   = date('Y');
       if($to-$from <=0){
            $from = date('m', strtotime($date));
            $to   = date('m');
           if($to-$from<=0){
            $from = date('d', strtotime($date));
            $to   = date('d');
               if(to-from<=0){
                   return true;
               }else {
                   return false;
               }
       }else {
               return false;
           }
       }else{
           return false;
       }
   }  
?>


<main>
    <script>
   
var buttonmatches = document.querySelectorAll("button[id*='myBtnp']");
var modalmatches = document.querySelectorAll("div[id*='myModalp']");
var spanmatches = document.querySelectorAll("span.closep");

		
addlisteners();

// loop to add event listeners to all of the buttons

function addlisteners() {
	
var montako = modalmatches.length;

console.log(montako);


for (var i = 0; i < buttonmatches.length; i++) {
		
		console.log('sisällä ollaan');
		
        buttonmatches[i].addEventListener("click", function () {
        			
            // to open the correct modal
            // select the div that directly follows the buttonmatch div
            
            	var selector = "button[id='" + this.id  + "']" + " + button";
            console.log('I will query and open the next modal with this data:');
            console.log(selector);
            document.querySelector(selector).style.display = "block";
            
            // OR SINCE WE should have the same amount of matches is each array
            // but this can be error prone..
            //modalmatches[i].style.display = "block";
        });
        
        spanmatches[i].addEventListener("click", function (e) {
            
				var spani = e.target;		
				var kohde = spani.dataset.modal;
				console.log('in the close click'); 
				console.log(kohde);           
            // to close the correct modal
            var selector = "div[id='" + kohde  + "']";
           
            document.querySelector(selector).style.display = "none";
        });      
        
   }

}



// When the user clicks anywhere outside of the modal, close it
// you have to iterate through all of the modals to see if they are open

window.onclick = function(event) {

	for (var i = 0; i < modalmatches.length; i++) {
	    if (event.target == modalmatches[i]) {
    	   modalmatches[i].style.display = "none";
    	    break;
   	 	}
   	 }
}

    </script>
    <pre>
    
    

    </pre>
</main>
<?php
//include_once 'hb_footer.inc';
?>
