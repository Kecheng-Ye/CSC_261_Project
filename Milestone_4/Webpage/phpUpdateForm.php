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
<?php
$name= $_POST["name"];

// $server = "localhost";
// $user = "kguo";
// $pwd = "17417174";
// $db = "kguo_1";

include "utils.php";
include "./styles/navibar_main.php";
$conn = new mysqli($server, $user, $pwd, $db);

if($conn->connect_error){
	die("Connection failed ".$conn->connect_error);
}

$sql = "select * from User where name='$name'";

$result = $conn->query($sql);

if ($result->num_rows > 0){

	$row = $result->fetch_assoc();

	$First_name = $row["First_name"];
	$Last_name = $row["Last_name"];
	$Password = $row["password"];

	echo

	"<html>
	<body>

	<form action='phpUpdateFormScript.php' method='post'>
	Name: $name<br>
	<input type='hidden' name='name' value='$name'>
	Firstname: <input type='text' name='First_name' value='$First_name'><br>
	Lastname: <input type='text' name='Last_name' value='$Last_name'><br>
	Password: <input type='text' name='Password' value='$Password'><br>
	<input type ='submit'>
	</form>

	</body>
	</html>";

	} else {
		echo "Not Found";
}
$conn->close();

?>
	
</body>


<div include-html="./styles/footer.html"></div>

 <script>
  includeHTML();
</script>

</html>
