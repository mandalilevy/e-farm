<?php 
session_start();
if (isset($_GET['logout'])) {
	session_destroy();
	header("Location:vendorlogin.php");
}
else{
header("Location:vendorlogin.php");
}
 ?>
