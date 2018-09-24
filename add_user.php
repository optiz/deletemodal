<!DOCTYPE html>
<?php include'config.php'?>
<?php
if(isset($_POST['submit'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$work = $_POST['work'];
	$admin = $_POST['admin'];

	$query = "SELECT * FROM `users` WHERE `username` = '$user'";
	$result = mysqli_query($conn, $query) or die(mysql_error());
	if(mysqli_num_rows($result)>0){
		$message = "User already exist!";
        echo "<script type='text/javascript'>alert('$message'); window.location.assign('add_user.php') </script>";
	}else{

	$sql = "INSERT INTO `thesisdb`.`users`(`user_id`,`firstname`,`lastname`,`username`,`password`,`stands`,`access_level`,`status`) VALUES('','$fname','$lname','$user','$pass','$work','$admin','active')";
	mysqli_query($conn, $sql) or die(mysqli_error());

		$message = "User sucessfully added!";
        echo "<script type='text/javascript'>alert('$message'); window.location.assign('account.php') </script>";

	}
	}

?>
<html lang="en">
    <?php include'links.php';?>
	<body>
		<?php include'header.php';?>
		<?php include'side-bar-left.php';?>
		<div class="dashboard-title">
			<h3><i class="icon_id_alt"></i> ACCOUNTS
			<span style="font-size: 16px;"><a href="account.php"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>  View all Accounts</a></span> </h3>
		</div> 
		<div class="main-content">
			<div class="main-content-signup">
			<form action="<?PHP $_SERVER["PHP_SELF"]?>" method="post" >		
				<center>				
				<span style="font-size:25px;"><i class="far fa-address-card"></i> Add Acount</span></center>
				<hr>
				<table>
					<tr>
						<td class="signup">
							Enter First Name:<br><br>
							<input type="text" id="user" name="fname" placeholder="First Name" minlength="2" required autofocus>
						</td>
						<td class="signup">
							Enter Last Name:<br><br>
							<input type="text" id="user" name="lname" placeholder="Last Name" minlength="2" required autofocus>
						</td>
					</tr>
					<tr>
						<td class="signup">
							Enter Username:<br><br>								
							<input type="text" id="user" name="username" placeholder="Username" minlength="5" required autofocus>
						</td>
						<td class="signup">
							Enter Password:<br><br>
							<input type="password" id="pass" name="password" placeholder="Password" minlength="5" required>
						</td>
					</tr>
					<tr>
						<td class="signup">
							Enter Work:<br><br>
							<input type="text" id="work" name="work" placeholder="Work" required autofocus>
						</td>
						<td class="signup">
							Access Level:<br><br>
							<select type="text" name="admin">
								<option>user</option>
								<option>admin</option>
							</select>
						</td>
					</tr>
				</table>
				<hr>
				<input type="submit" class="btn" name="submit" value="Sign Up"><br><br>
								
			</form>
			</div>
		
		</div>
	   
			<?php include'side-bar-right.php';?>
			<?php include'footer.php';?>
		</body>
</html>