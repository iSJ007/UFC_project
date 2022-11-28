<?php 
// gets fighers stats: 
$db = mysqli_connect('localhost', 'root', '', 'ufc_database');

//if (isset($_POST['submit'])) {
if($_SERVER['REQUEST_METHOD']== 'POST'){
    $inpText = $_POST['query'];
   
    $query = "SELECT * FROM fights WHERE Fights LIKE '%".$_POST["query"]."%' " ;
    
  
    
  
    $result = mysqli_query($db, $query);
    $row=mysqli_fetch_array($result);
    
    session_start();
    $_SESSION['fightid'] = $row['fight_id'] ;
  
    echo'<h4 id = "fightid" style = color:white;>' . $row['fight_id'] .  '</h4>';
    echo  '<h4><b>Left odds :</b>' . $row['R_odds'] .  '</h4>';
    echo  '<h4><b>Right odds :</b>' . $row['B_odds'] .  '</h4>';
    echo  '<h4><b>data :</b>' . $row['date'] .  '</h4>';
    echo  '<h4><b>Fight Location :</b>' . $row['fight_location'] .  '</h4>';
    echo  '<h4><b>Fight Weightclass :</b>' . $row['fight_weightclass'] .  '</h4>';
    echo  '<h4><b>Finish :</b>' . $row['finish'] .  '</h4>';
    echo  '<h4><b>Winner :</b>' . $row['fight_winner'] .  '</h4>';
    
  
  
  
  } else {
    header('location: .');
    exit();
  }
  

?>