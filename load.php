
<?php

$con=mysqli_connect("127.0.0.1","root","","efarm");
$sql="SELECT * FROM `image` ORDER BY  id DESC";
$st=$con->prepare($sql);
$st->execute();
$result=$st->get_result();
$data='';
while ($row=$result->fetch_assoc()) {
   $data .='<div class="col-lg-4">
              <div class="card-group">
                  <div class="card mb-3">
                    <a href="'.$row['img'].'">
                      <img src="'.$row['img'].'" class="card-img-top" height="150">
                    </a>
                  </div>
             </div>
         </div>';
}
echo $data;

 ?>