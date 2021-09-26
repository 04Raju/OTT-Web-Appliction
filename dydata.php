<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

//echo "Hello";

echo "<pre>";
print_r($_POST);
echo "</pre>";


$json = file_get_contents('php://input');

// Converts it into a PHP object
$data = json_decode($json);
if(isset($_POST['test'])){
    echo "testing";
}

if(isset($_POST['fname'])){
    
    echo $_POST['fname'];
    echo "<br>Heythere we are here";
    die();
}


?>