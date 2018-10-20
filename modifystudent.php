<?php 
  require 'connection.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    
  <title>Steward</title>
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
      <li><a href="steward.php">Home</a></li>                <!--change this to security.html -->
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>View Repairers</b>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="listrepairers.php">View Repairer List</a></li>
          <li><a href="addrepairer.php">Add a repairer</a></li>
          <li><a href="removerepairer.php">Remove a repairer</a></li>
          <li><a href="modifyrepairer.php">Modify repairer details</a></li>
          
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" style="color: white" href="#"><b>View Students</b>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="liststudents.php">View Student List</a></li>
          <li><a href="addstudent.php">Add a student</a></li>
          <li><a href="removestudent.php">Remove a student</a></li>
          <li><a href="modifystudent.php">Modify student details</a></li>
          
        </ul>
      </li>
      <li><a href="assignrepairer.php">Assign Repairer</a></li>
        
    </ul>

  

    <ul class="nav navbar-nav navbar-right">
  <p class="navbar-text"><span class="glyphicon glyphicon-user"></span> <?php 
          $id=$_SESSION['login'];
          $sql= "SELECT Name FROM STEWARD WHERE '$id'=S_id";
          $result = $conn->query($sql);
          $row=$result->fetch_assoc();
          echo $row["Name"]; ?></p>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
  <div class="insert">
  <h2>Enter the reg no. of the student you want to modify</h2>
  <form action="modstud.php" method="post"><br>
Student Reg No: <input type="text" name="RegNo"><br>
<h4>Enter only those values that you want to modify</h4>
Name: <input type="text" name="Name"><br>
Dob: <input type="date" name="Dob"><br>
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
Room No: <input type="number" name="RoomNo"><br>
Contact No: <input type="number" name="PhoneNo"><br>
<input type="submit" name="Save" value="Modify"> 
</form>
</div>

</body>
</html>
