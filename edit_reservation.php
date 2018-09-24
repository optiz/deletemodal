<!DOCTYPE html>
<?php include'config.php'?>
<?php
$rvID = $_GET['id'];
$res1 = "SELECT * FROM reservations WHERE `rv_id` = '$rvID'";
$result1 = mysqli_query($conn, $res1) or die(mysql_error());
      for($i=0; $i<$num_rows=mysqli_fetch_array($result1);$i++) {
    			$id=$num_rows["rv_id"];
	    		$name=$num_rows["rv_name"];
	    		$date=$num_rows["rv_date"];
	    		$room=$num_rows["rv_room"];
	    		$description=$num_rows["rv_description"];
            }
?>
<?php
$alert = '';
if(isset($_POST['submit'])){
	$name = strip_tags($_POST['name']);
	$date = strip_tags($_POST['date']);
	$room = strip_tags($_POST['room']);
	$description = strip_tags($_POST['description']);

	$sql = "UPDATE reservations set `rv_name` = '$name', `rv_date`='$date', `rv_room`='$room', `rv_description`='$description'  where `rv_id` = '$rvID' ";
	mysqli_query($conn, $sql) or die(mysqli_error());

	$message = "Reservation successfully updated!";
	echo "<script type='text/javascript'>alert('$message'); window.location.assign('reservation.php')</script>";



	}

?>
<html lang="en">
    <?php include'links.php';?>
	<body>
		<?php include'header.php';?>
		<?php include'side-bar-left.php';?>
		<div class="dashboard-title">
			<h3><i class="icon_id_alt"></i> RESERVATION
			<span style="font-size: 16px;"><a href="reservation.php"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> View all Schedule</a></span> </h3>
		</div> 
		<div class="main-content">
			<div class="main-content-add-reservation">
			<form action="<?PHP $_SERVER["PHP_SELF"]?>" method="post" >		
				<center>				
				<span style="font-size:25px;">Reservation</span></center>
				<hr>
				Reserved by:<br><br>
							<input type="text" id="user" name="name" value="<?php echo $name;?>" minlength="2" required autofocus><br><br>
				<table>
					<tr>
						<td class="reserve">
							Date:<br><br>

							<input id="date" name="date" value="<?php echo $date;?>" placeholder="YYYY/MM/DD" type="text"/>

						</td>
						<td class="reserve">
							Room:<br><br>
							<select type="text" name="room">
								<?php
					              $res = "SELECT * FROM rooms";
					              $result = mysqli_query($conn, $res) or die(mysql_error());
					                while ($row=mysqli_fetch_array($result)) {
					                  if($room==$row['room_name'])
					            
					                   echo"  <option value='$room' selected='selected'> $room</option>";
					                  else
					                  echo "
					                        <option value='".$row['room_name']."'>".$row['room_name']."</option>
					                       ";
					                }
					            ?>
							</select>
						</td>
					</tr>
				</table>
				<br>
				Description:<br><br>
							<textarea placeholder="Description" name="description"><?php echo $description;?></textarea><br><br>
				<hr>
				<input type="submit" class="schedule-btn" name="submit" value="Submit"><br><br>
								
			</form>
			</div>
		
		</div>
	   
			<?php include'side-bar-right.php';?>
			<?php include'footer.php';?>
		</body>
</html>