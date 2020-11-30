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
$video_id = $_POST['video_id'];
?>


<table style="width:100%">  
    <tr>
        <th>Video Name</th>
        <th>Operation</th>
    </tr>

    <?php
    // the format of every row 
    $format = "<tr>\n
                   <td>%s</td>\n
                   <td>
                        <form action=\"video_operation.php\" method=\"post\">\n
                        <input type =\"hidden\", name=\"User_name\", value= \"$usr_name\">\n
                        <input type =\"hidden\", name=\"video_id\", value= %s>\n
                        <input type =\"hidden\", name=\"action\", value= %s>\n
                        <button type=\"submit\">%s</button>\n
                        </form>

                        <form action=\"\" method=\"post\">\n
                        <input type =\"hidden\", name=\"User_name\", value= \"$usr_name\">\n
                        <input type =\"hidden\", name=\"video_id\", value= %s>\n
                        <button type=\"submit\">view</button>\n
                        </form>
                   </td>\n
               </tr>";
    
    $video_id_select = "SELECT id, Title FROM Video WHERE id = \"$video_id\"";

    $result = db_query($video_id_select);
    $element = current($result);
    $video_id = $element["id"];
    $video_name = $element["Title"];

    printf($format, $video_name, $video_id, $operation, $operation, $video_id);   

    ?>
</table>