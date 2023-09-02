<?php
$host="localhost";
$user="root";
$pass="";
$db="restaurant";

$conn=mysqli_connect($host,$user,$pass,$db);

function formatDate($date){
  return date('g:i a',strtotime($date));
}

 ?>