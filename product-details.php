<?php
$urun_id = g('urun_id');
$veri = $db->prepare("SELECT *FROM urunler INNER JOIN kategoriler ON kategoriler.kategori_id = urunler.urun_kategori WHERE urun_id=?");
$veri->execute(array($urun_id));
$v = $veri->fetchALL(PDO::FETCH_ASSOC);
foreach ($v as $urun) ;
?>
<head><title><?php echo $urun['urun_title'] ?> - AlikExpress</title></head>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <!--                        CATEGORY-->
                    <?php
                    include 'moduller/leftSideMenu-category.php';
                    ?>
                    <!--                        CATEGORY-->

                    <!--brands_products-->
                    <?php
                    include 'moduller/leftSideMenu-brands.php';
                    ?>
                    <!--/brands_products-->

                    <!--shipping-->
                    <?php
                    include "moduller/leftSideMenu-shipping.php";
                    ?>
                    <!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div id="detailsAlert"></div>
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="<?php echo $urun['urun_resim'] ?>" alt="<?php echo $urun['urun_title'] ?>"/>
                            <h3>ZOOM</h3>
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                                    <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                                    <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                                </div>
                                <div class="item">
                                    <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                                    <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                                    <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                                </div>
                                <div class="item">
                                    <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                                    <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                                    <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                                </div>

                            </div>

                            <!-- Controls -->
                            <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <img src="images/product-details/new.jpg" class="newarrival" alt=""/>
                            <h2><?php echo $urun['urun_desc'] ?></h2>
                            <!--                    Rating stars-->
                            <?php include_once 'moduller/rating_stars.php'?>
                            <!--                    /Rating stars-->
                            <br>
                            <span id="money">US <?php echo parayaz2($urun['urun_fiyat']) ?>&nbsp;
                            <button product-id="<?php echo $urun['urun_id'] ?>" class="btn btn-fefault cart <?php if(@$_SESSION){echo 'add-to-cart';} ?>" id="addToCartP-Details" style="margin: 0">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </button></span><br/><br/>
                            <p><b>Category:</b> <?php echo $urun['kategori_title'] ?></p>
                            <p><b>Availability:</b> In Stock</p>
                            <p><b>Condition:</b> New</p>
                            <p><b>Brand:</b> <?php echo $urun['urun_firma'] ?></p>

                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->

                <!--category-tab-->
                <?php include 'moduller/productDetails-tab.php'; ?>
                <!--/category-tab-->

                <!--recommended_items-->
                <?php
                include 'moduller/body-couresel-slider.php';
                ?>
                <!--/recommended_items-->

            </div>
        </div>
    </div>
</section>
<?php
$id = g('urun_id');
$hit = $db->prepare("UPDATE urunler set urun_hit = urun_hit +1 where urun_id=?");
$hit->execute(array($id));
?>
