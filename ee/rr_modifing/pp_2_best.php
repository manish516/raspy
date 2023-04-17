<?php
include('session.php');







//===================fault input read===========================
    //---------------LNB-2 fault status-------------------------
$val_A6=shell_exec("gpio -x mcp23017:100:0x20:1 read 106");  //A6
if($val_A6==1)
{
    $color2="#f44336"; //red--> OFF
}elseif($val_A6==0)
{
    $color2="#4CAF50"; //green
}
    //---------------LNB-1 fault status-------------------------

$val_A7=shell_exec("gpio -x mcp23017:100:0x20:1 read 107");  //A7
if($val_A7==1)
{
    $color1="#f44336"; //red--> OFF
}elseif($val_A7==0)
{
    $color1="#4CAF50"; //green
}




    //---------------Power faults-------------------------------
$val_p=shell_exec("gpio -x mcp23017:100:0x20:1 read 101");   //XX-A1 --> for Power fault read input status
if($val_p==1)
{
    $color3="#f44336"; 
}elseif($val_p==0)
{
    $color3="#4CAF50";
}


//===================LNB postion input read===========================
//======================LNB-1 postion status===========================
$val_A5=shell_exec("gpio -x mcp23017:100:0x20:1 read 105");  //A5
//$val_A5=shell_exec("sudo /bin/bash /var/www/html/ee/ss/indicator_lnb_1_ON_OFF_web.sh");  //A5
if($val_A5==1)
{
    $color4="#f47536"; //orange //ofline --> but not faulty 
}elseif($val_A5==0)
{
    $color4="#4CAF50"; //green
}

//=====================LNB-2 postion status==============================
$val_A4=shell_exec("gpio -x mcp23017:100:0x20:1 read 104");   //A4
//$val_A4=shell_exec("sudo /bin/bash /var/www/html/ee/ss/indicator_lnb_1_ON_OFF_web.sh");  //A5
if($val_A4==1)
{

    $color5="#f47536"; //orange //ofline --> but not faulty 
}elseif($val_A4==0)
{
    $color5="#4CAF50"; //green
}




//===================Operation Mode Status===========================

//======================Automatic Mode===========================

//$val_auto=shell_exec("sudo /bin/cat /var/www/html/ee/ss/auto_status_value.txt");  
$val_auto=shell_exec("sudo /bin/bash /var/www/html/ee/ss/indicator_auto_mode_webpage.sh");  
if($val_auto==1)
{
    $color6="#f47536"; //orange 
}elseif($val_auto==0)
{
    $color6="#4CAF50"; //green
}


//======================Manual Mode===========================
//$val_man=shell_exec("sudo /bin/cat /var/www/html/ee/ss/manual_status_value.txt");  
$val_man=shell_exec("sudo /bin/bash /var/www/html/ee/ss/indicator_manual_mode_webpage.sh");  
if($val_man==1)
{
    $color7="#f47536"; //orange 
}elseif($val_man==0)
{
    $color7="#4CAF50"; //green
}





if($_SERVER["REQUEST_METHOD"] == "POST") 
{



////NOT WORKING=====drop-down LNB selector======
//
//    // Handle form submission
//    if (isset($_POST['selectText'])) {
//        $selectedValue = $_POST['selectText'];
//        if ($selectedValue === "text1") {
//            $text = "LNB 1";
//
//            $text_a = "LNB 2";  //del
//
//            //--shell_exec("gpio -x mcp23017:100:0x20:1 write 113 1");   //B5
//            //shell_exec("sleep 0.2");
//
//            //--shell_exec("gpio -x mcp23017:100:0x20:1 write 115 1");   //B7
//            //shell_exec("sleep 0.2");
//
//        } else if ($selectedValue === "text2") {
//
//            $text = "LNB 2";	
//
//            $text_a = "LNB 1";   //del
//
//            //--shell_exec("gpio -x mcp23017:100:0x20:1 write 112 1");  //B4
//            //shell_exec("sleep 0.2");
//
//            //--shell_exec("gpio -x mcp23017:100:0x20:1 write 114 1");  //B6
//            //shell_exec("sleep 0.2"); 
//
//
//        }
//    }




}

