<?php 
	// echo "<pre>"; print_r($_POST); exit;
    include 'config.php';

	if (isset($_POST['product_id']) && $_POST['product_id'] !='') {
		$product_id = $_POST['product_id'];
	}else{
		$product_id = '';
	}

	if (isset($_POST['user_id']) && $_POST['user_id'] !='') {
		$user_id = $_POST['user_id'];
	}else{
		$user_id = '';
	}

	if (isset($_POST['qnty']) && $_POST['qnty'] !='') {
		$qnty = $_POST['qnty'];
	}else{
		$qnty = '';
	}

	$sql = mysqli_query($conn, 'Insert INTO cart SET `product_id` = "'.$product_id.'",`user_id` = "'.$user_id.'",`qnty` = "'.$qnty.'"');

	header("Location: http://localhost/pharma-master/cart.php");
?>