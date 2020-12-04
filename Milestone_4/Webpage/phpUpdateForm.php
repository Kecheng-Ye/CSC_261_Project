<!DOCTYPE html>
<html>
<?php include "jscript/script.php"?>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
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



	
<div class="container">
  <h2>Please enter information to be updated:</h2>
  <form action="phpAddVideo.php" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="vid">Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Enter Name" name="name" value = "<?php $name; ?>" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="title">Firstname:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="title" placeholder="Enter firstname" name="First_name" <?php $First_name; ?> required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="cid">Lastname:</label>
      <div class="col-sm-10">          
 <input type="text" class="form-control" placeholder="Enter firstname" name="Last_name" <?php $Last_name; ?> required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="date">Password:</label>
      <div class="col-sm-10">          
      <input type="password" class="form-control" placeholder="Enter password" name="Password" <?php $Password; ?> required>
      </div>
    </div>


    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
	    <a href="./admin_interface.php" class="w3-btn w3-black">go back to admin page</a>
      </div>
    </div>
  </form>
</div>

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
