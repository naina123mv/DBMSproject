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
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">View Repairers
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="listrepairers.php">View Repairer List</a></li>
          <li><a href="addrepairer.php">Add a repairer</a></li>
          <li><a href="removerepairer.php">Remove a repairer</a></li>
          <li><a href="modifyrepairer.php">Modify repairer details</a></li>
          
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown"  href="#"><b>View Students</b>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="liststudents.php">View Student List</a></li>
          <li><a href="addstudent.php">Add a student</a></li>
          <li><a href="removestudent.php">Remove a student</a></li>
          <li><a href="modifystudent.php">Modify student details</a></li>
          
        </ul>
      </li>
      <li><a style="color: white" href="assignrepairer.php"><b>Assign Repairer</b></a></li>
        
    </ul>

  

    <ul class="nav navbar-nav navbar-right">
  <p class="navbar-text"><span class="glyphicon glyphicon-user"></span> <?php 
          $id=$_SESSION['login'];
          $sql= "SELECT * FROM STEWARD WHERE '$id'=S_id";
          $result = $conn->query($sql);
          $row=$result->fetch_assoc();
          echo $row["Name"]; ?></p>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
  <div class="viewstud">
<?php
 $id=$_SESSION['login'];
          $sql= "SELECT * FROM STEWARD WHERE '$id'=S_id";
          $result = $conn->query($sql);
          $row=$result->fetch_assoc();
          $hostl=$row["Hostel"];
$sql = "SELECT * FROM COMPLAINT WHERE Status != 'solved' ORDER BY Date DESC ";
$result = $conn->query($sql);
echo "<h3><b>";
echo "List of complaints registered in your hostel(". $row["Hostel"].")";
echo "</b></h3>";
if ($result->num_rows > 0) {
    // output data of each row

    echo "<table>"; 

        echo "<tr><th>COMPLAINT_ID</th><th>STUDENT REG_NO</th><th>TYPE</th><th>DATE</th><th>ISSUE</th><th>STATUS</th><th>REPAIRER_ID</th></tr>";
        while($row=$result->fetch_assoc())
        { $rno= $row['RegNo'];
              $sql = "SELECT * FROM STUDENT WHERE RegNo='$rno' and Hostel='$hostl'";
              mysqli_query($conn, $sql);
              if (mysqli_affected_rows($conn) != 0)
              {
          echo "<tr><td>" . $row['C_id'] . "</td><td>".$row['RegNo'] . "</td><td>". $row['Type'] . "</td><td>". $row['Date'] . "</td><td>". $row['Issue'] . "</td><td>".$row['Status'] . "</td><td>".$row['R_id'] . "</td></tr>"; 
            }
        }
        echo "</table>"; 
} 
else {
    echo "0 results";
}

?>
<form action="assign.php" method="post"><br>
<h3><b>Enter the Id of the complaint to be assigned to appropriate repairer</b></h3>
Complaint Id: <input type="text" name="C_id" required> <br>
  <button type="submit" name="assign">Assign</button>
  <br><br>
</div>

</body>
</html>
