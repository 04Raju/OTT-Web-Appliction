<?php

require '../Main Folder/Db.php';

$id = intval($_GET['v']);
$file_name="";
if(isset($_FILES['Mposter'])){
    // echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";

     $file_name = $_FILES['Mposter']['name'];
     $file_size = $_FILES['Mposter']['size'];
     $file_tmp = $_FILES['Mposter']['tmp_name'];
     $file_type = $_FILES['Mposter']['type'];


   if(move_uploaded_file($file_tmp,"../Images/artists/".$file_name)){
        echo "file uploaded successfully";
        
   }else{
       echo "file can't be upload";
   }

}
if(isset($_POST['submit'])){
    $aname=$_POST['Aname'];
    $atype=$_POST['Atype'];
    $astatus=$_POST['Astatus'];
   
   
    //$mposter=$_POST['Mposter'];


$check=mysqli_num_rows(mysqli_query($con,"SELECT * from artists_db where Artists_Name='$aname'"));
if($check>!0){
   $msgs="<br> Artist is already present";
  echo $msgs;
// }
}
else{

  $sql ="UPDATE artists_db SET Artists_Name = '$aname',Artists_Type ='$atype',Artists_Status='$astatus',Artists_Poster='$file_name'
  Where artists_Id=$id";
  
     
if ($con->query($sql) === TRUE) {
  echo "Saved Sucessfully Bro";
  header("Location: http://localhost/ott-Application/Admins/AddArtitis.php");
} else {
  echo "Error: ----->" . $sql . "<br>" . $con->error;
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

    <title>Admin= Add Artists </title>
  </head>
  <body>
    
            <?php

            $quariy = $con->query("SELECT * FROM artists_db where artists_Id='$id'"); 
            $num = mysqli_num_rows($quariy);
            if($num>=0){
             while ( $row = mysqli_fetch_array($quariy) ) {
               ?>
     <div class="container mt-5">
     <h2 class="h2">Updating Data of Id : <?php echo$row['artists_Id']?> </h2>
     <br>
  <form action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Artist_Name</label>
    <input type="text" name="Aname" class="form-control" id="exampleInputEmail1" value="<?php echo $row['Artists_Name']?>"aria-describedby="emailHelp">
    
    <div class="form-row mt-3">
    <div class="form-group col-md-3">
      <label for="inputState">Artist_Type</label>
      <select id="inputState" name="Atype" class="form-control">
      <option selected><?php echo $row['Artists_Type']?></option>
        <option>Singer</option>
        <option>Dancer</option> 
        <option>Musics</option>
        <option>Rapper</option>
        <option>DJ</option>
   </select>
   </div>
    <div class="form-group col-md-3">
      <label for="inputState">Artists_Status</label>
      <select id="inputState" name="Astatus" class="form-control" value="<?php echo $row['Artist_Status']?>">
        <option selected><?php echo $row['Artists_Status']?></option>
        <option>Inactive</option>
        <option>Active</option>
    
      </select>
    </div>
  </div>
  
<!-- <form>
  <div class="form-group">
    <label for="formControlRange">Movie Ratting</label>
    <input name="ratting" type="range" class="form-control-range" id="formControlRange">
  </div>
</form> -->

  <input type="file" name="Mposter" id="fileToUpload" value="<?php echo $row['Artist_Poster']?>">
  <Br><br>

  <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
</form>
</div>

    <?php
}
     }
?>




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