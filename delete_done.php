<?php
include("connection_registration.php");
if(isset($_POST["delete"]))
{
   $studentID=$_POST["studentID"];
   $query="DELETE FROM student WHERE studentID='$studentID'";
   $query_run=mysqli_query($con,$query);

   if($query_run)
   {
    echo'<script> alert("Data is deleted")</script>';
    header("Location: admin_dashboard.php");
   }
   else
   {
    echo'<script> alert("Data is  not deleted")</script>';
   }

}
else
if(isset($_POST["cencel"]))
{
    header("Location:admin_dashboard.php");
}
?>