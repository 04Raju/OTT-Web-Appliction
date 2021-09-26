<?php 
require '../Main Folder/Db.php';

if(isset($_POST['tids'])){
  $tids= mysqli_real_escape_string($con, $_POST['tids']);
  $sql="DELETE FROM  teammembers WHERE Sr_no = '$tids'";
  if(mysqli_query($con, $sql)){
   echo " Delete Succesfully";
   header("Refresh:0");
  }
  else{
    echo "Error: ----->" . $sql . "<br>" . $con->error;
  }

}


if(isset($_POST['ESumbit'])){


  // echo "<pre>";
  // print_r($_POST);
  // echo "</pre>";
  $Sid= mysqli_real_escape_string($con, $_POST['Sid']);
  $Fname  = mysqli_real_escape_string($con, $_POST['EFname']);
  $Lname =  mysqli_real_escape_string($con, $_POST['ELname']);
  $Mail =  mysqli_real_escape_string($con, $_POST['EEmail']);
  $Num  = mysqli_real_escape_string($con, $_POST['ENum']);
  $Dob  = mysqli_real_escape_string($con, $_POST['EDOB']);
  $Pass =  mysqli_real_escape_string($con, $_POST['EPass']);
  $City =  mysqli_real_escape_string($con, $_POST['ECity']);
  $Pin =  mysqli_real_escape_string($con, $_POST['EPin']);
  $Role =  mysqli_real_escape_string($con, $_POST['ERole']);
  $Status =  mysqli_real_escape_string($con, $_POST['EStatus']);
 
 $FullName= $Fname.' '.$Lname;


 $sql="UPDATE teammembers SET Full_Name='$FullName',DOB='$Dob',Phone='$Num',Email='$Mail',Password='$Pass',Role='$Role',City='$City',Pincode='$Pin',Status='$Status' WHERE Sr_no = {$Sid}";
 //echo $sql;
 if ($con->query($sql) === TRUE) {
 echo 'Record Updated !';
  header("Refresh:0");

} else {
echo "Error: ----->" . $sql . "<br>" . $con->error;
}

}
if(isset($_POST['ASumbit'])){


//  echo "<pre>";
//  print_r($_POST);
//  echo "</pre>";

 $Fname  = mysqli_real_escape_string($con, $_POST['AFname']);
 $Lname =  mysqli_real_escape_string($con, $_POST['ALname']);
 $Mail =  mysqli_real_escape_string($con, $_POST['AEmail']);
 $Num  = mysqli_real_escape_string($con, $_POST['ANum']);
 $Dob  = mysqli_real_escape_string($con, $_POST['ADOB']);
 $Pass =  mysqli_real_escape_string($con, $_POST['APass']);
 $City =  mysqli_real_escape_string($con, $_POST['ACity']);
 $Pin =  mysqli_real_escape_string($con, $_POST['APin']);
 $Role =  mysqli_real_escape_string($con, $_POST['ARole']);
 $Status =  mysqli_real_escape_string($con, $_POST['AStatus']);

$FullName= $Fname.' '.$Lname;


$check=mysqli_num_rows(mysqli_query($con,"SELECT * from teammembers where Email='$Mail'"));
if($check>0){
   $msgs="<br> Member is already present";
  echo $msgs;

}
else{

 
  
 $sql= "INSERT INTO teammembers(Full_Name, DOB, Phone, Email, Password, Role, City, Pincode, Status) VALUES ('$FullName','$Dob','$Num','$Mail','$Pass','$Role','$City','$Pin','$Status')";
 echo $sql;
   if ($con->query($sql) === TRUE) {
 
    header("Refresh:0");
  
} else {
  echo "Error: ----->" . $sql . "<br>" . $con->error;
}
}//end of else

}




 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="icon" type="image/png" href="../Images/Favicon/favicon.ico"/>

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css'>




<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.min.css" integrity="sha512-NaCOGQe8bs7/BxJpnhZ4t4f4psMHnqsCxH/o4d3GFqBS4/0Yr/8+vZ08q675lx7pNz7lvJ6fRPfoCNHKx6d/fA==" crossorigin="anonymous" />
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src='https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js'></script>

<style>

