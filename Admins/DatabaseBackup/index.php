<?php


ini_set('session.save_path', '../Sessions');
session_start();

$role = $_SESSION['role'];

if($role != "Super Admin"){
  
   // header('location:http://192.168.0.104/OTT-Application/admins/index.php');
   echo "<h2 class='text-center text-warning '>You can't access this panel  <a class='btn btn-danger' href='logout.php'>logout </a></h2>"
    ;
  exit();
  };



    include_once('Mysqldump/Mysqldump.php');
    // $dump = new Ifsnop\Mysqldump\Mysqldump(
    // 'mysql:host=localhost;dbname=ott', 'root', '');
      
       $dump = new Ifsnop\Mysqldump\Mysqldump(
    'mysql:host=localhost;dbname=u710183214_ott', 'u710183214_BVM', 'Bvmentertainment@2021'); 
    
    
    $fdate= date('d-m-Y');
    $dump->start("BackupDatabaseFiles/$fdate.sql");

    echo "Database Back Successfully";


    $path="BackupDatabaseFiles/$fdate.sql";


 

    ?>
    <br><br><br>
    
     <a download href="<?php echo $path; ?>">Download File</a>