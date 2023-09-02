<?php

include("../model/connection.php");
include("../controller/header2.php");
if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}

?>
<?php
$connect = mysqli_connect("localhost", "root", "", "restaurant");
$query = "SELECT * FROM delivary";
$result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Remove Offers</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <style>
   body{
    background-image: url("./images/blueback.jpg");
}
   #box
   {
    width:600px;
    background:gray;
    color:white;
    margin:0 auto;
    padding:10px;
    text-align:center;
   }
  </style>
 </head>
 <body>
  <div class="container">
   <br />
   <h3 align="center">Mark Delivaries</h3><br />
   <?php
   if(mysqli_num_rows($result) > 0)
   {
   ?>
   <div class="table-responsive">
    <table class="table table-bordered">
     <tr>
      <th>Offer Name</th>
      <th>Offer Details</th>
      <th>Delete</th>
     </tr>
   <?php
    while($row = mysqli_fetch_array($result))
    {
   ?>
     <tr id="<?php echo $row["d_id"]; ?>" >
      <td><?php echo $row["d_name"]; ?></td>
      <td><?php echo $row["d_type"]; ?></td>
      <td><input type="checkbox" name="customer_id[]" class="delete_customer" value="<?php echo $row["d_id"]; ?>" /></td>
     </tr>
   <?php
    }
   ?>
    </table>
   </div>
   <?php
   }
   ?>
   <div align="center">
    <button type="button" name="btn_delete" id="btn_delete" class="btn btn-success">Delete</button><br><br><br>
   </div>
 </body>
 <?php
 		 include "../controller/footer.php";
 		?>
</html>

<script>
$(document).ready(function(){

 $('#btn_delete').click(function(){

  if(confirm("Are you sure you want to remove this?"))
  {
   var id = [];

   $(':checkbox:checked').each(function(i){
    id[i] = $(this).val();
   });

   if(id.length === 0) //tell you if the array is empty
   {
    alert("Please Select atleast one checkbox");
   }
   else
   {
    $.ajax({
     url:'../model/delete.php',
     method:'POST',
     data:{id:id},
     success:function()
     {
      for(var i=0; i<id.length; i++)
      {
       $('tr#'+id[i]+'').css('background-color', '#ccc');
       $('tr#'+id[i]+'').fadeOut('slow');
      }
     }

    });
   }

  }
  else
  {
   return false;
  }
 });

});
</script>
