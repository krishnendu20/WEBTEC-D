
function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

// Defining a function to validate form
function validateForm() {
    // Retrieving the values of form elements
    var email = document.forgotForm.email.value;
    var frname = document.forgotForm.recovery_account.value;
    // Defining error variables with a default value
    var fnameErr=emailErr=true;


    if (frname == "") {
        printError("frameErr", "Please enter your username");
    } else {

            printError("frameErr", "");
            fnameErr = false;
    }
    //
    // Validate email address
    if (email == "") {
        printError("emailErr", "Please enter your email address");
    } else {
        var regex = /^\S+@\S+\.\S+$/;
        if (regex.test(email) === false) {
            printError("emailErr", "Please enter a valid email address");
        } else {
            printError("emailErr", "");
            emailErr = false;
        }
    }


    // Prevent the form from being submitted if there are any errors
    if ((frnameErr||emailErr) == true)
     {
        return false;
    }
    else {


    }
};
