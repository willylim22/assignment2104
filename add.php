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

input[type=button] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=button]:hover {
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
          <a href="" class="active">COLLEGE PORTAL</a>
        </div>
        
        <!-- Left-aligned links (default) -->
        <a href="loginmenu.php">Menu</a>

        
      </div>


<div class="container">
  <form action="" method="POST" enctype="multipart/form-data">
    <label for="colname">College Name</label>
    <input type="text" id="colname" name="colname" placeholder="college name">

        Select 3  image to upload:<br>main image: 
        <input type="file" name="main" id="fileToUpload">
        <br>image1:
        <input type="file" name="main1" id="1">
        <br>image2: 
        <input type="file" name="main2" id="2">
        <br>image2: 
        <input type="file" name="main3" id="3">
    <br>
    
    <label for="infocol">Info of the college</label>
    <textarea id="infocol0" name="infocol" placeholder="Write the info of the college" style="height:200px"></textarea>

    <label for="location">Location of the college</label>
    <input type="text" id="location" name="location" placeholder="location">

    
    <label for="contact">Contact</label>
    <input type="text" id="contact" name="contact" placeholder="phone">
    <input type="text" id="fax" name="fax" placeholder="fax">
    <input type="text" id="email" name="email" placeholder="email">
    
    <label for="officehour">Office hour </label>
    <input type="text" id="officehour" name="officehour" placeholder="officehour">

    <label for="offweb">Official website link</label>
    <input type="text" id="offweb" name="offweb" placeholder="official website link">

    <input type="submit" name="submit" value="Submit">
  </form>
</div>

</body>
</html>

<?php

if (isset($_POST["submit"])){
    $colname  = $_POST["colname"];
    $info  = $_POST["infocol"];
    $locate  = $_POST["location"];
    $contact  = $_POST["contact"];
    $fax  = $_POST["fax"];
    $email  = $_POST["email"];
    $office  = $_POST["officehour"];
    $weblink  = $_POST["offweb"];
    
    $targetDir = "Images/";
    $fileName = basename($_FILES["main"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    $fileName1 = basename($_FILES["main1"]["name"]);
    $targetFilePath1 = $targetDir . $fileName1;
    $fileType1 = pathinfo($targetFilePath1,PATHINFO_EXTENSION);

    $fileName2 = basename($_FILES["main2"]["name"]);
    $targetFilePath2 = $targetDir . $fileName2;
    $fileType2 = pathinfo($targetFilePath2,PATHINFO_EXTENSION);

    $fileName3 = basename($_FILES["main3"]["name"]);
    $targetFilePath3 = $targetDir . $fileName3;
    $fileType3 = pathinfo($targetFilePath3,PATHINFO_EXTENSION);

    var_dump($_FILES);

    if(empty($_FILES["main"]["name"])|| empty ($_FILES["main1"]["name"])|| empty ($_FILES["main2"]["name"]) || empty ($_FILES["main3"]["name"])){
      echo '<script>alert("no image detect"); window.location="add.php";</script>';
    }else if (empty($colname)||empty($info)||empty($locate)||empty($contact)||empty($weblink)){
        echo '<script>alert("you need to fill up COLLEGE NAME, COLLEGE INFO, COLLEGE LOCATION and COLLEGE WEBSITE LINK"); window.location="add.php";</script>';
    } else {
        $allowTypes = array ('jpg','png','jpeg');
        if (in_array($fileType,$allowTypes)){
          if(move_uploaded_file($_FILES["main"]["tmp_name"],$targetFilePath) && 
            move_uploaded_file($_FILES["main1"]["tmp_name"],$targetFilePath1)&& 
            move_uploaded_file($_FILES["main2"]["tmp_name"],$targetFilePath2)&& 
            move_uploaded_file($_FILES["main3"]["tmp_name"],$targetFilePath3)
            ){
            require_once("dbcon.php");
            $sql = 'INSERT INTO `addcollege`(`collegename`, `mainimage`, `image1`, `image2`, `image3`, `collegeinfo`, `location`, `phonecon`, `faxcon`, `emailcon`, `officehour`, `websitelink`) VALUES
             (\''.$colname.'\',\''.$fileName.'\',\''.$fileName1.'\',\''.$fileName2.'\',\''.$fileName3.'\',\''.$info.'\',\''.$locate.'\',\''.$contact.'\',\''.$fax.'\',\''.$email.'\',\''.$office.'\',\''.$weblink.'\')';
            $result = $con->query($sql);
          echo '<script>alert("Added!!!"); window.location="add.php";</script>';
          }
        }else{
          echo '<script>alert("only jpg,jpeg,png files allowed."); window.location="add.php";</script>';
        }

    }
}



?>