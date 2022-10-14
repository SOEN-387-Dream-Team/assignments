<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Options</title>
    <style>
        .multiselect {
            width: 200px;
        }
        .selectBox {
            position: relative;
        }
        .selectBox select {
            width: 100%;
            font-weight: bold;
        }
        .overSelect {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
        }
        #checkboxes {
            display: none;
            border: 1px #dadada solid;
        }
        #checkboxes label {
            display: block;
        }
        #checkboxes label:hover {
            background-color: #1e90ff;
        }
    </style>
    <link rel="stylesheet" href="../css/StudentPageStyle.css">
    <script type="text/javascript" src="../js/StudentOption.js"></script>
    <script type="text/javascript" src="../js/Validation.js"></script>
</head>
<?php
if(!isset($_SESSION)) {
  session_start();
}
include '../php/header.php';
include '../php/navbar.php';
if ($_SESSION['user']['isAdmin'] === 1 or $_SESSION['loggedIn'] === false) {
  header("Location: ../php/error.php");
}
?>

<body>
<div class="box">
    <div class="inner">
        <h1>Student Page</h1>
        <hr style="width: 100%; text-align: left; margin-left: 0">
        <p>Welcome, Student's First name & last name!</p>
        <hr style="width: 80%; text-align: left; margin-left: 0">
        <div>
            <!--<form action="../php/registerCourse.php" id="courses" name="courses" method="post">
                <div class="multiselect">
                    <div class="selectBox" onclick="showCheckboxes()">
                        <select>
                            <option>Add/Drop a course</option>
                        </select>
                        <div class="overSelect"></div>
                    </div>
                    <div id="checkboxes">
                        <label for="comp248">
                            <input class="check" name="checkCourse" type="checkbox" id="comp248" value="COMP248"/>COMP248</label>
                        <label for="comp335">
                            <input class="check" name="checkCourse" type="checkbox" id="comp335" value="COMP335" />COMP335</label>
                        <label for="comp346">
                            <input class="check" name="checkCourse" type="checkbox" id="comp346" value="COMP346" />COMP346</label>
                        <label for="soen287">
                            <input class="check" name="checkCourse" type="checkbox" id="soen287" value="SOEN287" />SOEN287</label>
                        <label for="soen387">
                            <input class="check" name="checkCourse" type="checkbox" id="soen387" value="SOEN387" />SOEN387</label>
                        <label for="encs282">
                            <input class="check" name="checkCourse" type="checkbox" id="encs282" value="ENCS282" />ENCS282</label>
                        <label for="encs393">
                            <input class="check" name="checkCourse" type="checkbox" id="encs393" value="ENCS393" />ENCS393</label>
                    </div>

                    <script>limitCheckbox()</script>-->
                    <p>Maximum of 5 courses.</p>

                    <hr style="width: 80%; text-align: left; margin-left: 0">
                    <div class="button-group">
                        <span class="inline">
                            <form id="addReport" onclick="openAddCourse();showNonEnrolledCourses()" style="width:100%">
                                <input type="button" value="Add Courses"/>
                            </form>
                        </span>
                        <span class="inline">
                            <form id="dropReport" onclick="openDropCourse();showEnrolledCourses()" style="width:100%">
                                <input type="button" value="Drop Courses"/>
                            </form>
                        </span>
                    </div>
                </div>
            <!--</form>-->
        </div>
    </div>
    <!--drop course popup-->
    <div class="form-popup" id="dropPopup">
        <form action="../php/dropCourse.php" class="form-container" onsubmit="return validateDropCode()" method="post">
            <h2>Drop a Class</h2>
            <p>TODO : Add an instructional message.</p>
            <label for="dropList">List of Enrolled classes</label>
            <select id="dropList" name="dropCode">--list of enrolled courses--</select>

            <p></p>
            <button name = "drop_course_btn" type="submit" class="btn" value="Submit">Submit</button>
            <button type="button" class="btn cancel" onclick="closeDropCourse()">Cancel</button>
        </form>
    </div>
    <!--add course popup-->
    <div class="form-popup" id="addPopup">
        <form action="../php/registerCourse.php" class="form-container" onsubmit="return validateAddCode()" method="post">
            <h2>Add a Class</h2>
            <p>TODO : Add an instructional message.</p>

            <label for="semesterChoice">Select a Semester</label>
            <select name= "semesterChoice" id = "semesterChoice">
                <option value="FALL-2022">Fall 2022</option>
                <option value="WINTER-2023">Winter 2023</option>
                <option value="SUMMER1-2023">Summer 1 2023</option>
                <option value="SUMMER2-2023">Summer 2 2023</option>

            </select>

            <p></p>

            <label for="addList">List of Un-enrolled classes</label>
            <select id="addList" name="courseCode">--list of un-enrolled courses--</select>

            <p></p>
            <button name = "addCourse" type="submit" class="btn" value="Submit">Submit</button>
            <button type="button" class="btn cancel" onclick="closeAddCourse()">Cancel</button>
        </form>
    </div>
</body>
</html>
