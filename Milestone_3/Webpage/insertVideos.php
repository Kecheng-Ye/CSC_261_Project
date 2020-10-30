<!DOCTYPE html>
<html>
<body>


<?php
  
$server = "localhost";
$user = "kguo";
$pwd = "17417174";
$db = "kguo_1";

$id = $_POST['video_id'];
$Title = $_POST['title'];
$Channel_id = $_POST['channel id'];
$Publish_date = $_POST['publish_date'];
$Views = $_POST['views'];

echo $id."<br>".$Title."<br>".$Channel_id."<br>".$Publish_date."<br>".$Views."<br>";
?>


<form action="phpInsertVideoForm.php" method="post">
Video Id: <input type="text" name="id"><br>
Title: <input type="text" name="Title"><br>
Channel Id: <input type="text" name="Channel_id"><br>
Publish Date: <input type="text" name="Publish_date"><br>
Views: <input type="text" name="Views"><br>

<input type ="submit">
</form>



</body>
</html>




