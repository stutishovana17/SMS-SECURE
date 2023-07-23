<?php
error_reporting(0);
session_start();
$_SESSION["random_no"]=rand();
$rno=$_SESSION["random_no"];
//echo $rno;
require_once('connection_registration.php');
$GLOBALS["empty_email"]="";
$GLOBALS["empty_password"]="";

function validation1($email)
    {
      
        if (empty($_POST["email"])) 
        {
        
          $GLOBALS["empty_email"]='<div class="error">
          Email cannot be left empty.
          </div>';
          
          
          
            return false;
        } elseif (!preg_match("/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/", $email)) 
        {
          $GLOBALS["empty_email"]='<div class="error">
          Email Format incorrect.
          </div>';
            return false;
        } elseif (strlen($email) > 50) 
        {
          $GLOBALS["empty_email"]='<div class="error">
          Email length exceed It should within 50 character.
          </div>';
            return false;
        } 
        else 
        {
            return true;
        }
    }
	function validation4($password)
    {
        if (empty($password)) 
        {
          $GLOBALS["empty_password"]='<div class="error">
          Password cannot be left empty.
         </div>';
            return false;
        } elseif (!preg_match("/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/", $password)) 
        {
          $GLOBALS["empty_password"]='<div class="error">
          Password is not in correct format{It should be atleast 1 uppercase, 1 lowercase,1 digit and 1 special character($,@.&)}.
         </div>';
            return false;
        } else
         {
            return true;
        }
    }
	  $email =validation1($_POST['email']);
	  $password=validation4($_POST['password']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login Panel</title>
    <script language="Javascript" src="hash.js">
		</script>
</head>
<style type="text/css">
  	.container 
  {
    max-width: 500px;
    margin:10px auto;
}
form {
    border: 2px solid #1A33FF;
    background: #ecf5fc;
    padding:40px 50px 45px ;
}
.form-control:focus {
    border-color: #000;
    box-shadow: none;
}
.error {
    color: red;
    font-weight: 400;
    display: block;
    padding: 6px 0;
    font-size: 14px;
}
.form-control.error {
    border-color: red;
    padding: .375rem .75rem;
}
body{
  background-image:url(pic-2.jpg);
       height:100vh;
       background-size: cover;
       background-position: center;
   }
.container-fluid{
  max-width: 500px;
    margin: 5px auto;
   
}


   </style>
<body>

  <div class="container-fluid">
    <center><form method="post" action="">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="fullname">
      <button class="btn btn-outline-success" type="submit" name="search">Search</button>
  </center></form>
  </div>

<center><br><br><br><br>
<div class="container mt-5">

    <form action="student_login_connect.php" method="POST"  id="demo">
   
    <center><h1><u>Student Login Panel</u></h1></center>
			<div class="form-group row">
        <label class="col-sm-4 col-form-label">Email</label>
        <div class="col-sm-6">
          <input type="text" name="email" class="form-control"  runat="server"value="<?php  if(isset($_POST["login"])) echo $_POST["email"]; ?>" class="form-control">  
          <?php echo $GLOBALS["empty_email"]; ?>
        </div>
       </div>
       <div class="col-sm-6">
          <input type="hidden" name="hash" class="form-control" id="hash">  
      
        </div>
      <div class="form-group row">
        <label class="col-sm-4 col-form-label">Password</label>
        <div class="col-sm-6">
          <input type="password" name="password"  class="form-control" value="<?php  if(isset($_POST["login"])) echo $_POST["password"]; ?>"class="form-control">
          <?php echo $GLOBALS["empty_password"]; ?>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-12 mt-3">
          <button type="submit" name="login" class="btn btn-primary btn-block" >Login</button>
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
                 $row=mysqli_fetch_assoc($query_run);
                    
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
   