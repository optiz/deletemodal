<!DOCTYPE html>
<?php include'config.php'?>
<?php
$schedID = $_GET['id'];
$res1 = "SELECT * FROM schedule WHERE `schedule_id` = '$schedID'";
$result1 = mysqli_query($conn, $res1) or die(mysql_error());
      for($i=0; $i<$num_rows=mysqli_fetch_array($result1);$i++) {
    			$id=$num_rows["schedule_id"];
	    		$schedroom=$num_rows["schedule_room"];
	    		$schedsubj=$num_rows["schedule_subject"];
	    		$schedtime=$num_rows["schedule_time"];
	    		$schedday=$num_rows["schedule_day"];
            }
?>
<?php
$alert = '';
if(isset($_POST['submit'])){
	$room = strip_tags($_POST['room']);
	$subject = strip_tags($_POST['subject']);
	$time = strip_tags($_POST['time']);
	$days = strip_tags($_POST['schedule']);

	$sql = "UPDATE schedule set `schedule_room` = '$room', `schedule_subject`='$subject', `schedule_time`='$time', `schedule_day`='$days', `status` = 'ongoing'  where `schedule_id` = '$schedID' ";
	mysqli_query($conn, $sql) or die(mysqli_error());

	$message = "Schedule successfully updated!";
	echo "<script type='text/javascript'>alert('$message'); window.location.assign('schedule.php')</script>";



	}

?>
<html lang="en">
    <?php include'links.php';?>
	<body>
		<?php include'header.php';?>
		<?php include'side-bar-left.php';?>
		<div class="dashboard-title">
			<h3><i class="icon_id_alt"></i> SCHEDULE
			<span style="font-size: 16px;"><a href="schedule.php"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> View all Schedule</a></span> </h3>
		</div> 
		<div class="main-content">
			<div class="main-content-add-schedule">
			<form action="<?PHP $_SERVER["PHP_SELF"]?>" method="post" >		
				<center>				
				<span style="font-size:25px;">Update Schedule</span></center>
				<hr>
				<table>
					<tr>
						<td class="schedule">
							Room:<br><br>
							<select type="text" name="room">
								<?php
					              $res = "SELECT * FROM rooms";
					              $result = mysqli_query($conn, $res) or die(mysql_error());
					                while ($row=mysqli_fetch_array($result)) {
					                  if($schedroom==$row['room_name'])
					            
					                   echo"  <option value='$schedroom' selected='selected'> $schedroom</option>";
					                  else
					                  echo "
					                        <option value='".$row['room_name']."'>".$row['room_name']."</option>
					                       ";
					                }
					            ?>
							</select><br><br>
						</td>
						<td class="schedule">
							Subject:<br><br>
							<select type="text" name="subject">
								<?php
					              $res = "SELECT * FROM subjects";
					              $result = mysqli_query($conn, $res) or die(mysql_error());
					                while ($row=mysqli_fetch_array($result)) {
					                  if($schedsubj==$row['subject_code'])
					            
					                   echo"  <option value='$schedsubj' selected='selected'> $schedsubj</option>";
					                  else
					                  echo "
					                        <option value='".$row['subject_code']."'>".$row['subject_code']."</option>
					                       ";
					                }
					            ?>
							</select><br><br>
						</td>
					</tr>
					<tr>
						<td class="schedule">
							Time:<br><br>
							<select type="text" name="time">
								<?php
					              $res = "SELECT * FROM schedule_time";
					              $result = mysqli_query($conn, $res) or die(mysql_error());
					                while ($row=mysqli_fetch_array($result)) {
					                  if($schedtime==$row['time_schedule'])
					            
					                   echo"  <option value='$schedtime' selected='selected'> $schedtime</option>";
					                  else
					                  echo "
					                        <option value='".$row['time_schedule']."'>".$row['time_schedule']."</option>
					                       ";
					                }
					            ?>
							</select><br><br>
						</td>
						<td class="schedule">
							Days:<br><br>
							<select type="text" name="schedule">
								<?php
					              $res = "SELECT * FROM schedule_day";
					              $result = mysqli_query($conn, $res) or die(mysql_error());
					                while ($row=mysqli_fetch_array($result)) {
					                  if($schedday==$row['days'])
					            
					                   echo"  <option value='$schedday' selected='selected'> $schedday</option>";
					                  else
					                  echo "
					                        <option value='".$row['days']."'>".$row['days']."</option>
					                       ";
					                }
					            ?>
							</select><br><br>
						</td>
					</tr>
				</table>
				<hr>
				<input type="submit" class="schedule-btn" name="submit" value="Update"><br><br>
								
			</form>
			</div>
		
		</div>
	   
			<?php include'side-bar-right.php';?>
			<?php include'footer.php';?>
		</body>
</html>