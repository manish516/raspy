<?php
include('session.php');







//===================fault input read===========================
//======================LNB-1 fault status===========================
$val=shell_exec( "gpio -x mcp23017:100:0x20:1 read 106");  //A6
if($val==1)
{
    $color1="#f44336"; //red 
}elseif($val==0)
{
    $color1="#4CAF50"; //green
}
///=====================LNB-2 fault status==============================
$val=shell_exec("gpio -x mcp23017:100:0x20:1 read 107");   //A7
if($val==1)
{

    $color2="#f44336"; 
}elseif($val==0)
{
    $color2="#4CAF50";
}
//=====================Power faults===============================
$val=shell_exec("gpio -x mcp23017:100:0x20:1 read 113");   //XX
if($val==1)
{
    $color3="#f44336"; 
}elseif($val==0)
{
    $color3="#4CAF50";
}



//===================LNB postion input read===========================
//======================LNB-1 postion status===========================
$val=shell_exec( "gpio -x mcp23017:100:0x20:1 read 105");  //A5
if($val==1)
{
    $color4="#f47536"; //orange //ofline --> but not faulty 
}elseif($val==0)
{
    $color4="#4CAF50"; //green
}
///=====================LNB-2 postion status==============================
$val=shell_exec("gpio -x mcp23017:100:0x20:1 read 104");   //A4
if($val==1)
{

    $color5="#f47536"; //orange //ofline --> but not faulty 
}elseif($val==0)
{
    $color5="#4CAF50"; //green
}


if($_SERVER["REQUEST_METHOD"] == "POST") 
{



//=====drop-down LNB selector======

      // Handle form submission
      if (isset($_POST['selectText'])) {
        $selectedValue = $_POST['selectText'];
        if ($selectedValue === "text1") {
          $text = "LNB 1";

	  $text_a = "LNB 2";  //del

	  //--shell_exec("gpio -x mcp23017:100:0x20:1 write 113 1");   //B5
          //shell_exec("sleep 0.2");

	  //--shell_exec("gpio -x mcp23017:100:0x20:1 write 115 1");   //B7
          //shell_exec("sleep 0.2");
          
        } else if ($selectedValue === "text2") {
	  
	  $text = "LNB 2";	

	  $text_a = "LNB 1";   //del
	  
	  //--shell_exec("gpio -x mcp23017:100:0x20:1 write 112 1");  //B4
          //shell_exec("sleep 0.2");
          
	  //--shell_exec("gpio -x mcp23017:100:0x20:1 write 114 1");  //B6
          //shell_exec("sleep 0.2"); 

      




        }
      }


//====== Operation Mode Status
  if (isset($_POST['selectTextBB'])) {
    $selectedValueBB = $_POST['selectTextBB'];
    if ($selectedValueBB === "text11") {
       $text_b = "Automatic Mode";

     //shell_exec("gpio -x mcp23017:100:0x20:1 write 113 1");   //B5
     //shell_exec("sleep 0.2");

     //shell_exec("gpio -x mcp23017:100:0x20:1 write 115 1");   //B7
     //shell_exec("sleep 0.2");
          
    } else if ($selectedValueBB === "text22") {
          
       $text_b = "Manual Mode";      

            //shell_exec("gpio -x mcp23017:100:0x20:1 write 112 1");  //B4
            //shell_exec("sleep 0.2");
          
            //shell_exec("gpio -x mcp23017:100:0x20:1 write 114 1");  //B6
            //shell_exec("sleep 0.2"); 

    }
  }





}






?>




<html>
<head>
	<title>Triangle Color Change</title>
	<style>
	


//===== LNB Fault status
.container {
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
        background-color: lightblue;
        margin: 0;
      }
      .square {
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




//=======2a --> drop-down selection
.container {
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

//=====3a --> LNB position

.container {
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
        background-color: lightblue;
        margin: 0;
      }
      .square4 {
        display: inline-block;
        width: 15px;
        height: 15px;
        background-color: <?=$color4?>;
        margin-left: 10px;
      }

    .square5 {
        display: inline-block;
        width: 15px;
        height: 15px;
        background-color: <?=$color5?>;
        margin-left: 10px;
      }



//===== Operation mode status
.containerBB {
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
      #text11 {
        background-color: grey;
        margin: 0;
        display: inline-block;
        padding: 10px;
      }
      #text22 {
        background-color: lightgrey;
        margin: 0;
        display: inline-block;
        padding: 10px;
      }
      #select1BB {
        margin-top: 20px;
      }



//======

	

	</style>
</head>
<body>

<div class="container">
      <h1> Faults Status </h1>
      <p> LNB 1 Current Fault: <span class="square"></span></p>
      <p> LNB 2 Current Fault: <span class="square2"></span></p>
      <p> Power Fault: <span class="square3"></span></p>
    </div>




	
    
<div class="container">
      <h1> Active Device Select/Status </h1>
      <div>
 	<p id="text2"> Active LNB : </p>
        <p id="text1"> <?php echo isset($text) ? $text : 'XXXX'; ?> </p>

	<p id="text2"> Standby LNB : </p>
        <p id="text1"> <?php echo isset($text_a) ? $text_a : 'XXXX'; ?> </p>

      </div>
      <div id="select1">
        <form method="post">
          <label for="selectText">Select LNB:</label>
          <select id="selectText" name="selectText" onchange="this.form.submit()">
            <option value="text1" <?php if (isset($selectedValue) && $selectedValue === 'text1') echo 'selected'; ?>>LNB 1</option>
            <option value="text2" <?php if (isset($selectedValue) && $selectedValue === 'text2') echo 'selected'; ?>>LNB 2</option>
          </select>
        </form>
      </div>
    </div>





    
<div class="container">
      <h1> LNB Position status</h1>
      <p> LNB 1 Position: <span class="square4"></span></p>
      <p> LNB 2 Position: <span class="square5"></span></p>
      
    </div>
    
    



<div class="containerBB">
      <h1> Operation Mode Select/Status </h1>
      <div>
        <p id="text22"> Operation Mode : </p>
        <p id="text11"> <?php echo isset($text_b) ? $text_b : 'XXXX'; ?> </p>

      </div>
      <div id="select1BB">
        <form method="post">
          <label for="selectTextBB">Select Operation Mode:</label>
          <select id="selectTextBB" name="selectTextBB" onchange="this.form.submit()">
            <option value="text11" <?php if (isset($selectedValueBB) && $selectedValueBB === 'text11') echo 'selected'; ?>>Automatic Mode</option>
            <option value="text22" <?php if (isset($selectedValueBB) && $selectedValueBB === 'text22') echo 'selected'; ?>>Manual Mode</option>
          </select>
        </form>
      </div>
    </div>





    

</body>
</html>
