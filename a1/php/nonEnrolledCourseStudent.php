<?php
require_once("conn.php");
session_start();

$studentSql ="SELECT * FROM courses WHERE courseCode NOT IN (SELECT courseCode from student_courses WHERE id=?)
              AND semester=?";

$stmt = $conn->prepare($studentSql);
$stmt->bind_param("is", $_SESSION['id'], $_GET['semesterValue'] );
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
