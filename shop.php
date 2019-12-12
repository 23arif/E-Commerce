<header><title>Products - AlikExpress</title></header>
<!--<section id="advertisement">-->
<!--    <div class="container">-->
<!--        <img src="--><?php //advertisements(52); ?><!--" alt=""/>-->
<!--    </div>-->
<!--</section>-->
<section id="advertisement">
    <div class="container" >
        <img src="<?php advertisements(51); ?>" alt="" style="width: 100%;height: 100%">
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <!--catregory-->
                    <?php include_once 'moduller/leftSideMenu-category.php' ?>
                    <!--/catregory-->

                    <!--brands_products-->
                    <?php include_once 'moduller/leftSideMenu-brands.php' ?>
                    <!--/brands_products-->

                    <!--shipping-->
                    <?php include_once 'moduller/leftSideMenu-shipping.php' ?>
                    <!--/shipping-->
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Products</h2>
                    <?php
                    $veri = $db->prepare("SELECT *FROM urunler ORDER BY urun_id DESC ");
                    $veri->execute(array());
                    $v = $veri->fetchALL(PDO::FETCH_ASSOC);

                    foreach ($v as $urun) {
                        ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="<?php echo $urun['urun_resim'] ?>" alt=""/>
                                        <h2><?php echo parayaz($urun['urun_fiyat']) ?></h2>
                                        <p><?php echo $urun['urun_title'] ?></p>
                                        <button product-id="<?php echo $urun['urun_id'] ?>"
                                                class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>
                                            Add
                                            to cart
                                        </button>
                                        <a href="?islem=pDetails&urun_id=<?php echo $urun['urun_id'] ?>"
                                           class="btn btn-default read-more"><i class="fa fa-external-link"></i> Read
                                            More</a>
                                    </div>

                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div><!--features_items-->
                <ul class="pagination" >
                    <li class="active"><a href="">1</a></li>
                    <li><a href="">2</a></li>
                    <li><a href="">3</a></li>
                    <li><a href="">&raquo;</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
