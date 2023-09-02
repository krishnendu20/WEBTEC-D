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
	<title>Management</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/style5.css">
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
    			<td colspan="6" class="active"><h2>Management</h2></td>
    		</tr>
    		<tr>
    			<td style="font-weight: bold;">Update Seller Salary</td>
    			<td>
    				<input class="form-control" id="f_name" type="text" name="f_name" value="<?php echo $user_food; ?>">
  					<div class="error" id="fnameErr"></div>
    			</td>
    		</tr>
    			<tr>
    			<td style="font-weight: bold;">Add New Food Item</td>
    			<td>
    				<input class="form-control" type="text" name="l_name" value="<?php echo $user_food; ?>">
  					<div class="error" id="lnameErr"></div>
    			</td>
    		</tr>
    			<tr>
    			<td style="font-weight: bold;">Change Business Hour</td>
    			<td>
    				<input class="form-control" type="text" name="u_name" value="<?php echo $user_hour; ?>">
  						<div class="error" id="unameErr"></div>
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
		 include "../controller/footer.php";
		 ?>
</body>
</html>
<?php

if (isset($_POST['update'])) {
	$f_name = htmlentities($_POST['f_name']);
	$l_name = htmlentities($_POST['l_name']);
	$u_name = htmlentities($_POST['u_name']);
  if ($f_name == '') {
     echo "<script>alert('Please enter valid firstname')</script>";
     echo "<script>window.open('management.php?u_id$user_id','_self')</script>";

     exit();
     // code...
   }
    elseif ($l_name=='') {
         echo "<script>alert('Please enter valid salary')</script>";
         echo "<script>window.open('management.php?u_id$user_id','_self')</script>";

         exit();
    }
    elseif ($u_name=='') {
         echo "<script>alert('Please enter valid Food Name')</script>";
         echo "<script>window.open('management.php?u_id$user_id','_self')</script>";

         exit();     // code...
    }
   else {
     $update = "update user set salary='$f_name',food='$l_name',hour='$u_name' where user_id='$user_id'";
     $run= mysqli_query($con,$update);
      if ($run) {
        echo "<script>alert('Updating......')</script>";
        echo "<script>window.open('management.php?u_id$user_id','_self')</script>";
        // code...
      }
   }

}
	// code...


 ?>
