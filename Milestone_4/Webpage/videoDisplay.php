<!DOCTYPE html>
<html>
<body>
  
 <?php
$videoId = $_GET["videoId"];
$name = $_GET["name"];


$server = "localhost";
$user = "kguo";
$pwd = "17417174";
$db = "kguo_1";

$conn = new mysqli($server, $user, $pwd, $db);

if($conn->connect_error){
	die("Connection failed ".$conn->connect_error);
}
 

$url = "https://www.youtube.com/embed/".$videoId;
echo' <iframe width="420" height="315" src=' .$url. '> </iframe>';


  
$conn->close();

?>
<br>
<a href="./user_interface.php">Return to Main</a><br>	

</body>
</html>
