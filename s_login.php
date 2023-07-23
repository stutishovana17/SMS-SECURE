<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>



</style>
</head>
<body>


  
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand">Navbar</a>
    <form class="d-flex" method="post" action="">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="fullname">
      <button class="btn btn-outline-success" type="submit" name="search">Search</button>
    </form>
  </div>
</nav>

  <center><br><br><br><br>
<div id="frmRegistration">
<form class="form-horizontal" method="POST" action="student_login_connect.php">
	<h1><b>Student Login Panel</b></h1>
	
  <div class="form-group">
    <label class="control-label col-sm-2" for="email"><b>Email:</b></label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="email" id="email" placeholder="Enter email">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd"><b>Password:</b></label>
    <div class="col-sm-6"> 
      <input type="password" class="form-control" name="password" id="pwd" placeholder="Enter password">
    </div>
  </div><br>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="login" class="btn btn-primary">Login</button>
    </div>
  </div>
  <p class ="message"> Not Registered? <a href="student_registration.php">Register</a></p>
 
</form>
</div><br><br></center>
<script src='https://code.jquery.com/jquery-3.6.0.min.js'>
</script>
<script>
    $('.message a').click(function(){
    $('form').animate({height:"toggle",opacity:"toggle"},"slow");
    }); 
</script>





</body>
</html>
<?php
error_reporting(0);
 $con=mysqli_connect("localhost","root","");
 $db=mysqli_select_db($con,"secure sms");
if (isset($_POST["search"])) 
                {   
                 $query ="select * from student where fullname ='$_POST[fullname]'";
                 $query_run = mysqli_query($con, $query);
                 $row=mysqli_fetch_assoc($con,$query_run);
                    
                    if (!empty($row)) 
                    {
                        ?>
                  <center><b>  <?php echo htmlspecialchars ($_POST['fullname']); ?> RESULT FOUND </b></center>
                  <?php
                    } else {
                        ?>
                    <center><b><?php echo htmlspecialchars ($_POST['fullname']); ?> NOT FOUND<br><br></b></center>
                <?php
                    }
                }    
            
            
			?>