<?php

$name = $_POST["name"];
$First_name = $_POST["First_name"];
$Last_name = $_POST["Last_name"];
$Password = $_POST["Password"];

$server = "localhost";
$user = "kguo";
$pwd = "17417174";
$db = "kguo_1";

$conn = new mysqli($server, $user, $pwd, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "update User set First_name='$First_name', Last_name='$Last_name', Password='$Password' where name='$name'";

if ($conn->query($sql) === TRUE) {
	echo "Records updated: ".$name."-".$First_name."-".$Last_name."-".$Password;
} else {
	echo "Error: ".$sql."<br>".$conn->error;
}

$conn->close();

?>


<!DOCTYPE html>

<html>
<body>
<br>
<a href="./main.html">Return to main</a><br>	
</body>
</html>
