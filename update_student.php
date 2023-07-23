<?php
           if(isset($_POST['update'])){
               $query ="SELECT * FROM student where studentID = $_POST[studentID]";
               $query_run =mysqli_query($con,$query);
               while($row = mysqli_fetch_assoc($query_run)){
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
                               <b>Image:</b>
                           </td>
                        <td>
                            <input type="text" value="<?php echo $row['image']?>"disabled>
                        </td>
                     </tr>
               </table>
               <?php
               }
           }
          ?>