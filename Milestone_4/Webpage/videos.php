
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
    <th>Video ID</th>
    <th>Title</th>
  <th>Channel id</th>
    <th>Publish date</th>
    <th>Views</th>
  </tr>

	
	<div include-html="./styles/navibar_main.php"></div>

<?php
// $server = "localhost";
// $user = "kguo";
// $pwd = "17417174";
// $db = "kguo_1";

include "utils.php";
$name = $_GET["name"];

$conn = new mysqli($server, $user, $pwd, $db);

if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}

$sql_select = "SELECT * FROM Video";
if($res = $conn->query($sql_select)) {
	while($row = $res->fetch_assoc()) {
// 		echo "Video ID: " . $row["id"] . "    Title: " . $row["Title"] . "  Channel_ID: " . $row["Channel_id"] . "    Publish date: " . $row["Publish_date"] . "        Views: " . $row["Views"] . "<br>";
	 echo " <tr>";
   echo " <td>" .$row["id"]."</td>";
   echo "<td>" . $row["Title"] ."</td>";
   echo " <td>". $row["Channel_id"]."</td>";
echo " <td>".$row["Publish_date"]."</td>";
echo " <td>". $row["Views"] ."</td>";
 echo " </tr>";
	}
}

mysqli_close($conn);
?>
	
<!-- <div include-html="./styles/footer.html"></div> -->

 <script>
  includeHTML();
</script>

</table>
</body>
</html>
