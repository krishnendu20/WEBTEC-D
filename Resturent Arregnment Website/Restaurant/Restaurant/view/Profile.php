<?php
session_start();

include("../controller/header3.php");
if(!isset($_SESSION['u_email'])){
	header("location: index.php");
}

?>
<!DOCTYPE html>
<html>
<head>

	<title>Edit Your Personal Information</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" type="text/css" href="./css/style6.css">
</head>
<style>
.error{
	color: red;
}
</style>
<body>
<div class="row">
  <div class="col-sm-2">
  </div>
  <div class="col-sm-8">
  	<form name="updateForm" onsubmit="return validateForm()" action="" method="post" enctype="multipart/form-data">
      <table class="table table-bordered table-hover">
    		<tr align="center">
    			<td colspan="6" class="active"><h2>Edit Your Profile</h2></td>
    		</tr>
    			<tr>
    			<td style="font-weight: bold;">Change Your Name</td>
    			<td>
    				<input class="form-control" type="text" name="u_name" value="<?php echo $user_name; ?>">
  						<div class="error" id="unameErr"></div>
    			</td>
    		</tr>
    			<tr>
    		<tr>
    			<td style="font-weight: bold;">Change Password</td>
    			<td>
    				<input  class="form-control" type="password" name="u_pass" id="mypass" value="<?php echo $user_pass; ?>">
  						<div class="error" id="passwordErr"></div>
    			</td>
    		</tr>
    		<tr>
    			<td style="font-weight: bold;">Email</td>
    			 <td>
    				<input class="form-control" type="email" name="u_email"  value="<?php echo $user_email; ?>">
  						<div class="error" id="emailErr"></div>
    			</td>
    		</tr>
    		<tr>
    			<td style="font-weight: bold;">Country</td>
    			<td>
    				<select class="form-control" name="u_country">
    					  <option>Bangladesh</option>
  							<option>United States of America</option>
  							<option>India</option>
  							<option>Japan</option>
  							<option>UK</option>
  							<option>France</option>
  							<option>Germany</option>

    				</select>
    			</td>
    		</tr>
    		<tr>
    			<td style="font-weight: bold;">Gender</td>
    			<td>
    				<select class="form-control" name="u_gender">

  							<option>Male</option>
  							<option>Female</option>
  							<option>Others</option>

    				</select>
    			</td>
    		</tr>
    		
  		<tr align="center">
  			<td colspan="6">
  				<input type="submit" class="btn btn-info" name="update" style="width:250px;" value="Update">
  			</td>
  		</tr>
  	</table>
  </form>
  </div>
  <div class="col-sm-2">
  </div>
</div>
<?php
		 include "../Controller/footer.php";
		 ?>
</body>
</html>
<?php

if (isset($_POST['update'])) {

	$u_name = htmlentities($_POST['u_name']);
	$u_pass = htmlentities($_POST['u_pass']);
	$u_email = htmlentities($_POST['u_email']);
	$u_country = htmlentities($_POST['u_country']);
	$u_gender = htmlentities($_POST['u_gender']);

    if ($u_name=='') {
         echo "<script>alert('Please enter valid username')</script>";
         echo "<script>window.open('edit.php?u_id$user_id','_self')</script>";

         exit();     // code...
    }
    elseif ($u_pass=='') {
         echo "<script>alert('Please enter valid password')</script>";
         echo "<script>window.open('edit.php?u_id$user_id','_self')</script>";

         exit();
    }
    elseif ($u_email=='') {
         echo "<script>alert('Please enter valid email')</script>";
         echo "<script>window.open('edit.php?u_id$user_id','_self')</script>";

         exit();     // code...
    }
   else {
     $update = "update regis set u_name='$u_name', u_pass='$u_pass',u_email='$u_email',u_counrey='$u_country',u_gender='$u_gender' where u_id='$user_id'";
     $run= mysqli_query($con,$update);
      if ($run) {
        echo "<script>alert('Updating......')</script>";
        echo "<script>window.open('Profile.php?u_id$user_id','_self')</script>";
        // code...
      }
   }

}
	// code...


 ?>
