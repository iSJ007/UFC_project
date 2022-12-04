<?php 
// gets fighers photo: 
require_once '../conn.php';

//if (isset($_POST['submit'])) {

    
    $userid = $_POST['userid'];
    $query = "SELECT f.Id ,u.Fights ,f.points, f.comments FROM ratings as f
    inner JOIN fights as u ON (f.FightID = u.fight_id)
    WHERE f.UserID = '".$userid."'";
    $result = mysqli_query($db, $query);
    

     
    if (mysqli_num_rows($result) > 0) {
     
      echo '';
      
      echo '<table class="table table-striped">';
      
      echo '<thead  >';
        echo '<tr>';
          
          echo '<th scope="col">Fight:</th>';
          echo '<th scope="col">Score:</th>';
          echo '<th scope="col">Reviews:</th>';
          echo '<th scope="col">Edit:</th>';
          echo '<th scope="col">Delete:</th>';
        echo '</tr>';
      echo '</thead>';
      echo '<tbody>';
     while ($rows=mysqli_fetch_array($result) ) {
      echo '<tr><td>' . $rows['Fights'] . '</td> <td>'  . ($rows['points']) ,"/5" .  '</td>  <td>'  . $rows['comments'] . '</td>
      <td>  <a  href = "actions/editbox.php?id='.$rows["Id"].    ' " class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a> </td> 
      <td><a href = "actions/delete.php?id='.$rows["Id"].    ' " class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a> </td>
      </tr>' ;
     }
     echo '</tbody>';
     echo '</table>';
    }
    

    
  
 

?>