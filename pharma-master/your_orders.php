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

    // $sql= mysqli_query($conn, 'SELECT *,cart.id FROM cart LEFT JOIN products ON cart.product_id = products.id WHERE cart.user_id = "'.$user_id.'" AND cart.status = 0 ');

    // $products = array();
    // while ($result = mysqli_fetch_array($sql)) {
    //     $products[] = array(
    //         'id' => $result['id'],
    //         'product_id' => $result['product_id'],
    //         'user_id' => $result['user_id'],
    //         'qnty' => $result['qnty'],
    //         'status' => $result['status'],
    //         'name' => $result['name'],
    //         'price' => $result['price'],
    //         'sale_price' => $result['sale_price'],
    //         'image' => $result['image'],
    //         'cat_id' => $result['cat_id'],
    //         'dash_id' => $result['dash_id'],
    //     );
    // } 

    $sql = mysqli_query($conn,"SELECT * FROM orders WHERE user_id = '".$user_id."' ");
    $products = array();
    while ($result = mysqli_fetch_assoc($sql)) {

        $cart_ids = explode(",", $result['cart_ids']);
        $qnty = 0;
        $products_my = array();

        foreach($cart_ids as $id){
            $sql3 = mysqli_query($conn,"SELECT * FROM cart WHERE id = '".$id."' ");
            $res = mysqli_fetch_assoc($sql3); 
            $qnty += $res['qnty'];
            $sql4 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM products WHERE id = '".$res['product_id']."' "));
            if($sql4['sale_price'] > 0){
                $price = $sql4['sale_price'];
            } else{
                $price = $sql4['price'];
            }
            $products_my[] = array(
                'name' => $sql4['name'],
                'image' => $sql4['image'],
                'price' => $price,
                'qnty' => $res['qnty'],
            );
        }

        if ($result['status'] == '1') {
            $status = 'On process';
        } elseif ($result['status'] == '2') {
            $status = 'Approved';
        } elseif ($result['status'] == '3') {
            $status = 'Dispatch';
        } elseif ($result['status'] == '4') {
            $status = 'Ready to Ship';
        } elseif ($result['status'] == '5') {
            $status = 'Out for Delivery';
        } elseif ($result['status'] == '6') {
            $status = 'Dilvered';
        } elseif ($result['status'] == '7') {
            $status = 'Cancelled';
        } elseif ($result['status'] == '8') {
            $status = 'Hold';
        } else{
            $status = 'On process';
        }

        $products[] = array(
            'id' => $result['id'],
            'order' => 'ORDER-'.$result['id'],
            'qnty' => $qnty,
            'total' => $result['total'],
            'products_my' => $products_my,
            'date' => $result['date'],
            'status' => $result['status'],
            'done' => $result['done'],
            'status1' => $status,
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
            <div class="bg-light py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mb-0">
                            <a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> 
                            <strong class="text-black">Your Orders</strong>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-section">
                <div class="container">
                    <div class="row mb-5">
                        <form class="col-md-12" method="post">
                            <div class="site-blocks-table">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Sr.no</th>
                                            <th class="product-thumbnail">Order-ID</th>
                                            <th class="product-name">Product Names</th>
                                            <!-- <th class="product-price">Price</th> -->
                                            <th class="product-quantity">Total Quantity</th>
                                            <th class="product-total">Total</th>
                                            <th class="product-total">Date</th>
                                            <th class="product-remove">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $srno = 1; $total = 0; $stotal = 0; ?>
                                        <?php foreach ($products as $key => $value) { ?>
                                            <tr>
                                                <!-- <td class="product-thumbnail">
                                                    <img src="<?php echo $value['image']; ?>" alt="Image" class="img-fluid">
                                                </td> -->
                                                <td class="product-name">
                                                    <h2 class="h5 text-black"><?php echo $srno++; ?></h2>
                                                </td>
                                                <td class="product-name">
                                                    <h2 class="h5 text-black"><?php echo $value['order']; ?></h2>
                                                </td>
                                                <td class="product-name">
                                                    <h2 class="h5 text-black">
                                                        <?php foreach ($value['products_my'] as $skey => $svalue) { ?>
                                                            <?php echo $svalue['name'].','; ?>
                                                        <?php } ?>
                                                    </h2>
                                                </td>
                                                <td class="product-name">
                                                    <h2 class="h5 text-black"><?php echo $value['qnty']; ?></h2>
                                                </td>
                                                <td class="product-name">
                                                    <h2 class="h5 text-black"><?php echo $value['total']; ?></h2>
                                                </td>
                                                <td class="product-name">
                                                    <h2 class="h5 text-black"><?php echo $value['date']; ?></h2>
                                                </td>
                                                <td class="product-name">
                                                    <h2 class="h5 text-black"><?php echo $value['status1']; ?></h2>
                                                </td>
                                                <!-- <?php if($value['sale_price'] !=''){ ?>
                                                    <td><?php $price = $value['sale_price']; echo $price; ?></td>
                                                <?php } else{ ?>
                                                    <td><?php $price = $value['price']; echo $price; ?></td>
                                                <?php } ?>
                                                <td>
                                                    <div class="input-group mb-3" style="max-width: 120px;">
                                                        <div class="input-group-prepend">
                                                            <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                                        </div>
                                                        <input type="text" class="form-control text-center" value="<?php if($value['qnty'] > 1){ echo $value['qnty']; } else{ echo '1'; } ?>" placeholder=""
                                                            aria-label="Example text with button addon" aria-describedby="button-addon1">
                                                        <?php $stotal = $price * $value['qnty'];
                                                            $total += $stotal;
                                                        ?>
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?php echo $price * $value['qnty'] ?></td>
                                                <td><a href="#" onclick="dodelete(<?php echo $value['id']; ?>)" class="btn btn-primary height-auto btn-sm">X</a></td> -->
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row mb-5">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <a href="cart.php" class="btn btn-primary btn-md btn-block">Update Cart</a>
                                </div>
                                <div class="col-md-6">
                                    <a href="shop.php" class="btn btn-outline-primary btn-md btn-block">Continue Shopping</a>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col-md-12">
                                    <label class="text-black h4" for="coupon">Coupon</label>
                                    <p>Enter your coupon code if you have one.</p>
                                </div>
                                <div class="col-md-8 mb-3 mb-md-0">
                                    <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-primary btn-md px-4">Apply Coupon</button>
                                </div>
                            </div> -->
                        </div>
                        <!-- <div class="col-md-6 pl-5">
                            <div class="row justify-content-end">
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-12 text-right border-bottom mb-5">
                                            <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <span class="text-black">Subtotal</span>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <strong class="text-black"><?php echo $total; ?></strong>
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col-md-6">
                                            <span class="text-black">Total</span>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <strong class="text-black"><?php echo $total; ?></strong>
                                        </div>
                                    </div>
                                    <?php if($total != '0'){ ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-primary btn-lg btn-block" onclick="window.location='checkout.php'">Proceed To
                                                Checkout</button>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div> -->
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
        <script type="text/javascript">
            function dodelete(val){
                if (window.confirm('Do you want to Delete'))
                {
                   window.location.href = 'http://localhost/pharma-master/controller/delete_cart.php?product_id='+val;
                }
            }
        </script>
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