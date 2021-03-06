<?php
include_once 'ayarlar/islem.php';
$veri = $db->prepare("SELECT *FROM settings");
$veri->execute(array());
$v = $veri->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="<?php echo $v['settings_name'] ?>"/>
    <meta name="description" content="<?php echo $v['settings_desc'] ?>"/>
    <meta name="keywords" content="<?php echo $v['settings_keywords'] ?>"/>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">


    <!--    ----------OWL_SLIDER-------------->
    <link rel="stylesheet" href="owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/assets/owl.theme.default.min.css">
    <!--    ----------/OWL_SLIDER-------------->

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
                            <li><a href="#"><i class="fa fa-phone"></i>&nbsp;<?php echo $v['settings_phone'] ?></a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i>&nbsp;<?php echo $v['settings_email'] ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <?php if ($v['settings_fbSwitch'] == 'on') {
                                ?>
                                <li><a href="http://<?php echo $v['settings_facebook'] ?>" target="_blank"><i
                                                class="fa fa-facebook"></i></a></li>
                                <?php
                            } ?>

                            <?php if ($v['settings_twitterSwitch'] == 'on') {
                                ?>
                                <li><a href="http://<?php echo $v['settings_twitter'] ?>" target="_blank"><i
                                                class="fa fa-twitter"></i></a></li>
                                <?php
                            } ?>
                            <?php if ($v['settings_linkedinSwitch'] == 'on') {
                                ?>
                                <li><a href="http://<?php echo $v['settings_linkedin'] ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <?php
                            } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 ">
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
                       <?php include('moduller/exchange.php') ?>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <?php
                            if ($_SESSION) {
                                ?>
                                <li><a href="#"><i class="fa fa-user"></i><?php echo ucfirst(@$_SESSION['isim']) ?></a>
                                </li>
                                <?php if ($_SESSION['yetki'] == 1) { ?>
                                    <li><a href="dashboard"><i class="fa fa-dashboard"></i> Admin Dashboard</a></li>
                                <?php } ?>
                                <li><a href="index.php?islem=cart"><i class="fa fa-shopping-cart"></i> Cart <span
                                                class="badge cart-count"><?php echo $total_count ?></span></a></li>

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
                <div class="col-sm-12">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left col-sm-7">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="index.php" class="active">Home</a></li>
                            <li><a href="?islem=shop">Products</a></li>
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
                                <a href="contact">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group" id="autoCompleteCenter">
                            <input type="text" class="form-control" id="inp" placeholder="Search in AlikExpress ?"
                                   name="search"
                                   autocomplete="off">
                            <div id="autoComplete"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->

</header><!--/header-->
