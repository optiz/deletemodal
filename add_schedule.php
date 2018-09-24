<!DOCTYPE html>
<?php include'config.php'?>
<?php
$alert = '';
if(isset($_POST['submit'])){
	$room = $_POST['room'];
	$subject = $_POST['subject'];
	$time = $_POST['time'];
	$day = $_POST['schedule'];

	$sql = "INSERT INTO `thesisdb`.`schedule`(`schedule_id`,`schedule_room`,`schedule_subject`,`schedule_time`,`schedule_day`,`status`) VALUES('','$room','$subject','$time','$day','ongoing')";
	mysqli_query($conn, $sql) or die(mysqli_error());
	$message = "Subject successfully added!";
        echo "<script type='text/javascript'>alert('$message'); window.location.assign('schedule.php') </script>";

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
				<span style="font-size:25px;">Add Schedule</span></center>
				<hr>
				<table>
					<tr>
						<td class="schedule">
							Select Room:<br><br>
							<select type="text" name="room">
								<?php 

								$query = "SELECT * FROM rooms";
								$results = mysqli_query($conn, $query);
								
								foreach ($results as $rooms) {
								
								?>
								<option value="<?php echo $rooms["room_name"]; ?>"><?php echo $rooms["room_name"]; ?></option>
								<?php
								}

								?>
							</select><br><br>
						</td>
						<td class="schedule">
							Select Subject:<br><br>
							<select type="text" name="subject">
								<?php 

								$query = "SELECT * FROM subjects";
								$results = mysqli_query($conn, $query);
								
								foreach ($results as $subjects) {
								
								?>
								<option value="<?php echo $subjects["subject_code"]; ?>"><?php echo $subjects["subject_code"]; ?></option>
								<?php
								}

								?>
							</select><br><br>
						</td>
					</tr>
					<tr>
						<td class="schedule">
							Select Time:<br><br>
							<select type="text" name="time">
								<?php 

								$query = "SELECT * FROM schedule_time";
								$results = mysqli_query($conn, $query);
								
								foreach ($results as $time) {
								
								?>
								<option value="<?php echo $time["time_schedule"]; ?>"><?php echo $time["time_schedule"]; ?></option>
								<?php
								}

								?>
							</select><br><br>
						</td>
						<td class="schedule">
							Select Days:<br><br>
							<select type="text" name="schedule">
								<?php 

								$query = "SELECT * FROM schedule_day";
								$results = mysqli_query($conn, $query);
								
								foreach ($results as $days) {
								
								?>
								<option value="<?php echo $days["days"]; ?>"><?php echo $days["days"]; ?></option>
								<?php
								}

								?>
							</select><br><br>
						</td>
					</tr>
				</table>
				<hr>
				<input type="submit" class="schedule-btn" name="submit" value="Submit"><br><br>
								
			</form>
			</div>
		
		</div>
	   
			<?php include'side-bar-right.php';?>
			<?php include'footer.php';?>
		</body>
</html>