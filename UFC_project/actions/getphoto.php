<?php 
// gets fighers photo: 
require_once '../conn.php';

//if (isset($_POST['submit'])) {
if($_SERVER['REQUEST_METHOD']== 'POST'){
    
    $inpText = $_POST['query'];
    $ch = curl_init();
   
    $url = "https://imsea.herokuapp.com/api/1?q=".urlencode($inpText);
    //$url = "https://source.unsplash.com/1600x900/?glass";
    
 
    //set curl options
    curl_setopt($ch, CURLOPT_URL, $url);
 
    //For accessing the https sites
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
    //For saving the output in a variable (which we create during execution) , instead of displaying the webpage. To see that output , just echo it out.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
    //run curl (i.e. execute curl resource
    $output = curl_exec($ch);   
    
    
    
    
    $data = json_decode($output);
   

    foreach($data as $array) {
        
          if (is_array($array) || is_object($array)) {
               foreach($array as $key=>$value) {
                  
               }
            }
        }
        
        echo '<img src = '.$value. ' class="img-responsive" style ="width: 300px; height:300px;"   />';
        
        ?>
        
        <?php
        


  
  } else {
    header('location: .');
    exit();
  }
  

?>
