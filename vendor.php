<?php 
require_once('connection.php');
session_start();
if (isset($_POST['submit'])) 
{
if (empty($_POST['name']) || empty($_POST['pass']))
  {
	header("Location:vendorlogin.php?Empty=please fill in the blanks");
  }
else
{
	$cat="Vendor";
$query ="SELECT * FROM `register` WHERE email='".$_POST['name']."' AND pass='".$_POST['pass']."' AND category='".$cat."'";
$result=mysqli_query($con,$query);
if (mysqli_fetch_assoc($result)) {
	$_SESSION['User']=$_POST['name'];
	header("Location:vendors.php");
}
else{
	header("Location:vendorlogin.php?Invalid= Username and Password do not match");
}
}
}
else
{
	echo "NOT WORKING NOW";
}
 ?>
