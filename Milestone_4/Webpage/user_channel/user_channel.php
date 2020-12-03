<!DOCTYPE html>
<html>
<?php include "../jscript/script.php"?>

<head>
  <div include-html="../styles/header.html"></div> 
  <title>Mini Youtube Database</title>
  <script>
	includeHTML();
  </script>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>

<body>
<table style="width:100%">  
    <tr>
        <th>Channel Name</th>
        <th>Operation</th>
    </tr>	


<?php
include "../utils.php";
include "jscript/script.php";
$usr_name = $_POST['name'];
$operation = $_POST['operation'];
?>

<?php  
include "../styles/navibar_subdir.php"
?>


    <?php
    // the format of every row 
    $format = "<tr>\n
                   <td>%s</td>\n
                   <td>
                        <form action=\"channel_operation.php\" method=\"post\">\n
                        <input type =\"hidden\", name=\"User_name\", value= \"$usr_name\">\n
                        <input type =\"hidden\", name=\"channel_id\", value= %s>\n
                        <input type =\"hidden\", name=\"action\", value= %s>\n
                        <button type=\"submit\">%s</button>\n
                        </form>


                        <form action=\"each_channel_info.php\" method=\"post\">\n
                        <input type =\"hidden\", name=\"name\", value= \"$usr_name\">\n
                        <input type =\"hidden\", name=\"operation\", value= %s>\n
                        <input type =\"hidden\", name=\"channel_id\", value= %s>\n
                        <input type =\"hidden\", name=\"channel_name\", value= %s>\n
                        <button type=\"submit\">Info</button>\n
                        </form>
                   </td>\n
               </tr>";
    
    if (strcmp($operation, "add") == 0) {
        $video_id_select = "SELECT id, Title FROM Channel where Title not in 
                            (SELECT Title FROM Subscribe INNER JOIN Channel ON Subscribe.Channel_id=Channel.id WHERE User_name = \"$usr_name\")";
    }else{
        $video_id_select = "SELECT id, Title FROM Subscribe INNER JOIN Channel ON 
                            Subscribe.Channel_id=Channel.id  WHERE User_name = \"$usr_name\"";
    }

    $result = db_query($video_id_select);

    while($element = current($result)){
        $channel_id = $element["id"];
        $channel_name = $element["Title"];
        
        printf($format, $channel_name, $channel_id, $operation, $operation, $operation, $channel_id, $channel_name);
        
        next($result);
    }
    ?>
</table>
</body>


<div include-html="../styles/footer.html"></div>

 <script>
  includeHTML();
</script>

</html>