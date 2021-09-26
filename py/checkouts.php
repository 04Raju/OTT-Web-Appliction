<?php


ini_set('session.save_path', '../Admins/Sessions');
session_start();


if(!isset($_SESSION['mail'])){
  //echo ($MainIndex);
    echo "<h1 class='text-center' >Something WentWrong :( <br> Please Try Again After Some time</h1><br>";
    
     session_destroy();
  header("Refresh: 4; url=https://bvmentertainment.ml/ls/login.php");
  
// header($MainIndex);
  die();
};
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");


  require '../Main Folder/Db.php';

if(!isset($_GET['v'])){
  
  header($MainLogin);
  die();
};

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Merchant Check Out Page</title>
<meta name="GENERATOR" content="Evrsoft First Page">

 <link rel="icon" type="image/png" href="../Images/Favicon/favicon.ico"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<body>
<h2 class="heading text-center p-3" style="Color:Green">Checkout Page </h2>
<div class="container">
<div class="row">
<div class="col-md-6">

<div class="card">
<div class="card-body">



<?php  $orderid = "ORDS" . rand(10000,99999999)?>
<h5 md-5>Order ID : > <?php  echo $orderid ?></h5>

<?php

$mail= $_SESSION['mail'];


//echo $mail;

$id =0;


$id = intval($_GET['v']);

$sql="SELECT * from subscription_db Where subs_Id=$id";
$query= mysqli_query($con, $sql);

$row= mysqli_fetch_assoc($query);
 $duration = $_SESSION["duration"]= $row['Sub_Days'];
//echo $duration;
    ?>
<ul class="list-group mb-2">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Subscription Details</h6><br>
                <small class="text-muted">24/7 Technical Support </small><br>
                <small class="text-muted">Duration    :- <?php echo $row['Sub_Days'];?> days</small><br>
                
                <small class="text-muted">Description :- <?php echo $row['Sub_Desc']?></small><br>
                <small class="text-muted">Including GST 18%</small><br>
              </div>
              <!--<span class="text-muted">&#8377 1000</span>-->
            </li>
            <li class="list-group-item d-flex justify-content-between" style="color:black; font-size:20px;">
              <strong><span>Total (RS)</span></strong>
              <strong>&#8377 <?php echo $row['Sub_Amount']?>/-</strong>
            </li>
          </ul>
</div>


</div>

</div>
<div class="col-md-6">

<div class="card">
<div class="card-body">

	<form method="post" action="pgRedirect.php">
		
	<div class="row">
    <div class="col">
    <label for="exampleInputEmail1">First name</label>
     <input type="text"  class="form-control" placeholder="First name">
    </div>
    <div class="col">
    <label for="exampleInputEmail1">Last name</label>
      <input type="text"  class="form-control" placeholder="Last name">
    </div>
  </div>
<div class="form-group">
    <label for="exampleInputEmail1">phone</label>
    <input type="number" name="MSISDN" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your phone number" required>
  </div>
 <div class="form-group">
    <label >email</label>
    <input type="email" name="EMAIL"  class="form-control" aria-describedby="emailHelp" placeholder="Enter your Email Id" value="<?php echo $mail;?>" readonly required>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" name="Address" id="inputAddress" placeholder="Mumbai street 1" required>
  </div>
  
   <div class="form-row">
   
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control" required>
        <!-- <option selected>Maharashtra (MH)</option> -->
        
    <option>Andhra Pradesh (AP)</option>
    <option>Arunachal Pradesh (AR)</option>
		<option>Assam (AS)</option>
		<option>Bihar (BR)</option>
		<option>Chhattisgarh (CG)</option>
		<option>Goa (GA)</option>
		<option>Gujarat (GJ)</option>
		<option>Haryana (HR)</option>
		<option>Himachal Pradesh (HP)</option>
		<option>Jammu and Kashmir (JK)</option>
		<option>Jharkhand (JH)</option>
		<option>Karnataka (KA)</option>
		<option>Kerala (KL)</option>
		<option>Madhya Pradesh (MP)</option>
		<option selected >Maharashtra (MH)</option>
		<option>Manipur (MN)</option>
		<option>Meghalaya (ML)</option>
		<option>Mizoram (MZ)</option>
		<option>Nagaland (NL)</option>
		<option>Odisha(OR)</option>
		<option>Punjab (PB)</option>
		<option>Rajasthan (RJ)</option>
		<option>Sikkim (SK)</option>
		<option>Tamil Nadu (TN)</option>
		<option>Telangana (TS)</option>
		<option>Tripura (TR)</option>
		<option>Uttar Pradesh (UP)</option>
		<option>Uttarakhand (UK)</option>
		<option>West Bengal (WB)</option>
      </select>
    
    </div>
    <div class="form-group col-md-4">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity" placeholder="Thane" required>
    </div>
    <div class="form-group col-md-4">
      <label for="">Zip</label>
      <input type="text" class="form-control" id="" placeholder='400604'required>
    </div>
    
	<input type="hidden" id="ORDER_ID" name="ORDER_ID" value= <?php  echo $orderid ?>>
     <input type="hidden" id="CUST_ID" name="CUST_ID" value="RTS001">
     <input  type="hidden" id="INDUSTRY_TYPE_ID" name="INDUSTRY_TYPE_ID" value="Retail">
     <input  type="hidden" id="CHANNEL_ID" name="CHANNEL_ID" value="WEB">
     <input type="hidden" id="TXN_AMOUNT" name="TXN_AMOUNT" value=<?php echo $row['Sub_Amount']?>>
	 <!-- <input value="CheckOut" type="submit"	onclick=""> -->
	 <button type="submit" class="btn btn-primary btn-lg btn-block">Place-Order</button>
    
	</div>
	</form>
</body>
</html>