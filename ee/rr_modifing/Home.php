<?php
include('session.php');
//=========================sensor=====================
$hum=shell_exec("/var/www/html/lokesh/hum_val.sh");
$temp=shell_exec("/var/www/html/lokesh/temp_val.sh");
$alarm=shell_exec("/var/www/html/lokesh/alarmdata.sh");
$alarm2 = (int)$alarm;
if($alarm=2==2)
{
$text="NORMAL";
$coloralarm="#00ff00";
}else
{
$text="OVER TEMPERATURE";
$coloralarm="#ff0000";
}

//===================output===========================
//======================1===========================
$val=shell_exec("gpio -x mcp23017:100:0x20:1 read 115");
if($val==0)
{
$color1="#4CAF50";
$color2="#bababa";
}elseif($val==1)
{
$color1="#bababa";
$color2="#f44336";
}
//=====================2==============================
$val=shell_exec("gpio -x mcp23017:100:0x20:1 read 114");
if($val==0)
{
$color3="#4CAF50";
$color4="#bababa";
}elseif($val==1)
{
$color3="#bababa";
$color4="#f44336";
}
//=====================3===============================
$val=shell_exec("gpio -x mcp23017:100:0x20:1 read 113");
if($val==0)
{
$color5="#4CAF50";
$color6="#bababa";
}elseif($val==1)
{
$color5="#bababa";
$color6="#f44336";
}

//=====================4===============================
$val=shell_exec("gpio -x mcp23017:100:0x20:1 read 112");
if($val==0)
{
$color7="#4CAF50";
$color8="#bababa";
}elseif($val==1)
{
$color7="#bababa";
$color8="#f44336";
}

//=====================5===============================
$val=shell_exec("gpio -x mcp23017:100:0x21:1 read 111");
if($val==0)
{
$color9="#4CAF50";
$color10="#bababa";
}elseif($val==1)
{
$color9="#bababa";
$color10="#f44336";
}

//=====================6===============================
$val=shell_exec("gpio -x mcp23017:100:0x21:1 read 110");
if($val==0)
{
$color11="#4CAF50";
$color12="#bababa";
}elseif($val==1)
{
$color11="#bababa";
$color12="#f44336";
}

//=====================7===============================
$val=shell_exec("gpio -x mcp23017:100:0x21:1 read 109");
if($val==0)
{
$color13="#4CAF50";
$color14="#bababa";
}elseif($val==1)
{
$color13="#bababa";
$color14="#f44336";
}

//=====================8===============================
$val=shell_exec("gpio -x mcp23017:100:0x21:1 read 108");
if($val==0)
{
$color15="#4CAF50";
$color16="#bababa";
}elseif($val==1)
{
$color15="#bababa";
$color16="#f44336";
}

//=====================9===============================
$val=shell_exec("gpio -x mcp23017:100:0x21:1 read 107");
if($val==0)
{
$color17="#4CAF50";
$color18="#bababa";
}elseif($val==1)
{
$color17="#bababa";
$color18="#f44336";
}

//=====================10===============================
$val=shell_exec("gpio -x mcp23017:100:0x21:1 read 106");
if($val==0)
{
$color19="#4CAF50";
$color20="#bababa";
}elseif($val==1)
{
$color19="#bababa";
$color20="#f44336";
}

//=====================11===============================
$val=shell_exec("gpio -x mcp23017:100:0x21:1 read 105");
if($val==0)
{
$color21="#4CAF50";
$color22="#bababa";
}elseif($val==1)
{
$color21="#bababa";
$color22="#f44336";
}

//=====================12===============================
$val=shell_exec("gpio -x mcp23017:100:0x21:1 read 104");
if($val==0)
{
$color23="#4CAF50";
$color24="#bababa";
}elseif($val==1)
{
$color23="#bababa";
$color24="#f44336";
}









