<?php
$veri = $db->prepare("SELECT *FROM urunler ORDER BY urun_hit DESC limit 3");
$veri->execute(array());
$v = $veri->fetchALL(PDO::FETCH_ASSOC);
?>
<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Most Popular Products</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                <?php
                foreach ($v as $urun) {
                    ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="<?php echo $urun['urun_resim'] ?>"
                                         style="height:140px!important;width: 180px!important"/>
                                    <h2><?php echo parayaz($urun['urun_fiyat']) ?></h2>
                                    <p><?php echo $urun['urun_title'] ?></p>
                                    <?php if (@$_SESSION) {
                                        ?>
                                        <button product-id="<?php echo $urun['urun_id'] ?>"
                                                class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>
                                            Add
                                            to cart
                                        </button>
                                    <?php } ?>
                                    <a href="?islem=pDetails&urun_id=<?php echo $urun['urun_id'] ?>"
                                       class="btn btn-default read-more"><i class="fa fa-external-link"></i> Read
                                        More</a>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <div class="item">
                <?php
                $veriIki = $db->prepare("SELECT *FROM urunler ORDER BY urun_hit DESC limit 3,3");
                $veriIki->execute(array());
                $vv = $veriIki->fetchALL(PDO::FETCH_ASSOC);
                foreach ($vv as $urunIki) {
                    ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="<?php echo $urunIki['urun_resim'] ?>" alt=""
                                         style="height:140px!important;width: 180px!important"/>
                                    <h2><?php echo parayaz($urunIki['urun_fiyat']) ?></h2>
                                    <p><?php echo $urunIki['urun_title'] ?></p>
                                    <?php if (@$_SESSION) {
                                        ?>
                                        <button product-id="<?php echo $urunIki['urun_id'] ?>"
                                                class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>
                                            Add
                                            to cart
                                        </button>
                                    <?php } ?>
                                    <a href="?islem=pDetails&urun_id=<?php echo $urunIki['urun_id'] ?>"
                                       class="btn btn-default read-more"><i class="fa fa-external-link"></i> Read
                                        More</a>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>


        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div>
<!--/recommended_items-->