<?php
require_once '../conn.php';
// autocomplete search box

if (isset($_POST['query'])) {
  $inpText = $_POST['query'];
  $output = '';
  $query = "SELECT Fights from fights where Fights LIKE '%".$_POST["query"]."%' " ;
 

  $result = mysqli_query($db, $query);
  

  if (mysqli_num_rows($result) > 0 ) 
    while ($row=mysqli_fetch_array($result)) {
    echo '<a href = "#" id = "fightauto" class = "list-group-item list-group-item-action border-1">' . $row['Fights'] . '</a>';
    }
  } else {
      echo '<p class="list-group-item border-1">No Record</p>';
      $output .= '<li> Fight not found </li>';
  }
  
?>