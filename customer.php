<?php 
session_start();
$con=mysqli_connect("127.0.0.1","root","","efarm");
if (isset($_POST['add'])) {
if (isset($_SESSION["shopping_cart"])) {
 $count=count($_SESSION["shopping_cart"]);
 $item_array=array(
'item_name'     =>$_POST["hidden_name"],
'item_price'    =>$_POST["hidden_price"],
'item_quantity' =>$_POST["quantity"],
 );
$_SESSION["shopping_cart"][$count]=$item_array;

}
else {
     $item_array=array(
    'item_name'     =>$_POST["hidden_name"],
    'item_price'    =>$_POST["hidden_price"],
    'item_quantity' =>$_POST["quantity"],
     );
     $_SESSION["shopping_cart"][0]=$item_array;

    }
  }
if (isset($_GET['action'])) {
  if ($_GET['action']=="delete") {
    foreach ($_SESSION["shopping_cart"]  as $key => $value) {
      if ($value["name"] == $_GET["name"]) {
         unset($_SESSION["cart"][$keys]);
          echo '<script>alert("Product has been Removed...!")</script>';
          echo '<script>window.location="customer.php"</script>';
      }
    }
  }
}



 ?>
   <!DOCTYPE html>
  <html lang="en">
  <head>
  <title>E-FARM</title>
  <meta charset="utf-8">
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
  <body class="bg-success">
  <div class="container">
  <nav class="navbar bg-light">
  <div class="container-fluid">

    <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>                      
    </button>
         
  <div style="float: right">
  <?php 
//session_start();

if (isset($_SESSION['User'])) {
	?>
	<div class="navbar-nav mr-auto float-left" style=" color: black; text-transform: uppercase;font-weight: bold;font-family: Verdana, Geneva, Tahoma, sans-serif;font-size: 16px ">
		<?php
	echo 'CUSTOMER:  &nbsp&nbsp'.$_SESSION['User'].'&nbsp&nbsp&nbsp&nbsp&nbsp';	
	?>
	</div>	
	<?php
?>
<div style="float: right">
	<?php 
echo '<a href="logout.php?logout">LOG OUT</a>';
	 ?>
   <div class="card-link align-right" style="text-transform: uppercase; float: left; padding-right: 20px; padding-left: 430px;font-family: Verdana, Geneva, Tahoma, sans-serif;">
   <a href="customer_update.php" >Reset Password  </a>
   </div>
</div>
<?php
}?>
</div>
  </div>
  </div>
  </nav>
 
<div class="container" style="width: 700px">
 
    <?php 
     $query="SELECT * FROM `image` ORDER BY  id DESC";
     $result=mysqli_query($con,$query);
     if(mysqli_num_rows($result)>0){
      while ($row = mysqli_fetch_array($result)) {

        ?>
       <div class="col-md-3  bg-light rounded ">
       <div class="">
        <form method="post" action="customer.php?action=add&id=<?php echo $row["id"]; ?>">

          <div style="border: 1px solid #333; background-color: #f1f1f1; border-radius: 5px;padding: 16px;align-content:center">
              <img src="<?php echo $row["img"]; ?>" class="img-responsive"></br>
              <h4 class="text-info"><?php echo $row["name"]; ?></h4>
              <h4 class="text-danger"><?php echo $row["price"]; ?></h4>
              <input type="text" name="quantity" class="form-control" value="1">
              <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
              <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
              <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"value="Add to Cart">
          </div>           
      </form>
      </div>
    </div>
        <?php
      }
     }
     ?>


  
   <div style="clear: both"></div>
     <br>
       <h3>Order Details</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th width="40%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="20%">Price Details</th>
                <th width="15%">Total Price</th>
                <th width="5%">Remove Item</th>
            </tr>
            <?php 
              if(!empty($_SESSION["shopping_cart"])){
             $total = 0;
             foreach ($_SESSION["shopping_cart"] as $key => $values) {
             ?>
               <tr>
                <td><?php echo $value["name"]; ?></td>
                <td><?php echo $value["quantity"]; ?></td>
                <td>$ <?php echo $value["price"]; ?></td>
                <td>
                    $ <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>
                <td><a href="customer.php?action=delete&id=<?php echo $value["name"]; ?>"><span
                            class="text-danger">Remove Item</span></a></td>

            </tr>
<?php
             }
              }
             ?>
</table>
</div>
</div>

  </body> 
  </html>
