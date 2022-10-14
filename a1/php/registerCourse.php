<?php
    require_once('conn.php');
    session_start();
    if (isset($_POST['addCourse']))
    {
        $student = $_SESSION['id'];
        $course = $_POST['courseCode'];
        $currentDate = date('Y-m-d');
        $semesterChosen = $_POST['semesterChoice'];

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


        if($numRows >= 5)
        {
            print_r($numRows);
            echo $stmt->error;
            echo "Cannot enroll in more than 5 courses at a time per semester";
        }
        else
        {
            //Purpose of this sql is to check if we are within the 1 week time limit to add the course
            $dateSql = "SELECT startDate
                        FROM courses c
                        WHERE CURDATE() < DATE_ADD(c.startDate, INTERVAL 7 DAY)
                        AND c.courseCode = UPPER(?)";

            $stmt = $conn->prepare($dateSql);
            $stmt->bind_param("s", $course);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows > 0)
            {
                $sql = "INSERT INTO student_courses(id, courseCode) VALUES(?, UPPER(?))";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("is", $student, $course);

                if ($stmt->execute())
                {
                    echo strtoupper($course) . " registered successfully!";
                }
                else
                {
                    echo $stmt->error;
                    echo "Something went wrong. Course was not registered";
                }
            }
            else
            {
                echo "Requirements for course registration not met: You have passed the deadline to enroll in this course.";
            }

        }

        header("Refresh:8; url=../html/StudentPage.php");
    }

?>
