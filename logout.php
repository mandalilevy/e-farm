<?php 
session_start();
if (isset($_GET['logout'])) {
	session_destroy();
	header("Location:login.php");
}
else{
header("Location:login.php");
}
 ?>
