<?php 
    include 'controller/config.php';

	$sql= mysqli_query($conn,"SELECT * FROM products WHERE dash_id != '0' LIMIT 6");
	while ($result = mysqli_fetch_array($sql)) {
        $products[] = array(
            'id' => $result['id'],
            'name' => $result['name'],
            'price' => $result['price'],
            'sale_price' => $result['sale_price'],
            'image' => $result['image'],
            'cat_id' => $result['cat_id'],
            'dash_id' => $result['dash_id'],
        );
    }

	$sql2= mysqli_query($conn,"SELECT * FROM products ORDER BY `products`.`id` DESC LIMIT 4");
	while ($result2 = mysqli_fetch_array($sql2)) {
        $producted[] = array(
            'id' => $result2['id'],
            'name' => $result2['name'],
            'price' => $result2['price'],
            'sale_price' => $result2['sale_price'],
            'image' => $result2['image'],
            'cat_id' => $result2['cat_id'],
            'dash_id' => $result2['dash_id'],
        );
    }
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
            <div class="site-blocks-cover" style="background-image: url('images/hero_1.jpg');">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
                            <div class="site-block-cover-content text-center">
                                <h2 class="sub-title">Effective Medicine, New Medicine Everyday</h2>
                                <h1>Welcome To<br> 4 Pharma</h1>
                                <p>
                                    <a href="shop.php" class="btn btn-primary px-5 py-3">Shop Now</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-section">
                <div class="container">
                    <div class="row align-items-stretch section-overlap">
                        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                            <div class="banner-wrap bg-primary h-100">
                                <a href="#" class="h-100">
                                    <h5>Free <br> Shipping</h5>
                                    <p>
                                        Premier Delivery
                                        <strong>Unlimited Free Next-Day Delivery For a Whole Year. T&C Apply.</strong>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                            <div class="banner-wrap h-100">
                                <a href="#" class="h-100">
                                    <h5>Season <br> Sale 50% Off</h5>
                                    <p>
                                        Sales on New Product
                                        <strong>Get more than 50% Discounts on the Medicines.</strong>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                            <div class="banner-wrap bg-warning h-100">
                                <a href="#" class="h-100">
                                    <h5>Buy <br> A Gift Card</h5>
                                    <p>
                                        Take a Gift Card
                                        <strong>4 Pharma will provide Gift card soon.</strong>
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-section">
                <div class="container">
                    <div class="row">
                        <div class="title-section text-center col-12">
                            <h2 class="text-uppercase">Popular Products</h2>
                        </div>
                    </div>
                    <div class="row">
						<?php foreach ($products as $key => $value) { ?>
							<div class="col-sm-6 col-lg-4 text-center item mb-4">
								<?php if($value['sale_price'] !=''){ ?>
									<span class="tag">Sale</span>
								<?php } ?>
								<a href="shop-single.php?p_id=<?php echo $value['id']; ?>"> <img src="<?php echo $value['image']; ?>" alt="Image"></a>
								<h3 class="text-dark"><a href="shop-single.php"><?php echo $value['name']; ?></a></h3>
								<?php if($value['sale_price'] !=''){ ?>
									<p class="price"><del><?php echo $value['price']; ?></del> &mdash; <?php echo $value['sale_price']; ?></p>
								<?php } else{ ?>
									<p class="price"><?php echo $value['price']; ?></p>
								<?php } ?>
							</div>
						<?php } ?>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 text-center">
                            <a href="shop.php" class="btn btn-primary px-4 py-3">View All Products</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-section bg-light">
                <div class="container">
                    <div class="row">
                        <div class="title-section text-center col-12">
                            <h2 class="text-uppercase">New Products</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 block-3 products-wrap">
                            <div class="nonloop-block-3 owl-carousel">
								<?php foreach ($producted as $key => $value) { ?>
									<div class="text-center item mb-4">
										<a href="shop-single.php?p_id=<?php echo $value['id']; ?>"> <img src="<?php echo $value['image']; ?>" alt="Image"></a>
										<h3 class="text-dark"><a href="shop-single.php"><?php echo $value['name']; ?></a></h3>
										<p class="price"><?php echo $value['price']; ?></p>
									</div>
								<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-section">
                <div class="container">
                    <div class="row">
                        <div class="title-section text-center col-12">
                            <h2 class="text-uppercase">Testimonials</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 block-3 products-wrap">
                            <div class="nonloop-block-3 no-direction owl-carousel">
                                <div class="testimony">
                                    <blockquote>
                                        <img src="images/person_1.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                                        <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur ducimus. Minus ratione sit quaerat unde.&rdquo;</p>
                                    </blockquote>
                                    <p>&mdash; Kelly Holmes</p>
                                </div>
                                <div class="testimony">
                                    <blockquote>
                                        <img src="images/person_2.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                                        <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore
                                            obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur ducimus. Minus ratione sit quaerat
                                            unde.&rdquo;
                                        </p>
                                    </blockquote>
                                    <p>&mdash; Rebecca Morando</p>
                                </div>
                                <div class="testimony">
                                    <blockquote>
                                        <img src="images/person_3.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                                        <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore
                                            obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur ducimus. Minus ratione sit quaerat
                                            unde.&rdquo;
                                        </p>
                                    </blockquote>
                                    <p>&mdash; Lucas Gallone</p>
                                </div>
                                <div class="testimony">
                                    <blockquote>
                                        <img src="images/person_4.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                                        <p>&ldquo;Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo omnis voluptatem consectetur quam tempore
                                            obcaecati maiores voluptate aspernatur iusto eveniet, placeat ab quod tenetur ducimus. Minus ratione sit quaerat
                                            unde.&rdquo;
                                        </p>
                                    </blockquote>
                                    <p>&mdash; Andrew Neel</p>
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