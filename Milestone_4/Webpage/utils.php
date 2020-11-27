<?php

$server = "localhost";
$user = "kguo";
$pwd = "17417174";
$db = "kguo_1";

$conn = new mysqli($server, $user, $pwd, $db);

if($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}


function db_query($query){
    global $conn;

    $result = array();
    if($res = $conn->query($query)) {
        while($row = $res->fetch_assoc()) {
            array_push($result, $row);
	    }
    }

    return $result;
}



?>