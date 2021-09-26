
<?php


$result= $con->query("Select * from banner_db Where Banner_Status = 'active' && Banner_Use= 'main'");

// BVM-Entertainment
require 'Main Folder/Db.php';

ini_set('session.save_path', 'Admins/Sessions');

session_start();



if(!isset($_SESSION['uid'])){
  
  header($MainLogin);
  die();
};

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
<div class="main" id="sidebar">

</div>




<div class="main" id="artist">
<div class="container-fluid mt-5">
    <div class="owl-carousel owl-theme">
<?php
include('../OTT_DB.php');
$quariy = $con->query("SELECT * FROM artists_db");
//$quariy = $con->query("SELECT * FROM movies");
 $num = mysqli_num_rows($quariy);
 if($num>=0){
  while ( $row = mysqli_fetch_array($quariy) ) {
    ?>
    <div class="item" id="items">
  <div class="col-lg-6 col-md-6 col-sm-12">
<div class="card bg-dark" style="width: 13rem;">
  <a class=".text-success" href="players.php/?v=<?php echo$row['artists_Id']?>"style="color:white;text-decoration:none">
  <h4  class="card-header text-center bg-dark"><?php echo $row['Artists_Name']?></h4>
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
include('../OTT_DB.php');
$quariy = $con->query("SELECT * FROM song_albumdb");
//$quariy = $con->query("SELECT * FROM movies");
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
<label class="font-weight-bold h3 text-white-50 p-2 ">Top Music </label>
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
 loop:false,
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
         items:5
        
     },
     1000:{
       margin:-120,
         items:5
     }
 }
})

// function get_filter_text(text_id){
//   var filterData=[];
//   $('#'+text_id")
// }
});

</script>


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>