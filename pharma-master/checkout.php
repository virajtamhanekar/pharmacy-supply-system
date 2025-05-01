<?php
    include 'controller/config.php';
    session_start();
    if (!isset($_SESSION['name']) && $_SESSION['name'] == '') {
        header("Location: http://localhost/pharma-master/login.php");
    }
    
    if (isset($_SESSION['user_id']) && $_SESSION['user_id'] !='') {
        $user_id = $_SESSION['user_id'];
    }else{
        $user_id = '';
    }
    
    $sql= mysqli_query($conn, 'SELECT *,cart.id FROM cart LEFT JOIN products ON cart.product_id = products.id WHERE cart.user_id = "'.$user_id.'" ');
    
    $products = array();
    while ($result = mysqli_fetch_array($sql)) {
        $products[] = array(
            'id' => $result['id'],
            'product_id' => $result['product_id'],
            'user_id' => $result['user_id'],
            'qnty' => $result['qnty'],
            'status' => $result['status'],
            'name' => $result['name'],
            'price' => $result['price'],
            'sale_price' => $result['sale_price'],
            'image' => $result['image'],
            'cat_id' => $result['cat_id'],
            'dash_id' => $result['dash_id'],
        );
    } 
    // echo "<pre>"; print_r($products); exit;
    
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
                        <div class="col-md-12 mb-0">
                            <a href="index.php">Home</a> <span class="mx-2 mb-0">/</span>
                            <strong class="text-black">Checkout</strong>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-section">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <div class="bg-light rounded p-3">
                                <p class="mb-0">Returning customer? <a href="#" class="d-inline-block">Click here</a> to login</p>
                            </div>
                        </div>
                    </div>
                    <form action="controller/checkout.php" method="post">
                        <div class="row">
                            <div class="col-md-6 mb-5 mb-md-0">
                                <h2 class="h3 mb-3 text-black">Billing Details</h2>
                                <div class="p-3 p-lg-5 border">
                                    <div class="form-group">
                                        <label for="c_country" class="text-black">Country <span class="text-danger">*</span></label>
                                        <select id="c_country" name="c_country" class="form-control">
                                            <option value="">Select a country</option>
                                            <option value="India">India</option>
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="c_fname" name="c_fname">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="c_lname" name="c_lname">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="c_companyname" class="text-black">Company Name </label>
                                            <input type="text" class="form-control" id="c_companyname" name="c_companyname">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="c_address" name="c_address" placeholder="Street address">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="apartment" placeholder="Apartment, suite, unit etc. (optional)">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="c_state_country" class="text-black">State / Country <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="c_state_country" name="c_state_country">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="c_postal_zip" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="c_postal_zip" name="c_postal_zip">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-5">
                                        <div class="col-md-6">
                                            <label for="c_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="c_email_address" name="c_email_address">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="c_order_notes" class="text-black">Order Notes</label>
                                        <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control"
                                            placeholder="Write your notes here..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-5">
                                    <div class="col-md-12">
                                        <h2 class="h3 mb-3 text-black">Coupon Code</h2>
                                        <div class="p-3 p-lg-5 border">
                                            <label for="c_code" class="text-black mb-3">Enter your coupon code if you have one</label>
                                            <div class="input-group w-75">
                                                <input type="text" class="form-control" id="c_code" placeholder="Coupon Code" aria-label="Coupon Code"
                                                    aria-describedby="button-addon2">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary btn-sm px-4" type="button" id="button-addon2">Apply</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-12">
                                        <h2 class="h3 mb-3 text-black">Your Order</h2>
                                        <div class="p-3 p-lg-5 border">
                                            <table class="table site-block-order-table mb-5">
                                                <thead>
                                                    <th>Product</th>
                                                    <th>Total</th>
                                                </thead>
                                                <tbody>
                                                    <?php $total = 0; $stotal = 0; $cart_ids = ''; $cart_id = ''; ?>
                                                    <?php foreach ($products as $key => $value) { ?>
                                                        <tr>
                                                            <td><?php echo $value['name']; ?> <strong class="mx-2">x</strong> <?php echo $value['qnty']; ?></td>
                                                            <td>
                                                                <?php if($value['sale_price'] !=''){ ?>
                                                                    <?php echo $price = $value['sale_price'] * $value['qnty']; ?>
                                                                <?php } else{ ?>
                                                                    <?php echo $price = $value['price'] * $value['qnty']; ?>
                                                                <?php } $total += $price; 
                                                                    $cart_ids .= $value['id'].',';
                                                                ?>
                                                            </td>
                                                        </tr>
                                                    <?php }  ?>
                                                    <?php $cart_id = rtrim($cart_ids , ","); ?>
                                                    <input type="hidden" name="cart_ids" value="<?php echo $cart_id; ?>">
                                                    <input type="hidden" name="total_amount" value="<?php echo $total; ?>">
                                                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                                    <tr>
                                                        <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                                                        <td class="text-black"><?php echo $total; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                                        <td class="text-black font-weight-bold"><strong><?php echo $total; ?></strong></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="border mb-3">
                                                <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button"
                                                    aria-expanded="false" aria-controls="collapsebank">Direct Bank Transfer</a></h3>
                                                <div class="collapse" id="collapsebank">
                                                    <div class="py-2 px-4">
                                                        <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the
                                                            payment reference. Your order won’t be shipped until the funds have cleared in our account.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="border mb-3">
                                                <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque" role="button"
                                                    aria-expanded="false" aria-controls="collapsecheque">Cheque Payment</a></h3>
                                                <div class="collapse" id="collapsecheque">
                                                    <div class="py-2 px-4">
                                                        <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the
                                                            payment reference. Your order won’t be shipped until the funds have cleared in our account.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="border mb-5">
                                                <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button"
                                                    aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>
                                                <div class="collapse" id="collapsepaypal">
                                                    <div class="py-2 px-4">
                                                        <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the
                                                            payment reference. Your order won’t be shipped until the funds have cleared in our account.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <!-- <button class="btn btn-primary btn-lg btn-block" onclick="window.location='thankyou.php'">Place Order</button> -->
                                                <button class="btn btn-primary btn-lg btn-block" type="submit" >Place Order</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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