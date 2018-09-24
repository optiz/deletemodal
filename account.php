<!DOCTYPE html>
<?php include'config.php'?>
<html lang="en">
    <?php include'links.php';?>
	<body>
		<?php include'header.php';?>
		<?php include'side-bar-left.php';?>
		<div class="dashboard-title">
			<h3><i class="icon_id_alt"></i> ACCOUNTS
			<span style="font-size: 16px;"><a href="add_user.php"><i class="fa fa-plus" aria-hidden="true"></i> Add Account</a></span> </h3>
		</div> 
		<div class="main-content">
			<table>
		    	
			    <?php
			    $res = "SELECT * FROM users WHERE `access_level` = 'user' and status='active'";
			    $result = mysqli_query($conn, $res) or die(mysql_error());
			    for($i=0; $i<$num_rows=mysqli_fetch_array($result);$i++) {
	      				$id=$num_rows["user_id"];
	    				$fname=$num_rows["firstname"];
	    				$lname=$num_rows["lastname"];
	    				$uname=$num_rows["username"];
	    				$stands=$num_rows["stands"];
	    				$acslvl=$num_rows["access_level"];

	    			echo "
	    				<tr class='user-table'>
		            		<td class='info-pic'><img src='img/upload.png' style='height:150px; width:150px; float: left;'><td>
		                    <td class='info'><br><span><strong>".$lname.", ".$fname."</strong></span>
		            		<br><br><span><strong>". $stands."</strong></span>
		            		<br><br><span>". $id."</span></td>
		            		<td class='info'><br><span>Username: ".$uname."</span>
		            		<br><br><span>Access level: ".$acslvl."</span></td>
		            		<td class='info-edit'><br><a href='edit_user.php?id=$id' ><button class='button edit-user'><i class='fas fa-pencil-alt'></i></button>
		            		<a href='#' data-modal-id='modal-login-x' class='launch-modal'><button class='button delete-user'><i class='fas fa-trash-alt'></i></button></a></td>
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
                        <p>Are you sure you want to delete this user?</p>
                      </div>
                      
                      <div class="modal-body">
                                  <div class="form-group">
                                    <label class="sr-only" for="form-password">Password</label>
                                    <input type="password" name="form-password" placeholder="••••••••" class="form-password form-control" style="font-size: 30px;">
                                  </div>
                      <button name="submit" class="btnx">Delete User</button>
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
                                    $res = "UPDATE users SET status = 'deleted' WHERE user_id= '$id'";
                                    $result = mysqli_query($conn, $res) or die(mysql_error());
                                    $message = "User successfully deleted!";
                                    echo "<script type='text/javascript'>alert('$message'); window.location.assign('account.php') </script>";
                                  }
                                  else {
                                   $message = "Invalid Password!";
                                    echo "<script type='text/javascript'>alert('$message'); window.location.assign('account.php') </script>";
                                  } 
                              }
                            }
                ?>
	   
			<?php include'side-bar-right.php';?>
			<?php include'footer.php';?>
		</body>
</html>