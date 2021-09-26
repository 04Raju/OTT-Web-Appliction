<?php
require '../Main Folder/Db.php';


ini_set('session.save_path', '../Admins/Sessions');

session_start();


if(!isset($_SESSION['mail'])){
  //echo ($MainIndex);
 header($MainIndex);
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
    <link rel="stylesheet" href="../../CSS/owl.carousel.css">
    <link rel="stylesheet" href="../../CSS/owl.theme.green.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="Stylesheet" href="../../CSS/Style.css">
    <script src="../../JS/jquery.min.js"></script>
      <script src="../../JS/owl.carousel.min.js"></script>
    <title id="tab">Bvm- Entertainment</title>
  </head>
  <style>
  @media only screen and (max-width: 600px){
    .my-custom-scrollbar {
position: relative;
height: 250px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}
.player{
  margin-top:20px;
}
  }
  .header{
        position:sticky;
        top: 0 ;
    }
 
  .anime{
    animation:rotatePlayer 5s linear infinite;

  }
  @keyframes rotatePlayer{
    from{transform:rotate(0deg);
    }
    to{
      transform:rotate(360deg);
    }
  }

img{
  border: 3px solid green;
  border-radius:50% !important;

}

img{
  border: 3px solid #5cb85c;
  border-radius:50% !important;

}
.progress_div{
    width:100%;
    height:0.5rem;
    box-shadow:0 1px 2px white;

    border-radius:4rem;
    position: relative;
    margin-top:0.5rem;
    transition:all 1s linear;
    -moz-transition:all 1s linear;
    -o-transition:all 1s linear;
    -webkit-transition:all 1s linear;
    cursor:pointer;
    -webkit-apperance:none;
    appearance:none;



}
.progress{
    position: absolute;
    top:0;
    left:0;
    width: 0%;
    height:100%;
    background-color:#5cb85c;
    transition:all 1s linear;
    -moz-transition:all 1s linear;
    -o-transition:all 1s linear;
    -webkit-transition:all 1s linear;
    cursor:pointer;
    -webkit-apperance:none;
    appearance:none;


}
.progress_duration_meter{
    display:flex;
    justify-content:space-between;
    font-size:1.2rem;
    color:white;
}
.fa{
    cursor: pointer;
}
body{
  
}
  </style>
  <body>


  <div class="container mt-3">
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12">
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table table-hover table table-striped table-dark">
  <thead class="thead-light">
    <tr class="bg-bark">
      <!-- <th class="header"scope="col">ID</th> -->
      <th class="header" scope="col">Songs</th>
      <th class="header" scope="col">Play</th>
    </tr>
  </thead>
  <tbody>
  <tr>
  <?php
        include('../OTT_DB.php');
            $id = intval($_GET['v']);
            $quariy = $con->query("SELECT * FROM musics_db WHERE Song_Artist=$id ORDER BY Song_Name Asc;"); 
            $num = mysqli_num_rows($quariy);
            
            $i=0;
            if($num>=0){ 
              
             while ( $row = mysqli_fetch_array($quariy) ) {
              
               ?>
      <!-- <th scope="row"><?php echo $i?></th> -->
      <td scope="row"style="text-transform:Uppercase"><?php echo $row['Song_Name']?></td>
      <td scope="row"><button class="btn btn-success" onclick="loadSong(obj,'<?php echo $i?>')">Play</button></td>
   
      </tr>
    <?php
    $i++;
}
     }
?>
  </tbody>
</table>
</div>
    </div> 

    <!-- player -->
    <div class="col-lg-6 col-md-6 col-sm-12">
    <?php
$sql="SELECT * from musics_db Where Song_Artist=$id ORDER BY Song_Name Asc;";
$query= mysqli_query($con, $sql);

$row= mysqli_fetch_assoc($query);
    ?>
     <?php
$sqls="SELECT * from artists_db Where artists_Id=$id";
$querys= mysqli_query($con, $sqls);
$rows= mysqli_fetch_assoc($querys);
    ?>
  <div class="player">
    <div class="card bg-dark col-lg-12 col-md-12 col-sm-12">
  <div class="card-header">
    <h3 class="text-center text-uppercase" id="title"><?php echo $row['Song_Name']?></h3>
  </div>
  <div class="card-body">
  <img class="mx-auto d-block"src="<?php echo $row['Song_Poster']?>"style="border-radius:50%;width:200px;" alt="<?php echo $row['Song_Poster']?>">
    <h5 class="card-title text-center text-light mt-2" id="artist"><?php echo $rows['Artists_Name']?></h5>
    <audio>
  <source src="https://docs.google.com/uc?export=download&id=<?php echo $row['Song_Link']?>">
</audio>

<div class="progressbar_container" id="progress_container">
<div class="progress_duration_meter">
<div id="current_time">0:00</div>
<div id="duration">4:00</div>

</div>
<div class="progress_div" id="progress_div">
<div class="progress" id="progress"></div>
</div>

</div>

    <p class="card-text">

    <div class="music_controls text-center text-light">
<i class="fa fa-backward mr-4" id="prev" title="Previous" style="font-size:20px"></i>
<i class="fa fa-play mr-4" id="play" title="Play" style="font-size:20px"></i>
<i class="fa fa-forward mr-4" id="next" title="Next" style="font-size:20px"></i>
</div>
    </p>
  </div>
</div>
</div>
   


  </div>

    </div>
   
</div>
</div> <!--- div div -->

<script>

const music =document.querySelector("audio");
const img= document.querySelector("img");
const play= document.getElementById("play");
const artist = document.getElementById("artist");
const title= document.getElementById("title");
const prev= document.getElementById("prev");
const next=document.getElementById("next");
const source = document.querySelector("source");
const tab= document.getElementById("tab");
const progress_div = document.getElementById("progress_div");


let total_duration= document.getElementById("duration");
let progress= document.getElementById("progress");
let current_time= document.getElementById("current_time");

const songs= [{
    <?php
        $quariy = $con->query("SELECT * FROM musics_db WHERE Song_Artist=$id ORDER BY Song_Name Asc;"); 
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
    
   // img.classList.add("anime");
    music.loop=true;

 };
 const pauseMusic=()=>{
    isPlaying= false;
    music.pause();
    play.classList.replace("fa-pause","fa-play");
    img.classList.remove("anime");

 };

 play.addEventListener("click",()=>{
    isPlaying ?pauseMusic():playMusic();
 });

const loadSong=(obj,v) =>{
  var obj = JSON.parse(data);
title.textContent = obj[v].Song_Name;
tab.textContent= obj[v].Song_Name;
//artist.textContent =obj[v].Song_Artist;
console.log(obj[v].Song_Name);
img.src=(obj[v].Song_Poster);
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

music.addEventListener('timeupdate',(event) => {
//console.log(event);
const{currentTime,duration}=event.srcElement;
// console.log(currentTime);
// console.log(duration);
 let progress_time = (currentTime / duration) * 100;
 progress.style.width = `${progress_time}%`;

 //duration
 let min_duration = Math.floor(duration / 60);
 let sec_duration = Math.floor(duration % 60);

 let tot_duration = `${min_duration}:${sec_duration}`;
    if(duration){
 total_duration.textContent = tot_duration;
//  img.classList.add("anime");
}


 // current time duration
 let min_current_time = Math.floor(currentTime / 60);
 let sec_current_time = Math.floor(currentTime % 60);



    if(sec_current_time <10){
        sec_current_time = `0${sec_current_time}`;
    }
    let tot_current_time = `${min_current_time}:${sec_current_time}`;
 current_time.textContent = tot_current_time;
 img.classList.add("anime");

});


// progress_div 

progress_div.addEventListener("click", (event) =>{

    const {duration} = music;
    

 let move_progress = (event.offsetX / event.srcElement.clientWidth) * duration;
 //console.log(duration);
 music.currentTime = move_progress;

});
music.addEventListener("ended",nextSong);
next.addEventListener("click",nextSong);
prev.addEventListener("click",prevSong);

</script>


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>