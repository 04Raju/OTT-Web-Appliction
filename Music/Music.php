
<?php

require '../Main Folder/Db.php';

$result= $con->query("Select * from banner_db Where Banner_Status = 'active' && Banner_Use= 'music'");


?>
<?php

ini_set('session.save_path', '../Admins/Sessions');

session_start();


if(!isset($_SESSION['mail'])){
  //echo ($MainIndex);
 header($MainIndex);
  die();
};

$mail= $_SESSION['mail'];
$fname= $_SESSION['fname'];
//echo  $mail;
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../CSS/owl.carousel.css">
    <link rel="stylesheet" href="../CSS/owl.theme.green.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="Stylesheet" href="../CSS/Style.css">
    <script src="../JS/jquery.min.js"></script>
      <script src="../JS/owl.carousel.min.js"></script>
    <title>BVM-Entertainment</title>
  </head>
  <body>


  <nav class="navbar navbar-expand-lg navbar-dark bg-primary  sticky-top">
  <a class="navbar-brand" href="">BVM-Entertainment</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-5 mr-auto">
      <li class="nav-item ">
        <a class="nav-link mr-4" id='home' href="../main.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown bg-primary" >
              <a class="nav-link dropdown-toggle mr-4" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              lanaguage
              </a>
              <div class="dropdown-menu bg-primary" aria-labelledby="navbarDropdown">
                <a class="dropdown-item"style="color:Black;" href="#hindi">Hindi</a>
                <a class="dropdown-item"style="color:Black;" href="#marathi">Marathi</a>
            
              </div>
            </li>
            <li class="nav-item dropdown bg-primary" >
              <a class="nav-link dropdown-toggle mr-4" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Categories
              </a>
              <div class="dropdown-menu bg-primary" aria-labelledby="navbarDropdown">
                <a class="dropdown-item"style="color:Black;" id="topmusic" href="#Top_Music">Top Songs</a>
               
              </div>
            </li>

            <li class="nav-item">
                <a class="nav-link mr-4"  id="music"  href="../main.php">Movies</a>
              </li>
         
              <!-- <li class="nav-item ml-5" style="margin-left:400px">
                <a class="nav-link" href="Music/Music.php">Account</a>
              </li> -->
              <li class="nav-item dropdown bg-primary" >
              <a class="nav-link dropdown-toggle mr-4" id=""  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Accounts
              </a>
              <div class="dropdown-menu bg-primary" aria-labelledby="navbarDropdown">
                <a class="dropdown-item"style="color:Black;" id=""  href="../logout.php">Log-Out</a>
            
            
              </div>
            </li>

            <li class="nav-item" id="CP">
        <a class="nav-link ml-5" href="Music.php"> Login As :- <?php echo $fname?></a>
      </li>

              <!-- <form class="form-inline my-2 my-lg-0 ">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="radius:50px; width:420px;margin-left:120px">
      <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </form>
     -->

           
</nav>
<div class="main" id="sidebar">

</div>

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



<div class="main" id="artist">
<div class="container-fluid mt-5">
    <div class="owl-carousel owl-theme">
<?php

$quariy = $con->query("SELECT * FROM artists_db WHERE Artists_Status = 'Active' ORDER BY Artists_Name ASC");
//$quariy = $con->query("SELECT * FROM movies");
 $num = mysqli_num_rows($quariy);
 if($num>=0){
  while ( $row = mysqli_fetch_array($quariy) ) {
    ?>
    <div class="item" id="items">
  <div class="col-lg-6 col-md-6 col-sm-12">
<div class="card bg-dark" style="width: 13rem;">
  <a class=".text-success" href="players.php/?v=<?php echo$row['artists_Id']?>"style="color:white;text-decoration:none">
  <h4  class="card-header text-center bg-dark"><?php echo strtok($row['Artists_Name'], " ");?></h4>
  <img class="card-img-top" src="<?php echo $row['Artists_Poster']?>"style="height:150px; width:13rem; border-radius: 5%;" alt="<?php echo $row['Artists_Poster']?>">
  </a>
  
</div>

</div>

</div>


<?php
  }
}?>
</div>
</div>
</div>

<div class="contianer-fluid">
<label class="font-weight-bold h3 text-white-50 p-2 ">Popular albums </label>
<div class="container-fluid mt-2">
    <div class="owl-carousel owl-theme">
<?php

// $quariy = $con->query("SELECT * FROM song_albumdb WHERE Status= 'Active'");
$quariy = $con->query("SELECT * FROM song_albumdb");
 $num = mysqli_num_rows($quariy);
 if($num>=0){
  while ( $row = mysqli_fetch_array($quariy) ) {
    ?>
    <div class="item" id="items">
  <div class="col-lg-6 col-md-6 col-sm-12">
<div class="card bg-dark" style="width: 14rem; height:18rem">
  <a class=".text-success" href="player.php/?v=<?php echo$row['Sr_no']?>"style="color:white;text-decoration:none">
  <h4  class="card-header text-center bg-dark"><?php echo $row['AlbumName']?></h4>
  <img class="card-img-top" src="<?php echo $row['url']?>"style="height:230px; width:14rem; border-radius: 5%;" alt="<?php echo $row['Song_Poster']?>">
  </a>
  
</div>

</div>

</div>


<?php
  }
}?>
</div>
</div>

</div>


<div class="contianer-fluid">
<label class="font-weight-bold h3 text-white-50 p-2" id="Top_Music">Top Music </label>
<div class="container-fluid mt-2">
    <div class="owl-carousel owl-theme">
<?php
include('../OTT_DB.php');
$sql= "SELECT * FROM playlists WHERE Status = 'active'";
$quariy = $con->query($sql);
//$quariy = $con->query("SELECT * FROM movies");
 $num = mysqli_num_rows($quariy);
 if($num>=0){
  while ( $row = mysqli_fetch_array($quariy) ) {
    ?>
    <div class="item" id="items">
  <div class="col-lg-6 col-md-6 col-sm-12">
<div class="card bg-dark" style="width: 14rem; height:18rem">
  <a class=".text-success" href="player.php/?p=<?php echo$row['Sr_no']?>"style="color:white;text-decoration:none">
  <h4  class="card-header text-center bg-dark"><?php echo $row['Name']?></h4>
  <img class="card-img-top" src="<?php echo $row['poster_url']?>"style="height:230px; width:14rem; border-radius: 5%;" alt="<?php echo $row['Song_Poster']?>">
  </a>
  
</div>

</div>

</div>


<?php
  }
}?>
</div>
</div>

</div>

  <script>


$(document).ready(function(){
         $('.owl-carousel').owlCarousel({
 loop:true,
 margin:50,
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
         items:6
        
     },
     1000:{
       margin:20,
         items:5
     }
 }
});



// function get_filter_text(text_id){
//   var filterData=[];
//   $('#'+text_id")
// }
});

$('#home').addClass('active');

</script>


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>