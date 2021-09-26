<?php


// BVM-Entertainment
require 'Main Folder/Db.php';

ini_set('session.save_path', 'Admins/Sessions');

session_start();



if(!isset($_SESSION['uid'])){
  header($MainLogin);
  die();
};

$uid= $_SESSION['uid'];
$mail = $_SESSION['mail'];
$fname= $_SESSION['fname'];
//echo  $uid;
$time=time();
//echo $time;




if(isset($_POST['submit'])){
//    echo "<pre>";
//    print_r($_POST);
//    echo "</pre>";
    
    
   $Fname= mysqli_real_escape_string($con, $_POST['EName']);
   $Email= mysqli_real_escape_string($con, $_POST['EMail']);
   $Ephone=mysqli_real_escape_string($con, $_POST['EPhone']);
   $Epass=mysqli_real_escape_string($con, $_POST['EPassword']);
    $usr=mysqli_real_escape_string($con, $_POST['usr']);
  
  $_SESSION['fname']= $Fname;
  if($Epass==''){
     // echo 'password is empty';
      $q="UPDATE users_db SET User_name = '$Fname', User_Email = '$Email',User_Phone= '$Ephone' WHERE users_Id = '$usr'";
      echo $query;
     if ($con->query($q) === TRUE) {
  echo "Record updated successfully";
   header("Refresh:0");
} else {
 echo "Error: ----->" . $q . "<br>" . $con->error;
}
      
  }else{
      $sec_pass = password_hash($Epass,PASSWORD_BCRYPT);
  // echo $sec_pass;
   $query="UPDATE users_db SET User_name = '$Fname', User_Email = '$Email',User_Phone= '$Ephone',User_Password= '$sec_pass' WHERE users_Id = '$usr'";
   if ($con->query($query) === TRUE) {
  //echo "Record updated successfully";
   header("Refresh:0");
} else {
  echo "Error updating record: " . $con->error;
}
   
   
   
   
  }
  
   
    
    
}



$result= $con->query("Select * from banner_db Where Banner_Status = 'active' && Banner_Use= 'main'");


// echo "<pre>";
// print_r($result);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" type="image/png" href="Images/Favicon/favicon.ico"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="CSS/owl.carousel.css">
    <link rel="stylesheet" href="CSS/owl.theme.green.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="Stylesheet" href="CSS/Style.css">
    <script src="JS/jquery.min.js"></script>
      <script src="JS/owl.carousel.min.js"></script>
    <title>BVM-Entertainment</title>


    <style>

.dropdown-item  a :hover{
background:red;
color:White;
}
/*#CP{
    color:red;
}*/
      </style>
  </head>


  <body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary  sticky-top p-0">
  <a class="navbar-brand" href="index.php">BVM-Entertainment</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-5 mr-auto">
      <li class="nav-item active">
        <a class="nav-link mr-4" href="main.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown bg-primary" >
              <a class="nav-link dropdown-toggle mr-4" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              lanaguage
              </a>
              <div class="dropdown-menu bg-primary" aria-labelledby="navbarDropdown">
                <a class="dropdown-item"style="color:Black;" href="#Hindi">Hindi</a>
                <a class="dropdown-item"style="color:Black;" href="#Marathi">Marathi</a>
                 <a class="dropdown-item"style="color:Black;" href="#English">English</a>
                <a class="dropdown-item"style="color:Black;" href="#Kannada">Kannada</a>
                
                
            
              </div>
            </li>
            <li class="nav-item dropdown bg-primary" >
              <a class="nav-link dropdown-toggle mr-4" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Categories
              </a>
              <div class="dropdown-menu bg-primary" aria-labelledby="navbarDropdown">
                <a class="dropdown-item"style="color:Black;" href="#Top_movies">Top Movies</a>
                <a class="dropdown-item"style="color:Black;" href="#Blog">New Movies</a>
            
              </div>
            </li>

            <li class="nav-item">
                <a class="nav-link mr-4" href="Music/Index.php">Music</a>
              </li>
