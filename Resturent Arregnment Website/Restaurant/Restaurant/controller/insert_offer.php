<?php
include("../model/connection.php");

	if(isset($_POST['sign_up'])){

		$first_name = htmlentities(mysqli_real_escape_string($con,$_POST['fname']));
		$last_name = htmlentities(mysqli_real_escape_string($con,$_POST['lname']));
		
        $insert = "insert into offers (o_name,o_details)
		values('$first_name','$last_name')";

		$query = mysqli_query($con, $insert);

		if($query){
			echo "<script>alert('Offer Inserted')</script>";
			echo "<script>window.open('../view/Add.php', '_self')</script>";
		}
		else{
			echo "<script>alert('Offer failed, please try again!')</script>";
		  echo "<script>window.open('../view/Add.php', '_self')</script>";
		}
	}
?>
