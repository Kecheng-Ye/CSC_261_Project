<!DOCTYPE html>
<html lang="en">
<?php 
include "jscript/script.php";
include "utils.php";
?>

<?php
$name = $_POST['name'];
# the hashmap like structure for projecting different attribute name of 'user_name' in different table
$name_KV = [
"User" => "name",
"likes" => "User_name",
"Subscribe" => "User_name",
];?>


<head>
  <div include-html="./styles/header.html"></div> 
  <title>Mini Youtube Database</title>
  <script>
	includeHTML();
  </script>
</head>

<?php include "styles/navibar_main.php"?>

<?php
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

	$sql_select = "SELECT User_name, Video_id, Repeated_views, Comment FROM $table WHERE $name_KV[$table] = \"$usr_name\"";
	$res = db_query($sql_select);
	$count = 1;
	# one user may like a lot of videos
	while($row = current($res)) {
		echo $count. ".\t";
		while($element = current($row)) {

			if(key($row) == $name_KV[$table]){
			
			}else if (key($row) == "Video_id"){ 
				# since print out the video id will not be user friendly
				# the function will do a second query to search for the Video title of that video id 
				# and print out it
				$id = key($row);
				$video_query = "SELECT Title FROM Video WHERE id = " . "\"" . $row[$id] . "\"";
				$query = $conn->query($video_query);
				$result = $query->fetch_assoc();
				echo key($result).":\t" . $result[key($result)] . "<br></br>";
			}else{
				echo key($row).":\t" . $row[key($row)] . "<br></br>";
			}
			next($row);
		}
		
		echo '<form method="GET" action="videoDisplay.php">
				<input type="hidden" name="name" value='  .$name. '>
					<input type="hidden" name="videoId" value='.$row[$id].'>
				<input type="submit" value="watch"/> </form>
				<br>';

		$count += 1;
		next($res);
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
  <div class="column" style="background-color:#bbb;">	<h2>Personal Infomation</h2>
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
		<form action="user_video/search_video.php" method="post">
		<input type ="hidden", name="name", value= <?php echo $name?>>
		<input type ="hidden", name="operation", value= "add">
		<button type ="submit">add</button>
		</form>


		<form action="user_video/user_video.php" method="post">
		<input type ="hidden", name="name", value= <?php echo $name?>>
		<input type ="hidden", name="operation", value= "delete">
		<button type ="submit">delete</button>
		</form>
	<!-- subscriber -->
	<h2>Subscribed Channel</h2>
	<?php subscribe_info($name, "Subscribe");?>
	<br></br>
		<form action="user_channel/user_channel.php" method="post">
		<input type ="hidden", name="name", value= <?php echo $name?>>
		<input type ="hidden", name="operation", value= "add">
		<button type ="submit">add</button>
		</form>


		<form action="user_channel/user_channel.php" method="post">
		<input type ="hidden", name="name", value= <?php echo $name?>>
		<input type ="hidden", name="operation", value= "delete">
		<button type ="submit">delete</button>
		</form>
</article>
	</div>
 
</div>
<!-- 
<div include-html="./styles/footer.html"></div>

 <script>
  includeHTML();
</script> -->

</body>
</html>
