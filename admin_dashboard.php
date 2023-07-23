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
            background-color:black;
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
            position: fixed;
           
        }
        #top_span{
			top: 20%;
			width: 50%;
			left: 17%;
			position: fixed;
		}
        #td{
            table:border 220px;
			border: 1px solid black;
			padding-left: 5px;
			text-align: center;
			width: 180px;
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
        <center><br><strong><b>Student Information System &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></strong>
        Email:<?php echo $_SESSION['email'];?>
        Name:<?php echo $_SESSION['name'];?>
        
        <a href="logout.php">Logout</a>
    </center>
</div><br><br>
<span id="buttom_span"><marquee>Student Information System</marquee></span>
<div id="left_side"><br><br><br><br><br>
    <form action="" method="post">
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
</div>
<div id="right_side"><br><br>
<div id="demo">
<?php
error_reporting(0);
                if (isset($_POST['search_students'])) 
                {
                    
                    ?>
					<center>
					<form action="" method="post">
					&nbsp;&nbsp;<b>Enter FullName:</b>&nbsp;&nbsp; <input type="text" name="fullname">
					<input type="submit" name="search_by_fullname_for_search" value="Search">
					</form><br><br>
					<h4><b><u>Student's details</u></b></h4><br><br>
					</center>
					<?php
                }
               
                if (isset($_POST['search_by_fullname_for_search'])) 
                {
                    
                        $query ="select * from student where fullname ='$_POST[fullname]'";
                        $query_run = mysqli_query($con, $query);
                        $row=mysqli_fetch_assoc($query_run);
                    
                    if (!empty($row)) 
                    {
                        ?>
                  <center><b>  <?php echo htmlspecialchars($_POST['fullname']); ?> RESULT FOUND </b></center>
                         
                         <table>
							<tr>
								<td>
									<b>Fullname:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['fullname']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>StudentID:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['studentID']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Mobile:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['mobile']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Course:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['course']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Email:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['email']?>" disabled>
								</td>
							</tr>
							
							<tr>
								<td>
									<b>Password:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['password']?>" disabled>
								</td>
							</tr>
                            
							<tr>
								<td>
									<b>Confirm Password:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['cpassword']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Image:</b>
								</td> 
								<td>
                                <input type="text" value="<?php echo $row['image']?>" disabled>
								</td>
							</tr>
						</table>
                     
                        
                     <?php
                    } else {
                        ?>
                    <center><b><?php echo htmlspecialchars($_POST['fullname']); ?> NOT FOUND<br><br></b></center>
                <?php
                    }
                }    
            
            
			?>
            <?php
           if(isset($_POST['add_student']))
           {
            
            ?>
            <center><h4>Fill the given details</h4></center>
            <form action="add_student.php" method="post">
            <table>
                <tr>
                    <td>StudentID:</td>
                    <td>
                        <input type="text" name="studentID"  disabled>
                    </td> 
                      
                </tr>
                <tr>
                <td>Fullname:</td>
                    <td>
                        <input type="text" name="fullname" >
                    </td> 
                     <?php echo $GLOBALS["empty_fullname"]; ?>
                </tr>
                <tr>
                    <td>Mobile:</td>
                    <td>
                        <input type="text" name="mobile" >
                    </td> 
                </tr>
                <tr>
                   <td>Course:
                   <td> <select name="course">
							<option value="">Select</option>
							<option value="mba">MBA</option>
							<option value="mca">MCA</option>
                            <option value="msc">Msc</option>
                            <option value="mcom">MCom</option>
                            <option value="mtech">Mtech</option>
                       
						</select></td>
                    
                    </td> 
                    <?php  if(isset($_POST["add"])) echo $GLOBALS["course"];?>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>
                        <input type="text" name="email">
                    </td> 
                    <?php  if(isset($_POST["add"])) echo $GLOBALS["email"];?>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="text" name="password" >
                    </td> 
                    <?php  if(isset($_POST["add"])) echo $GLOBALS["password"];?>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td>
                        <input type="text" name="cpassword">
                    </td> 
                    <?php  if(isset($_POST["add"])) echo $GLOBALS["fullname"];?>
                </tr>
             
    
                <td></td>
                <td><input type="submit" name="add" value="Add Student">
           </td>
           </table>
           </form>
        <?php
           }
        ?>
        <?php
          if(isset($_POST['delete_student'])){
              ?>
              <center>
                  <h4> Enter StudentID for delete a student</h4>
                  <form action="" method="post">
                      StudentID:
                    <input type="text" name="studentID">
                    <input type="submit" name="search_by_studentID_for_delete" value="Search">
                </form>
               </center>
               <?php
          }
          if(isset($_POST["search_by_studentID_for_delete"]))
          {
              $query="SELECT * FROM student WHERE studentID= $_POST[studentID]";
              $query_run=mysqli_query($con,$query);
              while($row=mysqli_fetch_assoc($query_run))
              {
          
          ?>
          <form action="delete_student.php" method="post">
                    <table>
                       <tr>
                           <td>
                               <b>StudentID:</b>
                           </td>
                        <td>
                            <input type="text"  name="studentID" value="<?php echo $row['studentID']?>" disabled>
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
                            <input type="text" name="course" value="<?php echo $row["course"]?>">
                        </td>
                       
                     </tr>
                     <tr>
                           <td>
                               <b>Email:</b>
                           </td>
                        <td>
                            <input type="text" name="email" value="<?php echo $row["email"]?>">
                        </td>
                      </tr>
                      <tr>
                           <td>
                               <b>Password:</b>
                           </td>
                        <td>
                            <input type="text" name="password" value="<?php echo $row["password"]?>">
                        </td>
                       
                     </tr>
                     <tr>
                           <td>
                               <b>Confirm Password:</b>
                           </td>
                        <td>
                            <input type="text" name="cpassword" value="<?php echo $row["cpassword"]?>">
                        </td>
                       
                     </tr>
                        <tr>
                            
                        <br><br>
                <td><input type="submit" name="delete" value="Delete"></td>
                <td><input type="submit" name="cencel" value="Cencel"></td>
               </tr>
             
               </table>
           </form>
               <?php
               }
            }
          ?>
          <?php
				if(isset($_POST['view_students']))
				{
					?>
					<center>
						<h2><b>Students's Details</b></h2>
						<table style="border-collapse: collapse;border: 1px solid black;">
							<tr>
								<td id="td"><b>StudentID</b></td>
								<td id="td"><b>Full Name</b></td>
								<td id="td"><b>Mobile</b></td>
								<td id="td"><b>Courses</b></td>
                                <td id="td"><b>Action1</b></td>
                                <td id="td"><b>Action2</b></td>
                               
                                
							</tr>
						</table>
					</center>
					<?php
					$query = "SELECT * FROM student";
					$query_run = mysqli_query($con,$query);
					while ($row = mysqli_fetch_assoc($query_run)) 
					{
						?>
						<center>
						<table style="border-collapse: collapse;border: 1px solid black;">
							<tr>
                                <td id="td"><a href="display.php"><?php echo $row['studentID']?></td>
								<td id="td"><?php echo htmlspecialchars( $row['fullname'])?></td>
								<td id="td"><?php echo htmlspecialchars ($row['mobile'])?></td>
								<td id="td"><?php echo htmlspecialchars($row['course'])?></td>
                                 <form action="update.php" method="post">
                                    <input type="hidden" name="studentID" value="<?php echo $row['studentID']?>">
                                <td id="td"><input type="submit" name="update" class="btn btn-success" value="Update"></td>
                                 </form> 
                                 <form action="delete.php" method="post">
                                <input type="hidden" name="studentID" value="<?php echo $row['studentID']?>">
                                <td id="td"><input type="submit" name="delete" value="Delete"></td>
                                 </form>
							</tr>
						</table>
						</center>
                    </form>
                    <?php
                    }
                }
            
                ?>
                    
                 
               
                
     
            
                    <?php
			if(isset($_POST['edit_student']))
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
                
                <form action="edit_admin.php" method="post">
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
                <td><input type="submit" name="save" value="Save"></td>
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
    </div>
    </div>           
</body>
</html>