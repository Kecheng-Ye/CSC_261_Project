<?php
$server = "localhost";
$user = "kguo";
$pwd = "17417174"
$db = "kguo_1"

$conn = new mysqli($server, $user, $password, $db);

if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}

$sql_select = "SELECT * FROM likes";
$res = $conn->query($sql_select);
while($row = $res->fetch_assoc()) {
        echo "User: " . $row["User_name"] . "    Video ID: " . $row["Video_id"] . "  Comment: " . $row["Comment"] . "    Repeated views: " . $row["Repeated_views"] . "<br>";
}
?>
