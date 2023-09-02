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
	<?php
		$user = $_SESSION['u_email'];
		$get_user = "select * from regis where u_email='$user'";
		$run_user = mysqli_query($con,$get_user);
		$row = mysqli_fetch_array($run_user);
        $user_id = $row['u_id'];
		$user_name = $row['u_name'];
		$user_email = $row['u_email'];
		$user_image =$row['u_image'];
		$first_name =$row['u_name'];
		$country =$row['u_country'];
		$user_gender =$row['u_gender'];
	?>
	<title><?php echo "$user_name"; ?></title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./css/home2.css">
</head>

<body>
<div class="row">
	<div class="col-sm-2">
	</div>
	<div class="col-sm-8">
		<?php
			echo"
		
			<div id='profile-img'>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
				<img src='picture/$user_image' alt='Profile' class='img-circle' width='180px' height='185px'>
				<form action='Home2.php?u_id='$user_id' method='post' enctype='multipart/form-data'>

				<label id='update_profile'> Select Profile
				<input type='file' name='u_image' size='60' />
				</label><br><br>
				<button id='button_profile' name='update' class='btn btn-info'>Update Profile</button>
				</form>
			</div><br>
			";
		?>
		
	</div>


	<?php
		if(isset($_POST['update'])){

				$u_image = $_FILES['u_image']['name'];
				$image_tmp = $_FILES['u_image']['tmp_name'];
				$random_number = rand(1,100);

				if($u_image==''){
					echo "<script>alert('Please Select Profile Image on clicking on your profile image')</script>";
					echo "<script>window.open('Home2.php?u_id=$user_id' , '_self')</script>";
					exit();
				}else{
					move_uploaded_file($image_tmp, "picture/$u_image.$random_number");
					$update = "update regis set u_image='$u_image.$random_number' where u_id='$user_id'";

					$run = mysqli_query($con, $update);

					if($run){
					echo "<script>alert('Your Profile Updated')</script>";
					echo "<script>window.open('Home2.php?u_id=$user_id' , '_self')</script>";
					}
				}

			}
	?>
	<br><br><br><div class="col-sm-2">
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
	</div>
	<div class="col-sm-2" style="background-color: #61B39E;text-align: center;left: 0.7%;border-radius: 5px;">
		<?php
		echo"
			<center><h2><strong>About Your Self</strong></h2></center>
			<center><h4><strong>Name :$first_name</strong></h4></center>
			<p><strong>Email: </strong> $user_email</p><br>
			<p><strong>Lives In: </strong> $country</p><br>
			
			<p><strong>Gender: </strong> $user_gender</p><br>
			
		";
		?>
	</div>
	<div class="col-sm-6">
		<?php
         global $con;
         if (isset($_GET['u_id'])) {

         	$u_id= $_GET['u_id'];

         	// code...
         }

            	global $con;


            	if (isset($_GET['u_id'])) {
            		$u_id= $_GET['u_id'];
            		// code...
            	}
            	$get_posts="select u_email from regis where u_id='u_id'";
            	$run_user = mysqli_query($con,$get_posts);
            	$row = mysqli_fetch_array($run_user);

            	$user_email = $row['u_email'];

            	$user = $_SESSION['u_email'];

            	$get_user="select * from regis where u_email='$user'";

            	$run_users= mysqli_query($con,$get_user);
            	$row = mysqli_fetch_array($run_users);

            	$user_id = $row['u_id'];
            	$u_email = $row['u_email'];

            	if($u_email == $user_email){
            		echo"<script>window.open('Home2.php?u_id=$user_id','_self')</script>";
            	}
            	else{
            	}

		 ?>
	</div>
	<div class="col-sm-2">

	</div>
</div>
</body><br><br>

</html>