<!--              <li class="nav-item">
                <a class="nav-link mr-4" href="#news">News</a>
              </li>   -->
              <!-- <li class="nav-item ml-5" style="margin-left:400px">
                <a class="nav-link" href="Music/Music.php">Account</a>
              </li> -->
              <li class="nav-item dropdown bg-primary" >
              <a class="nav-link dropdown-toggle mr-4" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Accounts
              </a>
              <div class="dropdown-menu bg-primary" aria-labelledby="navbarDropdown">
                <a class="dropdown-item  "style="color:Black; hover:red;" href="logout.php">Log-Out</a>
                <a class="dropdown-item"style="color:Black;" data-toggle="modal" data-target="#Setting">Settings</a>
            
              </div>
            </li>

            <li class="nav-item float-right " id="CP">
        <a class="nav-link ml-5 float-right" > Login As :- <?php echo $fname?></a>
      </li>

              <!-- <form class="form-inline my-2 my-lg-0 ">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="radius:50px; width:420px;margin-left:120px">
      <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </form>
     -->

           
</nav>

<div class="container-fluid "  id="home">
<!-- <h1 class="head">Home</h1> -->
<div id="carouselExampleFade" class="carousel slide carousel-fade fluid" data-ride="carousel">
  <ol class="carousel-indicators">
  <?php 
  $i=0;
  foreach($result as $row){
    $actives= '';
    if($i==0){
      $actives='active';
    }

  
  ?>
      <li data-target="#carouselExampleCaptions" data-slide-to="<?php  echo $i; ?>" class="<?php echo $actives; ?>"></li>
      <?php $i++;}?>
  </ol>
  <div class="carousel-inner">
  <?php 
  $i=0;
  foreach($result as $row){
    $actives= '';
    if($i==0){
      $actives='active';
    }

  
  ?>
    <div class="carousel-item <?php echo $actives;?>">
      <img src="<?php echo $row['Banner_Link']; ?>" width="100vw" height="360px" class="d-block w-100" alt="...">
      <div class="carousel-caption">
        <h5><?php echo $row['Banner_Title']; ?></h5>
        <!-- <p>Look wherever you want. Cancel whenever you want.</p> -->
      </div>
    </div>

    <?php $i++; }?>
   
</div>
</div>
</div> <!-- End of Home Div -->

<div class="main" id="Recommanded">
        <h3 class="h3 mt-2 ml-3 mb-2">Recommanded</h3>
        
        <div class="container-fluid p-3">
          <div class="row">
          <div class="owl-carousel owl-theme">
          
<?php
$quariy = $con->query("SELECT * FROM movies_db WHERE Movie_Catag='Recommanded'");
//$quariy = $con->query("SELECT * FROM movies");
 $num = mysqli_num_rows($quariy);
 if($num>=0){
  while ( $row = mysqli_fetch_array($quariy) ) {
    ?>
     <div class="item" id="items">
       <div class="col-lg-6 col-md-6 col-sm-12">
       <div class="card" style="width: 13rem;height:253px">
         <a href="Movie_info.php/?v=<?php echo$row['movies_Id']?>"> <img src="<?php echo$row['Movie_Poster']?>"width="12rem" height="250rem"class="card-img-top rounded" alt="<?php echo$row['Movie_Poster']?>"></a>
             <div class="card-body">
             <div class="card-body">
                <h5 class="card-title"><?php echo$row['Movie_Name']?></h5>
                 <p class="card-text"><Strong>Movie Type : </strong><?php echo$row['Movie_Type']?></p>
              </div>
             <div class="card-body">
               <a href="Trailler.php/?v=<?php echo$row['movies_Id']?>" class="card-link">Tralier</a>
               <a href="player.php/?v=<?php echo$row['movies_Id']?>" class="card-link">Watch Now</a>
              </div>
          </div> <!--card div -->
         </div>
  </div>
</div>
<?php 
 }

 }
?>

</div>
</div>

</div>
</div> <!-- End of Div-->

<div class="main" id="Top_movies">
        <h3 class="h3 mt-2 ml-3 mb-2">Top Movies</h3>
        
        <div class="container-fluid p-3">
          <div class="row">
          <div class="owl-carousel owl-theme">
