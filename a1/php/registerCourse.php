<?php   

    require_once('conn.php');
    if (isset($_POST['addCourse']))
    { 
        $student = $_SESSION['id'];
        $course = $_POST['addCode'];
        $currentDate = date('yyyyddMM');


        $dateSql = "SELECT $course.startDate, $course.endDate 
                    FROM courses
                    SELECT startDate, endDate FROM courses c WHERE (c.startDate + 7) < $currentDate AND (c.endDate + 7) > currentDate AND c.courseCode =?";

        $stmt = $conn->prepare($dateSql);
        $stmt->bind_param("s", $course);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if($result->num_rows > 0)
        {
            $sql = "INSERT INTO student_courses (id, courseCode) VALUES($student, $course)";

            $stmt = $conn->prepare($sql);

            if ($stmt->execute()) 
            {
                echo "Registered Successfully!";
            } 
            else 
            {
                echo $stmt->error;
                echo "Something went wrong. Course was not registered";
            }
        }
        else
        {
            echo "Requirements for course registration not met.";
        }

        
        header("Refresh:8; url=../html/StudentPage.html");
    }

?>