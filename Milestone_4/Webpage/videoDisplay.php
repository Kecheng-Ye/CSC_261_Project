<!DOCTYPE html>
<html>
<body>
  
 <?php
$videoId = $_POST["row[$id]"];
$usr_name = $_POST["name"];


$server = "localhost";
$user = "kguo";
$pwd = "17417174";
$db = "kguo_1";

$conn = new mysqli($server, $user, $pwd, $db);

if($conn->connect_error){
	die("Connection failed ".$conn->connect_error);
}
 
echo $usr_name;
echo $videoId;

// <iframe width="420" height="345" src="https://www.youtube.com/embed/tgbNymZ7vqY?autoplay=1&mute=1">
// </iframe>
  
$conn->close();

?>

</body>
</html>
