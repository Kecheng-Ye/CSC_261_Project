<?php
include "../utils.php";
$usr_name = $_POST['User_name'];
$video_id = $_POST['video_id'];
$operation = $_POST['action'];

// different sql command for 'add' and 'delete'
if (strcmp($operation, "add") == 0) {
    $action = "INSERT INTO likes (User_name, Video_id)
               VALUES (\"$usr_name\", \"$video_id\")";
}else{
    $action = "DELETE FROM likes WHERE User_name = \"$usr_name\" AND Video_id = \"$video_id\"";
}

$action_status = mysqli_query($conn, $action);

?>


<!-- after operation, go back to User Interface automatically -->
<?php if ($action_status): ?>
    <form action="../User_Demo.php" id="goto_Demo" method="post">
        <input type ="hidden", name="name", value= <?php echo $usr_name?>>
    </form>

    <script type="text/javascript">
        document.getElementById("goto_Demo").submit();
    </script>
<?php else: ?>
    <p>Action failed</p><br>
<?php endif; ?>