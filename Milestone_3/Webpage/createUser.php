<!DOCTYPE html>
<html>
<body>

<?php
$server = "localhost";
$user = "kguo";
$pwd = "17417174";
$db = "kguo_1";

$conn = new mysqli($server, $user, $pwd, $db);

if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}

// $sql = "INSERT INTO User (name, First_name, Last_name, password)
// VALUES ('dj','John', 'Doe', '12345')";
        
$sql = 'INSERT INTO User '.
      '(name, First_name, Last_name, password) '.
      'VALUES ( "dj", "John", "Doe", 12345 )';

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
?>

</body>
</html>
