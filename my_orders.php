<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ALL ORDERS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel = "icon" href = "tmt.png" type = "image/x-icon"> 
</head>
<body class="bg-light">
	<div class="container">
	<nav class="navbar bg-success">
  <div class="container-fluid">

    <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>                      
    </button>
         
        
  <div style="float: right">
  <?php 
session_start();

if (isset($_SESSION['User'])) {
	?>
	<div class="navbar-nav mr-auto float-left" style=" color: black; text-transform: uppercase;font-weight: bold;font-family: Verdana, Geneva, Tahoma, sans-serif;font-size: 16px ">
		<?php
	echo 'CUSTOMER:&nbsp'.$_SESSION['User'].'&nbsp&nbsp&nbsp&nbsp&nbsp';	
	?>
	</div>	
	<?php
?>

 <div class="card-link align-right" style="text-transform: uppercase; float: left; padding-right: 20px; padding-left: 450px;">
	 <a href="Cart.php" style="color: white;font-weight: bolder;" >Back</a>
	 </div>

</div>
  </div>
  </div>
  </nav>
 </div>

	<center>
<div style="font-size: 25px;font-family:  Verdana, Geneva, Tahoma, sans-serif;text-transform: uppercase;color: blue">
</div>
<div class="container">
	<div class="table-responsive-sm">
	<table align="center" class="table table-striped table-sm">

		<tr style="font-family: times new roman; color: red;">
			<th scope="col">Order Number</th>
			<th scope="col">Customer's Email Address</th>
			<th scope="col">Customer's Contact</th>
			<th scope="col">Customer's Location</th>
			<th scope="col">Product Purchased</th>
			<th scope="col">Price</th>
			<th scope="col">Quantity</th>
			<th scope="col">Status</th>
			<th scope="col">Cancel Order</th>
		</tr>
		<?php 

$con=mysqli_connect("127.0.0.1","root","","efarm");
$uss=$_SESSION['User'];
$query=mysqli_query($con,"SELECT  `email`, `name`, `price`, `quantity`,`status`,`ordn`,`location`, `contacts` FROM `purchase` where email='$uss'  order by `status`  desc ");

while ($row=mysqli_fetch_array($query)) {
	$cala=$row["status"];
	?>
		<tr  style="font-family: Verdana, Geneva, Tahoma, sans-serif; color: black">
			<td><?=$row['ordn'];?></td>
			<td><?=$row['email'];?></td>
			<td><?=$row['contacts'];?></td>
			<td><?=$row['location'];?></td>
			<td><?=$row['name'];?></td>
			<td><?=$row['price'];?></td>
			<td><?=$row['quantity'];?></td>
			<!--<td ><?php //echo $row["status"]; ?></td>-->




<?php 
if ($cala=="Processed") {?>

  <td style="background-color: blue;color: white"><?php echo $row["status"]; ?></td>

<?php 

}
else if($cala=="Unprocessed"){?>
<td style="background-color: yellow;color: black"><?php echo $row["status"]; ?></td>
<?php
}
 ?>

<td style="text-align: center;" >
  <a href="Cancel_Order.php?off=<?php echo $row['ordn']; ?>"><i class="fa fa-window-close fa-2x" style="color: red"></i></a>
</td>
		</tr>
	<?php }} ?>
	</table>
</div>
	</div>
	</center>

</body>
<?php 
if (isset($_POST['Process'])) {
           
            $con=mysqli_connect("127.0.0.1","root","","efarm");
            $st="Processed";
            $sql = "UPDATE `purchase` SET `status`='$st' WHERE ordn='".$row['ordn']."' ";
            if(mysqli_query($conn, $sql)){
            echo "Message Saved";
            header("Location:Cart.php");
            
            }
        }
            ?>