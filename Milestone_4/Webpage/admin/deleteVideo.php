<!DOCTYPE html>
<html>
<body>

<?php
include "../utils.php";
$vid = $_POST['vid'];

$sql = "DELETE FROM Video WHERE id='$vid'";

if ($conn->query($sql)) {
  echo "Video deleted successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>

<br><br>
<a href="./admin_interface.php">Back to admin page</a>
</body>
</html>
