<?php
require '../../Main Folder/Db.php';




if(isset($_POST['DAlbum'])){

  
  $sr = mysqli_real_escape_string($con, $_POST['DelSrAlbum']);
  $sql ="DELETE FROM song_albumdb WHERE Sr_no =$sr";
  if ($con->query($sql) === TRUE) {
 
    //echo "Deleted Sucessfully Bro";
    header("Refresh:0");
      
  } else {
    echo "Error: ----->" . $sql . "<br>" . $con->error;
  }

}

if(isset($_POST['EAlbum'])){
  $sr = mysqli_real_escape_string($con, $_POST['SrAlbum']);
  $ename = mysqli_real_escape_string($con, $_POST['EditAlbum']);

  $eurl = mysqli_real_escape_string($con, $_POST['EditUrl']);

  $sql ="UPDATE song_albumdb SET AlbumName = '$ename',url ='$eurl' Where Sr_no =$sr";
  if ($con->query($sql) === TRUE) {
  
    //echo "Edited Sucessfully Bro";
        header("Refresh:0");
      
    } else {
      echo "Error: ----->" . $sql . "<br>" . $con->error;
    }
    



}
if(isset($_POST['AAlbum'])){

  $aname = mysqli_real_escape_string($con, $_POST['NameAlbum']);

  $aurl = mysqli_real_escape_string($con, $_POST['UrlAlbum']);

  $check=mysqli_num_rows(mysqli_query($con,"SELECT * from song_albumdb where AlbumName='$aname'"));
if($check>0){
   $msgs="<br> Song is already present";
  //echo $msgs;
// }
}
else{

 
    $sql ="INSERT into song_albumdb (AlbumName, url)  VALUES('$aname','$aurl')";
  
   if ($con->query($sql) === TRUE) {
  
//echo "Saved Sucessfully Bro";
    header("Refresh:0");
  
} else {
  echo "Error: ----->" . $sql . "<br>" . $con->error;
}
}//end of else

}


