<?php
require_once  'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM product";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

?>


<html>
	<head>
	<title> Buy Our Stuff </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="../CSS/styles.css" > 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
	</head>

	<!-- Navbar -->
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
		<div class="navbar-header">
		   <a class="navbar-brand" href="#myPage">
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
		  <ul class="nav navbar-nav navbar-right">
			<li><a href="view-products.php">View All Products</a></li>
			<li><a href="view-cart.php">View Cart</a></li>
		  </ul>
		</div>
	  </div>
	</nav>
	
	<!-- Header -->
	<div class="jumbotron text-center">
		<h1>Look At Our Stuff</h1> 
		<p>We have the best deals</p> 
	</div>
	
		
<?php
for($j=0; $j<$rows; $j++)
{
  $result->data_seek($j); 
  $row = $result->fetch_array(MYSQLI_NUM); 
  echo <<<_END
    <div class='col-12 col-sm-4'>
      <div class="product-image-container" >
        <a href="select-product.php?product_id=$row[0]">
          <div class="product-image-inner">
            <img src="$row[3]" class="product-image"style="width:200px;height:300px;"/>
            <div class="product-image-description">
              <div class="product-image-title">$row[1]</div>
              <div class="product-image-price">$$row[2]</div>
            </div> 
          </div>

        </a>
      </div>
    </div>
  
_END;
}
?>
      </div>
  </body>
</html>

<?php

$conn->close();

?>
    
	
	
	</body>	
</html>