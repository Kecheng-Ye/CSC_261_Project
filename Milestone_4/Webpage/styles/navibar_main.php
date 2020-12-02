<!-- navi bar for the main page and the userinterface page in user -->
<html>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="main.php">Mini Youtube</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <?php if(strlen($name) == 0 and strlen($usr_name) == 0): ?>

            <li>
                <form id="form0" action="main.php" >
                    <a href="javascript:;" onclick="document.getElementById('form0').submit();">Home</a>
                </form>
            </li>

        <?php else: ?>
            <li>
                <form id="form1" action="user_interface.php" method="post">
                    <a href="javascript:;" onclick="document.getElementById('form1').submit();">Personal Info</a>
                        <input type ="hidden", name="name", value= <?php echo $name?>>
                </form>
            </li>
        <?php endif; ?>
        <li>
            <form id="form2" action="videos.php" >
                <a href="javascript:;" onclick="document.getElementById('form2').submit();">Videos</a>
            </form>
        </li>
        <li>
            <form id="form3" action="channels.php" >
                <a href="javascript:;" onclick="document.getElementById('form3').submit();">Channels</a>
            </form>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if(strlen($name) == 0 and strlen($usr_name) == 0): ?>

        <li>
<!--             <form id="form5" action="user_login.html" > -->
           <form id="form5" action="LoginRegistrationForm/index.html" >
                <a href="javascript:;" onclick="document.getElementById('form5').submit();"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </form>
        </li>

        <?php else: ?>
        <li>
            <form id="form6" action="main.php">
                <a href="javascript:;" onclick="document.getElementById('form6').submit();"><span class="glyphicon glyphicon-log-in"></span> Logout</a>
            </form>
        </li>

        <?php endif; ?>


      </ul>
    </div>
  </div>
</nav>


</body>
</html>
