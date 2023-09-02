// Defining a function to display error message
function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

// Defining a function to validate form
function validateForm() {
    // Retrieving the values of form elements
   
    var mail = document.signinForm.email.value;
    var password = document.signinForm.password.value;
    

    // Defining error variables with a default value
    var  emailErr=passwordErr= true;

   

    // Validate email address
    if (mail == "") {
        printError("emailErr", "Please enter your email address");
    } else {
        var regex = /^\S+@\S+\.\S+$/;
        if (regex.test(mail) === false) {
            printError("emailErr", "Please enter a valid email address");
        } else {
            printError("emailErr", "");
            emailErr = false;
        }
    }

    // Validate password
    if (password == "") {
        printError("passwordErr", "Please enter your password");
    } else {
        var regex = /^[a-zA-Z\s]+$/;
        if (regex.test(password) === false) {
            printError("passwordErr", "Please Enter a Password");
        } else {
            printError("passwordErr", "");
            passwordErr = false;
        }
    }



    // Prevent the form from being submitted if there are any errors
    if (( emailErr||passwordErr) == true)
     {
        return false;
    }
    else {


    }
};
