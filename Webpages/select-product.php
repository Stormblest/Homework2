<?php

    //get db credentials
    require_once 'login.php';

    //get connection to DB
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    if(isset($_GET['product_id'])){
                    
        $product_id = $_GET['product_id'];
        
        $query = "select * from product where product_id='$product_id' ";
        $result = $conn->query($query);
        if(!$result) die ($conn->error);
        $data = $result->fetch_array(MYSQLI_NUM);	
    }
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
		<h1>Details</h1> 
	</div>
	
<div class="container" style="margin-top: 25px; ">
        <div class="row">
            <div class="col-12 col-sm-5">
                <img src=<?php echo $data[3]?> alt="" style="width: 100%;"/>
            </div>
            <div class="col-12 col-sm-7">
                <div class="product-details" style="text-align:center;">
                    <div class="product-title"><?php echo $data[1]?></div>
                    <div class="product-price">$<?php echo $data[2]?></div>
                    <hr>
                    <div class="cart-button">
                        <form method="POST" action='view-cart.php'>
                            <input type="hidden" name="product_id" value=<?php echo $data[0] ?>>
                            <input type="submit" name="cart-button" value="Add to Cart" class="btn btn-primary btn-lg">
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	
	
	
	
	
	
	
	</html>
	
