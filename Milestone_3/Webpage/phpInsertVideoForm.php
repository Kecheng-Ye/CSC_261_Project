<?php

$id= $_POST['id'];
$Title = $_POST['Title'];
$Channel_ID = $_POST['Channel id'];
$Publish_date = $_POST['Publish_date'];
$Views = $_POST['Views'];

$server = "localhost";
$user = "kguo";
$pwd = "17417174";
$db = "kguo_1";

$conn = new mysqli($server, $user, $pwd, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "insert into videos(video_id,title,channel_id,publish_date,views) values('$id','$Title','$Channel_ID','$Publish_date','$Views')";

if ($conn->query($sql) === TRUE) {
	echo "ADDED: ".$id.", ".$Title.", ".$Channel_ID", ".$Publish_date", ".$Views;
} else {
	echo "Error: ".$sql."<br>".$conn->error;
}

$conn->close();

?>