div.dataTables_filter, div.dataTables_length {
 margin-top:5px;
/* padding-right:20px;*/
  padding-left:20px;

   text-transform: uppercase;

} 

div.dataTables_filter {
     margin-left: -10rem;
/*     margin-right: -1rem;*/
}
div.dataTables_wrapper div.dataTables_filter input {
/*    margin-left: .5em;*/
    display: inline-block;
    width: 40rem !important;

}
 </style>

    <title>Manage Team</title>
  </head>
  <body class="bg-secondary ">
  <?php include 'header.php';
  
  $role = $_SESSION['role'];

  if($role != "Super Admin"){
    
     // header('location:http://192.168.0.104/OTT-Application/admins/index.php');
     echo "<h2 class='text-center text-warning '>You can't access this panel  <a class='btn btn-danger' href='logout.php'>logout </a></h2>"
      ;
    exit();
    };
  
  ?>

  <div class="container-fluid mt-2">
  <div class="container-fluid p-2">
  <button class="btn btn-primary"  data-toggle="modal" data-target="#AddModal">Add Team Member</button>
  <button class="btn btn-primary  ">Assign Task </button>
  <a href="https://dashboard.tawk.to/#/dashboard" target="blank" class="btn btn-primary">Chats</a>
  </div>
  
  
<div class="container-fluid mt-2 table-responsive p-1">


<table class="table table-striped table-bordered  table-hover bg-light text-dark" id='UserList'>
  <thead class="bg-primary text-light text-center">
    <tr>
      <th scope="col">SRN</th>
      <th scope="col">Full Name</th>
      <th scope="col">DOB</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">City</th>
      <th scope="col">Pincode</th>
      <th scope="col">Last Login</th>
      <th scope="col">Status</th>
      <th scope='col'>Edit</th>
      <th scope="col">Remove</th>
    
    </tr>
  </thead>
  <tbody id="tbody">
    <tr>
    <?php
    $sr=1;
     $time= time();
    //SELECT * FROM musics_db, artists_db WHERE artists_db.artists_Id = musics_db.Song_Artist
    $sql="SELECT * FROM teammembers";
            $quariy = $con->query($sql); 
            $num = mysqli_num_rows($quariy);
            if($num>=0){
             while ( $row = mysqli_fetch_array($quariy) ) {

              $status= 'Offline';
              $class = 'btn-danger';
              // if($row['last_login']>$time){
              //   $status='Online';
              //   $class='btn-success';

               ?>
      <th class="text-center "scope="row"><?php echo $sr?></th>
      <td class="text-center "scope="row"style=""><?php echo $row['Full_Name']?></td>
      <td class="text-center "scope="row"style=""><?php echo $row['DOB']?></td>
      <td class="text-center "scope="row"style=""><?php echo $row['Email']?></td>
      <td class="text-center "scope="row"style=""><?php echo $row['Role']?></td>
      <td class="text-center "scope="row"style=""><?php echo $row['City']?></td>
      <td class="text-center "scope="row"style=""><?php echo $row['Pincode']?></td>
      <td class="text-center"scope="row"><?php echo $row['Timestamps'];?></td>
      <td scope="row"style=""><button type='button' class='btn <?php echo $class?>'><?php echo $status ?></button></td>
      <td class="text-center "scope="row"style=""><a type='button' class="nav_link"  data-toggle="modal" data-target="#EditModal" onclick="EditData('<?php echo $row['Sr_no'] ?>','<?php echo $row['Full_Name'];?>','<?php echo $row['DOB'];?>','<?php echo $row['Phone'];?>','<?php echo $row['Email'];?>','<?php echo $row['Password'];?>','<?php echo $row['Role'];?>','<?php echo $row['City'];?>','<?php echo $row['Pincode'];?>','<?php echo $row['Status'];?>')">Edit </a></td>
      <td class="text-center "scope="row"style=""><a  class="text-danger" onclick="Rem('<?php echo $row['Sr_no']?>')">Remove</a></td>
    </tr>
    <?php
    $sr++;
}
        //     }
     }
?>
  </tbody>
</table>


 

</div>



  </div>
    


    <div class="modals">

