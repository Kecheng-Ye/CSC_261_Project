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


 <form action="user_interface.php" id="goto_Demo" method="post">
        <input type ="hidden", name="name", value= <?php echo $name?>>
        <button type="submit">Click Me!</button>
</form>
	    

<!-- </body>
</html>
 -->
<div include-html="./styles/footer.html"></div>

 <script>
  includeHTML();
</script>
</body>
</html>
