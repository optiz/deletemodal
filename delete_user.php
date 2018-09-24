<?php include 'config.php'; ?>
<?php
$id = $_GET['id']; // $id is now defined
$res = "DELETE FROM users WHERE user_id= '$id' ";
$result = mysqli_query($conn, $res) or die(mysql_error());
header("Location: account.php");
?> 