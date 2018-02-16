<?php

//get db credentials
require_once 'login.php';

//get connection to DB
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if(isset($_POST['number'])) {
    	
	$number = $_POST['number'];
	$exp_date = $_POST['date'];
	$name = $_POST['name'];
	$cvc = $_POST['cvc'];
    $total = $_POST['total'];
    $order_id = $_POST['order_id'];
    $product_id = $_POST['product_id'];

    // insert payment 
    $payment_query = "insert into `payment` (CreditCard, Date, cvc) values ('$number', '$exp_date', '$cvc') ";
    $conn->query($payment_query);
    $payment_id = $conn->insert_id;
	if($conn->error) die($conn->error);

    // update order table with payment id and total 
    $order_query = "UPDATE `order` SET `total` = $total, `payment_id` = $payment_id WHERE `order`.`order_id` = $order_id";
    $conn->query($order_query);
	if($conn->error) die($conn->error);

    // select product for display 
    $product_query = "select * from product where product_id='$product_id' ";
    $product_result = $conn->query($product_query);
	if(!$product_result) die ($conn->error);
    $data = $product_result->fetch_array(MYSQLI_NUM);	
	
}

$conn->close();


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
			<li><a href="view-products.php">View All Products</a></li
		  </ul>
		</div>
	  </div>
	</nav>
	<!-- Header -->
	<div class="jumbotron text-center">
		<h1>Details</h1> 
	</div>
	
	
	<div class= 'container' style="margin-top: 25px; text-align: center;">
	<div class='row'>
	<div class="product-title"> Order Summary</div>
	</div>
	<div class = "row">
	
	 Item: <?php echo $data[1]?>
	 <br>
	 Price: $<?php echo $data[2]?>
	
	
	</div>
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	</html>