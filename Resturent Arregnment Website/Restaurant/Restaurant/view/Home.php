error_reporting(0);
<?php


include("../model/connection.php");
include("../controller/header2.php");
if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
?>
<!DOCTYPE html>

<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "restaurant");


  $msg = "";

 
  if (isset($_POST['upload'])) {

  	$image = $_FILES['image']['name'];
  
  	$image_text = mysqli_real_escape_string($db, $_POST['image_text']);
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO images (images,texts) VALUES ('$image','$image_text')";

  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM images");
?>
<!DOCTYPE html>
<html>
<head>
<title>Home</title>

<link rel="stylesheet" type="text/css" href="./css/home.css">
</head>
<body>
<center><td colspan="6" class="active"><h2>Add SFood Related Pictures</h2></td></center>
<div id="content">
  <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='images/".$row['images']."' >";
      	echo "<i>","<h3>".$row['texts']."</h3>","</i>";
      echo "</div>";
    }
  ?>
  <form method="POST" action="Home.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>
  	<div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="image_text" 
      	placeholder="ADD Food Related Details..."></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload">POST</button>
  	</div>
  </form>
</div>
</body>
</html>