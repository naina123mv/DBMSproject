<?php 
require 'connection.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    
  <title>Master</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/stewardstyle.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!--<div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div> -->
    <ul class="nav navbar-nav">
      <!-- <li class="active"><a href="#">Home</a></li> -->
      <li><a href="masterview.php">Home</a></li>                <!--change this to security.html -->
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" style="color: white" href="#"><b>View Stewards</b>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="liststewards.php">View Steward List</a></li>
          <li><a href="addsteward.php">Add a steward</a></li>
          <li><a href="removesteward.php">Remove a steward</a></li>
          <li><a href="modifysteward.php">Modify steward</a></li>
          
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">View Students
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="listallstudents.php">View Student List</a></li>
          
        </ul>
      </li>
        
    </ul>

  

    <ul class="nav navbar-nav navbar-right">
  <p class="navbar-text"><span class="glyphicon glyphicon-user"></span> <?php 
          echo "Master"; ?></p>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<div class="insert">
  <h2>Enter the id of the steward you want to modify</h2>
  <form action="modward.php" method="post"><br>
Steward Id: <input type="text" name="S_id" required=""><br>
<h4>Enter new details</h4>
Name: <input type="text" name="Name"><br>
Hostel: <input type="radio" name="Hostel" value="LH-Blk1"> LH-Blk1<br>
  <input type="radio" name="Hostel" value="LH-Blk2"> LH-Blk2<br>
  <input type="radio" name="Hostel" value="LH-Blk3"> LH-Blk3<br>
  <input type="radio" name="Hostel" value="LH-Blk4"> LH-Blk4<br>
  <input type="radio" name="Hostel" value="MHL"> MHL<br>
  <input type="radio" name="Hostel" value="A"> A<br>
  <input type="radio" name="Hostel" value="B"> B<br>
  <input type="radio" name="Hostel" value="C"> C<br>
  <input type="radio" name="Hostel" value="D"> D<br>
  <input type="radio" name="Hostel" value="E"> E<br>
  <input type="radio" name="Hostel" value="F"> F<br>
  <input type="radio" name="Hostel" value="G"> G<br>
  <input type="radio" name="Hostel" value="MBH"> MBH<br>
Contact No: <input type="number" name="PhoneNo"><br>
  <button type="submit" name="modify">Modify</button>
</form>
</div>

</body>
</html>
