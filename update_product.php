<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Update Product</title>
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="bootstrap.css">
 <link rel="stylesheet" href="bootstrap.min.css">
 <link rel="stylesheet" href="bootstrap-reboot.min.css">
 <link rel="stylesheet" href="bootstrap-reboot.css">
   <link rel = "icon" href = "tmt.png" type = "image/x-icon">  
</head>
<body>
<div class="container">
 <nav class="navbar navbar-expand-lg bg-success">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav  mt-lg-0 mx-auto ">
      
      <li class="nav-item">
        <a style="color: white; font-family:Verdana" class="nav-link" href="products.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
      </li>
    
    </ul>
 
  </div>
</nav>
</div>
<div class="container">
<div class="container jumbotron" style="padding-top: 10px">
<div >
<?php
session_start();
if (isset($_SESSION['User'])) {

$con=mysqli_connect("127.0.0.1","root","","efarm");
$name = $_GET['off'];
$query = "SELECT * FROM image WHERE name='$name'";
$query_run=mysqli_query($con,$query);
while($row=mysqli_fetch_assoc($query_run)) {
  ?>
    <div class="row">
      <div class="col-sm-9 col-md-5 col-lg-8 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body" >
              <h5 class="card-title text-center" style="color: blue; font-weight: bolder;">UPDATE A PRODUCT</h5> 
              <?php 
                 if (@$_GET['Empty']==true)
                 {
                   ?>
                  <div class="card-title alert-light text-danger text-center text-uppercase"><?php echo $_GET['Empty']?></div>
                   <?php 
                 }
               ?>           
 <form action="" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label style="font-weight: bold;">PRODUCT NAME</label>
      <input type="text" class="form-control" id="name" name="bo"  value="<?php echo $row['name']  ?>" readonly="readonly">
    </div>
    <div class="form-group col-md-6">
      <label style="font-weight: bold;">PRICE</label>
      <input type="text" class="form-control" id="idn" name="bnum" value="<?php echo $row['price'] ?>">
    </div>
    </div>
    




    
  <?php }} ?>
  

<div >
     <button type="submit" name="add" class="btn   btn-success">Update Product</button>
  </div>
</form>
</div>
 </div>
</div>
</div>
</div>
</div>
<?php  ?>
</div>
</div>

<?php
if (isset($_POST['add'])) {
//intval($tp)="";
//$mult=$_POST['bname']*$_POST['cat'];

$st="Unprocessed";
$con=mysqli_connect("127.0.0.1","root","","efarm");
$num1 = random_int(1, 10000);

$sql = "UPDATE `image` SET `price`='".$_POST['bnum']."' WHERE name='".$_POST['bo']."'";
            if(mysqli_query($con, $sql)){
  header("Location:products.php");
 
}



}


 ?>


</body>
</html>