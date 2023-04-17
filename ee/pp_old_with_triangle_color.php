<?php









    //==================================fuse status change=============================






    //============================================20 OUTPUT color & status change=====================

    //===========1================
    if(isset($_POST["select1"])){
        if($_POST['select1']=='1'){
            echo "manish";
            $color1="#4CAF50";

        }
        if($_POST['select1']=='0'){
            echo "parmar";
            $color1="#bababa";

        }
    }




?>




<html>
<head>
	<title>Triangle Color Change</title>
	<style>
		/* Triangle Styles */
		.triangle {
			
                        position: absolute;
  top: 35%;
  left: 35%;
  transform: translate(50%, -50%) rotate(315deg);
                        
                        width: 0;
			height: 0;
			border-style: solid;
			border-width: 100px 0 100px 100px;
			border-color: transparent transparent <?=$color1?> transparent;
                        /* color:<?=$color1?>; */
                        
		}


.triangle2 {
                        
                        position: absolute;
  top: 65%;
  left: 35%;
  transform: translate(50%, -50%) rotate(315deg);
                        
                        width: 0;
                        height: 0;
                        border-style: solid;
                        border-width: 100px 0 100px 100px;
                        border-color: transparent transparent <?=$color1?> transparent;
                        /* color:<?=$color1?>; */
                        
                }


     .square {
    position: absolute;
    top: 110px;
    left: 320px;
    width: 600px;
    height: 600px;
    border: 5px solid black;
                }

.circle1 {
    position: absolute;
    top: 330px;
    left: 270px;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    border: 5px solid black;
  }

.circle2 {
    position: absolute;
    top: 20px;
    left: 20px;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    border: 5px solid black;
  }



 .line-arrow1 {
    position: absolute;
    top: 350px;
    left: 832px;
    width: 50px;
    height: 4px;
    background-color: green;
    transform: rotate(90deg);
  }
  .line-arrow1::before {
    content: "";
    position: absolute;
    top: -10px;
    right: -9;
    width: 0;
    height: 0;
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
    border-left: 10px solid green;
  }

.line-arrow2 {
    position: absolute;
    top: 550px;
    left: 832px;
    width: 50px;
    height: 4px;
    background-color: green;
    transform: rotate(270deg);
  }
  .line-arrow2::before {
    content: "";
    position: absolute;
    top: -10px;
    right: -9;
    width: 0;
    height: 0;
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
    border-left: 10px solid green;
  }







		/* Button Styles */
		button {
			font-size: 16px;
			padding: 8px 16px;
			background-color: #555;
			color: #fff;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}

		button:hover {
			background-color: #333;
		}

	

	</style>
</head>
<body>
	<div class="triangle"></div>
	
	<div class="triangle2"></div>
	
	<div class="square"></div>

<div class="circle1"></div>

<div class="circle2"></div>

<div class="line-arrow1"></div>

<div class="line-arrow2"></div>
	<br>
	
    
    
    <form action = "" method = "post">


<div align="left">
OUTPUT 01:
<button  class="button1 "name="select1" value='1' style="height:25px;width:35px" type="submit" id="green-btn">on</button><!--
   --><button class="button1 button2" name="select1" value='0' style="height:25px;width:35px" type="submit" id="red-btn">off</button> 
</div>

</form>
    
    
    
    
    
    
    

</body>
</html>
