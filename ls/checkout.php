<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
	
	include('../OTT_DB.php');
	session_start();


if(!isset($_GET['v'])){
  
  header($MainLogin);
  die();
};

$mail= $_SESSION['mail'];
//echo $mail;

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Check-out page</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta name="GENERATOR" content="Evrsoft First Page">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
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
$id = intval($_GET['v']);
$sql="SELECT * from subscription Where Subs_Id=$id";
$query= mysqli_query($con, $sql);

$row= mysqli_fetch_assoc($query);
    ?>
<ul class="list-group mb-2">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Subscription Details</h6><br>
                <small class="text-muted">24/7 Technical Support </small><br>
                <small class="text-muted">Duration    :- <?php echo $row['Sub_Months']?> Months</small><br>
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

<h3 class="text-center mb-4">Billing Details</h3><hr class="mb-3">
	<!-- <h1>Merchant Check Out Page</h1>
	<pre>
	</pre> -->
	<form method="post" action="pgRedirect.php">
		<!-- <table border="1">
			<tbody>
				<tr>
					<th>S.No</th>
					<th>Label</th>
					<th>Value</th>
				</tr>
				<tr>
					<td>1</td>
					<td><label>ORDER_ID::*</label></td>
					<td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "ORDS" . rand(10000,99999999)?>">
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td><label>CUSTID ::*</label></td>
					<td><input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001"></td>
				</tr>
				<tr>
					<td>3</td>
					<td><label>INDUSTRY_TYPE_ID ::*</label></td>
					<td><input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td>
				</tr>
				<tr>
					<td>4</td>
					<td><label>Channel ::*</label></td>
					<td><input id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
					</td>
				</tr>
				<tr>
					<td>5</td>
					<td><label>txnAmount*</label></td>
					<td><input title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="1">
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input value="CheckOut" type="submit"	onclick=""></td>
				</tr>
			</tbody>
		</table>
		* - Mandatory Fields -->
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
    <input type="number"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your phone number">
  </div>
 <div class="form-group">
    <label >email</label>
    <input type="email"   class="form-control"  aria-describedby="emailHelp" value="<?php echo $mail;?>" placeholder="Enter Email Address">
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
   <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
	<input type="text" id="ORDER_ID" name="ORDER_ID" value= <?php  echo $orderid ?>>
     <input type="text" id="CUST_ID" name="CUST_ID" value="RTS001">
     <input  type="text" id="INDUSTRY_TYPE_ID" name="INDUSTRY_TYPE_ID" value="Retail">
     <input  type="text" id="CHANNEL_ID" name="CHANNEL_ID" value="WEB">
     <input type="text" id="TXN_AMOUNT" name="TXN_AMOUNT" value=<?php echo $row['Sub_Amount']?>>
	 <!-- <input value="CheckOut" type="submit"	onclick=""> -->
	 <button type="submit" class="btn btn-primary btn-lg btn-block" onclick="pgRedirect.php" >Place-Order</button>
    
	</div>
	
	</form>
</body>
</html>