//============================post===============================================
if($_SERVER["REQUEST_METHOD"] == "POST") 
{
//echo "abc";






//==================================fuse status change=============================






//============================================20 OUTPUT color & status change=====================

//===========1================
if(isset($_POST["select1"])){
if($_POST['select1']=='1'){
shell_exec("gpio -x mcp23017:100:0x20:1 write 115 1");
shell_exec("sleep 0.2");
shell_exec("gpio -x mcp23017:100:0x20:1 write 115 0");
//exec("sudo python /var/www/html/lokesh/oneon.py");

$color1="#4CAF50";
$color2="#bababa";

}
if($_POST['select1']=='0'){
shell_exec("gpio -x mcp23017:100:0x20:1 write 114 1");
shell_exec("sleep 0.2");
shell_exec("gpio -x mcp23017:100:0x20:1 write 114 0");
//exec("sudo python /var/www/html/lokesh/oneoff.py");

$color1="#bababa";
$color2="#f44336";

}
}

//===========2===============
if(isset($_POST["select2"])){
if($_POST['select2']=='1'){
shell_exec("gpio -x mcp23017:100:0x20:1 write 113 1");
shell_exec("sleep 0.2");
shell_exec("gpio -x mcp23017:100:0x20:1 write 113 0");
$color3="#4CAF50";
$color4="#bababa";
}
if($_POST['select2']=='0'){
shell_exec("gpio -x mcp23017:100:0x20:1 write 112 1");
shell_exec("sleep 0.2");
shell_exec("gpio -x mcp23017:100:0x20:1 write 112 0");
$color3="#bababa";
$color4="#f44336";
}
}
//===========3===============
if(isset($_POST["select3"])){
if($_POST['select3']=='1'){
shell_exec("gpio -x mcp23017:100:0x20:1 write 111 1");
shell_exec("sleep 0.2");
shell_exec("gpio -x mcp23017:100:0x20:1 write 111 0");
$color5="#4CAF50";
$color6="#bababa";
}
if($_POST['select3']=='0'){
shell_exec("gpio -x mcp23017:100:0x20:1 write 110 1");
shell_exec("sleep 0.2");
shell_exec("gpio -x mcp23017:100:0x20:1 write 110 0");
$color5="#bababa";
$color6="#f44336";
}
}
//===========4===============
if(isset($_POST["select4"])){
if($_POST['select4']=='1'){
shell_exec("gpio -x mcp23017:100:0x20:1 write 109 1");
shell_exec("sleep 0.2");
shell_exec("gpio -x mcp23017:100:0x20:1 write 109 0");
$color7="#4CAF50";
$color8="#bababa";
}
if($_POST['select4']=='0'){
shell_exec("gpio -x mcp23017:100:0x20:1 write 108 1");
shell_exec("sleep 0.2");
shell_exec("gpio -x mcp23017:100:0x20:1 write 108 0");
$color7="#bababa";
$color8="#f44336";
}
}
//===========5===============
if(isset($_POST["select5"])){
if($_POST['select5']=='1'){
shell_exec("gpio -x mcp23017:100:0x20:1 write 107 1");
shell_exec("sleep 0.2");
shell_exec("gpio -x mcp23017:100:0x20:1 write 107 0");
$color9="#4CAF50";
$color10="#bababa";
}
if($_POST['select5']=='0'){
shell_exec("gpio -x mcp23017:100:0x20:1 write 106 1");
shell_exec("sleep 0.2");
shell_exec("gpio -x mcp23017:100:0x20:1 write 106 0");
$color9="#bababa";
$color10="#f44336";
}
}
//===========6===============
if(isset($_POST["select6"])){
if($_POST['select6']=='1'){
shell_exec("gpio -x mcp23017:100:0x20:1 write 105 1");
shell_exec("sleep 0.2");
shell_exec("gpio -x mcp23017:100:0x20:1 write 105 0");
$color11="#4CAF50";
$color12="#bababa";
}
if($_POST['select6']=='0'){
shell_exec("gpio -x mcp23017:100:0x20:1 write 104 1");
shell_exec("sleep 0.2");
shell_exec("gpio -x mcp23017:100:0x20:1 write 104 0");
$color11="#bababa";
$color12="#f44336";
}
}
//===========7===============
if(isset($_POST["select7"])){
if($_POST['select7']=='1'){
shell_exec("gpio -x mcp23017:100:0x20:1 write 103 1");
shell_exec("sleep 0.2");
shell_exec("gpio -x mcp23017:100:0x20:1 write 103 0");
$color13="#4CAF50";
$color14="#bababa";
}
if($_POST['select7']=='0'){
shell_exec("gpio -x mcp23017:100:0x20:1 write 102 1");
shell_exec("sleep 0.2");
shell_exec("gpio -x mcp23017:100:0x20:1 write 102 0");
$color13="#bababa";
$color14="#f44336";
}
}
//===========8===============
if(isset($_POST["select8"])){
if($_POST['select8']=='1'){
shell_exec("gpio -x mcp23017:100:0x20:1 write 101 1");
shell_exec("sleep 0.2");
shell_exec("gpio -x mcp23017:100:0x20:1 write 101 0");
$color15="#4CAF50";
$color16="#bababa";
}
if($_POST['select8']=='0'){
shell_exec("gpio -x mcp23017:100:0x20:1 write 100 1");
shell_exec("sleep 0.2");
shell_exec("gpio -x mcp23017:100:0x20:1 write 100 0");
$color15="#bababa";
$color16="#f44336";
}
}
//===========9===============
if(isset($_POST["select9"])){
if($_POST['select9']=='1'){
shell_exec("gpio -x mcp23017:100:0x21:1 write 115 1");
shell_exec("sleep 0.2");
shell_exec("gpio -x mcp23017:100:0x21:1 write 115 0");
$color17="#4CAF50";
$color18="#bababa";
}
if($_POST['select9']=='0'){
shell_exec("gpio -x mcp23017:100:0x21:1 write 114 1");
shell_exec("sleep 0.2");
shell_exec("gpio -x mcp23017:100:0x21:1 write 114 0");

$color17="#bababa";
$color18="#f44336";
}
}
//===========10===============
if(isset($_POST["select10"])){
if($_POST['select10']=='1'){
shell_exec("gpio -x mcp23017:100:0x21:1 write 113 1");
shell_exec("sleep 0.2");
shell_exec("gpio -x mcp23017:100:0x21:1 write 113 0");
$color19="#4CAF50";
$color20="#bababa";
}
if($_POST['select10']=='0'){
shell_exec("gpio -x mcp23017:100:0x21:1 write 112 1");
shell_exec("sleep 0.2");
shell_exec("gpio -x mcp23017:100:0x21:1 write 112 0");
$color19="#bababa";
$color20="#f44336";
}
}
//===========11===============
if(isset($_POST["select11"])){
if($_POST['select11']=='1'){
shell_exec("gpio -x mcp23017:100:0x21:1 write 111 1");
shell_exec("sleep 0.2");
shell_exec("gpio -x mcp23017:100:0x21:1 write 111 0");
$color21="#4CAF50";
$color22="#bababa";
}
if($_POST['select11']=='0'){
shell_exec("gpio -x mcp23017:100:0x21:1 write 110 1");
shell_exec("sleep 0.2");
shell_exec("gpio -x mcp23017:100:0x21:1 write 110 0");
$color21="#bababa";
$color22="#f44336";
}
}
//===========12===============
if(isset($_POST["select12"])){
if($_POST['select12']=='1'){
shell_exec("gpio -x mcp23017:100:0x21:1 write 109 1");
shell_exec("sleep 0.2");
shell_exec("gpio -x mcp23017:100:0x21:1 write 109 0");
$color23="#4CAF50";
$color24="#bababa";
}
if($_POST['select12']=='0'){
shell_exec("gpio -x mcp23017:100:0x21:1 write 108 1");
shell_exec("sleep 0.2");
shell_exec("gpio -x mcp23017:100:0x21:1 write 108 0");
$color23="#bababa";
$color24="#f44336";
}
}




}






