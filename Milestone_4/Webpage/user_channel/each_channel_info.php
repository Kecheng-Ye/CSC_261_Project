<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    padding: 15px;
    background-color: #f1f1c1;
}
</style>

<?php
include "../utils.php";
$usr_name = $_POST['name'];
$operation = $_POST['operation'];
$channel_id = $_POST['channel_id'];
$channel_name = $_POST['channel_name'];

$query = "SELECT Title FROM Channel WHERE id = \"$channel_id\"";
$result = db_query($query);
$channel_name = current($result)["Title"]
?>

<h1>Channel Info: <?php echo $channel_name ?></h1>

<table style="width:100%">  
    <tr>
        <th>Video Name</th>
        <th>Watch</th>
    </tr>

    <?php
    // the format of every row 
    $format = "<tr>\n
                   <td>%s</td>\n
                   <td>
                        <form action=\"../videoDisplay.php\" method=\"post\">\n
                        <input type =\"hidden\", name=\"name\", value= \"$usr_name\">\n
                        <input type =\"hidden\", name=\"videoId\", value= %s>\n
                        <button type=\"submit\">view</button>\n
                        </form>
                   </td>\n
               </tr>";
    

    $video_id_select = "SELECT id, Title FROM Video WHERE Channel_id = \"$channel_id\"";

    $result = db_query($video_id_select);

    while($element = current($result)){
        $video_id = $element["id"];
        $video_name = $element["Title"];
        
        printf($format, $video_name, $video_id);   
        next($result);
    }
    ?>
</table>

<form action="user_channel.php" method="post">
    <input type ="hidden", name="name", value = <?php echo $usr_name?>>
    <input type ="hidden", name="operation", value = <?php echo $operation?>>
    <button type="submit">back</button>
</form>




