<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css.css">
    <style>
      body {
        background-color: gray;
      }

      input[type=submit] {
      background-color: #4CAF50;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      }

      input[type=submit]:hover {
      background-color: #45a049;
      }

        
      input[type=text] {
      width: 130px;
      box-sizing: border-box;
      border: 2px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
      background-color: white;
      background-image: url('searchicon.png');
      background-position: 10px 10px; 
      background-repeat: no-repeat;
      padding: 12px 20px 12px 40px;
      -webkit-transition: width 0.4s ease-in-out;
      transition: width 0.4s ease-in-out;
      }

      input[type=text]:focus {
      width: 100%;
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
    <a href="comparepage.php">Compare</a>
    <a href="searchmenu.php">Search</a>
    <a href="aboutpage.php">About</a>
    </div>
    
  </div>
` <form action="" method="POST">
  <input type="text" name="search" placeholder="Search.." style="margin-left:30px"><br>

  <input type="submit" name="submit" value="Search" style="margin-left:30px">
  </form>

  <?php
    if(isset($_POST["submit"]) && !empty($_POST["search"])){
      require_once("dbcon.php");
      $search = $_POST["search"];
      $sql = "SELECT * FROM `addcollege` WHERE `collegename` LIKE '$search%'";
      $result = $con->query($sql);
      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
          echo '<div class="college">
      <img src="Images/'.$row['mainimage'].'" alt="collegephoto" width="150" height="150" align ="left">
      <h3 style="height:15px;margin-left: 200px;"><a href="collegepage.php?id='.$row["id"].'">'.$row['collegename'].'</a></h3>
      <p style="height:85px;margin-left: 200px;">'.$row['collegeinfo'].'</p>
      </div> ';
        }
      }
    }
  ?>

  </body>
</html>