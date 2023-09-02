
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/login2.css">
</head>
<body>
    <center><div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form  name="signup-user" onsubmit="return validateForm()" action="" method="POST">
                    <h2 class="text-center">Supplier Signup Form</h2>
                    <p class="text-center">It's quick and easy.</p>
             
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="Name" >
                    </div>
                    <div class="error" id="fnameErr"></div>
                    <br>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" >
                    </div><br>
                    <div class="form-group">
                    <select class="form-control" name="country" >
                            <option>Select your Country</option>
							<option>Bangladesh</option>
							<option>United States of America</option>
							<option>India</option>
							<option>Japan</option>
							<option>UK</option>
							<option>France</option>
							<option>Germany</option>
                         </select>
                    </div><br>
                    <div class="form-group">
                    <select class="form-control input-md" name="gender">
							<option>Select your Gender</option>
							<option>Male</option>
							<option>Female</option>
							<option>Others</option>
						</select>
                        </div><br>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" >
                    </div><br>
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm password" >
                    </div><br>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="signups" value="Signup">
                    </div>
                    <?php include("../controller/controllerUserData.php"); ?>
                    <div class="link login-link text-center">Already a member? <a href="login-user.php">Login here</a></div>
                </form>
            </div>
        </div>
    </div></center>
    <script src="./js/signup.js"></script>   
</body>
</html>
<?php

if (isset($_POST['signups'])) {
	$f_name = htmlentities($_POST['name']);
	$u_pass = htmlentities($_POST['password']);
	$u_email = htmlentities($_POST['email']);
	
  if ($f_name == '') {
     echo "<script>alert('Please enter valid Name')</script>";
     echo "<script>window.open('signup-user.php','_self')</script>";

     exit();
     // code...
   }
  
    elseif ($u_pass=='') {
         echo "<script>alert('Please enter valid password')</script>";
         echo "<script>window.open('signup-user.php','_self')</script>";

         exit();
    }
    elseif ($u_email=='') {
         echo "<script>alert('Please enter valid email')</script>";
         echo "<script>window.open('signup-user.php','_self')</script>";

         exit();     // code...
    }

}


 ?>
 <?php require_once "../controller/controllerUserData.php"; ?>
