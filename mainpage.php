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



  <div class="college1">

  <?php
  require_once('dbcon.php');
  $sql = "SELECT * FROM `addcollege`" ;
          
  $result = $con->query($sql);

  if($result->num_rows>0){
  while($row=$result->fetch_assoc()){
      echo '<div class="college">
      <img src="Images/'.$row['mainimage'].'" alt="collegephoto" width="150" height="150" align ="left">
      <h3 style="height:15px;margin-left: 200px;"><a href="collegepage.php?id='.$row["id"].'">'.$row['collegename'].'</a></h3>
      <p style="height:85px;margin-left: 200px;">'.$row['collegeinfo'].'</p>
      </div> ';
    }
  }
  $con->close();
  ?>
  </div>
  </body>
</html>