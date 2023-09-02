<?php

include("../model/connection.php");
include("../controller/header2.php");
if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>

	<title>Edit Your Personal Information</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/home_style2.css">
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
    			<td style="font-weight: bold;">Change Your Firstname</td>
    			<td>
    				<input class="form-control" id="f_name" type="text" name="f_name" value="<?php echo $first_name; ?>">
  					<div class="error" id="fnameErr"></div>
    			</td>
    		</tr>
    			<tr>
    			<td style="font-weight: bold;">Change Your Lastname</td>
    			<td>
    				<input class="form-control" type="text" name="l_name" value="<?php echo $last_name; ?>">
  					<div class="error" id="lnameErr"></div>
    			</td>
    		</tr>
    			<tr>
    			<td style="font-weight: bold;">Change Your Username</td>
    			<td>
    				<input class="form-control" type="text" name="u_name" value="<?php echo $user_name; ?>">
  						<div class="error" id="unameErr"></div>
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
    			<td style="font-weight: bold;">Gender</td>
    			<td>
    				<select class="form-control" name="u_gender">
    					<option><?php echo $user_gender ?></option>

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
  <script src="./js/validate2.js"></script>
  <div class="col-sm-2">
  </div>
</div>
<?php
		 include "../controller/footer.php";
		 ?>
</body>
</html>
<?php

if (isset($_POST['update'])) {
	$f_name = htmlentities($_POST['f_name']);
	$l_name = htmlentities($_POST['l_name']);
	$u_name = htmlentities($_POST['u_name']);
	
	$u_email = htmlentities($_POST['u_email']);

	$u_gender = htmlentities($_POST['u_gender']);

  if ($f_name == '') {
     echo "<script>alert('Please enter valid firstname')</script>";
     echo "<script>window.open('edit.php?u_id$user_id','_self')</script>";

     exit();
     // code...
   }
    elseif ($l_name=='') {
         echo "<script>alert('Please enter valid lastname')</script>";
         echo "<script>window.open('edit.php?u_id$user_id','_self')</script>";

         exit();
    }
    elseif ($u_name=='') {
         echo "<script>alert('Please enter valid username')</script>";
         echo "<script>window.open('edit.php?u_id$user_id','_self')</script>";

         exit();     // code...
    }
    elseif ($u_email=='') {
         echo "<script>alert('Please enter valid email')</script>";
         echo "<script>window.open('edit.php?u_id$user_id','_self')</script>";

         exit();     // code...
    }
   else {
     $update = "update user set f_name='$f_name',l_name='$l_name',user_name='$u_name',user_email='$u_email',user_gender='$u_gender' where user_id='$user_id'";
     $run= mysqli_query($con,$update);
      if ($run) {
        echo "<script>alert('Updating......')</script>";
        echo "<script>window.open('edit.php?u_id$user_id','_self')</script>";
        // code...
      }
   }

}
	// code...


 ?>
