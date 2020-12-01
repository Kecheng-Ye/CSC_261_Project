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

<form action="phpAddVideo.php" method="POST">
Video ID: <input type="text" name="vid"><br>
Title: <input type="text" name="title"><br>
Channel ID: <select name="cid" required > <?php channel_list(); ?></select><br>
Publish date: <input type="date" name="pdate" value="<?php echo date('Y-m-d'); ?>"><br>
Views: <input type="number" name="view" value=0><br>

<input type="submit">
</form>

</body>
</html>
