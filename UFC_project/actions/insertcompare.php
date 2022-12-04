<?php 
require_once '../conn.php';
session_start(); 
$username = $_SESSION['username'];
$r = mysqli_query($db, "SELECT id FROM users WHERE username='$username'");
$userid = mysqli_fetch_assoc($r);
$user_id = $userid['id'];


function getid ($fightername)  {
    include  '../conn.php';
    $query = " SELECT fighter_id from fighter where fighter_name LIKE '".$fightername."'";
    $r = mysqli_query($db, $query);
    
    $l = mysqli_fetch_assoc($r);
    
    $leftid = intval($l['fighter_id']);
    return $leftid;
  }

$leftf = getid($_POST['leftf']);
$rightf = getid($_POST['rightf']);
$winner = getid($_POST['winner']);


if( $winner != NULL ) {
    $query = "INSERT INTO compare  (userid, fighterid1, fighterid2, winner) 
              VALUES ('".$user_id."', '".$leftf."', '".$rightf."', '".$winner."')";
    
  
    $result = mysqli_query($db, $query);

    echo 1;
}