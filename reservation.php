<!DOCTYPE html>
<?php include'config.php'?>
<html lang="en">
    <?php include'links.php';?>
	<body>
		<?php include'header.php';?>
		<?php include'side-bar-left.php';?>
		<div class="dashboard-title">
			<h3><i class="icon_documents"></i> RESERVATION<span style="font-size: 16px;"><a href="add_reservation.php"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Reservation</a></span></h3> 
		</div> 
		<div class="main-content">

                     <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">  
                          <thead>  
                               <tr> 
                                    <th class="th-sm">Reserved by<i class="fa fa-sort float-right" aria-hidden="true"></i></td>  
                                    <th class="th-sm">Date<i class="fa fa-sort float-right" aria-hidden="true"></i></td>  
                                    <th class="th-sm">Room<i class="fa fa-sort float-right" aria-hidden="true"></i></td>   
                                    <th class="th-sm">Description<i class="fa fa-sort float-right" aria-hidden="true"></i></td>
                                    <th class="th-sm">Action<i class="fa fa-sort float-right" aria-hidden="true"></i></td>  
                               </tr>  
                          </thead>  
                          <?php
                            $res = "SELECT * FROM reservations";
                            $result = mysqli_query($conn, $res) or die(mysql_error());

                                for($i=0; $i<$num_rows=mysqli_fetch_array($result);$i++) {
                                        $id=$num_rows["rv_id"];
                                        $room=$num_rows["rv_name"];
                                        $subject=$num_rows["rv_date"];
                                        $time=$num_rows["rv_room"];
                                        $day=$num_rows["rv_description"];

                                  


                                  echo "<tr>
                                          <td><input type='hidden' value='".$id."'>".$room."</td>
                                          <td>".$subject."</td>
                                          <td>".$time."</td>
                                          <td>".$day."</td>                  
                                          <td><center>
                                          <a href='edit_schedule.php?id=$id' ><button class='button print-schedule'><i class='fas fa-print'></i></button></a>
                                            <a href='edit_reservation.php?id=$id' ><button class='button edit-schedule'><i class='fas fa-edit'></i></button></a>
                                           <a href='#' data-modal-id='modal-login-x' class='launch-modal'><button class='button delete-schedule'><i class='fas fa-trash-alt'></i></button></a></center></td>
                                        </tr> ";
                                }
                          ?> 
                     </table>  

		</div>
		<?php include'side-bar-right.php';?>
		<?php include'footer.php';?>
	</body>
</html>