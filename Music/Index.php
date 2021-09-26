<?php
require '../Main Folder/Db.php';
ini_set('session.save_path', '../Admins/Sessions');

session_start();


//if(!isset($_SESSION['mail'])){
//  //echo ($MainIndex);
// header($MainIndex);
//  die();
//};

$mail= $_SESSION['mail'];

$q= "SELECT * FROM users_db WHERE User_Email= '$mail'";
echo $q;
$plans;
$quariy = $con->query($q);
 $num = mysqli_num_rows($quariy);
 if($num>=0){
  while ( $row = mysqli_fetch_array($quariy) ) {
    
    $plans=$row['User_Plan'];  
 }}
 
 echo $plans."<br><br>";

 if($plans > 99){
     echo $plans;
          header('location: https://bvmentertainment.ml/Music/Music.php');
     die();
     
 }else{
     echo $plans;
     echo "updgrade";
     
     //$_SESSION['upgrade'] = " Please Upgrade your plans ";
     header('location : https://bvmentertainment.ml/ls/upgrade.php');
     die();
//     header('location: https://bvmentertainment.ml/Music/Music.php');
//     die();
 }


//header($MainIndex);
//die();


?>