//---Write or Output GIPO pins
//WORKING=====drop-down Active device selector LNB Selector and operation mode selector

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $value1 = $_POST["value1"];
    $value2 = $_POST["value2"];


    $val_SP_A7=shell_exec("gpio -x mcp23017:100:0x20:1 read 107");  //A7 --> fault status input for LNB-1
    //--when selected (LNB 1 and Auto mode) -- then based on A5(input_read) --> B5 and B7 (output_write) 
    $val_SP_A5=shell_exec("gpio -x mcp23017:100:0x20:1 read 105");  //A5
    $val_SP_A4=shell_exec("gpio -x mcp23017:100:0x20:1 read 104");  //A4




//    echo "<br>Selected LNB: <span style='background-color: lightblue;'>" . $value1 . "</span>";
//    echo "<br>Selected Mode: <span style='background-color: lightblue;'>" . $value2 . "</span>";

//    //---LNB Active device selection for Automatic mode---
//
//    if($value1==="LNB 1" && $value2==="Automatic Mode") {
//
//
//        echo "<br>Automatic Mode selected";
//
//        // auto-mode txt ON-bit=0 set and run conti.sh in bg-- which (in fault lnb-1 change to lnb-2 is ON)
//        //shell_exec("sudo /bin/bash /var/www/html/ee/ss/auto_mode_sel_default_lnb1.sh &"); 
//
//        //echo "<br>Selected LNB: <span style='background-color: lightblue;'>" . $value1 . "</span>";
//        //echo "<br>Selected Mode: <span style='background-color: lightblue;'>" . $value2 . "</span>";
//
//
//    
//
//    } elseif($value1=="LNB 2" && $value2==="Automatic Mode") {
//
//        echo "<br>Automatic Mode selected";
//        // auto-mode txt ON-bit=0 set and run conti.sh in bg-- which (in fault lnb-1 change to lnb-2 is ON)
//        //shell_exec("sudo /bin/bash /var/www/html/ee/ss/auto_mode_sel_default_lnb1.sh &");  
//
//        //echo "<br>Selected LNB: <span style='background-color: lightblue;'>" . "LNB 1" . "</span>";
//        //echo "<br>Selected Mode: <span style='background-color: lightblue;'>" . $value2 . "</span>";
//
//    }
//
//
//           
//
//
//
////---LNB Active device selection for Manual Mode---
//
//    if($value1==="LNB 1" && $value2==="Manual Mode") {
//
//
//      
//        echo "<br>LNB-1 and Manual Mode selected";
//        //shell_exec("sudo /bin/bash /var/www/html/ee/ss/manual_mode_sel_lnb1.sh"); 
//
//        echo "<br>Selected LNB: <span style='background-color: lightblue;'>" . $value1 . "</span>";
//        echo "<br>Selected Mode: <span style='background-color: lightblue;'>" . $value2 . "</span>";
//
//
//    } elseif($value1=="LNB 2" && $value2==="Manual Mode") {
//
//        echo "<br>LNB-2 and Manual Mode selected";
//        //shell_exec("sudo /bin/bash /var/www/html/ee/ss/manual_mode_sel_lnb2.sh"); 
//
//        echo "<br>Selected LNB: <span style='background-color: lightblue;'>" . $value1 . "</span>";
//        echo "<br>Selected Mode: <span style='background-color: lightblue;'>" . $value2 . "</span>";
//
//    }



//---button LNB Active device selection for Manual Mode---

    if($value1==="LNB 1") {

        //shell_exec("sudo /bin/bash /var/www/html/ee/ss/auto_mode_sel_default_lnb1.sh &"); 

        echo "<br>LNB-1 and Manual Mode selected";
        shell_exec("sudo /bin/bash /var/www/html/ee/ss/manual_mode_sel_lnb1.sh"); 

    } elseif($value1=="LNB 2") {

        echo "<br>LNB-2 and Manual Mode selected";
        shell_exec("sudo /bin/bash /var/www/html/ee/ss/manual_mode_sel_lnb2.sh"); 

    }


