<?php
include("../model/connection.php");

	if(isset($_POST['signup'])){

		$first_name = htmlentities(mysqli_real_escape_string($con,$_POST['name']));
		
		$pass = htmlentities(mysqli_real_escape_string($con,$_POST['password']));
		$cpass = htmlentities(mysqli_real_escape_string($con,$_POST['cpassword']));
		$email = htmlentities(mysqli_real_escape_string($con,$_POST['email']));
		$country = htmlentities(mysqli_real_escape_string($con,$_POST['country']));
		$gender = htmlentities(mysqli_real_escape_string($con,$_POST['gender']));

		$check_username_query = "select un_name from regis where u_email='$email'";
		$run_username = mysqli_query($con,$check_username_query);
        
		if(strlen($pass) <9 ){
			echo"<script>alert('Password should be minimum 9 characters!')</script>";
            echo "<script>window.open('../view/signup-user.php', '_self')</script>";
			exit();
		}

		$check_email = "select * from regis where u_email='$email'";
		$run_email = mysqli_query($con,$check_email);

		$check = mysqli_num_rows($run_email);

	if($check == 1){
			echo "<script>alert('Email Already Exists')</script>";
            echo "<script>window.open('../view/signup-user.php', '_self')</script>";
			exit();
		}
	 elseif ($first_name == '') {
     echo "<script>alert('Please enter valid Name')</script>";
    echo "<script>window.open('../view/signup-user.php', '_self')</script>";

     exit();
     // code...
   }
  
    elseif ($pass=='') {
         echo "<script>alert('Please enter valid password')</script>";
        echo "<script>window.open('../view/signup-user.php', '_self')</script>";

         exit();
    }
     elseif ($cpass=='') {
         echo "<script>alert('Please enter valid password')</script>";
        echo "<script>window.open('../view/signup-user.php', '_self')</script>";

         exit();
    }
    elseif ($email=='') {
         echo "<script>alert('Please enter valid email')</script>";
         echo "<script>window.open('../view/signup-user.php', '_self')</script>";

         exit();     // code...
    }
    elseif ($country=='') {
		echo "<script>alert('Please enter valid country')</script>";
		echo "<script>window.open('../view/signup-user.php', '_self')</script>";

		exit();     // code...
   }
   elseif ($gender=='') {
	echo "<script>alert('Please enter valid gender')</script>";
	echo "<script>window.open('../view/signup-user.php', '_self')</script>";

	exit();     // code...
}
    
		$insert = "insert into regis (u_name,u_pass,u_email,u_image,u_country,u_gender)
		values('$first_name','$pass','$email','default_cover.jpg','$country','$gender')";

		$query = mysqli_query($con, $insert);

		if($query){
			echo "<script>alert(' $first_name,You are a new member now.')</script>";
			echo "<script>window.open('../view/login-user.php', '_self')</script>";
		}
		else{
			echo "<script>alert('Registration failed, please try again!')</script>";
            echo "<script>window.open('../view/signup-user.php', '_self')</script>";
		}
	}
?>
