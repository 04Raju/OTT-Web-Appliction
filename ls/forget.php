
<?php
ini_set('session.save_path', '../Admins/Sessions');

session_start();
require '../Main Folder/Db.php';
 include '../mail.php';




if(isset($_POST['submit'])){
//    echo "<pre>";
//    print_r($_POST);
//    echo "</pre>";
    
       $Fname= mysqli_real_escape_string($con, $_POST['ffname']);
   $Email= mysqli_real_escape_string($con, $_POST['femail']);
   
   
//    $check=mysqli_num_rows(mysqli_query($con,"SELECT * FROM users_db WHERE User_Email = '$Email' "));
//  
//    $res = mysqli_query($con,$sql);
//    if($check >0){
        $sql ="SELECT * from users_db Where User_Email='$Email'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    // echo $row['User_Password'];
    $id=$row['users_Id'];
   echo 'inside loop';
   
   $body ="<h4 style='text-aligin center' >Recover Your Password : $Fname</h4><br><br><div style='text-algin center'>"
                . "<a href='https://bvmentertainment.ml/ls/recover.php?p={$id}'style='padding:15px; color:white; background:green;'>Recover Now</a></div>";
        
        mailer('ehackers04@gmail.com',$body);
        
        header("Refresh:0");
  }

        
    }
   
    
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Recover-Password</title>
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
          <h4 class="title text-center mt-4">
            Recover Your Password
          </h4>
          <form class="form-box px-3" action="" method="POST">
          
           <div class="form-input">
                <span><i class="fa fa-user"></i></span>
                <input type="text" name="ffname" placeholder="Full Name" required>
              </div>
            <div class="form-input">
              <span><i class="fa fa-envelope-o"></i></span>
              <input type="email" name="femail" placeholder="Email Address" tabindex="10" required>
              
<!--              <input type="hidden" name="fotp" value=<%=randomInt%>-->
            </div>
            <div class="mb-3">
              <button type="submit" name="submit" class="btn btn-block text-uppercase">
                Submit
              </button>
              
            </div>
           
            <span style="color:#007bff;text-indent: 15em;"><i class="fa fa-arrow-left"></i></span>
            <a href="login.php" class="register-link">Back To Login</a>
           
            </div>
          

            <hr class="my-4">
        

          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>