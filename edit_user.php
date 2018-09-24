<!DOCTYPE html>
<?php include'config.php'?>
<?php
$userID = $_GET['id'];
$res1 = "SELECT * FROM users WHERE `user_id` = '$userID'";
$result1 = mysqli_query($conn, $res1) or die(mysql_error());
      for($i=0; $i<$num_rows=mysqli_fetch_array($result1);$i++) {
    			$id=$num_rows["user_id"];
	    		$fname=$num_rows["firstname"];
	    		$lname=$num_rows["lastname"];
	    		$uname=$num_rows["username"];
	    		$password=$num_rows["password"];
	    		$stands=$num_rows["stands"];
	    		$acslvl=$num_rows["access_level"];
            }
?>
<?php
$alert = '';
if(isset($_POST['submit'])){
	$fname = strip_tags($_POST['fname']);
	$lname = strip_tags($_POST['lname']);
	$username = strip_tags($_POST['username']);
	$password = strip_tags($_POST['password']);
	$work = strip_tags($_POST['work']);

	$sql = "UPDATE users set `firstname` = '$fname', `lastname`='$lname', `username`='$username', `password`='$password', `stands`='$work' where `user_id` = '$userID' ";
	mysqli_query($conn, $sql) or die(mysqli_error());

	$message = "User successfully updated!";
	echo "<script type='text/javascript'>alert('$message'); window.location.assign('account.php')</script>";



	}

?>
<html lang="en">
    <?php include'links.php';?>
	<body>
		<?php include'header.php';?>
		<?php include'side-bar-left.php';?>
		<div class="dashboard-title">
			<h3><i class="icon_id_alt"></i> ACCOUNTS
			<span style="font-size: 16px;"><a href="account.php"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> View all Accounts</a></span> </h3>
		</div> 
		<div class="main-content">
			<div class="main-content-signup">
			<form action="<?PHP $_SERVER["PHP_SELF"]?>" method="post" >						
				<center>				
				<span style="font-size:25px;"><i class="fas fa-address-card"></i> Edit Acount</span></center>
				<hr>
				<table>
					<tr>
						<td class="signup">
							First Name:<br><br>
							<input type="text" id="user" name="fname" value="<?php echo $fname;?>" minlength="2" required autofocus>
						</td>
						<td class="signup">
							Last Name:<br><br>
							<input type="text" id="user" name="lname" value="<?php echo $lname;?>" minlength="2" required autofocus>
						</td>
					</tr>
					<tr>
						<td class="signup">
							Username:<br><br>								
							<input type="text" id="user" name="username" value="<?php echo $uname;?>" minlength="5" required autofocus>
						</td>
						<td class="signup">
							<input type="checkbox" onclick="myFunction()"> Show Password<br><br>
							<input type="password" id="myInputs" name="password" value="<?php echo $password;?>" minlength="5" required>
						</td>
					</tr>
					<tr>
						<td class="signup">
							Work:<br><br>
							<input type="text" id="work" name="work" value="<?php echo $stands;?>" required autofocus>
					</td>
					</tr>
				</table>
				<hr>
				<input type="submit" class="btn" name="submit" value="Update"><br><br>
								
			</form>
			</div>
		
		</div>
	   
			<?php include'side-bar-right.php';?>
			<?php include'footer.php';?>
		</body>
</html>