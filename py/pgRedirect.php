<?php

require '../Main Folder/Db.php';

header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

ini_set('session.save_path', '../Admins/Sessions');
session_start();
$mail= $_SESSION["mail"];
//echo $mail;

$checkSum = "";
$paramList = array();

$ORDER_ID = $_POST["ORDER_ID"];
$CUST_ID = $_POST["CUST_ID"];
$INDUSTRY_TYPE_ID = $_POST["INDUSTRY_TYPE_ID"];
$CHANNEL_ID = $_POST["CHANNEL_ID"];
$TXN_AMOUNT = $_POST["TXN_AMOUNT"];
$EMAIL = $_POST["EMAIL"];
$MSISDN= $_POST["MSISDN"];

//echo $EMAIL;
//echo $MSISDN;

$sql ="UPDATE users_db SET User_Phone = '$MSISDN' Where User_Email= '$mail'";
//echo $sql;
	 
if ($con->query($sql) === TRUE) {
//echo "Saved Sucessfully Bro";
//header("Location: http://localhost/ott-Application/Admins/AddArtitis.php");
} else {
//echo "Error: ----->" . $sql . "<br>" . $con->error;
}

// Create an array having all required parameters for creating checksum.
$paramList["MID"] = PAYTM_MERCHANT_MID;
$paramList["ORDER_ID"] = $ORDER_ID;
$paramList["CUST_ID"] = $CUST_ID;
$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
$paramList["CHANNEL_ID"] = $CHANNEL_ID;
$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
$paramList["EMAIL"] = $EMAIL;
$paramList["MSISDN"] = $MSISDN;
$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
 //$paramList["CALLBACK_URL"] = "http://192.168.0.104/OTT-Application/py/pgResponse.php";
$paramList["CALLBACK_URL"] = $CallBack;

/*
$paramList["CALLBACK_URL"] = "http://localhost/PaytmKit/pgResponse.php";
$paramList["MSISDN"] = $MSISDN; //Mobile number of customer
$paramList["EMAIL"] = $EMAIL; //Email ID of customer
$paramList["VERIFIED_BY"] = "EMAIL"; //
$paramList["IS_USER_VERIFIED"] = "YES"; //

*/

//Here checksum string will return by getChecksumFromArray() function.
$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);

?>
<html>
<head>
<title>Merchant Check Out Page</title>
</head>
<body>
	<center><h1>Please do not refresh this page...</h1></center>
		<form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
		<table border="1">
			<tbody>
			<?php
			foreach($paramList as $name => $value) {
				echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
			}
			?>
			<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
			</tbody>
		</table>
		<script type="text/javascript">
			document.f1.submit();
		</script>
	</form>
</body>
</html>