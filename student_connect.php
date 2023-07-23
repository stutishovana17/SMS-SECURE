<?php
require_once("connection_registration.php");
if(isset($_POST['submit']))
{

$studentID = $fullname=$mobile=$course= $email = $password = $cpassword = $target_file='';
$studentID =$_POST['studentID'];
$fullname = $_POST['fullname'];

$mobile=$_POST['mobile'];
$course=$_POST['course'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$target_dir="imageupload/";
$target_file=$target_dir.
basename($_FILES["fileToUpload"]["name"]);
if(move_uploaded_file($_FILES["file"]["tmp_name"],$target_file));

{
	

$sql = "INSERT INTO student ('fullname','studentID','mobile','course','email','password','cpassword','image')
 VALUES ('$fullname','$studentID','$mobile','$course','$email','$password','$cpassword','$target_file')";
$result = mysqli_query($con, $sql);
if($result)
{
	header("Location: student_login.php");
}
else
{
	echo '<script type="text/javascript"> alert("Not saved")</script>';
}
	
}


}
ini_set ('display_errors', 1);
ini_set ('display_startup_errors', 1);
error_reporting (E_ALL);
?>
