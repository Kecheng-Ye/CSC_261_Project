<!DOCTYPE html>
<html>
<body>

<?php
$server = "localhost";
$user = "kguo";
$pwd = "17417174";
$db = "kguo_1";

$conn = new mysqli($server, $user, $pwd, $db);
$cid = $_POST['cid'];

if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM Channel WHERE id='$cid'";

if ($conn->query($sql)) {
  echo "Channel deleted successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>

<br>
<a href="./admin_interface.php">go back to admin page</a>
</body>
</html>
