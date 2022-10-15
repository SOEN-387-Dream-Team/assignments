<?php
$server = "localhost";
$userName = "root";
$password = "root";
$db = "soen387_school";

$conn = new mysqli($server,$userName,$password,$db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
