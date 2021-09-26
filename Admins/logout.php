<?php
require '../Main Folder/Db.php';

ini_set('session.save_path', 'Admins/Sessions');

session_start();
session_destroy();
header($AdminLogout);
die();
?>