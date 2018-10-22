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
$sql= "SELECT Hostel FROM STEWARD WHERE '$id'=S_id";
$result = $conn->query($sql);
$row=$result->fetch_assoc();
$hostel = $row['Hostel'];

$cid = $_POST["C_id"];
$sql="SELECT RegNo FROM COMPLAINT WHERE C_id='$cid'";
$result = $conn->query($sql);
$row=$result->fetch_assoc();
$rno=$row["RegNo"];

$sql = "SELECT Hostel FROM STUDENT WHERE RegNo='$rno'";
$result = $conn->query($sql);
$row=$result->fetch_assoc();
$studhostel=$row["Hostel"];


$sql="SELECT Type FROM COMPLAINT WHERE C_id='$cid'";
$result = $conn->query($sql);
$row=$result->fetch_assoc();
if (($studhostel==$hostel) && (!empty($row)))
{
    $type=$row['Type'];

    $sql="SELECT R_id FROM REPAIRER WHERE Type='$type'";
    $result = $conn->query($sql);
    $row=$result->fetch_assoc();
    if (!empty($row))
    {
        $rid=$row['R_id'];
        $sql="SELECT Status FROM COMPLAINT WHERE C_id='$cid'";
        $result = $conn->query($sql);
        $row=$result->fetch_assoc();
        if ($row['Status']!= 'Assigned')
        {
            $sql="UPDATE COMPLAINT SET Status='Assigned', R_id='$rid' WHERE C_id='$cid'";
            if (mysqli_query($conn, $sql)) {
                    echo "Complaint successfully assigned!";
                } 
            else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
        }
        else
          echo "The Complaint has already been assigned to ". $rid;
    }
    else
    {
      echo "Sorry, there aren't any ".$type ."s available! ";
    }
}
else
{
  echo "Invalid COMPLAINT ID!!";
}
?>
</div>
</body>
</html>
