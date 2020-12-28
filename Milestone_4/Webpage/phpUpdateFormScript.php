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
		<div include-html="./styles/navibar_main.php"></div>
	<body>


<?php

$name = $_POST["name"];
$First_name = $_POST["First_name"];
$Last_name = $_POST["Last_name"];
$Password = $_POST["Password"];

// $server = "localhost";
// $user = "kguo";
// $pwd = "17417174";
// $db = "kguo_1";

include "utils.php";

$conn = new mysqli($server, $user, $pwd, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "update User set First_name='$First_name', Last_name='$Last_name', Password='$Password' where name='$name'";

if ($conn->query($sql) === TRUE) {
	echo "Records updated: ".$name."-".$First_name."-".$Last_name."-".$Password;
} else {
	echo "Error: ".$sql."<br>".$conn->error;
}

$conn->close();

?>




</body>
</html>



	
<div include-html="./styles/footer.html"></div>

 <script>
  includeHTML();
</script>
<br>
<a href="./main.php">Return to main</a><br>	
</body>
</html>