<!-- Modal -->
<div class="modal fade" id="AddModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-xl modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Team Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container-fluid">
      <form action="" method="POST">
 
  <div class="row">
  <div class="col-sm-12 col-lg-6">
  <div class="form-group">
  <label for="AFName">First Name</label>
  <input type="text" name='AFname' class="form-control" id="AFName" Placeholder=" eg. Rajesh">
  </div>
  </div>

  <div class="col-sm-12 col-lg-6">
  <div class="form-group">
  <label for="ALName">Last Name</label>
  <input type="text" name='ALname' class="form-control" id="ALName" Placeholder=" eg. Jettappa">
  </div>
  </div>

  </div>
   
  <div class="row">
  <div class="col-sm-12 col-lg-6">
  <div class="form-group">
    <label for="AEmail">Email Address</label>
    <input type="Email" name='AEmail' class="form-control" id="AEmail" placeholder= "eg. Rajesh@gmail.com">
  </div>
  </div>
  <div class="col-sm-12 col-lg-6">
  <div class="form-group">
    <label for="ANum">Phone Number</label>
    <input type="Number" name='ANum' class="form-control" id="ANum" placeholder= "eg. 9938978729">
  </div>
  </div>
  
  </div>
  <div class="row">
  <div class="col-sm-12 col-lg-6">
  <div class="form-group">
    <label for="ADOB">Date of Birth</label>
    <input type="Date" name='ADOB' class="form-control" id="ADOB" placeholder= "eg. 04/10/1999">
  </div>
  </div>
  <div class="col-sm-12 col-lg-6">
  
  <div class="form-group">
    <label for="APass">Password</label>
    <input type="text" name='APass' class="form-control" id="APass" placeholder= "eg. 310ARaeJe">
  </div>
  </div>

  </div>

  <div class="row">
  <div class="col-sm-12 col-lg-6">
  <div class="form-group">
    <label for="ACity">City</label>
    <input type="text" name='ACity' class="form-control" id="ACity" placeholder= "eg. Thane">
  </div>
  </div>
  <div class="col-sm-12 col-lg-6">
  <div class="form-group">
    <label for="APin">Pincode</label>
    <input type="text" name='APin' class="form-control" id="APin" placeholder= "eg. 400606">
  </div>
  </div>
  </div>

  <div class="row">
  <div class="col-sm-12 col-lg-6">
  <div class="form-group">
  <label>Select Role</label>
  <select id="ARole" name="ARole" class="form-control" >
  <option value="Admin" >Admin</option>
  <option value="Writer" >Writer</option>
  <option value="Uploader" >Uploader</option>
  <option value="Manager" >Manager</option>
  <option value="Tester" >Tester</option>
  <option value="Super Admin" >Super Admin</option>
  </select>

  </div>
  </div>

  <div class="col-sm-12 col-lg-6">

  <div class="form-group">
  <label>Select Status</label>
  <select id="AStatus" name="AStatus" class="form-control" >
  <option value="Active">Active</option>
  <option value="Inactive">InActive</option>
  <option value="Left">Left</option>
  <option value="Suspended">Suspended</option>  
  
  </select>

  </div>
  
  
  </div>


  </div>


  
