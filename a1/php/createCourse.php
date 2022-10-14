<?php
require_once('conn.php');
include 'header.php';
include 'navbar.php';
if (isset($_POST['create_course_btn'])) {

  $code = $_POST['code'];
  $title = $_POST['title'];
  $semester = $_POST['semester'];
  $room = $_POST['room'];
  $days = $_POST['weekday'];
  $time = $_POST['time'];
  $instructor = $_POST['instructor'];

  $start = '';
  $end = '';

  // Logic for start and end date based on semester
  if ($semester === "FALL-2022") {
    $start = '2022-10-09';
    $end = '2022-12-31';
  }
  else if ($semester === "WINTER-2023") {
    $start = '2023-01-05';
    $end = '2023-04-30';
  }
  else if ($semester === "SUMMER1-2023") {
    $start = '2023-05-01';
    $end = '2023-08-31';
  }
  else if ($semester === "SUMMER2-2023") {
    $start = '2023-06-01';
    $end = '2023-08-31';
  }

  $sql = "INSERT INTO courses VALUES(?,?,?,?,?,?,?,?,?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssssssss", $code, $title, $semester, $room, $start, $end, $days, $time, $instructor);

  if ($stmt->execute()) {
    echo '<div class="alert alert-success">';
    echo "<strong>Course {$title} created successfully</strong>";
    echo "</div>";
  } else {
    echo '<div class="alert alert-danger">';
    echo "<strong>Something went wrong. Could not create course {$title} <br> {$stmt->error}</strong>";
    echo "</div>";
  }
  header("Refresh:5; url=../html/AdminPage.php");
}
?>
