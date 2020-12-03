<!-- navi bar for any page that is in the subdirector in user -->
<html>
<body>

<?php 
function subscribe_info($name_a, $name_b){
    if(strlen($name_a) == 0){
        return $name_b;
    }else{
        return $name_a;
    }
}
?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../main.php">Mini Youtube</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <?php if(strlen($name) == 0 and strlen($usr_name) == 0): ?>
            <li>
                <form id="form_0" action="../main.php" >
                    <a href="javascript:;" onclick="document.getElementById('form_0').submit();">Home</a>
                </form>
            </li>

        <?php else: ?>
            
            <li>
                <form id="form_7" action="../user_interface.php" method="post">
                    <a href="javascript:;" onclick="document.getElementById('form_7').submit();">Personal Info</a>
                        <input type ="hidden", name="name", value= <?php echo subscribe_info($name, $usr_name)?>>
                </form>
            </li>
        <?php endif; ?>
        <li>
            <form id="form_2" action="../videos.php" >
                <a href="javascript:;" onclick="document.getElementById('form_2').submit();">Videos</a>
            </form>
        </li>
        <li>
            <form id="form_3" action="../channels.php" >
                <a href="javascript:;" onclick="document.getElementById('form_3').submit();">Channels</a>
            </form>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if(strlen($name) == 0 and strlen($usr_name) == 0): ?>

        <li>
<!--             <form id="form_5" action="../user_login.html" > -->
                  <form id="form_5" action="../LoginRegistrationForm/index.html" >
                <a href="javascript:;" onclick="document.getElementById('form_5').submit();"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </form>
        </li>

        <?php else: ?>
        <li>
            <form id="form_6" action="../main.php">
                <a href="javascript:;" onclick="document.getElementById('form_6').submit();"><span class="glyphicon glyphicon-log-in"></span> Logout</a>
            </form>
        </li>

        <?php endif; ?>


      </ul>
    </div>
  </div>
</nav>


</body>
</html>
