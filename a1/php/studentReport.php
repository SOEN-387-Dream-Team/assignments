<?php   

    require_once('conn.php');
    if (isset($_POST['student_report_button'])) // TODO: Change with respective html form name
    { 
        $student = $_POST['studentID'];

        $sql = "SELECT courseCode FROM student_courses WHERE id=$student";

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