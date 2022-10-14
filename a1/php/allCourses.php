<?php
require_once("conn.php");
session_start();


$coursesSQL ="SELECT * FROM courses";

$stmt = $conn->prepare($coursesSQL);
$stmt->execute();
$result = $stmt->get_result();
echo "<option disabled selected value> -- select a course -- </option>";
if ($result) {
  while( $row = $result->fetch_assoc() ) {
    echo "<option value='".$row['courseCode']."'>".$row['courseCode']."</option>";
  }
  $result->free();
}

?>
