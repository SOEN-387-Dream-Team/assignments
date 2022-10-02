# assignments

Will add something here sometime in the future

## Data Logic

*Note: studentId from Student table and employmentId from Admin table refer to id from User table* <br>

User(<ins>id</ins>, firstName, lastName, address, email, phoneNumber, dateOfBirth, username, password)<br>
Admin(<ins>employmentId</ins>, id)<br>
Student(<ins>studentSemesterInstanceId</ins>, studentId, courseLimitPerSemester, semester)<br>
Course(<ins>courseId</ins>, courseCode, title, semester, room, startDate, endDate, days, time, instructor)<br>
AdminCreatesCourse(<ins>employmentId</ins>, <ins>courseId</ins>)<br>
StudentEntrolledInCourse(<ins>studentId</ins>,<ins>courseId</ins>) <br>

**ER Diagram**


![image](https://user-images.githubusercontent.com/60101999/193346772-0947e00e-e192-4727-9428-050c3a8c73d5.png)
