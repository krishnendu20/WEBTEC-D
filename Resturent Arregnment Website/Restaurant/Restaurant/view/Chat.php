<?php
session_start();
include("../model/connection.php");
include("../controller/header3.php");
if(!isset($_SESSION['u_email'])){
	header("location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Message Service Provides</title>
    <link rel="stylesheet" href="./css/mes.css">
  
  </head>
  <body>
    <div id="div1">
      <p id="p1">Chat Application</p>
      <div id="div2">
        <table>
          <?php
          error_reporting(0);
          include '../model/db.php';
          $sql1="SELECT * from chat";
          $query1=mysqli_query($conn,$sql1);
           while ($info=mysqli_fetch_array($query1)) {
             ?>
             <tr>
               <td id="td1"><?php echo $info['chat']; ?></td>
               <td id="td2"><?php echo formatDate($info['time']); ?></td>
             </tr>

             <?php
           }

          ?>
        </table>

      </div>

      <form action="chat.php" method="post">
        <textarea id="chat" name="chat" rows="8" cols="80" placeholder="Write Message" required></textarea>
        <input id="sendbutton" type="submit" name="send" value="Send">

      </form>
      <?php
        ///include 'db.php';
        if (isset($_POST['send'])) {
          header("Location: chat.php");
          $chat=$_POST['chat'];
          $sql="INSERT INTO chat(chat) values('$chat')";
          $query=mysqli_query($conn,$sql);

          // code...
        }

       ?>

    </div>

  </body>
</html>