<?php

$name = $_POST["name"];
$First_name = $_POST["First_name"];
$Last_name = $_POST["Last_name"];
$Password = $_POST["password"];

$server = "localhost";
$user = "kguo";
$pwd = "17417174";
$db = "xmin2_1";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "update users set First_name='$First_name', Last_name='$Last_name', Password='$Password' where name='$name'";

if ($conn->query($sql) === TRUE) {
	echo "Records updated: ".$name."-".$First_name."-".$Last_name."-".$password;
} else {
	echo "Error: ".$sql."<br>".$conn->error;
}

$conn->close();

?>