<?php
//$quariy = $con->query("SELECT * FROM movies WHERE Movie_Catag= 'Recommanded'");
$quariy = $con->query("SELECT * FROM movies_db");
 $num = mysqli_num_rows($quariy);
 if($num>=0){
  while ( $row = mysqli_fetch_array($quariy) ) {
    ?>
     <div class="item" id="items">
       <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="card" style="width: 13rem;height:253px">
         <a href="Movie_info.php/?v=<?php echo$row['movies_Id']?>"> <img src="<?php echo$row['Movie_Poster']?>"width="12rem" height="250rem"class="card-img-top rounded" alt="<?php echo$row['Movie_Poster']?>"></a>
             <div class="card-body">
                <h5 class="card-title"><?php //echo$row['Movie_Name']?></h5>
                 <p class="card-text"><Strong>Movie Type : </strong><?php //echo$row['Movie_Type']?></p>
              </div>
             <div class="card-body">
               <a href="Trailler.php/?v=<?php //echo$row['movies_Id']?>" class="card-link">Tralier</a>
               <a href="player.php/?v=<?php //echo$row['movies_Id']?>" class="card-link">Watch Now</a>
              </div>
          </div> <!--card div -->
         </div>
  </div>

<?php 
 }

 }
?>
</div>
</div>
</div>


</div> <!-- End of Div-->


<div class="main" id="Hindi">
        <h3 class="h3 mt-2 ml-3 mb-2">Top Hindi </h3>
        
        <div class="container-fluid p-3">
          <div class="row">
          <div class="owl-carousel owl-theme">
<?php
//$quariy = $con->query("SELECT * FROM movies WHERE Movie_Catag= 'Recommanded'");
$quariy = $con->query("SELECT * FROM movies_db WHERE Movie_Lang = 'Hindi' AND Status = 'Active' ORDER BY Movie_Name ASC;");
 $num = mysqli_num_rows($quariy);
 if($num>=0){
  while ( $row = mysqli_fetch_array($quariy) ) {
     
    ?>
    <div class="item" id="items">
       <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="card" style="width: 13rem;height:253px">
         <a href="Movie_info.php/?v=<?php echo$row['movies_Id']?>"> <img src="<?php echo$row['Movie_Poster']?>"width="12rem" height="250rem"class="card-img-top rounded" alt="<?php echo$row['Movie_Poster']?>"></a>
             <div class="card-body">
                <h5 class="card-title"><?php //echo$row['Movie_Name']?></h5>
                 <p class="card-text"><Strong>Movie Type : </strong><?php //echo$row['Movie_Type']?></p>
              </div>
             <div class="card-body">
               <a href="Trailler.php/?v=<?php //echo$row['movies_Id']?>" class="card-link">Tralier</a>
               <a href="player.php/?v=<?php //echo$row['movies_Id']?>" class="card-link">Watch Now</a>
              </div>
          </div> <!--card div -->
         </div>
  </div>
<?php 
 }

 }
?>
</div>
</div>
</div>


</div> <!-- End of Div-->
<div class="main" id="Marathi">
        <h3 class="h3 mt-2 ml-3 mb-2">Top Marathi</h3>
        
        <div class="container-fluid p-3">
          <div class="row">
          <div class="owl-carousel owl-theme">
<?php
//$quariy = $con->query("SELECT * FROM movies WHERE Movie_Catag= 'Recommanded'");
$quariy = $con->query("SELECT * FROM movies_db WHERE Movie_Lang = 'Marathi' AND Status = 'Active' ORDER BY Movie_Name ASC;");
 $num = mysqli_num_rows($quariy);
 if($num>=0){
  while ( $row = mysqli_fetch_array($quariy) ) {
     
    ?>
    <div class="item" id="items">
       <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="card" style="width: 13rem;height:253px">
         <a href="Movie_info.php/?v=<?php echo$row['movies_Id']?>"> <img src="<?php echo$row['Movie_Poster']?>"width="12rem" height="250rem"class="card-img-top rounded" alt="<?php echo$row['Movie_Poster']?>"></a>
             <div class="card-body">
                <h5 class="card-title"><?php //echo$row['Movie_Name']?></h5>
                 <p class="card-text"><Strong>Movie Type : </strong><?php //echo$row['Movie_Type']?></p>
              </div>
             <div class="card-body">
               <a href="Trailler.php/?v=<?php //echo$row['movies_Id']?>" class="card-link">Tralier</a>
               <a href="player.php/?v=<?php //echo$row['movies_Id']?>" class="card-link">Watch Now</a>
              </div>
          </div> <!--card div -->
         </div>
  </div>
<?php 
 }

 }
?>
</div>
</div>
</div>


</div> <!-- End of Div-->
<div class="main" id="Telugu">
        <h3 class="h3 mt-2 ml-3 mb-2">Top Telugu </h3>
        
        <div class="container-fluid p-3">
          <div class="row">
          <div class="owl-carousel owl-theme">
