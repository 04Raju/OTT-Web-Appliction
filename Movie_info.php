<?php

// BVM-Entertainment
require 'Main Folder/Db.php';
ini_set('session.save_path', 'Admins/Sessions');

session_start();



if(!isset($_SESSION['uid'])){
  
  header($MainLogin);
  die();
};

$msgs="";
$mssg="";
if(isset($_POST['submit'])){

    

};
$id = intval($_GET['v']);
$sql="SELECT * from movies_db Where movies_Id=$id";
$query= mysqli_query($con, $sql);

$row= mysqli_fetch_assoc($query);

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="CSS/owl.carousel.css">
    <link rel="stylesheet" href="CSS/owl.theme.green.css"> -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="Stylesheet" href="CSS/Style.css">
    <!-- <script src="JS/jquery.min.js"></script>
      <script src="JS/owl.carousel.min.js"></script> -->

    <title><?php echo $row['Movie_Name'] ?></title>
  </head>
  <body>

  <div class="jumbotron jumbotron-fluid">
  <div class="container">
  <div class="row">
  <div class="col-lg-6 col-md-6 col-sm-12">
<img id=poster src="<?php echo$row['Movie_Poster']?>"width="250px" height="200px"class="img-fluid img-thumbnail ml-5 mx-auto d-block" alt="<?php echo$row['Movie_Poster']?>">
<br>
<div class="text-center">
<a href="../player.php/?v=<?php echo$row['movies_Id']?>" class=" btn btn-primary p-3"><i class="fa fa-play"></i>  Watch Movie</a>
<a href="../Trailler.php/?v=<?php echo$row['movies_Id']?>" class=" btn btn-danger p-3"><i class="fa fa-play"></i>  Watch Trailer</a>
  </div>
  </div><!--right div--->


  <div class="col-lg-6 col-md-6 col-sm-6">
    <h1 class="display-4" id=title><?php echo $row['Movie_Name'] ?></h1>

    <p class="lead"><?php echo $row['Movie_Desc']?></p>



    <iframe style="float-left" width="auto" height="200px" src="https://<?php echo $row['Movie_TL']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  
  </div><!--leftdiv--->


</div>
</div>
</div>

      <script>
        var urls= "https://www.omdbapi.com/?i=tt3896198&apikey=fd62afc1&t=<?php echo $row['Movie_Name']?>";
          var xhttp= new XMLHttpRequest();
          
          xhttp.onreadystatechange = function(){
              if(this.readyState == 4 ){
                  console.log(this.responseText);
                  
                   var myArr = JSON.parse(this.responseText);
        myFunction(myArr);
        
             
              }
          }
          xhttp.open("GET",urls,true);
          xhttp.send();
          function myFunction(data) {
              console.log(data);
               if("Movie not found" == data.Error){
          // console.log(data.Error);


         }
         else if("True" == data.Response){

          $("#title").html(data.Title);

$(".lead").html("<br><strong>Relased : </strong>"+data.Released+"<br>"+"<strong>Genre : </strong>"+data.Genre+"<br><strong>Director : </strong>"+data.Director+"<br>"+"<strong>Casts : </strong>"+
   data.Actors+"<br><strong>Runtime : </strong>"+data.Runtime+"&nbsp&nbsp&nbsp<strong>Ratings : </strong>"+data.imdbRating+"/10");
   $("#poster").attr("src",data.Poster);

         }else{

         }
          }
          //console.log(myArr);
          
          

          </script>


<script>
//var urls = "https://www.omdbapi.com/?i=tt3896198&apikey=fd62afc1&t" + "&t="
// + encodeURI(<?php echo $row['Movie_Name']?>) +"tomatoes=true";
// 
// var urls= "https://www.omdbapi.com/?i=tt3896198&apikey=fd62afc1&t=<?php echo $row['Movie_Name']?>";
//var i,x="";
//console.log(urls);
//;
//$.ajax({
//    
//     url: urls,
//     type:"GET",
//     contentType:"application/json",
//     dataType: 'json',
//     success:function(data){
//         console.log(data);
//
//         if("Movie not found" == data.Error){
//          // console.log(data.Error);
//
//
//         }
//         else if("True" == data.Response){
//
//          $("#title").html(data.Title);
//
//$(".lead").html("<br><strong>Relased : </strong>"+data.Released+"<br>"+"<strong>Genre : </strong>"+data.Genre+"<br><strong>Director : </strong>"+data.Director+"<br>"+"<strong>Casts : </strong>"+
//   data.Actors+"<br><strong>Runtime : </strong>"+data.Runtime+"&nbsp&nbsp&nbsp<strong>Ratings : </strong>"+data.imdbRating+"/10");
//   $("#poster").attr("src",data.Poster);
//
//         }else{
//
//         }

        

            // for ( i = 0; i < data.Ratings.length; i++) {
            //  x +=data.Ratings[i];
            //  console.log("Rating",x);
            //  $(".lead").append("<br><strong>Ratings : </strong>"+data.Ratings[x]);
                
            //     }

           
//     }
// });
</script>
  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  </body>
</html>