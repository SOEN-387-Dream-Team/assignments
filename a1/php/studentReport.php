<?php

    require_once('conn.php');
    if (isset($_POST['studentReport']))
    {
        $student = explode(" ", strtolower($_POST['studentName']));
        
        $studentSql ="SELECT id FROM user u WHERE u.firstName=? AND u.lastName=?";

        $stmt = $conn->prepare($studentSql);
        $stmt->bind_param("ss", $student[0], $student[1]);
        $stmt->execute();
        $result = $stmt->get_result();

        $row = $result->fetch_assoc();

        //Display of the results
        include 'header.php';
        include 'navbar.php';
        echo "<body>";
        echo "<div class='container text-center'>";
        if($row > 0){

            $studentID = $row['id'];
            
            $sql = "SELECT DISTINCT s.courseCode, c.title, c.semester 
                FROM student_courses s
                JOIN courses c
                ON s.courseCode = c.courseCode
                WHERE s.id=?";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $studentID);
            $stmt->execute();
            $result = $stmt->get_result();
            
            
            if($result->num_rows > 0)
            {
                //Display of the results (continued)
                    echo "<div class='row'>";
                        echo "<div class='col'>";
                        echo "<h1>" . ucfirst($student[0]) . " " . ucfirst($student[1]) . "'s Student Report</h1>";
                        echo "</div>";
                    echo "</div>";

                    echo "<div class='row'>";
                        echo "<div class='col'>";
                        echo "<table  class='table table-dark table-striped table-bordered border-light table-hover'>
                                <tr class='table-primary'>
                                    <th>Course Code</th>
                                    <th>Title</th>
                                    <th>Semester</th>
                                </tr>";
                        echo "</div>";
                    echo "</div>";

                

                while($row= $result->fetch_assoc())
                {
                    echo "<tr>";
                    echo "<th>" . $row['courseCode'] . "</th>";
                    echo "<th>" . $row['title'] . "</th>";
                    echo "<th>" . $row['semester'] . "</th>";
                    echo "</tr>";
                }

                    echo "</table>";
                }
                else
                {
                    echo "<p class='alert alert-danger'>";
                    echo "No course records found for " .  ucfirst($student[0]) . " " . ucfirst($student[1]) . ". Please assure that this is not an admin.";
                    echo "</p>";
                }
        }
        else 
        {
            echo "<p class='alert alert-danger'>";
            echo "Invalid User Entry: " .  ucfirst($student[0]) . " " . ucfirst($student[1]) . ". Please enter a valid user name.";
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
