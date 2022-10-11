<?php

    require_once('conn.php');
    if (isset($_POST['courseReport']))
    {
        $course = $_POST['courseCode'];
    
        $sql = "SELECT DISTINCT s.id, u.firstName, u.lastName
                FROM student_courses s
                JOIN user u
                ON s.id = u.id
                WHERE s.courseCode=UPPER(?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $course);
        $stmt->execute();
        $result = $stmt->get_result();

        //Display of the results
        include 'header.php';
        include 'navbar.php';
        echo "<body>";        
        echo "<div class='container text-center'>";
        if($result->num_rows > 0)
        {
            //Display of the results (continued)
                echo "<div class='row'>";
                    echo "<div class='col'>";
                    echo "<h1>" . strtoupper($course) . " Course Report</h1>";
                    echo "</div>";
                echo "</div>";

                echo "<div class='row'>";
                    echo "<div class='col'>";
                    echo "<table  class='table table-dark table-striped table-bordered border-light table-hover'>
                            <tr class='table-primary'>
                                <th>Student ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                            </tr>";
                    echo "</div>";
                echo "</div>";


            while($row= $result->fetch_assoc())
            {
                echo "<tr>";
                echo "<th>" . $row['id'] . "</th>";
                echo "<th>" . $row['firstName'] . "</th>";
                echo "<th>" . $row['lastName'] . "</th>";
                echo "</tr>";
            }

                echo "</table>";                    
        }
        else
        {
            echo "<p class='alert alert-danger'>";
            echo "No student records found for Course " .  strtoupper($course);
            echo "</p>";
        }
            echo "<div class='row'>";
                            echo "<div class='col'>";
                                echo "<a href='../html/AdminPage.php'><button type='button' class='btn btn-primary'>Close Report</button></a>";
                            echo "</div>";
                        echo "</div>";
        echo "</div>";//end of container
        include 'footer.php';        
    }


?>
