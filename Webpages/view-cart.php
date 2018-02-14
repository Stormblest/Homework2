<?php
    require_once 'login.php';

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);
    $summary = "No items in cart.";

    if(isset($_POST['product_id'])){
        $product_id = $_POST['product_id'];

        // create order and retrieve ID
        $date =  date(DATE_RFC2822);
        $order_query = "insert into `orders` (`date`) values ('$date') ";
        $conn->query($order_query);
        $order_id = $conn->insert_id;
        
        // create order line
        $order_line_query = "insert into `order_line` (`order_id`, `product_id`) values ('$order_id', '$product_id')";
        $conn->query($order_line_query);


        $select_query = "select * from product where product_id='$product_id' ";
        $select_result = $conn->query($select_query);
        if(!$select_result) die ($conn->error);
        $data = $select_result->fetch_array(MYSQLI_NUM);	
        
$summary = <<<_END
<div class="row">
    <div class="col-12 col-sm-5">
        <img src=$data[3] alt="" style="width: 100%;"/>
    </div>
    <div class="col-12 col-sm-7">
        <div class="product-details" style="text-align:center;">
            <div class="product-title">$data[1]</div>
            <div class="product-price">$$data[2]</div>            
        </div>
    </div>
</div>
_END;
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
	
	<!--Container-->
	<div class="container" style="margin-top: 25px; ">
        <h1 style="font-size: 4rem; text-align:center;">Cart Summary</h1>
        <?php echo $summary?>     
        <?php echo $order_id ?>   
        <hr>
        <?php include("add-credit-card.php"); ?>
    </div>
</html>

<?php $conn->close(); ?>
	