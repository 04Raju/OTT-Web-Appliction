
<?php


include('Db.php');


    // ini_set('session.save_path', '../Admins/Sessions');

    // session_start();



if(!isset($_SESSION['uid'])){
  
  //header('location:http://192.168.0.104/OTT-Application/ls/login.php');
  //die();
};

$uid= $_SESSION['uid'];
$mail = $_SESSION['mail'];


?>





<nav class="navbar navbar-expand-lg navbar-dark bg-primary  sticky-top">
  <a class="navbar-brand" href="index.php">SOFTX-OTT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-5 mr-auto">
      <li class="nav-item">
        <a class="nav-link mr-4" href="main.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown bg-primary" >
              <a class="nav-link dropdown-toggle mr-4" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              lanaguage
              </a>
              <div class="dropdown-menu bg-primary" aria-labelledby="navbarDropdown">
                <a class="dropdown-item"style="color:Black;" href="#Top_movies">Hindi</a>
                <a class="dropdown-item"style="color:Black;" href="#Blog">Marathi</a>
            
              </div>
            </li>
            <li class="nav-item dropdown bg-primary" >
              <a class="nav-link dropdown-toggle mr-4" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Categories
              </a>
              <div class="dropdown-menu bg-primary" aria-labelledby="navbarDropdown">
                <a class="dropdown-item"style="color:Black;" href="#Top_movies">Top Movies</a>
                <a class="dropdown-item"style="color:Black;" href="#Blog">Tips & Tricks</a>
            
              </div>
            </li>

            <li class="nav-item">
                <a class="nav-link mr-4" href="Music/Music.php">Music</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mr-4" href="#news">News</a>
              </li>   
              <!-- <li class="nav-item ml-5" style="margin-left:400px">
                <a class="nav-link" href="Music/Music.php">Account</a>
              </li> -->
              <li class="nav-item dropdown bg-primary active" >
              <a class="nav-link dropdown-toggle mr-4" href="#" id="AC" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Accounts
              </a>
              <div class="dropdown-menu bg-primary" aria-labelledby="navbarDropdown">
                <a class="dropdown-item  "style="color:Black; hover:red;" href="logout.php">Log-Out</a>
                <a class="dropdown-item"style="color:Black;" href="Account.php">Settings</a>
            
              </div>
            </li>

            <li class="nav-item" id="CP">
        <a class="nav-link ml-5" href="Music.php"> Login As :- <?php echo $mail?></a>
      </li>

              <!-- <form class="form-inline my-2 my-lg-0 ">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="radius:50px; width:420px;margin-left:120px">
      <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </form>
     -->

           
</nav>
