<?php
session_start();
if(session_id()=='' || !isset($_SESSION['login']))
{
  header("Location:login.php");
}


$servername = "localhost";
$user = "root";
$pass = "neethunaina";
$dbname="DBMSproject";

$conn = new mysqli($servername,$user,$pass,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
