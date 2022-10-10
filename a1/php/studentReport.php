<?php

    require_once('conn.php');
    if (isset($_POST['studentReport']))
    {
        $student = explode(" ", $_POST['studentName']);
        
        $studentSql ="SELECT id FROM user u WHERE u.firstName=? AND u.lastName=?";

        $stmt = $conn->prepare($studentSql);
        $stmt->bind_param("ss", $student[0], $student[1]);
        $stmt->execute();
        $result = $stmt->get_result();

        $row = $result->fetch_assoc();

        $studentID = $row['id'];


        $sql = "SELECT DISTINCT s.courseCode, c.title 
                FROM student_courses s
                JOIN courses c
                ON s.courseCode = c.courseCode
                WHERE s.id=?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $studentID);
        $stmt->execute();
        $result = $stmt->get_result();


        $sql = "SELECT DISTINCT s.courseCode, c.title 
                FROM student_courses s
                JOIN courses c
                ON s.courseCode = c.courseCode
                WHERE s.id=?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $studentID);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0)
        {
            echo " Courses student is registered in:\n";

            while($row= $result->fetch_assoc())
            {
                echo $row['courseCode']," ", $row['title'], "\n";
            }
        }
        else
        {
            echo "No records found.";
        }

        header("Refresh:8; url=../html/AdminPage.html");
    }


?>
