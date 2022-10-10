<?php

    require_once('conn.php');
    if (isset($_POST['courseReport']))
    {
        $course = $_POST['courseCode'];
        echo $course;
    
        $sql = "SELECT DISTINCT s.id, u.firstName, u.lastName
                FROM student_courses s
                JOIN user u
                ON s.id = u.id
                WHERE s.courseCode=?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $course);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0)
        {
            echo "Students enrolled in this course:\n";
            


            while($row= $result->fetch_assoc())
            {
                echo "ID: ", $row['id'], " Name: ", $row['firstName']," ", $row['lastName'], "\n";
            }
        }
        else
        {
            echo "No records found.";
        }

        header("Refresh:8; url=../html/AdminPage.html");
        
    }


?>
