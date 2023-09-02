<?php require_once "../controller/Login.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/login2.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="login-user.php" method="POST" autocomplete="">
                    <center><h1 class="text-center">Restaurant Supplier Login Form</h1></center>
                    <center><p class="text-center">Login with email and password.</p></center>
                
                    <div class="form-group">
                       <center> <input class="form-control" type="text" name="email" placeholder="Email Address" ></center>
                    </div><br>
                    <div class="form-group">
                        <center><input class="form-control" type="password" name="password" placeholder="Password" required></center>
                    </div><br>
                    <center><div class="link forget-pass text-left"><a href="forgot-password.php">Forgot password?</a></div></center><br>
                    <div class="form-group">
                        <center><input class="form-control button" type="submit" name="logins" value="Logins"></center>
                    </div>
                    <div class="link login-link text-center"> register request? <a href="signup-user.php"> registration now </a></div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>