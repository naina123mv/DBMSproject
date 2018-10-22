<?php 
  require 'connection.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    
  <title>Student</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/studentstyle.css">
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
      <li><a style="color: white" href="student.php"><b>Home</b></a></li>                <!--change this to security.html -->
        
    </ul>
    <ul class="nav navbar-nav navbar-right">
	<p class="navbar-text"><span class="glyphicon glyphicon-user"></span> <?php 
          $id=$_SESSION['login'];
          $sql= "SELECT Name FROM STUDENT WHERE '$id'=RegNo";
          $result = $conn->query($sql);
          $row=$result->fetch_assoc();
          echo $row["Name"]; ?></p>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>

<div class="container">
<?php
$type=$_POST["Type"];
$id=$_SESSION['login'];

$issue=$_POST["Issue"];
$sql = "INSERT INTO COMPLAINT (Issue, Type, RegNo,Status) VALUES ( '$issue', '$type','$id','Unassigned')";

if (mysqli_query($conn, $sql)) {
    echo "Complaint added into records successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>
</div>
</body>
</html>
