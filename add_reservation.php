<!DOCTYPE html>
<?php include'config.php'?>
<?php
$alert = '';
if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$date = $_POST['date'];
	$room = $_POST['room'];
	$desc = $_POST['description'];

	$sql = "INSERT INTO `thesisdb`.`reservations`(`rv_id`,`rv_name`,`rv_date`,`rv_room`,`rv_description`) VALUES('','$name','$date','$room','$desc')";
	mysqli_query($conn, $sql) or die(mysqli_error());
	$message = "Reservation successfully added!";
        echo "<script type='text/javascript'>alert('$message'); window.location.assign('Reservation.php') </script>";

	}

?>
<html lang="en">
    <?php include'links.php';?>
	<body>
		<?php include'header.php';?>
		<?php include'side-bar-left.php';?>
		<div class="dashboard-title">
			<h3><i class="icon_id_alt"></i> RESERVATION
			<span style="font-size: 16px;"><a href="reservation.php"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> View all Reservations</a></span> </h3>
		</div> 
		<div class="main-content">
			<div class="main-content-add-reservation">
			<form action="<?PHP $_SERVER["PHP_SELF"]?>" method="post" >		
				<center>				
				<span style="font-size:25px;">Reservation</span></center>
				<hr>
				Reserved by:<br><br>
							<input type="text" id="user" name="name" placeholder="Name" minlength="2" required autofocus><br><br>
				<table>
					<tr>
						<td class="reserve">
							Date:<br><br>

							<input id="date" name="date" placeholder="YYYY/MM/DD" type="text"/>

						</td>
						<td class="reserve">
							Room:<br><br>
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
							</select>
						</td>
					</tr>
				</table>
				<br>
				Description:<br><br>
							<textarea placeholder="Description" name="description"></textarea><br><br>
				<hr>
				<input type="submit" class="schedule-btn" name="submit" value="Submit"><br><br>
								
			</form>
			</div>
		
		</div>
	   
			<?php include'side-bar-right.php';?>
			<?php include'footer.php';?>
		</body>
</html>