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
	
$conn = new mysqli($server, $user, $pwd, $db);

if($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql_select = "SELECT * FROM Channel";
if($res = $conn->query($sql_select)) {
	while($row = $res->fetch_assoc()) {
// 		echo "Channel_ID: " . $row["id"] . "	Name: " . $row["Title"] . "	Joined since: " . $row["Release_date"] . "<br>";
		 echo " <tr>";
   echo " <td>" .$row["id"]."</td>";
   echo "<td>" . $row["Title"] ."</td>";
   echo " <td>".$row["Release_date"]."</td>";
 echo " </tr>";
	}
}

mysqli_close($conn);
?>
<!-- 
</body>
</html>
 -->
	
<<<<<<< HEAD

<div include-html="./styles/footer.html"></div>
=======
<!-- <div include-html="./styles/footer.html"></div> -->
>>>>>>> f901219575a2ddeb39a7565e1ccef96e24ee31fc

 <script>
  includeHTML();
</script>
</body>
</html>
