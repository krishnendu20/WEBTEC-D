<?php

$student_id = $_POST["id"];
$firstName = $_POST["first_name"];
$lastName = $_POST["last_name"];

$conn = mysqli_connect("localhost","root","","restuarant") or die("Connection Failed");

$sql = "UPDATE users SET u_name = '{$firstName}', u_type = '{$lastName}' WHERE u_id = {$student_id}";

if(mysqli_query($conn, $sql)){
  echo 1;
}else{
  echo 0;
}

?>
