<?php 
//if (isset($_POST['weka'])) {
if (isset($_SESSION['User'])) {
$name=$_SESSION['User'];
$nm=$value["hidden_name"];
$em=$value["item_quantity"];
$ph=  $total;

$sql = "INSERT INTO `purchase`( `email`, `name`, `quantity`, `price`) VALUES ('$name', '$nm', '$em','$ph')";
if(mysqli_query($con, $sql)){
echo "Message Saved";
header("Location:Cart.php");
} 
}
//}
 ?>