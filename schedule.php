<!DOCTYPE html>
<?php include'config.php'?>
<html lang="en">
    <?php include'links.php';?>
	<body>
		<?php include'header.php';?>
		<?php include'side-bar-left.php';?>
		<div class="dashboard-title">
			<h3><i class="icon_calendar"></i> SCHEDULE
        <span style="font-size: 16px;"><a href="add_schedule.php"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Shedule</a></span></h3>
		</div> 
		<div class="main-content">

                     <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">  
                          <thead>  
                               <tr> 
                                    <th class="th-sm">Room<i class="fa fa-sort float-right" aria-hidden="true"></i></td>  
                                    <th class="th-sm">Subject<i class="fa fa-sort float-right" aria-hidden="true"></i></td>  
                                    <th class="th-sm">Time<i class="fa fa-sort float-right" aria-hidden="true"></i></td>   
                                    <th class="th-sm">Scheduled Day<i class="fa fa-sort float-right" aria-hidden="true"></i></td>
                                    <th class="th-sm">Action<i class="fa fa-sort float-right" aria-hidden="true"></i></td>  
                               </tr>  
                          </thead>  
                          <?php
                            $res = "SELECT * FROM schedule where status = 'ongoing'";
                            $result = mysqli_query($conn, $res) or die(mysql_error());

                                for($i=0; $i<$num_rows=mysqli_fetch_array($result);$i++) {
                                        $id=$num_rows["schedule_id"];
                                        $room=$num_rows["schedule_room"];
                                        $subject=$num_rows["schedule_subject"];
                                        $time=$num_rows["schedule_time"];
                                        $day=$num_rows["schedule_day"];

                                  


                                  echo "<tr>
                                          <td><input type='hidden' value='".$id."'>".$room."</td>
                                          <td>".$subject."</td>
                                          <td>".$time."</td>
                                          <td>".$day."</td>                  
                                          <td><center>
                                            <a href='edit_schedule.php?id=$id' ><button class='button edit-schedule'><i class='fas fa-edit' name='submit'></i></button></a>
                                           <a href='#' data-modal-id='modal-login-x' class='launch-modal'><button class='button delete-schedule'><i class='fas fa-trash-alt'></i></button></a></center></td>
                                        </tr> ";
                                }
                          ?> 
                     </table>  

		</div>
    <form method="POST" action="<?php $_SERVER["PHP_SELF"];?>">
        <div class="modal fade" id="modal-login-x" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                       
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>
                        <h3 class="modal-title" id="modal-login-label"><i class="fas fa-exclamation-circle x"></i> Input admin password.</h3>
                        <p>Are you sure you want to remove this schedule?</p>
                      </div>
                      
                      <div class="modal-body">
                                  <div class="form-group">
                                    <label class="sr-only" for="form-password">Password</label>
                                    <input type="password" name="form-password" placeholder="••••••••" class="form-password form-control" style="font-size: 30px;">
                                  </div>
                      <button name="submit" class="btnx">Remove Schedule</button>
                      </form>        
                      </div>
                      
                    </div>
                  </div>
                </div>
                <?php
                if(isset($_POST['submit'])){
                              $password = strip_tags($_POST['form-password']);
                              $query ="SELECT * FROM users where access_level = 'admin'";  
                              $result = mysqli_query($conn, $query); 
                              
                              for($i=0; $i<$num_rows=mysqli_fetch_array($result);$i++) {
                                if($password == $num_rows['password']){
                                    $res = "UPDATE schedule SET status = 'stop' WHERE schedule_id= '$id'";
                                    $result = mysqli_query($conn, $res) or die(mysql_error());
                                    $message = "Schedule successfully removed!";
                                    echo "<script type='text/javascript'>alert('$message'); window.location.assign('schedule.php') </script>";
                                  }
                                  else {
                                   $message = "Invalid Password!";
                                    echo "<script type='text/javascript'>alert('$message'); window.location.assign('schedule.php') </script>";
                                  } 
                              }
                            }
                ?>
		<?php include'side-bar-right.php';?>
		<?php include'footer.php';?>
	</body>
</html>