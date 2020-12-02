<!DOCTYPE html>

<html>
<?php include "jscript/script.php"?>
	
<head>
  <div include-html="./styles/header.html"></div> 
  <title>Mini Youtube Database</title>
  <script>
	includeHTML();
  </script>
</head>
<body>
	<div include-html="./styles/navibar_main.php"></div>
<?php
include "utils.php";
	
$conn = new mysqli($server, $user, $pwd, $db);

if($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql_select = "SELECT * FROM Channel";
if($res = $conn->query($sql_select)) {
	while($row = $res->fetch_assoc()) {
		echo "Channel_ID: " . $row["id"] . "	Name: " . $row["Title"] . "	Joined since: " . $row["Release_date"] . "<br>";
	}
}

mysqli_close($conn);
?>
	
<div include-html="./styles/footer.html"></div>

 <script>
  includeHTML();
</script>

</body>
</html>
