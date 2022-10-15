# Assignment 1
This web application will allow a students to register to courses online. As well as allowing an Administrator to edit and view course and student information.

## Description
The web application will be seperated into 3 different pages: the Main front page, the Student account page, and the Administrator account page.

On the Main front page, the user will need to sign into their account, which is found in the MYSQL database. 
With an Administrator credentials, the page will load the Administrator account page. With a Student credentials, the page will load the Student account page.

On the Administrator page, the user can choose to look at a Student's list of enrolled courses, to look at a course's enrolled students, or to create a new course.

On the Student page, the user can choose to either add a course to enroll to for a specific semester, or to drop an enrolled course.

## Authors
Duc Huy Bui - 40061043

Mauran Pavan - 27400705

Peter Vourantonis - 40157751

Gabriel


## Demo Base Setup
![image](https://user-images.githubusercontent.com/60101999/195935207-54d60d55-fcf5-481b-8dd4-763e4ee80cf4.png)
<hr />

![image](https://user-images.githubusercontent.com/60101999/195934630-4def25b1-5ae1-4c47-82a1-124414e24354.png)
<hr />


![image](https://user-images.githubusercontent.com/60101999/195935688-817882c7-6c2f-4ec9-928a-c91ab0ce4d47.png)


## Data Logic

*Note: id from User table accounts for employmentId for Admin mentioned in the assignment document* <br>

user(<ins>id</ins>, firstName, lastName, address, email, phoneNumber, dateOfBirth, password, isAdmin)<br>
courses(<ins>courseCode</ins>, title, semester, room, startDate, endDate, days, time, instructor)<br>
student_courses(<ins>id</ins>, <ins>courseCode</ins>) <br>

**Physical ER Diagram** <br>
![image](https://user-images.githubusercontent.com/60101999/195931693-ac125632-80d6-41b6-837a-5a12994315bd.png)


**Previously attempted Conceptual ER diagram (Disregarded)** <br>

![image](https://user-images.githubusercontent.com/60101999/193346772-0947e00e-e192-4727-9428-050c3a8c73d5.png)

