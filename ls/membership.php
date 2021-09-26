
<?php
ini_set('session.save_path', '../Admins/Sessions');

session_start();
require '../Main Folder/Db.php';



if(!isset($_SESSION['mail'])){

  $_SESSION['Message']='Please Try again after sometime';

  echo $_SESSION['Message'];

  //header('location:http://192.168.0.104/OTT-Application/ls/login.php');

  session_destroy();

  die();
};

$mail= $_SESSION['mail'];
//echo $mail;



?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
       <link rel="icon" type="image/png" href="../Images/Favicon/favicon.ico"/>
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


  <div class="main mt-5">
  <div class="container-fluid ml-3">
<!--      <?php 
//      if(isset($_SESSION['upgrade'])){
//    echo "<h1 class='text-center text-white mb-5'> {$_SESSION['upgrade']}</h1>";
//}
      
      ?>
      -->
      <h1 class="text-center text-white"> Choose Membership Plan's</h1>
          
          <div class="owl-carousel owl-theme">
          <?php
$quariy = $con->query("SELECT * FROM subscription_db");
//$quariy = $con->query("SELECT * FROM movies");
 $num = mysqli_num_rows($quariy);
 if($num>=0){
  while ( $row = mysqli_fetch_array($quariy) ) {
    ?>
    
     <div class="item" id="items">
       <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="card mt-2" style="width: 16rem; height:28rem">
        <h5 class="card-title text-center mt-4"><?php echo$row['Sub_Name']?></h5>
        <hr Style="border:1px solid green">
          <!-- <img src="Posters/<?php echo$row['Sub_Poster']?>"width="12rem" height="25rem"class="card-img-top" alt="<?php echo$row['Sub_Poster']?>"> -->
             <div class="card-body mb-2">
                 <p class="card-text"><Strong>Type : </strong><?php echo$row['Sub_Type']?></p>
                <p class="card-text"><Strong> Description : </strong><br><?php echo$row['Sub_Desc']?></p>
             
                <h4 class="card-text text-center"><Strong><?php echo$row['Sub_Amount']?><span id=spanrupee> &#8377</span></strong></h4>
               
              </div>
         <hr Style="border:1px solid green">
        <div class="card-footer">
              <a href="../py/checkouts.php?v=<?php echo $row['subs_Id']?>" target="_blank" class="btn btn-primary btn-lg btn-block" style=""><i class="fa fa-play"></i>  Subscribe Now</a>
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


  
<script>
   $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
    loop:false,
    margin:50,
    dots:false,
    nav:false,
    stagePadding:10,
    autoplay:false,
     autoplayTimeout :1000,
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
          margin:250,
            items:5
        }
    }
})

  });

</script>
  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  </body>
</html>