   
<!DOCTYPE html>
<html>
	<?php include "./jscript/script.php"?>
	<head>
  <div include-html="./styles/header.html"></div> 
  <title>Mini Youtube Database</title>
  <script>
	includeHTML();
  </script>
		</head>
<body>
	 	<div include-html="../styles/navibar_main.php"></div>
<?php

include "../utils.php";
$name = $_POST["name"];
$First_name = $_POST["First_name"];
$Last_name = $_POST["Last_name"];
$Password = $_POST["Password"];


// $sql = 'INSERT INTO User '.
//       '(name, First_name, Last_name, password) '.
//       'VALUES ( '$name','$First_name','$Last_name', $Password )';

$sql = "INSERT INTO User ". "(name, First_name, Last_name, password) ". "VALUES ( '$name','$First_name','$Last_name', '$Password')";


if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
	  echo "Channel ID already exists. Please check your input";
}

$conn->close();

?>
	<br><br>
<a href="../index.html">Go to Login</a>
	<div include-html="../styles/footer.html"></div>

 <script>
  includeHTML();
</script>
</body>
</html>
