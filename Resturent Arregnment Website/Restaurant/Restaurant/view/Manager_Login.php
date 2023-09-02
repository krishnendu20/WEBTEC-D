<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

    
	<title>Admin Login</title>
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
include "../controller/Header1.php";
?>
<link rel="stylesheet" type="text/css" href="./css/login.css">
</head>
  <body>
<br><br>

   `<form name="signinForm" onsubmit="return validateForm()" action="" method="POST">
      <div class="row">
   <div class="col-sm-12">
      <div class="main-content">
         <div class="header">
            <h3 style="text-align: center;"><strong>Admin Login</strong></h3>
         </div>
         <div class="l-part">
            <form action="" method="post">
               <input type="text" name="email" placeholder="Email"class="form-control input-md">
               <div class="error" id="emailErr"></div><br>
               <div class="overlap-text">
                  <input type="password" name="pass" placeholder="Password" class="form-control input-md">
                  <div class="error" id="passwordErr"></div><br>
                  <a style="text-decoration:none;float: right;color: #187FAB;" data-toggle="tooltip" title="Reset Password" href="forgetpass.php">Forgot?</a>
               </div>
           <br><br>
               <center><button id="signin"  class="btn btn-info btn-lg" name="login">Login</button></center>
          <?php include("../controller/LoginAction.php"); ?>
            </form><br><br>
            <form action="Register.php" method="post">
               <center><button id="signin"  class="btn btn-info btn-lg" name="login">Sign Up</button></center>
            </form>
            
         </div>
      </div>
   </div>
</div>

</form><br><br><br>
<script src="./js/validate.js"></script>
  </body>
	<?php
 include "../controller/Footer.php";
 ?>
</html>
