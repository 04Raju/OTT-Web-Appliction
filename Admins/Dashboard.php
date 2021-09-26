<?php include('../OTT_DB.php');

$sql= "SELECT * FROM movies_db";
$quariy = $con->query($sql); 
$TotalMovies = mysqli_num_rows($quariy);
$sql= "SELECT * FROM musics_db";
$quariy = $con->query($sql); 
$TotalMusics = mysqli_num_rows($quariy);
$sql= "SELECT * FROM users_db";
$quariy = $con->query($sql); 
$TotalUsers = mysqli_num_rows($quariy);
$sql= "SELECT * FROM teammembers";
$quariy = $con->query($sql); 
$TotalTeams = mysqli_num_rows($quariy);

$sql="SELECT COUNT(User_Status) as tcount, User_Status FROM users_db GROUP BY User_Status";
//echo $sql;
$status = array();
$quariy = $con->query($sql); 
$num = mysqli_num_rows($quariy);
if($num>=0){

    $status= mysqli_fetch_all($quariy,MYSQLI_ASSOC);

}
$sql="SELECT COUNT(Song_Lang) as tcount, Song_Lang FROM musics_db GROUP BY Song_Lang";
//$sql="SELECT COUNT(Song_Lang) as tlang, Song_Lang ,COUNT(Song_Type) as ttype, Song_Type FROM musics_db GROUP BY Song_Lang, Song_Type";
$SongLang = array();
$quariy = $con->query($sql); 
$num = mysqli_num_rows($quariy);
if($num>=0){

    $SongLang= mysqli_fetch_all($quariy,MYSQLI_ASSOC);

}
else{

}
//  echo "<pre>";
// print_r($SongLang);
// echo "</pre>";

$sql="SELECT COUNT(Movie_Lang) as tcount, Movie_Lang FROM movies_db GROUP BY Movie_Lang";
//$sql="SELECT COUNT(Song_Lang) as tlang, Song_Lang ,COUNT(Song_Type) as ttype, Song_Type FROM musics_db GROUP BY Song_Lang, Song_Type";
$MovieLang = array();
$quariy = $con->query($sql); 
$num = mysqli_num_rows($quariy);
if($num>=0){

    $MovieLang= mysqli_fetch_all($quariy,MYSQLI_ASSOC);

}
else{

}
//  echo "<pre>";
// print_r($MovieLang);
// echo "</pre>";

   ?>
 


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="../Images/Favicon/favicon.ico"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <title>Dashboard</title>
  </head>
  <body>
   <?php include('header.php');?>

   <div class="container-fluid">
   <div class="row">
   <div class="col-lg-4 col-md-4 col-sm-12 border">
   <p class="text-center h3">Gender</p>

   <div id="piechart"></div>

   </div>
   <div class="col-lg-4 col-md-4 col-sm-12 border">
   <p class="text-center h3">User Status</p>

   <div id="piechart2"></div>
   </div>
   <div class="col-lg-4 col-md-4 col-sm-12 border">
   <p class="text-center h3">Song Languages</p>

   <div id="piechart3"></div>

   </div>
   </div>

   </div>
      <div class="container-fluid mt-3">
          <div class='row'>
              <div class='col-lg-3' col-md-6 col-sm-12>
                  <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
  <div class="card-header">Total Movies</div>
  <div class="card-body">
      <h5 class="card-title"><strong><?php echo $TotalMovies;?></strong> Movies</h5>
  </div>
</div>
      </div>
              <div class='col-lg-3' col-md-6 col-sm-12 border>
                  <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
  <div class="card-header">Total Musics</div>
  <div class="card-body">
      <h5 class="card-title"><strong><?php echo $TotalMusics;?></strong> Musics</h5>
  </div>
</div>
      </div>
               <div class='col-lg-3' col-md-6 col-sm-12 border>
                  <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
  <div class="card-header">Total Users</div>
  <div class="card-body">
      <h5 class="card-title"><strong><?php echo $TotalUsers;?></strong> Users</h5>
  </div>
</div>
      </div>
               <div class='col-lg-3' col-md-6 col-sm-12 border>
                  <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
  <div class="card-header">Total Team Members</div>
  <div class="card-body">
      <h5 class="card-title"><strong><?php echo $TotalTeams;?></strong> Team-Members</h5>
  </div>
</div>
      </div>
          </div>
      </div>
  
   
   <script>
   $("#DS").addClass("active");

   </script>
   
   <script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Song', 'Language'],
   <?php foreach($SongLang as $keys=>$vals){?>

    ['<?php echo $vals['Song_Lang']?>', <?php echo $vals['tcount']?>],
 
 <?php }?>
  
  
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Song Languages', 'width':400, 'height':400,
    is3D: true,
    //pieHole: 0.4,
  
  };

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart3'));
  chart.draw(data, options);
}
</script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
   <?php foreach($MovieLang as $key=>$val){?>

    ['<?php echo $val['Movie_Lang']?>', <?php echo $val['tcount']?>],
 
 <?php }?>
  
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Movie Language', 'width':550, 'height':400,
    is3D: true,
  
  };

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Movies', 'Language'],
  <?php foreach($status as $key=>$val){?>

    ['<?php echo $val['User_Status']?>', <?php echo $val['tcount']?>],
 
 <?php }?>
  
  
 
  
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'subscribe or non subscribe', 'width':400, 'height':400,
    
    //pieHole: 0.4,
    is3D: true,
  
  };

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
  chart.draw(data, options);
}
</script>

   
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  
  </body>
</html>