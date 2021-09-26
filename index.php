<?php

// BVM-Entertainment
require 'Main Folder/Db.php';
$msgs="";
$mssg="";
if(isset($_POST['submit'])){


};

?>
<!doctype html>
<html lang="en">
  <head>
      <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
   body{
    font-family: 'Poppins', sans-serif;
     font-size:16px;
   }
   #fq{
     text-align:center;
   }

   #fq .card, .btn-link{
    background-color:#34495E !important; 
    color:white;
   
   }
   .btn-link:hover{
    color:white;
   }
   html{
  scroll-behavior: smooth;
}
   </style>
  </head>
  <body class="p-0">

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top p-0">
  <a class="navbar-brand" href="index.php">BVM-Entertainment</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ml-5" >
      <li class="nav-item  ml-5">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item ml-5" >
        <a class="nav-link" href="#Subs">Subscription </a>
      </li>
      <li class="nav-item ml-5">
        <a class="nav-link" href="#">Blogs </a>
      </li>
      <li class="nav-item ml-5">
        <a class="nav-link" href="#fq">F&Q </a>
      </li>
      <li class="nav-item ml-5">
        <a class="nav-link" href="#">Contact-Us </a>
      </li>
      
    </ul>
    <form class="form-inline">
    <a href="ls/login.php" class="btn btn-primary" style=""><i class="fa fa-user"></i> Login</a>
    <a href="ls/Register.php" class="btn btn-primary" style=""><i class="fa fa-user-plus"></i> Register</a>
  </form>
    
  </div>
  
</nav>


<div class="container-fluid "  id="home">
<!-- <h1 class="head">Home</h1> -->
<div id="carouselExampleFade" class="carousel slide carousel-fade fluid" data-ride="carousel">
  <!-- <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol> -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://collider.com/wp-content/uploads/inception_movie_poster_banner_01.jpg"width="100vw" height="360px" class="d-block w-100" alt="...">
      <div class="carousel-caption">
        <h5>Unlimited movies, TV shows and more.</h5>
        <p>Look wherever you want. Cancel whenever you want.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="Images/bgimages/background1.jpg"width="100vw" height="360px"  class="d-block w-100" alt="...">
      <div class="carousel-caption">
        <h5>Unlimited movies, TV shows and more..</h5>
        <p>Look wherever you want. Cancel whenever you want..</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://image.freepik.com/free-vector/movie-time-neon-sign-popcorn-bucket-clapperboard-film-reel-poster_1262-13530.jpg"width="100vw" height="360px" class="d-block w-100" alt="...">
      <div class="carousel-caption">
        <h5>Unlimited movies, TV shows and more...</h5>
        <p>Look wherever you want. Cancel whenever you want...</p>
      </div>
    </div>
</div>
</div>
</div> <!-- End of Home Div -->

<div class="main " id="Subs">
<h2 class="head">Subscription</h2>

<div class="container-fluid p-3">
          <div class="row">
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
        <div class="card mt-2" style="width: 16rem; height:25rem">
        <h5 class="card-title text-center mt-4"><?php echo$row['Sub_Name']?></h5>
        <hr Style="border:1px solid green">
          <!-- <img src="Posters/<?php echo$row['Sub_Poster']?>"width="12rem" height="25rem"class="card-img-top" alt="<?php echo$row['Sub_Poster']?>"> -->
             <div class="card-body">
                 <p class="card-text"><Strong>Type : </strong><?php echo$row['Sub_Type']?></p>
                <p class="card-text"><Strong> Description : </strong><br><?php echo$row['Sub_Desc']?></p>
                <h4 class="card-text text-center"><Strong><?php echo$row['Sub_Amount']?><span id=spanrupee> &#8377</span></strong></h4>
                 <a href="ls/Register.php" target="blank" class="btn btn-primary btn-lg btn-block" style=""><i class="fa fa-play"></i>  Subscribe Now</a>
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

</div> <!-- End of Sab Div-->

<div class="main" id="parallex">

</div> <!--End of parallex Div-->

<div class="main" id="blog">

<!--<h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui maiores veritatis corporis modi quibusdam error nemo dolores molestiae, quos, tempore incidunt et in consequatur facere exercitationem illo, praesentium sunt libero!
</h2>-->
</div> <!--End of Blog Div-->

<div class="main " id="fq">
<div class="container-fluid  p-1">
<h2 class="text-center mt-3 text-light"> Frequently Asked Questions </h2>
    <div class="row">
        <div class="col-10 mx-auto">
            <div class="accordion" id="faqExample">
                <div class="card">
                    <div class="card-header p-2" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              Q: What is BVM-Entertainment

                            </button>
                          </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqExample">
                        <div class="card-body">
                            <b>Answer:</b> BVM - Entertainment Provide you wide collection of Movies and Music.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header p-2" id="headingTwo">
                        <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Q: Why BVM-Entertainment
                        </button>
                      </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqExample">
                        <div class="card-body">
                        BVM-Entertainment Provide you Entertainment in Very Cheap.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header p-2" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              Q. IS BVM-Entertainment  provide Free service's
                            </button>
                          </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqExample">
                        <div class="card-body">
                            Yes, BVM-Entertainment provide you Free service's but, first you will charge then it be return back within 30days.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header p-2" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              Q. What is the next question?
                            </button>
                          </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqExample">
                        <div class="card-body">
                            The answer to this question can go here. This FAQ example can contain all the Q/A that is needed.
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--/row-->
</div>
<!--container-->
</div> <!--End of Fq Div-->
  
<div class="main" id="footer">

<!--<h3 class="text-center"> Footer - Section </h3>-->

<?php include 'testdata.php'?>;
</div> <!--End of footer Div-->



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
            items:2
           
        },
        
        1000:{
          margin:250,
            items:5
        }
    }
});

$(document).ready(function () {
              $("ul.navbar-nav > li").click(function (e) {
               $("ul.navbar-nav > li").removeClass("active");
               $(this).addClass("active");
                });
            });

  });

</script>


<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/60a54964185beb22b30ecbdc/1f62qdeh1';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  </body>
</html>