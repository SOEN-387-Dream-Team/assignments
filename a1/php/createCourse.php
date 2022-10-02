<?php
include('conn.php');
global $conn;

if (isset($_POST['create_course_button'])) {
  $code = $_POST['code'];
  $title = $_POST['title'];
  $semester = $_POST['semester'];
  $days = $_POST['days'];
  $time = $_POST['time'];
  $instructor = $_POST['instructor'];
  $room = $_POST['room'];
  $start = $_POST['start'];
  $end = $_POST['end'];

  $sql = "INSERT INTO courses VALUES(?,?,?,?,?,?,?,?,?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssssssss", $code, $title, $semester, $days, $time, $instructor, $room, $start, $end);

  if ($stmt->execute()) { // course created successfully
    echo "Course " . $title . " created successfully";
    sleep(3);
    header('location: ../html/AdminOptions.html')
  }
  else{
    echo "Something went wrong. Could not create course";
  }
}
?>