<button class='btn btn-success ' name='ASumbit'> Add Memeber </button>

  </form>


      </div>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="EditModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-xl modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Team Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container-fluid">
      <form action="" method="POST">
 
  <div class="row">
  <div class="col-sm-12 col-lg-6">
  <div class="form-group">
  <label for="EFName">First Name</label>
  <input type="text" name='EFname' class="form-control" id="EFName" Placeholder=" eg. Rajesh">
  </div>
  </div>

  <div class="col-sm-12 col-lg-6">
  <div class="form-group">
  <label for="ELName">Last Name</label>
  <input type="text" name='ELname' class="form-control" id="ELName" Placeholder=" eg. Jettappa">
  </div>
  </div>

  </div>
   
  <div class="row">
  <div class="col-sm-12 col-lg-6">
  <div class="form-group">
    <label for="EEmail">Email Address</label>
    <input type="Email" name='EEmail' class="form-control" id="EEmail" placeholder= "eg. Rajesh@gmail.com">
  </div>
  </div>
  <div class="col-sm-12 col-lg-6">
  <div class="form-group">
    <label for="ENum">Phone Number</label>
    <input type="Number" name='ENum' class="form-control" id="ENum" placeholder= "eg. 9938978729">
  </div>
  </div>
  
  </div>
  <div class="row">
  <div class="col-sm-12 col-lg-6">
  <div class="form-group">
    <label for="EDOB">Date of Birth</label>
    <input type="text" name='EDOB' class="form-control" id="EDOB" placeholder= "eg. 04/10/1999">
  </div>
  </div>
  <div class="col-sm-12 col-lg-6">
  
  <div class="form-group">
    <label for="EPass">Password</label>
    <input type="text" name='EPass' class="form-control" id="EPass" placeholder= "eg. 310ARaeJe">
  </div>
  </div>

  </div>

  <div class="row">
  <div class="col-sm-12 col-lg-6">
  <div class="form-group">
    <label for="ECity">City</label>
    <input type="text" name='ECity' class="form-control" id="ECity" placeholder= "eg. Thane">
  </div>
  </div>
  <div class="col-sm-12 col-lg-6">
  <div class="form-group">
    <label for="EPin">Pincode</label>
    <input type="text" name='EPin' class="form-control" id="EPin" placeholder= "eg. 400606">
  </div>
  </div>
  </div>

  <div class="row">
  <div class="col-sm-12 col-lg-6">
  <div class="form-group">
  <label>Select Role</label>
  <select id="ERole" name="ERole" class="form-control" >
  <option value="Admin" >Admin</option>
  <option value="Writer" >Writer</option>
  <option value="Uploader" >Uploader</option>
  <option value="Manager" >Manager</option>
  <option value="Tester" >Tester</option>
  <option value="Super Admin" >Super Admin</option>
  </select>

  </div>
  </div>

  <div class="col-sm-12 col-lg-6">

  <div class="form-group">
  <label>Select Status</label>
  <select id="EStatus" name="EStatus" class="form-control" >

  <option value="Active">Active</option>
  <option value="Inactive">InActive</option>
  <option value="Left">Left</option>
  <option value="Suspended">Suspended</option>  
  
  </select>

  </div>
  
  
  </div>


  </div>

<input type='hidden' id='Sid' name='Sid'>
  
<button class='btn btn-success ' name='ESumbit'> Edit Memeber </button>

  </form>
    </div>

      




      </div>
    
  
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
     
    </div>
  </div>
</div>
    </div>

<div class="Remove Team">
  <form id="php" action="" method="POST">
    <input type='hidden' id='tid' name='tids' > 
    </form>
    </div>

    

<script>

  function Rem(sr){

    $('#tid').val(sr);
    $('#php').submit();
  };

  function EditData(sr,Name,Dob,phone,email,pass,role,city,pin,status){
    var  NameArray = Name.split(" ");
    $('#EFName').val(NameArray[0]);
    $('#ELName').val(NameArray[1]);
    $('#EDOB').val(Dob);
    $('#ENum').val(phone);
    $('#ECity').val(city);
    $('#EPin').val(pin);
    $('#EEmail').val(email);
    $('#EPass').val(pass);
    $('#Sid').val(sr);
           
$('#ERole').val(role);
$('#EStatus').val(status);

  };


</script>



<script>
$('#TM').addClass('active');

$('#UserList').DataTable({
//        "pagingType":"full_numbers",
        "bFilter": true,
        "bInfo": true,
        "lengthMenu":[
            [10,25,50,-1],
            [10,25,50,"All"]
        ],
        responsive:true,
        language:{
          "search": "_INPUT_",
           searchPlaceholder:"Search Team Member",
    
        }
    });



function updateUserStatus(){
  $.ajax({
    url:'imp Folder/set_statusTeam.php',
    success:function(){

    }
  });

}
setInterval(function(){
updateUserStatus();
},5000);


function getStatus(){
  $.ajax({
    url:'imp Folder/get_StatusTeam.php',
    success:function(result){
     // console.log(result);
   $('#tbody').html(result);
    }

  });
  }
  setInterval(function(){
  getStatus();
  },5000);
  
</script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


  </body>
</html>


