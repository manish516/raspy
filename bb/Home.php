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





//---Write or Output GIPO pins
//WORKING=====drop-down Active device selector LNB Selector and operation mode selector

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $value1 = $_POST["value1"];
    $value2 = $_POST["value2"];


    $val_SP_A7=shell_exec("gpio -x mcp23017:100:0x20:1 read 107");  //A7 --> fault status input for LNB-1
    //--when selected (LNB 1 and Auto mode) -- then based on A5(input_read) --> B5 and B7 (output_write) 
    $val_SP_A5=shell_exec("gpio -x mcp23017:100:0x20:1 read 105");  //A5
    $val_SP_A4=shell_exec("gpio -x mcp23017:100:0x20:1 read 104");  //A4





//---button LNB Active device selection for Manual Mode---

    if($value1==="LNB 1") {

        //shell_exec("sudo /bin/bash /var/www/html/ee/ss/auto_mode_sel_default_lnb1.sh &"); 

        //--echo "<br>LNB-1 and Manual Mode selected";
        shell_exec("sudo /bin/bash /var/www/html/ee/ss/manual_mode_sel_lnb1.sh"); 

    } elseif($value1=="LNB 2") {

        //--echo "<br>LNB-2 and Manual Mode selected";
        shell_exec("sudo /bin/bash /var/www/html/ee/ss/manual_mode_sel_lnb2.sh"); 

    }


//---button For mode selection---

    if($value2==="Automatic Mode") {

        //shell_exec("sudo /bin/bash /var/www/html/ee/ss/auto_mode_sel_default_lnb1.sh &"); 

        //echo "<br>Automatic Mode selected ---ZZZZ";
        shell_exec("sudo /bin/bash /var/www/html/ee/ss/auto_mode_sel.sh &"); 
        shell_exec("sudo /bin/bash /var/www/html/ee/ss/auto_mode_sel_default_lnb1.sh > /dev/null"); // in scrpit already there is a (&) 


    } elseif($value2==="Manual Mode") {

        //--echo "<br>Manual Mode selected ----ZZZZ";
        shell_exec("sudo /bin/bash /var/www/html/ee/ss/manual_mode_sel.sh"); 

    }




}

//    <meta http-equiv="refresh" content="2">



?>







<html>
<head>
    <title>Auto Connect</title>
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
.container_1 {
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
        width: 13px;
        height: 13px;
        background-color: <?=$color1?>;
        margin-left: 10px;
      }

    .square2 {
        display: inline-block;
        width: 13px;
        height: 13px;
        background-color: <?=$color2?>;
        margin-left: 10px;
      }

    .square3 {
        display: inline-block;
        width: 13px;
        height: 13px;
        background-color: <?=$color3?>;
        margin-left: 65px;
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
        width: 13px;
        height: 13px;
        background-color: <?=$color4?>;
        margin-left: 10px;
      }

    .square_5 {
        display: inline-block;
        width: 13px;
        height: 13px;
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
        width: 13px;
        height: 13px;
        background-color: <?=$color6?>;
        margin-left: 10px;
      }

    .square7 {
        display: inline-block;
        width: 13px;
        height: 13px;
        background-color: <?=$color7?>;
        margin-left: 28px;
      }

   


</style>


</head>

<body>




<div class="container_b1">
  <div class="row">
    <div class="col-md-12 w-150">
      <img src="Webpage_header_sPDU.png" alt="Image description" class="mx-auto d-block">
    </div>
  </div>
</div>




<!---------Nav html file inculed--------->

<div include_html="nav.html"></div> 






<div class="container_b2">
    <div class="row justify-content-center">
        <div class="col-sm-8 col-md-4 border p-4">

          <div class="bg-danger text-white p-2 mb-2">
            <h3>Faults Status</h3>
          </div>

        <!--lnb fault status-->
          <div class="container_1">
            <div class="bg-dark text-white p-4">

              <p> LNB-1 Current Fault: <span class="square1"></span></p>
              <p> LNB-2 Current Fault: <span class="square2"></span></p>
              <p> Power fault: <span class="square3"></span></p>

            </div>
          </div>

        </div>

        


        <div class="col-sm-8 col-md-4 border p-4">

          <div class="bg-info text-white p-2 mb-2">
            <h3>LNB Position Status</h3>
          </div>

        <!-- LNB position status-->
          <div class="container_3">
            <div class="bg-dark text-white p-3">

              <p> LNB-1 Position: <span class="square_4"></span></p>
              <p> LNB-2 Position: <span class="square_5"></span></p>

            </div>
          </div>

        </div>

    </div>
</div>

<div class="container_b3">
    <div class="row justify-content-center">

        <div class="col-sm-8 col-md-4 border p-4">

          <div class="bg-info text-white p-2 mb-2">
            <h3>Operation Mode Status</h3>
          </div>

        <!--Operation mode states-->
          <div class="container_5">
            <div class="bg-dark text-white p-3">

              <p> Automatic Mode: <span class="square6"></span></p>
              <p> Manual Mode: <span class="square7"></span></p>

            </div>
          </div>

        </div>


         
        <div class="col-sm-8 col-md-4 border p-4">
          <div class="bg-warning text-white p-1 mb-2">
            <h3>Active Device and Operation Mode Selection</h3>
          </div>
          <!-- Active Device Selection and Operation Mode Selection-->
          <div class="container_4">
            <div class="bg-light text-black p-3">
              <form method="POST">
                <label for="dropdown1">Select LNB:</label>
                <select id="dropdown1" name="value1">
                  <option value="LNB 1">LNB-1</option>
                  <option value="LNB 2">LNB-2</option>

                  <input type="submit" class="btn btn-primary mt-2" value="Submit">
                </select>

              </form>
              <form method="POST">
                <label for="dropdown2">Select Mode:</label>
                <select id="dropdown2" name="value2">
                  <option value="Automatic Mode">Automatic Mode</option>
                  <option value="Manual Mode">Manual Mode</option>

                  <input type="submit" class="btn btn-primary mt-2" value="Submit">
                </select>
              </form>

            </div>
          </div>
        </div>



    </div>
</div>







<script>
    includeHTML();
</script>



</body>
</html>

