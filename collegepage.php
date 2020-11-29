<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css.css">
    <style>
      body {
        background-color: gray;
      }
      </style>
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
        <a href="searchmenu.php">Compare</a>
      <a href="searchmenu.php">Search</a>
      <a href="aboutpage.php">About</a>
    </div>
    
  </div>



  <div class="college1">

  <?php
  require_once('dbcon.php');

  $id = $_GET["id"];

  $sql = "SELECT * FROM `addcollege` WHERE `id` = '$id'" ;
          
  $result = $con->query($sql);

  if($result->num_rows>0){
      $row = $result->fetch_assoc();
      echo '<h1 style="text-align:center">'.$row['collegename'].'</h1>
      <div class="row">
        <div class="column">
          <img src="Images/'.$row['image1'].'" alt="Snow" style="width: 454px;height: 454px;">
        </div>
        <div class="column">
          <img src="Images/'.$row['image2'].'" alt="Snow" style="width: 454px;height: 454px;">
        </div>
        <div class="column">
          <img src="Images/'.$row['image3'].'" alt="Snow" style="width: 454px;height: 454px;">
        </div>
        
      </div>
      
      <div style="text-align:center">
      <p >'.$row['collegeinfo'].'</p>
    
      <h2 >Location</h2>
      <p >'.$row['location'].'</p>
    
      <h2>Contact</h2>
      <p>Phone:'.$row['phonecon'].'</p>
      <p>Fax:'.$row['faxcon'].'</p>
      <p>Email:'.$row['emailcon'].'</p>

      <h2>Office Hours</h2>
      <p>'.$row['officehour'].'</p>
    
      <h2>Official Website</h2>
      <a href="'.$row['websitelink'].'" target="_blank">'.$row['collegename'].'</a> 
      <p></p>
      </div> ';
    
  }
  $con->close();
  ?>
  </div>
  </body>
</html>