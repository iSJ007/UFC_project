<?php 

$db = mysqli_connect('localhost', 'root', '', 'ufc_database');


    $reviewid = $_POST['reviewid'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];
    

    
    $query = "UPDATE ratings SET points = '".$rating."', comments = '".$review."' WHERE Id = '".$reviewid."'";
    $result = mysqli_query($db, $query);
    echo 1;
   
    
