<?php

require '../Main Folder/Db.php';

ini_set('session.save_path', '../Admins/Sessions');

session_start();
$msgs="";
$mssg="";
if(isset($_POST['submit'])){
  $mail=$_POST['mail'];
  $pass=$_POST['pass'];
  $fname=$_POST['fname'];
  $plan = 0;
  $date= 0;
  $expdate=0;
  $status = "Inactive";
  $payment ="Not yet";
  $ordid ="Not yet";

  $sec_pass = password_hash($pass,PASSWORD_BCRYPT);
 // echo $sec_pass;
  // echo $mail,$pass,$fname;

  $check=mysqli_num_rows(mysqli_query($con,"SELECT * from users_db where User_Email='$mail'"));
if($check>0){
   $msgs="<br> Email Id is already present";
  //echo $msgs;
// }
}
else{

  $sql ="INSERT into users_db (User_name,User_Email,User_Password,User_Plan,User_Date,User_PlanExp,User_Status,User_Payment,User_Ordid) 
  VALUES('$fname','$mail','$sec_pass','$plan','$date','$expdate','$status','$payment','$ordid')";
     
if ($con->query($sql) === TRUE) {
  $msgs="Register Sucessfully";
  

  $_SESSION["mail"]=$mail;

  //echo $_SESSION["mail"];
  header($MainMember);
  echo "Saved Sucessfully Bro";
  
} else {
  $msgs =  "Error: ----->" . $sql . "<br>" . $con->error;
  //echo "Error: ----->" . $sql . "<br>" . $con->error;
}

$con->close();
}
  


};

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>REGISTRATION-FORM</title>
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
        <?php echo $msgs?>
          <h4 class="title text-center mt-2">
            Register Now 
          </h4>
          <form class="form-box px-3"action="" method="POST">
            <div class="form-input">
                <span><i class="fa fa-user"></i></span>
                <input type="text" name="fname"  autocomplete="off" placeholder="Full Name" required>
              </div>
     
            <div class="form-input">
              <span><i class="fa fa-envelope-o"></i></span>
              <input type="email" name="mail" placeholder="Email Address"  autocomplete="off" tabindex="10" autocomplete="0" required>
            </div>
            
           
            <div class="form-input">
              <span><i class="fa fa-key"></i></span>
              <input type="password" name="pass" placeholder="Password"  autocomplete="off"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            </div>
          
             
            <div class="mb-3">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="cb1" required>
                 <label class="custom-control-label" for="cb1"></label>
                
                <a class="nav_link" data-toggle="modal" data-target="#Terms" style="color:blue">ACCEPT TERMS AND CONDITIONS </a>
              </div>
            </div>

            <div class="mb-3">
              <button type="submit" name="submit" class="btn btn-block text-uppercase">
                Register
              </button>
             </div>

            <div class="text-right">
              <a href="forget.php" class="forget-link">
                Forget Password?
              </a>
            </div>

           
            <hr class="my-4">

            <div class="text-center mb-2">
              Already have an account?
              <a href="login.php" class="register-link">
                login here
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
    <div class="Modals">
        <!-- Modal -->
<div class="modal fade" id="Terms"  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-lg modal-dialog-centered modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Terms & Conditions</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="container-fluid">
              <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Introduction
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
          <p>Welcome to <b>BVM - Tech Solution</b></p>
<p>These Terms of Service (“Terms”, “Terms of Service”) govern your use of our website located at <b>https://bvmentertainment.ml/</b> (together or individually “Service”) operated by <b>BVM - Tech Solution</b>.</p>
<p>Our Privacy Policy also governs your use of our Service and explains how we collect, safeguard and disclose information that results from your use of our web pages.</p>
<p>Your agreement with us includes these Terms and our Privacy Policy (“Agreements”). You acknowledge that you have read and understood Agreements, and agree to be bound of them.</p>
<p>If you do not agree with (or cannot comply with) Agreements, then you may not use the Service, but please let us know by emailing at <b>care@bvmtechsolution.com</b> so we can try to find a solution. These Terms apply to all visitors, users and others who wish to access or use Service.</p>
       
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Communications
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
    <p>By using our Service, you agree to subscribe to newsletters, marketing or promotional materials and other information we may send. However, you may opt out of receiving any, or all, of these communications from us by following the unsubscribe link or by emailing at care@bvmtechsolution.com.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Purchases
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
     <p>If you wish to purchase any product or service made available through Service (“Purchase”), you may be asked to supply certain information relevant to your Purchase including but not limited to, your credit or debit card number, the expiration date of your card, your billing address, and your shipping information.</p><p>You represent and warrant that: (i) you have the legal right to use any card(s) or other payment method(s) in connection with any Purchase; and that (ii) the information you supply to us is true, correct and complete.</p><p>We may employ the use of third party services for the purpose of facilitating payment and the completion of Purchases. By submitting your information, you grant us the right to provide the information to these third parties subject to our Privacy Policy.</p><p>We reserve the right to refuse or cancel your order at any time for reasons including but not limited to: product or service availability, errors in the description or price of the product or service, error in your order or other reasons.</p><p>We reserve the right to refuse or cancel your order if fraud or an unauthorized or illegal transaction is suspected.</p>

      </div>
    </div>
  </div>
                  
                   <div class="card">
    <div class="card-header" id="headingFour">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          Subscriptions
        </button>
      </h2>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
      <div class="card-body">
   <p>Some parts of Service are billed on a subscription basis ("Subscription(s)"). You will be billed in advance on a recurring and periodic basis ("Billing Cycle"). Billing cycles will be set depending on the type of subscription plan you select when purchasing a Subscription.</p><p>At the end of each Billing Cycle, your Subscription will automatically renew under the exact same conditions unless you cancel it or BVM - Tech Solution cancels it. You may cancel your Subscription renewal either through your online account management page or by contacting care@bvmtechsolution.com customer support team.</p>
      </div>
    </div>
  </div>
                       <div class="card">
    <div class="card-header" id="headingFive">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapseTwo">
         Refunds
        </button>
      </h2>
    </div>
    <div id="collapsefive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
      <div class="card-body">
         <p>We issue refunds for Contracts within <b>30 days</b> of the original purchase of the Contract.</p>
      </div>
    </div>
  </div>
                       <div class="card">
    <div class="card-header" id="headingSix">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapsesix" aria-expanded="false" aria-controls="collapseTwo">
         Declaration
        </button>
      </h2>
    </div>
    <div id="collapsesix" class="collapse" aria-labelledby="headingsix" data-parent="#accordionExample">
      <div class="card-body">
          1. We declare that this is a  project of students.<br><br>
2. Final year project for the sahyog college of management studies of IT
By the tybca students.<br><br>
3. Team members :-<br>
Raju jettappa<br>
Swapnil virkar<br>
Anil das<br>
Aakash burte<br>
Tejas kshrisagar<br>
<br><br>

4. This website or project is not for any income or revenue.<br><br>

5. We have just done this only for the project purpose.
<br><br>
6. Even if as we created for income then also we are gonna payout
Some percent of income to the charity and rest of has been
Refunded.<br>

      </div>
    </div>
  </div>
</div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
     
      </div>
    </div>
  </div>
</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script
</body>
</html>