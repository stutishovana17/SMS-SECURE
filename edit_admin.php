
<?php
       if(isset($_POST["save"]))
        {
       $con=mysqli_connect("localhost","root","");
       $db=mysqli_select_db($con,"secure sms");
       
       $query ="UPDATE student SET fullname='$_POST[fullname]',mobile='$_POST[mobile]',course='$_POST[course]',
	   email='$_POST[email]' WHERE studentID = '$_POST[studentID]'";
       $query_run=mysqli_query($con,$query);
       
       header("Location: admin_dashboard.php"); 
        }
        else
    
        if(isset($_POST["cencel"]))
        {
            header("location:student_dashboard.php");
        }
   
       
       ?>