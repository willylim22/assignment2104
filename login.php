<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css.css">
  </head>
  <body>

  <!-- Top navigation -->
  <div class="topnav">

    <!-- Centered link -->
    <div class="topnav-centered">
      <a href="mainpage.php" class="active">COLLEGE PORTAL</a>
    </div>
    
    <!-- Left-aligned links (default) -->
    <a href="login.php">Login</a>
    <a href="feedback.php">Feedback</a>
    
    <!-- Right-aligned links -->
    <div class="topnav-right">
    <a href="comparepage.php">Compare</a>
      <a href="searchmenu.php">Search</a>
      <a href="aboutpage.php">About</a>
    </div>
    
  </div>

  <form action="" method="post">
    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>
  
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
          
      <button type='submit' name='submit' value='login'>LOGIN</button>
      
    </div>
  </form>

</body>
</html>


<?php

if (isset($_POST["submit"])){
    $name  = $_POST["uname"];
    $password1 = $_POST["psw"];

    $uppercase = preg_match('@[A-Z]@',$password1);
    $lowercase = preg_match('@[A-Z]@',$password1);
    $number = preg_match('@[0-9]@',$password1);

    if (empty($name)||empty($password1)){
        echo '<script>alert("you need to key in something"); window.location="login.php";</script>';
    }else if(!ctype_alpha($name)){
        echo '<script>alert("alphabet only and no spacing"); window.location="login.php";</script>';
    }else if (!$uppercase|| !$lowercase|| !$number||strlen($password1)<8){
      echo '<script>alert("password must include uppercase, lowercase, number and also must more than 8 digit"); window.location="login.php";</script>';
    }else{
        require_once("dbcon.php");
        $sql = 'SELECT * FROM `user` WHERE `username`= \''.$name.'\' AND `password`=\''.$password1.'\'';
        $result = $con->query($sql);
        if(!$result || $result->num_rows == 0){
        echo '<script>alert("incorrect username or password"); window.location="login.php";</script>' ;
    }else
        echo '<script>alert("log in"); window.location="loginmenu.php";</script>';
    }
}

?>