<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css.css">

<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 5px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}



.title {
  color: grey;
}


@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
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

<div class="about-section">
  <h1>About</h1>
  <p>We are GROUP12.We hope that this College portal can help the student choose their flavor college</p>
  <p>This website will show the information of each college to the let the student can know which college more suitable</p>
</div>

<h2 style="text-align:center">Our Group Member</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="picture/unknown.jpg" alt="Jane" style="width:30%">
      <div class="container">
        <h2>DIVESH</h2>
        <p class="title">PROGRAMMER</p>
        <p>The person focus on programming and also chacking on coding error</p>
        <p>divesh@example.com</p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="picture/unknown.jpg" alt="Mike" style="width:30%">
      <div class="container">
        <h2>WEOI LEE</h2>
        <p class="title">CSS DESINER</p>
        <p>CSS Desiner.Focus on the CSS part</p>
        <p>willy@example.com</p>
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <img src="picture/unknown.jpg" alt="John" style="width:30%">
      <div class="container">
        <h2>FONG HOU</h2>
        <p class="title">WRITER</p>
        <p>Focus on writing this website report</p>
        <p>SimFH@example.com</p>
      </div>
    </div>
  </div>
</div>

</body>
</html>