
<?php
require_once("connection_registration.php");

if (isset($_POST['delete'])) {
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
        #buttom_span{
            buttom:15%;
            width:80%;
            left:17%;
            position:fixed;
        }
        #top_span{
			top: 20%;
			width: 70%;
			left: 17%;
			position: fixed;
		}
        #td{
            table:border 150px;
			border: 1px solid black;
			padding-left: 1px;
			text-align: left;
			width: 270px;
		}

    </style>
    <?php
    session_start();
    $con=mysqli_connect("localhost","root","");
    $db=mysqli_select_db($con,"secure sms");
    ?>

</head>
<body>
    <div id="header">
        <center><br><strong>Student Information System &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
        Email:<?php echo $_SESSION['email'];?>
        Name:<?php echo $_SESSION['name'];?>
        
        <a href="logout.php">Logout</a>
    </center>
</div><br><br>
<span id="buttom_span"><marquee>Student Information System</marquee></span>
<div id="left_side"><br><br><br><br><br>
    <form action="delete_done.php" method="post">
        <table>
        <tr>
                <td>
                <input type="submit" name="search_students" value="Search Students">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="view_students" value="View Students">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="edit_student" value="Edit Student">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="add_student" value="Add Student">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="delete_student" value="Delete Student">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="managing_faculties" value="Managing Faculties">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="attendence" value="Attendence">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="managing_marks" value="Managing Marks">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="managing_study_materials" value="Managing Study Materials">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="upload_calender_in_home_page" value="Upload Calender in Home Page">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="upload_notice_in_home_page" value="Upload Notice Home Page">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="managing_user_accounts" value="Managing User Accounts">
                </td>
            </tr>
          
</table>
</form>
</div><br><br><br>
<div id="right_side"><br><br>
<div id="demo">
    <?php
    $query = "SELECT  * from student where studentID = $_POST[studentID]";
    $query_run = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($query_run)) {
        ?>
        
<form action="delete_done.php" method="post">
             
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
                        <tr><br><br>
                <td><input type="submit" name="delete" value="Delete"></td>
                <td><input type="submit" name="cencel" value="Cencel" action="admin_dashboard"></td>
               </tr>
             
               </table>
           </form>
         
               <?php
    }
}
            
          ?>
</div>
</div>
