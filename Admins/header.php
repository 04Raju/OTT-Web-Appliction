
<?php

ini_set('session.save_path', 'Sessions');

session_start();


if(!isset($_SESSION['mailId'])){
  
  header($AdminLogout);
  die();
};

$mail= $_SESSION['mail'];
$fullname= $_SESSION['fullname'];
//echo  $mail;
?>


<nav class="navbar navbar-expand-lg navbar-light bg-primary text-white p-0">
  <a class="navbar-brand text-white" href="">BVM-Entertainment</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item " id="DS">
        <a class="nav-link ml-3 "  href="Dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item" id="TM">
        <a class="nav-link ml-3" href="Teams.php">Teams</a>
      </li>
      <li class="nav-item" id="UP">
        <a class="nav-link ml-3 " href="UsersPanel.php">Users</a>
      </li>
      <li class="nav-item" id="MP">
        <a class="nav-link ml-3" href="Moviespanel.php">Movies</a>
      </li>
      <li class="nav-item" id="SP">
        <a class="nav-link ml-3 " href="SongPanel.php">Musics</a>
      </li>
      <li class="nav-item" id="BP">
        <a class="nav-link ml-3 " href="BookPanel.php">Books</a>
      </li>
     
      <li class="nav-item" id="MP">
        <a class="nav-link ml-3" href="UsersPanel.php">Membership</a>
      </li>
      <li class="nav-item" id="CP">
        <a class="nav-link ml-3" href="BlogPanel.php">Control-Panel</a>
      </li>

      <li class="nav-item dropdown " >
        <a class="nav-link  ml-5 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Accounts
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item"style="color:Black;" href="logout.php">Log-Out</a>
        
            
              </div>
            </li>
            <li class="nav-item" id="CP">
        <a class="nav-link ml-5 text-white"><?php echo $fullname;?></a>
      </li>

     
    </ul>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>

<script>

function updateUserStatus(){
  $.ajax({
    url:'imp Folder/set_statusTeam.php',
    success:function(){

    }
  });

}
setInterval(function(){
updateUserStatus();
},2000);
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
  
