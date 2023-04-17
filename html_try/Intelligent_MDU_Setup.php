<?php
include('session.php');
$ip_val=shell_exec("/var/www/html/lokesh/ip_value.sh ");
$gw_val=shell_exec("/var/www/html/lokesh/gw_value.sh ");
$sub_val=shell_exec("/var/www/html/lokesh/sub_value.sh ");
$dns_val=shell_exec("/var/www/html/lokesh/dns_value.sh ");
$found=shell_exec("/var/www/html/lokesh/found.sh ");

if($found==0)		//disable or enable the box if choose dhcp or static ip
{
$se="selected";
$de="disabled";
}
elseif($found==1)
{$se="";
$de="";
}
else {echo $found;}



if($_SERVER["REQUEST_METHOD"] == "POST") 
{

if($_POST['select']=='1'){

//============================================IP====================================
if ( isset($_POST['address'])&&!empty($_POST['address']))
{
$address=$_POST['address'];
if (!(filter_var($address, FILTER_VALIDATE_IP))) {
	$error1=1;
}}
else{
$error5=1;
}

//==========================================subnet====================================
if ( isset($_POST['subnet'])&&!empty($_POST['subnet']))
{
$Subnet1=$_POST['subnet'];


if (filter_var($Subnet1, FILTER_VALIDATE_IP)) {

$sub=explode('.',$Subnet1);
$i=1;
$next=0;
//$error2=0;
	foreach ($sub as $item) {

		if ($i==1&&$item ==255){

			$i++;
		}
			elseif($i==2&&($item ==0||$item ==192||$item==224||$item==240||$item==248||$item==252||$item==254||$item==255))
				{
					if($item!=255)
					{
						$next=1;

					}

					$i++;
				}
					elseif($i==3&&($item ==0||$item ==192||$item==224||$item==240||$item==248||$item==252||$item==254||$item==255))
					{
							if ($item!=0&&$next==1)
							{
								$error2=1;

							}

							if($item!=255)
							{
								$next=1;

							}

						$i++;
					}
					elseif($i==4&&($item ==0||$item ==192||$item==224||$item==240||$item==248||$item==252||$item==254||$item==255))
					{
					if ($next==1&&$item!=0)
						{
							$error2=1;
						}
						$i++;
					}
					elseif($i==5)
							{}
	else 
	{
		$error2=1;
	}
 }
}
else
 {
         $error2=1;
         }


}
else{
$error6=1;
}

//==================================================gateway==================================


if ( isset($_POST['gateway'])&&!empty($_POST['gateway']))
{
$gateway=$_POST['gateway'];

if (!(filter_var($gateway, FILTER_VALIDATE_IP))){

  $error3=1;

}}
else{
$gateway=0;
}


//=================================================DNS======================================

if ( isset($_POST['domain'])&&!empty($_POST['domain']))
{
$domain=$_POST['domain'];

if (!(filter_var($domain, FILTER_VALIDATE_IP))){

  $error4=1;

}}

else{
$domain=0;
}



//===========================================send config setting to raspberry (static ip)==============
if (!(isset($error1)||isset($error2)||isset($error3)||isset($error4)||isset($error5)||isset($error6))) //send config setting for Static ip
{
	printf("ip=%s subnet=%s gateway=%s dns=%s",$address,$Subnet1,$gateway,$domain);
shell_exec("/var/www/html/lokesh/change_value.sh '".$address."' '".$Subnet1."' '".$gateway."' '".$domain."'" );
}


}
//==========================================send config setting to raspberry ( dhcp )==================
elseif($_POST['select']=='0')
{
exec("/var/www/html/lokesh/default_value.sh");

}
else
{
$error10=1;
}
//else{
//exec("/var/www/html/lokesh/test1.sh ");

}



?>



<html>
   
   <head>
    <title>IP Setup Page</title>

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
		width:130px;
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


</form></div>
      <div align = "center">
         <div style = "width:330px; border: solid 2px #333333; " align = "center">

            <div style = "background-color:#333333; color:#FFFFFF; padding:5px;"><b>Intelligent MDU Setup</b></div>

            <div style = "margin:35px">

<div align="right">
<form action = "" method = "post">


 <div align="center">
 <select id="id" name="select" onchange="jsfunc1()">
  <option value="1">Static IP</option>
 <option <?=$se;?>  value="0">DHCP</option>

</select></div>
 <br />


   <label> IP :</label><input type = "text" id="IP" name = "address" class = "box" value="<?= $ip_val?>"/ <?=$de;?>  ><br />
<div align="center">
<?php
if(isset($error1))
	   {
		   echo "<p class='error'>invalid IP<p>";
	   }
if(isset($error5))
           {
                   echo "<p class='error'>IP is empty<p>";
           }
?></div><br />



 <label> SUBNET :</label><input type = "text" id="SUB"  name = "subnet" class = "box" value="<?= $sub_val?>"/ <?=$de;?>  >

<div align="center">
<?php
    if(isset($error2))
   {if ($error2==1)
	   echo "<p class='error'>invalid subnet <p>";
   }
if(isset($error6))
           {
                   echo "<p class='error'>subnet is empty<p>";
           }
?></div>
<br />



                  <label> GATEWAY :</label><input type = "text" id="gate"  name = "gateway" class = "box" value="<?= $gw_val?>"/ <?=$de;?>  >


<div align="center">
<?php
if(isset($error3))
		   {
			   echo "<p class='error'>invalid gateway<p>";
		   }
if(isset($error7))
           {
                   echo "<p class='error'>gateway is empty<p>";
           }
?></div><br />



 <label> DNS server :</label><input type = "text" id="DNS"  name = "domain" class = "box" value="<?= $dns_val?>"/  <?=$de;?>  ><br />
<div align="center">
<?php
if(isset($error4))
                   {
                           echo "<p class='error'>invalid DNS<p>";
                   }
?>
</div><br />


<div align="center">
                 <input type = "submit" value = " Submit "/></div>

<div align="center"><label><font color="red">NOTE:- Equipment Will REBOOT After Submit</font></label></div>

</form></div>

<script>
function jsfunc1() {
  if(document.getElementById('id').value == "0")
  {document.getElementById("IP").disabled = true;}
  if(document.getElementById('id').value == "1")
  {document.getElementById("IP").disabled = false;}
if(document.getElementById('id').value == "0")
  {document.getElementById("SUB").disabled = true;}
  if(document.getElementById('id').value == "1")
  {document.getElementById("SUB").disabled = false;}
if(document.getElementById('id').value == "0")
  {document.getElementById("gate").disabled = true;}
  if(document.getElementById('id').value == "1")
  {document.getElementById("gate").disabled = false;}
if(document.getElementById('id').value == "0")
  {document.getElementById("DNS").disabled = true;}
  if(document.getElementById('id').value == "1")
  {document.getElementById("DNS").disabled = false;}
  }
</script>




<div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>

            </div>

         </div>

      </div> 

<div style = "position:fixed;left:20px;bottom:2px;">
<p2>© DDSat Technologies Private Limited , Ghaziabad<p2>
</div>



<script>
    includeHTML();
</script>


</body>
</html>




