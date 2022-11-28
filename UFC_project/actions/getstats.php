<?php 
// gets fighers stats: 
require_once '../conn.php';

//if (isset($_POST['submit'])) {
if($_SERVER['REQUEST_METHOD']== 'POST'){
    $inpText = $_POST['query'];
   
    $query = "SELECT * FROM fighter WHERE fighter_name LIKE '%".$_POST["query"]."%' " ;
    
  
    
  
    $result = mysqli_query($db, $query);
    $row=mysqli_fetch_array($result);
    


    
    echo  '<h4><b>Nickname :</b>' . $row['fighter_nick'] .  '</h4>';
    echo  '<h4><b>Weightclass :</b>' . $row['fighter_class'] .  '</h4>';
    echo  '<h4><b>Location :</b>' . $row['fighter_loc'] .  '</h4>';
    echo  '<h4><b>Country :</b>' . $row['fighter_country'] .  '</h4>';
    

   
    echo  '<h4><b>Height :</b>' . $row['fighter_height'] .  '</h4>';
    echo  '<h4><b>Weight :</b>' . $row['fighter_weight'] .  '</h4>';
    echo  '<h4><b>Reach :</b>' . $row['fighter_reach'] .  '</h4>';
    echo  '<h4><b>Stance :</b>' . $row['fighter_stance'] .  '</h4>';
    
    
    
    echo  '<h4><b>DOB :</b>' . $row['fighter_dob'] .  '</h4>';
    echo  '<h4><b>Strikes landed per/min :</b>' . $row['fighter_slpm'] .  '</h4>';
    echo  '<h4><b>Strike accuracy :</b>' . $row['fighter_stracc'] .  '</h4>';
    echo  '<h4><b>Strike defence  :</b>' . $row['fighter_strdef'] .  '</h4>';
  

   
    echo  '<h4><b>Take down average :</b>' . $row['fighter_tdavg'] .  '</h4>';
    echo  '<h4><b>Take down accuracy :</b>' . $row['fighter_tdacc'] .  '</h4>';
    echo  '<h4><b>Take down defence :</b>' . $row['fighter_tddef'] .  '</h4>';
    echo  '<h4><b>Submission average :</b>' . $row['fighter_subavg'] .  '</h4>';
    
  
  
  
  } else {
    header('location: .');
    exit();
  }
  

?>