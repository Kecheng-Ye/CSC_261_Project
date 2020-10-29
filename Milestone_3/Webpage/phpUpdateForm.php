<?php
$name=abc123;

$server = "localhost";
$user = "kguo";
$pwd = "17417174";
$db = "xmin2_1";

$conn = new mysqli($servername, $username, $password, $db);

if($conn->connect_error){
	die("Connection failed ".$conn->connect_error);
}

$sql = "select * from students where name='$name'";

$result = $conn->query($sql);

if ($result->num_rows > 0){

$row = $result->fetch_assoc();

$First_name = $row["First_name"];
$Lastname = $row["Last_name"];
$Password = $row["Password"];

echo

"<html>
<body>

<form action='phpUpdateFormScript.php' method='post'>
Name: $name<br>
<input type='hidden' name='name' value='$name'>
Firstname: <input type='text' name='First_name' value='$First_name'><br>
Lastname: <input type='text' name='Last_name' value='$Last_name'><br>
<input type ='submit'>
</form>

</body>
</html>";

} else {
	echo "Not Found";
}
$conn->close();

?>
