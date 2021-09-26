<?php
require '../../Main Folder/Db.php';
//if(!isset($_GET['i'])){
//    header("https://bvmentertainment.ml/Admins/SongPanel.php");
//   die();
//}

 $delid= $_GET['d'];
 
 if(isset($_GET['d'])){
  $delid= $_GET['d'];   
  echo $delid;
  
 $sql = "DELETE FROM musics_db WHERE songs_Id = '$delid'";
echo $sql;
if ($con->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header("Location: https://bvmentertainment.ml/Admins/SongPanel.php");
} else {
  echo "Error deleting record: " . $con->error;
}
  
  Die();
 }
  $sr= $_GET['i'];
if(isset($_POST['SongUpdate'])){
    
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    
    
    $Ename= mysqli_real_escape_string($con, $_POST['Ename']);
    $Ealbum=mysqli_real_escape_string($con, $_POST['Ealbums']);
    $Etype=mysqli_real_escape_string($con, $_POST['Etypes']);
    $Elanuage=mysqli_real_escape_string($con, $_POST['Elanguage']);
    $Eartists=mysqli_real_escape_string($con, $_POST['Eartist']);
    $Ecatag=mysqli_real_escape_string($con, $_POST['Ecateg']);
    $Estatus=mysqli_real_escape_string($con, $_POST['Estatus']);
    $Elink=mysqli_real_escape_string($con, $_POST['Elink']);
    $Eposter=mysqli_real_escape_string($con, $_POST['Eposter']);
    $Eplay= mysqli_real_escape_string($con, $_POST['Eplay']);
    
    echo "Hello";
    echo $_POST['Ealbum'];
    
    
    $sql="UPDATE musics_db SET `Song_Artist`='$Eartists',`Song_Album`='$Ealbum',`Song_Name`='$Ename',`Song_Type`= '$Etype',`Song_Lang`='$Elanuage',`Song_Catag`='$Ecatag',`Song_Link`='$Elink',`Status`='$Estatus',`Song_Poster`='$Eposter',`playlist`='$Eplay' WHERE songs_Id = {$sr}";
    
//echo $sql;
         if ($con->query($sql) === TRUE) {
             echo "Updated Successfully";
        header("Location: https://bvmentertainment.ml/Admins/SongPanel.php");
        
    } else {
      echo "Error: ----->" . $sql . "<br>" . $con->error;
    }
    
    
    
}


if(isset($_GET['i'])){
    $sr= $_GET['i'];
    
    
    $songName; $songType; $songlang; $songcateg; $songlink; $songposter; $songStatus;
    $albumName; $albumid; $artistid; $artistName;
//$query = "SELECT * FROM musics_db,artists_db,song_albumdb WHERE artists_db.artists_Id =musics_db.Song_Artist AND song_albumdb.Sr_no= musics_db.Song_Album AND musics_db.songs_Id = {$sr}";
    
   $query="SELECT *, musics_db.Status as Mstatus FROM musics_db, song_albumdb, artists_db WHERE artists_db.artists_Id= musics_db.Song_Artist  and musics_db.Song_Album = song_albumdb.Sr_no AND  musics_db.songs_Id = {$sr}";
	$result = $con->query($query);
        
        
    if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) 
                {
//                        echo "<pre>";
//                        print_r($row);
//                        echo "</pre>";
                        $songName= $row['Song_Name'];
                        $albumName= $row['AlbumName'];
                        $albumid=$row['Song_Album'];
                        $songType= $row['Song_Type'];
                        $songlang= $row['Song_Lang'];
                        $songcateg= $row['Song_Catag'];
                        $artistName=$row['Artists_Name'];
                        $artistid= $row['Song_Artist'];
                        $songStatus=$row['Mstatus'];
                        $songlink= $row['Song_Link'];
                        $songposter= $row['Song_Poster'];
                       
                        
                 
                  ?>

          <?php
 }
}
}
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" type="image/png" href="../../Images/Favicon/favicon.ico"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <title>Edit Songs</title>
  </head>
  <body>
      <div class="container mt-5">
          <div class="card">
              <div class="card-header">
                  <h1> Editing Song - > <?php echo $songName;?></h1>
              </div>
              <div class="card-body">
                  <div class="container-fluid">
                      <form action="" method="POST">

  <div class="form-group">
    <label>Song_Name</label>
    <input type="text" name="Ename" Id="Ename" class="form-control" placeholder=" Enter Song Name" value="<?php echo $songName;?>">
    </div>
                   <div class="form-group mt-2"> 
      <label for="">Song Album</label>
      <select  name="Ealbums" id="Ealbums" style="width:100%" class="form-control text-dark">
           <option selected value="<?php echo $albumid;?>"><?php echo $albumName;?></option>";
