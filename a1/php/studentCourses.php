<?php
require_once("conn.php");
session_start();


$studentSql ="SELECT * FROM student_courses WHERE id=?";

$stmt = $conn->prepare($studentSql);
$stmt->bind_param("i", $_SESSION['id']);
$stmt->execute();
$result = $stmt->get_result();

if ($result) {
  while( $row = $result->fetch_assoc() ) {
    echo "<option value='".$row['courseCode']."'>".$row['courseCode']."</option>";
  }
  $result->free();
}

?>
