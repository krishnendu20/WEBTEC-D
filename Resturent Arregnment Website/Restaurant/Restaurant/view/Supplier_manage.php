<?php
session_start();

include("../controller/header3.php");
if(!isset($_SESSION['u_email'])){
	header("location: index.php");
}

?>
<html>
    <head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>
            Update Informations
        </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <style>
    body{

     background-image: url("../picture/blackback.jpg");

     font-family: 'Poppins', sans-serif;
    }
    table{
        border-collapse:collapse;
        width: 100%;
        color: #d96459;
        font-family: monospace;
        font-size: 25px;
        text-align: left;
    }
    th{
        background-color: #d96459;
        color: white;
    }
   </style>
        
    </head>
    <body>
        <h1>Update Informations
        </h1>
        <table>
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product Status</th>
        </tr>
        <?php
        $conn =mysqli_connect("localhost","root","","restaurant");
        if($conn-> connect_error) {
            die("Connection failed:". $conn-> connect_error);

        }
        $sql = "select p_id,p_name,p_price,status from price";
        $result =$conn-> query($sql);
        if($result->num_rows >0){
            while($row = $result-> fetch_assoc()){
              echo"<tr><td>".$row["p_id"]."</td><td>".$row["p_name"]."</td><td>".$row["p_price"]."</td><td>".$row["status"]."</td></tr>"; 
            }
            echo "</table>";
        }
        else{
            echo "0 result";
        }
        $conn->close();
        ?>
        </table>
        <form name="updateForm" onsubmit="return validateForm()" action="" method="post" enctype="multipart/form-data">
      <table class="table table-bordered table-hover">
    		<tr align="center">
    			<td colspan="6" class="active"><h2>Update Informations</h2></td>
    		</tr>
    		<tr>
    			<td style="font-weight: bold;">Update Name</td>
    			<td>
    				<input class="form-control" id="f_name" type="text" name="f_name" value="">
  					<div class="error" id="fnameErr"></div>
    			</td>
    		</tr>
    			<tr>
    			<td style="font-weight: bold;">Update Price</td>
    			<td>
    				<input class="form-control" type="text" name="l_name"value="" >
  					<div class="error" id="lnameErr"></div>
    			</td>
    		</tr>
    			<tr>
    			<td style="font-weight: bold;">Update Status</td>
    			<td>
    				<input class="form-control" type="text" name="u_name" value="">
  						<div class="error" id="unameErr"></div>
  		         </tr>
                   <tr>
    			<td style="font-weight: bold;">Give ID Of The Product</td>
    			<td>
    				<input class="form-control" type="text" name="id"value="" >
  						<div class="error" id="unameErr"></div>
  		         </tr>
               
  		     <tr align="center">
  			<td colspan="6">
  				<input type="submit" class="btn btn-info" name="update1" style="width:250px;" >
  			</td>
  		</tr>
  	</table>
  </form>
    </body><br> <br><br>
    <?php
		 include "../controller/footer.php";
		 ?>
</html>
<?php
if (isset($_POST['update1'])) {
	$f_name = htmlentities($_POST['f_name']);
	$l_name = htmlentities($_POST['l_name']);
	$u_name = htmlentities($_POST['u_name']);
    $id = htmlentities($_POST['id']);


    if(!empty($f_name)&& !empty($l_name)&& !empty($u_name)){
     $update = "update price set p_name='$f_name',p_price='$l_name',status='$u_name' where p_id='$id'";
     $run= mysqli_query($con,$update);
      if ($run) {
        echo "<script>alert('Updating......')</script>";
        echo "<script>window.open('Supplier_manage.php?u_id$user_id','_self')</script>";
      }
        // code...
      }
      else{
        echo "<script>alert('Please Fill Up All The Fields')</script>";
        echo "<script>window.open('Supplier_manage.php?u_id$user_id','_self')</script>";
      }
   

}
	// code...


 ?>