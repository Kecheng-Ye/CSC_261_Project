<?php
$server = "localhost";
$user = "kguo";
$pwd = "17417174";
$db = "kguo_1";

$conn = new mysqli_connect($server, $user, $pwd, $db);

if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}
else print "<br>Connection OK!";

$sql_select = "SELECT * FROM Video";
if($res = $conn->query($sql_select)) {
	while($row = $res->fetch_assoc()) {
		echo "Video ID: " . $row["id"] . "    Title: " . $row["Title"] . "  Channel_ID: " . $row["Channel id"] . "    Publish date: " . $row["Publish_date"] . "        Views: " . $row["Views"] . "<br>";
	}
}

mysqli_close($conn)
?>
