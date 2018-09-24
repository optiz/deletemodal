<?php
 

$servername = 'localhost';
$user = 'root';
$password = '';
$database = 'thesisdb';
$conn = new mysqli($servername,$user,$password,$database) or die('Error: Could not connect to database - '.mysql_error());


?>