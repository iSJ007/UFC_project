<?php 

$db = mysqli_connect('localhost', 'root', '', 'ufc_database');


    $reviewid = $_GET['id'];
    
    

    
    $query = "DELETE FROM ratings  WHERE Id = '".$reviewid."'";
    $result = mysqli_query($db, $query);

    if($result) {
      header("Location: ../review.php");
    }
    
   