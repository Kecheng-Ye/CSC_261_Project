<!DOCTYPE html>
<html>
<body>
	
<?php
$name = $_POST["name"];
$First_name = $_POST["First_name"];
$Last_name = $_POST["Last_name"];
$Password = $_POST["Password"];

$server = "localhost";
$user = "kguo";
$pwd = "17417174";
$db = "kguo_1";

$conn = new mysqli($server, $user, $pwd, $db);

if($conn->connect_error){
	die("Connection failed ".$conn->connect_error);
}

$sql = 'INSERT INTO User '.
      '(name, First_name, Last_name, password) '.
      'VALUES ( '$name','$First_name','$Last_name', '$Password' )';


if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
	
</body>
</html>