//---button For mode selection---

    if($value2==="Automatic Mode") {

        //shell_exec("sudo /bin/bash /var/www/html/ee/ss/auto_mode_sel_default_lnb1.sh &"); 

        echo "<br>Automatic Mode selected ---ZZZZ";
        shell_exec("sudo /bin/bash /var/www/html/ee/ss/auto_mode_sel.sh"); 
        shell_exec("sudo /bin/bash /var/www/html/ee/ss/auto_mode_sel_default_lnb1.sh &"); 

    } elseif($value2==="Manual Mode") {

        echo "<br>Manual Mode selected ----ZZZZ";
        shell_exec("sudo /bin/bash /var/www/html/ee/ss/manual_mode_sel.sh"); 

    }



    





}

//    <meta http-equiv="refresh" content="2">



?>




<html>
<head>
    <title>Triangle Color Change</title>
    <style type = "text/css">


button{}
.button1 {
background-color: <?=$color1?>;
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


.buttondef {background-color: #006361;}

box {
		display: inline-block;
		width:30px;
            border:#666666 solid 1px ;
		text-align: center;
		 padding: 2px;
		border: 3px solid gray;
		}
.box1{ width:70px;}
	form {
    display: inline-block; //Or display: inline; 
}







//---LNB Fault status
.container-1 {
        display: inline-block;
        /*border: 1px solid black;*/
        /*padding: 10px;*/
      }
      h1 {
        text-align: center;
        background-color: blue;
        color: white;
        margin: 0;
      }
     .p-color-1 {
        /*background-color: red;*/
        margin: 0;
      }
    .square1 {
        display: inline-block;
        width: 15px;
        height: 15px;
        background-color: <?=$color1?>;
        margin-left: 10px;
      }

    .square2 {
        display: inline-block;
        width: 15px;
        height: 15px;
        background-color: <?=$color2?>;
        margin-left: 10px;
      }

    .square3 {
        display: inline-block;
        width: 15px;
        height: 15px;
        background-color: <?=$color3?>;
        margin-left: 65px;
      }




//---NOT WORKING -- drop-down selection ---Active Device Select_Status 
.container_2 {
        display: inline-block;
        /*border: 1px solid black;*/
        /*padding: 10px; */
      }
      h1 {
        text-align: center;
        background-color: blue;
        color: white;
        margin: 0;
      }
      #text1 {
        background-color: grey;
        margin: 0;
        display: inline-block;
        padding: 10px;
      }
      #text2 {
        background-color: lightgrey;
        margin: 0;
        display: inline-block;
        padding: 10px;
      }
      #select1 {
        margin-top: 20px;
      }


//--- LNB position status
.container_3 {
        display: inline-block;
        border: 1px solid black;
        padding: 10px;
      }
      h1 {
        text-align: center;
        background-color: blue;
        color: white;
        margin: 0;
      }
      p {
        /*background-color: #939191;*/
        margin: 0;
      }
    .square_4 {
        display: inline-block;
        width: 15px;
        height: 15px;
        background-color: <?=$color4?>;
        margin-left: 10px;
      }

    .square_5 {
        display: inline-block;
        width: 15px;
        height: 15px;
        background-color: <?=$color5?>;
        margin-left: 10px;
      }


//--- Active Device Selection and Operation Mode Selection
.container_4 {
        display: inline-block;
        border: 1px solid black;
        padding: 10px;
      }
      h1 {
        text-align: center;
        background-color: blue;
        color: white;
        margin: 0;
      }
      p {
        /*background-color: #939191;*/
        margin: 0;
      }



