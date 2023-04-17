<!DOCTYPE html>
<html>
<head>
    <title>Dropdown Example</title>
    <style>
        .container {
            background-color: blue;
            padding: 20px;
            color: white;
        }

        select option:checked {
            background-color: lightblue;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Dropdown Example</h1>
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

    </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $value1 = $_POST["value1"];
    $value2 = $_POST["value2"];

    echo "<br>Selected LNB: <span style='background-color: lightblue;'>" . $value1 . "</span>";
    echo "<br>Selected Mode: <span style='background-color: lightblue;'>" . $value2 . "</span>";

    if($value1=="LNB 1") {
        echo "<br>manish";
    } elseif($value1=="LNB 2") {
        echo "<br>Parmar";
    }

    if($value2=="Automatic Mode") {
        echo "<br>manish1";
    } elseif($value2=="Manual Mode") {
        echo "<br>Parmar1";
    }               
}
?>
