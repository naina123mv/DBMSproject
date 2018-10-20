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
  <div class="view">
  <h3>List of Stewards</h3>
<?php
$sql = "SELECT * FROM STEWARD";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    echo "<table>"; 

        echo "<tr><th>StewardID</th><th>Name</th><th>Hostel</th><th>PhoneNo</th></tr>";
        while($row=$result->fetch_assoc())
        {  
                echo "<tr><td>" . $row['S_id'] . "</td><td>". $row['Name'] . "</td><td>". $row['Hostel'] . "</td><td>". $row['PhoneNo'] . "</td></tr>";  
        }
        echo "</table>"; 
} 
else {
    echo "0 results";
}

?>
</div>
</body>
</html>
