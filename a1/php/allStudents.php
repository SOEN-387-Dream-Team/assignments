<?php
require_once("conn.php");
session_start();


$studentSql ="SELECT * FROM user WHERE isAdmin=0";

$stmt = $conn->prepare($studentSql);
$stmt->execute();
$result = $stmt->get_result();
echo "<option disabled selected value> -- select a student -- </option>";
if ($result) {
  while( $row = $result->fetch_assoc() ) {
    $name = $row['firstName'] . " " . $row['lastName'];
    echo "<option value='" . $name . "'>" . $name . "</option>";
  }
  $result->free();
}

?>