<?php
//$quariy = $con->query("SELECT * FROM movies WHERE Movie_Catag= 'Recommanded'");
$quariy = $con->query("SELECT * FROM movies_db WHERE Movie_Lang = 'Telegu' AND Status = 'Active' ORDER BY Movie_Name ASC;");
 $num = mysqli_num_rows($quariy);
 if($num>=0){
  while ( $row = mysqli_fetch_array($quariy) ) {
     
    ?>
    <div class="item" id="items">
       <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="card" style="width: 13rem;height:253px">
         <a href="Movie_info.php/?v=<?php echo$row['movies_Id']?>"> <img src="<?php echo$row['Movie_Poster']?>"width="12rem" height="250rem"class="card-img-top rounded" alt="<?php echo$row['Movie_Poster']?>"></a>
             <div class="card-body">
                <h5 class="card-title"><?php //echo$row['Movie_Name']?></h5>
                 <p class="card-text"><Strong>Movie Type : </strong><?php //echo$row['Movie_Type']?></p>
              </div>
             <div class="card-body">
               <a href="Trailler.php/?v=<?php //echo$row['movies_Id']?>" class="card-link">Tralier</a>
               <a href="player.php/?v=<?php //echo$row['movies_Id']?>" class="card-link">Watch Now</a>
              </div>
          </div> <!--card div -->
         </div>
  </div>
<?php 
 }

 }
?>
</div>
</div>
</div>


</div> <!-- End of Div-->

<div class="main" id="Kannada">
        <h3 class="h3 mt-2 ml-3 mb-2">Top Kannada </h3>
        
        <div class="container-fluid p-3">
          <div class="row">
          <div class="owl-carousel owl-theme">
<?php
//$quariy = $con->query("SELECT * FROM movies WHERE Movie_Catag= 'Recommanded'");
$quariy = $con->query("SELECT * FROM movies_db WHERE Movie_Lang = 'Kannada' AND Status = 'Active' ORDER BY Movie_Name ASC;");
 $num = mysqli_num_rows($quariy);
 if($num>=0){
  while ( $row = mysqli_fetch_array($quariy) ) {
     
    ?>
    <div class="item" id="items">
       <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="card" style="width: 13rem;height:253px">
         <a href="Movie_info.php/?v=<?php echo$row['movies_Id']?>"> <img src="<?php echo$row['Movie_Poster']?>"width="12rem" height="250rem"class="card-img-top rounded" alt="<?php echo$row['Movie_Poster']?>"></a>
             <div class="card-body">
                <h5 class="card-title"><?php //echo$row['Movie_Name']?></h5>
                 <p class="card-text"><Strong>Movie Type : </strong><?php //echo$row['Movie_Type']?></p>
              </div>
             <div class="card-body">
               <a href="Trailler.php/?v=<?php //echo$row['movies_Id']?>" class="card-link">Tralier</a>
               <a href="player.php/?v=<?php //echo$row['movies_Id']?>" class="card-link">Watch Now</a>
              </div>
          </div> <!--card div -->
         </div>
  </div>
<?php 
 }

 }
?>
</div>
</div>
</div>


</div> <!-- End of Div-->

<div class="main" id="English">
        <h3 class="h3 mt-2 ml-3 mb-2">Top English </h3>
        
        <div class="container-fluid p-3">
          <div class="row">
          <div class="owl-carousel owl-theme">
<?php
//$quariy = $con->query("SELECT * FROM movies WHERE Movie_Catag= 'Recommanded'");
$quariy = $con->query("SELECT * FROM movies_db WHERE Movie_Lang = 'English' AND Status = 'Active' ORDER BY Movie_Name ASC;");
 $num = mysqli_num_rows($quariy);
 if($num>=0){
  while ( $row = mysqli_fetch_array($quariy) ) {
     
    ?>
    <div class="item" id="items">
       <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="card" style="width: 13rem;height:253px">
         <a href="Movie_info.php/?v=<?php echo$row['movies_Id']?>"> <img src="<?php echo$row['Movie_Poster']?>"width="12rem" height="250rem"class="card-img-top rounded" alt="<?php echo$row['Movie_Poster']?>"></a>
             <div class="card-body">
                <h5 class="card-title"><?php //echo$row['Movie_Name']?></h5>
                 <p class="card-text"><Strong>Movie Type : </strong><?php //echo$row['Movie_Type']?></p>
              </div>
             <div class="card-body">
               <a href="Trailler.php/?v=<?php //echo$row['movies_Id']?>" class="card-link">Tralier</a>
               <a href="player.php/?v=<?php //echo$row['movies_Id']?>" class="card-link">Watch Now</a>
              </div>
          </div> <!--card div -->
         </div>
  </div>
<?php 
 }

 }
