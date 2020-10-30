<?php

$video_id = $_POST['video_id'];
$title = $_POST['title'];
$channel_id = $_POST['channel_id'];
$publish_date = $_POST['publish_date'];
$views = $_POST['views'];

$server = "localhost";
$user = "kguo";
$pwd = "17417174";
$db = "kguo_1";

$conn = new mysqli($server, $user, $pwd, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "insert into videos(video_id,title,channel_id,publish_date,views) values('$video_id','$title','$channel_id','$publish_date','$views')";

if ($conn->query($sql) === TRUE) {
	echo "ADDED: ".$video_id.", ".$title.", ".$channel_id", ".$publish_date", ".$views;
} else {
	echo "Error: ".$sql."<br>".$conn->error;
}

$conn->close();

?>
