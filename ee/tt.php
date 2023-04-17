<!DOCTYPE html>
<html>
<head>
	<title>Dropdown Example</title>
</head>
<body>
	<form method="POST">
		<label for="dropdown1">Select LNB:</label>
		<select id="dropdown1" name="value1">
			<option value="LNB 1">LNB-1</option>
			<option value="LNB 2">LNB 2</option>
		</select>

		<label for="dropdown2">Select Mode:</label>
		<select id="dropdown2" name="value2">
			<option value="Automatic Mode">Automatic Mode</option>
			<option value="Manual Mode">Manual Mode</option>
		</select>

		<input type="submit" value="Submit">
	</form>

	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$value1 = $_POST["value1"];
		$value2 = $_POST["value2"];

		echo "Selected LNB: " . $value1 . "<br>";
		echo "Selected Mode: " . $value2 . "<br>";


		if($value1=="LNB 1")
		{
    			echo "manish";
		}elseif($value1=="LNB 2")
		{
			echo "Parmar <br>";
		}

		
		if($value2=="Automatic Mode")
                {
                        echo "manish1";
                }elseif($value2=="Manual Mode")
                {
                        echo "Parmar1";
                }		


	}
	?>
</body>
</html>

