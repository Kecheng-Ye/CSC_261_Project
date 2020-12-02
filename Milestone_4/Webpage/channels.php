<!DOCTYPE html>

<html>
<?php include "jscript/script.php"?>
	
<head>
  <div include-html="./styles/header.html"></div> 
  <title>Mini Youtube Database</title>
  <script>
	includeHTML();
  </script>
	
	
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
	
	
	
</head>
	<body>
	<table>
<tr>
    <th>Channel ID</th>
    <th>Title</th>
    <th>Release Date</th>
  </tr>

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
// 		echo "Channel_ID: " . $row["id"] . "	Name: " . $row["Title"] . "	Joined since: " . $row["Release_date"] . "<br>";
		 echo " <tr>";
   echo " <td>" .$row["id"]."</td>";
   echo "<td>" . $row["Title"] ."</td>";
   echo " <td>".$row["Release_date"]."</td>";
 echo " </tr>";
	}
}

mysqli_close($conn);
?>
		

	
<div include-html="./styles/footer.html"></div>

 <script>
  includeHTML();
</script>
</table>
</body>
</html>
