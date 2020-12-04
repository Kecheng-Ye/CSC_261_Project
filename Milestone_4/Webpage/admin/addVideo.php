<!DOCTYPE html>

<html>

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

<h2> Please enter information of the video to be added: </h2> <br> 

<!-- <form action="phpAddVideo.php" method="POST">
Video ID: <input type="text" name="vid"><br>
Title: <input type="text" name="title"><br>
Channel ID: <select name="cid" required > <?php channel_list(); ?></select><br>
Publish date: <input type="date" name="pdate" value="<?php echo date('Y-m-d'); ?>"><br>
Views: <input type="number" name="view" value=0><br>

<input type="submit">
</form> -->

<form action="phpAddVideo.php" method="POST">
  <div class="form-group">
    <label for="videoId">Video ID</label>
    <input type="text" class="form-control" id="videoId" name="vid" aria-describedby="Help" placeholder="kgaO45SyaO4">
    <small id="Help" class="form-text text-muted">Please enter a real youtube Id if you want to watch in our database.</small>
  </div>
  <div class="form-group">
    <label for="title">Password</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="The New SpotMini">
  </div>
 <div class="form-group">
    <label for="channelId">Channel ID</label>
    <select name="cid" required  class="form-control" id="channelId"> <?php channel_list(); ?></select> 
  </div>
  <div class="form-group">
    <label for="pdate">Publish Date</label>
    <input type="date" name="pdate" class="form-control" id="pdate" value="<?php echo date('Y-m-d'); ?>">>
  </div>
  <div class="form-group">
    <label for="view">Views</label>
    <input type="number" name="view" class="form-control" id="view" value=0>>
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
	
	
</body>
</html>



