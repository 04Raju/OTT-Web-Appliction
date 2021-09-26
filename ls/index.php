<?php
ini_set('session.save_path', '../Admins/Sessions');

session_start();
require '../Main Folder/Db.php';

header($MainLogin);
die();
?>