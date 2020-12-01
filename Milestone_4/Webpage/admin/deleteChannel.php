<!DOCTYPE html>
<html>
<body>

<?php
include "utils.php";
$cid = $_POST['cid'];

$sql = "DELETE FROM Channel WHERE id='$cid'";

if ($conn->query($sql)) {
  echo "Channel deleted successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>

<br><br>
<a href="./admin_interface.php">Back to admin page</a>
</body>
</html>
