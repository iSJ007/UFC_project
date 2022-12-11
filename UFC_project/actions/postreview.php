<?php 

$db = mysqli_connect('localhost', 'root', '', 'ufc_database');


    $fightid = $_POST['fightid'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];
    $userid = $_POST['userid'];

    


    
    if( $review != NULL ) {
    $query = "INSERT INTO ratings  (UserID, FightID, points, comments) 
              VALUES ('".$userid."', '".$fightid."', '".$rating."', '".$review."')";
    
  
    $result = mysqli_query($db, $query);

    echo 1;
   }
    



  
    
  
  
 
    
 
  

?>