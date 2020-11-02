<!DOCTYPE html>

<html>
<body>


<!-- CSS style here -->
<style>
/* Pen-specific styles */
html, body, section {
  height: 100%;
}

body {
  color: #000;
  font-family: sans-serif;
  font-size: 1.25rem;
  line-height: 150%;
  text-align: center;
}


div {
  display: flex;
  flex-direction: column;
}

h2 {
  font-size: 1.5rem;
  margin: 0 0 0.75rem 0;
}

/* Pattern styles */
.container {
  display: flex;
}

.left-half {
  flex: 1;
  padding: 1rem;
}

.right-half {
  flex: 1;
  padding: 1rem;
}
</style>

<?php
  
  $name = $_POST['id'];
  $upwd =  $_POST['pwd'];
  $server = "localhost";
  $user = "kguo";
  $pwd = "17417174";
  $db = "kguo_1";
  $is_login = False; // login successful?
  
  $conn = new mysqli($server, $user, $pwd, $db);
  # the hashmap like structure for projecting different attribute name of 'user_name' in different table
  $name_KV = [
    "User" => "name",
    "likes" => "User_name",
    "Subscribe" => "User_name",
  ];


  /* This function will do a trivial query of User table and print all User information
    Args:  usr_name(string): the user name used to do query
           table(string): the table we are doing query                     */
  function person_info($usr_name, $user_pwd, $table){
    /* Note: Have to use global key word to use the variable outside the function scope */
    global $name, $name_KV, $conn, $is_login;

    if($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }else{
      $sql_select = "SELECT * FROM User WHERE name = \"$usr_name\" AND password = \"$user_pwd\"";
      if($res = $conn->query($sql_select)) {
              # since one user_name only cooresponds to one row in the table
	      $row = $res->fetch_assoc();
              # check login status
              if($row["name"] === $name) {
		$is_login = True;
              }
	      # do a iterative search on all the output of the query
	      while($element = current($row)) {
                # if the attribute is user_name, we will omit it
		# otherwise we will print the information
		if(key($row) != $name_KV[$table]){
		  echo key($row).":\t" . $row[key($row)] . "<br></br>";
		}else{
		}
		
		next($row);
	      }
      }
    }
  }


  /* This function will do a trivial query of like table and print all User liked 
     Video information
    Args:  usr_name(string): the user name used to do query
           table(string): the table we are doing query                     */
//   function like_info($usr_name, $table){
//     global $name, $conn, $name_KV, $is_login;

//     if($conn->connect_error) {
//       die("Connection failed: " . $conn->connect_error);
//     } 
//     if($is_login) {
// //       $sql_select = "SELECT * FROM $table WHERE $name_KV[$table] = \"$usr_name\"";
//       $sql_select = "SELECT Video_id FROM likes WHERE name = \"$usr_name\"";
//       if($res = $conn->query($sql_select)) {
//         # one user may like a lot of videos
//         while($row = $res->fetch_assoc()) {
//           $count = 1;
//           echo $count. ".\t";
//           while($element = current($row)) {
//             if(key($row) == $name_KV[$table]){
//             }else if (key($row) == "Video_id"){ 
//               # since print out the video id will not be user friendly
//               # the function will do a second query to search for the Video title of that video id 
//               # and print out it
//               $id = key($row);
// //               $video_query = "SELECT Title FROM Video WHERE id = " . "\"" . $row[$id] . "\"";
// 	      $video_query = "SELECT * FROM Video WHERE id = " . "\"" . $row[$id] . "\"";
//               $query = $conn->query($video_query);
//               $result = $query->fetch_assoc();
//               echo key($result).":\t" . $result[key($result)] . "<br></br>";
//             }else{
//               echo key($row).":\t" . $row[key($row)] . "<br></br>";
//             }
            
//             next($row);
//           }
//           $count += 1;
//         }
//       }
//     }
//   }
	
	
//    function like_info($usr_name, $table){
//     global $name, $conn, $name_KV, $is_login;

//     if($conn->connect_error) {
//       die("Connection failed: " . $conn->connect_error);
//     } 
//     if($is_login) {
//       $sql_select = "SELECT Video_id FROM likes WHERE name = \"$usr_name\"";
//       if($res = $conn->query($sql_select)) {
//        $row = $res->fetch_assoc();
//           while($element = current($row)) {
//               if (key($row) == "Video_id"){ 
//               $id = key($row);
//               $video_query = "SELECT * FROM Video WHERE id = " . "\"" . $row[$id] . "\"";
//               $query = $conn->query($video_query);
//               $result = $query->fetch_assoc();
//               echo key($result).":\t" . $result[key($result)] . "<br></br>";
//             }else{
//               echo key($row).":\t" . $row[key($row)] . "<br></br>";
//             }
            
//             next($row);
//           }        
//       }
//     }
//   }
  function like_info($usr_name, $table){
    global $name, $name_KV, $conn, $is_login;

    if($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }else{
      $sql_select = "SELECT Video_id FROM likes WHERE User_name = \"$usr_name\"";
      if($res = $conn->query($sql_select)) {
        $row = $res->fetch_assoc();
        while($element = current($row)) {
    if(key($row) != $name_KV[$table]){
      echo key($row).":\t" . $row[key($row)] . "<br></br>";
    }else{
    }
    
    next($row);
        }
      }
    }
  }


  /* This function will do a trivial query of subscribe table and print all User subscribe 
    information
  Args:  usr_name(string): the user name used to do query
          table(string): the table we are doing query                     */
  function subscribe_info($usr_name, $table){
    global $name, $conn, $name_KV, $is_login;

    # it is pretty similiar to function 'like_info()'
    if($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    if($is_login) {
      $sql_select = "SELECT * FROM $table WHERE $name_KV[$table] = \"$usr_name\"";
      if($res = $conn->query($sql_select)) {
        while($row = $res->fetch_assoc()) {
          $count = 1;
          echo $count. ".\t";
          while($element = current($row)) {
            if(key($row) == $name_KV[$table]){
            }else if (key($row) == "Channel_id"){
              $id = key($row);
              $channel_query = "SELECT Title FROM Channel WHERE id = "  . $row[$id];
              $query = $conn->query($channel_query);
              $result = $query->fetch_assoc();
              echo key($result).":\t" . $result[key($result)] . "<br></br>";
            }else{
              echo key($row).":\t" . $row[key($row)] . "<br></br>";
            }
            
            next($row);
          }
          $count += 1;

        }
      }
    }
  }


?>

<!-- User title -->
<h1>User: <?php echo $name ?></h1>

<!-- Left Part(Infomation) -->
<section class="container">
  <div class="left-half">
      <h2>Personal Infomation</h2>
      <!-- call the predefined function to echo stuff -->
      <?php person_info($name, $upwd, "User");?>
      <!-- directly parse the name argument to the update interface for update-->
      <form action="phpUpdateForm.php" method="post">
        <input type ="hidden", name="name", value= <?php echo $name?>>
        <button type ="submit">edit</button>
      </form>
  </div>


  <!-- Right Part(Video) -->
  <div class="right-half">
    <article>
      <h2>Liked Video</h2>
      <?php like_info($name, "likes");?>
      <h2>Subscribed Channel</h2>
      <?php subscribe_info($name, "Subscribe");?>
    </article>
  </div>
</secion>



</html>
</body>
