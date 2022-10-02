<?php

    class Student
    {

        var $ID;
        var $firstName;
        var $lastName;
        var $address;
        var $email;
        var $phoneNum;
        var $dateOB;
        var $coursesEnrolled;
        var $courses;

        public function __construct($fname, $lnam, $addr, $email, $num, $dob)
        {
            $this->ID = spl_object_id($this);
            $this->firstName = $fname;
            $this->lastName = $lnam;
            $this->address = $addr;
            $this->email = $email;
            $this->phoneNum = $num;
            $this->dateOB = $dob;
            $this->courses = array();
        }

        //Need the name of the course and the course object
        public function addCourse($courseName, $courseObj)
        {
            if (count($this->courses) > 5)
            {
                echo "Cannot enroll in more than 5 courses at a time";
            }
            else 
            {
                $this->courses[$courseName] = $courseObj;
            }
        }

        //Need the name of the course
        public function dropCourse($courseName, $courseObj)
        {
            if (count($this->courses) == 0 || array_key_exists($courseName, $this->courses))
            {
                echo "You are not enrolled in this course";
            }
            else
            {
                unset($this->courses[$courseName]);
            }
        }

        //Accessors ----------------------------------------------------------------*
        public function getID()
        {
            return $this->ID;
        }
        public function getFirstName()
        {
            return $this->firstName;
        }
        public function getLastName()
        {
            return $this->lastName;
        }
        public function getAddress()
        {
            return $this->address;
        }
        public function getEmail()
        {
            return $this->email;
        }
        public function getPhoneNum()
        {
            return $this->phoneNum;
        }
        public function getDOB()
        {
            return $this->dateOB;
        }
        public function getCourseEnroll()
        {
            return $this->coursesEnrolled;
        }
        
        //Mutators  ----------------------------------------------------------------*
        public function setID($id)
        {
            $this->ID = $id;
        }
        public function setFirstName($first)
        {
            $this->firstName = $first;
        }
        public function setLastName($last)
        {
            $this->lastName = $last;
        }
        public function setAddress($add)
        {
            $this->address = $add;
        }
        public function setEmail($email)
        {
            $this->email = $email;
        }
        public function setPhoneNum($phone)
        {
            $this->phoneNum = $phone;
        }
        public function setDOB($dob)
        {
            $this->dateOB = $dob;
        }
        public function setCourseEnroll($enroll)
        {
            $this->coursesEnrolled = $enroll;
        }


        


    }
?>