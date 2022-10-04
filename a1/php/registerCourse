<?php   

    require_once('conn.php');
    if (isset($_POST['register_button'])) // TODO: Change with respective html form name
    { 
        $student = $_POST['studentID'];
        $course = $_POST['courseID'];

        $sql = "INSERT INTO student_courses (id, courseCode) VALUES ($student, $course)";


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