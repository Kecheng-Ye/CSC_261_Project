<?php

$server = "localhost";
$user = "kguo";
$pwd = "17417174";
$db = "kguo_1";

$vid = $_POST['vid'];
$title = $_POST['title'];
$cid = $_POST['cid'];
$date = $_POST['date'];
$view = $_POST['view'];
	
$conn = new mysqli($server, $user, $pwd, $db);

if($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$insert = "INSERT INTO Video VALUES ('$vid', '$title', '$cid', '$date', '$view')";

if(mysqli_query($conn, $insert)) {
	echo "Video insertion completed.";
} else {
	echo 'ERROR: ' . mysqli_error($conn);
}

mysqli_close($conn);
?>
