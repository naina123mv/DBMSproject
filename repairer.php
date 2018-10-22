<?php 
require 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
  <title>Hostel Complaints</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/stewardstyle.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
<body>
<div id="backgroundpg"></div>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!--<div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div> -->
    <ul class="nav navbar-nav">
      <!-- <li class="active"><a href="#">Home</a></li> -->
      <li><a href="repairer.php"><b>Home</b></a></li> 
	<li><a href="samrep.php">View Complaints</a></li>                <!--change this to security.html -->
      
    </ul>

    <ul class="nav navbar-nav navbar-right">
  <p class="navbar-text"><span class="glyphicon glyphicon-user"></span> <?php 
          $id=$_SESSION['login'];
          $sql= "SELECT Name FROM REPAIRER WHERE '$id'=R_id";
          $result = $conn->query($sql);
          $row=$result->fetch_assoc();
          echo $row["Name"]; ?></p>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<!--<nav class="navbar navbar-inverse navbar-fixed-top">-->
  <div class="container-fluid">
	<br><br><br><br><br><p>
	<font size=12>Welcome</font><br>
      <?php
	echo "<h2>" . $row["Name"]."</h2>";
	?></p>
    </div>
    
    

</body>
</html>

