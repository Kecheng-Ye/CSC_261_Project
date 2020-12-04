<!DOCTYPE html>

<html>
	
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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

<!-- <h2> Please enter information of the video to be added: </h2> <br>  -->

<!-- <form action="phpAddVideo.php" method="POST">
Video ID: <input type="text" name="vid"><br>
Title: <input type="text" name="title"><br>
Channel ID: <select name="cid" required > <?php channel_list(); ?></select><br>
Publish date: <input type="date" name="pdate" value="<?php echo date('Y-m-d'); ?>"><br>
Views: <input type="number" name="view" value=0><br>

<input type="submit">
</form> -->

<!-- <form action="phpAddVideo.php" method="POST">
  <div class="form-group">
    <label for="videoId">Video ID</label>
    <input type="text" class="form-control" id="videoId" name="vid" aria-describedby="Help" placeholder="kgaO45SyaO4">
    <small id="Help" class="form-text text-muted">Please enter a real youtube Id if you want to watch in our database.</small>
  </div>
  <div class="form-group">
    <label for="title">Title</label>
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
</form> -->
	
	
<div class="container">
  <h2>Please enter information of the video to be added:</h2>
  <form action="phpAddVideo.php" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="vid">Video ID:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="vid" placeholder="kgaO45SyaO4" name="vid">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="title">Title:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="title" placeholder="The New SpotMini" name="title">
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
       <input type="date" name="pdate" class="form-control" id="pdate" value="<?php echo date('Y-m-d'); ?>">>
      </div>
    </div>
<!--     <div class="form-group">
      <label class="control-label col-sm-2" for="date">Views:</label>
      <div class="col-sm-10">          
       <input type="date" name="pdate" class="form-control" id="pdate" value="<?php echo date('Y-m-d'); ?>">>
      </div>
    </div> -->

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>
	
	
</body>
</html>



