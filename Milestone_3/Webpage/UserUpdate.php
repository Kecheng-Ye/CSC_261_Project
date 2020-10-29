<!DOCTYPE html>
<html>
<body>

<?php

$server = "localhost";
$user = "kguo";
$pwd = "17417174";
$db = "xmin2_1";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
   die("Connection failed: ". $conn->connect_error);
}

$sql = "update Users set first_name='$first_name', last_name='$last_name', password='$password', where username='$username'";

if ($conn->query($sql) === TRUE) {
	echo "Records updated: ".$username."-".$first_name."-".$last_name."-".$password;
} else {
	echo "Error: ".$sql."<br>".$conn->error;
}

$conn->close();

?>

</body>
</html>
