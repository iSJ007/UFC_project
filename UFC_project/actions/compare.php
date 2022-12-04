<?php 

require_once '../conn.php';

$leftf = $_POST['leftf'];
$rightf = $_POST['rightf'];


function getmaxstat($fightername) {
include  '../conn.php'; 
$query = "SELECT s.maxstats as maxstat from (
  select a.fighter_id, f.fighter_name, SUM(a.val) as maxstats
  FROM (
   SELECT sd.fighter_slpm as val , sd.fighter_id  FROM fighter sd UNION ALL
   SELECT sd.fighter_stracc as val, sd.fighter_id  FROM fighter sd UNION ALL
   SELECT sd.fighter_strdef as val, sd.fighter_id  FROM fighter sd UNION ALL
   SELECT sd.fighter_tdavg as val , sd.fighter_id  FROM fighter sd UNION ALL
   SELECT sd.fighter_tdacc as val , sd.fighter_id  FROM fighter sd   UNION ALL 
   SELECT sd.fighter_tddef as val , sd.fighter_id  FROM fighter sd   UNION ALL 
   SELECT sd.fighter_subavg as val, sd.fighter_id  FROM fighter sd ) AS a, fighter as f
   where a.fighter_id = f.fighter_id and fighter_name LIKE '".$fightername."') AS s
   ;

 ";
$r = mysqli_query($db, $query);

$lefts = mysqli_fetch_assoc($r);

$leftstat = doubleval($lefts['maxstat']);
return $leftstat;
}

function getid ($fightername)  {
  include  '../conn.php';
  $query = " SELECT fighter_id from fighter where fighter_name LIKE '".$fightername."'";
  $r = mysqli_query($db, $query);
  
  $l = mysqli_fetch_assoc($r);
  
  $leftid = intval($l['fighter_id']);
  return $leftid;
}

function getrank ($fighterid) {
    include  '../conn.php';
    $query = " SELECT p4p.rank as r from p4p where fighter_id = '".$fighterid."'";
    $r = mysqli_query($db, $query);
    
    $l = mysqli_fetch_assoc($r);


    if (mysqli_num_rows($r) > 0 ) {
     $leftid = intval($l['r']);
     return $leftid;
 }
    
    else {
        return NULL;
    }

}

$leftid = getid($leftf);
$rightid = getid($rightf);

$leftstat = getmaxstat($leftf);
$rightstat = getmaxstat($rightf);


$leftrank = getrank($leftid);
$rightrank = getrank($rightid);

if ($rightrank == NULL & $leftrank != NULL) {
  echo $leftf;

}
else if ($rightrank != NULL & $leftrank == NULL) {
       echo $rightf;
}

else if($rightrank == NULL & $leftrank == NULL) {
        if ($leftstat > $rightstat) {
             echo $leftf;
        }
        else {
          echo $rightf;
        }
}

else if ($rightrank != NULL & $leftrank != NULL) {
        if($leftrank < $rightrank & $leftstat >= $rightstat) {
            echo $leftf;
        }
        else if ($leftrank > $rightrank & $leftstat <= $rightstat) {
            echo $rightf;
        }

        else if ($leftrank < $rightrank & $leftstat <= $rightstat) {
              if (($leftstat + 3) >= $rightstat & $leftrank < ($rightrank - 20)) {
                 echo $leftf;
              } else {
                echo $rightf;

              }
         }
         else if ($rightrank < $leftrank & $rightstat <= $leftstat) {
          if (($rightstat + 3) >= $leftstat & $rightrank < ($leftrank - 20)) {
            echo $rightf;
         } else {
           echo $leftf;

         }
    }
        }

       













  
























?>

