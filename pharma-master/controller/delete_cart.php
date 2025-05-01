<?php 
    include 'config.php';

	if (isset($_GET['product_id']) && $_GET['product_id'] !='') {
		$product_id = $_GET['product_id'];
	}else{
		$product_id = '';
	}


	$sql = mysqli_query($conn, ' DELETE FROM cart WHERE id = "'.$product_id.'" ');

	header("Location: http://localhost/pharma-master/cart.php");
?>