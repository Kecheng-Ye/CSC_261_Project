<?php
$server = "localhost";
$user = "kguo";
$pwd = "17417174"
$db = "kguo_1"

$conn = new mysqli($server, $user, $password, $db);

if($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql_select = "SELECT * FROM Channel";
$res = $conn->query($sql_select);
while($row = $res->fetch_assoc()) {
	echo "Channel_ID: " . $row["id"] . "	Name: " . $row["Title"] . "	Joined since: " . $row["Release_date"] . "<br>";
}
?>
