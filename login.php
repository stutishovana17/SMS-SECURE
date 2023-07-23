<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<style type="text/css">
   body{
       background-image:url(pic1.jpg);
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
    background: #43a046;
}
form message{
    margin: 15px 0 0;
    color: burlywood;
    font-size:18px;
}
.form .message a{
    color:#4CAF50;
    text-decoration:none;
}

   </style>
    
   

<body>
    <center><br><br>
        <h1>Student Management System</h1><br>
        <form action="#" method="post">
           <b> <input type="submit" name="admin_login" value="Admin Login"></b>
            <b><input type="submit" name="student_login" value="Student Login"><br><br></b>
            <b> <input type="submit" name="student_registration" value="Student Registration"></b>
            <p class ="message"> Already Registered? <a href="student_login.php">Login</a></p>
</form>
<script src='https://code.jquery.com/jquery-3.6.0.min.js'>
</script>
<script>
    $('.message a').click(function(){
    $('form').animate({height:"toggle",opacity:"toggle"},"slow");
    }); 
</script>
<?php
   if(isset($_POST['admin_login'])){
      header("location:admin_login.php"); 
   } if(isset($_POST['student_login'])){
    header("location:student_login.php"); 
 }if(isset($_POST['student_registration'])){
    header("location:student_registration.php");
 }
 ?>

</center>
</body>
</html>