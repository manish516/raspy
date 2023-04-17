<?php 
 
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'config'); 
define('DB_PASSWORD', 'qwerty'); 
define('DB_DATABASE', 'login'); 
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE); 
//$db = mysqli_connect("localhost","root","","login"); 
//if ($db->connect_error) { //echo "error";
 // die("Database connection failed: " . $db->connect_error);}
?>
