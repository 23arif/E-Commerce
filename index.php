<?php
include_once 'ayarlar/baglanti.php';
include_once 'ayarlar/function.php';
include_once 'inc/header.php';
takip();

$islem = g('islem');
switch ($islem) {
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

    default:
        ?>
        <!--Head Slider-->
        <?php
        include 'moduller/ust-slider.php';
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

                            <!--price-range-->
                            <?php
                            include 'moduller/leftSideMenu-priceRange.php';
                            ?>
                            <!--/price-range-->

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

                        <!--Recommended Items Couresel Slider-->
                        <?php
                        include 'moduller/body-couresel-slider.php';
                        ?>
                        <!--/Recommended Items Couresel Slider-->

                    </div>
                </div>
            </div>
        </section>
        <?php
        break;

}

include 'inc/footer.php';

?>
