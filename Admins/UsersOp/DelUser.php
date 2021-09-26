<?php
require '../Main Folder/Db.php';

$id = $_GET['vs'];

echo  $id;
$sql="DELETE FROM  users_db  WHERE users_Id = '$id'";
if(mysqli_query($con, $sql)){
    //echo $sql;
    
  //header("Location:" .$location);
   echo " Delete Succesfully";

   echo $path;
   header("Location: ");
    die();
}
else{
    echo $sql;
    echo "<h3> can't Delect user </h3>";
}
mysqli_close($con);
?>

?>