<?php
include("connection_registration.php");
       if(isset($_POST["save"]))
        {
    
            $studentID=$_POST["studentID"];
       $query ="UPDATE student SET fullname='$_POST[fullname]',mobile='$_POST[mobile]',course='$_POST[course]',
	   email='$_POST[email]' WHERE studentID = '$_POST[studentID]'";
       $query_run=mysqli_query($con,$query);
       
       header("Location: admin_dashboard.php"); 
        }
        else
    
        if(isset($_POST["cancel"]))
        {
            header("location:admin_dashboard.php");
        }
   
       
       ?>