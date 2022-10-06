let expanded = false;
function showCheckboxes() {
    const checkboxes = document.getElementById("checkboxes");
    if (!expanded) {
        checkboxes.style.display = "block";
        expanded = true;
    } else {
        checkboxes.style.display = "none";
        expanded = false;
    }
}

function limitCheckbox() {
    let checkboxGroup = document.getElementById("checkboxes").getElementsByTagName("input");
    const limit=5;
    for(let i=0; i<checkboxGroup.length; i++) {
        checkboxGroup[i].onclick = function() {
            let count=0;
            for(let i=0; i<checkboxGroup.length; i++){
                count += (checkboxGroup[i].checked) ? 1 : 0;
            }
            if(count > limit){
                alert("You can select a maximum of " + limit + " courses.");
                this.checked = false;
            }
        }
    }

}