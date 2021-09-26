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


   if(move_uploaded_file($file_tmp,"../Images/Posters/".$file_name)){
        echo "file uploaded successfully";
   }else{
       echo "file can't be upload";
   }

}
if(isset($_POST['submit'])){
    $mname=$_POST['Mname'];
    $mdesc=$_POST['Mdesc'];
    $mtype=$_POST['Mtype'];
    $mlanuage=$_POST['Mlanguage'];
    $mrating=$_POST['Mrating'];
    $mpromo=$_POST['Mpromo'];
    $mtl=$_POST['Mtl'];
    $mml=$_POST['Mml'];
    //$mposter=$_POST['Mposter'];
    
// echo "<br>";
// echo $mname;
// echo "<br>";
// echo $mdesc;
// echo "<br>";
// echo $mtype;
// echo "<br>";
// echo $mlanuage;
// echo "<br>";
// echo $mrating;
// echo "<br>";
// echo $mpromo;
// echo "<br>";
// echo $mtl;
// echo "<br>";
// echo $mml;
// echo "<br>";
// //echo $mposter;
// echo $file_name;

$check=mysqli_num_rows(mysqli_query($con,"SELECT * from movies_db where Movie_TL='$mtl'"));
if($check>0){
   $msgs="<br> Movie is already present";
  echo $msgs;
// }
}
else{

  $sql ="INSERT into movies_db (Movie_Catag,Movie_Desc,Movie_Lang,Movie_ML,Movie_Name,Movie_Poster,Movie_TL,Movie_Type) 
  VALUES('$mpromo','$mdesc','$mlanuage','$mml','$mname','$file_name','$mtl','$mtype')";
     
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

    <title>Admin_panel</title>
  </head>
  <body>
    
    <div class="container-fluid">
  <form action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Movie_Name</label>
    <input type="text" name="Mname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
    <div class="form-group">
    <label for="exampleFormControlTextarea1">Movie_Desc</label>
    <textarea class="form-control"name="Mdesc" id="exampleFormControlTextarea1" rows="5"></textarea>

    <div class="form-row mt-3">
    <div class="form-group col-md-3">
      <label for="inputState">Movie_Type</label>
      <select id="inputState" name="Mtype" class="form-control">
        <option selected>Action</option>
        <option>Adventure</option>
        <option>Adult</option>
        <option>Animation</option>
        <option>Biography</option>
        <option>Comdey</option>
        <option>Crime</option>
        <option>Documentary</option>
        <option>Drama</option>
        <option>Family</option>
        <option>Fantasv</option>
        <option>Histroy</option>
        <option>Horror</option>
        <option>Musical</option>
        <option>Mystery</option>
        <option>Romance</option>
        <option>Sci-FI</option>
        <option>Sport</option>
        <option>Thriller</option>
        <option>War</option>

   </select>
   </div>
    <div class="form-group col-md-3">
      <label for="inputState">Movie_language</label>
      <select id="inputState" name="Mlanguage" class="form-control">
        <option selected>Hindi</option>
        <option>Marathi</option>
        <option>English</option>
        <option>Kannada</option>
        <option>Telegu</option>
        <option>Malayalam</option>
      </select>
    </div>
    <div class="form-group col-md-3">
      <label for="inputState">Movie_Rating</label>
      <select id="inputState" name="Mrating"class="form-control">
        <option selected>9</option>
        <option>1</option>
        <option>2/10</option>
        <option>3/10</option>
        <option>4/10</option>
        <option>5/10</option>
        <option>6/10</option>
        <option>7/10</option>
        <option>8/10</option>
        <option>9/10</option>
        <option>10/10</option>
      </select>
  </div>
  <div class="form-group col-md-3">
      <label for="inputState">Movie_Promo</label>
      <select id="inputState" name="Mpromo" class="form-control">
        <option selected>Recommanded</option>
        <option>Top Hits</option>
        <option>Recent Relase</option>
        <option>Trending Now</option>
        <option>Featured</option>
        <option>Best</option>
        </select>
    </div>
  </div>

  <div class="form-row mt-4">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Triller_Embed_Link</label>
      <input type="text" name="Mtl"class="form-control" id="inputEmail4">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Movie_LINK</label>
      <input type="text" name="Mml" class="form-control" id="inputPassword4">
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