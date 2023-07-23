<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload_photo</title>
</head>
<style type="text/css">
   body{
       background-image:url(pic5.jpg);
       height:100vh;
       background-size: cover;
       background-position: center;
   }
   </style>
   <?php
   error_reporting(0);
   $con = mysqli_connect("localhost","root","", "secure sms");
   session_start();
   $con=mysqli_connect("localhost","root","");
    $db=mysqli_select_db($con,"secure sms");
   ?>
<body>
<div id="header">
        <center><br><strong>Student Information System &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
        
        Email:<?php  $_SESSION['email'];?>
        Password:<?php  $_SESSION['password']?>
        
        <a href="logout.php">Logout</a>
    </center>
</div>
    <?php
    $dbh=new PDO("mysql:host=localhost;dbname=secure sms","root","");
    if(isset($_POST['upload'])){
        $name = $_FILES['myfile']['name'];
        $type=$_FILES['myfile']['type'];
        $data= file_get_contents($_FILES['myfile']['tmp_name']);
       $stmt = $dbh->prepare("insert into student values('', ?,?,?)");
        $stmt->bindParam(1,$name);
        $stmt->bindParam(2,$type);
        $stmt->bindParam(3,$data);
        $stmt->execute();
        if($stmt==True)

        header("location:student_dashboard.php");
        else
        echo"<center> <b>You have to Upload Your image </b></center>";

    }
   
    ?>
    <form method="post" enctype="multipart/form-data"><br><br><br><br><br><br><br><br><br>
         <center><h1> Upload Your Photo Here</h1></center>
       <center> <input type="file" name="myfile"/></center><br><br><br>
       <center> <button name="upload">Upload</button><center>
    </form>
  
   
</body>
</html>
