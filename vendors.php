
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
  <div class="container">
  <nav class="navbar bg-light pt-0 pb-0">
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
	echo 'VENDOR:&nbsp'.$_SESSION['User'].'&nbsp&nbsp&nbsp&nbsp&nbsp';	
	?>
	</div>	
	<?php
?>
<div style="float: right">
	<?php 
	echo "\x20\x20\x20";
    echo '<a href="vendorlogout.php?logout">SIGN OUT</a>';
	 ?>
	
</div>
 <div class="card-link align-left" style="text-transform: uppercase; float: left; padding-right: 10px; padding-left: 300px;">
	 <a href="orders.php" >View all Orders </a>
	 </div>
	 <div class="card-link" style="text-transform: uppercase; float: left; padding-right: 20px; padding-left: 0px;">
	 <a href="vendor_update.php" >Update Password  </a>
	 </div>
<?php
}?>
</div>
  </div>
  </div>
  </nav>
 

<div class="container">
	<div class="row justify-content-center"> 
    <div class="col-lg-5 bg-light mt-4 p-2 rounded">
    	<h3 class="text-center text-info pb-2">UPLOAD A NEW PRODUCT</h3>
<form action="" method="post" enctype="multipart/form-data" id="image_upload">
	

<div class="form-group row">
  <label for="em" class="col-sm-2 col-form-label">Product Name</label>
  <div class="col-sm-10">
      <input type="text" class="form-control" id="em" name="pname" placeholder="product name" required="">
  </div>
  </div>
  <div class="form-group row">
  <label for="pp" class="col-sm-2 col-form-label">Product Price</label>
  <div class="col-sm-10">
      <input type="text" class="form-control" id="pp" name="pprice" placeholder="product price" required="">
  </div>
  </div>
	<div class="form-group">
		<div class="custom-file">
			<label for="image" class="custom-file-label">Choose File</label>
			<div class="col-sm-10">
			<input type="file" name="img[]" class="custom-file-input form-control" id="image" multiple="">
			</div>
		</div>
	</div>
	<div class="form-group">
		<input type="submit" name="submit" value="upload" class="btn btn-info btn-block">
	</div>
	<h5 class="text-center text-success" id="result"></h5>
</form>


    </div>
	</div>
</div>
</div>
<script>
	$(document).ready(function(){
   $("#image").on('change',function(){
     var filename=$(this).val();
     $(".custom-file-label").html(filename);
   });

$("#image_upload").submit(function(e){
e.preventDefault();
$.ajax({
	url: 'eka.php',
	method:'POST',
	processData:false,
	contentType:false,
	cache:false,
	data:new FormData(this),
	success: function(response){
		$("#result").html(response);
		//load_images();
	}
})
});
/*load_images();
function load_images(){
$.ajax({
url:'load.php',
method:'get',
success: function(data){
	$("#image_preview").html(data);
}
});
}*/
	});

</script>
</div>
  </body> 
  </html>
