<?php
require_once('conn.php');
include 'header.php';
include 'navbar.php';
if (isset($_POST['drop_course_btn'])) {

  $course = $_POST['dropCode'];
  $id = $_SESSION['id'];

  // Validate if course can be dropped

  $sql = "SELECT * FROM student_courses WHERE courseCode=UPPER(?) AND id=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("si", $course, $id);
  $stmt->execute();
  $result = $stmt->get_result();
  // Student is enrolled in course
  if ($result->num_rows > 0) {

     //Purpose of this sql is to check if we are within the end date of the course to drop the course
    $dateSql = "SELECT *
                FROM courses c
                WHERE CURDATE() < c.endDate
                AND c.courseCode = UPPER(?)";

    $stmt = $conn->prepare($dateSql);
    $stmt->bind_param("s", $course);
    $stmt->execute();
    $result = $stmt->get_result();
    // We are on time to drop
    if($result->num_rows > 0) {
      $sql = "DELETE FROM student_courses WHERE courseCode=UPPER(?) AND id=?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("si", $course, $id);
      if ($stmt->execute()) {
        // Drop course
        echo '<div class="alert alert-success">';
        echo "<strong>Course {$course} dropped successfully</strong>";
        echo "</div>";
      }
      else {
        // Any error dropping course
        echo '<div class="alert alert-danger">';
        echo "<strong>Something went wrong. Could not drop course {$course} <br> {$stmt->error}</strong>";
        echo "</div>";
      }
    }
    // Deadline to drop passed
    else {
      echo '<div class="alert alert-danger">';
      echo "<strong>Deadline to drop already passed. Could not drop course {$course} <br> {$stmt->error}</strong>";
      echo "</div>";
    }
  // user not enrolled in course
  } else {
    echo '<div class="alert alert-danger">';
    echo "<strong>You are not enrolled in course. Could not drop course {$course} <br> {$stmt->error}</strong>";
    echo "</div>";
  }
  header("Refresh:5; url=../html/StudentPage.php");
}
?>
