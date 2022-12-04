<?php 
// gets fighers photo: 
require_once '../conn.php';



    
    $fightid = $_POST['fightid'];
    $query = "SELECT u.username ,f.points, f.comments FROM ratings as f
    inner JOIN users as u ON (f.UserID = u.id)
    WHERE f.FightID = '".$fightid."'";
    $result = mysqli_query($db, $query);

    $sql = "SELECT avg(f.points) as avgpoints FROM ratings as f
    inner JOIN users as u ON (f.UserID = u.id)
    WHERE f.FightID = '".$fightid."'";
    $r = mysqli_query($db, $sql);
    $row=mysqli_fetch_array($r);
    $avgpoints = $row['avgpoints'];
    

     
    if (mysqli_num_rows($result) > 0) {
     
      
      
      echo '<table class="table table-striped">';
      
      echo '<caption style = "font-size:20px; font-color:black;"> Average score:' .($row['avgpoints']).  '</caption>';
      echo '<thead>';
        echo '<tr>';
          
          echo '<th scope="col">Username</th>';
          echo '<th scope="col">Score</th>';
          echo '<th scope="col">Review</th>';
        echo '</tr>';
      echo '</thead>';
      echo '<tbody>';
     while ($rows=mysqli_fetch_array($result) ) {
      echo '<tr><td>' . $rows['username'] . '</td> <td>'  . ($rows['points']) ,"/5" .  '</td>  <td>'  . $rows['comments'] . '</td> </tr>' ;
     }
     echo '</tbody>';
     echo '</table>';
    }
    

?>