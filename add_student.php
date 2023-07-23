<?php
	$con = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($con,"secure sms");
  $GLOBALS["empty_email"]="";
  $GLOBALS["empty_fullname"]="";
  $GLOBALS["empty_mobile"]="";
  $GLOBALS["empty_course"]="";
  $GLOBALS["empty_password"]="";
  $GLOBALS["empty_cpassword"]="";
   $email=validation1($_POST["email"]);
   $fullname=validation2($_POST["fullname"]);
   $mobile=validation3($_POST["mobile"]);
   $password=validation4($_POST["password"]);
   $cpassword=validation6($_POST["cpassword"]);
   $course=validation5($_POST["course"]);
   
    //$studentID =$_POST['studentID'];
    
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
        } elseif (!preg_match("/[89][0-9]{9}/", $mobile)) 
        {
          $GLOBALS["empty_mobile"]='<div class="error">
          Only Numbers are allowed,The number should be start with 8 or 9.
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
    if ($fullname==true && $mobile==true && $course==true && $email==true && $password==true && $cpassword==true)
     {
      $fullname = $_POST["fullname"];
      $mobile=$_POST['mobile'];
    $course=$_POST['course'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
        $query = "INSERT INTO student(fullname,mobile,course,email,password,cpassword) VALUES('$fullname','$mobile',
	'$course','$email','$password','$cpassword')";
        $query_run = mysqli_query($con, $query);
        echo '<script type ="text/JavaScript">';
        echo'alert("The data are added successfully")';
        echo'</script>';
        header("Location:admin_dashboard.php");

        
       

       
    }
?>