?>
</div>
</div>
</div>


</div> <!-- End of Div-->






<div class='modals'>
    
    <!-- Modal -->
<div class="modal fade" id="Setting"  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Account Setting</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
         <?php
         $quariy = $con->query("SELECT * FROM users_db WHERE users_Id = '$uid'");
 $num = mysqli_num_rows($quariy);
 if($num>=0){
  while ( $row = mysqli_fetch_array($quariy) ) {
//     echo "<pre>";
//     print_r($row);
//     echo "</pre>";
         
         ?>
         <div class='container-fluid'>
              <div class='card'>
                  <div class='card-header'><b>Welcome :</b>  <?php echo $fname; ?></div>
                  <div class='card-body'>
                      <div class="accordion" id="accordionExample">
                       <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Account info
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
          
          <label class='font-weight-bold'>Full Name : </label> <span><?php echo  $row['User_name']; ?></span><br><br>
        <label class='font-weight-bold'>Email Address : </label> <span><?php echo  $row['User_Email']; ?></span><br><br>
        <label class='font-weight-bold'>Phone Number : </label> <span><?php echo  $row['User_Phone']; ?></span><br><br><label class='font-weight-bold'>Account Status : </label> <span><?php echo  $row['User_Status']; ?></span>&nbsp;&nbsp;<br><br>
        <label class='font-weight-bold'>Plan Amount : </label> <span><?php echo  $row['User_Plan']; ?></span>&nbsp;&nbsp;&nbsp;
        <label class='font-weight-bold'>Plan Started : </label> <span><?php echo  $row['User_Date']; ?></span>&nbsp;&nbsp;&nbsp;
        <label class='font-weight-bold'>Plan Expired : </label> <span><?php echo  $row['User_PlanExp']; ?></span>&nbsp;&nbsp;&nbsp;
        
        
      </div>
    </div>
  </div>
                      <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Edit Account Details
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
          <div class='container'>
              <form id='editdetails' method="POST" action="">
                  <div class="form-group">
    <label for="EName">Full Name</label>
    <input type="text" class="form-control" id="EName"name='EName' value='<?php echo $row['User_name'] ?>'>
    
  </div>
                    <div class="form-group">
    <label for="EMail">Email Address</label>
    <input type="Email" class="form-control" id="EMame"name='EMail' value='<?php echo $row['User_Email'] ?>'>
    
  </div>
  <div class="form-group">
    <label for="EPhone">Phone Number</label>
    <input type="Number" class="form-control" id="EPhone"name='EPhone' value='<?php echo $row['User_Phone'] ?>'>
    
  </div>
           <div class="form-group">
    <label for="EPassword">New Password</label>
     <input type="password" class='form-control' name="EPassword" placeholder="Enter New Password"  autocomplete="off"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
    
  </div> 
                     <div class="form-group">
                       <?php
                       if($row['User_Plan'] > 390){
                           
                       }else{
                           echo "<a href='ls/upgrade.php' class='btn-warning btn text-white '>Upgrade plan</a>";
                       }
                       ?>
                         <input type='hidden' name='usr' value='<?php echo $row['users_Id']?>'>
                         <button class='btn-success btn ' id='submit' name='submit'>Update</button>
  </div>   
                  
              </form>
          </div>
      </div>
    </div>
  </div>
                      </div>
                      
                      
                  </div>
              </div>
          </div>
     
         <?php
 }}
         ?>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    
</div>


<script>

 $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
    loop:true,
    margin:40,
    dots:false,
    nav:false,
    stagePadding:10,
    autoplay:true,
     autoplayTimeout :5000,
    responsive:{
        0:{
            margin:-100,
            items:1
        
            
        },
        600:{
          margin:-25,
            items:3
           
        },
        1000:{
          margin:-120,
            items:5
        }
    }
});

function updateUserStatus(){
  $.ajax({
    url:'Admins/UsersOp/update_Status.php',
    success:function(){

    }
  });

}
setInterval(function(){
updateUserStatus();
},5000);


  

  // function get_filter_text(text_id){
  //   var filterData=[];
  //   $('#'+text_id")
  // }
  });

</script>
  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  </body>
</html>