<?php 
session_destroy();
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/loginstyle.css">
 </head>



<body>

<div id="background"></div>

<a href="index.php"><button type="button" class="cancelbtn"><b>HOME</b></button></a>
<a href="masterlogin.php"> <button class="adminbtn" ><b>ADMIN</b></button></a>
  <button class="helpbtn" onclick="loginguide()"><b>HELP</b></button>

<script>
function loginguide() {
    alert("\t \t \t \t \tLOGIN GUIDE \nStudent: Username - roll number ; Password - Dob in the format yyyy-mm-dd\nSteward: Username - id; Password - Phone number\nRepairer: Username - id ; Password : Phone number");
}
</script>  
  <form action="login.php" method="POST">   <!-- was security.php -->
  <div class="container">
      <h1>LOGIN</h1>
    <div class="uname">
    <label><b>Username </b></label>
    <input type="text" placeholder="Enter your username" name="uname" required>
      </div>
      <br>
      <div class="passwd">
    <label><b> Password </b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
      </div> 
      <div class="select">
          <label for="designation"><b>Designation</b></label>
    <select id="designation" name="who">
	<option value="Student">Student</option>
      <option value="Steward">Steward</option>
      <option value="Repairer">Repairer</option>
      
    </select>
      </div>
      <br>
      <br>
      <br>
      <br>
      
    <button type="submit" name="login">Login</button>
      <br>
  </div>
      

</form>

<?php

function logins(){
$servername = "localhost";
$user = "root";
$pass = "neethunaina";
$dbname="DBMSproject";

$conn = new mysqli($servername,$user,$pass,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$id=$_POST["uname"];
$password=$_POST["psw"];
$who=$_POST["who"];


if(strcmp($who, "Student")==0)    
    {
    	//$gate=$_POST["gate"];
    	$sql= "SELECT * FROM STUDENT WHERE '$id'=RegNo and '$password'=Dob";
    	$result = $conn->query($sql);
		if($result->num_rows > 0)
		{
    		
		while($row=$result->fetch_assoc()) 
    		{

      
				//$s1="UPDATE Security SET gate='$gate' WHERE '$id'=SecurityID";
				//if($conn->query($s1) === TRUE) ;
					;		
				//else;
					
      		}
		$_SESSION['login']=$_POST['uname'];
		header("Location:student.php");
		}
		else
    			echo '<script> alert("Authentication failed. Try again")</script>';
      
    }
	
else if(strcmp($who, "Steward")==0)
	{ 
		$sql= "SELECT * FROM STEWARD WHERE '$id'=S_id and '$password'=PhoneNo";
    	$result = $conn->query($sql);
    	if($result->num_rows>0){
        $_SESSION['login']=$_POST['uname'];
    		header("Location:steward.php");
      }
		
		else
    			echo '<script> alert("Authentication failed. Try again")</script>';
      
    }

  else if(strcmp($who, "Repairer")==0)
  { 
    $sql= "SELECT * FROM REPAIRER WHERE '$id'=R_id and '$password'=PhoneNo";
      $result = $conn->query($sql);
      if($result->num_rows>0){
        $_SESSION['login']=$_POST['uname'];
        header("Location:repairer.php");
      }
    
    else
          echo '<script> alert("Authentication failed. Try again")</script>';
      
    }

$conn->close();
}
if(isset($_POST['login']))
{
   logins();
} 
?>


</body>
    

    
  

</html>
