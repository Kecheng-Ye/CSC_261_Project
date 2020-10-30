<!DOCTYPE html>
<html>
<body>


<?php

$video_id = $_POST['video_id'];
$title = $_POST['title'];
$channel_id = $_POST['channel_id'];
$publish_date = $_POST['publish_date'];
$views = $_POST['views'];

echo $video_id."<br>".$title."<br>".$channel_id."<br>".$publish_date."<br>".$views."<br>";
?>


<form action="phpInsertVideoForm.php" method="post">
video_id: <input type="text" name="video_id"><br>
title: <input type="text" name="title"><br>
channel_id: <input type="text" name="channel_id"><br>
publish_date: <input type="text" name="publish_date"><br>
views: <input type="text" name="views"><br>

<input type ="submit">
</form>



</body>
</html>




