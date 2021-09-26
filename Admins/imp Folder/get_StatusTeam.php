<?php 

require '../../Main Folder/Db.php';

ini_set('session.save_path', '../Sessions');
session_start();


//$uid= $_SESSION['uid'];
// $uid = $_SESSION['uid'];
// echo  $uid;

$time = time();

//$sql= mysqli_query($con,"Select * from users_db");


?>
<tr>
    <?php
    $sr=1;
   
            $quariy = $con->query("SELECT * FROM teammembers ");
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
      <th class="text-center "scope="row"><?php echo $sr?></th>
      <td class="text-center "scope="row"style=""><?php echo $row['Full_Name']?></td>
      <td class="text-center "scope="row"style=""><?php echo $row['DOB']?></td>
      <td class="text-center "scope="row"style=""><?php echo $row['Email']?></td>
      <td class="text-center "scope="row"style=""><?php echo $row['Role']?></td>
      <td class="text-center "scope="row"style=""><?php echo $row['City']?></td>
      <td class="text-center "scope="row"style=""><?php echo $row['Pincode']?></td>
       <td class="text-center"scope="row"><?php echo $row['Timestamps'];?></td>
      <td scope="row"style=""><button type='button' class='btn <?php echo $class?>'><?php echo $status ?></button></td>
      <td class="text-center "scope="row"style=""><a type='button' class="nav_link"  data-toggle="modal" data-target="#EditModal" onclick="EditData('<?php echo $row['Sr_no'] ?>','<?php echo $row['Full_Name'];?>','<?php echo $row['DOB'];?>','<?php echo $row['Phone'];?>','<?php echo $row['Email'];?>','<?php echo $row['Password'];?>','<?php echo $row['Role'];?>','<?php echo $row['City'];?>','<?php echo $row['Pincode'];?>','<?php echo $row['Status'];?>')">Edit </a></td>
      <td class="text-center "scope="row"style=""><a  class="text-danger"href="UsersOp/DelUser.php/?v=<?php echo $row['Sr_no']?>">Delete </a></td>
    </tr>
    </tr>
    <?php
    $sr++;
}
     }
?>