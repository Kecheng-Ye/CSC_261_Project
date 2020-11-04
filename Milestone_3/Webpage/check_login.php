<?php

include "utils.php";

$login_success = False;

// check login successful or not
if ($_POST) {
    # do query
    $id = $_POST["id"];
    $pwd = $_POST["pwd"];
    $query = "SELECT * FROM User WHERE name = \"$id\" AND password = $pwd ";
    $result = db_query($query);
    
    if(count($result) > 0){
        $login_success = True;
    }
}

?>


<!-- go to interface -->
<?php if ($login_success): ?>
    <form action="User_Demo.php" id="goto_Demo" method="post">
        <input type ="hidden", name="name", value= <?php echo $id?>>
    </form>

    <script type="text/javascript">
        document.getElementById("goto_Demo").submit();
    </script>
<?php else: ?>
    <p>Wrong Username or Passwoard</p><br>
    <a href="./user_login.php">go back to login page</a><br>
<?php endif; ?>