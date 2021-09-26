<?php
require '../Main Folder/Db.php';
$msgs="";

ini_set('session.save_path', '../Admins/Sessions');

session_start();


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

   echo $sql;
       
if ($con->query($sql) === TRUE) {
 // echo "Saved Sucessfully Bro";
  //header("Location: http://192.168.0.104/ott-Application/Admins/AddArtitis.php");
  } else {
  echo "Error: ----->" . $sql . "<br>" . $con->error;
  }
}
else{
  echo "";
}





$sql= "SELECT * FROM teammembers WHERE Email = '$mail' AND Password = '$pass'";
//echo $sql;
   
 $result = mysqli_query($con, $sql);
 $num= mysqli_num_rows($result);
 if($num ==1){
echo "inside 1";
  
  if(isset($_POST['remember'])){
    setcookie('username',$mail,time()+60*60*24*365);
    setcookie('password',$pass,time()+60*60*24*365);


}else{
    setcookie('username',$mail,30);
    setcookie('password',$pass,30);
}
     $_SESSION['username']= $mail;
     $sql="SELECT * from teammembers where Email='$mail'";
     //echo $sql;
     $check=mysqli_num_rows(mysqli_query($con,$sql));
     $res = mysqli_query($con,$sql);
     if($check>0){
    $row=mysqli_fetch_assoc($res);
    $Tid=$row['Sr_no']; 
    $Role= $row['Role'];
    $FullName= $row['Full_Name'];

     $_SESSION['tid']= $Tid;
     $_SESSION['role']=$Role;
     $_SESSION['fullname']=$FullName;
     $_SESSION['mailId']= $mail;
 
     header($AdminLogin);
     //header("Location: http://192.168.0.104/ott-Application/ls/membership.php");
     die();
    
 }else{
  
     echo 'Invalid Email Address or Password';
     
 }




//echo $date;
//echo '<br>'.$expdate;

//echo $hash;
//   $sec_pass =password_verify($pass,$hash);
//   if($sec_pass){

// if(isset($_POST['remember'])){
//     setcookie('username',$mail,time()+60*60*24*365);
//     setcookie('password',$pass,time()+60*60*24*365);


// }else{
//     setcookie('username',$mail,30);
//     setcookie('password',$pass,30);
// }


//   $_SESSION["mail"]=$mail;
// //   $time = time()+10;

// // $sql= mysqli_query($con,"UPDATE users_db SET last_login = $time WHERE users_Id = $uid");
//    header("Location: http://192.168.0.104/ott-Application/Admins/Dashboard.php");
//   //header("Location: http://192.168.0.104/ott-Application/ls/membership.php");
//   die();
 

 //}
//  else{
 
//  }
  }
  else{
        $msgs="Invalid Email or Password !!!";
  }



}
$user_cookie='';
$pass_cookie='';
$set_remember='';
if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
    $user_cookie= $_COOKIE['username'];
    $pass_cookie= $_COOKIE['password'];
    $set_remember = "checked='checked'";
}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
 <title>LOGIN-FORM</title>
  <meta charset="utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="Images/shopping-cart_icon-icons.com_60593.png">
  <link rel="stylesheet" type="text/css" href="../ls/CSS/style.css">
  <link rel="icon" type="image/png" href="../Images/Favicon/favicon.ico"/>
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
            Login for Team / Admin
          </h4>
          <form class="form-box px-3" action="" method="POST">
            <div class="form-input">
              <span><i class="fa fa-envelope-o"></i></span>
              <input type="email" name="mail" placeholder="Email Address" autocomplete="off" tabindex="10" value='<?php echo $user_cookie?>' required>
            </div>
            <div class="form-input">
              <span><i class="fa fa-key"></i></span>
              <input type="password" name="pass"autocomplete="off" placeholder="Password" value='<?php echo $pass_cookie;?>' required >
              <!-- <span>hide</span> -->
            </div>

            <div class="mb-3">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="cb1" <?php echo $set_remember;?> name="remember">
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

           
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>