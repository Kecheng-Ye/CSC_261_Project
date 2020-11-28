<!DOCTYPE html>
<html lang="en">
	

<head>
<title>mini-youtube</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
.header {
  background-color: #f1f1f1;
  padding: 30px;
  text-align: center;
  font-size: 35px;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width:50%;
  padding: 10px;
 
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the footer */
.footer {
  background-color: #f1f1f1;
  padding: 10px;
  text-align: center;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media (max-width: 600px) {
  .column {
    width: 100%;
  }
}
</style>
</head>
<body>
	
	

<?php

$name = $_POST['name'];
$server = "localhost";
$user = "kguo";
$pwd = "17417174";
$db = "kguo_1";

$conn = new mysqli($server, $user, $pwd, $db);
# the hashmap like structure for projecting different attribute name of 'user_name' in different table
$name_KV = [
"User" => "name",
"likes" => "User_name",
"Subscribe" => "User_name",
];


/* This function will do a trivial query of User table and print all User information
Args:  usr_name(string): the user name used to do query
table(string): the table we are doing query                     */
function person_info($usr_name, $table){
	/* Note: Have to use global key word to use the variable outside the function scope */
	global $name_KV, $conn;

	if($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}else{
		$sql_select = "SELECT * FROM User WHERE name = \"$usr_name\"";
		$res = $conn->query($sql_select);
		# since one user_name only cooresponds to one row in the table
		$row = $res->fetch_assoc();
		# do a iterative search on all the output of the query
		while($element = current($row)) {
		# if the attribute is user_name, we will omit it
		# otherwise we will print the information
		if(key($row) != $name_KV[$table]){
			echo key($row).":\t" . $row[key($row)] . "<br></br>";
		}else{
		}
		
		next($row);
		}
	}
}


/* This function will do a trivial query of like table and print all User liked 
	Video information
Args:  usr_name(string): the user name used to do query
		table(string): the table we are doing query                     */
function like_info($usr_name, $table){
	global $name, $conn, $name_KV;

	if($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}else{
		$sql_select = "SELECT * FROM $table WHERE $name_KV[$table] = \"$usr_name\"";
		if($res = $conn->query($sql_select)) {
		# one user may like a lot of videos
			$count = 1;
			while($row = $res->fetch_assoc()) {
				echo $count. ".\t";
				while($element = current($row)) {
				if(key($row) == $name_KV[$table]){
				}else if (key($row) == "Video_id"){ 
					# since print out the video id will not be user friendly
					# the function will do a second query to search for the Video title of that video id 
					# and print out it
					$id = key($row);
					
					$url = "https://www.youtube.com/embed/".$row[$id];
					echo $url;
// 					echo <form action="https://google.com">
//     <input type="submit" value="Go to Google" />
// </form>
// 					echo '<button onclick="location.href=$row[id]" type="button">
//          www.example.com</button>'
					echo'   <a href= $row[id]>     <input type="button"/>   </a>';
					 
// 					echo $row[$id];
// 					header('Location: videoDisplay.php');
	
					$video_query = "SELECT Title FROM Video WHERE id = " . "\"" . $row[$id] . "\"";
					$query = $conn->query($video_query);
					$result = $query->fetch_assoc();
					echo key($result).":\t" . $result[key($result)] . "<br></br>";
				}else{
					echo key($row).":\t" . $row[key($row)] . "<br></br>";
					# TODO
				}
				
				next($row);
				}
				$count += 1;
			}
		}
	}
}


/* This function will do a trivial query of subscribe table and print all User subscribe 
information
Args:  usr_name(string): the user name used to do query
		table(string): the table we are doing query                     */
function subscribe_info($usr_name, $table){
	global $name, $conn, $name_KV;

	# it is pretty similiar to function 'like_info()'
	if($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}else{
		$sql_select = "SELECT * FROM $table WHERE $name_KV[$table] = \"$usr_name\"";
		if($res = $conn->query($sql_select)) {
			$count = 1;
			while($row = $res->fetch_assoc()) {
				echo $count. ".\t";
				while($element = current($row)) {
				if(key($row) == $name_KV[$table]){
				}else if (key($row) == "Channel_id"){
					$id = key($row);
					$channel_query = "SELECT Title FROM Channel WHERE id = "  . $row[$id];
					$query = $conn->query($channel_query);
					$result = $query->fetch_assoc();
					echo key($result).":\t" . $result[key($result)] . "<br></br>";
				}else{
					echo key($row).":\t" . $row[key($row)] . "<br></br>";
				}
				
				next($row);
				}
				$count += 1;

			}
		}
	}
}
	
	



?>





<div class="header">
  <h2>User: <?php echo $name ?></h2>
</div>

<div class="row">
  <div class="column" style="background-color:#aaa;">	<h2>Personal Infomation</h2>
	<!-- call the predefined function to echo stuff -->
	<?php person_info($name, "User");?>
	<!-- directly parse the name argument to the update interface for update-->
	<form action="phpUpdateForm.php" method="post">
	<input type ="hidden", name="name", value= <?php echo $name?>>
	<button type ="submit">edit</button>
	</form></div>
  <div class="column" style="background-color:#bbb;">
	<article>
	<h2>Liked Video</h2>
	<?php like_info($name, "likes");?>
	<h2>Subscribed Channel</h2>
	<?php subscribe_info($name, "Subscribe");?>
</article>
	</div>
 
</div>

<div class="footer">
  <p>Footer</p>
</div>

</body>
</html>
