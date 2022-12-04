<?php
require_once '../conn.php';
// autocomplete search box

if (isset($_POST['query'])) {
  $inpText = $_POST['query'];
  
  $query = "SELECT fighter_name from fighter where fighter_name LIKE '%".$_POST["query"]."%' " ;
 

  $result = mysqli_query($db, $query);
  

  if (mysqli_num_rows($result) > 0 ) 
    while ($row=mysqli_fetch_array($result)) {
    echo '<a id = "ato1"  class = "list-group-item list-group-item-action border-1">' . $row['fighter_name'] . '</a>';
    }
  } else {
      echo '<p class="list-group-item border-1">No Record</p>';
      
  }
  
?>