<?php
session_start();
$_SESSION["random_no"]=rand();
$rno=$_SESSION["random_no"];
include 'connection_registration.php';
$GLOBALS["empty_email"]="";
$GLOBALS["empty_fullname"]="";
$GLOBALS["empty_mobile"]="";
$GLOBALS["empty_password"]="";
$GLOBALS["empty_cpassword"]="";
$GLOBALS["empty_course"]="";
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
          Email Should be in the Form (xyz@gmal.com).
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
    function validation2($fullname)
    {
        if (empty($fullname)) {
          $GLOBALS["empty_fullname"]='<div class="error">
            Fullname cannot be left empty
            </div>';
           
            return false;
        } elseif (!preg_match("/^[a-zA-Z ]*$/", $fullname)) 
        {
          $GLOBALS["empty_fullname"]='<div class="error">
          Fullname Format Incorrect.
          Numbers are not Allowed.
          </div>';
            return false;
        } elseif (strlen($fullname)> 35) 
        {
          $GLOBALS["empty_fullname"]='<div class="error">
           Length Exceed it should be within 35 character.
          </div>';
            return false;
        } else {
            return true;
        }
    }
      
    function validation3($mobile)
    {
        if (empty($mobile)) {
          $GLOBALS["empty_mobile"]='<div class="error">
          Mobile Number cannot be left empty.
         </div>';
        
            return false;
        } 
        elseif(strlen($mobile)!=10)
        {
          $GLOBALS["empty_mobile"]='<div class="error">
           Number Should be of 10 digit.
           Letters are not  Allowed.
         </div>';
         return false;
        }
        elseif (!preg_match("/[0-9]{10}/", $mobile)) 
        {
          $GLOBALS["empty_mobile"]='<div class="error">
          Only Numbers are allowed.
         </div>';
            return false;
        }
    
         else {
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
    function validation6($cpassword)
    {
        if (empty($cpassword)) 
        {
          $GLOBALS["empty_cpassword"]='<div class="error">
           Confirm Password cannot be left empty.
         </div>';
            return false;
        } elseif (!preg_match("/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/", $cpassword)) 
        {
          $GLOBALS["empty_cpassword"]='<div class="error">
         Confirm Password is not in correct format{It should be atleast 1 uppercase, 1 lowercase,1 digit and 1 special character($,@.&)}.
         and Confirm Password must be same as Password.
         </div>';
            return false;
        } elseif ($_POST['password']!=$_POST['cpassword'])
         {
          $GLOBALS["empty_cpassword"]='<div class="error">
           Confirm Password  must be same as Password.
         </div>';
            return false;
        } else {
            return true;
        }
    }
    function validation5($course)
    {
        if (empty($_POST["course"])) 
        {
          $GLOBALS["empty_course"]='<div class="error">
          Course cannot be left empty.
          </div>';
          return false;
        } 
        else 
        {

            return true;
        }
    }
if (isset($_POST["sub"])) 
{
  $email= validation1($_POST["email"]);
  $fullname = validation2($_POST["fullname"]);
  $mobile = validation3($_POST["mobile"]);
  $password= validation4($_POST["password"]);
  $course=validation5($_POST["course"]);
  $cpassword=validation6($_POST["cpassword"]); 
   
  if ($fullname==true && $mobile==true && $course==true && $email==true && $password== true && $cpassword==true) 
    {
        $email =$_POST['email'];
        $fullname= $_POST['fullname'];
        $mobile =$_POST['mobile'];
        $course =$_POST['course'];
        $password =$_POST['password'];
        $cpassword =$_POST['cpassword'];

        //$SELECT = "SELECT email from student where email = ? Limit 1";
        $query= "INSERT INTO student(fullname,mobile,course,email,password,cpassword) 
	values('$fullname','$mobile','$course','$email','$password','$cpassword')";
        $sql=mysqli_query($con, $query);

        
        if ($sql==true) {
            echo '<script type ="text/JavaScript">';
            echo'alert("The data are submitted successfully")';
            echo'</script>';
        } else {
            echo '<script type ="text/JavaScript">';
            echo'alert("Data are not Submitted ")';
            echo'</script>';
        }
    }
} 
?>
 



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Registration Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
		</script>
  <h1><center><u>Student Registration Form</u></center> </h1>
</head>
<style>
	.container 
  {
    max-width: 700px;
    margin: 50px auto;
}
form {
    border: 1px solid #1A33FF;
    background: #ecf5fc;
    padding: 40px 50px 45px;
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
       background-image:url(pic3.jpg);
       height:100vh;
       background-size: cover;
       background-position: center;
   }
	</style>
  
<body>
  
  <div class="container mt-5">
     
    <form action="student_registration.php" method="POST">
   
				
			<div class="form-group row">
        <label class="col-sm-4 col-form-label">StudentID</label>
        <div class="col-sm-8">
          <input type="text" name="studentID" class="form-control" disabled>  
          
        </div>
       </div>
      <div class="form-group row">
        <label class="col-sm-4 col-form-label">FullName</label>
        <div class="col-sm-8">
          <input type="text" name="fullname" value="<?php  if(isset($_POST["sub"])) echo $_POST["fullname"]; ?>" class="form-control">
          <?php echo $GLOBALS["empty_fullname"]; ?>
        </div>
      </div>
	  <div class="form-group row">
        <label class="col-sm-4 col-form-label">Mobile</label>
        <div class="col-sm-8">
          <input type="text" name="mobile" value="<?php  if(isset($_POST["sub"])) echo $_POST["mobile"];?>" class="form-control">
          <?php echo $GLOBALS["empty_mobile"]; ?>
        </div>
      </div>
	  <div class="form-group row">
        <label class="col-sm-4 col-form-label">Course</label>
        <div class="col-sm-8">
          <select  name="course" value="<?php  if(isset($_POST["sub"])) echo $_POST["course"]; ?>" class="form-control">
            <option value=" "></option>
            <option value="mca">MCA</option>
            <option value="mba">MBA</option>
			      <option value="m-tech">M-Tech</option>
			      <option value="m-com">MCom</option>
          </select>
          <?php echo $GLOBALS["empty_course"]; ?>
         
        </div>
   
      </div>
	  
      <div class="form-group row">
        <label class="col-sm-4 col-form-label">Email</label>
        <div class="col-sm-8">
          <input type="text" name="email" value="<?php  if(isset($_POST["sub"])) echo $_POST["email"]; ?>" class="form-control">  
          <?php echo $GLOBALS["empty_email"]; ?>
    
        </div>
      </div>
	  <div class="form-group row">
        <label class="col-sm-4 col-form-label">Password</label>
        <div class="col-sm-8">
          <input type="password" name="password" value="<?php  if(isset($_POST["sub"])) echo $_POST["password"]; ?>"class="form-control">
          <?php echo $GLOBALS["empty_password"]; ?>
        </div>
      </div>
	  <div class="form-group row">
        <label class="col-sm-4 col-form-label">Confirm Password</label>
        <div class="col-sm-8">
          <input type="password" name="cpassword" value="<?php  if(isset($_POST["sub"])) echo $_POST["cpassword"]; ?>" class="form-control">
          <?php echo $GLOBALS["empty_cpassword"]; ?>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-12 mt-3">
          <button type="submit" name="sub" class="btn btn-primary btn-block" >Submit</button>
        </div>
      </div>
     <center> <p class ="message"> Already Registered? <a href="student_login.php">Login</a></p></center>
    
       
    </form>
  </div>
</body>

</html>

