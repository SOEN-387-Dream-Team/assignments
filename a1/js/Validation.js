

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

function validateCode() {
    const code = document.getElementById("courseCode").value;
    const stringCode = code.substring(0, 4);
    const numCode = code.substring(4, 7);
    //checks that code only has letters & numbers
    if (!(code.match(/^[A-Za-z0-9]*$/))) {
        alert("Username must only contain letters & numbers.")
    }
    //checks that code is 7 inputs (4-letters & 3-numbers)
    if(code.length !== 7){
        alert("The Course code must be of length 7 (4 lettres & 3 numbers.)")
    }
    //checks that code starts with letters
    if(!(stringCode.match(/^[A-Za-z]*$/))){
        alert("The Course code must start with 4 letters.")
    }
    //checks that code ends with digits
    if(!(numCode.match(/^[0-9]*$/))){
        alert("The Course code must end with 3 digits.")
    }
}

function validateStudent() {
    const fullName = document.getElementById("studentName").value;
    if(!(fullName.match(/^[A-Za-z ]*$/))){
        alert("Improper Student Full Name.")
    }
}

function validateNewCourse(){
    const newCode = document.getElementById("newCode").value;
    const stringNew = newCode.substring(0, 4);
    const numNew = newCode.substring(5, 7)
    //checks that code only has letters & numbers
    if(!(newCode.match(/^[A-Za-z0-9]*$/))){
        alert("Course code must only contain letters & numbers.")
    }
    //checks that code is 7 inputs (4-letters & 3-numbers)
    if(newCode.length !== 7){
        alert("The Course code must be of length 7 (4 lettres & 3 numbers.)")
    }
    //checks that code starts with letters
    if(!(stringNew.match(/^[A-Za-z]*$/))){
        alert("The Course code must start with 4 letters.")
    }
    //checks that code ends with digits
    if(!(numNew.match(/^[0-9]*$/))){
        alert("The Course code must end with 3 digits.")
    }
}

function validateTitle() {
    const title = document.getElementById("newTitle").value;
    if(!(title.match(/^[A-Za-z ]*$/))){
        alert("Improper Course Title.")
    }
}

function validateSemester() {
    const semester = document.getElementById()
}