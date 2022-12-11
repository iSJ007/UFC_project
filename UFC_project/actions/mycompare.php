<?php 

require_once '../conn.php';

session_start(); 
$username = $_SESSION['username'];
$r = mysqli_query($db, "SELECT id FROM users WHERE username='$username'");
$userid = mysqli_fetch_assoc($r);
$user_id = $userid['id'];



    
    
    $query = "SELECT u.fighter_name as f1, b.fighter_name as f2 ,g.fighter_name as f3 FROM compare as f
    inner JOIN fighter as u ON (f.fighterid1 = u.fighter_id)
    inner JOIN fighter as b ON (f.fighterid2 = b.fighter_id)
    inner JOIN fighter as g ON (f.winner = g.fighter_id)
    WHERE f.userid = '".$user_id."' ";
    $result = mysqli_query($db, $query);
    

     
    if (mysqli_num_rows($result) > 0) {
     
      echo '';
      
      echo '<table class="table table-striped">';
      
      echo '<thead  >';
        echo '<tr>';
          
          echo '<th scope="col">Fighter 1:</th>';
          echo '<th scope="col">Fighter 2:</th>';
          echo '<th scope="col">Winner:</th>';
         
        echo '</tr>';
      echo '</thead>';
      echo '<tbody>';
     while ($rows=mysqli_fetch_array($result) ) {
      echo '<tr><td>' . $rows['f1'] . '</td> <td>'  . ($rows['f2']) .  '</td>  <td>'  . $rows['f3'] . '</td>
     
      
      </tr>' ;
     }
     echo '</tbody>';
     echo '</table>';
    }
    

    
  
 

?>