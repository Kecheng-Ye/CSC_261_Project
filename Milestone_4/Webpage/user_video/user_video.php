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

                        <form action=\"../videoDisplay.php\" method=\"GET\">\n
                        <input type =\"hidden\", name=\"name\", value= \"$usr_name\">\n
                        <input type =\"hidden\", name=\"videoId\", value= %s>\n
                        <button type=\"submit\">view</button>\n
                        </form>
                   </td>\n
               </tr>";
    
    if (strcmp($operation, "add") == 0) {
        $video_id_select = "SELECT id, Title FROM Video where Title not in 
                            (SELECT Title FROM likes INNER JOIN Video ON likes.Video_id=Video.id WHERE User_name = \"$usr_name\")";
    }else{
        $video_id_select = "SELECT id, Title FROM likes INNER JOIN Video ON likes.Video_id=
                            Video.id  WHERE User_name = \"$usr_name\"";
    }

    $result = db_query($video_id_select);

    while($element = current($result)){
        $video_id = $element["id"];
        $video_name = $element["Title"];
        
        printf($format, $video_name, $video_id, $operation, $operation, $video_id);   
        next($result);
    }
    ?>
</table>
