// Defining a function to display error message
function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

// Defining a function to validate form
function validateForm() {
    // Retrieving the values of form elements
    var f_name = document.signupForm.fname.value;
    var l_name = document.signupForm.lname.value;
    var i_name = document.signupForm.IP_Add.value;
    var mail = document.signupForm.email.value;
    var password = document.signupForm.password.value;
    var gender = document.signupForm.gender.value;

    // Defining error variables with a default value
    var fnameErr = lnameErr =IPErr= emailErr =passwordErr = genderErr= true;

    // Validate first name
    if (f_name == "") {
        printError("fnameErr", "Please enter your first name");
    } else {
        var regex = /^[a-zA-Z\s]+$/;
        if (regex.test(f_name) === false) {
            printError("fnameErr", "Please enter a valid first name");
        } else {
            printError("fnameErr", "");
            fnameErr = false;
        }
    }

    // Validate last name
    if (l_name == "") {
        printError("lnameErr", "Please enter your last name");
    } else {
        var regex = /^[a-zA-Z\s]+$/;
        if (regex.test(l_name) === false) {
            printError("lnameErr", "Please enter a valid last name");
        } else {
            printError("lnameErr", "");
            lnameErr = false;
        }
    }
    if (i_name == "") {
        printError("IPErr", "Please enter your IP Address");
    } else {
        var regex = /[0-9]+$/;
        if (regex.test(i_name) === false) {
            printError("IPErr", "Please enter a Valid IP");
        } else {
            printError("IPErr", "");
            IPErr = false;
        }
    }

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
        var regex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
        if (regex.test(password) === false) {
            printError("passwordErr", "Password should contain at least one number, one uppercase character and one special character");
        } else {
            printError("passwordErr", "");
            passwordErr = false;
        }
    }

    // Validate country

    // Validate gender
    if (gender == "Select") {
        printError("genderErr", "Please select your gender");
    } else {
        printError("genderErr", "");
        genderErr = false;
    }

    // Prevent the form from being submitted if there are any errors
    if ((fnameErr || lnameErr ||IPErr||passwordErr || emailErr || genderErr) == true)
     {
        return false;
    }
    else {


    }
};
