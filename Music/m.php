<?php

require '../Main Folder/Db.php';
$msgs="";
$mssg="";
if(isset($_POST['submit'])){


};

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../CSS/owl.carousel.css">
    <link rel="stylesheet" href="../../CSS/owl.theme.green.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="Stylesheet" href="../../CSS/Style.css">
    <link rel="Stylesheet" href="m.css">
    <script src="../../JS/jquery.min.js"></script>
      <script src="../../JS/owl.carousel.min.js"></script>
    <title>Softx-OTT</title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-info  sticky-top">
  <a class="navbar-brand" href="index.php">SOFTX-OTT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-5 mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown bg-info" >
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              lanaguage
              </a>
              <div class="dropdown-menu bg-info" aria-labelledby="navbarDropdown">
                <a class="dropdown-item"style="color:Black;" href="#Top_movies">Hindi</a>
                <a class="dropdown-item"style="color:Black;" href="#Blog">Marathi</a>
            
              </div>
            </li>
            <li class="nav-item dropdown bg-info" >
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Categories
              </a>
              <div class="dropdown-menu bg-info" aria-labelledby="navbarDropdown">
                <a class="dropdown-item"style="color:Black;" href="#Top_movies">Top Movies</a>
                <a class="dropdown-item"style="color:Black;" href="#Blog">Tips & Tricks</a>
            
              </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#Setting">Settings</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#news">News</a>
              </li>

</nav>


<table class="table table table-striped table-light">
  <thead class="thead-light">
    <tr class="bg-bark">
      <th scope="col">ID</th>
      <th scope="col">Songs</th>
    </tr>
  </thead>
  <tbody>
  <tr>
  <!-- const loadSong=(obj,v) =>{
  var obj = JSON.parse(data); -->
  <?php
        include('../OTT_DB.php');
            $id = intval($_GET['v']);
            $quariy = $con->query("SELECT * FROM musics_db WHERE Song_Artist=$id"); 
            $num = mysqli_num_rows($quariy);
            $i=0;
            if($num>=0){ 
              
             while ( $row = mysqli_fetch_array($quariy) ) {
              
               ?>
      <th scope="row"><?php echo $i?></th>
      <td scope="row"style="text-transform:Uppercase"><?php echo $row['Song_Name']?><button onclick="loadSong(obj,'<?php echo $i?>')">Play</button></td>
    </tr>
    <?php
    $i++;
}
     }
?>

  </tbody>
</table>
<?php
$sql="SELECT * from musics_db Where Song_Artist=$id";
$query= mysqli_query($con, $sql);

$row= mysqli_fetch_assoc($query);
    ?>
<!-- <audio controls controlsList="nodownload"> -->
<audio controls>
  <source src="https://docs.google.com/uc?export=download&id=<?php echo $row['Song_Link']?>">
</audio>
<div class="music_container">
<h2 id="title">Raju Dada</h2>
<h3 id="artist">Raju Bhai</h3>
<div class="img_container">
<!-- <img src="https://img.freepik.com/free-vector/music-event-poster-template-with-colorful-shapes_1361-1591.jpg?size=626&ext=jpg"style="border-radius:50%;width:200px;" alt=""> -->
<img src="../../Images/Songs/<?php echo $row['Song_Poster']?>"style="border-radius:50%;width:200px;" alt="">
</div>
<div class="music_controls">
<i class="fa fa-backward" id="prev" title="Previous"></i>
<i class="fa fa-play" id="play" title="Play"></i>
<i class="fa fa-forward" id="next" title="Next"></i>
</div>




<!-- <div class="container">
<div class="row">
<div class="owl-carousel owl-theme">

<audio controls>
<source src="https://docs.google.com/uc?export=download&id=1J-k9gbwJOjhTMfxCXdHUQzL3rJPbc4Zw">
</audio>
<div class="progressbar_container" id=progressbar_container>
<div class="progress_duration_meter">
<div id="current_time">0:00</div>
<div id="duration"></div>
</div>
<div class="progress_div" id="progress_div">
<div class="progress"id="progress"></div>
</div>
</div>




</div>
</div>

</div> row div-->
</div>
</div> main div -->




<script>

const music =document.querySelector("audio");
const img= document.querySelector("img");
const play= document.getElementById("play");
const artist = document.getElementById("artist");
const title= document.getElementById("title");
const prev= document.getElementById("prev");
const next=document.getElementById("next");
const source = document.querySelector("source");


const songs= [{
    <?php
        $quariy = $con->query("SELECT * FROM musics_db WHERE Song_Artist=$id"); 
        //$query = $con-> mysql_query("SELECT * FROM musics_db WHERE Song_Artist=$id");
        while ($row =mysqli_fetch_all($quariy,MYSQLI_ASSOC)) {
        
          $myJSON = json_encode($row);
         
        }
        
    ?>
}];

var data = '<?php echo $myJSON; ?>';
console.log(data);
var obj = JSON.parse(data);
console.log(obj[0].Song_Name);


let isPlaying=false;

 const playMusic =()=>{
    isPlaying= true;
    music.play();
    play.classList.replace("fa-play","fa-pause");
    //img.classList.add("anime");

 };
 const pauseMusic=()=>{
    isPlaying= false;
    music.pause();
    play.classList.replace("fa-pause","fa-play");
    //img.classList.add("anime");

 };

 play.addEventListener("click",()=>{
    isPlaying ?pauseMusic():playMusic();
 });

const loadSong=(obj,v) =>{
  var obj = JSON.parse(data);
title.textContent = obj[v].Song_Name;
artist.textContent =obj[v].Song_Artist;
console.log(obj[v].Song_Name);
img.src="../../Images/Songs/"+(obj[v].Song_Poster);
music.src="https://docs.google.com/uc?export=download&id="+obj[v].Song_Link;
playMusic();
};
songIndex =1;
//loadSong(obj,songIndex);

const nextSong=()=>{
  songIndex =(songIndex +1)% obj.length;
  loadSong(obj,songIndex);
  playMusic();
}
const prevSong=()=>{
  songIndex =(songIndex -1 + obj.length)%obj.length;
  loadSong(obj,songIndex);
  playMusic();
}
next.addEventListener("click",nextSong);
prev.addEventListener("click",prevSong);

</script>
  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  </body>
</html>