<?php
$server = "localhost";
$userName = "root";
$password = "root";
$db = "soen387school";

$conn = mysqli_connect($server,$userName,$password,$db);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>