?>






<html>
<head>
	<meta http-equiv="refresh" content="5">
      <title>Dashboard- Intelligent PDU</title>

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
.button2 {background-color: <?=$color2?>;}
.button3 {background-color: <?=$color3?>;}
.button4 {background-color: <?=$color4?>;}
.button5 {background-color: <?=$color5?>;}
.button6 {background-color: <?=$color6?>;}
.button7 {background-color: <?=$color7?>;}
.button8 {background-color: <?=$color8?>;}
.button9 {background-color: <?=$color9?>;}
.button10 {background-color: <?=$color10?>;}
.button11 {background-color: <?=$color11?>;}
.button12 {background-color: <?=$color12?>;}
.button13 {background-color: <?=$color13?>;}
.button14 {background-color: <?=$color14?>;}
.button15 {background-color: <?=$color15?>;}
.button16 {background-color: <?=$color16?>;}
.button17 {background-color: <?=$color17?>;}
.button18 {background-color: <?=$color18?>;}
.button19 {background-color: <?=$color19?>;}
.button20 {background-color: <?=$color20?>;}
.button21 {background-color: <?=$color21?>;}
.button22 {background-color: <?=$color22?>;}
.button23 {background-color: <?=$color23?>;}
.button24 {background-color: <?=$color24?>;}
.button25 {background-color: <?=$color25?>;}
.button26 {background-color: <?=$color26?>;}
.button27 {background-color: <?=$color27?>;}
.button28 {background-color: <?=$color28?>;}
.button29 {background-color: <?=$color29?>;}
.button30 {background-color: <?=$color30?>;}
.button31 {background-color: <?=$color31?>;}
.button32 {background-color: <?=$color32?>;}
.button33 {background-color: <?=$color33?>;}
.button34 {background-color: <?=$color34?>;}
.button35 {background-color: <?=$color35?>;}
.button36 {background-color: <?=$color36?>;}
.button37 {background-color: <?=$color37?>;}
.button38 {background-color: <?=$color38?>;}
.button39 {background-color: <?=$color39?>;}
.button40 {background-color: <?=$color40?>;}
.button41 {background-color: <?=$coloralarm?>;}
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
label {
    margin-right: 20px;
}
.label1{margin-right: 50px;}
</style>
</head>

