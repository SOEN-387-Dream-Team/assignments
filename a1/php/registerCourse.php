<?php
require_once('conn.php');
include 'header.php';
include 'navbar.php';
    if (isset($_POST['addCourse'])) {
        $student = $_SESSION['id'];
        $course = $_POST['courseCode'];
        $currentDate = date('Y-m-d');
        $semesterChosen = $_POST['semesterChoice'];

        // Check max 5 courses per semester

        $numEnroll = "SELECT *
                      FROM student_courses s
                      INNER JOIN courses c
                      ON s.courseCode = c.courseCode
                      WHERE s.id = ? AND c.semester = ?";

        $stmt = $conn->prepare($numEnroll);
        $stmt->bind_param("is", $student, $semesterChosen);
        $stmt->execute();
        $result = $stmt->get_result();
        $numRows = $result->num_rows;

        // If less than 5 courses registered
        if($numRows < 5) {
            //Purpose of this sql is to check if we are within the 1 week time limit to add the course
            $dateSql = "SELECT startDate
                        FROM courses c
                        WHERE CURDATE() < DATE_ADD(c.startDate, INTERVAL 7 DAY)
                        AND c.courseCode = UPPER(?)";

            $stmt = $conn->prepare($dateSql);
            $stmt->bind_param("s", $course);
            $stmt->execute();
            $result = $stmt->get_result();

            // We are on time to register
            if($result->num_rows > 0) {
                $sql = "INSERT INTO student_courses(id, courseCode) VALUES(?, UPPER(?))";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("is", $student, $course);
                if ($stmt->execute()) {
                    echo '<div class="alert alert-success">';
                    echo "<strong>Course {$course} enrolled to successfully</strong>";
                    echo "</div>";
                } else {
                  echo '<div class="alert alert-danger">';
                  echo "<strong>Something went wrong. Could not enroll into course {$course} <br> {$stmt->error}</strong>";
                  echo "</div>";
                }
            // Not on time to register
            } else {
              echo '<div class="alert alert-danger">';
              echo "<strong>You passed the deadline to enroll. Could not enroll into course {$course} <br> {$stmt->error}</strong>";
              echo "</div>";
            }
        }
        // Already 5 courses
        else {
            echo '<div class="alert alert-danger">';
            echo "<strong>You are already enrolled in 5 courses. Could not enroll into course {$course} <br> {$stmt->error}</strong>";
            echo "</div>";
        }
        header("Refresh:5; url=../html/StudentPage.php");
    }

?>
