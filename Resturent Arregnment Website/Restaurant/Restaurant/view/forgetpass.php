<?php
 $passErr="";
  if ($_SERVER['REQUEST_METHOD'] === "POST" & count($_REQUEST) >0) {
    $username = $_POST['name'];
    $newpass = $_POST['newpass'];
    $Confirmpass = $_POST['Confirmpass'];
    if(empty($username) or empty($Confirmpass)) {
    echo "Please fill up the form properly";
     echo "<br>";
    }

    if ($newpass == $Confirmpass){

      $username = validate($username);

      $data = file_get_contents("../data/buyerdata.json");
      $data = json_decode($data, true);
   if (!empty($data))
   {
    foreach ($data as $key => $row){
       if ($row["Email"] == $username){
         $data[$key]['Password'] = $newpass;

       file_put_contents('../data/buyerdata.json', json_encode($data));
       echo "Password Changed Successfully";
       break;

       }
       else {
         echo "Email Doesnot Match";
         break;
       }
    }
  }else {
    echo "Server Error..";
     echo "<br>";
  }
}
else {
  echo "Password Doesnot Match";
   echo "<br>";
}

  }

  function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
include "../controller/Header1.php";
?> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <meta charset="utf-8">
    <title>Forget Password</title>
  </head>
  <body>
   <center><h1>Change Password</h1></center>
   <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
     <center><fieldset>
   
          <b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspEnter Email :</b>*&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="email" name="name" placeholder="Email" ><br><br>
         <b>New Password :</b>*&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="password" name="newpass" placeholder="New Password" >
                   <br><br>
        <b>Confirm Password :</b>*&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="password" name="Confirmpass" placeholder="Confirm Password"><br><br>
      </fieldset><br>
      </center> 
         <center><input type="submit" class="btn btn-info" name="submit"  value="Submit"></center>
    </form><br>
   <form action="Buyer_Login.php">
      <center><input type="submit" class="btn btn-info" name="submit" style="width:200px;" value="Go Back To Login"></center>

</form>
    <br><br><br><br><br><br>
  </body>
</html>
