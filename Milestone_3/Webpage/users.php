<?php
$server = "localhost";
$user = "kguo";
$pwd = "17417174";
$db = "kguo_1";

$conn = new mysqli_connect($server, $user, $pwd, $db);

if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}

$sql_select = "SELECT * FROM User";
if($res = $conn->query($sql_select)) {
        while($row = $res->fetch_assoc()) {
       		echo "Username: " . $row["name"] . "    First name: " . $row["First_name"] . "  Last name: " . $row["Last_name"] . "    Password: " . $row["password"] . "<br>"; 
	}
}

mysqli_close($conn)
?>
