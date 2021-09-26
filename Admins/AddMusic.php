<?php

require '../Main Folder/Db.php';

$msgs="";
$file_name="";
if(isset($_FILES['Mposter'])){
    // echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";

     $file_name = $_FILES['Mposter']['name'];
     $file_size = $_FILES['Mposter']['size'];
     $file_tmp = $_FILES['Mposter']['tmp_name'];
     $file_type = $_FILES['Mposter']['type'];


   if(move_uploaded_file($file_tmp,"../Images/Songs/".$file_name)){
        echo "file uploaded successfully";
   }else{
       echo "file can't be upload";
   }

}
if(isset($_POST['submit'])){
    $sname=$_POST['Sname'];
    $salbum=$_POST['Salbum'];
    $stype=$_POST['Stype'];
    $slanuage=$_POST['Slanguage'];
    $sartists=$_POST['Sartists'];
    $scatag=$_POST['Scatag'];
    $slink=$_POST['Slink'];
   
    //$mposter=$_POST['Mposter'];


$check=mysqli_num_rows(mysqli_query($con,"SELECT * from musics_db where Song_Name='$sname'"));
if($check>0){
   $msgs="<br> Song is already present";
  //echo $msgs;
// }
}
else{

  $sql ="INSERT into musics_db (Song_Artist,Song_Album,Song_Name,Song_Type,Song_Lang,Song_Catag,Song_Link,Song_Poster) 
  VALUES('$sartists','$salbum','$sname','$stype','$slanuage','$scatag','$slink','$file_name')";
     
if ($con->query($sql) === TRUE) {
  $msgs="Saved Sucessfully Bro";
  //echo "Saved Sucessfully Bro";
  
} else {
  $msgs =  "Error: ----->" . $sql . "<br>" . $con->error;
  //echo "Error: ----->" . $sql . "<br>" . $con->error;
}

$con->close();
}

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

    <title>Admin= Add Music </title>
  </head>
  <body>

  <div class="alert alert-success" role="alert">
  <?php echo $msgs?>
</div>
    
    <div class="container-fluid">
  <form action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Song_Name</label>
    <input type="text" name="Sname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
    <label for="exampleInputEmail1">Song_Album</label>
    <input type="text" name="Salbum" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   
    <div class="form-row mt-3">
    <div class="form-group col-md-3">
      <label for="inputState">Song_Type</label>
      <select id="inputState" name="Stype" class="form-control">
        <option selected>Classical</option>
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
      <label for="inputState">Song_lanaguage</label>
      <select id="inputState" name="Slanguage" class="form-control">
        <option selected>Hindi</option>
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
      <label for="inputState">Song_Artist _Id</label>
      <select id="inputState" name="Sartists"class="form-control" requied>
<?php 
$sql = mysqli_query($con, "SELECT * FROM artists_db ");
while ($row = $sql->fetch_assoc()){
echo "<option>" . $row['artists_Id'] . "</option>";
}
?>
</select>
      
  </div>
  <div class="form-group col-md-2">
      <label for="inputState">Song_Artist</label>
      <select id="inputState" name=""class="form-control">
<?php 
$sql = mysqli_query($con, "SELECT * FROM artists_db ");
while ($row = $sql->fetch_assoc()){
echo "<option>".$row['artists_Id']. " " . $row['Artists_Name'] . "</option>";
}
?>
</select>
      
  </div>
  <div class="form-group col-md-2">
      <label for="inputState">Song_Catag</label>
      <select id="inputState" name="Scatag" class="form-control">
        <option selected>Recommanded</option>
        <option>Top Hits</option>
        <option>New Relase</option>
        <option>Trending Now</option>
        <option>Featured</option>
        <option>Best</option> 
        </select>
    </div>
  </div>

  <div>
  <label for="exampleInputEmail1">Song_Link</label>
    <input type="text" name="Slink" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   <br>
  </div>

<!-- <form>
  <div class="form-group">
    <label for="formControlRange">Movie Ratting</label>
    <input name="ratting" type="range" class="form-control-range" id="formControlRange">
  </div>
</form> -->

  <input type="file" name="Mposter" id="fileToUpload">
  <Br><br>

  <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
</form>

</div>



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