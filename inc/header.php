<?php
include_once 'ayarlar/islem.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Alik Express</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i>+23 2323 2323</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@alikexpress.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="index.php"><img src="images/home/logo.png" alt="" width="139" height="39"/></a>
                    </div>
                    <div class="btn-group pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                USD
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canada</a></li>
                                <li><a href="#">UK</a></li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                DOLLAR
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canadian Dollar</a></li>
                                <li><a href="#">Pound</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <?php
                            if ($_SESSION) {
                                ?>
                                <li><a href="#"><i class="fa fa-user"></i><?php echo ucfirst(@$_SESSION['isim']) ?></a>
                                </li>
                                <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                                <li><a href="shop/E%20Shopper%20Free%20Website%20Template%20-%20Free-CSS.com/checkout.html"><i
                                                class="fa fa-crosshairs"></i> Checkout</a></li>
                                <li><a href="index.php?islem=cart"><i class="fa fa-shopping-cart"></i> Cart <span class="badge cart-count"><?php echo $total_count ?></span></a></li>

                                <?php
                            }
                            ?>
                            <?php
                            if ($_SESSION) {
                                ?>
                                <li><a href="index.php?islem=logOut"><i class="fa fa-power-off"></i> Log Out</a></li>
                                <?php
                            } else {
                                ?>
                                <li><a href="index.php?islem=login"><i class="fa fa-lock"></i> Login</a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="index.php" class="active">Home</a></li>
                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li>
                                        <a href="shop/E%20Shopper%20Free%20Website%20Template%20-%20Free-CSS.com/shop.html">Products</a>
                                    </li>
                                    <li><a href="product-details.php">Product Details</a></li>
                                    <li>
                                        <a href="shop/E%20Shopper%20Free%20Website%20Template%20-%20Free-CSS.com/checkout.html">Checkout</a>
                                    </li>
                                    <li>
                                        <a href="shop/E%20Shopper%20Free%20Website%20Template%20-%20Free-CSS.com/cart.html">Cart</a>
                                    </li>
                                    <li>
                                        <a href="shop/E%20Shopper%20Free%20Website%20Template%20-%20Free-CSS.com/login.html">Login</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li>
                                        <a href="shop/E%20Shopper%20Free%20Website%20Template%20-%20Free-CSS.com/blog.html">Blog
                                            List</a></li>
                                    <li>
                                        <a href="shop/E%20Shopper%20Free%20Website%20Template%20-%20Free-CSS.com/blog-single.html">Blog
                                            Single</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="index.php?islem=contact-us">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search"/>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->
