<?php 
require_once('connection.php');
session_start();
if (isset($_POST['submit'])) 
{
if (empty($_POST['name']) || empty($_POST['pass']))
  {
	header("Location:login.php?Empty=please fill in the blanks");
  }
else
{
	$cat="customer";
$query ="SELECT * FROM `register` WHERE email='".$_POST['name']."' AND pass='".$_POST['pass']."' AND category='".$cat."'";
$result=mysqli_query($con,$query);
if (mysqli_fetch_assoc($result)) {
	$_SESSION['User']=$_POST['name'];
	header("Location:Cart.php");
}
else{
	header("Location:login.php?Invalid= Username and Password do not match");
}
}
}
else
{
	echo "NOT WORKING NOW";
}
 ?>