<?php 
$sql = mysqli_query($con, "SELECT * FROM song_albumdb");
while ($row = $sql->fetch_assoc()){
echo "<option value=" . $row['Sr_no'] . ">" . $row['AlbumName'] . "</option>";
}
?>
</select> 
  </div>
   <div class="row mt-1">
    <div class="form-group col-md-2">
      <label>Song_Type</label><br>
      <select name="Etypes" id="Etypes"style="width:100%" class="form-control text-dark">
        <option selected><?php echo $songType;?></option>
        <option>Classical</option>
        <option>Party</option>
        <option>Folk</option>
        <option>Rap</option>
        <option>Pop</option>
        <option>Devotional</option>
        <option>Regional</option>
        <option>Healing</option>
        <option>Dance</option>
        <option>Instrumental</option>
        <option>Drama</option>
        <option>Bhajan</option>
   </select>
   </div>
    <div class="form-group col-md-2">
      <label for="">Song_lanaguage</label>
      <select name="Elanguage" id="Elanguage" style="width:100%" class="form-control text-dark">
          <option selected><?php echo $songlang; ?></option>
        <option >Hindi</option>
        <option>Marathi</option>
        <option>English</option>
        <option>Kannada</option>
        <option>Telegu</option>
        <option>Malayalam</option>
        <option>Tamil</option>
        <option>Gujarati</option>
        <option>Panjabi</option>

      </select>
    </div>

  <div class="form-group col-md-2"> 
      <label for="">Song_Artist </label>
      <select  name="Eartist" id="Eartist"  style="width:100%" class="form-control text-dark">
           <option selected value="<?php echo $artistid;?>"><?php echo $artistName;?></option>";
<?php 
$sql = mysqli_query($con, "SELECT * FROM artists_db ORDER BY Artists_Name ASC");
while ($row = $sql->fetch_assoc()){
  echo "<option value=" . $row['artists_Id'] . ">" . $row['Artists_Name'] . "</option>";
}
?>
</select>
      
  </div>
  <div class="form-group col-md-2">
      <label for="">Song_Categ</label><br>
      <select id="Ecateg" name="Ecateg" class="form-control">
          <option selected><?php echo $songcateg;?> </option>
        <option>Recommanded</option>
        <option>Top Hits</option>
        <option>New Relase</option>
        <option>Trending Now</option>
        <option>Featured</option>
        <option>Best</option> 
        </select>
    </div>
         <div class="form-group col-md-2">
      <label for="">Song_Status</label><br>
      <select id="Estatus" name="Estatus" class="form-control">
          <option selected><?php echo $songStatus; ?></option>
          <option>Active</option>
        <option>Inactive</option>
        <option>Suspended</option>
        </select>
    </div>
         <div class="form-group col-md-2">
             <label for="">playlist<strong>(not for all)</strong></label><br>
      <select id="Eplay" name="Eplay" class="form-control">
      <option selected value="0">Admin will select</option>";
<?php 
$sql = mysqli_query($con, "SELECT * FROM playlists");
while ($row = $sql->fetch_assoc()){
  echo "<option value=" . $row['Sr_no'] . ">" . $row['Name'] . "</option>";
}
?>
          
        </select>
    </div>
       
  
      </div>
      <label >Song_Link</label>
    <input type="text" name="Elink" id="Elink" class="form-control" value="<?php echo $songlink;?>">
   <br>
 

<label>Song Poster </label>
  <input type="text" name="Eposter" id="Eposter" class="form-control mt-1" value="<?php echo $songposter;?>">
  <br>
  <a href="https://bvmentertainment.ml/Admins/SongPanel.php" class="btn btn-primary ">Back</a>                     
 <button type="submit" name="SongUpdate" class="btn btn-success ">Submit</button>  
                      </form>
                          
                  </div>
              </div>
          </div>
      </div>


       <script>
         
          </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


  </body>
</html>


        
