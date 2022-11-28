<?php 
// gets fighers stats: 
$db = mysqli_connect('localhost', 'root', '', 'ufc_database');

//if (isset($_POST['submit'])) {
//if($_SERVER['REQUEST_METHOD']== 'POST'){
    $fightid = $_POST['fightid'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];
    $userid = $_POST['userid'];

    


    //$query = "INSERT INTO ratings  (UserID, FightID, points, comments) 
              //VALUES ('$userid', '$fightID', '$rating', '$review')";
     //$query = "INSERT INTO ratings  (UserID, FightID, points, comments) 
            // VALUES (1, 3, 2, 'this is a bad fight')";

    //$query = "INSERT INTO ratings  (UserID, FightID, points, comments) 
              //VALUES (1, '$fightid', '$rating', '$review')";
    
    $query = "INSERT INTO ratings  (UserID, FightID, points, comments) 
              VALUES ('".$userid."', '".$fightid."', '".$rating."', '".$review."')";
    
  
    $result = mysqli_query($db, $query);

    echo 1;
   
    


//else {

    //header('location: .');
    //exit();
//}

  
    
  
  
 
    
 
  

?>