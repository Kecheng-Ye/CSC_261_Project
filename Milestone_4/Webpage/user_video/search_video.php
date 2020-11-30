<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

/* Create a column layout with Flexbox */
.row {
  display: flex;
}

/* Left column (menu) */
.left {
  flex: 35%;
  padding: 15px 0;
}

.left h2 {
  padding-left: 8px;
}

/* Right column (page content) */
.right {
  flex: 65%;
  padding: 15px;
}

/* Style the search box */
#mySearch {
  width: 100%;
  font-size: 18px;
  padding: 11px;
  border: 1px solid #ddd;
}

/* Style the navigation menu inside the left column */
#myMenu {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myMenu li a {
  padding: 12px;
  text-decoration: none;
  color: black;
  display: block
}

#myMenu li a:hover {
  background-color: #eee;
}
</style



</style>

<?php
include "../utils.php";
$usr_name = $_POST['name'];
$operation = $_POST['operation'];
?>

<div class="row">
    <div class="left" style="background-color:#bbb;">
        <h2>Search page</h2>
        <input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search.." title="Type in a category">

        <ul id="myMenu">
            <?php

                $format = " <li style=\"display:none\">
                            <form id=\"form1\" action=\"each_video_info.php\" method=\"post\">
                                <a href=\"javascript:;\" onclick=\"document.getElementById('form1').submit();\">%s</a>
                                <input type =\"hidden\", name=\"name\", value= \"$usr_name\">
                                <input type =\"hidden\", name=\"video_id\", value= %s>
                                <input type =\"hidden\", name=\"operation\", value= %s>
                            </form></li>";
                
                $video_id_select = "SELECT id, Title FROM Video where Title not in 
                                    (SELECT Title FROM likes INNER JOIN Video ON likes.Video_id=Video.id WHERE User_name = \"$usr_name\")";

                $result = db_query($video_id_select);

                while($element = current($result)){
                    $video_id = $element["id"];
                    $video_name = $element["Title"];
                    
                    printf($format, $video_name, $video_id, $operation);   
                    next($result);
                }
            ?>
        </ul>
        <br></br>
        <form action="user_video.php" method="post">
            <input type ="hidden", name="name", value= <?php echo $usr_name?>>
            <input type ="hidden", name="operation", value= "add">
            <button type="submit">View All</button>
        </form>

        <form action="../User_Demo.php" id="goto_Demo" method="post">
            <input type ="hidden", name="name", value= <?php echo $usr_name?>>
            <button type="submit">Back</button>
        </form>
    </div>
    



<script>
function myFunction() {
	// Declare variables
	var input, filter, ul, li, a, i;
	input = document.getElementById("mySearch");
	filter = input.value.toUpperCase();
	ul = document.getElementById("myMenu");
	li = ul.getElementsByTagName("li");

	// Loop through all list items, and hide those who don't match the search query
	for (i = 0; i < li.length; i++) {
    
		a = li[i].getElementsByTagName("a")[0];
        if(filter.length == 0){
            li[i].style.display = "none";
        }else if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
			li[i].style.display = "block";
		} else {
			li[i].style.display = "none";
		}
	}
}
</script>