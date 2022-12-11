<?php 
// gets fighers photo: 
require_once '../conn.php';

//if (isset($_POST['submit'])) {
if($_SERVER['REQUEST_METHOD']== 'POST'){

    $term = $_POST['query'];
    $url = 'https://api.bing.microsoft.com/v7.0/images/search/';
    // Replace the accessKey string value with your valid access key.
    $accessKey = 'yourkeyhere';
    
    
    $headers = "Ocp-Apim-Subscription-Key: $accessKey\r\n";
    $options = array ( 'http' => array (
                            'header' => $headers,
                            'method' => 'GET' ));
    
    
    $context = stream_context_create($options);

    
    
    $result = file_get_contents($url."?q=".urlencode($term)."?imageType=photo", false, $context); 
    $data = json_decode($result);
    
    
    
 
      
      if (is_array($data) || is_object($data)) {
           foreach($data as $key=>$value) {
          
          }
        }
        
   
    
    $rand = rand(0,10);
    
    $pic = $data->value[$rand]->contentUrl;
    
    
    echo '<img src = '.$pic. ' class="img-responsive" style ="width: 250px; height:250px;"   />';
    


    
    
    
    $headers = array();
    foreach ($http_response_header as $k => $v) {
        $h = explode(":", $v, 2);
        if (isset($h[1]))
            if (preg_match("/^BingAPIs-/", $h[0]) || preg_match("/^X-MSEdge-/", $h[0]))
                $headers[trim($h[0])] = trim($h[1]);
    }
    return array($headers, $result);
    

   
    
   
  
  } else {
    header('location: .');
    exit();
  }
  

?>
