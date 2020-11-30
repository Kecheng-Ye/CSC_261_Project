<!DOCTYPE html>
<html>
<body>

<?php

include "../utils.php";
$uid = $_POST['uid'];

$sql = "DELETE FROM User WHERE name='$uid'";

if ($conn->query($sql)) {
  echo "User deleted successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>

<br>
<a href="./admin_interface.php">go back to admin page</a>
</body>
</html>
