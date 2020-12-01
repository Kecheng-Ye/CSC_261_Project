<!DOCTYPE html>
<html>
<body>

<?php

include "../utils.php";
$vid = $_POST["vid"];
$title = $_POST["title"];
$cid = $_POST["cid"];
$pdate = date('Y-m-d', strtotime($_POST["pdate"]));
$view = $_POST["view"];

$insertion = "INSERT INTO Video (id, Title, Channel_ID, Publish_date, Views) VALUES ('$vid', '$title', '$cid', '$pdate', '$view')";
if ($conn->query($insertion)) {
	echo "Records added";
} else {
	$error = $conn->error;
	if (strpos($error, "Duplicate entry") !== false) {
		echo "Video ID already exists. Please check your input.";
	} elseif (strpos($error, "a foreign key constraint fails") !== false) {
		echo "Invalid channel ID. Please try again";
	} else {
		echo $error;
	} 
}

$conn->close();

?>

<br><br>
<a href="./admin_interface.php">Back to admin page</a>

</body>
</html>
