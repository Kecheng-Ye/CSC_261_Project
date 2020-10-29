<?php
$server = "localhost";
$user = "kguo";
$pwd = "17417174"
$db = "kguo_1"

$conn = new mysqli_connect($server, $user, $pwd, $db);
if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}
$sql_select = "SELECT * FROM Subscribe";
if($res = $conn->query($sql_select)) {                                                                                          while($row = $res->fetch_assoc()) {
        	echo "User: " . $row["User_name"] . "    Channel ID: " . $row["Channel_id"] . "  Start date: " . $row["Start_date"] . "<br>";
	}
}

mysqli_close($conn)                                                                                                     ?> 
