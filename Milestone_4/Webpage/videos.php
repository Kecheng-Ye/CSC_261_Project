
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
// $server = "localhost";
// $user = "kguo";
// $pwd = "17417174";
// $db = "kguo_1";

include "utils.php";

$conn = new mysqli($server, $user, $pwd, $db);

if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}

$sql_select = "SELECT * FROM Video";
if($res = $conn->query($sql_select)) {
	while($row = $res->fetch_assoc()) {
		echo "Video ID: " . $row["id"] . "    Title: " . $row["Title"] . "  Channel_ID: " . $row["Channel_id"] . "    Publish date: " . $row["Publish_date"] . "        Views: " . $row["Views"] . "<br>";
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
