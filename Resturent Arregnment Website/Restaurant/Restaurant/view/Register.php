<!DOCTYPE html>
<html>
<head>
	<title>Manager Sign Up</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="./css/signup.css">
</head>

<body>
<div class="row">

</div>
<div class="row">
	<div class="col-sm-12">
		<div class="main-content">
			<div class="header">
				<h3 style="text-align: center;"><strong>Sign Up To The System</strong></h3>
				<hr>
			</div>
			<div class="l-part">
				<form name="signupForm" onsubmit="return validateForm()" action="" method="POST" >
					<div class="input-group">
						<span class="input-group-addon"></span>
						<input type="text" class="form-control" placeholder="First Name" name="fname">

					</div>
					<div class="error" id="fnameErr"></div>
					<br>
					<div class="input-group">
						<span class="input-group-addon"></span>
						<input type="text" class="form-control" placeholder="Last Name" name="lname">
					</div>
					<div class="error" id="lnameErr"></div><br>
					<div class="input-group">
						<span class="input-group-addon"></span>
						<input type="text" class="form-control" placeholder="Present Address" name="IP_Add">
					</div>
					<div class="error" id="IPErr"></div>
					<br>
					<div class="input-group">
						<span class="input-group-addon"></span>
						<input  type="email" class="form-control" placeholder="Email" name="email" >
					</div>
					<div class="error" id="emailErr"></div>
					<br>
					<div class="input-group">
						<span class="input-group-addon"></span>
						<input  type="password" class="form-control" placeholder="Password" name="password">
					</div>

					<div class="error" id="passwordErr"></div>
					<br>
					
					<div class="input-group">
						<span class="input-group-addon"></span>
						<select class="form-control input-md" name="gender">
							<option>Select your Gender</option>
							<option>Male</option>
							<option>Female</option>
							<option>Others</option>
						</select>
					</div>
					<div class="error" id="genderErr"></div>
					<br>
					<center><button id="signup" class="btn btn-info btn-lg" name="sign_up">Signup</button></center>
					<?php include("../controller/insert_manager.php"); ?>
				</form><br><br>
				<form action="Manager_Login.php" method="post">
               <center><button id="signup"  class="btn btn-info btn-lg" name="sign_up">Sign In</button></center>
            </form>
			</div>
		</div>
	</div>
</div>

<script src="./js/validate3.js"></script>
</body>
<?php
		 include "../controller/footer.php";
		 ?>
</html>
