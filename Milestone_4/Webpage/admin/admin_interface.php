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

/* Create three columns that floats next to each other */
.column1 {
  float: left;
  width: 50%;
  padding: 10px;
 
}

.column2 {
  float: left;
  width: 25%;
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

include "../utils.php";

/* This function returns the list of all users */
function all_user() {
    global $conn;

    if($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
    }else{
	$sql_select = "SELECT * FROM User";
	if($res = $conn->query($sql_select)) {
	    while($row = $res->fetch_assoc()) {
	    	echo $row["name"] . "\t" . 
		'<form method="POST" action="deleteUser.php">
		<input type="hidden" name="uid" value='.$row["name"].'>
		<button type="submit">delete</button>
		</form><br>';
	    }
	}
    }
}

/* This function returns the list of all videos */
function all_video() {
    global $conn;

    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
        $sql_select = "SELECT * FROM Video";
        if($res = $conn->query($sql_select)) {
            while($row = $res->fetch_assoc()) {
                echo $row["Title"] . "\t" .
		'<form method="POST" action="deleteVideo.php">
                <input type="hidden" name="vid" value='.$row["id"].'>
                <button type="submit">delete</button>
                </form><br>';
            }
        }
    }
}

/* This function returns the list of all channels */
function all_channel() {
    global $conn;

    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
        $sql_select = "SELECT * FROM Channel";
        if($res = $conn->query($sql_select)) {
            while($row = $res->fetch_assoc()) {
                echo $row["Title"] . "\t" .
                '<form method="POST" action="deleteChannel.php">
                <input type="hidden" name="cid" value='.$row["id"].'>
                <button type="submit">delete</button>
                </form><br>';
            }
        }
    }
}

?>

<div class="header">
  <h2> Welcome Administrator </h2>
  <p> Please manage videos, channels and users on this page </p>
</div>

<div class="row">
  <div class="column2">	
        <h2>Users List</h2>
	<?php all_user();?>
  </div>
  <div class="column1">
	<h2>Videos List</h2>
	<form method="POST" action="addVideo.php">
	    <button type="submit">add video</button>
        </form><br>
	<?php all_video();?>
  </div>
  <div class="column2">
        <h2>Channels List</h2>
        <form method="POST" action="addChannel.html">
            <button type="submit">add channel</button>
        </form><br>
        <?php all_channel();?>
  </div>
</div>

</body>
</html>

