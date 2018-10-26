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
        <a class="dropdown-toggle" data-toggle="dropdown" style="color: white" href="#"><b>View Repairers</b>
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="listrepairers.php">View Repairer List</a></li>
          <li><a href="addrepairer.php">Add a repairer</a></li>
          <li><a href="removerepairer.php">Remove a repairer</a></li>
          <li><a href="modifyrepairer.php">Modify repairer details</a></li>
          
        </ul>
      </li>
     <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">View Students
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
<div class="container">
<?php
$flag = 0;
$rid=$_POST["R_id"];
$sql="SELECT Name FROM REPAIRER WHERE R_id='$rid'";
mysqli_query($conn,$sql);
if (mysqli_affected_rows($conn)!=0)
{
    $name=$_POST["Name"];
    $type=$_POST["Type"];
    $phone=$_POST["PhoneNo"];
    if(!empty($name))
      { $sql = "UPDATE REPAIRER SET Name='$name' WHERE R_id='$rid'";
              if (mysqli_query($conn, $sql)) {
            $flag=1;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
      }
    if(!empty($type))
      { $sql = "UPDATE REPAIRER SET Type='$type' WHERE R_id='$rid'";
              if (mysqli_query($conn, $sql)) {
            $flag=1;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
      }
    if(!empty($phone))
      { $sql = "UPDATE REPAIRER SET PhoneNo='$phone' WHERE R_id='$rid'";
              if (mysqli_query($conn, $sql)) {
            $flag=1;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
      }
      
      if ($flag == 1)
          echo "Recod modified successfully";
        else
    {
      echo "Nothing changed to modify";

    }
      
}
else
    echo "Record Not Found!!";

?>
</div>
</body>
</html>
