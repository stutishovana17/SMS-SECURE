<?php

if(isset($_POST["delete"]))
{
    $con=mysqli_connect("localhost","root","");
    $db=mysqli_select_db($con,"secure sms");
    $studentID=$_POST["studentID"];
    $query="DELETE FROM student WHERE studentID=$studentID";
    $query_run=mysqli_query($con,$query);
    
    header("location:admin_dashboard.php");
}
else
if(isset($_POST["cencel"]))
{
    header("location:admin_dashboard.php");
}
?>
      