<div align="center">
<img src="Webpage_header_sPDU.png" alt="logo" style="width:1350px;height:72px;"></div>



  <div style = "background-color:#006361; color:#FFFFFF;">
<form method="get" action="Home.php">
    <button class="button1 buttondef" style="height:30px;width:180px;" type="submit">Home</button></form>
<form method="get" action="change_password.php">
    <button class="button1 buttondef" style="height:30px;width:180px;" type="submit">Change Password</button> </form>
<form method="get" action="TRAP_Server_Setup.php">
    <button class="button1 buttondef" style="height:30px;width:180px;" type="submit">TRAP Server Setup</button></form>
<form method="get" action="Intelligent_MDU_Setup.php">
    <button class="button1 buttondef" style="height:30px;width:180px;" type="submit">Intelligent MDU Setup</button></form>
<form method="get" action="Temp_Alarm.php">
    <button class="button1 buttondef" style="height:30px;width:180px;" type="submit">Temp & Hum Alarm Setup</button></form>
<form method="get" action="logout.php">
    <button  class="button1 buttondef" style="height:30px;width:180px;" type="submit">logout</button></form>
</div>
</div>
<br />

<div align="center">
<div style = "background-color:#939191; width:600px; border: solid 2px #333333; padding:5px; " align = "center">

<div>
  <label><b>Temperature (C):</b></label>
  <input style="width:40px;" value=<?php echo $temp; ?>>
  <label><b>Humidity (%):</b></label>
  <input style = "width:40px;" value=<?php echo $hum; ?>>
  <label><b>ALERT:</b></label>
  <input  class="button41" style = "width:150px;" value=<?php echo $text; ?>>
  </div>
</div>
</div><br>
<div align = "center">
         <div style = "width:350px; border: solid 2px #333333; " align = "center">
		<div style = "background-color:#333333; color:#FFFFFF; padding:5px;"><b>Output Control</b></div>
		<div style = "margin:35px">



