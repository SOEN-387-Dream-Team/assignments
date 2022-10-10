<?php
require_once('conn.php');

if (isset($_POST['drop_course_btn'])) {

  $course = $_POST['course'];
  $id = $_SESSION['id'];

  // Validate if course can be dropped

  $sql = "SELECT * FROM student_courses WHERE courseCode=? AND id=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("si", $course, $id);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows < 1) { // student not enrolled
    echo "You are not currently enrolled in this course";
  }
  else {
    $sql = "DELETE FROM student_courses WHERE courseCode=? AND id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $course, $id);

    if ($stmt->execute()) {
      echo "Course " . $course . " dropped successfully";
    } else {
      echo $stmt->error;
      echo "\nSomething went wrong. Could not drop course";
    }
  }
  header("Refresh:5; url=../html/StudentPage.html");
}
?>
