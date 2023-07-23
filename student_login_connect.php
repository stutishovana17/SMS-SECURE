<script>
  /*function SHA256pass(seed)
  {
    alert(seed);
    var form1=document.getElementById("demo");
    var email=form1.elements[0];
    alert('1');
    var password=form1.elements[1];
    alert('2');
    alert(password.value);
    if ( password.length < 4 || password.length > 14 )
    {
      alert('3');
      alert("Password should be between 4 to 14 characters!!");
      document.getElementById("password").focus();
      return -1;
    }
    alert('4');
    var hash=SHA256(seed+SHA256(password.value));
    alert(hash);
    alert('5');
    form1.elements[2].value = hash;
    alert(6);
    document.getElementById(hash)="";
    alert(hash);
    alert(7);
    return true;

  }
  </script>
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
if ($email==true && $password==true) 
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $stmt = $con->prepare('SELECT * FROM student WHERE email = ? AND password = ?');
    $stmt->bind_param('ss', $email, $password );
    $stmt->execute();

    $result = $stmt->get_result();
    if (mysqli_num_rows($result) > 0)
     {
        while ($row = mysqli_fetch_assoc($result)) 
        {
            if (password_verify('$password', $row['password'])) 
            {
                $login=true;
                 
                $studentID = $row["studentID"];
                $email = $row["email"];
                session_start();
                $_SESSION['studentID'] = $studentID;
                $_SESSION['email'] = $email;
                $_SESSION['password']=$password;
                echo "inside login";
                echo $_POST["hash"];
            }
        }
        header("Location: upload_photo.php");
    } else 
    {
        echo "<center><br><br><br><br><h1>Invalid email or password</h1></br></br></br></br></center>";
    }

}
else
{
    echo "<center><br><br><br><br><h1>Invalid email or password</h1></br></br></br></br></center>";
}
