<!DOCTYPE html>
<html>
<body>

<?php

include "../utils.php";
$cid = $_POST["cid"];
$title = $_POST["title"];
$rdate = date('Y-m-d', strtotime($_POST["rdate"]));

$sql = "INSERT INTO Channel (id, Title, Release_date) VALUES ('$cid', '$title', '$rdate')";

if ($conn->query($sql)) {
	echo "Records added";
} else {
	$error = $conn->error;
        if (strpos($error, "Duplicate entry") !== false) {
                echo "Channel ID already exists. Please check your input.";
        } else {
                echo $error;
        }
}

$conn->close();

?>

<br><br>
<a href="./admin_interface.php">go back to admin page</a>

</body>
</html>
