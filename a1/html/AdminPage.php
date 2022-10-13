<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Administrator Options</title>
    <link rel="stylesheet" href="../css/AdminPageStyle.css">
    <script type="text/javascript" src="../js/AdminOptions.js"></script>
    <script type="text/javascript" src="../js/Validation.js"></script>
</head>
<!--Navigation bar with bootstrap header -->
<?php
if(!isset($_SESSION)) {
  session_start();
}
include '../php/header.php';
include '../php/navbar.php';
if ($_SESSION['user']['isAdmin'] === 0 or $_SESSION['loggedIn'] === false) {
  header("Location: ../php/error.php");
}
?>
<body>
<!--main page-->
<div class="box">
    <div class="inner">
        <h1>Administrator Information</h1>
        <hr style="width: 100%; text-align: left; margin-left: 0">
        <p>Welcome, Admin First Name & Last Name!</p>
        <hr style="width: 50%; text-align: left; margin-left: 0">
        <!--main buttons-->
        <div class="button-group">
            <span class="inline">
                <form id="courseReport" onclick="openCourseForm()" style="width:100%">
                    <input type="button" value="Course Report"/>
                </form>
            </span>
            <span class="inline">
                <form id="studentReport" onclick="openStudentForm()" style="width:100%">
                    <input type="button" value="Student Report"/>
                </form>
            </span>
            <span class="inline">
                <form id="newCourse" onclick="newCourseForm()" style="width:100%">
                    <input type="button" value="Create New Course"/>
                </form>
            </span>
        </div>
    </div>

<!--Course Report Popup-->
    <div class="form-popup" id="coursePopup">
        <form action="../php/courseReport.php" onsubmit="return validateCode()" method="post">
            <h2>Course Report</h2>
            <p>Enter a Course Code to view all Students registered to this course.</p>
            <label for="courseCode">Course Code</label>
            <input type="text" placeholder="Enter a valid Course Code" name ="courseCode" id="courseCode" maxlength="7" size="7" required onfocusout="validateCode()">

            <p>List of students</p>

            <button name="courseReport" type="submit" class="btn" value="Submit">Submit</button>
            <button type="button" class="btn cancel" onclick="closeCourseForm()">Cancel</button>
        </form>
    </div>

<!--Student Report Popup-->
    <div class="form-popup" id="studentPopup">
        <form action="../php/studentReport.php" onsubmit="return validateStudent()" method="post">
            <h2>Student's Course Report</h2>
            <p>Enter a Student's name (First & Last Name) to view all Courses the Student is registered in.</p>
            <label for="studentName">Student's Full Name</label>
            <input type="text" placeholder="Enter a valid Student's Full Name" name ="studentName" id="studentName" size="50" required onfocusout="validateStudent()">

            <p>List of courses</p>

            <button name ="studentReport" type="submit" class="btn" value="Submit">Submit</button>
            <button type="button"  class="btn cancel" onclick="closeStudentForm()">Cancel</button>
        </form>
    </div>

<!--New Course Report-->
    <div class="form-popup" id="newPopup">
        <form action="../php/createCourse.php"  method="post">
            <fieldset>
                <h2>Course Creation</h2>
                <p>Enter the information for a new Course.</p>
                <ul>
                    <li>
                        <label for="newCode">Course Code</label><br>
                        <input type="text" placeholder="Enter a valid Course Code" id="newCode" maxlength="7" size="7" required onfocusout="validateNewCode()">
                    </li>
                    <li>
                        <label for="newTitle">Course Title</label><br>
                        <input type="text" placeholder="Enter a valid Course Title" id="newTitle" size="30" required onfocusout="validateTitle()">
                    </li>
                    <li>
                        <label>Course Semester</label><br>
                            <label for="fall">
                                <input type="radio" name="semester" value="FALL-2022" id="fall">Fall
                            </label><br>
                            <label for="winter">
                                <input type="radio" name="semester" value="WINTER-2023" id="winter">Winter
                            </label><br>
                            <label for="summer1">
                                <input type="radio" name="semester" value="SUMMER1-2023" id="summer1">Summer 1
                            </label><br>
                            <label for="summer2">
                                <input type="radio" name="semester" value="SUMMER2-2023" id="summer2">Summer 2
                            </label>
                    </li>
                    <li>
                        <label>Course Day</label><br>
                            <label for="monday">
                                <input type="radio" name="weekday" value="Monday" id="monday" required>Monday
                            </label><br>
                            <label for="tuesday">
                                <input type="radio" name="weekday" value="Tuesday" id="tuesday">Tuesday
                            </label><br>
                            <label for="wednes">
                                <input type="radio" name="weekday" value="Wednesday" id="wednes">Wednesday
                            </label><br>
                            <label for="thursday">
                                <input type="radio" name="weekday" value="Thursday" id="thursday">Thursday
                            </label><br>
                            <label for="friday">
                                <input type="radio" name="weekday" value="Friday" id="friday">Friday
                            </label>
                    </li>
                    <li>
                        <label for="newTime">Course Time</label><br>
                        <input type="time" id="newTime" min="08:00" max="21:00" required>
                    </li>
                    <li>
                        <label for="newInstructor">Course Instructor</label><br>
                        <input type="text" placeholder="Enter a valid Course Instructor" size="50" id="newInstructor" required onfocusout="validateInstructor()">
                    </li>
                    <li>
                        <label for="newRoom">Course Room</label><br>
                        <input type="text" placeholder="Enter a valid Course Room" maxlength="4" size="20" id="newRoom" required onfocusout="validateRoom()">
                    </li>
                    <li>
                        <label for="newStartDate">Course Start Date</label><br>
                        <input type="date" id="newStartDate" required>
                    </li>
                    <li>
                        <label for="newEndDate">Course End Date</label><br>
                        <input type="date" id="newEndDate" required onfocusout="validateDate()">
                    </li>
                </ul>
            </fieldset>
            <button type="submit" class="btn" name="create_course_button" value="Submit">Submit</button>
            <button type="button" class="btn cancel" onclick="closeNewForm()">Cancel</button>
        </form>
    </div>
</div>
</body>
</html>