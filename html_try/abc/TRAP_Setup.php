<?php
  include('session.php');
$trap_ip_val=shell_exec("/var/www/html/lokesh/trap_ip_value.sh ");   

 if(isset($_POST['ip'])) {
echo "123";
$ip_address=$_POST['ip'];
if ((filter_var($ip_address, FILTER_VALIDATE_IP))) {
exec("/var/www/html/lokesh/trap_ip_edit.sh '".$ip_address."'");
}
else
{$error1=1;
}
}



?>






 <html>
   
   <head>
      <title>Trap IP</title>
      
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

   </head> 
<div align="center">
 <img src="logo.png" alt="logo" style="width:100px;height:100px;"></div>
   <body bgcolor = "#FFFFFF">

      <div align = "center">
         <div style = "width:330px; border: solid 1px #333333; " align = "center">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>SNMP Trap Receiver</b></div>

            <div style = "margin:30px">
 <div align = "center">
               <form action = "" method = "post">
                  <label>SERVER IP :</label><input type = "text" name = "ip" class = "box" value="<?= $trap_ip_val?>"/><br /><br />
                  <input type = "submit" value = " Submit "/><br />
<div align="center"><label><font color="red">NOTE:- Equipment Will REBOOT After Submit</font></label></div>
               </form>
 <?php
			   //$error=0;
			   if(isset($error1))
			   {
				   echo "<p class='error'>wrong username or password!<p>";
				   exit();
			   }
			   
			   ?>
</div>


               <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>

            </div>

         </div>

      </div><br /><br />
   </body> </html>
