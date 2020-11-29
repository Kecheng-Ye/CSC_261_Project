<!DOCTYPE html>
<html>
<body>

<?php

$cid = $_POST["cid"];
$title = $_POST["title"];
$rdate = date('Y-m-d', strtotime($_POST["rdate"]));

$server = "localhost";
$user = "kguo";
$pwd = "17417174";
$db = "kguo_1";

$conn = new mysqli($server, $user, $pwd, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "INSERT INTO Channel (id, Title, Release_date) VALUES ('$cid', '$title', '$rdate')";

if ($conn->query($sql)) {
	echo "Records added";
} else {
	echo "Error: ".$sql."<br>".$conn->error;
}

$conn->close();

?>

<br>
<a href="./admin_interface.php">go back to admin page</a>

</body>
</html>
