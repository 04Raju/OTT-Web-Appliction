<?php
require '../Main Folder/Db.php';

 $time=time();
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
    <title>User-Panel</title>


<!-- Datatable -->


<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css'>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


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
  </head>
  <body class="bg-secondary ">

  <?php include 'header.php';?>

  <!-- <button id="print" class="btn btn-primary">Print</button> -->
<h2 class="text-warning mt-1">Client Lists</h2>
<div class="container-fluid mt-2 table-responsive">

<table class="table table-striped table-bordered  table-hover bg-light text-dark" id='UserList'>
  <thead class="bg-primary text-light text-center">
    <tr>
    
      <th scope="col">SRN</th>
      <th scope="col">Full-Name</th>
      <th scope="col">Email</th>
      <th scope="col">Plan</th>
      <th scope="col">Date</th>
      <th scope="col">Exp-Date</th>
      <th scope="col">Status</th>
      <th scope="col">Payment</th>
      <th scope="col">OrderId</th>
      <th scope="col">Status</th>
      <th scope='col'>Edit</th>
      <th scope="col">Delete</th>
    
    </tr>
  </thead>
  <tbody id="tbody">
    <tr>
    <?php
    $sr=1;
   
            $quariy = $con->query("SELECT * FROM users_db"); 
            $num = mysqli_num_rows($quariy);
            if($num>=0){
             while ( $row = mysqli_fetch_array($quariy) ) {
               $status= 'Offline';
               $class = 'btn-danger';
               if($row['last_login']>$time){
                 $status='Online';
                 $class='btn-success';

               }
               ?>
      <th scope="row"><?php echo $sr?></th>
      <td scope="row"style=""><?php echo $row['User_name']?></td>
      <td scope="row"style=""><?php echo $row['User_Email']?></td>
      <td scope="row"style=""><?php echo $row['User_Plan']?></td>
      <td scope="row"style=""><?php echo $row['User_Date']?></td>
      <td scope="row"style=""><?php echo $row['User_PlanExp']?></td>
      <td scope="row"style=""><?php echo $row['User_Status']?></td>
      <td scope="row"style=""><?php echo $row['User_Payment']?></td>
      <td scope="row"style=""><?php echo $row['User_Ordid']?></td>
      <td scope="row"style=""><button type='button' class='btn <?php echo $class?>'><?php echo $status ?></button></td>
      <td scope="row"style=""><a type='button' class="nav_link"  data-toggle="modal" data-target="#EditModal">Edit </a></td>
      <td scope="row"style=""><a href="UsersOp/DelUser.php/?v=<?php echo $row['users_Id']?>">Delete </a></td>
    </tr>
    <?php
    $sr++;
}
     }
?>
  </tbody>
</table>

 

</div>



<div class="modals">


<!-- Edit Modal -->
<div class="modal fade" id="EditModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Edit User</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <div class="container-fluid">

     <form>

     <div class="form-group">
    <label class="font-weight-bold">Full Name</label>
    <input type="text" class="form-control" name="Fname" id="Fname">
  </div>


     <div class="row">

  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
     <div class="form-group">
    <label class="font-weight-bold">Email Address</label>
    <input type="text" class="form-control" name="Email" id="Email">
  </div>
  </div>
  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
     <div class="form-group">
    <label class="font-weight-bold">Phone Number</label>
    <input type="text" class="form-control" name="Pnumber" id="Pnumber">
  </div>
  </div>

  </div>
  <div class="row">

<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
<div class="form-group">
    <label class="font-weight-bolder" for="exampleFormControlSelect1">Select Subscription Plan</label>
          <select class="form-control mt-1"  style="width:100%;" id="CaseName" placeholder="Please Select Client Name" onchange="document.getElementById('text_CN').value = this.options[this.selectedIndex].text">
   <option value=""disabled selected>please Choose plan</option>
                                    <?php
                                    $sql = mysqli_query($con, "SELECT * FROM subscription_db");
                                   // echo $sql;
                                    while ($row = $sql->fetch_assoc()) {
                                        echo "<option value=" . $row['subs_Id'] . ">" . $row['Sub_Amount'] . "</option>";
                                    }
                                    ?>
                                </select>
                                <input type="hidden" name="CaseN" id="text_CN" value="" />
                            </div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">

<div class="form-group">
    <label class="font-weight-bolder" for="exampleFormControlSelect1">Select User Status</label>
          <select class="form-control mt-1"  style="width:100%;" id="UserStatus" placeholder="Please Select User Status" onchange="document.getElementById('text_CN').value = this.options[this.selectedIndex].text">
   <option value=""disabled selected>please Choose Status</option>
   <option value="">Active</option>
   <option value="">InActive</option>
   <option value="">Block</option>
   <option value="">Suspended</option>
   <option value="">Disable</option>
    </select>
     </div>
   
</div>

</div>

<div class="row">

<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
<div class="form-group">
<label class="font-weight-bolder">Date</label>
<input type="text" class="form-control" id="Date" value="<?php echo Date("d/m/Y");?>">
</div>
</div>

<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
<div class="form-group">
<label class="font-weight-bolder">Exprie Date</label>
<input type="text" class="form-control" id="ExDate" value="<?php echo Date("d/m/Y");?>">
</div>
</div>



</div>

    

     

     
     </form>

     
     </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>


</div>

<script>

$(document).ready(function() {


//   document.getElementById("print").addEventListener("click", function() {
  
//   window.print();
// });

  function getStatus(){
  $.ajax({
    url:'UsersOp/get_status.php',
    success:function(result){
     // console.log(result);
   $('#tbody').html(result);
    }

  });
  }
  setInterval(function(){
  getStatus();
  },5000);
  
  $("#UP").addClass("active");
  $("#Date").datepicker({ dateFormat: 'dd/mm/yy',});

    $("#ExDate").datepicker({ dateFormat: 'dd/mm/yy',});

  $('select').select2();
   // $('#UserList').DataTable();

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
          //"search": "_INPUT_",
           searchPlaceholder:"Search User",
    
        }
    });
    
} );
</script>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    
  </body>
</html>