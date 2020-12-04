<!DOCTYPE html>

<html>
	<?php include "./jscript/script.php"?>
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

<?php

include "../utils.php";
function channel_list() {
    global $conn;
    
    $sql = "SELECT id from Channel";
    $res = db_query($sql);
    while($row = current($res)) {
	$cid = $row['id'];
	echo '<option value='.$cid.'>'.$cid.'</option>';
	next($res);
    }
}

?>

<body>
	<div include-html="../styles/navibar_main.php"></div>
<!-- <h2> Please enter information of the video to be added: </h2> <br>  -->

<!-- <form action="phpAddVideo.php" method="POST">
Video ID: <input type="text" name="vid"><br>
Title: <input type="text" name="title"><br>
Channel ID: <select name="cid" required > <?php channel_list(); ?></select><br>
Publish date: <input type="date" name="pdate" value="<?php echo date('Y-m-d'); ?>"><br>
Views: <input type="number" name="view" value=0><br>

<input type="submit">
</form> -->

	
<div class="container">
  <h2>Please enter information of the video to be added:</h2>
  <form action="phpAddVideo.php" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="vid">Video ID:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="vid" placeholder="kgaO45SyaO4" name="vid" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="title">Title:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="title" placeholder="The New SpotMini" name="title" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="cid">Channel ID:</label>
      <div class="col-sm-10">          
        <select name="cid" required  class="form-control" id="channelId"> <?php channel_list(); ?></select> 
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="date">Publish Date:</label>
      <div class="col-sm-10">          
       <input type="date" name="pdate" class="form-control" id="pdate" value="<?php echo date('Y-m-d'); ?>">
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
	<div include-html="../styles/footer.html"></div>
	 <script>
  includeHTML();
</script>
</body>
</html>



