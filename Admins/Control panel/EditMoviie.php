<?php
require '../../Main Folder/Db.php';
 $sr= $_GET['m'];
 
 $delid= $_GET['d'];
 if(isset($_GET['d'])){
  $delid= $_GET['d'];   
  echo $delid;
  
 $sql = "DELETE FROM movies_db WHERE movies_Id = '$delid'";

if ($con->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header("Location: https://bvmentertainment.ml/Admins/Moviespanel.php");
} else {
  echo "Error deleting record: " . $con->error;
}
  
  Die();
 }
 
 
 
if(isset($_POST['EditMovies'])){
//    echo "<pre>";
//    print_r($_POST);
//    echo "</pre";
   
     $Ename  = mysqli_real_escape_string($con, $_POST['Ename']);
      $Edesc = mysqli_real_escape_string($con, $_POST['Edesc']);
      $Etype = mysqli_real_escape_string($con, $_POST['Etype']);
      $Elanguage = mysqli_real_escape_string($con, $_POST['Elanguage']);
       $Estatus  = mysqli_real_escape_string($con, $_POST['Estatus']);
       $Epromo  = mysqli_real_escape_string($con, $_POST['Epromo']);
        $Mtl = mysqli_real_escape_string($con, $_POST['Etl']);
        $Eml =  mysqli_real_escape_string($con, $_POST['Eml']);
        $Eposter = mysqli_real_escape_string($con, $_POST['Eposter']);
        
        $sql= "UPDATE `movies_db` SET `Movie_Catag`='$Etype',`Movie_Desc`='$Edesc',`Movie_Lang`='$Elanguage',`Movie_ML`='$Eml',`Movie_Name`='$Ename',`Movie_Poster`='$Eposter',`Movie_TL`='$Eposter',`Movie_Type`='$Etype',`Status`='$Estatus' WHERE movies_Id = '$sr' ";
        
         if ($con->query($sql) === TRUE) {
             echo "Updated Successfully";
        header("Location: https://bvmentertainment.ml/Admins/Moviespanel.php");
        
    } else {
      echo "Error: ----->" . $sql . "<br>" . $con->error;
    }
        
       // echo $sql;
    
    
}
if(isset($_GET['m'])){
    $sr= $_GET['m'];
   // echo $sr;
    
$query = "SELECT * FROM movies_db WHERE movies_Id = {$sr}";
	$result = $con->query($query);
     
    if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) 
                {
//                        echo "<pre>";
//                        print_r($row);
//                        echo "</pre>";
                 
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
    <title>Edit Movie</title>
  </head>
  <body>
      <div class="container mt-5">
          <div class="card">
              <div class="card-header">
                  <h1> Editing Movie - > <?php echo $row['Movie_Name']?></h1>
              </div>
              <div class="card-body">
                  
                  <form method="POST" action="">
                  <div class="form-group">
    <label for="exampleInputEmail1">Movie Name</label>
    <input type="text" name="Ename" id="Ename" class="form-control" value="<?php echo $row['Movie_Name']?>"  autocomplete="off">
                  </div>
    
    <div class="form-group mt-1">
    <label >Movie Description</label>
    <textarea class="form-control"name="Edesc" id="Edesc" autocomplete="off"  rows="4"><?php echo $row['Movie_Desc']?></textarea>
          </div>
                   <div class="form-row mt-3">
    <div class="form-group col-md-3">
      <label for="">Movie_Type</label>
      <select id="Etype" name="Etype" class="form-control" style="width:100%;" >
          <option selected><?php echo $row['Movie_Catag'];?></option>
        <option >Action</option>
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
      <label for="">Movie_language</label>
      <select id="Elanguage" name="Elanguage" class="form-control" style="width:100%;">
          <option selected><?php echo $row['Movie_Lang'];?></option>
        <option>Hindi</option>
        <option>Marathi</option>
        <option>English</option>
        <option>Kannada</option>
        <option>Telegu</option>
        <option>Malayalam</option>
      </select>
    </div>
    
  <div class="form-group col-md-3">
      <label >Movie_Promo</label><br>
      <select  name="Epromo" id="Epromo" class="form-control" style="width:100%;">
          <option selected><?php echo $row['Movie_Catag'];?></option>
        <option >Recommanded</option>
        <option>Top Hits</option>
        <option>Recent Relase</option>
        <option>Trending Now</option>
        <option>Featured</option>
        <option>Best</option>
        </select>
    </div>
                       <div class="form-group col-md-3">
      <label for="">Movie Status</label>
      <select  name="Estatus" id="Estatus" class="form-control" style="width:100%;">
        <option selected><?php echo $row['Status'];?></option>
        <option>Active</option>
        <option>Inactive</option>
        <option>Suspended</option>
        <option>Block</option>
       
      </select>
  </div>
  </div>
       <div class="form-row mt-4">
    <div class="form-group col-md-6">
      <label>Triller_Embed_Link</label>
      <input type="text" name="Etl" id="Etl" class="form-control" value="<?php echo $row['Movie_TL'];?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Movie_LINK</label>
      <input type="text" name="Eml" id="Eml" class="form-control" value="<?php echo $row['Movie_ML'];?>">
    </div>
  </div>        
                  
    <label> Poster Url </label>
  <input type="text" class="form-control" name="Eposter" value="<?php echo $row['Movie_Poster'];?>"  id="Eposter">
  <br>
  <a href="https://bvmentertainment.ml/Admins/Moviespanel.php" class="btn btn-primary ">Back</a>
  <button type="submit" name="EditMovies" class="btn btn-success">Submit</button>        
          
              </form>
                 
                  </div>
              
              </div>
          </div>
      


       <script>
          
//            $('select').select2();
    
          </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


  </body>
</html>


 <?php
 }
}
}
?>