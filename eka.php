
<?php

session_start();

if (isset($_SESSION['User'])) {
	



$con=mysqli_connect("127.0.0.1","root","","efarm");
foreach ($_FILES['img']['name'] as $i => $value) {
$image_name=$_FILES['img']['tmp_name'][$i];
$em=$_SESSION['User'];
$name=$_POST['pname'];
$price=$_POST['pprice'];
$folder="upload/";
$image_path=$folder.$_FILES['img']['name'][$i];
move_uploaded_file($image_name, $image_path);
$sql="INSERT INTO `image`( `email`,`name`, `price`,`img`)VALUES('$em','$name','$price','$image_path')";

if(mysqli_query($con, $sql)){
echo "Image Uploaded Successfully!";

}

/*$stmt=$con->prepare($sql);
$stmt->bind_param("s", $image_path);
$stmt->bind_param("s", $name);
$stmt->bind_param("s", $price);
$stmt->execute();*/
}

}








 ?>