//---
.container_5 {
        display: inline-block;
        border: 1px solid black;
        padding: 10px;
      }
      h1 {
        text-align: center;
        background-color: blue;
        color: white;
        margin: 0;
      }
      p {
        /*background-color: #939191;*/
        margin: 0;
      }
    .square6 {
        display: inline-block;
        width: 15px;
        height: 15px;
        background-color: <?=$color6?>;
        margin-left: 10px;
      }

    .square7 {
        display: inline-block;
        width: 15px;
        height: 15px;
        background-color: <?=$color7?>;
        margin-left: 10px;
      }

   



</style>


</head>




<div align="center">
<img src="Webpage_header_sPDU.png" alt="logo" style="width:1350px;height:72px;"></div>

<div style = "background-color:#006361; color:#FFFFFF;">
<form method="get" action="Home.php">
    <button class="button1 buttondef" style="height:40px;width:180px;" type="submit">Home</button></form>
<form method="get" action="change_password.php">
    <button class="button1 buttondef" style="height:40px;width:180px;" type="submit">Change Password</button> </form>
<form method="get" action="TRAP_Server_Setup.php">
    <button class="button1 buttondef" style="height:40px;width:180px;" type="submit">TRAP Server Setup</button></form>
<form method="get" action="Intelligent_MDU_Setup.php">
    <button class="button1 buttondef" style="height:40px;width:180px;" type="submit">Intelligent MDU Setup</button></form>
<form method="get" action="Temp_Alarm.php">
    <button class="button1 buttondef" style="height:40px;width:180px;" type="submit">Temp & Hum Alarm Setup</button></form>
<form method="get" action="logout.php">
    <button  class="button1 buttondef" style="height:40px;width:180px;" type="submit">logout</button></form>
</div>
</div>
<br />



<div align="center">
<!--LNB Fault status-->
<div class="container-1" style = "background-color:#939191; position: absolute; top: 160px; left: 410px; width:250px; height: 130px; border: solid 2px #333333; padding:0px;" align = "center">
      <h1> Faults Status </h1>
      <p class="p-color-1"> LNB 1 Current Fault: <span class="square1"></span></p>
      <p> LNB 2 Current Fault: <span class="square2"></span></p>
      <p> Power Fault: <span class="square3"></span></p>
    </div>
</div>




<div align="center">
<!-- LNB position status-->
<div class="container_3" style = "background-color:#939191; position: absolute; top: 160px; left: 760px; width:250px; height: 130px; border: solid 2px #333333; padding:0px;"  align = "center">
      <h1> LNB Position status</h1>
      <p> LNB 1 Position: <span class="square_4"></span></p>
      <p> LNB 2 Position: <span class="square_5"></span></p>
    </div>

</div>




<div align="center">
<!--Operation mode states-->
<div class="container_5" style = "background-color:#939191; position: absolute; top: 310px; left: 410px; width:250px; height: 130px; border: solid 2px #333333; padding:0px;">
      <h1> Operation mode states </h1>
      <p> Automatic Mode: <span class="square6"></span></p>
      <p> Manual Mode: <span class="square7"></span></p>
    </div>

</div>





<div align="center">
<!-- Active Device Selection and Operation Mode Selection-->
<div class="container_4" style = "background-color:#939191; position: absolute; top: 310px; left: 760px; width:250px; height: 130px; border: solid 2px #333333; padding:0px;">
        <h1> Selection </h1>
            <form method="POST">
                <label for="dropdown1">Select LNB:</label>
                <select id="dropdown1" name="value1">
                    <option value="LNB 1">LNB-1</option>
                    <option value="LNB 2">LNB 2</option>
                    <input type="submit" value="Submit">
                </select>

            </form>

            <form method="POST">
                <label for="dropdown2">Select Mode:</label>
                <select id="dropdown2" name="value2">
                    <option value="Automatic Mode">Automatic Mode</option>
                    <option value="Manual Mode">Manual Mode</option>
                    <input type="submit" value="Submit">
                </select>

            </form>





     </div>


</div>




</body>
</html>



