<?php 
    include 'controller/config.php';
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    if (isset($_SESSION['user_id']) && $_SESSION['user_id'] !='') {
        $user_id = $_SESSION['user_id'];
    }else{
        $user_id = '';
    }

    $sql= mysqli_query($conn, 'SELECT COUNT(*) AS count FROM cart Where user_id = "'.$user_id.'" AND status = 0 ');
    $result = mysqli_fetch_assoc($sql);
    if (isset($result['count']) && $result['count'] !='' ) {
        $count = $result['count'];
    }else{
        $count = '0';
    }
?>
<div class="site-navbar py-2">
    <div class="search-wrap">
        <div class="container">
            <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
            <form action="#" method="post">
                <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
            </form>
        </div>
    </div>
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <div class="logo">
                <div class="site-logo">
                    <a href="index.php" class="js-logo-clone">
                        <img src="images/logo.jpg" width="100px;">
                    </a>
                    <a href="index.php" class="js-logo-clone">4 Pharma</a>
                </div>
            </div>
            <div class="main-nav d-none d-lg-block">
                <nav class="site-navigation text-right text-md-center" role="navigation">
                    <ul class="site-menu js-clone-nav d-none d-lg-block">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="shop.php">Store</a></li>
                        <li class="has-children">
                            <a href="#">Dropdown</a>
                            <ul class="dropdown">
                                <li><a href="https://www.pennmedicine.org/updates/blogs/health-and-wellness/2020/february/the-truth-about-supplements">Supplements</a></li>
                                <li class="has-children">
                                    <a href="#">Vitamins</a>
                                    <ul class="dropdown">
                                        <li><a href="https://www.medicalnewstoday.com/articles/195878">Vitamin A.</a></li>
                                        <li><a href="https://www.medicalnewstoday.com/articles/195878">Vitamin C.</a></li>
                                        <li><a href="https://www.medicalnewstoday.com/articles/195878">Vitamin B1 (thiamine)</a></li>
                                        <li><a href="https://www.medicalnewstoday.com/articles/195878">Vitamin B2 (riboflavin)</a></li>
                                    </ul>
                                </li>
                                <li><a href="https://pubmed.ncbi.nlm.nih.gov/31940634/#:~:text=Diet%20refers%20to%20the%20total,metabolism%20and%20repair%20of%20tissues.">Diet &amp; Nutrition</a></li>
                                <li><a href="https://www.webmd.com/diet/health-benefits-green-tea">Tea &amp; Coffee</a></li>
                            </ul>
                        </li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="icons">
                <nav class="site-navigation text-right text-md-center" role="navigation">
                    <ul class="site-menu js-clone-nav d-none d-lg-block">
                        <li><a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a></li>
                        <li><a href="cart.php" class="icons-btn d-inline-block bag">
                            <span class="icon-shopping-bag"></span>
                            <?php if(isset($_SESSION['name']) && $_SESSION['name'] != '' ) { 
                                if($count > 0){ ?>
                                    <span class="number"><?php echo $count; ?></span>
                                <?php } ?>
                            <?php } ?>
                            </a>
                        </li>
						<?php if(isset($_SESSION['name']) && $_SESSION['name'] != '' ) { ?>
							<li class="has-children">
								<a href="#" class="icons-btn d-inline-block js-search-open">
								<span class="icon-user-o"></span>
								</a>
								<ul class="dropdown">
									<li><a href="#"><?php echo $_SESSION['name']; ?></a></li>
									<li><a href="#">Profile</a></li>
                                    <li><a href="your_orders.php">Your Orders</a></li>
									<li><a href="controller/logout.php">Log Out</a></li>
								</ul>
							</li>
						<?php } else{ ?>
							<li class="has-children">
								<a href="#" class="icons-btn d-inline-block js-search-open">
								<span class="icon-user-o"></span>
								</a>
								<ul class="dropdown">
									<li><a href="login.php">Log in</a></li>
									<!-- <li><a href="#">Log Out</a></li> -->
								</ul>
							</li>
						<?php } ?>
                    </ul>
                </nav>
                <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
                    class="icon-menu"></span></a>
            </div>
        </div>
    </div>
</div>