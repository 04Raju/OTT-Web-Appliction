<?php 
require '../../Main Folder/Db.php';

ini_set('session.save_path', '../Sessions');
session_start();

if(!isset($_SESSION['uid'])){
  
  //header('location:http://192.168.0.104/OTT-Application/ls/login.php');
  //die();
};

//$uid= $_SESSION['uid'];
// $uid = $_SESSION['uid'];
// echo  $uid;

$time = time();

//$sql= mysqli_query($con,"Select * from users_db");


?>
<tr>
    <?php
    $sr=1;
   
            $quariy = $con->query("SELECT * FROM users_db"); 
            $num = mysqli_num_rows($quariy);
            if($num>0){
             while ( $row = mysqli_fetch_array($quariy) ) {
               $status= 'Offline';
               $class = 'btn-danger';
               if($row['last_login']>$time){
                 $status='Online';
                 $class='btn-success';

               }
               ?>
      <th scope="row"><?php echo $sr?></th>
      <td scope="row"style=""><?php echo $row['User_name']?></td>
      <td scope="row"style=""><?php echo $row['User_Email']?></td>
      <td scope="row"style=""><?php echo $row['User_Plan']?></td>
      <td scope="row"style=""><?php echo $row['User_Date']?></td>
      <td scope="row"style=""><?php echo $row['User_PlanExp']?></td>
      <td scope="row"style=""><?php echo $row['User_Status']?></td>
      <td scope="row"style=""><?php echo $row['User_Payment']?></td>
      <td scope="row"style=""><?php echo $row['User_Ordid']?></td>
      <td scope="row"style=""><button type='button' class='btn <?php echo $class?>'><?php echo $status ?></button></td>
      <td scope="row"style=""><a type='button' class="nav_link"  data-toggle="modal" data-target="#EditModal">Edit </a></td>
      <td scope="row"style=""><a href="UsersOp/DelUser.php/?v=<?php echo $row['users_Id']?>">Delete </a></td>
    </tr>
    <?php
    $sr++;
}
     }
?>