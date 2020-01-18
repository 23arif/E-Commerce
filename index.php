<?php
include_once 'ayarlar/baglanti.php';
include_once 'ayarlar/function.php';
include_once 'inc/header.php';
takip();

$islem = g('islem');
switch ($islem) {
    case 'checkout':
        include_once 'checkout.php';
        break;
    case 'login':
        include_once 'login.php';
        break;
    case 'logOut':
        include_once 'logOut.php';
        break;
    case 'pDetails':
        include_once 'product-details.php';
        break;
    case 'cart':
        include_once 'cart.php';
        break;
    case 'contact-us':
        include_once 'contact-us.php';
        break;
    case 'shop':
        include_once 'shop.php';
        break;
    case 'category':
        include_once 'category.php';
        break;
    case 'brands':
        include_once 'brands.php';
        break;
    default:
        ?>
        <header>
            <title>AlikExpress: Shopping never had been exciting like now!</title>
        </header>
        <!--Head Slider-->
        <?php
        include_once 'moduller/ust-slider.php';
        ?>
        ?>
        <!--/Head Slider-->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <!--Category-products-->
                            <?php
                            include 'moduller/leftSideMenu-category.php';
                            ?>
                            <!--/category-products-->

                            <!--brands_products-->
                            <?php
                            include 'moduller/leftSideMenu-brands.php';
                            ?>
                            <!--/brands_products-->

                            <!--shipping-->
                            <?php
                            include 'moduller/leftSideMenu-shipping.php';
                            ?>
                            <!--/shipping-->
                        </div>
                    </div>

                    <div class="col-sm-9 padding-right">

                        <!--features_items-->
                        <?php
                        include 'moduller/rightSideTop-latestProducts.php';
                        ?>
                        <!--/features_items-->

                        <!--category-tab-->
                        <?php
                        include 'moduller/leftSideMiddle-CategoryTab.php';
                        ?>
                        <!--/category-tab-->
                        <!--Most Popular Products Couresel Slider-->
                        <?php
                        include_once 'moduller/body-couresel-slider.php';
                        ?>
                        <!--///Recommended Items Couresel Slider-->

                    </div>
                </div>
            </div>
        </section>

        <?php
        break;
}
include 'inc/footer.php';
?>
