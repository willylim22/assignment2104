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
    
    
    
    <form action="" method="POST">
    <label for="cars">Choose a college:</label>
    <select name="college1" id="cars">
    <?php
    include('dbcon.php');
    $sql = "SELECT * FROM `addcollege`" ;
            
    $result = $con->query($sql);

    if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        echo ' <option value="'.$row['id'].'">'.$row['collegename'].'</option>';
        }
    }
    ?>
    </select>
    <label>compare with</label>

    <select name="college2" id="cars">
    <?php
    $sql = "SELECT * FROM `addcollege`" ;
            
    $result = $con->query($sql);

    if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        echo ' <option value="'.$row['id'].'">'.$row['collegename'].'</option>';
        }
    }
    ?>
    </select>

    <br><br>
    <input type="submit" value="Submit" name="submit">
    </form>

    
        <?php
        if(isset($_POST["submit"])){

            echo '<legend class="text" align="center" ><font size="21">COMPARE 2 COLLEGE</font></legend>
        <table align="center" border="1" bardercolor="white">
        <thead>
            <tr>
            <th class="text-center text" width="155px">college name</th>
            <th class="text-center text" width="155px">image</th>
            <th class="text-center text" width="155px">info</th>
            <th class="text-center text" width="155px">location</th>
            </tr>
        </thead>
        <tbody>';
            $college1 = $_POST["college1"];
            $college2 = $_POST["college2"];
            $sql = "SELECT * FROM `addcollege` WHERE `id` = '$college1' OR `id` = '$college2'" ;
        
            $result = $con->query($sql);

            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td class='text-center text' width='155px'>".$row['collegename']."</td>";
                    echo "<td class='text-center text' width='155px'><img src='Images/".$row['mainimage']."' style=\"width: 300px;height: 300px;\"></td>";
                    echo "<td class='text-center text' width='155px'>".$row['collegeinfo']."</td>";
                    echo "<td class='text-center text' width='155px'>".$row['location']."</td>";
                    echo "<tr>";
                }
            }

            echo "</tbody></table>";

        }
        
        ?>

    </body>
</html>