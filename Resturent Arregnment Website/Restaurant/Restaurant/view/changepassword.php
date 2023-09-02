<!DOCTYPE html>
<?php
	include("../controller/header2.php");
	?>
<?php

include("../model/connection.php");
if(!isset($_SESSION['user_email'])){
	header("location:index.php");
}

?>

<html>
<head>
	<title>Forgot Password</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="./css/home_style2.css">
</head>
<style>
	
</style>
<body>
 
<div class="row">
  <div class="col-sm-12">
      <div class="main-content">
          <div class="header">
            <h3 style="text-align:center;">Change Your Password.</h3>
          </div>
          <div class="l_pass">
            <form action="" method="post">
              <div class="input-group">
                 <span class="input-group-addon"></span>
                 <input id="password" type="password" name="pass"class="form-control" placeholder="New Password" >
              </div><br>


              <div class="input-group">
                <span class="input-group-addon"></span>
                <input id="password" type="password" class="form-control" placeholder="Re-enter New Password" name="pass1">
              </div><br>
               <center><button id="signup" class="btn btn-info btn-lg" name="change">Change Password</button></center>
            </form>
          </div>
      </div>
  </div>
</div>
</body>
</html>
<?php
 if (isset($_POST['change'])) {
   $user = $_SESSION['user_email'];
   $get_user="select * from user where user_email='$user'";
   $run_user = mysqli_query($con,$get_user);
   $row = mysqli_fetch_array($run_user);

   $user_id = $row['user_id'];

   $pass = htmlentities(mysqli_real_escape_string($con, $_POST['pass']));
   $pass1 = htmlentities(mysqli_real_escape_string($con, $_POST['pass1']));

   if($pass == $pass1){
     if (strlen($pass)>=6 && strlen($pass)<=60) {
       $update = "update user set user_pass='$pass' where user_id='$user_id'";
       $run = mysqli_query($con,$update);
       echo"<script>alert('Your Password is changed a moment ago')</script>";
       	echo "<script>window.open('Home.php', '_self')</script>";
       // code...
     }
     else if(strlen($pass)==0) {
        echo"<script>alert('Please fillup all the fields')</script>";
       // code...
     }

     else {
        echo"<script>alert('Your Password greater than 6 characters')</script>";
       // code...
     }
   }
   else {
       echo"<script>alert('Your Password did not changed')</script>";
       	echo "<script>window.open('changepassword.php', '_self')</script>";
       // code...
     }
   }


 ?>
 <?php
 		 include "../controller/footer.php";
 		?>
