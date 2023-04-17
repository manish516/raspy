<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form
      //echo $db;
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
	$abc=$_POST['username'];
      $sql = "SELECT id FROM login WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	
	  
	  
      $active = $row['active'];
	  
	  
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1) {
		 // echo "<h2>if<h2>";
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         header("Location:Home.php");
      }
else {
         $err = 1;
      }
   }
?>

 <html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:20px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
	.error {
			 color: red;
		 }
      </style>
   </head> <div align="center">
<img src="Webpage_header_sPDU.png" alt="logo" style="width:1350px;height:72px;"></div>
   <body bgcolor = "#FFFFFF">
      <div align = "center">
         <div style = "width:330px; border: solid 1px #333333; " align = "center">
            <div style = "background-color:#333333; color:#FFFFFF;padding:3px;"><b>Login</b></div>
            <div style = "margin:30px">
 <div align = "center">
               <form action = "" method = "post">
                  <label>UserName :</label><input type = "text" name ="username" class = "box"/><br /><br />
                  <label>Password :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
 <?php
			   //$error=0;
			   if(isset($err))
			   {
				   echo "<p class='error'>wrong username or password!<p>";
				   exit();
			   }
			   
			   ?> </div>
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>
            </div>
         </div>
      </div>
<div style = "position:fixed;left:20px;bottom:2px;">
<p2>© DDSat Technologies Private Limited , Ghaziabad<p2>
   </body> </html>