if(isset($_POST['ArtistAdd'])){
  $aname=$_POST['Aname'];
  $atype=$_POST['Atype'];
  $astatus=$_POST['Astatus'];
  $mposter=$_POST['Mposter'];


$check=mysqli_num_rows(mysqli_query($con,"SELECT * from artists_db where Artists_Name='$aname'"));
if($check>0){
 $msgs="<br> Artist is already present";
echo $msgs;
// }
}
else{

$sql ="INSERT into artists_db (Artists_Name,Artists_Type,Artists_Status,Artists_Poster) 
VALUES('$aname','$atype','$astatus','$mposter')";
   
if ($con->query($sql) === TRUE) {
echo "Saved Sucessfully Bro";
header("Refresh:0");
} else {
echo "Error: ----->" . $sql . "<br>" . $con->error;
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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Artists - panel</title>


<!-- Datatable -->

<link rel="icon" type="image/png" href="../../Images/Favicon/favicon.ico"/>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css'>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.min.css" integrity="sha512-NaCOGQe8bs7/BxJpnhZ4t4f4psMHnqsCxH/o4d3GFqBS4/0Yr/8+vZ08q675lx7pNz7lvJ6fRPfoCNHKx6d/fA==" crossorigin="anonymous" />
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src='https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js'></script>



 

 <style>

   /* li a .active {
    color:red;
  } */

div.dataTables_filter, div.dataTables_length {
 margin-top:5px;
/* padding-right:20px;*/
  padding-left:20px;

   text-transform: uppercase;

} 

div.dataTables_filter {
     margin-left: -10rem;
/*     margin-right: -1rem;*/
}
div.dataTables_wrapper div.dataTables_filter input {
/*    margin-left: .5em;*/
    display: inline-block;
    width: 40rem !important;

}


 </style>
  </head>
  <body class="bg-secondary ">


    


<div class="container-fluid mt-3">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddSongModal">
  Add Songs
</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddArtistsModal">
  Add Artists
</button>

</div>






<div class="container-fluid mt-2">


<table class="table table-striped table-bordered  table-hover bg-light text-dark" id='UserList'>
  <thead class="bg-primary text-light text-center">
    <tr>
      <th scope="col">SRN</th>
      <th scope="col">Song Name</th>
      <th scope="col">Song Album</th>
      <th scope="col">Song Type</th>
      <th scope="col">Song Language</th>
      <th scope="col">Song Artist</th>
      <th scope="col">Song Category</th>
      <th scope="col">Status</th>
      <th scope='col'>Edit</th>
      <th scope="col">Delete</th>
    
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php
    $sr=1;
    //SELECT * FROM musics_db, artists_db WHERE artists_db.artists_Id = musics_db.Song_Artist
    $sql="SELECT * FROM musics_db, song_albumdb, artists_db WHERE artists_db.artists_Id= musics_db.Song_Artist and musics_db.Song_Album = song_albumdb.Sr_no";
            $quariy = $con->query($sql); 
            $num = mysqli_num_rows($quariy);
            if($num>=0){
             while ( $row = mysqli_fetch_array($quariy) ) {
               ?>
      <th class="text-center "scope="row"><?php echo $sr?></th>
      <td class="text-center "scope="row"style=""><?php echo $row['Song_Name']?></td>
      <td class="text-center "scope="row"style=""><?php echo $row['AlbumName']?></td>
      <td class="text-center "scope="row"style=""><?php echo $row['Song_Type']?></td>
      <td class="text-center "scope="row"style=""><?php echo $row['Song_Lang']?></td>
      <td class="text-center "scope="row"style=""><?php echo $row['Artists_Name']?></td>
      <td class="text-center "scope="row"style=""><?php echo $row['Song_Catag']?></td>
      <td class="text-center "scope="row"style=""><?php echo $row['Song_Link']?></td>
<!--      <td class="text-center "scope="row"style=""><a type='button' class="nav_link"  data-toggle="modal" data-target="#EditSongModal" onclick="EditSong('<?php echo $row['songs_Id']?>','<?php echo $row['Song_Artist']?>','<?php echo $row['Song_Album']?>','<?php echo $row['Song_Name']?>','<?php echo $row['Song_Type']?>','<?php echo $row['Song_Lang']?>','<?php echo $row['Song_Catag']?>','<?php echo $row['Song_Link']?>','<?php echo $row['Status']?>','<?php echo $row['Song_Poster']?>','<?php echo $row['playlist']?>')">Edit </a></td>-->
      <td class="text-center"scope="row"><a class="" href="Control panel/EditSong.php/?i=<?php echo $row['songs_Id']?>">Edit</a></td>
      <td class="text-center "scope="row"style=""><a  class="text-danger"href="Control panel/DelUser.php/?v=<?php echo $row['songs_Id']?>">Delete </a></td>
    </tr>
    <?php
    $sr++;
}
     }
?>
  </tbody>
</table>


 

</div>



<div class="modals">

<!-- Modal -->
<div class="modal fade" id="AddSongModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <h5 class="modal-title" id="exampleModalLabel">Add Songs</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-secondary text-white">
      <div class="container-fluid">
  <form action="" method="POST" enctype="multipart/form-data">

  <div class="form-group">
    <label>Song_Name</label>
    <input type="text" name="Sname" class="form-control" placeholder=" Enter Song Name"aria-describedby="emailHelp">
    </div>

    <div class="form-group mt-2"> 
      <label for="">Song Album</label>
      <a class="ml-2 text-white" data-toggle="modal" data-target="#AddAlbum">  
                        (Add)
                    </a><a class="ml-2 text-white" data-toggle="modal" data-target="#EditAlbum">
                        (Edit)
                    </a><a class="ml-2 text-white" data-toggle="modal" data-target="#DeleteAlbum">
                        (Delete)
                    </a>
      <select  name="Salbum" style="width:100%" class="form-control text-dark">
<?php 
$sql = mysqli_query($con, "SELECT * FROM song_albumdb");
while ($row = $sql->fetch_assoc()){
  echo "<option value=" . $row['Sr_no'] . ">" . $row['AlbumName'] . "</option>";
}
?>
</select>
      
  </div>
    <div class="form-row mt-3">
    <div class="form-group col-md-3">
      <label>Song_Type</label><br>
      <select name="Stype" style="width:100%" class="form-control text-dark">
        <option selected>Select Type</option>
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
    <div class="form-group col-md-3">
      <label for="">Song_lanaguage</label>
      <select name="Slanguage" style="width:100%" class="form-control text-dark">
          <option selected>Select Lanaguage</option>
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

<?php 
$sql = mysqli_query($con, "SELECT * FROM artists_db ");
while ($row = $sql->fetch_assoc()){
echo "<option>" . $row['artists_Id'] . "</option>";
}
?>
</select>
      
  <div class="form-group col-md-3"> 
      <label for="">Song_Artist </label>
      <select  name="Sartists"  style="width:100%" class="form-control text-dark">
<?php 
$sql = mysqli_query($con, "SELECT * FROM artists_db ");
while ($row = $sql->fetch_assoc()){
  
  echo "<option value=" . $row['artists_Id'] . ">" . $row['Artists_Name'] . "</option>";

}
?>
</select>
      
  </div>
  <div class="form-group col-md-3">
      <label for="">Song_Catag</label><br>
      <select id="" name="Scatag" class="form-control">
          <option selected>Select Category</option>
        <option>Recommanded</option>
        <option>Top Hits</option>
        <option>New Relase</option>
        <option>Trending Now</option>
        <option>Featured</option>
        <option>Best</option> 
        </select>
    </div>
  

  <div>
  <label >Song_Link</label>
    <input type="text" name="Slink" class="form-control" placeholder="Enter Song Url" aria-describedby="emailHelp">
   <br>
  </div>


<lable>Song Poster </label>
  <input type="text" name="Mposter" id="fileToUpload" class="form-control mt-1" placeholder="Song Poster Url">
  <Br><br>

  <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
</form>
          </div>

</div> <!--Container End-->
</div>  <!--Modal Body-->

    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div> <!--Modal footer-->
    
</div>
</div>

</div> <!-- Model End-->


<!-- Modal -->
<div class="modal fade" id="EditSongModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <h5 class="modal-title" id="exampleModalLabel">Edit Songs</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-secondary text-white">
      <div class="container-fluid">
  <form action="" method="POST" enctype="multipart/form-data">

  <div class="form-group">
    <label>Song_Name</label>
    <input type="text" name="Ename" id="Ename" class="form-control" placeholder=" Enter Song Name">
    </div>
 
    
    <div class="form-group mt-2"> 
      <label for="">Song Album</label>
      <a class="ml-2 text-white" data-toggle="modal" data-target="#AddAlbum">  
                        (Add)
                    </a><a class="ml-2 text-white" data-toggle="modal" data-target="#EditAlbum">
                        (Edit)
                    </a><a class="ml-2 text-white" data-toggle="modal" data-target="#DeleteAlbum">
                        (Delete)
                    </a>


      <select  name="Ealbum"  id ="Ealbum" style="width:100%" class="form-control text-dark">
<?php 
$sql = mysqli_query($con, "SELECT * FROM song_albumdb");
while ($row = $sql->fetch_assoc()){
  echo "<option value=" . $row['Sr_no'] . ">" . $row['AlbumName'] . "</option>";

}
?>
</select>
      
  </div>
    <div class="form-row mt-3">
    <div class="form-group col-md-3">
      <label>Song_Type</label><br>
      <select name="Etype" id ="Etype" style="width:100%" class="form-control text-dark">
        <option selected>Select Type</option>
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
    <div class="form-group col-md-3">
      <label for="">Song_lanaguage</label>
      <select name="Elanguage" Id="Elangauge"style="width:100%" class="form-control text-dark">
          <option selected>Select Language</option>
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
    <!-- <div class="form-group col-md-2">
      <label for="">Song_Artist _Id</label>
      <select id="" name="Sartists"class="form-control" style="width:100%" class="form-control text-dark">
<?php 
$sql = mysqli_query($con, "SELECT * FROM artists_db ");
while ($row = $sql->fetch_assoc()){
echo "<option>" . $row['artists_Id'] . "</option>";
}
?>
</select>
      
  </div> -->
  <div class="form-group col-md-3"> 
      <label for="">Song_Artist </label>
      <select  name="Eartists" id="Eartists" style="width:100%" class="form-control text-dark">
<?php 
$sql = mysqli_query($con, "SELECT * FROM artists_db ");
while ($row = $sql->fetch_assoc()){
  
  echo "<option value=" . $row['artists_Id'] . ">" . $row['Artists_Name'] . "</option>";

}
?>
</select>
      
  </div>
  <div class="form-group col-md-3">
      <label for="">Song_Catag</label><br>
      <select id="Ecatag" name="Ecatag" class="form-control">
          <option selected>Select Category</option>
        <option>Recommended</option>
        <option>Top Hits</option>
        <option>New Release</option>
        <option>Trending Now</option>
        <option>Featured</option>
        <option>Best</option> 
        </select>
    </div>
  </div>

  <div>
  <label >Song_Link</label>
    <input type="text" name="Elink" id="Elink"class="form-control" placeholder="Enter Song Url" aria-describedby="emailHelp">
   <br>
  </div>

<!-- <form>
  <div class="form-group">
    <label for="formControlRange">Movie Ratting</label>
    <input name="ratting" type="range" class="form-control-range" id="formControlRange">
  </div>
</form> -->
<lable>Song Poster </label>
  <input type="text" name="Eposter" id="Eposter" class="form-control mt-1" placeholder="Song Poster Url">
  <Br><br>

  <button type="submit" name="Esumbit" class="btn btn-primary btn-lg btn-block">Submit</button>
</form>

</div> <!--Container End-->
</div>  <!--Modal Body-->

    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div> <!--Modal footer-->
    
</div>
</div>

</div> <!-- Model End-->




<!--  ADD Album Modal -->
<div class="modal fade" id="AddAlbum" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class=" modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Album</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <div class="container-fluid">
        <form action="" method="post">
        <div class="form-group">
        <label class="font-weight-bold"> Enter Album Name </label>
    <input type="text" name="NameAlbum" class="form-control" placeholder=" Enter Album Here " required>

    <label class="font-weight-bold"> Enter Poster Url </label>
    <input type="text" name="UrlAlbum" class="form-control" placeholder=" Enter url Here " required>
    </div>
    
        <button type="submit" name="AAlbum" class="btn btn-primary btn-bg">Add Album</button>
          </form>

        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
</div>

<!-- Edit Album Modal -->
<div class="modal fade" id="EditAlbum" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Album</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  <div class="container-fluid">
       <form action="" method="POST">
    <div class="form-group mt-2"> 
      <label for="font-weight-bold">Select Song Album </label>
   
      <select  name="SrAlbum" style="width:100%" class="form-control text-dark" onchange="document.getElementById('Album_Edit').value = this.options[this.selectedIndex].text">
<?php 
$sql = mysqli_query($con, "SELECT * FROM song_albumdb");
while ($row = $sql->fetch_assoc()){
  echo "<option value=" . $row['Sr_no'] . ">" . $row['AlbumName'] . "</option>";

}
?>
</select>

<label class="font-weight-bold">Rename Album </label>
<input type="text" id="Album_Edit" name="EditAlbum" class="form-control" placeholder=" Rename Album  " required>

<label class="font-weight-bold">Poster url</label>
<input type="text" id="Album_Edit" name="EditUrl" class="form-control" placeholder=" Update url  " required>

      </div>
      <button type="submit" name="EAlbum" class="btn btn-primary btn-bg">Edit Album</button>
      </form>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>





<!-- Delte AlbumModal -->
<div class="modal fade" id="DeleteAlbum" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Album</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container-fluid">
      <form action="" method="POST">
      <div class="form-group mt-2"> 
      <label for="font-weight-bold">Select Song Album </label>
   
      <select  name="DelSrAlbum" style="width:100%" class="form-control text-dark" onchange="document.getElementById('Album_Edit').value = this.options[this.selectedIndex].text">
<?php 
$sql = mysqli_query($con, "SELECT * FROM song_albumdb");
while ($row = $sql->fetch_assoc()){
  echo "<option value=" . $row['Sr_no'] . ">" . $row['AlbumName'] . "</option>";

}
?>
</select>

</div>


<button type="submit" name="DAlbum" class="btn btn-primary btn-bg">Delete Album</button>
      </form>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<!--- Add Artists --->


<div class="modal fade" id="AddArtistsModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <h5 class="modal-title" id="exampleModalLabel">Add Artists</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-secondary text-white">
      <div class="container-fluid">
      <form action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Artist_Name</label>
    <input type="text" name="Aname" class="form-control" placeholder="Artist Name">
    </div>
    

    <div class="form-row mt-3">
    <div class="form-group col-md-6">
      <label for="">Artist_Type</label>
      <select id="" name="Atype" class="form-control" style="width:100%";>
        <option selected>singer</option>
        <option>Dancer</option> 
        <option>Musics</option>
        <option>Rapiest</option>
        <option>DJ</option>
   </select>
   </div>
   
    <div class="form-group col-md-6">
      <label for="">Artists_Status</label>
      <select id="" name="Astatus" class="form-control" style="width:100%";>
        <option selected>Active</option>
        <option>Inactive</option>
        <option>Block</option>




    
      </select>
    </div>

    </div>
  


<label>Profile Photo Url</label>
  <input type="text" name="Mposter" class="form-control" placeholder="Url of Profile"id="fileToUpload">
  <br>

  <button type="submit" name="ArtistAdd" class="btn btn-primary btn-lg btn-block">Submit</button>
</form>

</div>

     

      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
   </div>
  </div>
</div>
</div>





<!-- Modal -->
<div class="modal fade" id="EditSongModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <h5 class="modal-title" id="exampleModalLabel">Edit Songs</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-secondary text-white">
      <div class="container-fluid">
  <form action="" method="POST" enctype="multipart/form-data">

  <div class="form-group">
    <label>Song_Name</label>
    <input type="text" name="Ename" Id="Ename" class="form-control" placeholder=" Enter Song Name"aria-describedby="emailHelp">
    </div>

    
    <div class="form-group mt-2"> 
      <label for="">Song Album</label>
      <a class="ml-2 text-white" data-toggle="modal" data-target="#AddAlbum">  
                        (Add)
                    </a><a class="ml-2 text-white" data-toggle="modal" data-target="#EditAlbum">
                        (Edit)
                    </a><a class="ml-2 text-white" data-toggle="modal" data-target="#DeleteAlbum">
                        (Delete)
                    </a>


      <select  name="Ealbums" id="Ealbums" style="width:100%" class="form-control text-dark">
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
        <option selected>Select Type</option>
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
          <option selected>Select Lanaguage</option>
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
<?php 
$sql = mysqli_query($con, "SELECT * FROM artists_db ");
while ($row = $sql->fetch_assoc()){
echo "<option>" . $row['artists_Id'] . "</option>";
}
?>
</select>
      
 
  <div class="form-group col-md-2"> 
      <label for="">Song_Artist </label>
      <select  name="Eartist" id="Eartist"  style="width:100%" class="form-control text-dark">
<?php 
$sql = mysqli_query($con, "SELECT * FROM artists_db ");
while ($row = $sql->fetch_assoc()){
  
  echo "<option value=" . $row['artists_Id'] . ">" . $row['Artists_Name'] . "</option>";

}
?>
</select>
      
  </div>
  <div class="form-group col-md-2">
      <label for="">Song_Categ</label><br>
      <select id="Ecateg" name="Ecateg" class="form-control">
          <option selected>Select Category</option>
        <option>Recommanded</option>
        <option>Top Hits</option>
        <option>New Relase</option>
        <option>Trending Now</option>
        <option>Featured</option>
        <option>Best</option> 
        </select>
    </div>
  
      </div>
  <div>
  <label >Song_Link</label>
    <input type="text" name="Elink" id="Elink" class="form-control" placeholder="Enter Song Url">
   <br>
  </div>

<label>Song Poster </label>
  <input type="text" name="Eposter" id="Eposter" class="form-control mt-1" placeholder="Song Poster Url">
  <Br><br>
  
<!--   <div class="form-group col-md-3">
      <label for="">Song_Status</label><br>
      <select id="Estatus" name="Estatus" class="form-control">
          <option selected>Active</option>
        <option>Inactive</option>
        <option>Suspended</option>
        </select>
    </div>
  <h1>Hi</h1>-->
<input type="text" id="srno" name="srno" >

  <button type="submit" name="SongUpdate" class="btn btn-primary btn-lg btn-block">Submit</button>
</form>
          

</div> <!--Container End-->
</div>  <!--Modal Body-->

    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div> <!--Modal footer-->
    
</div>
</div>

</div> <!-- Model End-->



</div>






<script>
//function EditSong(sid,said,sa,sn,st,sl,sc,slink,status,sp,playlist){
//    $('#srno').val(sid);
//    
//}
$(document).ready(function() {

  $("#SP").addClass("active");
 
  $('select').select2();
   // $('#UserList').DataTable();

    $('#UserList').DataTable({
//        "pagingType":"full_numbers",
        "bFilter": true,
        "bInfo": true,
        "lengthMenu":[
            [10,25,50,-1],
            [10,25,50,"All"]
        ],
        responsive:true,
        language:{
          //"search": "_INPUT_",
           searchPlaceholder:"Search User",
    
        }
    });
    
} );
</script>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    
  </body>
</html>