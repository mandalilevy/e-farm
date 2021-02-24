<?php
    session_start();

    $database_name = "efarm";
    $con = mysqli_connect("localhost","root","",$database_name);

    if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_GET["id"],
                    'item_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],               

                );
         /*if (isset($_SESSION['User'])) {
            $name=$_SESSION['User'];
            $nm=$_POST["hidden_name"];
            $price=$_POST["hidden_price"];
            $ph=$_POST["quantity"];
            $st="Unprocessed";
            $num1 = random_int(1, 10000);

            $sql = "INSERT INTO `purchase`( `email`, `name`, `quantity`, `price`,`status`,`ordn`) VALUES ('$name', '$nm', '$ph','$price','$st','$num1')";
            if(mysqli_query($con, $sql)){
            echo '<script>alert("Added to Cart")</script>';

            }
            else{
              echo '<script>alert("Not Added to Cart")</script>';  
            }

            }*/


                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="Cart.php"</script>';
            }else{
                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="Cart.php"</script>';
            }
        }else{
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }

    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
   /*if (isset($_SESSION['User'])) {
                  // $nm=$_POST["hidden_name"];
                   $sql = "DELETE FROM `purchase` WHERE name='$nm'";

                    }*/

            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["product_id"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Product has been Removed...!")</script>';
                    echo '<script>window.location="Cart.php"</script>';


            

                }
            }
        }
    }
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel = "icon" href = "tmt.png" type = "image/x-icon"> 
    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');

        *{
            font-family: 'Titillium Web', sans-serif;
        }
        .product{
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;
        }
        table, th, tr{
            text-align: center;
        }
        .title2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        h2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        table th{
            background-color: #efefef;
        }
    </style>
</head>
<body class="bg-light">
    <div class="navbar-fixed-top container">
  <nav class="navbar bg-white">
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
   <a href="My_orders.php" >My Orders </a>
   </div>
   
</div>
<?php
}?>
</div>
  </div>
  </div>
  </nav>
 
</div>




<br><br><br><br>

    <div class="container" style="margin: auto;">
        <marquee style="color: red;font-size: 20px;text-decoration: bold">DEAR CUSTOMER: ONLY ORDERS ABOVE KSH.300 ARE PROCESSED</marquee>

        <?php
            $query = "SELECT * FROM image ORDER BY id ASC ";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {

                    ?>
                    <div class="col-md-3">

                        <form method="post" action="Cart.php?action=add&id=<?php echo $row["id"]; ?>">

                            <div class="product">
                                <img src="<?php echo $row["img"]; ?>" class="img-responsive">
                                <h5 class="text-info"><?php echo $row["name"]; ?></h5>
                                <h5 class="text-danger"><?php echo $row["price"]; ?></h5>
                                <input type="text" name="quantity" class="form-control" value="1" readonly="readonly">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
    <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"
                                       value="Add to Cart">
                            </div>
                        </form>
                    </div>
                    <?php
                }
            }
        ?>
        <div style="clear: both" class="bg-success"></div>
        
        <div class="table-responsive">
            <form method="post">
            <table class="table table-bordered">
            <tr>
                <th width="30%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="13%">Price Details</th>
                <th width="10%">Total Price</th>
                <th width="17%">Remove Item</th>
            </tr>
           

            <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value["item_name"]; ?></td>
                            <td><?php echo $value["item_quantity"]; ?></td>
                            <td>$ <?php echo $value["product_price"]; ?></td>
                            <td>
                                $ <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>
                            <td><a href="make_order.php?off=<?php echo $value["item_name"]; ?>"><span
                                        class="text-success text-lg-left">Proceed to Purchase</span></a></td>

                        </tr>
 


                        <?php
                        $total = $total + ($value["item_quantity"] * $value["product_price"]);
                    }
                        ?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right">$ <?php echo number_format($total, 2); ?></th>
                            <td></td>
                        </tr>
                        <?php
                    }
                ?>

            </table>
        <!--<input type="submit" name="weka" value="MAKE A PURCHASE" class="btn btn-warning btn-block">-->
            </form>
        </div>

    </div>


</body>
</html>
<?php 
            /*$database_name = "mboga";
                $conn = mysqli_connect("localhost","root","",$database_name);

            if (isset($_POST['weka'])) {
            if (isset($_SESSION['User'])) {
            $name=$_SESSION['User'];
            $nm=$value["item_name"];
            $em=$value["item_quantity"];
            $ph=  $total;
            if ($ph<300) {
                echo '<script>alert("Your Order Cant be Processed!!!\nOnly orders above 300 are Processed")</script>';
                            echo '<script>window.location="Cart.php"</script>';
            }
            else{
            $sql = "INSERT INTO `purchase`( `email`, `name`, `quantity`, `price`) VALUES ('$name', '$nm', '$em','$ph')";
            if(mysqli_query($conn, $sql)){
            echo "Message Saved";
            header("Location:Cart.php");
            } 
            }
            }
             */
 
 ?>