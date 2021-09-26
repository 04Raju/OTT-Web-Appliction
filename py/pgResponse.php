<?php

ini_set('session.save_path', '../Admins/Sessions');

session_start();

if(!isset($_SESSION['mail'])){
  //echo ($MainIndex);
    echo "<h1 class='text-center' >Something WentWrong :( <br> Please Try Again After Some time</h1><br><strong class='text-center'> If amount is deduct then mail as on care@bvmtechsolution.com<strong>";
    
     session_destroy();
  header("Refresh: 20; url=https://bvmentertainment.ml/ls/login.php");
  
// header($MainIndex);
  die();
};
require '../Main Folder/Db.php';

header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");



// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");


$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;


 $mail= $_SESSION['mail'];
 //echo $mail;
 $duration = $_SESSION['duration'];
 //echo $duration;
 //$duration=7;
$sql="SELECT * from users_db Where User_Email='$mail'";
$query= mysqli_query($con, $sql);

$row= mysqli_fetch_assoc($query);
 $id=$row['users_Id'];
 //$id=19;
 //echo $id;
// echo '<pre>';
// print_r($_POST);
// die();
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	//echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
	//	echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
//		echo '<pre>';
//		 print_r($_POST);
		$oid = $_POST['ORDERID'];
		$format= $_POST['TXNAMOUNT'];
		$stauts ="Active";
		$Reponse = $_POST['RESPCODE'];
		$payment="Completed";
		$amount= number_format($format);
		$date= date("d/m/Y");
		

		
//		echo $oid;
//		echo "<br>",$date;
//		echo "<br>",$amount;
		$exp= date("d/m/Y",strtotime( $duration."days"));
//		echo "<br>",$exp;
	
		// $diff = date_diff($date,$exp);

		// echo "<pre>";
		// print_r($diff);
		// echo "</pre>";

		// echo $diff->days."days";

		
		$sql ="UPDATE users_db SET User_Plan = '$amount',User_Date ='$date',User_PlanExp='$exp',User_Status='$stauts',ResponseCode='$Reponse',User_Payment='$payment',
		User_Ordid='$oid' Where users_Id=$id";

		     
if ($con->query($sql) === TRUE) {
 // echo "Saved Sucessfully Bro";
  //header("Location: http://localhost/ott-Application/Admins/AddArtitis.php");
    
    
} else {
  echo "Error: ----->" . $sql . "<br>" . $con->error;
}

$con->close();


	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
//		echo '<pre>';
//	 print_r($_POST);
//	echo '</pre>';
	if ($_POST["STATUS"] == "TXN_FAILURE") {

		$oid = $_POST['ORDERID'];
		$format= $_POST['TXNAMOUNT'];
		$Reponse = $_POST['RESPCODE'];
		$stauts='Inactive';
		$payment=$_POST['STATUS'];
		$amount= number_format($format);
		$date= date("d/m/Y");

		$sql ="UPDATE users_db SET User_Date ='$date',User_Status='$stauts',ResponseCode='$Reponse',User_Payment='$payment',
		User_Ordid='$oid' Where users_Id= $id";

		     
if ($con->query($sql) === TRUE) {
  //echo "Saved Sucessfully Bro";
  //header("Location: http://localhost/ott-Application/Admins/AddArtitis.php");
} else {
  echo "Error: ----->" . $sql . "<br>" . $con->error;
}

$con->close();

	}else{

	}
}

	// if (isset($_POST) && count($_POST)>0 )
	// { 
	// 	foreach($_POST as $paramName => $paramValue) {
	// 			echo "<br/>" . $paramName . " = " . $paramValue;
	// 			$oid=$_POST['ORDERID'];
		
	// 	}
	
	// }

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="icon" type="image/png" href="../Images/Favicon/favicon.ico"/>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Payment Status</title>
  </head>
  <body>
<div class='container'>
      <div class="card">
  <div class="card-header">
   Payment Status
  </div>
  <div class="card-body">
<!--    <h5 class="card-title">Payment Status</h5>-->

<?php
if ($_POST["STATUS"] == "TXN_SUCCESS") {
   ?>
<h4>Date : <?php echo $date;?></h4><br><br>

<label class='font-weight-bolder'>ORDER ID : </label> <span><?php echo $_POST['ORDERID'];?></span><br><br>
<label class='font-weight-bolder'>Amount : </label> <span><?php echo $_POST['TXNAMOUNT'];?></span><br><br>
<label class='font-weight-bolder'>Payment Mode : </label> <span><?php echo $_POST['PAYMENTMODE'];?></span><br><br>
<label class='font-weight-bolder'>Payment Status : </label> <span><?php echo $_POST['RESPMSG'];?></span><br><br>

<div class='container'><a href="https://bvmentertainment.ml/ls/login.php"class='btn btn-success btn-block'>Login Now</a></div>



<?php

header("Refresh: 20; url=https://bvmentertainment.ml/ls/login.php");
}



if ($_POST["STATUS"] == "TXN_FAILURE") {
    ?>
<h4>Date : <?php echo $date;?></h4><br><br>

   <label class='font-weight-bolder'>ORDER ID : </label> <span><?php echo $_POST['ORDERID'];?></span><br><br>
   <label class='font-weight-bolder'>Amount : </label> <span><?php echo $_POST['TXNAMOUNT'];?></span><br><br>
   <label class='font-weight-bolder'>Payment Mode : </label> <span><?php echo $_POST['PAYMENTMODE'];?></span><br><br>
   <label class='font-weight-bolder'>Payment Status : </label> <span><?php echo $_POST['RESPMSG'];?></span><br><br>

<div class='container'><a href="https://bvmentertainment.ml/ls/login.php"class='btn btn-danger btn-block'>Login Now</a></div>
    
    ?>
    <?php
    
}
?>




  </div>
</div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

 
  </body>
</html>