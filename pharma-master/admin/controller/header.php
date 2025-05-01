<?php 
	session_start();
    if (!isset($_SESSION['name']) && $_SESSION['name'] == '') {
        header("Location: http://localhost/pharma-master/admin/index.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-#e3f2fd;" style="background: linear-gradient(90deg, #ffffff, #776BCC);">
	<a class="navbar-brand" href="#">
	<!-- <img src="/Report_automation/assets/img/cyber_img.png" width="120" height="30" class="d-inline-block align-top" alt=""> -->
	<img src="../images/logo.jpg" style="width:74px; border-radius: 25px;" class="d-inline-block align-top" alt="">
	</a>
	<div style="display: flex;margin-left: auto;">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<!-- <li class="nav-item ">
	 			<a class="navbar-brand" href="#">Company <span class="sr-only">(current)</span></a>
			</li> -->
			<li class="nav-item">
				<a class="navbar-brand" href="product.php">Products</a>
			</li>
			<li class="nav-item">
				<a class="navbar-brand" href="transactions.php">Transactions</a>
			</li>
			<li class="nav-item">
				<a class="navbar-brand" href="orders.php">Orders</a>
			</li>
			<li class="nav-item dropdown">
				<a class="navbar-brand dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">Settings</a>
				<div class="dropdown-menu">
  					<a class="dropdown-item" href="#">Profile</a>
  					<a class="dropdown-item" href="controller/logout.php">Logout</a>
				</div>
			</li>
		</ul>
	</div>
</div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
