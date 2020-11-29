<!DOCTYPE html>
<html>
<body>
  
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

// echo '<form action="user_interface.php"  method="post">
//         <input type ="hidden", name="name", value= '.$name.'>
//     </form>';


if(array_key_exists('goback', $_POST)) { 
            goback(); 
        } 
function goback() { 
	global $name;
	echo $name;
//             echo "This is Button1 that is selected"; 
     echo 'jjjjjjjj  <form action="user_interface.php" id="goto_Demo" method="post">
        <input type ="hidden", name="goback", value='.$name.'>
    </form>';

//     <script type="text/javascript">
//         document.getElementById("goto_Demo").submit();
//     </script>';
        } 
// if(isset($_POST['return'])) { 
// //    echo '<form action="user_interface.php"  method="post">
// //         <input type ="hidden", name="name", value= '.$name.'>
// //     </form>';
// echo "This is Button1 that is selected";
// } 

  
$conn->close();

?>



<!-- <br>
<a href="./user_interface.php">Return to Main</a><br>	 -->
<form method="post"> 
        <input type="submit" name="goback"
                value="go back"/>  </form> ;
	    

</body>
</html>
