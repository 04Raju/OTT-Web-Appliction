<?php
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="Stylesheet" href="CSS/Style.css">
    <style>

body{
  background:black;
}
  
.responsive{
    position: relative;
    overflow:hidden;
    padding-top:56.25%;
    height:100vh;
}
.responsive iframe{
    position: absolute;
    top:0;
    left:0;
    width: 100%;
    height: 100vh;
}
      </style>

      <?php
$id = intval($_GET['v']);
$sql="SELECT * from movies_db Where movies_Id=$id";
$query= mysqli_query($con, $sql);

$row= mysqli_fetch_assoc($query);
    ?>
    <title>Now Playing :- <?php echo$row['Movie_Name']?> Trailer</title>
   
  </head>
  <body>
  <div class="responsive">
        <?php
            
            //echo $id; 
            
            $quariy = $con->query("SELECT * FROM movies_db WHERE movies_Id=$id"); 
            $num = mysqli_num_rows($quariy);
            if($num>=0){
             while ( $row = mysqli_fetch_array($quariy) ) {
               ?>
               
<!-- <iframe classs=".Tframe" width="550" height="315" src="https://<?php echo$row['Movie_TL']?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" scrolling="no" seamless="" allowfullscreen></iframe> -->

        <iframe src="https://<?php echo$row['Movie_TL']?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  
  <!-- <iframe  width="1200px" height="700px" src="https://drive.google.com/file/d/<?php echo$row['Movie_ML']?>/preview" frameborder="0"  allow="autoplay; accelerometer" scrolling="no" seamless="" allowfullscreen></iframe> -->
    
<?php
}
            }
?>
</div>
  <!-- <div class ="container-fluid" height="100%">
  <iframe width="853" height="480" src="https://<?php echo$row['Movie_TL']?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" scrolling="no" seamless="" allowfullscreen allowfullscreen></iframe>
  <iframe id="Mplayer" width="100%" height="100%" src="https://drive.google.com/file/d/<?php echo$row['Movie_ML']?>/preview" frameborder="0"  allow="autoplay; accelerometer" scrolling="no" seamless="" allowfullscreen></iframe>
  </div> -->
  
  
    <!-- 
</video>
  <div class="container">
  <iframe width="853" height="480" src="https://www.youtube.com/embed/2Ym7LJv6L_c" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<video width="320" height="240" autoplay muted>
<source src="https://drive.google.com/uc?export=download&id=144IsqKcne5SL57EXh9hzIiT8DfNFX3r_" type="video/mp4">
<source src="https://youtu.be/2Ym7LJv6L_c" type="video/ogg">
Your browser does not support the video tag.
</video>  -->


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>