// Defining a function to display error message
function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

// Defining a function to validate form
function validateForm() {
    // Retrieving the values of form elements
    var f_name = document.offer.fname.value;
    var l_name = document.offer.lname.value;

    // Defining error variables with a default value
    var fnameErr = lnameErr = true;

    // Validate first name
    if (f_name == "") {
        printError("fnameErr", "Please enter your offer name");
    } else {
        var regex = /^[a-zA-Z\s]+$/;
        if (regex.test(f_name) === false) {
            printError("fnameErr", "Please enter a valid offer name");
        } else {
            printError("fnameErr", "");
            fnameErr = false;
        }
    }

    // Validate last name
    if (l_name == "") {
        printError("lnameErr", "Please enter your offer details");
    } else {
        var regex = /^[a-zA-Z\s]+$/;
        if (regex.test(l_name) === false) {
            printError("lnameErr", "Please enter a valid offer details");
        } else {
            printError("lnameErr", "");
            lnameErr = false;
        }
    }
    

    // Prevent the form from being submitted if there are any errors
    if ((fnameErr || lnameErr) == true)
     {
        return false;
    }
    else {


    }
};
