<!DOCTYPE html>
<html>
<body>

<?php
include "../utils.php";
$vid = $_POST['vid'];

if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM Video WHERE id='$vid'";

if ($conn->query($sql)) {
  echo "Video deleted successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>

<br>
<a href="./admin_interface.php">go back to admin page</a>
</body>
</html>
