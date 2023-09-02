<?php

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];

$conn = mysqli_connect("localhost","root","","restaurant") or die("Connection Failed");

$sql = "INSERT INTO users (u_name, u_type) VALUES ('{$first_name}','{$last_name}')";

if(mysqli_query($conn, $sql)){
  echo 1;
}else{
  echo 0;
}


?>
