<?php
include('session.php');

$temp_val=shell_exec("/var/www/html/lokesh/temp_alarm_val.sh");

if(isset($_POST['temp_alarm'])) {
    $temp_alarmn=$_POST['temp_alarm'];
    exec("/var/www/html/lokesh/temp_alarm_edit.sh '".$temp_alarmn."'");
}
$temp_val=shell_exec("/var/www/html/lokesh/temp_alarm_val.sh");
?>







 <html>

   <head>
    <title>Temp & Humidity Alarm Setup</title>

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
.buttondef {
background-color: #006361;
    border: none;
    color: white;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: ;
        top: 50px;
    cursor: pointer;
}
form {
    display: inline-block;
}
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
      <div style = "width:330px; border: solid 1px #333333; " align = "center">
         <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Alarm Threshold Setup</b></div>
         <div style = "margin:30px">
            <div align = "center">
               <form action = "" method = "post">
                  <label>Temperature Alarm Threshold (C) :</label><input type = "text" name = "temp_alarm" class = "box" value="<?= $temp_val?>"/><br /><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               </br>
               <form action = "" method = "post">
                  <label>Humidity Alarm Threshold (%) :</label><input type = "text" name = "hum_alarm" class = "box" value="<?= $hum_val?>"/><br /><br />
                  <input type = "submit" value = " Submit "/><br />
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
   </div>
   <br /><br />
   <div style = "position:fixed;left:20px;bottom:2px;">
      <p2>
      © DDSat Technologies Private Limited , Ghaziabad
      <p2>
   </div>





<script>
includeHTML();
</script>


</body> 
</html>


