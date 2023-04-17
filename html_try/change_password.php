<?php
   include('session.php');
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form
      //$val1="abc";
	  //$error=0;
      $new=$_POST['new_pass'];
	  $re=$_POST['re-new_pass'];
	  $old=$_POST['old_pass'];
	  if(!empty($new)){
	  if((strcmp($new, $re))==0){
	  $new_pass = mysqli_real_escape_string($db,$_POST['new_pass']);
    // $username = mysqli_real_escape_string($db,$_POST['username']);
      
      $sql = "SELECT password FROM login WHERE username = 'admin'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	  //printf ("%s \n",$row["id"]);
	 
	  
      $oldpassword = $row['password'];
	
	  
      
      
		
      if(strcmp($old,$oldpassword)==0) {
		 $sql1 = "UPDATE login SET password = '$new' where username = 'admin'";
		 $result1 = mysqli_query($db,$sql1);
         
         header("Location:logout.php");
      }
	  else {
		  
         $error4=1;
      }}
	  else{
		  $error5=1;
	  }
	  }
	  else {$error6=1;}
   }
?> 


<html>
   
   <head>
    <title>Change Password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap4_3_1_min.css">

    <!-- below bootstrap code is for THE FIVE PROMISES -->
    <link rel="stylesheet" href="bootstrap3_3_7_min.css">
    <!-- jQuery library -->
    <script src="jquery3_3_1_min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="bootstrap3_3_7_min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="font-awesome_4_7_0.css">
    <!-- bootstrap code for THE FIVE PROMISES ends -->

    <script src="jquery3_3_1_slim_min.js" ></script>
    <script src="popper.js" ></script>
    <script src="bootstrap4_3_1_min.js" ></script>


    <!-- import/inculed html file javascript code  -->
    <script src="import_html.js"></script>
 





<style type = "text/css">
button{}
.button1 {
background-color: #006361;
    border: none;
    color: white;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: ;
	top: 50px;
    left: 50px;
    cursor: pointer;
}
form {
    display: inline-block; //Or display: inline; 
}
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:50px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
		 
		 .error {
			 color: red;
		 }
      </style>
      
   </head>
   


<div class="container_b1">
  <div class="row">
    <div class="col-md-12 w-150">
      <img src="Webpage_header_sPDU.png" alt="Image description" class="mx-auto d-block">
    </div>
  </div>
</div>




<!---------Nav html file inculed--------->

<div include_html="nav.html"></div> 




   <body bgcolor = "#FFFFFF">







      <div align = "center">
         <div style = "width:360px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Change Password</b></div>
				
            <div style = "margin:30px">
               <div align = "right">
               <form action = "" method = "post">
			<label>current Password :</label><input type = "password" name = "old_pass" class = "box" /><br /><br />
                  <label>New Password :</label><input type = "password" name = "new_pass" class = "box" /><br /><br />
                  <label>verify Password :</label><input type = "password" name = "re-new_pass" class = "box" /><br/><br />
                 <div align = "center"> <input type = "submit" value = " Submit "/><br /></div>
               </form> 

<div align = "center">
               <?php
			   //$error=0;
			   if(isset($error4))
			   {
				   echo "<p class='error'>current password not match<p>";
				   exit();
			   }
			   if(isset($error5))
			   {
				   echo "<p class='error'>new and re-new password not match<p>";
				   exit();
			   }
			    if(isset($error6))
			   {
				   echo "<p class='error'>cant set empty password<p>";
				   exit();
			   }
			   
			   ?></div></div>
 
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>
            </div>
         </div>
      </div><br /><br /><br /> 
<div style = "position:fixed;left:20px;bottom:2px;">
<p2>© DDSat Technologies Private Limited , Ghaziabad<p2>
</div>


<script>
    includeHTML();
</script>



   </body> 
</html>
