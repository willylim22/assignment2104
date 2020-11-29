<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
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

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>

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


<div class="container">
  <form action="" method="POST">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    <label for="college">College</label>
    <select id="college" name="college">
      <option value="INTI">INTI</option>
      <option value="SEGI">SEGI</option>
      <option value="TAYLOY">TAYLOR</option>
      <option value="MSU">MSU</option>
      <option value="DISTED">DISTED</option>
    </select>

    <label for="rating">Rating</label>
    <select id="rating" name="rating">
      <option value="1">1 star</option>
      <option value="2">2 star</option>
      <option value="3">3 star</option>
      <option value="4">4 star</option>
      <option value="5">5 star</option>
    </select>

    <label for="fb">Feedback</label>
    <textarea id="subject" name="fb" placeholder="Write the feedback to the college" style="height:200px"></textarea>

    <input name="submit" type="submit" value="Submit">
  </form>
</div>

</body>
</html>

<?php

if (isset($_POST["submit"])){
    $name  = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $college  = $_POST["college"];
    $rating  = $_POST["rating"];
    $fb  = $_POST["fb"];

    if (empty($name)||empty($lname)||empty($college)||empty($rating)||empty($fb)){
        echo '<script>alert("you need to fill up"); window.location="feedback.php";</script>';
    }else if(!ctype_alpha($name)||!ctype_alpha($lname)){
        echo '<script>alert("alphabet and no spacing"); window.location="feedback.php";</script>';
    }else{
        require_once("dbcon.php");
        $sql = 'INSERT INTO `feedback`( `firstname`, `lastname`, `college`, `rating`, `feedback`) VALUES (\''.$name.'\',\''.$lname.'\',\''.$college.'\',\''.$rating.'\',\''.$fb.'\')';
        $result = $con->query($sql);
        echo '<script>alert("thanks to your feedback rating"); window.location="feedback.php";</script>';
    }
}

?>