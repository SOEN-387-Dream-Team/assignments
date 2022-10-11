<?php
require_once('conn.php');
session_start();
if (isset($_POST['drop_course_btn'])) {

  $course = $_POST['dropCode'];
  $id = $_SESSION['id'];

  // Validate if course can be dropped

  $sql = "SELECT * FROM student_courses WHERE courseCode=UPPER(?) AND id=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("si", $course, $id);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows < 1) { // student not enrolled
    echo "You cannot drop this course as you are not currently enrolled in this course";
  }
  else {

     //Purpose of this sql is to check if we are within the end date of the course to drop the course
    $dateSql = "SELECT endDate 
                FROM courses c 
                WHERE CURDATE() < c.endDate
                AND c.courseCode = UPPER(?)";

    $stmt = $conn->prepare($dateSql);
    $stmt->bind_param("s", $course);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0)
    {
      $sql = "DELETE FROM student_courses WHERE courseCode=UPPER(?) AND id=?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("si", $course, $id);
  
      if ($stmt->execute()) {
        echo "Course " . strtoupper($course) . " dropped successfully";
      } else {
        echo $stmt->error;
        echo "\nSomething went wrong. Could not drop course";
      }
    }
    else
    {
        echo "Requirements for course drop not met: You have passed the deadline to drop this course.";
    }
  }
  header("Refresh:5; url=../html/StudentPage.html");
}
?>
