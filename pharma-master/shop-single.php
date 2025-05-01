<?php 
    session_start();
	if (!isset($_SESSION['name']) && $_SESSION['name'] == '') {
		header("Location: http://localhost/pharma-master/login.php");
	}

	$conn = new mysqli("localhost", "root", "", "db_pharma");

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

	if (isset($_GET['p_id']) && $_GET['p_id'] !='') {
		$product_id = $_GET['p_id'];
	}else{
		$product_id = '';
	}

    if (isset($_SESSION['user_id']) && $_SESSION['user_id'] !='') {
        $user_id = $_SESSION['user_id'];
    }else{
        $user_id = '';
    }

	$sql= mysqli_query($conn,"SELECT * FROM products WHERE id = '".$product_id."' ");
	$product=mysqli_fetch_assoc($sql);

	// echo "<pre>"; print_r($product); exit;
	
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>4 Pharma</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
        <link rel="stylesheet" href="fonts/icomoon/style.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/jquery-ui.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">
        <link rel="stylesheet" href="css/aos.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="site-wrap">
            <?php include('header.php'); ?>
            <div class="bg-light py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <a
                            href="shop.php">Store</a> <span class="mx-2 mb-0">/</span> <strong class="text-black"><?php echo $product['name'] ?></strong></div>
                    </div>
                </div>
            </div>
            <div class="site-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 mr-auto">
                            <div class="border text-center">
                                <img src="<?php echo $product['image'] ?>" alt="Image" class="img-fluid p-5">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h2 class="text-black"><?php echo $product['name'] ?></h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, vitae, explicabo? Incidunt facere, natus
                                soluta dolores iusto! Molestiae expedita veritatis nesciunt doloremque sint asperiores fuga voluptas,
                                distinctio, aperiam, ratione dolore.
                            </p>
							<?php if($product['sale_price'] !=''){ ?>
								<p><del><?php echo $product['price'] ?></del>  <strong class="text-primary h4"><?php echo $product['sale_price'] ?></strong></p>
							<?php } else{ ?>
								<p><strong class="text-primary h4"><?php echo $product['price'] ?></strong></p>
							<?php } ?>
                            <form action="controller/cart.php" method="post">
                                <div class="mb-5">
                                    <div class="input-group mb-3" style="max-width: 220px;">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                        </div>
                                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                        <input type="text" class="form-control text-center" name="qnty" value="1" placeholder=""
                                            aria-label="Example text with button addon" aria-describedby="button-addon1">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                        </div>
                                    </div>
                                </div>
                                <p><button type="submit" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Add To Cart</button></p>
                            </form>
                            <div class="mt-5">
                                <ul class="nav nav-pills mb-3 custom-pill" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                                            aria-controls="pills-home" aria-selected="true">Ordering Information</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                                            aria-controls="pills-profile" aria-selected="false">Specifications</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <table class="table custom-table">
                                            <thead>
                                                <th>Material</th>
                                                <th>Description</th>
                                                <th>Packaging</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row"><?php echo $product['material'] ?></th>
                                                    <td><?php echo $product['description'] ?></td>
                                                    <td><?php echo $product['packaging'] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <table class="table custom-table">
                                            <tbody>
                                                <tr>
                                                    <td>HPIS CODE</td>
                                                    <td class="bg-light"><?php echo $product['hpis'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>HEALTHCARE PROVIDERS ONLY</td>
                                                    <td class="bg-light"><?php echo $product['hprovider'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>LATEX FREE</td>
                                                    <td class="bg-light"><?php echo $product['latex'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>MEDICATION ROUTE</td>
                                                    <td class="bg-light"><?php echo $product['medication_r'] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-section bg-secondary bg-image" style="background-image: url('images/bg_2.jpg');">
                <div class="container">
                    <div class="row align-items-stretch">
                        <div class="col-lg-6 mb-5 mb-lg-0">
                            <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('images/bg_1.jpg');">
                                <div class="banner-1-inner align-self-center">
                                    <h2>Pharma Products</h2>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae ex ad minus rem odio voluptatem.
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 mb-5 mb-lg-0">
                            <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('images/bg_2.jpg');">
                                <div class="banner-1-inner ml-auto  align-self-center">
                                    <h2>Rated by Experts</h2>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae ex ad minus rem odio voluptatem.
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="site-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <div class="block-7">
                                <h3 class="footer-heading mb-4">About Us</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quae reiciendis distinctio voluptates
                                    sed dolorum excepturi iure eaque, aut unde.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
                            <h3 class="footer-heading mb-4">Quick Links</h3>
                            <ul class="list-unstyled">
                                <li><a href="#">Supplements</a></li>
                                <li><a href="#">Vitamins</a></li>
                                <li><a href="#">Diet &amp; Nutrition</a></li>
                                <li><a href="#">Tea &amp; Coffee</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="block-5 mb-5">
                                <h3 class="footer-heading mb-4">Contact Info</h3>
                                <ul class="list-unstyled">
                                    <li class="address">203 Fake St. Mountain View, San Francisco, California, USA</li>
                                    <li class="phone"><a href="tel://23923929210">+2 392 3929 210</a></li>
                                    <li class="email">emailaddress@domain.com</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-5 mt-5 text-center">
                        <div class="col-md-12">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>document.write(new Date().getFullYear());</script> All rights reserved
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/aos.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>