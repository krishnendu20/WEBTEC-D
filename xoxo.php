

<?php
$txt=" ";
if ($_SERVER["REQUEST_METHOD"] == "GET") 
{
    if(empty($_GET['name']))
    {
        $ename="";
        
    }
    else{
        $file=fopen(Allsave.txt, "w") or die("Unabel to open");
        $text=$_GET['name'];
        fwrite($file, $text);
        $text=$_GET['pass'];
        fwrite($file, $text);
         $text=$_GET['email'];
         fwrite($file, $text);
        fwrite($file, $text);
        fclose($file);
    }
}
?>


<!DOCTYPE html> 


<head>
<title> Reg </title>
</head>
<body>
<form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="get">
<fieldset>
 <legend><B>REGISTRATION </legend></b>
 <label for ="name"> Name  :</label>
  <input type="text"name="name" placeholder ="Enter your name ">  <br> <br> <hr>
  
   <label for ="name"> Email </label>
  <input type="email"name="name" placeholder ="Enter your email"> <br> <br> <hr>
  
   <label for ="name"> Password :</label>
  <input type="password"name="name" placeholder ="Enter your password"> <br> <br><hr>
  
  <label for "img"><B> Your Image : </B> </label>
  <input type ="file" name = "img" id="fileuplode"> <br> <br>
  
  

  <button> SUBMIT </button>
  </fieldset>
  </body>
  </html>
