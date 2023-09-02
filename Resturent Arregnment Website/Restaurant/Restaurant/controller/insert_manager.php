<?php
include("../model/connection.php");

	if(isset($_POST['sign_up'])){

		$first_name = htmlentities(mysqli_real_escape_string($con,$_POST['fname']));
		$last_name = htmlentities(mysqli_real_escape_string($con,$_POST['lname']));
		$pass = htmlentities(mysqli_real_escape_string($con,$_POST['password']));
		$email = htmlentities(mysqli_real_escape_string($con,$_POST['email']));
		$IP_Add = htmlentities(mysqli_real_escape_string($con,$_POST['IP_Add']));
		$gender = htmlentities(mysqli_real_escape_string($con,$_POST['gender']));
		$newgid = sprintf('%05d', rand(0, 999999));

		$username = strtolower($first_name . "_" . $last_name . "_" . $newgid);
		$check_username_query = "select user_name from user where user_email='$email'";
		$run_username = mysqli_query($con,$check_username_query);

		if(strlen($pass) <9 ){
			echo"<script>alert('Password should be minimum 9 characters!')</script>";
			exit();
		}

		$check_email = "select * from user where user_email='$email'";
		$run_email = mysqli_query($con,$check_email);

		$check = mysqli_num_rows($run_email);

		if($check == 1){
			echo "<script>alert('Email already exist, Please try using another email')</script>";
			echo "<script>window.open('../view/Register.php', '_self')</script>";
			exit();
		}

		$rand = rand(1, 3); //Random number between 1 and 3

			if($rand == 1)
			{
				// $profile_pic ="./view/images/head_red.jpg";
				$profile_pic = "head_red.jpg";
			}
			else if($rand == 2)
			{
				$profile_pic ="head_sun_flower.jpg";
			}
			else if($rand == 3)
			{
				$profile_pic ="placeholder.jpg";
			}

		$insert = "insert into user (f_name,l_name,user_name,user_pass,user_email,user_gender,user_image,recovery_account,user_ip)
		values('$first_name','$last_name','$username','$pass','$email','$gender','$profile_pic','Type Best Friend Name.','$IP_Add')";

		$query = mysqli_query($con, $insert);

		if($query){
			echo "<script>alert('Well Done $first_name, you are good to go.')</script>";
			echo "<script>window.open('../view/Manager_Login.php', '_self')</script>";
		}
		else{
			echo "<script>alert('Registration failed, please try again!')</script>";
		  echo "<script>window.open('../view/Register.php', '_self')</script>";
		}
	}
?>
