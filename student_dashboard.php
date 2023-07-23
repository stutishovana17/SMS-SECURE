<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        #header{
            height:10%;
            width:100%;
            top:2%;
            background-color: black;
            position:fixed;
            color:white;
        }
        #left_side{
            height:75%;
            width:15%;
            top:10%;
            position:fixed;
        }
        #right_side{
            height:75%;
            width:80%;
            background-color: whitesmoke;
            position:fixed;
            left:17%;
            top:21%;
            color:red;
            border:solid 1px black;
        }
     

    </style>
    <?php
    //error_reporting(0);
    session_start();
    $con=mysqli_connect("localhost","root","");
     $db=mysqli_select_db($con,"secure sms");
    
    ?>
    </head>
<body>
    <div id="header">
        <center><br><strong>Student Information System &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
        
        Email:<?php echo $_SESSION['email'];?>
       
        
        <a href="logout.php">Logout</a>
    </center>
</div><br><br><br>
<div id="left_side"><br><br><br><br><br>
    <form action="" method="post">
        <table>
            <tr>
                <td>
                    <input type="submit" name="view_profile" value="View Profile">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="edit_profile" value="Edit Profile">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="get_attendence_status" value="Get Attendence Status">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="get_study_material" value="get_study_material">
                </td>
            </tr>
    </table>
    </form>
    </div>
    <div id="right_side"><br><br>
     <div id="demo">
         <?php
           if(isset($_POST['view_profile']))
           {   
              
               $query ="SELECT * FROM student  WHERE email='$_SESSION[email]'";
               $query_run =mysqli_query($con,$query);
               while($row = mysqli_fetch_assoc($query_run))
               {
                   ?>
                   <table>
                       <tr>
                           <td>
                               <b>StudentID:</b>
                           </td>
                        <td>
                            <input type="text" value="<?php echo $row['studentID']?>"disabled>
                        </td>
                     </tr>
                     <tr>
                           <td>
                               <b> Full Name:</b>
                           </td>
                        <td>
                            <input type="text" value="<?php echo $row['fullname']?>"disabled>
                        </td>
                     </tr>
                     <tr>
                           <td>
                               <b>Mobile:</b>
                           </td>
                        <td>
                            <input type="text" value="<?php echo $row['mobile']?>"disabled>
                        </td>
                     </tr>
                     <tr>
                           <td>
                               <b>Course:</b>
                           </td>
                        <td>
                            <input type="text" value="<?php echo $row['course']?>"disabled>
                        </td>
                     </tr>
                    <tr>
                        <td>
                            <b>Password:</b>
                        </td>
                        <td>
                            <input type="text" value="<?php echo $row['password']?>"disabled>
                        </td>
                    </tr>
                    
               </table>
               <?php
               }
           }
          ?>
         <?php
			if(isset($_POST['edit_profile']))
			{
				?>
				<center>
				<form action="" method="post">
				&nbsp;&nbsp;<b>StudentID:</b>&nbsp;&nbsp; <input type="text" name="studentID">
				<input type="submit" name="search_by_studentID_for_edit" value="Search">
				</form><br><br>
				<h4><b><u>Student's details</u></b></h4><br><br>
				</center>
				<?php
			}
            if(isset($_POST['search_by_studentID_for_edit']))
			{
				$query = "SELECT  * from student where studentID = $_POST[studentID]";
				$query_run = mysqli_query($con,$query);
				while ($row = mysqli_fetch_assoc($query_run)) 
				{
				?>
                
                <form action="edit_student.php" method="post">
                    <table>
                       <tr>
                           <td>
                               <b>StudentID:</b>
                           </td>
                        <td>
                            <input type="text"  name="studentID" value="<?php echo $row['studentID']?>">
                        </td>
                     </tr>
                     <tr>
                           <td>
                               <b> Full Name:</b>
                           </td>
                        <td>
                            <input type="text" name="fullname" value="<?php echo $row['fullname']?>">
                        </td>
                     </tr>
                     <tr>
                           <td>
                               <b>Mobile:</b>
                           </td>
                        <td>
                            <input type="text"    name="mobile" value="<?php echo $row['mobile']?>">
                        </td>
                     </tr>
                     <tr>
                           <td>
                               <b>Course:</b>
                           </td>
                        <td>
                            <input type="text" name="course" value="<?php echo $row['course']?>">
                        </td>
                     </tr>
                     <tr>
                           <td>
                               <b>Email:</b>
                           </td>
                        <td>
                            <input type="text" name="email" value="<?php echo $row['email']?>">
                        </td>
                     </tr>
                   
                     <tr><br><br>
                <td><input type="submit" name="save" value="Save"></td>
                <td><input type="button" name="cencel" value="Cencel"></td>
               </tr>
               </table>
           </form>
               <?php
               }
            }
          ?>
          
        </div>
        </div>
    </body>
    </html>