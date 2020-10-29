<!DOCTYPE html>
<html>
<head>
<title></title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="maindiv">
<div class="divA">
<div class="title">
<h2>Update Data Using PHP</h2>
</div>
<div class="divB">
<div class="divD">
<p>Click On Menu</p>
<?php
$connection = mysql_connect("localhost", "root", "");
$db = mysql_select_db("xmin2_1", $connection);
if (isset($_GET['submit'])) {
$name = $_GET['name'];
$First_name = $_GET['First_name'];
$Last_name = $_GET['Last_name'];
$Password = $_GET['Password'];
$query = mysql_query("update user set
First_name='$First_name', Last_name='$Last_name', Password='$Password',
 where name='$name'", $connection);
}
$query = mysql_query("select * from users", $connection);
while ($row = mysql_fetch_array($query)) {
echo "<b><a href='updatephp.php?update={$row['name']}'>{$row['First_name']}</a></b>";
echo "<br />";
}
?>
</div><?php
if (isset($_GET['update'])) {
$update = $_GET['update'];
$query1 = mysql_query("select * from employee where employee_id=$update", $connection);
while ($row1 = mysql_fetch_array($query1)) {
echo "<form class='form' method='get'>";
echo "<h2>Update Form</h2>";
echo "<hr/>";
echo"<input class='input' type='hidden' name='name' value='{$row1['name']}' />";
echo "<br />";
echo "<label>" . "First Name:" . "</label>" . "<br />";
echo"<input class='input' type='text' name='First_name' value='{$row1['First_name']}' />";
echo "<br />";
echo "<label>" . "Last name:" . "</label>" . "<br />";
echo"<input class='input' type='text' name='Last_name' value='{$row1['Last_name']}' />";
echo "<br />";
echo "<label>" . "Password:" . "</label>" . "<br />";
echo"<input class='input' type='text' name='Password' value='{$row1['Password']}' />";
echo "<br />";
echo "<input class='submit' type='submit' name='submit' value='update' />";
echo "</form>";
}
}
if (isset($_GET['submit'])) {
echo '<div class="form" id="form3"><br><br><br><br><br><br>
<Span>Data Updated Successfuly......!!</span></div>';
}
?>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
</div><?php
mysql_close($connection);
?>
</body>
</html>
