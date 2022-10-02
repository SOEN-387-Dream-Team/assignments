<?php
include('./conn.php');

function create_course($code, $title, $semester, $days, $time, $instructor, $room, $start, $end) {
  $query = "INSERT INTO Courses VALUES ($code, $title, $semester, $days, $time, $instructor, $room, $start, $end)";
  // Perform Query
  $result = perform_query($query);

  return $result;

}

function register_course($student, $course_code){
  $query = "";
  $result = perform_query($query);

  return $result;
}

function get_students_from_course($course_code){
  $query = "";
  $result = perform_query($query);

  return $result;
}

function get_courses_from_student($student){
  $query = "";
  $result = perform_query($query);

  return $result;
}

function perform_query($query) {

  $result = mysqli_query($query);

  if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
  }

  return $result;
}
?>
