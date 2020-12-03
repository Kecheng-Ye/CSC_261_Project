<!DOCTYPE html>
<html>
	<?php include "jscript/script.php"?>
	<head>
  <div include-html="./styles/header.html"></div> 
  <title>Mini Youtube Database</title>
  <script>
	includeHTML();
  </script>
</head>
<body>
	<div include-html="./styles/navibar_main.php"></div>

  
 <?php
include "utils.php";
$videoId = $_GET["videoId"];
$name = $_GET["name"];


$conn = new mysqli($server, $user, $pwd, $db);

if($conn->connect_error){
	die("Connection failed ".$conn->connect_error);
}
 

$url = "https://www.youtube.com/embed/".$videoId;
echo' <iframe width="420" height="315" src=' .$url. '> </iframe>';

// check if the video liked by the user
$check_like = "SELECT * FROM likes WHERE User_name = \"$name\" AND Video_id = \"$videoId\"";
$result = db_query($check_like);
?>

<?php if(count($result) > 0)
// if yes, then increment the Repeated_views parameter in the database
if(count($result) > 0){
    $update = "UPDATE likes SET Repeated_views = Repeated_views + 1 WHERE User_name = \"$name\" AND Video_id = \"$videoId\"";

    if($conn->query($update)){
    }else{
        echo "Action failed";
    }

    echo("<form action=\"user_video/video_operation.php\" method=\"post\">
            <input type=\"text\" placeholder=\"Enter Comment...\" name=\"comment\"> 
            <input type =\"hidden\", name=\"action\", value= \"comment\">
            <input type =\"hidden\", name=\"video_id\", value= \"$videoId\">
            <input type =\"hidden\", name=\"name\", value= \"$name\">
            <button type=\"submit\">comment</button>\n
        </form>");

}


$conn->close();?>


 <form action="user_interface.php" id="goto_Demo" method="post">
        <input type ="hidden", name="name", value= <?php echo $name?>>
        <button type="submit">Click Me!</button>
</form>
 <div include-html="./styles/footer.html"></div>

 <script>
  includeHTML();
</script>

</body>
</html>
