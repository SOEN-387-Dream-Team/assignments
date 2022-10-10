<?php
require_once('conn.php');
if (isset($_POST['create_course_btn'])) {

  foreach ($_POST as $key => $value) {
     echo $key . $value;
 }

  $code = $_POST['code'];
  $title = $_POST['title'];
  $semester = $_POST['semester'];
  $room = $_POST['room'];
  $start = $_POST['start'];
  $end = $_POST['end'];
  $days = $_POST['days'];
  $time = $_POST['time'];
  $instructor = $_POST['instructor'];

  $sql = "INSERT INTO courses VALUES(?,?,?,?,?,?,?,?,?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssssssss", $code, $title, $semester, $room, $start, $end, $days, $time, $instructor);

  if ($stmt->execute()) {
    echo "Course " . $title . " created successfully";
  } else {
    echo $stmt->error;
    echo "Something went wrong. Could not create course";
  }
  header("Refresh:5; url=../html/AdminPage.html");
}
?>
