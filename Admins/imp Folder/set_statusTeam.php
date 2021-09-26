<?php 
//session_start();
// include 'OTT_DB.php';

// $uid= $_SESSION['uid'];
// $time = time()+10;

// $sql= mysqli_query($con,"UPDATE users_db SET last_login = $time WHERE users_Id = $uid");

?> 



<?php 
require '../../Main Folder/Db.php';
ini_set('session.save_path', '../Sessions');

// if(!isset($_SESSION['uid'])){
//   die();
// }
date_default_timezone_set('Asia/Kolkata');
session_start();

 $tid = $_SESSION['tid'];

$time = time()+5;
//$timestamp= now();
//echo $timestamp;

//echo "<br>";
//echo "Hello";
//
$datum = new DateTime();
$startTime = $datum->format('Y-m-d H:i:s');
echo $startTime;
echo $tid; 

$query= "UPDATE teammembers SET last_login = $time, Timestamps='$startTime' WHERE Sr_no = '$tid'";
echo $query;
$sql= mysqli_query($con,$query);
if ($con->query($sql) === TRUE) {

    } else {
      echo "Error: ----->" . $sql . "<br>" . $con->error;
    }
    
?>