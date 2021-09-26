<?php
ini_set('session.save_path', '../Admins/Sessions');

session_start();
require '../Main Folder/Db.php';


$msgs="";




if(isset($_SESSION['Message'])){
  $msgs= $_SESSION['Message'];
  echo $msgs;
}else{

}

if(isset($_POST['submit'])){
  $mail=$_POST['mail'];
  $pass=$_POST['pass'];
$hash='';

$date= date("d/m/Y");

$check=mysqli_num_rows(mysqli_query($con,"SELECT * from users_db where User_PlanExp >= CURDATE()"));
// echo $check;
if($check>0){

  // $sql ="UPDATE users_db SET User_Status='Expired',User_Payment='Not-Renew',
  // User_Ordid='Not-Renew' Where User_PlanExp >= '$date'";

  $sql= "UPDATE users_db SET User_Status='Expired',User_Payment='Not-Renew', User_Ordid='Not-Renew' Where User_PlanExp >= CURDATE()";


   //echo $sql;
       
if ($con->query($sql) === TRUE) {
 // echo "Saved Sucessfully Bro";
  //header("Location: http://localhost/ott-Application/Admins/AddArtitis.php");
  } else {
  echo "Error: ----->" . $sql . "<br>" . $con->error;
  }
}
else{
  echo "";
}







$sql ="SELECT * from users_db Where User_Email='$mail'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    // echo $row['User_Password'];
    $hash=$row['User_Password'];
    $Status =$row['User_Status'];
    $expdate=$row['User_PlanExp'];
    $payment=$row['User_Payment'];
  }
} else {
  //echo "0 results";
}



//echo $date;
//echo '<br>'.$expdate;

//echo $hash;
  $sec_pass =password_verify($pass,$hash);
  if($sec_pass){


  $sql="SELECT * from users_db where User_Email='$mail' And User_Status='Active'";
    $check=mysqli_num_rows(mysqli_query($con,"SELECT * from users_db where User_Email='$mail' And User_Status='Active'"));
    $res = mysqli_query($con,$sql);
    if($check>0){
   $row=mysqli_fetch_assoc($res);
   $uid=$row['users_Id']; 
   
  $_SESSION["uid"]=$uid;
  $_SESSION["mail"]=$mail;
  $_SESSION['fname']= $row['User_name'];

  
  if(isset($_POST['remember'])){
    setcookie('usernames',$mail,time()+60*60*24*365);
    setcookie('passwords',$pass,time()+60*60*24*365);


}else{
    setcookie('usernames',$mail,30);
    setcookie('passwords',$pass,30);
}
//   $time = time()+10;

// $sql= mysqli_query($con,"UPDATE users_db SET last_login = $time WHERE users_Id = $uid");
   header($MainPanel);
 
  die();
 

 }
 else{
  if (isset($_SESSION['mail'])) {

    // it does; output the message
    echo 'session is set';
    echo $_SESSION['mail'];

    // remove the key so we don't keep outputting the message
    unset($_SESSION['mail']);
}
 //echo $mail;
  $_SESSION["mail"]=$mail;


  //header("Location: http://192.168.0.104/ott-Application/ls/membership.php");
  header($MainMember);
  die();
    
  // $msgs=  $mail."<br><Strong>Please Contact To Customer Care !!!</strong>" ;
   //echo $mssg;
 }
  }
  else{
        $msgs="Invalid Email or Password !!!";
  }

// echo $mail;
// echo $pass;
// echo $sec_pass;

// $check=mysqli_num_rows(mysqli_query($con,"SELECT * from users_db where User_Email='$mail' And User_Password='$sec_pass'"));
// if($check>0){
  
//   header("Location: http://localhost/ott-Application/main.php");
// }
// else{
//   $mssg="Invalid User ";
//   echo $mssg;
// }

  
  
}
$users_cookie='';
$passwd_cookie='';
$set_remembers='';
if(isset($_COOKIE['usernames']) && isset($_COOKIE['passwords'])){
    $users_cookie= $_COOKIE['usernames'];
    $passwd_cookie= $_COOKIE['passwords'];
    $set_remembers = "checked='checked'";
}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
 <title>LOGIN-FORM</title>
  <meta charset="utf-8">
     <link rel="icon" type="image/png" href="../Images/Favicon/favicon.ico"/>
  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="Images/shopping-cart_icon-icons.com_60593.png">
  <link rel="stylesheet" type="text/css" href="CSS/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="row px-3">
      <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
        <div class="img-left d-none d-md-flex">
          <!-- <img src="https://source.unsplash.com/1600x600/?computer,programming"> -->
        </div>

        <div class="card-body">
        <?php echo $msgs;?>
          <h4 class="title text-center mt-4">
            Login into account
          </h4>
          <form class="form-box px-3" action="" method="POST">
            <div class="form-input">
              <span><i class="fa fa-envelope-o"></i></span>
              <input type="email" name="mail" placeholder="Email Address" autocomplete="off" tabindex="10" value='<?php echo $users_cookie?>' required>
            </div>
            <div class="form-input">
              <span><i class="fa fa-key"></i></span>
              <input type="password" name="pass"autocomplete="off" placeholder="Password" value='<?php echo $passwd_cookie;?>' required>
            </div>

            <div class="mb-3">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" <?php echo $set_remembers;?> id="cb1"  name="remember">
                <label class="custom-control-label" for="cb1">Remember me</label>
              </div>
            </div>

            <div class="mb-3">
              <button type="Submit" name="submit" class="btn btn-block text-uppercase">
                Login
              </button>
            </div>

            <div class="text-right">
              <a href="forget.php" class="forget-link">
                Forget Password?
              </a>
            </div>
 
            

            <hr class="my-4">

            <div class="text-center mb-2">
              Don't have an account?
              <a href="Register.php" class="register-link">
                Register here
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>