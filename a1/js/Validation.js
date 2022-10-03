

//Validates the Username & Password to ensure that both only contain letters & numbers.
function validateID() {
    const id = document.getElementById("userId").value;
    if(!(id.match(/^[A-Za-z0-9]*$/))){
        alert("Username must only contain letters & numbers.")
    }
}

function validatePass() {
    const pass = document.getElementById("password").value;
    if(!(pass.match(/^[A-Za-z0-9]*$/))){
        alert("Username must only contain letters & numbers.")
    }
}

//validate the course code for Course Report
function validateCode() {
    const code = document.getElementById("courseCode").value;
    const stringCode = code.substring(0, 4);
    const numCode = code.substring(4, 7);
    //checks that code only has letters & numbers
    if (!(code.match(/^[A-Za-z0-9]*$/))) {
        alert("Username must only contain letters & numbers.")
        return false;
    }
    //checks that code is 7 inputs (4-letters & 3-numbers)
    if(code.length !== 7){
        alert("The Course code must be of length 7 (4 lettres & 3 numbers.)")
        return false;
    }
    //checks that code starts with letters
    if(!(stringCode.match(/^[A-Za-z]*$/))){
        alert("The Course code must start with 4 letters.")
        return false;
    }
    //checks that code ends with digits
    if(!(numCode.match(/^[0-9]*$/))){
        alert("The Course code must end with 3 digits.")
        return false;
    }
}

//validate Student Name for Student Report
function validateStudent() {
    const fullName = document.getElementById("studentName").value;
    if(!(fullName.match(/^[A-Za-z ]*$/))){
        alert("Improper Student Full Name.")
        return false;
    }
}

//Validate new Course attributes

//validate new course's code
function validateNewCourse(){
    const newCode = document.getElementById("newCode").value;
    const stringNew = newCode.substring(0, 4);
    const numNew = newCode.substring(5, 7)
    //checks that code only has letters & numbers
    if(!(newCode.match(/^[A-Za-z0-9]*$/))){
        alert("Course code must only contain letters & numbers.")
        return false;
    }
    //checks that code is 7 inputs (4-letters & 3-numbers)
    if(newCode.length !== 7){
        alert("The Course code must be of length 7 (4 lettres & 3 numbers.)")
        return false;
    }
    //checks that code starts with letters
    if(!(stringNew.match(/^[A-Za-z]*$/))){
        alert("The Course code must start with 4 letters.")
        return false;
    }
    //checks that code ends with digits
    if(!(numNew.match(/^[0-9]*$/))){
        alert("The Course code must end with 3 digits.")
        return false;
    }
}

//validate new course's title
function validateTitle() {
    const title = document.getElementById("newTitle").value;
    if(!(title.match(/^[A-Za-z ]*$/))){
        alert("Improper Course Title.")
    }
}

//validate new course's instructor name
function validateInstructor() {
    const fullName = document.getElementById("newInstructor").value;
    if(!(fullName.match(/^[A-Za-z ]*$/))){
        alert("Improper Instructor Name.")
        return false;
    }
}

//validate the course room is in H & is followed by 3 digits
function validateRoom(){
    const newRoom = document.getElementById("newRoom").value;
    const numNew = newRoom.substring(2, 4)
    //checks that room only has letters & numbers
    if(!(newRoom.match(/^[Hh0-9]*$/))){
        alert("Course room must start with the letter H & only have numbers.")
        return false;
    }
    //checks that room is 4 inputs (1-letters & 3-numbers)
    if(newRoom.length !== 4){
        alert("The Course room must be of length 4 (1 letter & 3 numbers.)")
        return false;
    }
    //checks that code ends with digits
    if(!(numNew.match(/^[0-9]*$/))){
        alert("The Course room must end with 3 digits.")
        return false;
    }
}

//validate the Course days are numbers
function validateDays() {
    const newDays = document.getElementById("newDays").value;
    if(!(newDays.match(/^[0-9]*$/))){
        alert("The Course days must be numbers.");
    }
}

//validate that the course days are equal to the days in between the course's start & end dates
function validateDate() {
    const startDate = document.getElementById("newStartDate").value;
    const endDate = document.getElementById("newEndDate").value;
    const newDays = document.getElementById("newDays").value;
    const difference = endDate.getTime() - startDate.getTime();
    const diffInDays = difference / (1000 * 3600 * 24);
    if(newDays !== diffInDays){
        alert("The Course must start/end at a different date.");
    }
}