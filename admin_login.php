<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<style type="text/css">
   body{
       background-image:url(pic6.jpg);
       height:100vh;
       background-size: cover;
       background-position: center;
   }
   form{
    position:relative;
    z-index:1;
    background: #92a8d1;
    max-width:360px;
    margin: 0 auto 100px;
    padding: 45px;
    text-align:center;
}
form input {
    font-family:"Roboto",sans-serif;
    outline:1;
    background: #f2f2f2;
    width:100%;
    border:0;
    margin: 0 0 15px;
    padding:15px;
    box-sizing:border-box;
    font-size:14px;
}
form button:hover,.form button:active{
    background: #43A047;
}

   </style>
<body>
    <center><br><br>
        <h1>Admin Login Panel</h1><br>
        <form action="" method="post">
         Email:<input type="text" name="email"required ><br><br>
         Name:<input type="text" name="name" required><br><br>
         <input type="submit"name="submit" value="Submit">
</form><br>
<?php
 session_start();
if(isset($_POST['submit'])){
   $con=mysqli_connect("localhost","root","");
   $db=mysqli_select_db($con,"secure sms");
   $query ="SELECT * FROM login WHERE email='$_POST[email]'";
   $query_run =mysqli_query($con,$query);
   while($row=mysqli_fetch_assoc($query_run)){
       if($row['email'] == $_POST['email']){
           if($row['name']== $_POST['name']){
               $_SESSION['email']=$row['email'];
               $_SESSION['name']=$row['name'];
           header("location:admin_dashboard.php");

           }
       else{
           echo"Wrong Name";
       }
   }
   else{
       echo"Wrong email id";
   }
}
}
?>
</center>
</body>
</html>