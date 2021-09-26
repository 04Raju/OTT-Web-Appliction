<?php 
//session_start();
// include 'OTT_DB.php';

// $uid= $_SESSION['uid'];
// $time = time()+10;

// $sql= mysqli_query($con,"UPDATE users_db SET last_login = $time WHERE users_Id = $uid");

?> 

<?php 
include 'OTT_DB.php';
ini_set('session.save_path', '../Sessions');

// if(!isset($_SESSION['uid'])){
//   die();
// }
session_start();


$uid= $_SESSION['uid'];
$time = time()+5;

echo $uid;

$sql= mysqli_query($con,"UPDATE users_db SET last_login = $time WHERE users_Id = $uid");

?>