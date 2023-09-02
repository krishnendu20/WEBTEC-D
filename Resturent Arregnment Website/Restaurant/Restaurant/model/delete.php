<?php
//delete.php
$connect = mysqli_connect("localhost", "root", "", "sheba");
if(isset($_POST["id"]))
{
 foreach($_POST["id"] as $id)
 {
  $query = "DELETE FROM offers WHERE o_id = '".$id."'";
  mysqli_query($connect, $query);
 }
}
?>