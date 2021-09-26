<?php
//$hostname = "http://localhost/admin";



//$con=mysqli_connect("localhost","root","","ott");
$con=mysqli_connect("localhost","u710183214_BVM","Bvmentertainment@2021","u710183214_ott");
//$con=mysqli_connect("sql201.unaux.com","unaux_27887838","R@ju@1999","unaux_27887838_portfolio");
// echo $con;
// Check connection
if ($con->connect_error) {
 // echo 'Connection Failed';
  die("Connection failed: " . $con->connect_error);
}

//echo "Connected successfully";


// $MainLogin = "location:http://192.168.0.104/bvm-entertainment/ls/login.php";
// $MainIndex ="Location: http://192.168.0.104/bvm-entertainment/index.php";
// $MainPanel = "Location: http://192.168.0.104/bvm-entertainment/main.php";
// $MainMember = "Location: http://localhost/bvm-entertainment/ls/membership.php";


// $CallBack = "http://localhost/bvm-entertainment/py/pgResponse.php";
// $AdminLogin = "Location: http://192.168.0.104/bvm-entertainment/Admins/Dashboard.php";
// $AdminLogout ="Location: http://192.168.0.104/bvm-entertainment/Admins/index.php";


$MainLogin = "location:https://bvmentertainment.ml/ls/login.php";
$MainIndex ="Location: https://bvmentertainment.ml/index.php";
$MainPanel = "Location: https://bvmentertainment.ml/main.php";
$MainMember = "Location: https://bvmentertainment.ml/ls/membership.php";


$CallBack = "https://bvmentertainment.ml/py/pgResponse.php";
$AdminLogin = "Location: https://bvmentertainment.ml/Admins/Dashboard.php";
$AdminLogout ="Location: https://bvmentertainment.ml/Admins/index.php";
?>

