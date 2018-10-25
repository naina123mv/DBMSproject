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

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!--<div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div> -->
    <ul class="nav navbar-nav">
      <!-- <li class="active"><a href="#">Home</a></li> -->
      <li><a href="repairer.php">Home</a></li> 
	<li><a href="samrep.php" style="color: white;"><b>View Complaints</b></a></li>                <!--change this to security.html -->
      
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
    <div class="navbar-header">
      <?php
	$id=$_SESSION['login'];
	echo "HI ".$id;
	?>
    </div></div>

<br><br><br><br>
<p>

<?php
 $id=$_SESSION['login'];
$sql="SELECT STUDENT.RegNo,STUDENT.Name,STUDENT.Hostel,STUDENT.RoomNo,COMPLAINT.C_id,COMPLAINT.Issue FROM STUDENT INNER JOIN COMPLAINT ON STUDENT.RegNo=COMPLAINT.RegNo and COMPLAINT.R_id='$id' and COMPLAINT.Status='Assigned'";
$result = $conn->query($sql);
if($result->num_rows > 0)
{
  echo "<center><b><h2>YOUR  TASK(S)  FOR  THE  DAY!!!  SORT THEM OUT QUICKLY</h2></font></b></center>";
  echo "<table>"; 
    echo "<tr><th>Name</th><th>RegNo</th><th>Hostel</th><th>RoomNo</th><th>Issue</th><th>C_id</th></tr>";

  while($row=$result->fetch_assoc())
  {  

    echo "<tr><td>" . $row['Name'] . "</td><td>" . $row['RegNo'] . "</td><td>" . $row['Hostel'] . "</td><td>".$row['RoomNo'] . "</td><td>". $row['Issue'] . "</td><td>" . $row['C_id'] . "</td></tr>"; 
	 
  }
  echo "</table>"; 
}
else
    echo "<h2>No Tasks Assigned Yet!</h2>";

?>


    
  <form action="submitsolved.php" method="POST">   
  <div class="inserttab">
      <h2><b>Enter The Id of the Complaint you have sorted out, if any</b></h2>
    <div class="cid">
    <label>Complaint ID </label>
    <input type="text" placeholder="Enter Complaint ID" name="cid" required>
      </div>
      
      <br>
     <button type="submit" name="add">Submit</button>
    
      <br></div>
     
</form>

</body>
</html>

