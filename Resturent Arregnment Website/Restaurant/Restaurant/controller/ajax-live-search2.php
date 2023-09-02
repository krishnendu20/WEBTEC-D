<?php

$search_value = $_POST["search"];

$conn = mysqli_connect("localhost","root","","restaurant") or die("Connection Failed");

$sql = "SELECT * FROM users WHERE u_name LIKE '%{$search_value}%' OR u_type LIKE '%{$search_value}%'";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if(mysqli_num_rows($result) > 0 ){
  $output = '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
              <tr>
                <th width="60px">User Id</th>
                <th>UserName And Type</th>
                <th width="90px">Edit</th>
                <th width="90px">Delete</th>
              </tr>';

              while($row = mysqli_fetch_assoc($result)){
                $output .= "<tr><td align='center'>{$row["u_id"]}</td><td>{$row["u_name"]} {$row["u_type"]}</td><td align='center'><button class='edit-btn' data-eid='{$row["u_id"]}'>Edit</button></td><td align='center'><button Class='delete-btn' data-id='{$row["u_id"]}'>Delete</button></td></tr>";
              }
    $output .= "</table>";

    mysqli_close($conn);

    echo $output;
}else{
    echo "<h2>No Record Found.</h2>";
}

?>
