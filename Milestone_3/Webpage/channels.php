<!DOCTYPE html>
<html>
<body>

<?php
$server = "localhost";
$user = "kguo";
$pwd = "17417174";
$db = "xmin2_1";
	
print "Testing connection with ".$db;
$conn = new mysqli_connect($server, $user, $pwd, $db);

if($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
else print "<br>Connection OK!";

$sql_select = "SELECT * FROM Channel";
if($res = $conn->query($sql_select)) {
	while($row = $res->fetch_assoc()) {
		echo "Channel_ID: " . $row["id"] . "	Name: " . $row["Title"] . "	Joined since: " . $row["Release_date"] . "<br>";
	}
}

mysqli_close($conn)
?>

</body>
</html>
