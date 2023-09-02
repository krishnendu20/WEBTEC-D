<?php

$student_id = $_POST["id"];

$conn = mysqli_connect("localhost","root","","restaurant") or die("Connection Failed");

$sql = "SELECT * FROM users WHERE u_id = {$student_id}";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if(mysqli_num_rows($result) > 0 ){

  while($row = mysqli_fetch_assoc($result)){
    $output .= "<tr>
      <td width='90px'>User Name</td>
      <td><input type='text' id='edit-fname' value='{$row["u_name"]}'>
          <input type='text' id='edit-id' hidden value='{$row["u_id"]}'>
      </td>
    </tr>
    <tr>
      <td>User Type</td>
      <td><input type='text' id='edit-lname' value='{$row["u_type"]}'></td>
    </tr>
    <tr>
      <td></td>
      <td><input type='submit' id='edit-submit' value='save'></td>
    </tr>";

  }

    mysqli_close($conn);

    echo $output;
}else{
    echo "<h2>No Record Found.</h2>";
}

?>
