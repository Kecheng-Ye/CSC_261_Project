<!DOCTYPE html>
<html>
<body>

<?php

$vid = $_POST["vid"];
$title = $_POST["title"];
$cid = $_POST["cid"];
$pdate = date('Y-m-d', strtotime($_POST["pdate"]));
$view = $_POST["view"];

$server = "localhost";
$user = "kguo";
$pwd = "17417174";
$db = "kguo_1";

$conn = new mysqli($server, $user, $pwd, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "INSERT INTO Video (id, Title, Channel_ID, Publish_date, Views) VALUES ('$vid', '$title', '$cid', '$pdate', '$view')";

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
