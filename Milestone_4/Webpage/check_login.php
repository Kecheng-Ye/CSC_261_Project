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

$login_success = False;

// check login successful or not
if ($_POST) {
    # do query
    $id = $_POST["id"];
    $pwd = $_POST["pwd"];
    $query = "SELECT * FROM User WHERE name = \"$id\" AND password = \"$pwd\" ";
    $result = db_query($query);
    
    if(count($result) > 0){
        $login_success = True;
    }
}

?>


<!-- go to interface -->
<?php if ($login_success): ?>
    <?php if ($id == "admin"): ?>
	<form action="./admin/admin_interface.php" id="goto_admin" method="post">
            <input type ="hidden", name="name", value= <?php echo $id?>>
        </form>
        <script type="text/javascript">
            document.getElementById("goto_admin").submit();
        </script>
	
    <?php else: ?>
    	<form action="user_interface.php" id="goto_Demo" method="post">
            <input type ="hidden", name="name", value= <?php echo $id?>>
    	</form>
    	<script type="text/javascript">
            document.getElementById("goto_Demo").submit();
    	</script>
    <?php endif; ?>

<?php else: ?>
    <p>Wrong Username or Passwoard</p><br>
    <a href="./LoginRegistrationForm/index.html">go back to login page</a><br>
<?php endif; ?>
		
	
<div include-html="./styles/footer.html"></div>

 <script>
  includeHTML();
</script>
</body>
</html>
