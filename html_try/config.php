<?php 
//ini_set('display_errors', 1); 
//ini_set('display_startup_errors', 1); 
//error_reporting(E_ALL); 

//echo "start";
 define('DB_SERVER', 'localhost');
 define('DB_USERNAME', 'username'); 
define('DB_PASSWORD', 'password'); 
define('DB_DATABASE', 'login'); 
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>
