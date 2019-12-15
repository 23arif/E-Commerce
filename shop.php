<header><title>Products - AlikExpress</title></header>
<!--<section id="advertisement">-->
<!--    <div class="container">-->
<!--        <img src="--><?php //advertisements(52); ?><!--" alt=""/>-->
<!--    </div>-->
<!--</section>-->
<section id="advertisement">
    <div class="container">
        <img src="<?php advertisements(51); ?>" alt="" style="width: 100%;height: 100%">
    </div>
</section>
<section>
    <div id="shopContainer" class="container">
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
                    //Start pagination
                    $show = 9;
                    $pagination = $db->prepare("SELECT *FROM urunler");
                    $pagination->execute(array());
                    $paginationCount = $pagination->rowCount();

                    $total_page = ceil($paginationCount / $show);
                    $page = isset($_GET['syf']) ? $_GET['syf'] : 1;
                    if ($page < 1) $page = 1;
                    if ($page > $total_page) $page = $total_page;
                    $limit = ($page - 1) * $show;
                    //End pagination

                    $veri = $db->prepare("SELECT *FROM urunler ORDER BY urun_id DESC LIMIT $limit,$show");
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
                <ul class="pagination pull-right" >
                    <?php
                    $s = 0;
                    while ($s < $total_page) {
                        $s++;
                        if ($s == $page) {
                            ?>
                            <li class="active"><a><?php echo $s ?></a></li>
                            <?php
                        } else {
                            ?>
                            <li ><a href="?islem=shop&syf=<?php echo $s ?>"><?php echo $s ?></a></li>
                            <?php
                        }
                    }
                    ?>
                    <!--                    <li><a href="">&raquo;</a></li>-->
                </ul>
            </div>
        </div>
    </div>
</section>