<form action = "" method = "post">


<div align="left">
OUTPUT 01:
<button  class="button1 "name="select1" value='1' style="height:25px;width:35px" type="submit" id="buttonon_1">on</button><!--
   --><button class="button1 button2" name="select1" value='0' style="height:25px;width:35px" type="submit" id="buttonoff_1">off</button> 
</div>



<div align="left">
OUTPUT 02:
<button class="button1 button3" name="select2" value='1' style="height:25px;width:35px" type="submit" id="buttonon_1">on</button><!--
   --><button class="button1 button4" name="select2" value='0' style="height:25px;width:35px" type="submit" id="buttonoff_1">off</button>
</div>


<div align="left">
OUTPUT 03:
<button class="button1 button5" name="select3" value='1' style="height:25px;width:35px" type="submit" id="buttonon_1">on</button><!--
   --><button class="button1 button6" name="select3" value='0' style="height:25px;width:35px" type="submit" id="buttonoff_1">off</button>
</div>

<div align="left">
OUTPUT 04:
<button class="button1 button7" name="select4" value='1' style="height:25px;width:35px" type="submit" id="buttonon_1">on</button><!--
   --><button class="button1 button8" name="select4" value='0' style="height:25px;width:35px" type="submit" id="buttonoff_1">off</button>
</div>

<div align="left">
OUTPUT 05:
<button class="button1 button9" name="select5" value='1' style="height:25px;width:35px" type="submit" id="buttonon_1">on</button><!--
   --><button class="button1 button10" name="select5" value='0' style="height:25px;width:35px" type="submit" id="buttonoff_1">off</button>
</div>

<div align="left">
OUTPUT 06:
<button class="button1 button11" name="select6" value='1' style="height:25px;width:35px" type="submit" id="buttonon_1">on</button><!--
   --><button class="button1 button12" name="select6" value='0' style="height:25px;width:35px" type="submit" id="buttonoff_1">off</button>
</div>

<div align="left">
OUTPUT 07:
<button class="button1 button13" name="select7" value='1' style="height:25px;width:35px" type="submit" id="buttonon_1">on</button><!--
   --><button class="button1 button14" name="select7" value='0' style="height:25px;width:35px" type="submit" id="buttonoff_1">off</button>
</div>

<div align="left">
OUTPUT 08:
<button class="button1 button15" name="select8" value='1' style="height:25px;width:35px" type="submit" id="buttonon_1">on</button><!--
   --><button class="button1 button16" name="select8" value='0' style="height:25px;width:35px" type="submit" id="buttonoff_1">off</button>
</div>

<div align="left">
OUTPUT 09:
<button class="button1 button17" name="select9" value='1' style="height:25px;width:35px" type="submit" id="buttonon_1">on</button><!--
   --><button class="button1 button18" name="select9" value='0' style="height:25px;width:35px" type="submit" id="buttonoff_1">off</button>
</div>

<div align="left">
OUTPUT 10:
<button class="button1 button19" name="select10" value='1' style="height:25px;width:35px" type="submit" id="buttonon_1">on</button><!--
   --><button class="button1 button20" name="select10" value='0' style="height:25px;width:35px" type="submit" id="buttonoff_1">off</button>
</div>

<div align="left">
OUTPUT  11:
<button class="button1 button21" name="select11" value='1' style="height:25px;width:35px" type="submit" id="buttonon_1">on</button><!--
   --><button class="button1 button22" name="select11" value='0' style="height:25px;width:35px" type="submit" id="buttonoff_1">off</button>
</div>

<div align="left">
OUTPUT 12:
<button class="button1 button23" name="select12" value='1' style="height:25px;width:35px" type="submit" id="buttonon_1">on</button><!--
   --><button class="button1 button24" name="select12" value='0' style="height:25px;width:35px" type="submit" id="buttonoff_1">off</button>
</div>

</div>
</div>
</form>
<div style = "position:fixed;left:20px;bottom:2px;">
<p2>© DDSat Technologies Private Limited , Ghaziabad<p2>
</body>
</html>
