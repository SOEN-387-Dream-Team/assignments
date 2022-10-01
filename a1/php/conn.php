<?php
$server = "localhost";
$userName = "root";
$password = "root";
$db = "soen387_school";
$mysqli = new mysqli($server,$userName,$password,$db);

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
echo "Connected successfully";
?>
