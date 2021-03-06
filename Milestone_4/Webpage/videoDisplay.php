<!DOCTYPE html>
<html lang="en">
<script>
function includeHTML() { <!-- call this function at the end of head/body where "include" is used, if any -->
  var z, i, elmnt, file, xhttp;
  /*loop through a collection of all HTML elements:*/
  z = document.getElementsByTagName("*");
  for (i = 0; i < z.length; i++) {
    elmnt = z[i];
    /*search for elements with a certain atrribute:*/
    file = elmnt.getAttribute("include-html");
    if (file) {
      /*make an HTTP request using the attribute value as the file name:*/
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
          if (this.status == 200) {elmnt.innerHTML = this.responseText;}
          if (this.status == 404) {elmnt.innerHTML = "Page not found.";}
          /*remove the attribute, and call this function once more:*/
          elmnt.removeAttribute("include-html");
          includeHTML();
        }
      }      
      xhttp.open("GET", file, true);
      xhttp.send();
      /*exit the function:*/
      return;
    }
  }
};
</script>

<head>
  <div include-html="./styles/header.html"></div> 
  <title>Mini Youtube Database</title>
  <script>
	includeHTML();
  </script>
</head>

<body>
<div include-html="./styles/navibar_main.html"></div>
	<!-- <!DOCTYPE html>
<html>
<body> -->
  
 <?php
include "utils.php";
$videoId = $_GET["videoId"];
$name = $_GET["name"];
?>

<?php include "./styles/navibar_main.php" ?>

<?php
$conn = new mysqli($server, $user, $pwd, $db);

if($conn->connect_error){
	die("Connection failed ".$conn->connect_error);
}
 

$url = "https://www.youtube.com/embed/".$videoId;
echo' <center><iframe width="840" height="630" src=' .$url. '> </iframe></center>';

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

    echo(" <center><form action=\"user_video/video_operation.php\" method=\"post\">
            <input type=\"text\" placeholder=\"Enter Comment...\" name=\"comment\"> 
            <input type =\"hidden\", name=\"action\", value= \"comment\">
            <input type =\"hidden\", name=\"video_id\", value= \"$videoId\">
            <input type =\"hidden\", name=\"name\", value= \"$name\">
            <button type=\"submit\">comment</button>\n
        </form> </center>");

}


$conn->close();?>


 <form action="user_interface.php" id="goto_Demo" method="post">
        <input type ="hidden", name="name", value= <?php echo $name?>>
         <center><button type="submit">go back</button> </center>
</form>
 <div include-html="./styles/footer.html"></div>

 <script>
  includeHTML();
</script>

<!-- </body>
</html>
 -->
<div include-html="./styles/footer.html"></div>

 <script>
  includeHTML();
</script>
</body>
</html>
