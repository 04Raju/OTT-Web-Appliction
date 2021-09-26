<?php

require '../Main Folder/Db.php';

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
if($check>0){
   $msgs="<br> Artist is already present";
  echo $msgs;
// }
}
else{

  $sql ="INSERT into artists_db (Artists_Name,Artists_Type,Artists_Status,Artists_Poster) 
  VALUES('$aname','$atype','$astatus','$file_name')";
     
if ($con->query($sql) === TRUE) {
  echo "Saved Sucessfully Bro";
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
    
    <!-- Button trigger modal -->
    <div class="mt-5 ml-4 mb-3">
<button type="button" class="btn btn-success " data-toggle="modal" data-target="#staticBackdrop">
  Add-Artists
</button>
</div>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Artists</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  <div class="container-fluid">
  <form action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Artist_Name</label>
    <input type="text" name="Aname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
    <div class="form-row mt-3">
    <div class="form-group col-md-3">
      <label for="inputState">Artist_Type</label>
      <select id="inputState" name="Atype" class="form-control">
        <option selected>singer</option>
        <option>Dancer</option> 
        <option>Musics</option>
        <option>Rapiest</option>
        <option>DJ</option>
   </select>
   </div>
    <div class="form-group col-md-3">
      <label for="inputState">Artists_Status</label>
      <select id="inputState" name="Astatus" class="form-control">
        <option selected>Active</option>
        <option>Inactive</option>
    
      </select>
    </div>
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
</div>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Understood</button> -->
      </div>
</div>
</div>
  </div>
</div>

<div class="container-fluid">
<table class="table table table-striped table-light">
  <thead class="thead-light">
    <tr class="bg-bark">
      <th scope="col">ID</th>
      <th scope="col">Songs</th>
      <th scope="col">Type</th>
      <th scope="col">Status</th>
      <th scoope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  <tr>
  <?php
            $quariy = $con->query("SELECT * FROM artists_db"); 
            $num = mysqli_num_rows($quariy);
            if($num>=0){
             while ( $row = mysqli_fetch_array($quariy) ) {
               ?>
      <th scope="row"><?php echo $row['artists_Id']?></th>
      <td scope="row"style=""><?php echo $row['Artists_Name']?></td>
      <td scope="row"style=""><?php echo $row['Artists_Type']?></td>
      <td scope="row"style=""><?php echo $row['Artists_Status']?></td>
      <td scope="row"style=""><a href="UpdateArti.php/?v=<?php echo $row['artists_Id']?>">Edit </a></td>
      <td scope="row"style=""><a href="AddMusic.php/?v=<?php echo $row['artists_Id']?>">Delete </a></td>
    </tr>
    <?php
}
     }
?>
  </tbody>
</table>



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