<?php   

    require_once('conn.php');
    if (isset($_POST['select-courses']))
    { 
        $student = $_POST['studentID'];
        $course = $_POST['courseID'];
        $currentDate = date('yyyy/dd/MM');


       
        $sql = "INSERT INTO student_courses (id, courseCode) 
        SELECT $student, $course
        WHERE (SELECT startDate, endData FROM courses WHERE DATEADD(DD,7,startDate)) > $currentDate";
        

        if ($conn->query($sql) === TRUE) 
        {
            echo "Registered Successfully!";
        } 
        else 
        {
            echo $conn->error;
            echo "Something went wrong. Course was not registered";
        }

    }

?>