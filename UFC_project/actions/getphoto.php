

<?php 
/*
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
  
*/


// gets fighers photo: 
require_once '../conn.php';

//if (isset($_POST['submit'])) {
if($_SERVER['REQUEST_METHOD']== 'POST'){

    $term = $_POST['query'];
    $url = 'https://api.bing.microsoft.com/v7.0/images/search/';
    // Replace the accessKey string value with your valid access key.
    $accessKey = 'APIKEY';
    
    
    $headers = "Ocp-Apim-Subscription-Key: $accessKey\r\n";
    $options = array ( 'http' => array (
                            'header' => $headers,
                            'method' => 'GET' ));
    
    
    $context = stream_context_create($options);

    
    
    $result = file_get_contents($url."?q=".urlencode($term)."?imageType=photo", false, $context); 
    $data = json_decode($result);
   
    $contextUrl = [];
    
    
      
      if (is_array($data) || is_object($data)) {
           foreach($data as $key=>$value) {
           
          }
        }
        
   
    
    $rand = rand(0,10);
    
    $pic = $data->value[$rand]->contentUrl;
    
    
    echo '<img src = '.$pic. ' class="img-responsive" style ="width: 300px; height:300px;"   />';
    


    
    
    
    $headers = array();
    foreach ($http_response_header as $k => $v) {
        $h = explode(":", $v, 2);
        if (isset($h[1]))
            if (preg_match("/^BingAPIs-/", $h[0]) || preg_match("/^X-MSEdge-/", $h[0]))
                $headers[trim($h[0])] = trim($h[1]);
    }
    return array($headers, $result);
    

   
    
    $new_offset = 0;
   

    while( $new_offset <= 1) {
         
    }
   
  
  } else {
    header('location: .');
    exit();
  }
  




?>
