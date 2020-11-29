<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="./videos.php">Video</a></li>
        <li><a href="./channels.php">Channel</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="./user_login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
  

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
  height: 500px; /* Should be removed. Only for demonstration */
 
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
include "utils.php";
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
					$video_query = "SELECT Title FROM Video WHERE id = " . "\"" . $row[$id] . "\"";
					$query = $conn->query($video_query);
					$result = $query->fetch_assoc();
					echo key($result).":\t" . $result[key($result)] . "<br></br>";
// 					$url = "https://www.youtube.com/embed/".$row[$id];
// 					echo'   <a href=' .$url. '>     <input type="button" value="watch"/>   </a>';
					echo '<form method="GET" action="videoDisplay.php">
					 <input type="hidden" name="name" value='  .$name. '>
      					  <input type="hidden" name="videoId" value='.$row[$id].'>
  					  <input type="submit" value="watch"/> </form>';
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
	<form action="user_video/user_video.php" method="post">
		<input type ="hidden", name="name", value= <?php echo $name?>>
		<input type ="hidden", name="operation", value= "add">
		<button type ="submit">add</button>
		</form>

		<form action="user_video/user_video.php" method="post">
		<input type ="hidden", name="name", value= <?php echo $name?>>
		<input type ="hidden", name="operation", value= "delete">
		<button type ="submit">delete</button>
		</form>
	<h2>Subscribed Channel</h2>
	<?php subscribe_info($name, "Subscribe");?>
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

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>






