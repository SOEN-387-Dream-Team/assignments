<?php   

    require_once('conn.php');
    if (isset($_POST['student_report_button'])) // TODO: Change with respective html form name
    { 
        $student = $_POST['studentID'];

        $sql = "SELECT DISTINCT s.courseCode c.title 
                FROM student_courses s
                JOIN courses c
                ON s.courseCode = c.courseCode
                WHERE s.id=$student";

        $result = $conn->query($sql);

        if($result->num_rows > 0)
        {
            echo " Courses you are registered in:";

            while($row= $result->fetch_assoc())
            {
                echo $row['courseCode'];
            }
        }
        else
        {
            echo "No records found.";
        }
    }
    

?>