<?php 
session_destroy();
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    
  <title>MASTERLogin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/loginstyle.css">
 </head>



<body>

<div id="backgroundmaster"></div>

<a href="index.php"><button type="button" class="cancelbtn">Home</button></a>
    
  <form action="masterlogin.php" method="POST">   <!-- was security.php -->
  <div class="container">
      <h1>Login</h1>
    <div class="uname">
    <label><b>User Name </b></label>
    <input type="text" placeholder="Enter your username" name="uname" required>
      </div>
      <br>
      <div class="passwd">
    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
      </div> 
      
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

      $sql= "SELECT * FROM MASTER WHERE '$id'=ID and '$password'=PASSWD";
      $result = $conn->query($sql);
    if($result->num_rows > 0)
    {
    $_SESSION['login']=$_POST['uname'];
    header("Location:masterview.php");
    }
    else
          echo '<script> alert("Authentication failed. Try again")</script>';
      


$conn->close();
}
if(isset($_POST['login']))
{
   logins();
} 
?>
</body>
</html>
