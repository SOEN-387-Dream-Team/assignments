<?php   

    require_once('conn.php');
    if (isset($_POST['course_report_button'])) // TODO: Change with respective html form name
    { 
        $course = $_POST['courseID'];

        $sql = "SELECT DISTINCT s.id, u.firstName, u.lastName 
                FROM student_courses s
                JOIN user u
                ON s.id = u.id 
                WHERE s.courseCode=$course";

        $result = $conn->query($sql);

        if($result->num_rows > 0)
        {
            echo "Students enrolled in this course:";

            while($row= $result->fetch_assoc())
            {
                echo $row['id'];
            }
        }
        else
        {
            echo "No records found.";
        }
    }
    

?>