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
      </style>
  </head>
  <body>

  <!-- Top navigation -->
  <div class="topnav">

    <!-- Centered link -->
    <div class="topnav-centered">
      <a href="" class="active">COLLEGE PORTAL</a>
    </div>
    
    <!-- Left-aligned links (default) -->
    <a href="loginmenu.php">Menu</a>
  </div>


<form>
<legend class="text" align="center" ><font size="21">USER FEEDBACK LIST</font></legend>
<table align="center" border="1" bardercolor="white">
    <tread>
        <tr>
        <th class="text-center text" width="155px">Firstname</th>
        <th class="text-center text" width="155px">Lastname</th>
        <th class="text-center text" width="155px">College</th>
        <th class="text-center text" width="155px">Rating</th>
        <th class="text-center text" width="155px">Feedback</th>
        </tr>
    </tread>
    <tbody>
        <?php
        require_once('dbcon.php');
        $sql = "SELECT * FROM `feedback`" ;
        
        $result = $con->query($sql);

        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                echo "<tr>";
                echo "<td class='text-center text' width='155px'>".$row['firstname']."</th>";
                echo "<td class='text-center text' width='155px'>".$row['lastname']."</th>";
                echo "<td class='text-center text' width='155px'>".$row['college']."</th>";
                echo "<td class='text-center text' width='155px'>".$row['rating']."</th>";
                echo "<td class='text-center text' width='155px'>".$row['feedback']."</th>";
                echo "<tr>";
            }
        }
        $con->close();
        ?>
</table>

</body>

</style>



</html>
