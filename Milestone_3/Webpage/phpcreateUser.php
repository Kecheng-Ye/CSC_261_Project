<!DOCTYPE html>
<html>
<body>
	
<?php
$name= $_POST["name"];

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
      'VALUES ( '$name','$First_name','$Last_name', $Password )';

if ($conn->query($sql) === TRUE){



$name = $row["name"];
$First_name = $row["First_name"];
$Last_name = $row["Last_name"];
$Password = $row["password"];

echo

"<html>
<body>
<form action='phpUpdateFormScript.php' method='post'>
<input type='hidden' name='name' value='$name'>
name: <input type='text' name='name' value='$name'><br>
Firstname: <input type='text' name='First_name' value='$First_name'><br>
Lastname: <input type='text' name='Last_name' value='$Last_name'><br>
Password: <input type='text' name='Password' value='$Password'><br>
<input type ='submit'>
</form>
</body>
</html>";

} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>
	
</body>
</html>
