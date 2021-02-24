
<?php

session_start();

if (isset($_SESSION['User'])) {
	
$con=mysqli_connect("127.0.0.1","root","","efarm");
$em=$_SESSION['User'];
$name=$_POST['pname'];
$sql="UPDATE `register` SET `pass`='$name' WHERE email='$em'";
if(mysqli_query($con, $sql)){
//echo "Password Successfully Changed!";
header("Location:customer.php");
}

/*$stmt=$con->prepare($sql);
$stmt->bind_param("s", $image_path);
$stmt->bind_param("s", $name);
$stmt->bind_param("s", $price);
$stmt->execute();*/


}








 ?>
