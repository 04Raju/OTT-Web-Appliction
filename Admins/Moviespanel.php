<?php

include('../OTT_DB.php');
$msgs="";
$file_name="";


if(isset($_POST['AddMovies'])){
   
      $Mname  = mysqli_real_escape_string($con, $_POST['Mname']);
      $Mdesc = mysqli_real_escape_string($con, $_POST['Mdesc']);
      $Mtype = mysqli_real_escape_string($con, $_POST['Mtype']);
      $Mlanguage = mysqli_real_escape_string($con, $_POST['Mlanguage']);
       $Mrating  = mysqli_real_escape_string($con, $_POST['Mrating']);
       $Mpromo  = mysqli_real_escape_string($con, $_POST['Mpromo']);
        $Mtl = mysqli_real_escape_string($con, $_POST['Mtl']);
        $Mml =  mysqli_real_escape_string($con, $_POST['Mml']);
        $Mposter = mysqli_real_escape_string($con, $_POST['Mposter']);
        
      
       $check=mysqli_num_rows(mysqli_query($con,"SELECT * from movies_db where Movie_ML='$Mml'"));
if($check>0){
   $msgs="<br> Movie  is already present";
 
}
else{

    $sql ="INSERT into movies_db (Movie_Catag,Movie_Desc,Movie_Lang,Movie_ML,Movie_Name,Movie_Poster,Movie_TL,Movie_Type,Status) "
               . " VALUES('$Mpromo','$Mdesc','$Mlanguage','$Mml','$Mname','$Mposter','$Mtl','$Mtype','Active')";
       
   if ($con->query($sql) === TRUE) {
echo "Added Sucessfully Bro";
    header("Refresh:0");
} else {
  echo "Error: ----->" . $sql . "<br>" . $con->error;
}
}//end of else
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
    <title>Movie Panel</title>


<!-- Datatable -->


<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css'>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="icon" type="image/png" href="../Images/Favicon/favicon.ico"/>

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

<?php include 'header.php';?>


<div class="container-fluid mt-3 ">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddMovieModal">
  Add Movie
</button>

</div>






<div class="container-fluid mt-2 table-responsive">


<table class="table table-striped table-bordered  table-hover bg-light text-dark" id='UserList'>
  <thead class="bg-primary text-light text-center">
    <tr>
      <th scope="col">SRN</th>
      <th scope="col">Name</th>
      <th scope="col">Language</th>
      <th scope="col">Type</th>
      <th scope="col">Category</th>
      <th scope="col">Description</th>
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
    //SELECT * FROM musics_db, song_albumdb, artists_db WHERE artists_db.artists_Id= musics_db.Song_Artist and musics_db.Song_Album = song_albumdb.Sr_no
            $quariy = $con->query("SELECT * FROM movies_db"); 
            $num = mysqli_num_rows($quariy);
            if($num>=0){
             while ( $row = mysqli_fetch_array($quariy) ) {
               ?>
      <th class="text-center "scope="row"><?php echo $sr?></th>
      <td class="text-center "scope="row"style=""><?php echo $row['Movie_Name']?></td>
      <td class="text-center "scope="row"style=""><?php echo $row['Movie_Lang']?></td>
      <td class="text-center "scope="row"style=""><?php echo $row['Movie_Type']?></td>
      <td class="text-center "scope="row"style=""><?php echo $row['Movie_Catag']?></td>
      <td class="text-center text-nowrap "scope="row"style=""><?php echo substr($row['Movie_Desc'], 0, 50); ?></td>
      <td class="text-center "scope="row"style=""><?php echo $row['Status']?></td>
     
      <td class="text-center "scope="row"style=""><a class="nav_link" href="Control panel/EditMoviie.php/?m=<?php echo $row['movies_Id'];?>">Edit</a></td>
      <td class="text-center "scope="row"style=""><a  class="text-danger"href="Control panel/EditMoviie.php/?d=<?php echo $row['movies_Id']?>">Delete </a></td>
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

<div class="modal fade" id="AddMovieModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <h5 class="modal-title" id="exampleModalLabel">Add Movie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-secondary text-white">
      <div class="container-fluid">
  <form action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Movie Name</label>
    <input type="text" name="Mname" class="form-control" placeholder="Movie Name"  autocomplete="off"aria-describedby="emailHelp">
    
    <div class="form-group mt-1">
    <label >Movie Description</label>
    <textarea class="form-control"name="Mdesc" id="exampleFormControlTextarea1" autocomplete="off" placeholder="Movie Description" rows="4"></textarea>

    <div class="form-row mt-3">
    <div class="form-group col-md-3">
      <label for="">Movie_Type</label>
      <select id="" name="Mtype" class="form-control" style="width:100%;" >
          <option selected>Select Type</option>
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
      <select id="" name="Mlanguage" class="form-control" style="width:100%;">
          <option selected>Select language</option>
        <option>Hindi</option>
        <option>Marathi</option>
        <option>English</option>
        <option>Kannada</option>
        <option>Telegu</option>
        <option>Malayalam</option>
      </select>
    </div>
    <div class="form-group col-md-3">
      <label for="">Movie_Rating</label>
      <select id="" name="Mrating"class="form-control" style="width:100%;">
        <option selected>Select Rating</option>
        <option>1/10</option>
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
      <label >Movie_Promo</label><br>
      <select  name="Mpromo" class="form-control" style="width:100%;">
          <option selected>Select Category</option>
        <option >Recommanded</option>
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
      <label>Triller_Embed_Link</label>
      <input type="text" name="Mtl" class="form-control" placeholder="Youtube Trailler Link">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Movie_LINK</label>
      <input type="text" name="Mml" class="form-control" placeholder="Movie Link">
    </div>
  </div>

<!-- <form>
  <div class="form-group">
    <label for="formControlRange">Movie Ratting</label>
    <input name="ratting" type="range" class="form-control-range" id="formControlRange">
  </div>
</form> -->

    <label> Poster Url </label>
  <input type="text" class="form-control" name="Mposter" placeholder="Movie poster url" id="fileToUpload">
  <Br><br>

  <button type="submit" name="AddMovies" class="btn btn-primary btn-lg btn-block">Submit</button>
</form>

</div>

      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
   </div>
  </div>
</div>
</div>


  </div>
  </div>
    
    
    
    
    
    
    <div class="modal fade" id="EditModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <h5 class="modal-title" id="exampleModalLabel">Edit Movie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-secondary text-white">
         
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div></div>
    
</div>
 

    
    
    <script>
        
        function editMovie(sr,mc,md,mlang,mml,mn,mp,mtl,mt,status){
          
          $('#Ename').val(mn);
          $('#Edesc').val(md);
           $('#Etype').val(mt).change();
          $('#Elanguage').val(mlang).change();
           $('#Erating').val('9');
            $('#Epromo').val(mc).change();
             $('#Etl').val(mtl);
              $('#Eml').val(mml);
               $('#Eposter').val(mp);
                //$('#').val('');
            
            
        }
        
        </script>


<script>

$(document).ready(function() {

  $("#MP").addClass("active");
 
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
           searchPlaceholder:"Search Movie",
    
        }
    });
    
} );
</script>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    
  </body>
</html>